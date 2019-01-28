<?php

/* submenu.html.twig */
class __TwigTemplate_0fc562e275891a20d25dfecafa0c8778693982b4ce0480177c5257c80c27513f extends Twig_Template
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
        $context["route"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "_route"), "method");
        // line 2
        echo "
";
        // line 3
        if (($this->env->getExtension('security')->isGranted("ROLE_USER") && ((isset($context["route"]) ? $context["route"] : $this->getContext($context, "route")) != "home"))) {
            // line 4
            echo "<a class=\"back_list\" href=\"";
            echo $this->env->getExtension('routing')->getPath("home");
            echo "\" >
                ";
            // line 5
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("menu.promos"), "html", null, true);
            echo "
</a>
";
        }
    }

    public function getTemplateName()
    {
        return "submenu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 5,  26 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
