<?php

namespace ActualSkill\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ActualSkill\CoreBundle\Entity\Attribute;
use ActualSkill\CoreBundle\Form\AttributeType;

/**
 * Attribute controller.
 */
class AttributeController extends Controller
{
    /**
     * Lists all Attribute entities.
     *
     * @Route("/admin/attributes/", name="admin_attributes")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ActualSkillCoreBundle:Attribute')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Attribute entity.
     *
     * @Route("/admin/attribute/{id}/show", name="admin_attribute_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ActualSkillCoreBundle:Attribute')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Attribute entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Attribute entity.
     *
     * @Route("/admin/attribute/new", name="admin_attribute_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Attribute();
        $form   = $this->createForm(new AttributeType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Attribute entity.
     *
     * @Route("/admin/attribute/create", name="admin_attribute_create")
     * @Method("post")
     * @Template("ActualSkillAdminBundle:Attribute:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Attribute();
        $request = $this->getRequest();
        $form    = $this->createForm(new AttributeType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_attribute_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Attribute entity.
     *
     * @Route("/admin/attribute/{id}/edit", name="admin_attribute_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ActualSkillCoreBundle:Attribute')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Attribute entity.');
        }

        $editForm = $this->createForm(new AttributeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Attribute entity.
     *
     * @Route("/admin/attribute/{id}/update", name="admin_attribute_update")
     * @Method("post")
     * @Template("ActualSkillAdminBundle:Attribute:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ActualSkillCoreBundle:Attribute')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Attribute entity.');
        }

        $editForm   = $this->createForm(new AttributeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_attribute_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Attribute entity.
     *
     * @Route("/admin/attribute/{id}/delete", name="admin_attribute_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ActualSkillCoreBundle:Attribute')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Attribute entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_attributes'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
