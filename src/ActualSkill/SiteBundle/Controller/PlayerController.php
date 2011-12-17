<?php

namespace ActualSkill\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ActualSkill\SharedEntityBundle\Entity\Player;
use ActualSkill\SiteBundle\Form\PlayerType;

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

        $players = $em->getRepository('ActualSkillSharedEntityBundle:Player')->findAll();
        $clubs = $em->getRepository('ActualSkillSharedEntityBundle:Club')->findAll();
        
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
        $player = $this->getDoctrine()->getRepository('ActualSkillSharedEntityBundle:Player')->findOneBySlug($id);

        if (!$player) {
            throw $this->createNotFoundException('Unable to find Player entity.');
        }
        
        $repository = $this->getDoctrine()->getRepository('ActualSkillSharedEntityBundle:Category');
        
        $categories = array();
        $categories = $repository->findByTypeWithAverage("player", $player, $this->get('security.context')->getToken()->getUser());
        
        return array(
            'player'      => $player,
            'categories'  => $categories,
        );
    }
}