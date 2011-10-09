<?php

/* ActualSkillSiteBundle:Player:showAdmin.html.twig */
class __TwigTemplate_c0663e2840c4d6d4ce9d9693d1b93955 extends Twig_Template
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
        <tr>
            <th>Height</th>                <td>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "height", array(), "any", false), "html");
        echo "</td>        </tr>
        <tr>
            <th>Weight</th>                <td>";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "weight", array(), "any", false), "html");
        echo "</td>        </tr>
    </tbody>
</table>

<ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_player"), "html");
        echo "\">
            Back to the list
        </a>
    </li>
    <li>
        <a href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_player_edit", array("id" => $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false))), "html");
        echo "\">
            Edit
        </a>
    </li>
    <li>
        <form action=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_player_delete", array("id" => $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false))), "html");
        echo "\" method=\"post\">
            ";
        // line 37
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
        return "ActualSkillSiteBundle:Player:showAdmin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
