<?php

/* ActualSkillSiteBundle:Category:edit.html.twig */
class __TwigTemplate_c39ae2a25757344b72e02d7c7ef77513 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<h1>Category edit</h1>

<form action=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("category_update", array("id" => $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false))), "html");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, 'edit_form'));
        echo ">
    ";
        // line 4
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, 'edit_form'));
        echo "
    <p>
        <button type=\"submit\">Edit</button>
    </p>
</form>

<ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("category"), "html");
        echo "\">
            Back to the list
        </a>
    </li>
    <li>
        <form action=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("category_delete", array("id" => $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false))), "html");
        echo "\" method=\"post\">
            ";
        // line 18
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, 'delete_form'));
        echo "
            <button type=\"submit\">Delete</button>
        </form>
    </li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "ActualSkillSiteBundle:Category:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
