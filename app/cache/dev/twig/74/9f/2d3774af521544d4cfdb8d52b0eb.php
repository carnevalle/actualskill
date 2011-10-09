<?php

/* ActualSkillSiteBundle:Country:index.html.twig */
class __TwigTemplate_749f2d3774af521544d4cfdb8d52b0eb extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<h1>Country list</h1>

<table class=\"records_list\">
    <thead>
        <tr>
            <th>Id</th>
            <th>Iso2</th>
            <th>Iso3</th>
            <th>Iso_numeric</th>
            <th>Fips</th>
            <th>Country</th>
            <th>Capital</th>
            <th>Area</th>
            <th>Population</th>
            <th>Continent</th>
            <th>Currency_code</th>
            <th>Currency_name</th>
            <th>Languages</th>
            <th>Geonameid</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    ";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'entities'));
        foreach ($context['_seq'] as $context['_key'] => $context['entity']) {
            // line 25
            echo "        <tr>
            <td><a href=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("country_show", array("id" => $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false))), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false), "html");
            echo "</a></td>
            <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "iso2", array(), "any", false), "html");
            echo "</td>
            <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "iso3", array(), "any", false), "html");
            echo "</td>
            <td>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "isonumeric", array(), "any", false), "html");
            echo "</td>
            <td>";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "fips", array(), "any", false), "html");
            echo "</td>
            <td>";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "country", array(), "any", false), "html");
            echo "</td>
            <td>";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "capital", array(), "any", false), "html");
            echo "</td>
            <td>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "area", array(), "any", false), "html");
            echo "</td>
            <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "population", array(), "any", false), "html");
            echo "</td>
            <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "continent", array(), "any", false), "html");
            echo "</td>
            <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "currencycode", array(), "any", false), "html");
            echo "</td>
            <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "currencyname", array(), "any", false), "html");
            echo "</td>
            <td>";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "languages", array(), "any", false), "html");
            echo "</td>
            <td>";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'entity'), "geonameid", array(), "any", false), "html");
            echo "</td>
            <td>
                <ul>
                    <li>
                        <a href=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("country_show", array("id" => $this->getAttribute($this->getContext($context, 'entity'), "id", array(), "any", false))), "html");
            echo "\">show</a>
                    </li>
                </ul>
            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 49
        echo "    </tbody>
</table>

";
    }

    public function getTemplateName()
    {
        return "ActualSkillSiteBundle:Country:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
