<?php

namespace ActualSkill\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction()
    {

        if ($this->get('security.context')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('site_players'));
        }

        $csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate');

        return array(
            'csrf_token' => $csrfToken,
        );
    }
}
