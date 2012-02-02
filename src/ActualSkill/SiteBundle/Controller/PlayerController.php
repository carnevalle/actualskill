<?php

namespace ActualSkill\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ActualSkill\CoreBundle\Entity\Player;
use ActualSkill\SiteBundle\Form\PlayerType;
use ActualSkill\CoreBundle\Entity\Comment;

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
        $player = $this->getDoctrine()->getRepository('ActualSkillCoreBundle:Player')->findOneBySlugJoinedToRatingSchema($id);
        $randomplayer = $this->getDoctrine()->getRepository('ActualSkillCoreBundle:Player')->findOneRandomJoinedToRatingSchema();
        $positions = $this->getDoctrine()->getRepository('ActualSkillCoreBundle:PlayerPosition')->findAllOrderByASC();
        
        if (!$player) {
            throw $this->createNotFoundException('Unable to find Player entity.');
        }
        
        $user = $this->get('security.context')->getToken()->getUser();

        
        $ratingService = $this->get('actual_skill_core.rating_service');
        $likes = $ratingService->doesUserLikeEntity($player, $user);
        
        $ratingService->addUserRatingsToBaseEntity($player, $this->get('security.context')->getToken()->getUser());
        
        // This sorts attributes be average rating (descending)
        $categories = $player->getRatingschema()->getCategories();
        $attributesSorted = array();
        $topattributes = array();
        $bottomattributes = array();
        foreach ($categories as $category) {
            $attributes = $category->getAttributes();
            foreach ($attributes as $attribute) {
                $attributesSorted[] = $attribute;
                
            }
            
            $this->sortAttributesByAverage($attributesSorted, "DESC");
            $topattributes = array_slice($attributesSorted, 0, 5);
            $bottomattributes = array_slice($attributesSorted, count($attributesSorted)-5, 5);
            $this->sortAttributesByAverage($bottomattributes);
        }
        
        return array(  
            'player'        => $player,
            'randomplayer'  => $randomplayer,
            'categories'    => $player->getRatingschema()->getCategories(),
            'likes'         => $likes,
            'positions'     => $positions,
            'topattributes' => $topattributes,
            'bottomattributes' => $bottomattributes,
            //'categories'  => $categories,
        );
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
    
    private function sortPlayersByAverage(&$array){
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
                    while ($array[$i]->getRatingAverage() < $tmp->getRatingAverage())
                        $i++;

                    while ($tmp->getRatingAverage() < $array[$j]->getRatingAverage())
                        $j--;

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