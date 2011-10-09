<?php

namespace ActualSkill\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{

    public function indexAction()
    {
        //return new Response('<html><body>Hello Champ!</body></html>');
        return $this->render('ActualSkillSiteBundle:Admin:index.html.twig');
    }
}
