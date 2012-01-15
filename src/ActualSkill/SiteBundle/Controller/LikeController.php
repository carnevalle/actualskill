<?php

namespace ActualSkill\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ActualSkill\CoreBundle\Entity\BaseEntityLike;
use Symfony\Component\HttpFoundation\Response;
use \Exception;

/**
 * Rating controller.
 */
class LikeController extends Controller
{

    
    /**
     * Creates a new Rating entity.
     *
     * @Route("/like/{entity_slug}", name="like_entity")
     */    
    public function likeAction($entity_slug)
    {
        
        if(!$this->getRequest()->isXmlHttpRequest()){
            //throw new Exception("Request must AJAX");
        }
        
        $em = $this->getDoctrine()->getEntityManager();
        $user = $this->get('security.context')->getToken()->getUser();
        $entity = $em->getRepository('ActualSkillCoreBundle:BaseEntity')->findOneBySlug($entity_slug);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity.');
        }
        
        $like = $this->getDoctrine()
                ->getRepository('ActualSkillCoreBundle:BaseEntityLike')
                ->findOneBy(array('object' => $entity->getId(), 'user' => $user->getId()));
        
        $liked = false;
        if(is_null($like)){
            $like = new BaseEntityLike();
            $like->setObject($entity);
            $like->setUser($user);       
            $em->persist($like);
            $liked = true;
        }else{
            $em->remove($like);
        }
        
        
        $em->flush();
        
        if($liked){
            return new Response( '{"like":true}' );    
        }else{
            return new Response( '{"like":false}' );    
        }
        
    }
}
