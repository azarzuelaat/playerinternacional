<?php

/* footer.html.twig */
class __TwigTemplate_d0339d0102eafc3707d5cc6b366afffcfcbd2928646dcd8f96fa6565c8784e48 extends Twig_Template
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
        echo "<div class=\"mds-footer div_footer mds_mds-footer\">
    <div class=\"mds-mediaset-logos\">

        <p>
            <a href=\"http://www.mediaset.es/\" target=\"_parent\" title=\"Mediaset\" class=\"ico ico-mds\">
                <span>Mediaset</span>
            </a>
        </p>

        <ul class=\"mds-mediaset-logos-ch cf\">
            <li class=\"item\">
                <a href=\"http://www.telecinco.es/\" target=\"_parent\" title=\"Telecinco\" class=\"ico ico-tl5\"><span>Telecinco</span></a>
            </li>
            <li class=\"item\">
                <a href=\"http://www.cuatro.com/\" target=\"_parent\" title=\"Cuatro\" class=\"ico ico-cuatro\"><span>Cuatro</span></a>
            </li>
            <li class=\"item\">
                <a href=\"http://www.telecinco.es/factoriadeficcion/\" target=\"_parent\" title=\"Factoria de ficción\" class=\"ico ico-fac\"><span>Factoria de ficción</span></a>
            </li>
            <li class=\"item\">
                <a href=\"http://www.boing.es/\" target=\"_parent\" title=\"Boing\" class=\"ico ico-boing\"><span>Boing</span></a>
            </li>
            <li class=\"item\">
                <a href=\"http://www.telecinco.es/energy/\" target=\"_parent\" title=\"Energy\" class=\"ico ico-nrg\"><span>Energy</span></a>
            </li>
            <li class=\"item\">
                <a href=\"http://www.divinity.es/\" target=\"_parent\" title=\"Divinity\" class=\"ico ico-div\"><span>Divinity</span></a>
            </li>
            <li class=\"item\">
                <a href=\"http://www.telecinco.es/bemad\" target=\"_parent\" title=\"Be Mad\" class=\"ico ico-bmd\"><span>Be Mad</span></a>
            </li>

        </ul>

    </div><!-- .mds-mediaset-logos -->

    <div class=\"mds-tx\">


        <p class=\"balls_bk\">
            <a href=\"http://www.telecinco.es/inversores/es/\" target=\"_parent\" title=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("footer.corporate"), "html", null, true);
        echo "\">
                ";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("footer.corporate"), "html", null, true);
        echo "
            </a>
            | Copyright © Conecta 5 Telecinco, S. A. ";
        // line 44
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("footer.rights"), "html", null, true);
        echo " 
            | <a href=\"";
        // line 45
        echo $this->env->getExtension('routing')->getUrl("legal");
        echo "\" target=\"_parent\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("footer.warning"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("footer.warning"), "html", null, true);
        echo "</a> 
            | <a href=\"";
        // line 46
        echo $this->env->getExtension('routing')->getUrl("legal");
        echo "#ancla10\" target=\"_parent\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("footer.reserved"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("footer.reserved"), "html", null, true);
        echo "</a>
            | <a href=\"mailto:";
        // line 47
        echo twig_escape_filter($this->env, (isset($context["mailto"]) ? $context["mailto"] : $this->getContext($context, "mailto")), "html", null, true);
        echo "\" target=\"_parent\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("footer.contact"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("footer.contact"), "html", null, true);
        echo "</a> 
        </p>
    </div>

</div><!-- .mds-footer -->";
    }

    public function getTemplateName()
    {
        return "footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 47,  84 => 46,  76 => 45,  70 => 44,  65 => 42,  61 => 41,  19 => 1,);
    }
}
