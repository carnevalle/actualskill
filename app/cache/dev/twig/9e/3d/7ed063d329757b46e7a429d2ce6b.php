<?php

/* FOSUserBundle:Registration:confirmed.html.twig */
class __TwigTemplate_9e3d7ed063d329757b46e7a429d2ce6b extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = array();
        $this->blocks = array(
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    public function getParent(array $context)
    {
        $parent = "FOSUserBundle::layout.html.twig";
        if ($parent instanceof Twig_Template) {
            $name = $parent->getTemplateName();
            $this->parent[$name] = $parent;
            $parent = $name;
        } elseif (!isset($this->parent[$parent])) {
            $this->parent[$parent] = $this->env->loadTemplate($parent);
        }

        return $this->parent[$parent];
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 4
        echo "    <p>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("registration.confirmed", array("%username%" => $this->getAttribute($this->getContext($context, 'user'), "username", array(), "any", false)), "FOSUserBundle"), "html");
        echo "</p>
    ";
        // line 5
        if ((!twig_test_empty($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false)))) {
            // line 6
            echo "        ";
            $context['targetUrl'] = $this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false), "get", array("_security.target_path", ), "method", false);
            // line 7
            echo "        ";
            if ((!twig_test_empty($this->getContext($context, 'targetUrl')))) {
                echo "<p><a href=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, 'targetUrl'), "html");
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("registration.back", array(), "FOSUserBundle"), "html");
                echo "</a></p>";
            }
            // line 8
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Registration:confirmed.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
