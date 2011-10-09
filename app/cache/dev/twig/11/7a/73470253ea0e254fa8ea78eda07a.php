<?php

/* ActualSkillSiteBundle::admin.html.twig */
class __TwigTemplate_117a73470253ea0e254fa8ea78eda07a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = array();
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'navigation' => array($this, 'block_navigation'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    </head>
    <body>
        <div id=\"topbar\">
            ";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "user", array(), "any", false), "username", array(), "any", false), "html");
        echo "
            ";
        // line 10
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 11
            echo "                ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logged_in_as", array("%username%" => $this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "user", array(), "any", false), "username", array(), "any", false)), "FOSUserBundle"), "html");
            echo " |
                <a href=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_logout"), "html");
            echo "\">
                    ";
            // line 13
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logout", array(), "FOSUserBundle"), "html");
            echo "
                </a>
            ";
        } else {
            // line 16
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_login"), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.login", array(), "FOSUserBundle"), "html");
            echo "</a>
            ";
        }
        // line 18
        echo "
        </div>

        <div id=\"header\">
            ";
        // line 22
        $this->displayBlock('header', $context, $blocks);
        // line 23
        echo "        </div>

        <div id=\"navigation\">
            ";
        // line 26
        $this->displayBlock('navigation', $context, $blocks);
        // line 32
        echo "        </div>

        <div id=\"content\">
            ";
        // line 35
        $this->displayBlock('body', $context, $blocks);
        // line 36
        echo "        </div>

        <div id=\"footer\">
            ";
        // line 39
        $this->displayBlock('footer', $context, $blocks);
        // line 40
        echo "        </div>
    </body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Test Application";
    }

    // line 22
    public function block_header($context, array $blocks = array())
    {
    }

    // line 26
    public function block_navigation($context, array $blocks = array())
    {
        // line 27
        echo "            <ul style=\"list-style-type: none;\">
                <li style=\"display: inline;\"><a href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_admin"), "html");
        echo "\">Home</a></li>
                <li style=\"display: inline;\"><a href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_player"), "html");
        echo "\">Players</a></li>
            </ul>
            ";
    }

    // line 35
    public function block_body($context, array $blocks = array())
    {
    }

    // line 39
    public function block_footer($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "ActualSkillSiteBundle::admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
