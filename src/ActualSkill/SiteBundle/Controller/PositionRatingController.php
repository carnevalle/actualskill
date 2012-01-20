<?php

namespace ActualSkill\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ActualSkill\CoreBundle\Entity\PositionRating;
use Symfony\Component\HttpFoundation\Response;
use \Exception;

/**
 * PositionRating controller.
 */
class PositionRatingController extends Controller
{


    /**
     * Creates a new Rating entity.
     *
     * @Route("/rate/{player_slug}/position/{position_slug}/{value}", defaults={"value" = 5}, name="rate_position")
     */    
    public function rateAction($player_slug, $position_slug, $value)
    {
        
        $value = min(max(0,$value),10);
        
        if(!$this->getRequest()->isXmlHttpRequest()){
            //throw new Exception("Request must AJAX");
        }
        
        $em = $this->getDoctrine()->getEntityManager();
        $user = $this->get('security.context')->getToken()->getUser();
        $player = $em->getRepository('ActualSkillCoreBundle:Player')->findOneBySlug($player_slug);
        $position = $em->getRepository('ActualSkillCoreBundle:Position')->findOneBySlug($position_slug);
        
        if(!is_numeric($value)){
            throw new Exception("Rating must be a numeric value");
        }else if (!$player) {
            throw $this->createNotFoundException('Unable to find player entity.');
        }else if(!$position){
            throw $this->createNotFoundException('Unable to find Position entity.');
        }
        
        $rating = $this->getDoctrine()
                ->getRepository('ActualSkillCoreBundle:PositionRating')
                ->findOneBy(array('player' => $player->getId(), 'user' => $user->getId(), 'position' => $position->getId()));
        
        
        if(is_null($rating)){
            
            $rating = new PositionRating();
            $rating->setPlayer($player);
            $rating->setPosition($position);
            $rating->setUser($user);            
            
        }
        
        $rating->setRating($value);
        
        $em->persist($rating);
        $em->flush();
        
        /*
        $repository = $this->getDoctrine()->getRepository('ActualSkillCoreBundle:Attribute');
        $result = $repository->findBySlugWithRating($attribute_slug, $entity, $this->get('security.context')->getToken()->getUser());
        */
        return new Response("I want to rate crazy shit! ".$value);
    }
}
