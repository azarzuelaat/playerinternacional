<?php

/* default/index.html.twig */
class __TwigTemplate_df7cf95b317098afca53a905dcc179148a85269891c585074661cdbdf407cdce extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("base.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
<div class=\"form_content\">

    <div id=\"parrilla\">
        <ul class=\"tabs\">
            ";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_array_keys_filter((isset($context["promosPerWeek"]) ? $context["promosPerWeek"] : $this->getContext($context, "promosPerWeek"))));
        foreach ($context['_seq'] as $context["_key"] => $context["key"]) {
            // line 10
            echo "            <li><a href=\"#";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["key"]), "html", null, true);
            echo "</a></li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['key'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "        </ul>

        <ul class=\"promo title\">
            <li class=\"hour\">";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("city.ba"), "html", null, true);
        echo "</li>
            <li class=\"hour\">";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("city.ny"), "html", null, true);
        echo "</li>
            <li class=\"hour\">";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("city.mex"), "html", null, true);
        echo "</li>                
            <li class=\"detail\">
                ";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.learn_more"), "html", null, true);
        echo "
            </li>
        </ul>        
        
        ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["promosPerWeek"]) ? $context["promosPerWeek"] : $this->getContext($context, "promosPerWeek")));
        foreach ($context['_seq'] as $context["key"] => $context["promosPerDay"]) {
            // line 24
            echo "        <ul id=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\">
            ";
            // line 25
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($context["promosPerDay"]);
            foreach ($context['_seq'] as $context["_key"] => $context["promo"]) {
                // line 26
                echo "            <li>
                <ul class=\"promo grid\">
                    <li class=\"hour\">";
                // line 28
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_date_modify_filter($this->env, $this->getAttribute($context["promo"], "time", array()), ($this->getAttribute((isset($context["timeDiff"]) ? $context["timeDiff"] : $this->getContext($context, "timeDiff")), "Buenos_Aires", array()) . " hour")), "H:i"), "html", null, true);
                echo "</li>
                    <li class=\"hour\">";
                // line 29
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_date_modify_filter($this->env, $this->getAttribute($context["promo"], "time", array()), ($this->getAttribute((isset($context["timeDiff"]) ? $context["timeDiff"] : $this->getContext($context, "timeDiff")), "Nueva_York", array()) . " hour")), "H:i"), "html", null, true);
                echo "</li>
                    <li class=\"hour\">";
                // line 30
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_date_modify_filter($this->env, $this->getAttribute($context["promo"], "time", array()), ($this->getAttribute((isset($context["timeDiff"]) ? $context["timeDiff"] : $this->getContext($context, "timeDiff")), "Mexico", array()) . " hour")), "H:i"), "html", null, true);
                echo "</li>                
                    <li class=\"detail\">
                        <img src=\"";
                // line 32
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($context["promo"], "webImage", array())), "html", null, true);
                echo "\" />

                        <div class=\"sinopsis_container\">
                            <h2>
                                <a href=\"";
                // line 36
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("promo", array("id" => $this->getAttribute($context["promo"], "id", array()))), "html", null, true);
                echo "\">
                                    ";
                // line 37
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["promo"], "title", array()), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "_locale"), "method"), array(), "array"), "html", null, true);
                echo "
                                </a>                
                            </h2>

";
                // line 43
                echo "                            <a class=\"more_sinopsis\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("promo", array("id" => $this->getAttribute($context["promo"], "id", array()))), "html", null, true);
                echo "\"></a>
                        </div>

                    </li>
                </ul>

            </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['promo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 51
            echo "        </ul>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['promosPerDay'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "
    </div>

</div>

";
    }

    public function getTemplateName()
    {
        return "default/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 53,  149 => 51,  134 => 43,  127 => 37,  123 => 36,  116 => 32,  111 => 30,  107 => 29,  103 => 28,  99 => 26,  95 => 25,  90 => 24,  86 => 23,  79 => 19,  74 => 17,  70 => 16,  66 => 15,  61 => 12,  50 => 10,  46 => 9,  39 => 4,  36 => 3,  11 => 1,);
    }
}
