<?php

/* player.html_1.twig */
class __TwigTemplate_86378f42f4aa2107145ac9a6de88beebbaafbdae39c52163be8788194d5875bf extends Twig_Template
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
        echo "<div id=\"player_";
        echo twig_escape_filter($this->env, (isset($context["num"]) ? $context["num"] : $this->getContext($context, "num")), "html", null, true);
        echo "\" class=\"videoEmbed\" data-storage=\"bcube\" data-video=\"";
        echo twig_escape_filter($this->env, (isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "html", null, true);
        echo "\" style=\"height:";
        echo twig_escape_filter($this->env, (isset($context["height"]) ? $context["height"] : $this->getContext($context, "height")), "html", null, true);
        echo "px; width: ";
        echo twig_escape_filter($this->env, (isset($context["width"]) ? $context["width"] : $this->getContext($context, "width")), "html", null, true);
        echo "px\">
    <div class=\"mg\" >
        <a href=\"#\" >
            <img src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl((isset($context["background"]) ? $context["background"] : $this->getContext($context, "background"))), "html", null, true);
        echo "\" width=\"";
        echo twig_escape_filter($this->env, (isset($context["width"]) ? $context["width"] : $this->getContext($context, "width")), "html", null, true);
        echo "px\" height=\"";
        echo twig_escape_filter($this->env, (isset($context["height"]) ? $context["height"] : $this->getContext($context, "height")), "html", null, true);
        echo "px\"  />
            <span class=\"ctinf vid\">
                <span class=\"stamp\">
                    <span class=\"ico\"></span>
                    <em class=\"ic-tx\">Vídeo</em>
                </span>
            </span>
        </a>
    </div>
</div>

<script type=\"text/javascript\">

        MSV.embedData['";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "html", null, true);
        echo "'] = {
            'flashvars': {\"host\": '";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "config", array()), "html", null, true);
        echo "', \"ov_tk\": \"http://token.mediaset.es/\", \"popup\": true},
            'params': {\"quality\": \"high\", \"bgcolor\": \"#06A9DF\", \"play\": \"true\", \"loop\": \"true\", \"wmode\": \"transparent\", \"scale\": \"noscale\", \"menu\": \"true\", \"devicefont\": \"false\", \"salign\": \"\", \"allowfullscreen\": \"true\", \"allowscriptaccess\": \"always\"},
            'containerId': 'player_";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["num"]) ? $context["num"] : $this->getContext($context, "num")), "html", null, true);
        echo "',
            'width': '100%',
            'height': '100%',
            'playerUrl': '";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "url", array()), "html", null, true);
        echo "',
            'idleTimeout': 0,
            'mediaUrl': 'www.telecinco.es',
            'drm': false,
        };

</script>

";
    }

    public function getTemplateName()
    {
        return "player.html_1.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 23,  61 => 20,  56 => 18,  52 => 17,  32 => 4,  19 => 1,);
    }
}
