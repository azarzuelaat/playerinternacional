<?php

/* menu.html.twig */
class __TwigTemplate_56e09b70f7e47e607e15178b5c2b12cc80bf86b72617a5d54707355d40e922d7 extends Twig_Template
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
        echo "
";
        // line 2
        $context["route"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "_route"), "method");
        // line 3
        echo "
<nav>

    ";
        // line 6
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 7
            echo "    <a href=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\" class=\"logout_users\">
            ";
            // line 8
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("menu.logout"), "html", null, true);
            echo "
    </a>
    ";
        }
        // line 11
        echo "
    ";
        // line 12
        if (($this->env->getExtension('security')->isGranted("ROLE_ADMIN") && ((isset($context["route"]) ? $context["route"] : $this->getContext($context, "route")) != "users_list"))) {
            // line 13
            echo "        <a href=\"";
            echo $this->env->getExtension('routing')->getPath("users_list");
            echo "\" class=\"access_users\">
                    ";
            // line 14
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("menu.users"), "html", null, true);
            echo "
        </a>
    ";
        }
        // line 17
        echo "
    ";
        // line 18
        if (($this->env->getExtension('security')->isGranted("ROLE_ADMIN") && ((isset($context["route"]) ? $context["route"] : $this->getContext($context, "route")) != "promos_list"))) {
            // line 19
            echo "        <a href=\"";
            echo $this->env->getExtension('routing')->getPath("promos_list");
            echo "\" class=\"access_users\">
                    ";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("menu.promos_list"), "html", null, true);
            echo "
        </a>
    ";
        }
        // line 23
        echo "
    ";
        // line 24
        if (($this->env->getExtension('security')->isGranted("ROLE_ADMIN") && ((isset($context["route"]) ? $context["route"] : $this->getContext($context, "route")) != "legal_list"))) {
            // line 25
            echo "        <a href=\"";
            echo $this->env->getExtension('routing')->getPath("legal_list");
            echo "\" class=\"access_users\">
                    ";
            // line 26
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("menu.legal"), "html", null, true);
            echo "
        </a>
    ";
        }
        // line 29
        echo "    

</nav>

<nav class=\"live\">
    ";
        // line 34
        if (($this->env->getExtension('security')->isGranted("ROLE_USER") && ((isset($context["route"]) ? $context["route"] : $this->getContext($context, "route")) != "live"))) {
            // line 35
            echo "    <a href=\"";
            echo $this->env->getExtension('routing')->getPath("live");
            echo "\" class=\"live_link\">
            ";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("menu.live"), "html", null, true);
            echo "
    </a>
    ";
        }
        // line 39
        echo "
    ";
        // line 40
        if (($this->env->getExtension('security')->isGranted("ROLE_USER") && ((isset($context["route"]) ? $context["route"] : $this->getContext($context, "route")) != "corporate"))) {
            // line 41
            echo "    <a href=\"";
            echo $this->env->getExtension('routing')->getPath("corporate");
            echo "\" class=\"live_link corp_hd\">            
            ";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("menu.corpo"), "html", null, true);
            echo "
    </a>
    ";
        }
        // line 45
        echo "
</nav>
";
    }

    public function getTemplateName()
    {
        return "menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 45,  120 => 42,  115 => 41,  113 => 40,  110 => 39,  104 => 36,  99 => 35,  97 => 34,  90 => 29,  84 => 26,  79 => 25,  77 => 24,  74 => 23,  68 => 20,  63 => 19,  61 => 18,  58 => 17,  52 => 14,  47 => 13,  45 => 12,  42 => 11,  36 => 8,  31 => 7,  29 => 6,  24 => 3,  22 => 2,  19 => 1,);
    }
}
