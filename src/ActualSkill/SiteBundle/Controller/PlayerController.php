<?php

namespace ActualSkill\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ActualSkill\SiteBundle\Entity\Player;
use ActualSkill\SiteBundle\Form\PlayerType;

/**
 * Player controller.
 */
class PlayerController extends Controller
{
    /**
     * Lists all Player entities.
     *
     * @Route("/admin/players/", name="admin_player")
     * @Template()
     */
    public function indexAdminAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ActualSkillSiteBundle:Player')->findAll();

        return array('entities' => $entities);        
    }

    /**
     * Lists all Player entities.
     *
     * @Route("/players/", name="site_players")
     * @Template()
     */    
    public function indexSiteAction(){
        $em = $this->getDoctrine()->getEntityManager();

        $players = $em->getRepository('ActualSkillSiteBundle:Player')->findAll();
        $clubs = $em->getRepository('ActualSkillSiteBundle:Club')->findAll();
        
        return array('players' => $players, 'clubs' => $clubs);
    }
    
    /**
     * Finds and displays a Player entity.
     *
     * @Route("/admin/player/{id}/show", name="admin_player_show")
     * @Template()
     */
    public function showAdminAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $entity = $em->getRepository('ActualSkillSiteBundle:Player')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Player entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Finds and displays a Player entity.
     *
     * @Route("/player/{id}", name="player_show")
     * @Template()
     */
    public function showSiteAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $player = $em->getRepository('ActualSkillSiteBundle:Player')->find($id);

        if (!$player) {
            throw $this->createNotFoundException('Unable to find Player entity.');
        }
        
        $repository = $this->getDoctrine()->getRepository('ActualSkillSiteBundle:Category');
        $categories = $repository->findBy(array('type' => 'player'));
        
        return array(
            'player'      => $player,
            'categories'      => $categories,
        );
    }
    
    /**
     * Displays a form to create a new Player entity.
     *
     * @Route("/admin/player/new", name="admin_player_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Player();
        $form   = $this->createForm(new PlayerType(), $entity);
        
        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Player entity.
     *
     * @Route("/admin/player/create", name="admin_player_create")
     * @Method("post")
     * @Template("ActualSkillSiteBundle:Player:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Player();
        $request = $this->getRequest();
        $form    = $this->createForm(new PlayerType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_player_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Player entity.
     *
     * @Route("/admin/player/{id}/edit", name="admin_player_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ActualSkillSiteBundle:Player')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Player entity.');
        }

        $editForm = $this->createForm(new PlayerType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Player entity.
     *
     * @Route("/admin/player/{id}/update", name="admin_player_update")
     * @Method("post")
     * @Template("ActualSkillSiteBundle:Player:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ActualSkillSiteBundle:Player')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Player entity.');
        }

        $editForm   = $this->createForm(new PlayerType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_player_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Player entity.
     *
     * @Route("/admin/player/{id}/delete", name="admin_player_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ActualSkillSiteBundle:Player')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Player entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_player'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}