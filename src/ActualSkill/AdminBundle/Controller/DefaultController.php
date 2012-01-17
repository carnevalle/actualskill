<?php

namespace ActualSkill\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ActualSkill\CoreBundle\Entity\User;

class DefaultController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $users = $em->getRepository('ActualSkillCoreBundle:User')->findAll();

        return array('users' => $users);
    }
}
