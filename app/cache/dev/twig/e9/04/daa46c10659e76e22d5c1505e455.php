<?php

/* ActualSkillSiteBundle::base.html.twig */
class __TwigTemplate_e904daa46c10659e76e22d5c1505e455 extends Twig_Template
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
        
         <script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js\"></script>
         <script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.15/jquery-ui.min.js\"></script>
         

        ";
        // line 11
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "b0ca872_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b0ca872_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/styles_part_1_site_1.css");
            // line 12
            echo "            <link href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, 'asset_url'), "html");
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
        ";
        } else {
            // asset "b0ca872"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b0ca872") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/styles.css");
            echo "            <link href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, 'asset_url'), "html");
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
        ";
        }
        unset($context["asset_url"]);
        // line 14
        echo "    
    </head>
    <body>
        <div id=\"topbar\">
            ";
        // line 18
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 19
            echo "                ";
            echo "layout.logged_in_as";
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "user", array(), "any", false), "username", array(), "any", false), "html");
            echo "
                <a href=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_logout"), "html");
            echo "\">
                    ";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logout", array(), "FOSUserBundle"), "html");
            echo "
                </a>
            ";
        } else {
            // line 24
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_login"), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.login", array(), "FOSUserBundle"), "html");
            echo "</a>
            ";
        }
        // line 26
        echo "        </div>

        <div id=\"header\">
            ";
        // line 29
        $this->displayBlock('header', $context, $blocks);
        // line 37
        echo "        </div>

        <div id=\"navigation\">
            ";
        // line 40
        $this->displayBlock('navigation', $context, $blocks);
        // line 42
        echo "        </div>

        <div id=\"content\">
            ";
        // line 45
        $this->displayBlock('body', $context, $blocks);
        // line 46
        echo "        </div>

        <div id=\"footer\">
            ";
        // line 49
        $this->displayBlock('footer', $context, $blocks);
        // line 50
        echo "        </div>
    </body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "ActualSkill";
    }

    // line 29
    public function block_header($context, array $blocks = array())
    {
        // line 30
        echo "            <ul style=\"list-style-type: none;\">
                <li style=\"display: inline;\"><a href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_welcome"), "html");
        echo "\">Home</a></li>
                <li style=\"display: inline;\"><a href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("club"), "html");
        echo "\">Clubs</a></li>
                <li style=\"display: inline;\"><a href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("site_players"), "html");
        echo "\">Players</a></li>
                <li style=\"display: inline;\"><a href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_admin"), "html");
        echo "\">Admin</a></li>
            </ul>
            ";
    }

    // line 40
    public function block_navigation($context, array $blocks = array())
    {
        // line 41
        echo "            ";
    }

    // line 45
    public function block_body($context, array $blocks = array())
    {
    }

    // line 49
    public function block_footer($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "ActualSkillSiteBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
