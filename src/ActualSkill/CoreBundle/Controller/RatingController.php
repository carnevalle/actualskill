<?php

namespace ActualSkill\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ActualSkill\CoreBundle\Entity\Rating;
use ActualSkill\CoreBundle\Form\RatingType;

/**
 * Rating controller.
 *
 * @Route("/rating")
 */
class RatingController extends Controller
{
    /**
     * Lists all Rating entities.
     *
     * @Route("/", name="rating")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ActualSkillCoreBundle:Rating')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Rating entity.
     *
     * @Route("/{id}/show", name="rating_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ActualSkillCoreBundle:Rating')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rating entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Rating entity.
     *
     * @Route("/new", name="rating_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Rating();
        $form   = $this->createForm(new RatingType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Rating entity.
     *
     * @Route("/create", name="rating_create")
     * @Method("post")
     * @Template("ActualSkillCoreBundle:Rating:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Rating();
        $request = $this->getRequest();
        $form    = $this->createForm(new RatingType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('rating_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Rating entity.
     *
     * @Route("/{id}/edit", name="rating_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ActualSkillCoreBundle:Rating')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rating entity.');
        }

        $editForm = $this->createForm(new RatingType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Rating entity.
     *
     * @Route("/{id}/update", name="rating_update")
     * @Method("post")
     * @Template("ActualSkillCoreBundle:Rating:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ActualSkillCoreBundle:Rating')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rating entity.');
        }

        $editForm   = $this->createForm(new RatingType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('rating_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Rating entity.
     *
     * @Route("/{id}/delete", name="rating_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ActualSkillCoreBundle:Rating')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Rating entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('rating'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
