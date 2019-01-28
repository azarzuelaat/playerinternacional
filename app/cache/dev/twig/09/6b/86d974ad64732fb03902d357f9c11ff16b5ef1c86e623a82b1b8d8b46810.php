<?php

/* basemsv.html.twig */
class __TwigTemplate_096b86d974ad64732fb03902d357f9c11ff16b5ef1c86e623a82b1b8d8b46810 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'scriptmsv' => array($this, 'block_scriptmsv'),
            'content' => array($this, 'block_content'),
            'later_script' => array($this, 'block_later_script'),
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
         <script src=\"//code.jquery.com/jquery-1.11.2.min.js\"></script>
        ";
        // line 16
        $this->displayBlock('scriptmsv', $context, $blocks);
        // line 18
        echo "        

        
    </head>
    <body>

        <div class=\"header_lng\">       
            <nav>
            ";
        // line 26
        $this->env->loadTemplate("selector.html.twig")->display($context);
        // line 27
        echo "            </nav>                    
        </div>
        <div class=\"wrapper\">

            <header>
                <h2 class=\"logo\"><a href=\"";
        // line 32
        echo $this->env->getExtension('routing')->getPath("home");
        echo "\"></a></h2>
                ";
        // line 33
        $this->env->loadTemplate("menu.html.twig")->display($context);
        // line 34
        echo "            </header>

            ";
        // line 36
        $this->displayBlock('content', $context, $blocks);
        // line 37
        echo "            

        </div>\t
        

        ";
        // line 42
        $this->env->loadTemplate("footer.html.twig")->display($context);
        // line 43
        echo "
 

        ";
        // line 46
        $this->displayBlock('later_script', $context, $blocks);
        // line 48
        echo "    </body>
</html>";
    }

    // line 16
    public function block_scriptmsv($context, array $blocks = array())
    {
        // line 17
        echo "        ";
    }

    // line 36
    public function block_content($context, array $blocks = array())
    {
        // line 37
        echo "            ";
    }

    // line 46
    public function block_later_script($context, array $blocks = array())
    {
        // line 47
        echo "        ";
    }

    public function getTemplateName()
    {
        return "basemsv.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 47,  133 => 46,  129 => 37,  126 => 36,  122 => 17,  119 => 16,  114 => 48,  112 => 46,  107 => 43,  105 => 42,  98 => 37,  96 => 36,  92 => 34,  90 => 33,  86 => 32,  79 => 27,  77 => 26,  67 => 18,  65 => 16,  60 => 14,  57 => 13,  51 => 12,  48 => 11,  41 => 12,  38 => 11,  34 => 8,  29 => 6,  22 => 1,);
    }
}
