<?php

namespace ActualSkill\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ActualSkill\CoreBundle\Entity\Rating;
use ActualSkill\CoreBundle\Form\RatingType;
use Symfony\Component\HttpFoundation\Response;
use \Exception;

/**
 * Rating controller.
 */
class RatingController extends Controller
{


    /**
     * Creates a new Rating entity.
     *
     * @Route("/rate/{entity_slug}/{attribute_slug}/{value}", defaults={"value" = 5}, name="rate_attribute")
     */    
    public function rateAction($entity_slug, $attribute_slug, $value)
    {
        
        $value = min(max(0,$value),10);
        
        if(!$this->getRequest()->isXmlHttpRequest()){
            //throw new Exception("Request must AJAX");
        }
        
        $em = $this->getDoctrine()->getEntityManager();
        $user = $this->get('security.context')->getToken()->getUser();
        $entity = $em->getRepository('ActualSkillCoreBundle:BaseEntity')->findOneBySlug($entity_slug);
        $attribute = $em->getRepository('ActualSkillCoreBundle:Attribute')->findOneBySlug($attribute_slug);
        
        if(!is_numeric($value)){
            throw new Exception("Rating must be a numeric value");
        }else if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity.');
        }else if(!$attribute){
            throw $this->createNotFoundException('Unable to find Attribute entity.');
        }
        
        $rating = $this->getDoctrine()
                ->getRepository('ActualSkillCoreBundle:Rating')
                ->findOneBy(array('object' => $entity->getId(), 'user' => $user->getId(), 'attribute' => $attribute->getId()));
        
        if(is_null($rating)){
            $rating = new Rating();
            $rating->setObject($entity);
            $rating->setAttribute($attribute);
            $rating->setUser($user);            
        }
        
        $rating->setRating($value);
        
        $em->persist($rating);
        $em->flush();
        
        $repository = $this->getDoctrine()->getRepository('ActualSkillCoreBundle:Attribute');
        $result = $repository->findBySlugWithRating($attribute_slug, $entity, $this->get('security.context')->getToken()->getUser());
        
        return new Response( '{ "id" : '.$result[0][0]->getId().', "slug" : "'.$result[0][0]->getSlug().'", "average" : '.$result[0]['average'].', "name" : "'.$entity->getName().'" }' );
    }
}
