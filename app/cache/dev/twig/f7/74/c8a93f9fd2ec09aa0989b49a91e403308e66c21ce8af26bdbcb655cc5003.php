<?php

/* stats/barchar.html.twig */
class __TwigTemplate_f774c8a93f9fd2ec09aa0989b49a91e403308e66c21ce8af26bdbcb655cc5003 extends Twig_Template
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
            'scripts' => array($this, 'block_scripts'),
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
        echo "<div id='statics' style='width:800px; height: 800px'>

</div>

";
    }

    // line 10
    public function block_scripts($context, array $blocks = array())
    {
        // line 11
        echo "<script src=\"http://code.highcharts.com/2.2.4/highcharts.js\"></script>

<script>
    \$(document).ready(function() {
        new Highcharts.Chart(";
        // line 15
        echo (isset($context["options"]) ? $context["options"] : $this->getContext($context, "options"));
        echo ");
    });
</script>

";
    }

    public function getTemplateName()
    {
        return "stats/barchar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 15,  51 => 11,  48 => 10,  40 => 4,  37 => 3,  11 => 1,);
    }
}
