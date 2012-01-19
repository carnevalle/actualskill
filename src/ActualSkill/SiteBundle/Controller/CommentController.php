<?php

namespace ActualSkill\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

/**
 * Comment controller.
 */
class CommentController extends Controller
{

    /**
     * Creates a new Comment entity.
     *
     * @Route("/comment/create/{entity_slug}/{parent_comment}", name="comment_create", defaults={"parent_comment" = null})
     * @Method("post")
     */
    public function createAction($entity_slug, $parent_comment)
    {
        
        $request = $this->getRequest();

        if($request->get("comment") != null && strlen( trim($request->get("comment")) ) > 0 ){
            
            $em = $this->getDoctrine()->getEntityManager();
            $user = $this->get('security.context')->getToken()->getUser();
            $entity = $em->getRepository('ActualSkillCoreBundle:BaseEntity')->findOneBySlug($entity_slug);
            $comment = new \ActualSkill\CoreBundle\Entity\Comment();            
            
            $comment->setComment($request->get("comment"));
            $comment->setUser($user);
            $comment->setObject($entity);
                
            $em->persist($comment);
            $em->flush();       
            
            return new Response('{ "id" : '.$comment->getId().', "comment" : "'.$comment->getComment().'"}');
            
        }else{
            return new Response("false");
        }
        
        /*
       
        
        return new Response( $request->get("comment") );
        */
        
        
        /*
        $entity  = new Comment();
        $request = $this->getRequest();
        $form    = $this->createForm(new CommentType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('comment_show', array('id' => $entity->getId())));
            
        }
        
        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
        */
    
    }

    /**
     * Edits an existing Comment entity.
     *
     * @Route("/comment/{id}/update", name="comment_update")
     * @Method("post")
     * @Template("ActualSkillCoreBundle:Comment:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ActualSkillCoreBundle:Comment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comment entity.');
        }

        $editForm   = $this->createForm(new CommentType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('comment_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Comment entity.
     *
     * @Route("/comment/{id}/delete", name="comment_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ActualSkillCoreBundle:Comment')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Comment entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('comment'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
