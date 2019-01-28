<?php

/* config/promo.xml.twig */
class __TwigTemplate_921e6515efdcf495a8bff5f5311dc9d0911d21730ed926b6b8043b7d6104075b extends Twig_Template
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
        echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<Tl5 version=\"1\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:noNamespaceSchemaLocation=\"http://www.telecinco.es/static/MDSVideo/xsd/tl5config.xsd\">
    <video id=\"MDSVID20141208_0106\" autoplay=\"false\">
        <info>
            <skinColor bg=\"0x0355A2\"/>
            <mosca position=\"TR\">
                <url>http://www.telecinco.es/bbtfile/4026_20121003HyOBSk.png</url>
            </mosca>
            <title>
                <![CDATA[";
        // line 10
        echo (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title"));
        echo "]]>
            </title>
            <sub_title>
                <![CDATA[";
        // line 13
        echo (isset($context["subtitle"]) ? $context["subtitle"] : $this->getContext($context, "subtitle"));
        echo "]]>
            </sub_title>
            
            <videoUrl scrubbing=\"true\" multipleDef=\"false\" rtmp=\"false\">
                <link><![CDATA[";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "html", null, true);
        echo "]]></link>
            </videoUrl>
        </info>
    </video>

    <relatedVideos/>

    <infoAds />
</Tl5>
";
    }

    public function getTemplateName()
    {
        return "config/promo.xml.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 17,  36 => 13,  30 => 10,  19 => 1,);
    }
}
