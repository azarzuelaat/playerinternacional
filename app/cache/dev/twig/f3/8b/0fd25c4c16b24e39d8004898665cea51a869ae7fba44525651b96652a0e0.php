<?php

/* promos/list.html.twig */
class __TwigTemplate_f38b0fd25c4c16b24e39d8004898665cea51a869ae7fba44525651b96652a0e0 extends Twig_Template
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

<div class=\"wrapper\">

    <div class=\"form_content total list\">

        <div class=\"new-user-wrapper\">
            <a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("promos_new");
        echo "\" class=\"new-user\">
                ";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("promo.new"), "html", null, true);
        echo "
            </a>
        </div>

        <ul class=\"listado\">
            ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "currentPageResults", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["promo"]) {
            // line 18
            echo "            <li>
                <p class='row'>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["promo"], "title", array()), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "_locale"), "method"), array(), "array"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($context["promo"], "channel", array()), "html", null, true);
            echo ") </p>
                <p class='buttons'>
                    <a class=\"edit\" href=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("promos_edit", array("id" => $this->getAttribute($context["promo"], "id", array()))), "html", null, true);
            echo "\">
                        ";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("promo.edit"), "html", null, true);
            echo "
                    </a>

                    <a class=\"stats\" href=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("stats_promo", array("id" => $this->getAttribute($context["promo"], "id", array()))), "html", null, true);
            echo "\">
                    ";
            // line 26
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("stats.user"), "html", null, true);
            echo "
                    </a>

                    <a class=\"delete\" href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("promos_delete", array("id" => $this->getAttribute($context["promo"], "id", array()))), "html", null, true);
            echo "\">
                        ";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("promo.delete"), "html", null, true);
            echo "
                    </a>
                </p>

            </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['promo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "    

        </ul>
        ";
        // line 38
        if ($this->getAttribute((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "haveToPaginate", array())) {
            // line 39
            echo "            ";
            echo $this->env->getExtension('pagerfanta')->renderPagerfanta((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "default_translated");
            echo "
        ";
        }
        // line 41
        echo "
    </div>\t

</div>



";
    }

    public function getTemplateName()
    {
        return "promos/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 41,  117 => 39,  115 => 38,  110 => 35,  98 => 30,  94 => 29,  88 => 26,  84 => 25,  78 => 22,  74 => 21,  67 => 19,  64 => 18,  60 => 17,  52 => 12,  48 => 11,  39 => 4,  36 => 3,  11 => 1,);
    }
}
