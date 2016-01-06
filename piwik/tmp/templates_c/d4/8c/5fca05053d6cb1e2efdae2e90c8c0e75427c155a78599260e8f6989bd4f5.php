<?php

/* macros.twig */
class __TwigTemplate_d48c5fca05053d6cb1e2efdae2e90c8c0e75427c155a78599260e8f6989bd4f5 extends Twig_Template
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
        // line 18
        echo "
";
    }

    // line 1
    public function getlogoHtml($_metadata = null, $_alt = "")
    {
        $context = $this->env->mergeGlobals(array(
            "metadata" => $_metadata,
            "alt" => $_alt,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "    ";
            if ($this->getAttribute($this->getContext($context, "metadata", true), "logo", array(), "array", true, true)) {
                // line 3
                echo "        ";
                if ($this->getAttribute($this->getContext($context, "metadata", true), "logoWidth", array(), "array", true, true)) {
                    // line 4
                    echo "            ";
                    ob_start();
                    echo "width=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "metadata"), "logoWidth", array(), "array"), "html", null, true);
                    echo "\"";
                    $context["width"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 5
                    echo "        ";
                }
                // line 6
                echo "        ";
                if ($this->getAttribute($this->getContext($context, "metadata", true), "logoHeight", array(), "array", true, true)) {
                    // line 7
                    echo "            ";
                    ob_start();
                    echo "height=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "metadata"), "logoHeight", array(), "array"), "html", null, true);
                    echo "\"";
                    $context["height"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 8
                    echo "        ";
                }
                // line 9
                echo "        ";
                if ($this->getAttribute($this->getContext($context, "metadata", true), "logoWidth", array(), "array", true, true)) {
                    // line 10
                    echo "            ";
                    ob_start();
                    echo "width=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "metadata"), "logoWidth", array(), "array"), "html", null, true);
                    echo "\"";
                    $context["width"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 11
                    echo "        ";
                }
                // line 12
                echo "        ";
                if ((!twig_test_empty($this->getContext($context, "alt")))) {
                    // line 13
                    echo "            ";
                    ob_start();
                    echo "title='";
                    echo twig_escape_filter($this->env, $this->getContext($context, "alt"), "html", null, true);
                    echo "' alt='";
                    echo twig_escape_filter($this->env, $this->getContext($context, "alt"), "html", null, true);
                    echo "'";
                    $context["alt"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 14
                    echo "        ";
                }
                // line 15
                echo "        <img ";
                echo twig_escape_filter($this->env, $this->getContext($context, "alt"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, ((array_key_exists("width", $context)) ? (_twig_default_filter($this->getContext($context, "width"), "")) : ("")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, ((array_key_exists("height", $context)) ? (_twig_default_filter($this->getContext($context, "height"), "")) : ("")), "html", null, true);
                echo " src='";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "metadata"), "logo", array(), "array"), "html", null, true);
                echo "' />
    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 19
    public function getinlineHelp($_text = null)
    {
        $context = $this->env->mergeGlobals(array(
            "text" => $_text,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 20
            echo "    <div class=\"ui-inline-help\" >
        ";
            // line 21
            echo $this->getContext($context, "text");
            echo "
    </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "macros.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 21,  125 => 20,  114 => 19,  93 => 15,  81 => 13,  75 => 11,  68 => 10,  65 => 9,  52 => 6,  49 => 5,  24 => 1,  170 => 46,  164 => 44,  161 => 43,  158 => 42,  155 => 41,  152 => 40,  150 => 39,  147 => 38,  145 => 37,  142 => 36,  139 => 35,  133 => 33,  130 => 32,  127 => 31,  124 => 30,  118 => 28,  115 => 27,  113 => 26,  111 => 25,  109 => 24,  106 => 23,  102 => 22,  98 => 20,  96 => 19,  92 => 18,  83 => 17,  69 => 15,  62 => 8,  56 => 13,  51 => 12,  48 => 11,  46 => 10,  41 => 7,  39 => 3,  29 => 4,  90 => 14,  66 => 10,  61 => 8,  57 => 6,  40 => 4,  167 => 45,  165 => 46,  149 => 43,  146 => 42,  143 => 41,  140 => 39,  136 => 34,  121 => 29,  119 => 34,  116 => 33,  99 => 32,  87 => 31,  80 => 30,  78 => 12,  76 => 16,  74 => 21,  72 => 13,  55 => 7,  47 => 16,  44 => 15,  42 => 4,  38 => 11,  36 => 2,  33 => 9,  31 => 5,  25 => 6,  23 => 3,  21 => 2,  19 => 18,);
    }
}
