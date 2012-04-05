<?php

namespace ActualSkill\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ActualSkill\CoreBundle\Entity\Club;
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

        $clubs = $em->getRepository('ActualSkillCoreBundle:Club')->findAll();

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
        $club = $em->getRepository('ActualSkillCoreBundle:Club')->findOneBySlug($id);

        if (!$club) {
            throw $this->createNotFoundException('Unable to find Club entity.');
        }

        $user = null;
        $likes = null;
        if ($this->get('security.context')->isGranted('ROLE_USER')) {
            $user = $this->get('security.context')->getToken()->getUser();
            $ratingService = $this->get('actual_skill_core.rating_service');
            $likes = $ratingService->doesUserLikeEntity($club, $user);
            $ratingService->addUserRatingsToBaseEntity($club, $user);
        }

        $categories = $club->getRatingschema()->getCategories();

        return array(
            'club'  => $club,
            'categories'  => $categories,
            'likes'  => $likes,
        );
    }
}
