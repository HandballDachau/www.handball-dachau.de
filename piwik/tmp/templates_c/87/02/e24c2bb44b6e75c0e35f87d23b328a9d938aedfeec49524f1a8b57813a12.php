<?php

/* @MultiSites/getSitesInfo.twig */
class __TwigTemplate_8702e24c2bb44b6e75c0e35f87d23b328a9d938aedfeec49524f1a8b57813a12 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("dashboard.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "dashboard.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
    <div class=\"top_controls_inner\">
        ";
        // line 6
        $this->env->loadTemplate("@CoreHome/_periodSelect.twig")->display($context);
        // line 7
        echo "        ";
        $this->env->loadTemplate("@CoreHome/_headerMessage.twig")->display($context);
        // line 8
        echo "    </div>

<div id=\"multisites\">
    <div id=\"main\">
        <script type=\"text/javascript\">
            var allSites = [];
            var params = [];
            ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "sitesData"));
        foreach ($context['_seq'] as $context["i"] => $context["site"]) {
            // line 16
            echo "            allSites[";
            echo twig_escape_filter($this->env, $this->getContext($context, "i"), "html", null, true);
            echo "] = new setRowData(";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "site"), "idsite"), "html", null, true);
            echo ",
                ";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "site"), "visits"), "html", null, true);
            echo ",
                ";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "site"), "pageviews"), "html", null, true);
            echo ",
                ";
            // line 19
            if (twig_test_empty($this->getAttribute($this->getContext($context, "site"), "revenue"))) {
                echo "0";
            } else {
                echo $this->getAttribute($this->getContext($context, "site"), "revenue");
            }
            echo ",
                '";
            // line 20
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "site"), "name"), "js"), "html", null, true);
            echo "',
                '";
            // line 21
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "site"), "main_url"), "js"), "html", null, true);
            echo "',
                '";
            // line 22
            if ($this->getAttribute($this->getContext($context, "site", true), "visits_evolution", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, strtr($this->getAttribute($this->getContext($context, "site"), "visits_evolution"), array("," => ".")), "html", null, true);
            }
            echo "',
                '";
            // line 23
            if ($this->getAttribute($this->getContext($context, "site", true), "pageviews_evolution", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, strtr($this->getAttribute($this->getContext($context, "site"), "pageviews_evolution"), array("," => ".")), "html", null, true);
            }
            echo "',
                '";
            // line 24
            if ($this->getAttribute($this->getContext($context, "site", true), "revenue_evolution", array(), "any", true, true)) {
                echo strtr($this->getAttribute($this->getContext($context, "site"), "revenue_evolution"), array("," => "."));
            }
            echo "'
            );
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['i'], $context['site'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "            params['period'] = '";
        echo twig_escape_filter($this->env, $this->getContext($context, "period"), "html", null, true);
        echo "';
            params['date'] = '";
        // line 28
        echo twig_escape_filter($this->env, $this->getContext($context, "date"), "html", null, true);
        echo "';
            params['evolutionBy'] = '";
        // line 29
        echo twig_escape_filter($this->env, $this->getContext($context, "evolutionBy"), "html", null, true);
        echo "';
            params['mOrderBy'] = '";
        // line 30
        echo twig_escape_filter($this->env, $this->getContext($context, "orderBy"), "html", null, true);
        echo "';
            params['order'] = '";
        // line 31
        echo twig_escape_filter($this->env, $this->getContext($context, "order"), "html", null, true);
        echo "';
            params['limit'] = '";
        // line 32
        echo twig_escape_filter($this->env, $this->getContext($context, "limit"), "html", null, true);
        echo "';
            params['page'] = 1;
            params['prev'] = \"";
        // line 34
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Previous")), "js"), "html", null, true);
        echo "\";
            params['next'] = \"";
        // line 35
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Next")), "js"), "html", null, true);
        echo "\";

            ";
        // line 37
        ob_start();
        // line 38
        echo "            ";
        $this->env->loadTemplate("@MultiSites/_siteRow.twig")->display($context);
        // line 39
        echo "            ";
        $context["row"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 40
        echo "            params['row'] = '";
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getContext($context, "row"), "js"), "html", null, true);
        echo "';
            params['dateSparkline'] = '";
        // line 41
        echo twig_escape_filter($this->env, $this->getContext($context, "dateSparkline"), "html", null, true);
        echo "';
        </script>

        <div class=\"centerLargeDiv\">
            <h2>";
        // line 45
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_AllWebsitesDashboard")), "html", null, true);
        echo "
                ";
        // line 46
        ob_start();
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NVisits", $this->getContext($context, "totalVisits"))), "html", null, true);
        $context["nVisits"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 47
        echo "                ";
        ob_start();
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NVisits", $this->getContext($context, "pastTotalVisits"))), "html", null, true);
        $context["nVisitsLast"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 48
        echo "                <span class='smallTitle'
                ";
        // line 49
        if ($this->getContext($context, "totalVisitsEvolution")) {
            echo "title=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_EvolutionSummaryGeneric", $this->getContext($context, "nVisits"), $this->getContext($context, "prettyDate"), $this->getContext($context, "nVisitsLast"), $this->getContext($context, "pastPeriodPretty"), $this->getContext($context, "totalVisitsEvolution"))), "html", null, true);
            echo "\"";
        }
        echo ">
                    ";
        // line 50
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_TotalVisitsPageviewsRevenue", (("<strong>" . $this->getContext($context, "totalVisits")) . "</strong>"), (("<strong>" . $this->getContext($context, "totalPageviews")) . "</strong>"), (("<strong>" . $this->getContext($context, "totalRevenue")) . "</strong>")));
        echo "
\t            </span>
            </h2>

            <table id=\"mt\" class=\"dataTable\" cellspacing=\"0\">
                <thead>
                <tr>
                    <th id=\"names\" class=\"label\" onClick=\"params = setOrderBy(this,allSites, params, 'names');\">
                        <span>";
        // line 58
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Website")), "html", null, true);
        echo "</span>
                        <span class=\"arrow ";
        // line 59
        if (($this->getContext($context, "evolutionBy") == "names")) {
            echo "multisites_";
            echo twig_escape_filter($this->env, $this->getContext($context, "order"), "html", null, true);
        }
        echo "\"></span>
                    </th>
                    <th id=\"visits\" class=\"multisites-column\" style=\"width: 100px;\" onClick=\"params = setOrderBy(this,allSites, params, 'visits');\">
                        <span>";
        // line 62
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnNbVisits")), "html", null, true);
        echo "</span>
                        <span class=\"arrow ";
        // line 63
        if (($this->getContext($context, "evolutionBy") == "visits")) {
            echo "multisites_";
            echo twig_escape_filter($this->env, $this->getContext($context, "order"), "html", null, true);
        }
        echo "\"></span>
                    </th>
                    <th id=\"pageviews\" class=\"multisites-column\" style=\"width: 110px;\" onClick=\"params = setOrderBy(this,allSites, params, 'pageviews');\">
                        <span>";
        // line 66
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnPageviews")), "html", null, true);
        echo "</span>
                        <span class=\"arrow ";
        // line 67
        if (($this->getContext($context, "evolutionBy") == "pageviews")) {
            echo "multisites_";
            echo twig_escape_filter($this->env, $this->getContext($context, "order"), "html", null, true);
        }
        echo "\"></span>
                    </th>
                    ";
        // line 69
        if ($this->getContext($context, "displayRevenueColumn")) {
            // line 70
            echo "                        <th id=\"revenue\" class=\"multisites-column\" style=\"width: 110px;\" onClick=\"params = setOrderBy(this,allSites, params, 'revenue');\">
                            <span>";
            // line 71
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
            echo "</span>
                            <span class=\"arrow ";
            // line 72
            if (($this->getContext($context, "evolutionBy") == "revenue")) {
                echo "multisites_";
                echo twig_escape_filter($this->env, $this->getContext($context, "order"), "html", null, true);
            }
            echo "\"></span>
                        </th>
                    ";
        }
        // line 75
        echo "                    <th id=\"evolution\" style=\" width:350px;\" colspan=\"";
        if ($this->getContext($context, "show_sparklines")) {
            echo "2";
        } else {
            echo "1";
        }
        echo "\">
                        <span class=\"arrow \"></span>
                        <span class=\"evolution\" style=\"cursor:pointer;\"
                              onClick=\"params = setOrderBy(this,allSites, params, \$('#evolution_selector').val() + 'Summary');\"> ";
        // line 78
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("MultiSites_Evolution")), "html", null, true);
        echo "</span>
                        <select class=\"selector\" id=\"evolution_selector\"
                                onchange=\"params['evolutionBy'] = \$('#evolution_selector').val(); switchEvolution(params);\">
                            <option value=\"visits\" ";
        // line 81
        if (($this->getContext($context, "evolutionBy") == "visits")) {
            echo " selected ";
        }
        echo ">";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnNbVisits")), "html", null, true);
        echo "</option>
                            <option value=\"pageviews\" ";
        // line 82
        if (($this->getContext($context, "evolutionBy") == "pageviews")) {
            echo " selected ";
        }
        echo "}>";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnPageviews")), "html", null, true);
        echo "</option>
                            ";
        // line 83
        if ($this->getContext($context, "displayRevenueColumn")) {
            // line 84
            echo "                                <option value=\"revenue\" ";
            if (($this->getContext($context, "evolutionBy") == "revenue")) {
                echo " selected ";
            }
            echo ">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
            echo "</option>
                            ";
        }
        // line 86
        echo "                        </select>
                    </th>
                </tr>
                </thead>

                <tbody id=\"tb\">
                </tbody>

                <tfoot>
                ";
        // line 95
        if ($this->getContext($context, "isSuperUser")) {
            // line 96
            echo "                    <tr>
                        <td colspan=\"8\" class=\"clean\" style=\"text-align: right; padding-top: 15px;padding-right:10px;\">
                            <a href=\"";
            // line 98
            echo $this->getContext($context, "url");
            echo "&module=SitesManager&action=index&showaddsite=1\">
                                <img src='plugins/UsersManager/images/add.png' alt=\"\" style=\"margin: 0;\"/> ";
            // line 99
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SitesManager_AddSite")), "html", null, true);
            echo "
                            </a>
                        </td>
                    </tr>
                ";
        }
        // line 104
        echo "                <tr row_id=\"last\">
                    <td colspan=\"8\" class=\"clean\" style=\"padding: 20px;\">
                        <span id=\"prev\" class=\"pager\" style=\"padding-right: 20px;\"></span>
                        <span class=\"dataTablePages\">
                            <span id=\"counter\">
                            </span>
                        </span>
                        <span id=\"next\" class=\"clean\" style=\"padding-left: 20px;\"></span>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
        <script type=\"text/javascript\">
            prepareRows(allSites, params, '";
        // line 118
        echo twig_escape_filter($this->env, $this->getContext($context, "orderBy"), "html", null, true);
        echo "');

            ";
        // line 120
        if ($this->getContext($context, "autoRefreshTodayReport")) {
            // line 121
            echo "            piwikHelper.refreshAfter(";
            echo twig_escape_filter($this->env, $this->getContext($context, "autoRefreshTodayReport"), "html", null, true);
            echo " * 1000);
            ";
        }
        // line 123
        echo "        </script>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@MultiSites/getSitesInfo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  356 => 123,  350 => 121,  348 => 120,  343 => 118,  327 => 104,  319 => 99,  315 => 98,  311 => 96,  309 => 95,  298 => 86,  288 => 84,  286 => 83,  278 => 82,  270 => 81,  264 => 78,  253 => 75,  244 => 72,  240 => 71,  237 => 70,  235 => 69,  227 => 67,  223 => 66,  214 => 63,  210 => 62,  201 => 59,  197 => 58,  186 => 50,  178 => 49,  175 => 48,  170 => 47,  166 => 46,  162 => 45,  155 => 41,  150 => 40,  147 => 39,  144 => 38,  142 => 37,  137 => 35,  133 => 34,  128 => 32,  124 => 31,  120 => 30,  116 => 29,  112 => 28,  107 => 27,  96 => 24,  90 => 23,  84 => 22,  80 => 21,  76 => 20,  68 => 19,  64 => 18,  60 => 17,  53 => 16,  49 => 15,  40 => 8,  37 => 7,  35 => 6,  31 => 4,  28 => 3,);
    }
}
