<?php

/* ActualSkillSiteBundle:Player:show.html.twig */
class __TwigTemplate_86b6267a1d6b2130a7ec02f54e26515a extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<h1>Player</h1>

<table class=\"record_properties\">
    <tbody>
        <tr>
            <th>Id</th>                <td>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false), "html");
        echo "</td>        </tr>
        <tr>
            <th>Slug</th>                <td>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "slug", array(), "any", false), "html");
        echo "</td>        </tr>
        <tr>
            <th>Firstname</th>                <td>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "firstname", array(), "any", false), "html");
        echo "</td>        </tr>
        <tr>
            <th>Lastname</th>                <td>";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "lastname", array(), "any", false), "html");
        echo "</td>        </tr>
        <tr>
            <th>Nickname</th>                <td>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "nickname", array(), "any", false), "html");
        echo "</td>        </tr>
        <tr>
            <th>Birthday</th>                <td>";
        // line 16
        echo twig_escape_filter($this->env, twig_date_format_filter($this->getAttribute($this->getContext($context, 'entity'), "birthday", array(), "any", false), "Y-m-d H:i:s"), "html");
        echo "</td>        </tr>
    </tbody>
</table>

<ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("player"), "html");
        echo "\">
            Back to the list
        </a>
    </li>
    <li>
        <a href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("player_edit", array("id" => $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false))), "html");
        echo "\">
            Edit
        </a>
    </li>
    <li>
        <form action=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("player_delete", array("id" => $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false))), "html");
        echo "\" method=\"post\">
            ";
        // line 33
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
        return "ActualSkillSiteBundle:Player:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
