<?php

/* @MultiSites/_siteRow.twig */
class __TwigTemplate_656941fde16f67115597069f9c9c7d6f5f550ba9c27c40bf83fc8b242a46603f extends Twig_Template
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
        echo "<td class=\"multisites-label label\">
    <a title=\"View reports\" href=\"index.php?module=CoreHome&action=index&date=%date%&period=%period%&idSite=%idsite%\">%name%</a>

    <span style=\"width: 10px; margin-left:3px;\">
\t<a target=\"_blank\" title=\"";
        // line 5
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_GoTo", "%main_url%")), "html", null, true);
        echo "\" href=\"%main_url%\"><img src=\"plugins/MultiSites/images/link.gif\"/></a>
    </span>
</td>
<td class=\"multisites-column\">
    %visits%
</td>
<td class=\"multisites-column\">
    %pageviews%
</td>
";
        // line 14
        if ($this->getContext($context, "displayRevenueColumn")) {
            // line 15
            echo "    <td class=\"multisites-column\">
        %revenue%
    </td>
";
        }
        // line 19
        if (($this->getContext($context, "period") != "range")) {
            // line 20
            echo "<td style=\"width:170px;\">
    <div class=\"visits\" style=\"display:none;\">%visitsSummary%</div>
    <div class=\"pageviews\" style=\"display:none;\">%pageviewsSummary%</div>
    ";
            // line 23
            if ($this->getContext($context, "displayRevenueColumn")) {
                // line 24
                echo "        <div class=\"revenue\" style=\"display:none;\">%revenueSummary%</div>
    ";
            }
            // line 26
            echo "    ";
        }
        // line 27
        echo "    ";
        if ($this->getContext($context, "show_sparklines")) {
            // line 28
            echo "    <td style=\"width:180px;\">
        <div id=\"sparkline_%idsite%\" class=\"sparkline\" style=\"width: 100px; margin: auto;\">
            <a target=\"_blank\" href=\"index.php?module=CoreHome&action=index&date=%date%&period=%period%&idSite=%idsite%\"
               title=\"";
            // line 31
            ob_start();
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Dashboard_DashboardOf", "%name%")), "html", null, true);
            $context["dashboardName"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            echo " ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_GoTo", $this->getContext($context, "dashboardName"))), "html", null, true);
            echo "\">%sparkline%</a>
        </div>
    </td>
";
        }
    }

    public function getTemplateName()
    {
        return "@MultiSites/_siteRow.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 31,  61 => 27,  58 => 26,  54 => 24,  52 => 23,  47 => 20,  45 => 19,  39 => 15,  25 => 5,  19 => 1,  356 => 123,  350 => 121,  348 => 120,  343 => 118,  327 => 104,  319 => 99,  315 => 98,  311 => 96,  309 => 95,  298 => 86,  288 => 84,  286 => 83,  278 => 82,  270 => 81,  264 => 78,  253 => 75,  244 => 72,  240 => 71,  237 => 70,  235 => 69,  227 => 67,  223 => 66,  214 => 63,  210 => 62,  201 => 59,  197 => 58,  186 => 50,  178 => 49,  175 => 48,  170 => 47,  166 => 46,  162 => 45,  155 => 41,  150 => 40,  147 => 39,  144 => 38,  142 => 37,  137 => 35,  133 => 34,  128 => 32,  124 => 31,  120 => 30,  116 => 29,  112 => 28,  107 => 27,  96 => 24,  90 => 23,  84 => 22,  80 => 21,  76 => 20,  68 => 19,  64 => 28,  60 => 17,  53 => 16,  49 => 15,  40 => 8,  37 => 14,  35 => 6,  31 => 4,  28 => 3,);
    }
}
