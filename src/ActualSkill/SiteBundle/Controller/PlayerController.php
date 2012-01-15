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
        
        if (!$player) {
            throw $this->createNotFoundException('Unable to find Player entity.');
        }
        
        $user = $this->get('security.context')->getToken()->getUser();

        
        $ratingService = $this->get('actual_skill_core.rating_service');
        $likes = $ratingService->doesUserLikeEntity($player, $user);
        
        $ratingService->addUserRatingsToBaseEntity($player, $this->get('security.context')->getToken()->getUser());
        
        return array(
            'player'      => $player,
            'categories'  => $player->getRatingschema()->getCategories(),
            'likes'       => $likes
            //'categories'  => $categories,
        );
    }
}