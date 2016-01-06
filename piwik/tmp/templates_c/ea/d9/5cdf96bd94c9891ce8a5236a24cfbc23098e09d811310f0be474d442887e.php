<?php

/* @Installation/welcome.twig */
class __TwigTemplate_ead95cdf96bd94c9891ce8a5236a24cfbc23098e09d811310f0be474d442887e extends Twig_Template
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
        echo "<h2>";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_Welcome")), "html", null, true);
        echo "</h2>

";
        // line 6
        if ($this->getContext($context, "newInstall")) {
            // line 7
            echo "    ";
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_WelcomeHelp", $this->getContext($context, "totalNumberOfSteps")));
            echo "
";
        } else {
            // line 9
            echo "    <p>";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_ConfigurationHelp")), "html", null, true);
            echo "</p>
    <br/>
    <div class=\"error\">
        ";
            // line 12
            echo twig_escape_filter($this->env, $this->getContext($context, "errorMessage"), "html", null, true);
            echo "
    </div>
";
        }
        // line 15
        echo "
<script type=\"text/javascript\">
    <!--
    \$(function () {
        // client-side test for https to handle the case where the server is behind a reverse proxy
        if (document.location.protocol === 'https:') {
            \$('p.nextStep a').attr('href', \$('p.nextStep a').attr('href') + '&clientProtocol=https');
        }

        // client-side test for broken tracker (e.g., mod_security rule)
        \$('p.nextStep').hide();
        \$.ajax({
            url: 'piwik.php',
            data: 'url=http://example.com',
            complete: function () {
                \$('p.nextStep').show();
            },
            error: function (req) {
                \$('p.nextStep a').attr('href', \$('p.nextStep a').attr('href') + '&trackerStatus=' + req.status);
            }
        });
    });
    //-->
</script>

";
        // line 40
        if ((!$this->getContext($context, "showNextStep"))) {
            // line 41
            echo "    <p class=\"nextStep\">
        <a href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->getContext($context, "url"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_RefreshPage")), "html", null, true);
            echo " &raquo;</a>
    </p>
";
        }
    }

    public function getTemplateName()
    {
        return "@Installation/welcome.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 42,  87 => 41,  85 => 40,  58 => 15,  52 => 12,  45 => 9,  39 => 7,  37 => 6,  31 => 4,  28 => 3,);
    }
}