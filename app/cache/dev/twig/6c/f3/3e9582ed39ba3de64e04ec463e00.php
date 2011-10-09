<?php

/* ActualSkillSiteBundle:Player:showSite.html.twig */
class __TwigTemplate_6cf33e9582ed39ba3de64e04ec463e00 extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = array();
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    public function getParent(array $context)
    {
        $parent = "ActualSkillSiteBundle::base.html.twig";
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
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<h1>Player</h1>

<table>
    <tbody>
        <tr>
            <th>Type</th>                
            <td>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'player'), "type", array(), "any", false), "html");
        echo "</td>        
        </tr>
        <tr>
            <th>Firstname</th>                
            <td>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'player'), "firstname", array(), "any", false), "html");
        echo "</td>        
        </tr>
        <tr>
            <th>Lastname</th>                
            <td>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'player'), "lastname", array(), "any", false), "html");
        echo "</td>        
        </tr>
        <tr>
            <th>Nickname</th>                
            <td>";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'player'), "nickname", array(), "any", false), "html");
        echo "</td>        
        </tr>
        <tr>
            <th>Birthday</th>                
            <td>";
        // line 26
        echo twig_escape_filter($this->env, twig_date_format_filter($this->getAttribute($this->getContext($context, 'player'), "birthday", array(), "any", false), "Y-m-d"), "html");
        echo "</td>        
        </tr>
        <tr>
            <th>Age</th>                
            <td>";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'player'), "age", array(), "any", false), "html");
        echo "</td>        
        </tr>        
        <tr>
            <th>Height</th>                
            <td>";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'player'), "height", array(), "any", false), "html");
        echo "</td>        
        </tr>
        <tr>
            <th>Weight</th>                
            <td>";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'player'), "weight", array(), "any", false), "html");
        echo "</td>        
        </tr>
    </tbody>
</table>

<br/><br/>

";
        // line 45
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, 'player'), "comments", array(), "any", false));
        foreach ($context['_seq'] as $context['_key'] => $context['comment']) {
            // line 46
            echo "    ceomment
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 48
        echo "
    
\t<script>
\t\$(function() {
\t\t\$( \"#tabs\" ).tabs();
\t});
\t</script>



<div id=\"tabs\">

<ul>
";
        // line 61
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'categories'));
        foreach ($context['_seq'] as $context['_key'] => $context['category']) {
            // line 62
            echo "    <li><a href=\"#tabs-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'category'), "id", array(), "any", false), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'category'), "name", array(), "any", false), "html");
            echo "</a></li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 63
        echo "        
</ul>
    
    
";
        // line 67
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'categories'));
        foreach ($context['_seq'] as $context['_key'] => $context['category']) {
            // line 68
            echo "    
    <div id=\"tabs-";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'category'), "id", array(), "any", false), "html");
            echo "\">
    ";
            // line 70
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, 'category'), "attributes", array(), "any", false));
            foreach ($context['_seq'] as $context['_key'] => $context['attribute']) {
                echo "    
            <div>";
                // line 71
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'attribute'), "name", array(), "any", false), "html");
                echo "</div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attribute'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 73
            echo "    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 74
        echo "            
    
";
    }

    public function getTemplateName()
    {
        return "ActualSkillSiteBundle:Player:showSite.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
