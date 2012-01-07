<?php

namespace ActualSkill\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ActualSkill\CoreBundle\Entity\Attribute;
use ActualSkill\SiteBundle\Form\AttributeType;

/**
 * Attribute controller.
 *
 * @Route("/attribute")
 */
class AttributeController extends Controller
{
    /**
     * Lists all Attribute entities.
     *
     * @Route("/", name="attribute")
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
     * @Route("/{id}/show", name="attribute_show")
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
        );
    }
}
