<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;


/**
 * appdevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRouteNames = array(
       '_welcome' => true,
       '_demo_login' => true,
       '_security_check' => true,
       '_demo_logout' => true,
       'acme_demo_secured_hello' => true,
       '_demo_secured_hello' => true,
       '_demo_secured_hello_admin' => true,
       '_demo' => true,
       '_demo_hello' => true,
       '_demo_contact' => true,
       '_wdt' => true,
       '_profiler_search' => true,
       '_profiler_purge' => true,
       '_profiler_import' => true,
       '_profiler_export' => true,
       '_profiler_search_results' => true,
       '_profiler' => true,
       '_configurator_home' => true,
       '_configurator_step' => true,
       '_configurator_final' => true,
       'attribute' => true,
       'attribute_show' => true,
       'attribute_new' => true,
       'attribute_create' => true,
       'attribute_edit' => true,
       'attribute_update' => true,
       'attribute_delete' => true,
       'category' => true,
       'category_show' => true,
       'category_new' => true,
       'category_create' => true,
       'category_edit' => true,
       'category_update' => true,
       'category_delete' => true,
       'club' => true,
       'club_show' => true,
       'club_new' => true,
       'club_create' => true,
       'club_edit' => true,
       'club_update' => true,
       'club_delete' => true,
       'country' => true,
       'country_show' => true,
       'actualskill_site_default_index' => true,
       'player' => true,
       'player_show' => true,
       'player_new' => true,
       'player_create' => true,
       'player_edit' => true,
       'player_update' => true,
       'player_delete' => true,
       'stadium' => true,
       'stadium_show' => true,
       'stadium_new' => true,
       'stadium_create' => true,
       'stadium_edit' => true,
       'stadium_update' => true,
       'stadium_delete' => true,
       'fos_user_security_login' => true,
       'fos_user_security_check' => true,
       'fos_user_security_logout' => true,
       'fos_user_profile_show' => true,
       'fos_user_profile_edit' => true,
       'fos_user_registration_register' => true,
       'fos_user_registration_check_email' => true,
       'fos_user_registration_confirm' => true,
       'fos_user_registration_confirmed' => true,
       'fos_user_resetting_request' => true,
       'fos_user_resetting_send_email' => true,
       'fos_user_resetting_check_email' => true,
       'fos_user_resetting_reset' => true,
       'fos_user_change_password' => true,
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function generate($name, $parameters = array(), $absolute = false)
    {
        if (!isset(self::$declaredRouteNames[$name])) {
            throw new RouteNotFoundException(sprintf('Route "%s" does not exist.', $name));
        }

        $escapedName = str_replace('.', '__', $name);

        list($variables, $defaults, $requirements, $tokens) = $this->{'get'.$escapedName.'RouteInfo'}();

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $absolute);
    }

    private function get_welcomeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function get_demo_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/login',  ),));
    }

    private function get_security_checkRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/login_check',  ),));
    }

    private function get_demo_logoutRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/logout',  ),));
    }

    private function getacme_demo_secured_helloRouteInfo()
    {
        return array(array (), array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/hello',  ),));
    }

    private function get_demo_secured_helloRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/demo/secured/hello',  ),));
    }

    private function get_demo_secured_hello_adminRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/demo/secured/hello/admin',  ),));
    }

    private function get_demoRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/',  ),));
    }

    private function get_demo_helloRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/demo/hello',  ),));
    }

    private function get_demo_contactRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/contact',  ),));
    }

    private function get_wdtRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_wdt',  ),));
    }

    private function get_profiler_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/search',  ),));
    }

    private function get_profiler_purgeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/purge',  ),));
    }

    private function get_profiler_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/import',  ),));
    }

    private function get_profiler_exportRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '.txt',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/\\.]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler/export',  ),));
    }

    private function get_profiler_search_resultsRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/search/results',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_profilerRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_configurator_homeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/',  ),));
    }

    private function get_configurator_stepRouteInfo()
    {
        return array(array (  0 => 'index',), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'index',  ),  1 =>   array (    0 => 'text',    1 => '/_configurator/step',  ),));
    }

    private function get_configurator_finalRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/final',  ),));
    }

    private function getattributeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\AttributeController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/attribute/',  ),));
    }

    private function getattribute_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\AttributeController::showAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/show',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/attribute',  ),));
    }

    private function getattribute_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\AttributeController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/attribute/new',  ),));
    }

    private function getattribute_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\AttributeController::createAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/attribute/create',  ),));
    }

    private function getattribute_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\AttributeController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/attribute',  ),));
    }

    private function getattribute_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\AttributeController::updateAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/update',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/attribute',  ),));
    }

    private function getattribute_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\AttributeController::deleteAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/attribute',  ),));
    }

    private function getcategoryRouteInfo()
    {
        return array(array (), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\CategoryController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/category/',  ),));
    }

    private function getcategory_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\CategoryController::showAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/show',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/category',  ),));
    }

    private function getcategory_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\CategoryController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/category/new',  ),));
    }

    private function getcategory_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\CategoryController::createAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/category/create',  ),));
    }

    private function getcategory_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\CategoryController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/category',  ),));
    }

    private function getcategory_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\CategoryController::updateAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/update',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/category',  ),));
    }

    private function getcategory_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\CategoryController::deleteAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/category',  ),));
    }

    private function getclubRouteInfo()
    {
        return array(array (), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\ClubController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/club/',  ),));
    }

    private function getclub_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\ClubController::showAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/show',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/club',  ),));
    }

    private function getclub_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\ClubController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/club/new',  ),));
    }

    private function getclub_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\ClubController::createAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/club/create',  ),));
    }

    private function getclub_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\ClubController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/club',  ),));
    }

    private function getclub_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\ClubController::updateAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/update',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/club',  ),));
    }

    private function getclub_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\ClubController::deleteAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/club',  ),));
    }

    private function getcountryRouteInfo()
    {
        return array(array (), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\CountryController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/country/',  ),));
    }

    private function getcountry_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\CountryController::showAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/show',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/country',  ),));
    }

    private function getactualskill_site_default_indexRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/hello',  ),));
    }

    private function getplayerRouteInfo()
    {
        return array(array (), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\PlayerController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/player/',  ),));
    }

    private function getplayer_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\PlayerController::showAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/show',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/player',  ),));
    }

    private function getplayer_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\PlayerController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/player/new',  ),));
    }

    private function getplayer_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\PlayerController::createAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/player/create',  ),));
    }

    private function getplayer_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\PlayerController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/player',  ),));
    }

    private function getplayer_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\PlayerController::updateAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/update',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/player',  ),));
    }

    private function getplayer_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\PlayerController::deleteAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/player',  ),));
    }

    private function getstadiumRouteInfo()
    {
        return array(array (), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\StadiumController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/stadium/',  ),));
    }

    private function getstadium_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\StadiumController::showAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/show',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/stadium',  ),));
    }

    private function getstadium_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\StadiumController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/stadium/new',  ),));
    }

    private function getstadium_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\StadiumController::createAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/stadium/create',  ),));
    }

    private function getstadium_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\StadiumController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/stadium',  ),));
    }

    private function getstadium_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\StadiumController::updateAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/update',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/stadium',  ),));
    }

    private function getstadium_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'ActualSkill\\SiteBundle\\Controller\\StadiumController::deleteAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/stadium',  ),));
    }

    private function getfos_user_security_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/login',  ),));
    }

    private function getfos_user_security_checkRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/login_check',  ),));
    }

    private function getfos_user_security_logoutRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/logout',  ),));
    }

    private function getfos_user_profile_showRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/profile/',  ),));
    }

    private function getfos_user_profile_editRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/profile/edit',  ),));
    }

    private function getfos_user_registration_registerRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/register/',  ),));
    }

    private function getfos_user_registration_check_emailRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/register/check-email',  ),));
    }

    private function getfos_user_registration_confirmRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/register/confirm',  ),));
    }

    private function getfos_user_registration_confirmedRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/register/confirmed',  ),));
    }

    private function getfos_user_resetting_requestRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/resetting/request',  ),));
    }

    private function getfos_user_resetting_send_emailRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/resetting/send-email',  ),));
    }

    private function getfos_user_resetting_check_emailRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/resetting/check-email',  ),));
    }

    private function getfos_user_resetting_resetRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',), array (  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/resetting/reset',  ),));
    }

    private function getfos_user_change_passwordRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',), array (  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'text',    1 => '/change-password/change-password',  ),));
    }
}
