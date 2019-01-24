<?php

/* base.html.twig */
class __TwigTemplate_86707312ae300e7daeac37bff04c1b3f57f08ebb1def5c223cfa0a357b3c9418 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=1040\">
        <title>";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.title"), "html", null, true);
        echo "</title>
        
        ";
        // line 8
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "0f8b103_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0f8b103_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/0f8b103_part_1.css");
            // line 11
            echo "        
            <link rel=\"stylesheet\" href=\"";
            // line 12
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
        } else {
            // asset "0f8b103"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0f8b103") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/0f8b103.css");
            // line 11
            echo "        
            <link rel=\"stylesheet\" href=\"";
            // line 12
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
        }
        unset($context["asset_url"]);
        // line 13
        echo "        
         <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />

    </head>
    <body>

        <div class=\"header_lng\">       
            <nav>
            ";
        // line 21
        $this->env->loadTemplate("selector.html.twig")->display($context);
        // line 22
        echo "            </nav>                    
        </div>
        <div class=\"wrapper\">

            <header>
                <h2 class=\"logo\"><a href=\"";
        // line 27
        echo $this->env->getExtension('routing')->getPath("home");
        echo "\"></a></h2>
                ";
        // line 28
        $this->env->loadTemplate("menu.html.twig")->display($context);
        // line 29
        echo "            </header>

            ";
        // line 31
        $this->displayBlock('content', $context, $blocks);
        // line 32
        echo "            

        </div>\t
        

        ";
        // line 37
        $this->env->loadTemplate("footer.html.twig")->display($context);
        // line 38
        echo "
        ";
        // line 39
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "c6739e9_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c6739e9_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/c6739e9_part_1.js");
            // line 40
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "c6739e9"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c6739e9") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/c6739e9.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 41
        echo "            
        
        ";
        // line 43
        $this->displayBlock('scripts', $context, $blocks);
        // line 45
        echo "        
    </body>
</html>";
    }

    // line 31
    public function block_content($context, array $blocks = array())
    {
        // line 32
        echo "            ";
    }

    // line 43
    public function block_scripts($context, array $blocks = array())
    {
        // line 44
        echo "        ";
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 44,  139 => 43,  135 => 32,  132 => 31,  126 => 45,  124 => 43,  120 => 41,  106 => 40,  102 => 39,  99 => 38,  97 => 37,  90 => 32,  88 => 31,  84 => 29,  82 => 28,  78 => 27,  71 => 22,  69 => 21,  59 => 14,  56 => 13,  50 => 12,  47 => 11,  40 => 12,  37 => 11,  33 => 8,  28 => 6,  21 => 1,);
    }
}
