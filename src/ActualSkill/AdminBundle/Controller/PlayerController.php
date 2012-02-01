<?php

namespace ActualSkill\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ActualSkill\CoreBundle\Entity\Player;
use ActualSkill\CoreBundle\Form\PlayerType;

class PlayerController extends Controller
{
    /**
     * @Route("/admin/players", name="admin_players")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $players = $em->getRepository('ActualSkillCoreBundle:Player')->findAll();

        return array('players' => $players); 
    }
    
    /**
     * Finds and displays a Player entity.
     *
     * @Route("/admin/player/{id}/show", name="admin_player_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $player = $em->getRepository('ActualSkillCoreBundle:Player')->findOneBySlug($id);

        if (!$player) {
            throw $this->createNotFoundException('Unable to find Player entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'player'      => $player,
            'delete_form' => $deleteForm->createView(),        
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
     * @Template("ActualSkillCoreBundle:Player:new.html.twig")
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

            return $this->redirect($this->generateUrl('admin_player_show', array('id' => $entity->getSlug())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }
    
    /**
     * Imports players from a CSV list
     * 
     * @Route("/admin/players/import", name="admin_players_import")
     * @Template()
     */
    public function importAction(){
        
        $request = $this->getRequest();
        
        
        if($request->get("comment") != null && strlen( trim($request->get("comment")) ) > 0 ){
            
            $data = $this->parse_csv($request->get("comment"));
            
            return array(
                'data' => $data
            );
        }else{
            return array(
                'data' => null
            );            
        }
        
    }

    private function parse_csv($file,$comma=';',$quote='"',$newline="\n") {
    
    $db_quote = $quote . $quote;
    
    // Clean up file
    $file = trim($file);
    $file = str_replace("\r\n",$newline,$file);
    
    $file = str_replace($db_quote,'&quot;',$file); // replace double quotes with &quot; HTML entities
    $file = str_replace(',&quot;,',',,',$file); // handle ,"", empty cells correctly
  
    $file .= $comma; // Put a comma on the end, so we parse last cell  
  
    $inquotes = false;
    $start_point = 0;
    $row = 0;
    
    for($i=0; $i<strlen($file); $i++) {
        
        $char = $file[$i];
        if ($char == $quote) {
            if ($inquotes) {
                $inquotes = false;
                }
            else { 
                $inquotes = true;
                }
            }        
        
        if (($char == $comma or $char == $newline) and !$inquotes) {
            $cell = substr($file,$start_point,$i-$start_point);
            $cell = str_replace($quote,'',$cell); // Remove delimiter quotes
            $cell = str_replace('&quot;',$quote,$cell); // Add in data quotes
            $data[$row][] = $cell;
            $start_point = $i + 1;
            if ($char == $newline) {
                $row ++;
                }
            }
        }
        return $data;
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

        $entity = $em->getRepository('ActualSkillCoreBundle:Player')->findOneBySlug($id);

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
     * @Template("ActualSkillCoreBundle:Player:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ActualSkillCoreBundle:Player')->find($id);

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

            return $this->redirect($this->generateUrl('admin_player_edit', array('id' => $entity->getSlug())));
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
            $entity = $em->getRepository('ActualSkillCoreBundle:Player')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Player entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_players'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }    
}
