<?php

/* FOSUserBundle:Resetting:email.txt.twig */
class __TwigTemplate_8ce74bfcba940885b223c1f9c2806007 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 2
        echo $this->env->getExtension('translator')->trans("resetting.email", array("%username%" => $this->getAttribute($this->getContext($context, 'user'), "username", array(), "any", false), "%confirmationUrl%" => $this->getContext($context, 'confirmationUrl')), "FOSUserBundle");
        echo "
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Resetting:email.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
