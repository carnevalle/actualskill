<?php

namespace ActualSkill\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ActualSkill\CoreBundle\Entity\RatingSchema;
use ActualSkill\CoreBundle\Form\RatingSchemaType;

/**
 * RatingSchema controller.
 *
 * @Route("/admin/ratingschema")
 */
class RatingSchemaController extends Controller
{
    /**
     * Lists all RatingSchema entities.
     *
     * @Route("/", name="admin_ratingschema")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ActualSkillCoreBundle:RatingSchema')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a RatingSchema entity.
     *
     * @Route("/{id}/show", name="admin_ratingschema_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ActualSkillCoreBundle:RatingSchema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RatingSchema entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new RatingSchema entity.
     *
     * @Route("/new", name="admin_ratingschema_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new RatingSchema();
        $form   = $this->createForm(new RatingSchemaType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new RatingSchema entity.
     *
     * @Route("/create", name="admin_ratingschema_create")
     * @Method("post")
     * @Template("ActualSkillCoreBundle:RatingSchema:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new RatingSchema();
        $request = $this->getRequest();
        $form    = $this->createForm(new RatingSchemaType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_ratingschema_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing RatingSchema entity.
     *
     * @Route("/{id}/edit", name="admin_ratingschema_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ActualSkillCoreBundle:RatingSchema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RatingSchema entity.');
        }

        $editForm = $this->createForm(new RatingSchemaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing RatingSchema entity.
     *
     * @Route("/{id}/update", name="admin_ratingschema_update")
     * @Method("post")
     * @Template("ActualSkillCoreBundle:RatingSchema:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ActualSkillCoreBundle:RatingSchema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RatingSchema entity.');
        }

        $editForm   = $this->createForm(new RatingSchemaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_ratingschema_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a RatingSchema entity.
     *
     * @Route("/{id}/delete", name="admin_ratingschema_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ActualSkillCoreBundle:RatingSchema')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find RatingSchema entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_ratingschema'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
