<?php

/* FOSUserBundle:Resetting:reset_content.html.twig */
class __TwigTemplate_dc68368df9ba003d5f6a5c2384051fc0 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo $this->env->getExtension('form')->setTheme($this->getContext($context, 'form'), array($this->getContext($context, 'theme'), ));
        // line 2
        echo "<form action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_resetting_reset", array("token" => $this->getContext($context, 'token'))), "html");
        echo "\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, 'form'));
        echo " method=\"POST\" class=\"fos_user_resetting_reset\">
    ";
        // line 3
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, 'form'));
        echo "
    <div>
        <input type=\"submit\" value=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.reset.submit", array(), "FOSUserBundle"), "html");
        echo "\" />
    </div>
</form>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Resetting:reset_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
