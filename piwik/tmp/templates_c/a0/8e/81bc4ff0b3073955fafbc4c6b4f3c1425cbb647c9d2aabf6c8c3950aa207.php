<?php

/* @Installation/trackingCode.twig */
class __TwigTemplate_a08e81bc4ff0b3073955fafbc4c6b4f3c1425cbb647c9d2aabf6c8c3950aa207 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@Installation/layout.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Installation/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        if (array_key_exists("displayfirstWebsiteSetupSuccess", $context)) {
            // line 5
            echo "    <span id=\"toFade\" class=\"success\">
\t";
            // line 6
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SetupWebsiteSetupSuccess", $this->getContext($context, "displaySiteName"))), "html", null, true);
            echo "
        <img src=\"plugins/Zeitgeist/images/success_medium.png\"/>
</span>
";
        }
        // line 10
        echo "
";
        // line 11
        echo $this->getContext($context, "trackingHelp");
        echo "
<br/><br/>
<h2>";
        // line 13
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_LargePiwikInstances")), "html", null, true);
        echo "</h2>
";
        // line 14
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_JsTagArchivingHelp1", "<a target=\"_blank\" href=\"http://piwik.org/docs/setup-auto-archiving/\">", "</a>"));
        echo "
";
        // line 15
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ReadThisToLearnMore", "<a target=\"_blank\" href=\"http://piwik.org/docs/optimize/\">", "</a>"));
        echo "

";
    }

    public function getTemplateName()
    {
        return "@Installation/trackingCode.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 15,  55 => 14,  51 => 13,  46 => 11,  43 => 10,  36 => 6,  33 => 5,  31 => 4,  28 => 3,);
    }
}
