<?php

/* @VisitTime/index.twig */
class __TwigTemplate_b964754daa4e89bb1ec73a28ef6c5036abf8187a4a165e92211f046350c4247e extends Twig_Template
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
        echo "<div id='leftcolumn'>
    <h2>";
        // line 2
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("VisitTime_LocalTime")), "html", null, true);
        echo "</h2>
    ";
        // line 3
        echo $this->getContext($context, "dataTableVisitInformationPerLocalTime");
        echo "
</div>

<div id='rightcolumn'>
    <h2>";
        // line 7
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("VisitTime_ServerTime")), "html", null, true);
        echo "</h2>
    ";
        // line 8
        echo $this->getContext($context, "dataTableVisitInformationPerServerTime");
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "@VisitTime/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 8,  33 => 7,  26 => 3,  22 => 2,  19 => 1,);
    }
}