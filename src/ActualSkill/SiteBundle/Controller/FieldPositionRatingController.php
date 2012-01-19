<?php

namespace ActualSkill\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ActualSkill\CoreBundle\Entity\FieldPositionRating;
use Symfony\Component\HttpFoundation\Response;
use \Exception;

/**
 * FieldPositionRating controller.
 */
class FieldPositionRatingController extends Controller
{


    /**
     * Creates a new Rating entity.
     *
     * @Route("/rate/{player_slug}/position/{position_slug}/{value}", defaults={"value" = 5}, name="rate_field_position")
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
        $fieldPosition = $em->getRepository('ActualSkillCoreBundle:FieldPosition')->findOneBySlug($position_slug);
        
        if(!is_numeric($value)){
            throw new Exception("Rating must be a numeric value");
        }else if (!$player) {
            throw $this->createNotFoundException('Unable to find player entity.');
        }else if(!$fieldPosition){
            throw $this->createNotFoundException('Unable to find FieldPosition entity.');
        }
        
        $rating = $this->getDoctrine()
                ->getRepository('ActualSkillCoreBundle:FieldPositionRating')
                ->findOneBy(array('player' => $player->getId(), 'user' => $user->getId(), 'fieldPosition' => $fieldPosition->getId()));
        
        
        if(is_null($rating)){
            
            $rating = new FieldPositionRating();
            $rating->setPlayer($player);
            $rating->setFieldPosition($fieldPosition);
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
