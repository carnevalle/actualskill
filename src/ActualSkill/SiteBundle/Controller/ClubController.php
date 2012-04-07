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
        $asservice = $this->get('core.actualskill_service');

        $clubs = $em->getRepository('ActualSkillCoreBundle:Club')->findAll();
        $danish_clubs = $em->getRepository('ActualSkillCoreBundle:Club')->findAllFromCountry("dk");
        $best_clubs = $em->getRepository('ActualSkillCoreBundle:Club')->findWithRatings(10);
        $popular_clubs = $em->getRepository('ActualSkillCoreBundle:Club')->findMostPopular(10);
        $most_rated_clubs = $this->getDoctrine()->getRepository('ActualSkillCoreBundle:Club')->findMostRated(10);

        return array(
            'clubs' => $clubs,
            'danish_clubs' => $danish_clubs,
            'popular_clubs' => $popular_clubs,
            'best_clubs' => $best_clubs,
            'most_rated_clubs' => $most_rated_clubs,
        );
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

        $asservice = $this->get('core.actualskill_service');

        $user = null;
        $likes = null;
        if ($this->get('security.context')->isGranted('ROLE_USER')) {
            $user = $this->get('security.context')->getToken()->getUser();
            $ratingService = $this->get('core.rating_service');
            $likes = $ratingService->doesUserLikeEntity($club, $user);
            $ratingService->addUserRatingsToBaseEntity($club, $user);
        }

        $categories = $club->getRatingschema()->getCategories();
        $players = $club->getPlayers();
        if(count($players) >0){
            $asservice->sortByAverageRating($players, "DESC");
        }

        return array(
            'club'  => $club,
            'players' => $players,
            'categories'  => $categories,
            'likes'  => $likes,
        );
    }
}
