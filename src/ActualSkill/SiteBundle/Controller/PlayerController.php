<?php

namespace ActualSkill\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ActualSkill\CoreBundle\Entity\Player;
use ActualSkill\SiteBundle\Form\PlayerType;
use ActualSkill\CoreBundle\Entity\Comment;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Player controller.
 */
class PlayerController extends Controller
{

    /**
     * Lists all Player entities.
     *
     * @Route("/players/", name="site_players")
     * @Template()
     */
    public function indexAction(){
        $em = $this->getDoctrine()->getEntityManager();

        $players = $em->getRepository('ActualSkillCoreBundle:Player')->findAll();
        $clubs = $em->getRepository('ActualSkillCoreBundle:Club')->findAll();

        return array('players' => $players, 'clubs' => $clubs);
    }

    /**
     * Finds and displays a Player entity.
     *
     * @Route("/player/{id}", name="player_show")
     * @Template()
     */
    public function showAction($id)
    {

        //$player = $this->getDoctrine()->getRepository('ActualSkillCoreBundle:Player')->findOneBySlug($id);
        //$player = $this->getDoctrine()->getRepository('ActualSkillCoreBundle:Player')->findOneBySlugJoinedToRatingSchema($id);
        $player = $this->getDoctrine()->getRepository('ActualSkillCoreBundle:Player')->findOneBySlugWithRatings($id);
        $randomplayer = $this->getDoctrine()->getRepository('ActualSkillCoreBundle:Player')->findOneRandomJoinedToRatingSchema();
        $positions = $this->getDoctrine()->getRepository('ActualSkillCoreBundle:PlayerPosition')->findAllOrderByASC();

        if (!$player) {
            throw $this->createNotFoundException('Unable to find Player entity.');
        }

        $user = null;
        $likes = null;
        if ($this->get('security.context')->isGranted('ROLE_USER')) {
            $user = $this->get('security.context')->getToken()->getUser();
            $ratingService = $this->get('actual_skill_core.rating_service');
            $likes = $ratingService->doesUserLikeEntity($player, $user);
            $ratingService->addUserRatingsToBaseEntity($player, $user);
        }

        // We get a sorted set of attributes with ratings
        $categories = $player->getRatingschema()->getCategories();
        $attributesSorted = $this->getSortedAttributesWithRatings($player);
        $topattributes = array_slice($attributesSorted, 0, 5);
        $bottomattributes = array_slice($attributesSorted, count($attributesSorted)-5, 5);
        $this->sortAttributesByAverage($bottomattributes);

        // We get and sort the players team members
        $teammembers = $player->getClub()->getPlayers();
        $this->sortPlayersByAverage($teammembers, "DESC");

        return array(
            'player'        => $player,
            'randomplayer'  => $randomplayer,
            'categories'    => $categories,
            'likes'         => $likes,
            'positions'     => $positions,
            'topattributes' => $topattributes,
            'bottomattributes' => $bottomattributes,
            'teammembers'   => $teammembers,
            //'categories'  => $categories,
        );
    }

    private function getSortedAttributesWithRatings($player, $sortorder = "DESC"){
        $latestStatsheet = $player->getLatestStatsheet();
        $attributes = $player->getRatingSchema()->getAttributes();

        if($latestStatsheet != null){
            $ratings = $latestStatsheet->getRatings();

            foreach($attributes as $attribute){
                foreach($ratings as $rating){
                    if($attribute->getId() == $rating->getAttribute()->getId()){
                        $this->container->get('logger')->info($attribute->getName()." ".$rating->getAverageWeighted());


                        $attribute->setAverageRating($rating->getAverageWeighted());
                        $attribute->setNumberOfRatings($rating->getNumberOfRatings());
                    }
                }
            }
        }

        $this->sortAttributesByAverage($attributes, $sortorder);
        return $attributes;
    }

    private function sortAttributesByAverage(&$array, $type = "ASC"){
        $cur = 1;
        $stack[1]['l'] = 0;
        $stack[1]['r'] = count($array) - 1;

        do {
            $l = $stack[$cur]['l'];
            $r = $stack[$cur]['r'];
            $cur--;

            do {
                $i = $l;
                $j = $r;
                $tmp = $array[(int) ( ($l + $r) / 2 )];

                // partion the array in two parts.
                // left from $tmp are with smaller values,
                // right from $tmp are with bigger ones
                do {

                    if($type == "ASC"){

                        while ($array[$i]->getAverageRating() < $tmp->getAverageRating())
                            $i++;

                        while ($tmp->getAverageRating() < $array[$j]->getAverageRating())
                            $j--;
                    }else{

                        while ($array[$i]->getAverageRating() > $tmp->getAverageRating())
                            $i++;

                        while ($tmp->getAverageRating() > $array[$j]->getAverageRating())
                            $j--;
                    }

                    // swap elements from the two sides
                    if ($i <= $j) {
                        $w = $array[$i];
                        $array[$i] = $array[$j];
                        $array[$j] = $w;

                        $i++;
                        $j--;
                    }
                } while ($i <= $j);

                if ($i < $r) {
                    $cur++;
                    $stack[$cur]['l'] = $i;
                    $stack[$cur]['r'] = $r;
                }
                $r = $j;
            } while ($l < $r);
        } while ($cur != 0);
    }

    private function sortPlayersByAverage(&$array, $type = "ASC"){
        $cur = 1;
        $stack[1]['l'] = 0;
        $stack[1]['r'] = count($array) - 1;

        do {
            $l = $stack[$cur]['l'];
            $r = $stack[$cur]['r'];
            $cur--;

            do {
                $i = $l;
                $j = $r;
                $tmp = $array[(int) ( ($l + $r) / 2 )];

                // partion the array in two parts.
                // left from $tmp are with smaller values,
                // right from $tmp are with bigger ones
                do {

                    if($type == "ASC"){

                        while ($array[$i]->getRatingAverage() < $tmp->getRatingAverage())
                            $i++;

                        while ($tmp->getRatingAverage() < $array[$j]->getRatingAverage())
                            $j--;
                    }else{

                        while ($array[$i]->getRatingAverage() > $tmp->getRatingAverage())
                            $i++;

                        while ($tmp->getRatingAverage() > $array[$j]->getRatingAverage())
                            $j--;
                    }

                    // swap elements from the two sides
                    if ($i <= $j) {
                        $w = $array[$i];
                        $array[$i] = $array[$j];
                        $array[$j] = $w;

                        $i++;
                        $j--;
                    }
                } while ($i <= $j);

                if ($i < $r) {
                    $cur++;
                    $stack[$cur]['l'] = $i;
                    $stack[$cur]['r'] = $r;
                }
                $r = $j;
            } while ($l < $r);
        } while ($cur != 0);
    }
}