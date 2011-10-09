<?php

/* ActualSkillSiteBundle:Country:show.html.twig */
class __TwigTemplate_f0a77d1de82abe7e35997b02adbf85fd extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<h1>Country</h1>

<table class=\"record_properties\">
    <tbody>
        <tr>
            <th>Id</th>
            <td>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false), "html");
        echo "</td>
        </tr>
        <tr>
            <th>Iso2</th>
            <td>";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "iso2", array(), "any", false), "html");
        echo "</td>
        </tr>
        <tr>
            <th>Iso3</th>
            <td>";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "iso3", array(), "any", false), "html");
        echo "</td>
        </tr>
        <tr>
            <th>Iso_numeric</th>
            <td>";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "isonumeric", array(), "any", false), "html");
        echo "</td>
        </tr>
        <tr>
            <th>Fips</th>
            <td>";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "fips", array(), "any", false), "html");
        echo "</td>
        </tr>
        <tr>
            <th>Country</th>
            <td>";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "country", array(), "any", false), "html");
        echo "</td>
        </tr>
        <tr>
            <th>Capital</th>
            <td>";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "capital", array(), "any", false), "html");
        echo "</td>
        </tr>
        <tr>
            <th>Area</th>
            <td>";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "area", array(), "any", false), "html");
        echo "</td>
        </tr>
        <tr>
            <th>Population</th>
            <td>";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "population", array(), "any", false), "html");
        echo "</td>
        </tr>
        <tr>
            <th>Continent</th>
            <td>";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "continent", array(), "any", false), "html");
        echo "</td>
        </tr>
        <tr>
            <th>Currency_code</th>
            <td>";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "currencycode", array(), "any", false), "html");
        echo "</td>
        </tr>
        <tr>
            <th>Currency_name</th>
            <td>";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "currencyname", array(), "any", false), "html");
        echo "</td>
        </tr>
        <tr>
            <th>Languages</th>
            <td>";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "languages", array(), "any", false), "html");
        echo "</td>
        </tr>
        <tr>
            <th>Geonameid</th>
            <td>";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "geonameid", array(), "any", false), "html");
        echo "</td>
        </tr>
    </tbody>
</table>

<ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("country"), "html");
        echo "\">
            Back to the list
        </a>
    </li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "ActualSkillSiteBundle:Country:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
