<?php

/* settings.tax.rate.form.tpl */
class __TwigTemplate_be1a89cc37928e359e8fbe4dc6f192ab extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        $context['util'] = $this->env->loadTemplate("macros/util.tpl", true);
        // line 2
        $context['formBuilder'] = $this->env->loadTemplate("macros/forms.tpl", true);
        echo "<div id=\"content\">
\t<form action=\"index.php\" method=\"post\" id=\"taxRateForm\" accept-charset=\"utf-8\">
\t\t";
        // line 5
        if ($this->getAttribute((isset($context['taxRate']) ? $context['taxRate'] : null), "id", array(), "any")) {
            echo "\t\t\t<input type=\"hidden\" name=\"ToDo\" value=\"saveUpdatedTaxRate\" />
\t\t\t<input type=\"hidden\" name=\"id\" value=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['taxRate']) ? $context['taxRate'] : null), "id", array(), "any"), "1");
            echo "\" />
\t\t\t<h1>";
            // line 8
            echo getLang("EditTaxRateTitle", array("name" => $this->getAttribute((isset($context['taxRate']) ? $context['taxRate'] : null), "name", array(), "any"), "zone" => $this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "name", array(), "any")));
            // line 11
            echo "</h1>
\t\t\t<p class=\"intro\">
\t\t\t\t";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "EditTaxRateIntro", array(), "any"), "1");
            echo "
\t\t\t</p>
\t\t";
        } else {
            // line 15
            echo "\t\t\t<input type=\"hidden\" name=\"ToDo\" value=\"saveNewTaxRate\" />
\t\t\t<h1>";
            // line 17
            echo getLang("AddTaxRateTitle", array("zone" => $this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "name", array(), "any")));
            // line 19
            echo "</h1>
\t\t\t<p class=\"intro\">
\t\t\t\t";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "AddTaxRateIntro", array(), "any"), "1");
            echo "
\t\t\t</p>
\t\t";
        }
        // line 23
        echo "\t\t<input type=\"hidden\" name=\"tax_zone_id\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "id", array(), "any"), "1");
        echo "\" />
\t\t
\t\t";
        // line 26
        echo twig_safe_filter((isset($context['flashMessages']) ? $context['flashMessages'] : null));
        echo "

\t\t<p class=\"intro\">
\t\t\t<input type=\"submit\" value=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Save", array(), "any"), "1");
        echo "\" class=\"saveButton\" />
\t\t\tor <a href=\"#\" class=\"cancelLink\">";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Cancel", array(), "any"), "1");
        echo "</a>
\t\t</p>
\t\t
\t\t";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startForm", array(), "any"), "1");
        echo "
\t\t\t";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "heading", array($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "TaxRateSettings", array(), "any"), ), "method"), "1");
        echo "
\t\t
\t\t\t";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startRow", array(array("label" => ($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "TaxRateName", array(), "any")) . (":"), "required" => true), ), "method"), "1");
        // line 39
        echo "
\t\t\t\t";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "input", array("text", "name", $this->getAttribute((isset($context['taxRate']) ? $context['taxRate'] : null), "name", array(), "any"), array("class" => "Field300"), ), "method"), "1");
        // line 42
        echo "
\t\t\t\t";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['util']) ? $context['util'] : null), "tooltip", array("TaxRateName", "TaxRateNameHelp", ), "method"), "1");
        echo "
\t\t\t";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endRow", array(), "any"), "1");
        echo "
\t\t\t
\t\t\t";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startRow", array(array("label" => ($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "TaxClassRates", array(), "any")) . (":"), "required" => true), ), "method"), "1");
        // line 49
        echo "
\t\t\t\t<div class=\"taxClassRate\">
\t\t\t\t\t";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "input", array("text", "default_rate", $this->getAttribute((isset($context['taxRate']) ? $context['taxRate'] : null), "default_rate", array(), "any"), array("class" => "Field50"), ), "method"), "1");
        // line 53
        echo "
\t\t\t\t\t% ";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "ForProductsMarkedAsDefault", array(), "any"), "1");
        echo "
\t\t\t\t</div>
\t\t\t\t";
        // line 56
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_iterator_to_array((isset($context['taxClasses']) ? $context['taxClasses'] : null));
        $countable = is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable);
        $length = $countable ? count($context['_seq']) : null;
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if ($countable) {
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context['id'] => $context['name']) {
            echo "\t\t\t\t\t<div class=\"taxClassRate\">
\t\t\t\t\t\t";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "input", array("text", (("rates[") . ((isset($context['id']) ? $context['id'] : null))) . ("]"), $this->getAttribute($this->getAttribute((isset($context['taxRate']) ? $context['taxRate'] : null), "rates", array(), "any"), (isset($context['id']) ? $context['id'] : null), array(), "array"), array("class" => "Field50 taxClassRate"), ), "method"), "1");
            // line 60
            echo "
\t\t\t\t\t\t% ";
            // line 61
            echo getLang("ForProductsMarkedAsX", array("name" => (isset($context['name']) ? $context['name'] : null)));
            // line 63
            echo "\t\t\t\t\t</div>
\t\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if ($countable) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 65
        echo "\t\t\t\t<p class=\"note\">";
        // line 66
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "AddMoreTaxClassesNote", array(), "any"), "1");
        echo "</p>
\t\t\t";
        // line 67
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endRow", array(), "any"), "1");
        echo "
\t\t\t
\t\t\t";
        // line 69
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startRow", array(array("label" => ($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "CalculationPriority", array(), "any")) . (":"), "required" => true), ), "method"), "1");
        // line 72
        echo "
\t\t\t\t";
        // line 73
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "input", array("text", "priority", $this->getAttribute((isset($context['taxRate']) ? $context['taxRate'] : null), "priority", array(), "any"), array("class" => "Field50"), ), "method"), "1");
        // line 75
        echo "
\t\t\t\t";
        // line 76
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['util']) ? $context['util'] : null), "tooltip", array("CalculationPriority", "CalculationPriorityHelp", ), "method"), "1");
        echo "
\t\t\t\t<a href=\"#\" class=\"priorityHelpLink\">";
        // line 77
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "ReadThisArticleForMoreInformation", array(), "any"), "1");
        echo "</a>
\t\t\t\t";
        // line 78
        if ((isset($context['existingTaxRates']) ? $context['existingTaxRates'] : null)) {
            echo "\t\t\t\t\t<div class=\"existingPriorityReference\">
\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t";
            // line 81
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "ForYourReferenceExistingPriorities", array(), "any"), "1");
            echo "
\t\t\t\t\t\t</p>
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t";
            // line 84
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_iterator_to_array((isset($context['existingTaxRates']) ? $context['existingTaxRates'] : null));
            $countable = is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable);
            $length = $countable ? count($context['_seq']) : null;
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if ($countable) {
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context['name'] => $context['priority']) {
                echo "\t\t\t\t\t\t\t\t<li>";
                // line 85
                echo twig_escape_filter($this->env, (isset($context['name']) ? $context['name'] : null), "1");
                echo ": ";
                echo twig_escape_filter($this->env, (isset($context['priority']) ? $context['priority'] : null), "1");
                echo "</li>
\t\t\t\t\t\t\t";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if ($countable) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['priority'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 86
            echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t";
        }
        // line 89
        echo "\t\t\t";
        // line 90
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endRow", array(), "any"), "1");
        echo "
\t\t
\t\t\t";
        // line 92
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startRow", array(array("label" => ($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "EnableTaxRate", array(), "any")) . ("?"), "required" => true), ), "method"), "1");
        // line 95
        echo "
\t\t\t\t";
        // line 96
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "input", array("hidden", "enabled", 0, ), "method"), "1");
        echo "
\t\t\t\t<label>
\t\t\t\t\t<input type=\"checkbox\" name=\"enabled\" value=\"1\" ";
        // line 98
        if ($this->getAttribute((isset($context['taxRate']) ? $context['taxRate'] : null), "enabled", array(), "any")) {
            echo "checked=\"checked\"";
        }
        echo " />
\t\t\t\t\t";
        // line 99
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "YesEnableTaxRate", array(), "any"), "1");
        echo "
\t\t\t\t</label>
\t\t\t";
        // line 101
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endRow", array(), "any"), "1");
        echo "
\t\t\t
\t\t\t";
        // line 103
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startButtonRow", array(), "any"), "1");
        echo "
\t\t\t\t<input type=\"submit\" value=\"";
        // line 104
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Save", array(), "any"), "1");
        echo "\" class=\"saveButton\" />
\t\t\t\tor <a href=\"#\" class=\"cancelLink\">";
        // line 105
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Cancel", array(), "any"), "1");
        echo "</a>
\t\t\t";
        // line 106
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endButtonRow", array(), "any"), "1");
        echo "
\t\t</div>
\t</form>
</div>
<script type=\"text/javascript\">
\tlang.ConfirmCancel = \"";
        // line 111
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "ConfirmCancel", array(), "any"), "1");
        echo "\";
\tlang.TaxRateMissingName = \"";
        // line 112
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "TaxRateMissingName", array(), "any"), "1");
        echo "\";
\tlang.InvalidTaxRatePriority = \"";
        // line 113
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "InvalidTaxRatePriority", array(), "any"), "1");
        echo "\";
\tlang.InvalidTaxRateClassRate = \"";
        // line 114
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "InvalidTaxRateClassRate", array(), "any"), "1");
        echo "\";
</script>
<script src=\"script/tax.rate.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";
    }

}
