<?php

/* ActualSkillSiteBundle:Club:show.html.twig */
class __TwigTemplate_a66ad3acf4127f263e0879bb4761f4d1 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<h1>Club</h1>

<table class=\"record_properties\">
    <tbody>
        <tr>
            <th>Id</th>
            <td>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'club'), "id", array(), "any", false), "html");
        echo "</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'club'), "name", array(), "any", false), "html");
        echo "</td>
        </tr>
        <tr>
            <th>Shortname</th>
            <td>";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'club'), "shortname", array(), "any", false), "html");
        echo "</td>
        </tr>
    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "ActualSkillSiteBundle:Club:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
