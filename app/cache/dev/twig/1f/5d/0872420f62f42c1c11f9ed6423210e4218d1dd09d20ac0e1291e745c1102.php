<?php

/* corporate/index.html.twig */
class __TwigTemplate_1f5d0872420f62f42c1c11f9ed6423210e4218d1dd09d20ac0e1291e745c1102 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("basemsv.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'scriptmsv' => array($this, 'block_scriptmsv'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "basemsv.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_scriptmsv($context, array $blocks = array())
    {
        // line 4
        echo "<script src=\"//static4.tele-cinco.net/msv/js/msv.js?v=v4.10.0\"></script>
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "
<div class=\"form_content video_info\">
    <div class=\"video_header corp_hd\">
        <h2 class=\"corp_hd\">";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("promo.weare"), "html", null, true);
        echo "</h2>
        ";
        // line 12
        $this->env->loadTemplate("submenu.html.twig")->display($context);
        echo "        
    </div>

    ";
        // line 15
        $this->env->loadTemplate("player.html_1.twig")->display(array_merge($context, array("width" => "654", "height" => "368", "num" => "01", "video" => $this->getAttribute((isset($context["somos"]) ? $context["somos"] : $this->getContext($context, "somos")), "video", array()), "data" => $this->getAttribute((isset($context["somos"]) ? $context["somos"] : $this->getContext($context, "somos")), "url", array()))));
        // line 16
        echo "
    <div class=\"video_header corp_hd\">
        <h2 class=\"corp_hd\">";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("promo.lifetv"), "html", null, true);
        echo "</h2>
               
    </div>

    ";
        // line 22
        $this->env->loadTemplate("player.html_1.twig")->display(array_merge($context, array("width" => "654", "height" => "368", "num" => "02", "video" => $this->getAttribute((isset($context["vive"]) ? $context["vive"] : $this->getContext($context, "vive")), "video", array()), "data" => $this->getAttribute((isset($context["vive"]) ? $context["vive"] : $this->getContext($context, "vive")), "url", array()))));
        // line 23
        echo "
    <div class=\"video_header corp_hd\">
        <h2 class=\"corp_hd\">";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("promo.serialstv"), "html", null, true);
        echo "</h2>
               
    </div>

    ";
        // line 29
        $this->env->loadTemplate("player.html_1.twig")->display(array_merge($context, array("width" => "654", "height" => "368", "num" => "03", "video" => $this->getAttribute((isset($context["series"]) ? $context["series"] : $this->getContext($context, "series")), "video", array()), "data" => $this->getAttribute((isset($context["series"]) ? $context["series"] : $this->getContext($context, "series")), "url", array()))));
        // line 30
        echo "    
    <div class=\"video_header corp_hd\">
        <h2 class=\"corp_hd\">";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("promo.programstv"), "html", null, true);
        echo "</h2>
               
    </div>

    ";
        // line 36
        $this->env->loadTemplate("player.html_1.twig")->display(array_merge($context, array("width" => "654", "height" => "368", "num" => "04", "video" => $this->getAttribute((isset($context["programa"]) ? $context["programa"] : $this->getContext($context, "programa")), "video", array()), "data" => $this->getAttribute((isset($context["programa"]) ? $context["programa"] : $this->getContext($context, "programa")), "url", array()))));
        // line 37
        echo "
    <div class=\"video_header corp_hd\">
        <h2 class=\"corp_hd\">";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("promo.hoststv"), "html", null, true);
        echo "</h2>
               
    </div>

    ";
        // line 43
        $this->env->loadTemplate("player.html_1.twig")->display(array_merge($context, array("width" => "654", "height" => "368", "num" => "05", "video" => $this->getAttribute((isset($context["presentadores"]) ? $context["presentadores"] : $this->getContext($context, "presentadores")), "video", array()), "data" => $this->getAttribute((isset($context["presentadores"]) ? $context["presentadores"] : $this->getContext($context, "presentadores")), "url", array()))));
        // line 44
        echo "    
    <div class=\"video_header corp_hd\">
        <h2 class=\"corp_hd\">";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("promo.premieretv"), "html", null, true);
        echo "</h2>
               
    </div>

    ";
        // line 50
        $this->env->loadTemplate("player.html_1.twig")->display(array_merge($context, array("width" => "654", "height" => "368", "num" => "06", "video" => $this->getAttribute((isset($context["estrenos"]) ? $context["estrenos"] : $this->getContext($context, "estrenos")), "video", array()), "data" => $this->getAttribute((isset($context["estrenos"]) ? $context["estrenos"] : $this->getContext($context, "estrenos")), "url", array()))));
        // line 51
        echo "    
</div>

";
    }

    public function getTemplateName()
    {
        return "corporate/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 51,  128 => 50,  121 => 46,  117 => 44,  115 => 43,  108 => 39,  104 => 37,  102 => 36,  95 => 32,  91 => 30,  89 => 29,  82 => 25,  78 => 23,  76 => 22,  69 => 18,  65 => 16,  63 => 15,  57 => 12,  53 => 11,  48 => 8,  45 => 7,  40 => 4,  37 => 3,  11 => 1,);
    }
}
