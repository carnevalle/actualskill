<?php

namespace ActualSkill\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ActualSkill\SharedEntityBundle\Entity\Club;
use ActualSkill\SiteBundle\Form\ClubType;

/**
 * Club controller.
 */
class ClubController extends Controller
{

    /**
     * Lists all Club entities.
     *
     * @Route("/clubs/", name="site_clubs")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $clubs = $em->getRepository('ActualSkillSharedEntityBundle:Club')->findAll();

        return array('clubs' => $clubs);
    }    
    
    /**
     * Finds and displays a Club entity.
     *
     * @Route("/club/{id}/", name="site_club_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $club = $em->getRepository('ActualSkillSharedEntityBundle:Club')->findOneBySlug($id);

        if (!$club) {
            throw $this->createNotFoundException('Unable to find Club entity.');
        }

        return array(
            'club'  => $club,
        );
    }
}
