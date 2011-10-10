<?php

namespace ActualSkill\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ActualSkill\SharedEntityBundle\Entity\Stadium;
use ActualSkill\SiteBundle\Form\StadiumType;

/**
 * Stadium controller.
 *
 * @Route("/stadium")
 */
class StadiumController extends Controller
{
    /**
     * Lists all Stadium entities.
     *
     * @Route("/", name="stadium")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ActualSkillSharedEntityBundle:Stadium')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Stadium entity.
     *
     * @Route("/{id}/show", name="stadium_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ActualSkillSharedEntityBundle:Stadium')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Stadium entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Stadium entity.
     *
     * @Route("/new", name="stadium_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Stadium();
        $form   = $this->createForm(new StadiumType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Stadium entity.
     *
     * @Route("/create", name="stadium_create")
     * @Method("post")
     * @Template("ActualSkillSharedEntityBundle:Stadium:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Stadium();
        $request = $this->getRequest();
        $form    = $this->createForm(new StadiumType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('stadium_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Stadium entity.
     *
     * @Route("/{id}/edit", name="stadium_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ActualSkillSharedEntityBundle:Stadium')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Stadium entity.');
        }

        $editForm = $this->createForm(new StadiumType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Stadium entity.
     *
     * @Route("/{id}/update", name="stadium_update")
     * @Method("post")
     * @Template("ActualSkillSharedEntityBundle:Stadium:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ActualSkillSharedEntityBundle:Stadium')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Stadium entity.');
        }

        $editForm   = $this->createForm(new StadiumType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('stadium_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Stadium entity.
     *
     * @Route("/{id}/delete", name="stadium_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ActualSkillSharedEntityBundle:Stadium')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Stadium entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('stadium'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
