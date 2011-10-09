<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appdevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = urldecode($pathinfo);

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        // _demo_login
        if ($pathinfo === '/demo/secured/login') {
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
        }

        // _security_check
        if ($pathinfo === '/demo/secured/login_check') {
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
        }

        // _demo_logout
        if ($pathinfo === '/demo/secured/logout') {
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
        }

        // acme_demo_secured_hello
        if ($pathinfo === '/demo/secured/hello') {
            return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
        }

        // _demo_secured_hello
        if (0 === strpos($pathinfo, '/demo/secured/hello') && preg_match('#^/demo/secured/hello/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',)), array('_route' => '_demo_secured_hello'));
        }

        // _demo_secured_hello_admin
        if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',)), array('_route' => '_demo_secured_hello_admin'));
        }

        if (0 === strpos($pathinfo, '/demo')) {
            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',)), array('_route' => '_demo_hello'));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        // _wdt
        if (preg_match('#^/_wdt/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',)), array('_route' => '_wdt'));
        }

        if (0 === strpos($pathinfo, '/_profiler')) {
            // _profiler_search
            if ($pathinfo === '/_profiler/search') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',  '_route' => '_profiler_search',);
            }

            // _profiler_purge
            if ($pathinfo === '/_profiler/purge') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',  '_route' => '_profiler_purge',);
            }

            // _profiler_import
            if ($pathinfo === '/_profiler/import') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',  '_route' => '_profiler_import',);
            }

            // _profiler_export
            if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]+?)\\.txt$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',)), array('_route' => '_profiler_export'));
            }

            // _profiler_search_results
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)/search/results$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',)), array('_route' => '_profiler_search_results'));
            }

            // _profiler
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array('_route' => '_profiler'));
            }

        }

        if (0 === strpos($pathinfo, '/_configurator')) {
            // _configurator_home
            if (rtrim($pathinfo, '/') === '/_configurator') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_configurator_home');
                }
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
            }

            // _configurator_step
            if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',)), array('_route' => '_configurator_step'));
            }

            // _configurator_final
            if ($pathinfo === '/_configurator/final') {
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
            }

        }

        // attribute
        if (rtrim($pathinfo, '/') === '/attribute') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'attribute');
            }
            return array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\AttributeController::indexAction',  '_route' => 'attribute',);
        }

        // attribute_show
        if (0 === strpos($pathinfo, '/attribute') && preg_match('#^/attribute/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\AttributeController::showAction',)), array('_route' => 'attribute_show'));
        }

        // attribute_new
        if ($pathinfo === '/attribute/new') {
            return array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\AttributeController::newAction',  '_route' => 'attribute_new',);
        }

        // attribute_create
        if ($pathinfo === '/attribute/create') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_attribute_create;
            }
            return array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\AttributeController::createAction',  '_route' => 'attribute_create',);
        }
        not_attribute_create:

        // attribute_edit
        if (0 === strpos($pathinfo, '/attribute') && preg_match('#^/attribute/(?P<id>[^/]+?)/edit$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\AttributeController::editAction',)), array('_route' => 'attribute_edit'));
        }

        // attribute_update
        if (0 === strpos($pathinfo, '/attribute') && preg_match('#^/attribute/(?P<id>[^/]+?)/update$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_attribute_update;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\AttributeController::updateAction',)), array('_route' => 'attribute_update'));
        }
        not_attribute_update:

        // attribute_delete
        if (0 === strpos($pathinfo, '/attribute') && preg_match('#^/attribute/(?P<id>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_attribute_delete;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\AttributeController::deleteAction',)), array('_route' => 'attribute_delete'));
        }
        not_attribute_delete:

        // category
        if (rtrim($pathinfo, '/') === '/category') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'category');
            }
            return array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\CategoryController::indexAction',  '_route' => 'category',);
        }

        // category_show
        if (0 === strpos($pathinfo, '/category') && preg_match('#^/category/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\CategoryController::showAction',)), array('_route' => 'category_show'));
        }

        // category_new
        if ($pathinfo === '/category/new') {
            return array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\CategoryController::newAction',  '_route' => 'category_new',);
        }

        // category_create
        if ($pathinfo === '/category/create') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_category_create;
            }
            return array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\CategoryController::createAction',  '_route' => 'category_create',);
        }
        not_category_create:

        // category_edit
        if (0 === strpos($pathinfo, '/category') && preg_match('#^/category/(?P<id>[^/]+?)/edit$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\CategoryController::editAction',)), array('_route' => 'category_edit'));
        }

        // category_update
        if (0 === strpos($pathinfo, '/category') && preg_match('#^/category/(?P<id>[^/]+?)/update$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_category_update;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\CategoryController::updateAction',)), array('_route' => 'category_update'));
        }
        not_category_update:

        // category_delete
        if (0 === strpos($pathinfo, '/category') && preg_match('#^/category/(?P<id>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_category_delete;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\CategoryController::deleteAction',)), array('_route' => 'category_delete'));
        }
        not_category_delete:

        // club
        if (rtrim($pathinfo, '/') === '/club') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'club');
            }
            return array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\ClubController::indexAction',  '_route' => 'club',);
        }

        // club_show
        if (0 === strpos($pathinfo, '/club') && preg_match('#^/club/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\ClubController::showAction',)), array('_route' => 'club_show'));
        }

        // club_new
        if ($pathinfo === '/club/new') {
            return array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\ClubController::newAction',  '_route' => 'club_new',);
        }

        // club_create
        if ($pathinfo === '/club/create') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_club_create;
            }
            return array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\ClubController::createAction',  '_route' => 'club_create',);
        }
        not_club_create:

        // club_edit
        if (0 === strpos($pathinfo, '/club') && preg_match('#^/club/(?P<id>[^/]+?)/edit$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\ClubController::editAction',)), array('_route' => 'club_edit'));
        }

        // club_update
        if (0 === strpos($pathinfo, '/club') && preg_match('#^/club/(?P<id>[^/]+?)/update$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_club_update;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\ClubController::updateAction',)), array('_route' => 'club_update'));
        }
        not_club_update:

        // club_delete
        if (0 === strpos($pathinfo, '/club') && preg_match('#^/club/(?P<id>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_club_delete;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\ClubController::deleteAction',)), array('_route' => 'club_delete'));
        }
        not_club_delete:

        // country
        if (rtrim($pathinfo, '/') === '/country') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'country');
            }
            return array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\CountryController::indexAction',  '_route' => 'country',);
        }

        // country_show
        if (0 === strpos($pathinfo, '/country') && preg_match('#^/country/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\CountryController::showAction',)), array('_route' => 'country_show'));
        }

        // actualskill_site_default_index
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\DefaultController::indexAction',)), array('_route' => 'actualskill_site_default_index'));
        }

        // player
        if (rtrim($pathinfo, '/') === '/player') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'player');
            }
            return array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\PlayerController::indexAction',  '_route' => 'player',);
        }

        // player_show
        if (0 === strpos($pathinfo, '/player') && preg_match('#^/player/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\PlayerController::showAction',)), array('_route' => 'player_show'));
        }

        // player_new
        if ($pathinfo === '/player/new') {
            return array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\PlayerController::newAction',  '_route' => 'player_new',);
        }

        // player_create
        if ($pathinfo === '/player/create') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_player_create;
            }
            return array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\PlayerController::createAction',  '_route' => 'player_create',);
        }
        not_player_create:

        // player_edit
        if (0 === strpos($pathinfo, '/player') && preg_match('#^/player/(?P<id>[^/]+?)/edit$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\PlayerController::editAction',)), array('_route' => 'player_edit'));
        }

        // player_update
        if (0 === strpos($pathinfo, '/player') && preg_match('#^/player/(?P<id>[^/]+?)/update$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_player_update;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\PlayerController::updateAction',)), array('_route' => 'player_update'));
        }
        not_player_update:

        // player_delete
        if (0 === strpos($pathinfo, '/player') && preg_match('#^/player/(?P<id>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_player_delete;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\PlayerController::deleteAction',)), array('_route' => 'player_delete'));
        }
        not_player_delete:

        // stadium
        if (rtrim($pathinfo, '/') === '/stadium') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'stadium');
            }
            return array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\StadiumController::indexAction',  '_route' => 'stadium',);
        }

        // stadium_show
        if (0 === strpos($pathinfo, '/stadium') && preg_match('#^/stadium/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\StadiumController::showAction',)), array('_route' => 'stadium_show'));
        }

        // stadium_new
        if ($pathinfo === '/stadium/new') {
            return array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\StadiumController::newAction',  '_route' => 'stadium_new',);
        }

        // stadium_create
        if ($pathinfo === '/stadium/create') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_stadium_create;
            }
            return array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\StadiumController::createAction',  '_route' => 'stadium_create',);
        }
        not_stadium_create:

        // stadium_edit
        if (0 === strpos($pathinfo, '/stadium') && preg_match('#^/stadium/(?P<id>[^/]+?)/edit$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\StadiumController::editAction',)), array('_route' => 'stadium_edit'));
        }

        // stadium_update
        if (0 === strpos($pathinfo, '/stadium') && preg_match('#^/stadium/(?P<id>[^/]+?)/update$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_stadium_update;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\StadiumController::updateAction',)), array('_route' => 'stadium_update'));
        }
        not_stadium_update:

        // stadium_delete
        if (0 === strpos($pathinfo, '/stadium') && preg_match('#^/stadium/(?P<id>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_stadium_delete;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\StadiumController::deleteAction',)), array('_route' => 'stadium_delete'));
        }
        not_stadium_delete:

        // fos_user_security_login
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
        }

        // fos_user_security_check
        if ($pathinfo === '/login_check') {
            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
        }

        // fos_user_security_logout
        if ($pathinfo === '/logout') {
            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/register')) {
            // fos_user_registration_register
            if (rtrim($pathinfo, '/') === '/register') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                }
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
            }

            // fos_user_registration_check_email
            if ($pathinfo === '/register/check-email') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_registration_check_email;
                }
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
            }
            not_fos_user_registration_check_email:

            // fos_user_registration_confirm
            if (0 === strpos($pathinfo, '/register/confirm') && preg_match('#^/register/confirm/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_registration_confirm;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',)), array('_route' => 'fos_user_registration_confirm'));
            }
            not_fos_user_registration_confirm:

            // fos_user_registration_confirmed
            if ($pathinfo === '/register/confirmed') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_registration_confirmed;
                }
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
            }
            not_fos_user_registration_confirmed:

        }

        if (0 === strpos($pathinfo, '/resetting')) {
            // fos_user_resetting_request
            if ($pathinfo === '/resetting/request') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_resetting_request;
                }
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
            }
            not_fos_user_resetting_request:

            // fos_user_resetting_send_email
            if ($pathinfo === '/resetting/send-email') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_fos_user_resetting_send_email;
                }
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
            }
            not_fos_user_resetting_send_email:

            // fos_user_resetting_check_email
            if ($pathinfo === '/resetting/check-email') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_resetting_check_email;
                }
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
            }
            not_fos_user_resetting_check_email:

            // fos_user_resetting_reset
            if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_resetting_reset;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',)), array('_route' => 'fos_user_resetting_reset'));
            }
            not_fos_user_resetting_reset:

        }

        // fos_user_change_password
        if ($pathinfo === '/change-password/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }
            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
