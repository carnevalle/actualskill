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

        $all_players = $em->getRepository('ActualSkillCoreBundle:Player')->findAll();
        $best_players = $this->getDoctrine()->getRepository('ActualSkillCoreBundle:Player')->findWithRatings(10);
        $popular_players = $this->getDoctrine()->getRepository('ActualSkillCoreBundle:Player')->findMostPopular(10);
        $most_rated_players = $this->getDoctrine()->getRepository('ActualSkillCoreBundle:Player')->findMostRated(10);

        return array(
            'all_players' => $all_players, 
            'best_players' => $best_players, 
            'popular_players' => $popular_players,
            'most_rated_players' => $most_rated_players,
            );
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
            $ratingService = $this->get('core.rating_service');
            $likes = $ratingService->doesUserLikeEntity($player, $user);
            $ratingService->addUserRatingsToBaseEntity($player, $user);
        }

        $asservice = $this->get('core.actualskill_service');

        // We get a sorted set of attributes with ratings
        $categories = $player->getRatingschema()->getCategories();
        $attributesSorted = $this->getSortedAttributesWithRatings($player);
        $topattributes = array_slice($attributesSorted, 0, 5);
        $bottomattributes = array_slice($attributesSorted, count($attributesSorted)-5, 5);
        $asservice->sortByAverageRating($bottomattributes);

        // We get and sort the players team members
        $teammembers = $player->getClub()->getPlayers();

        
        $asservice->sortByAverageRating($teammembers, "DESC");        

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

        $asservice = $this->get('core.actualskill_service');
        $asservice->sortByAverageRating($attributes, $sortorder);

        return $attributes;
    }
}