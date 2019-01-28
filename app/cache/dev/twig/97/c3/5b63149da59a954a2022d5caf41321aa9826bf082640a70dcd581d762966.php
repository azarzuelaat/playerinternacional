<?php

/* FOSUserBundle::layout.html.twig */
class __TwigTemplate_97c35b63149da59a954a2022d5caf41321aa9826bf082640a70dcd581d762966 extends Twig_Template
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

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "
";
        // line 5
        echo "<div class=\"form_content\">

    <form action=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
        echo "\" method=\"post\">
        <h3>";
        // line 8
        echo $this->env->getExtension('translator')->trans("layout.welcome", array(), "messages");
        echo "</h3>

        <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
        echo "\" />
        

        <p class=\"front_logging\">
            <!--<span>";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.username", array(), "FOSUserBundle"), "html", null, true);
        echo "</span>-->
            <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" placeholder=\"Usuario\" required=\"required\" />
        </p>
        <p class=\"front_logging\">
            <!--<span>";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.password", array(), "FOSUserBundle"), "html", null, true);
        echo "</span>-->
            <input type=\"password\" id=\"password\" name=\"_password\" placeholder=\"Contraseña\" required=\"required\" />
        </p>

        ";
        // line 22
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 23
            echo "            <h2 class=\"credenciales\">
                ";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageKey", array()), $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageData", array()), "security"), "html", null, true);
            echo "
            </h2>
        ";
        }
        // line 26
        echo "  

        <!--<p class=\"front_log\">
            <span>";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.remember_me", array(), "FOSUserBundle"), "html", null, true);
        echo "</span>
            <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\" />
        </p>-->

        <p class=\"send front_logging\">
            <input class=\"send styled-button-1\" type=\"submit\" id=\"_submit\" name=\"_submit\" value=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
        </p>\t

        <h3 class=\"keylink\">";
        // line 37
        echo $this->env->getExtension('translator')->trans("layout.keylink", array("%mailto%" => (isset($context["mailto"]) ? $context["mailto"] : $this->getContext($context, "mailto"))), "messages");
        echo "</h3>

    </form>
</div>

";
    }

    // line 44
    public function block_scripts($context, array $blocks = array())
    {
        // line 45
        echo "<script src=\"//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js\"></script>
<script> \$.validate();</script>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 45,  120 => 44,  110 => 37,  104 => 34,  96 => 29,  91 => 26,  85 => 24,  82 => 23,  80 => 22,  73 => 18,  67 => 15,  63 => 14,  56 => 10,  51 => 8,  47 => 7,  43 => 5,  40 => 3,  37 => 2,  11 => 1,);
    }
}
