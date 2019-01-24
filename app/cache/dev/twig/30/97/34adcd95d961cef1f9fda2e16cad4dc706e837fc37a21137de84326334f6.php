<?php

/* selector.html.twig */
class __TwigTemplate_309734adcd95d961cef1f9fda2e16cad4dc706e837fc37a21137de84326334f6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<ul>
";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["locales"]) ? $context["locales"] : $this->getContext($context, "locales")));
        foreach ($context['_seq'] as $context["name"] => $context["lang"]) {
            // line 3
            echo "    ";
            $context["locale"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "_locale"), "method");
            // line 4
            echo "    ";
            $context["name"] = ("selector." . $context["name"]);
            // line 5
            echo "    ";
            if (((isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")) == $context["lang"])) {
                // line 6
                echo "        <li class=\"current\">
            <span>
                ";
                // line 8
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["name"]), "html", null, true);
                echo "
            </span>   
        </li>        
    ";
            } else {
                // line 12
                echo "        <li>
            <a class=\"";
                // line 13
                echo twig_escape_filter($this->env, $context["lang"], "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "_route"), "method"), twig_array_merge($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "_route_params"), "method"), array("_locale" => $context["lang"]))), "html", null, true);
                echo "\">
                ";
                // line 14
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["name"]), "html", null, true);
                echo "
            </a>            
        </li>    
    ";
            }
            // line 18
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['lang'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "</ul>";
    }

    public function getTemplateName()
    {
        return "selector.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 20,  62 => 18,  55 => 14,  49 => 13,  46 => 12,  39 => 8,  35 => 6,  32 => 5,  29 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }
}
