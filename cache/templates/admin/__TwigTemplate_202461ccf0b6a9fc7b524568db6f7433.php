<?php

/* settings.tax.zone.form.tpl */
class __TwigTemplate_202461ccf0b6a9fc7b524568db6f7433 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<link rel=\"stylesheet\" href=\"Styles/tax.settings.css\" type=\"text/css\" charset=\"utf-8\" />
";
        // line 2
        $context['util'] = $this->env->loadTemplate("macros/util.tpl", true);
        // line 3
        $context['formBuilder'] = $this->env->loadTemplate("macros/forms.tpl", true);
        echo "
<div id=\"content\">
\t<div id=\"taxZoneSettings\">
\t\t";
        // line 7
        if ($this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "id", array(), "any")) {
            echo "\t\t\t<h1>
\t\t\t\t";
            // line 9
            if ((isset($context['created']) ? $context['created'] : null)) {
                echo "\t\t\t\t\t";
                // line 10
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "AddTaxZoneStep2", array(), "any"), "1");
                echo "
\t\t\t\t";
            } else {
                // line 11
                echo "\t\t\t\t\t";
                // line 12
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "EditTaxZone", array(), "any"), "1");
                echo ": ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "name", array(), "any"), "1");
                echo "
\t\t\t\t";
            }
            // line 13
            echo "\t\t\t</h1>
\t\t\t<p class=\"intro\">
\t\t\t\t";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "EditTaxzoneIntro", array(), "any"), "1");
            echo "
\t\t\t</p>

\t\t\t";
            // line 19
            echo twig_safe_filter((isset($context['flashMessages']) ? $context['flashMessages'] : null));
            echo "

\t\t\t";
            // line 21
            if ((isset($context['pendingChangesToApply']) ? $context['pendingChangesToApply'] : null)) {
                echo "\t\t\t\t<p class=\"MessageBox MessageBoxInfo\">";
                // line 22
                echo getLang("ApplyPendingTaxChanges");
                echo "</p>
\t\t\t";
            }
            // line 23
            echo "
\t\t\t";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['util']) ? $context['util'] : null), "tabs", array(array("settingsTab" => $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "ZoneSettings", array(), "any"), "taxRatesTab" => $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "TaxRates", array(), "any")), ), "method"), "1");
            // line 28
            echo "

\t\t";
        } else {
            // line 30
            echo "\t\t\t<h1>";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "AddTaxZoneStep1", array(), "any"), "1");
            echo "</h1>
\t\t\t<p class=\"intro\">
\t\t\t\t";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "AddTaxZoneIntro", array(), "any"), "1");
            echo "
\t\t\t</p>

\t\t\t";
            // line 36
            echo twig_safe_filter((isset($context['flashMessages']) ? $context['flashMessages'] : null));
            echo "

\t\t";
        }
        // line 38
        echo "
\t\t<div id=\"settingsTab\">
\t\t\t<form action=\"index.php\" method=\"post\" id=\"taxZoneForm\" accept-charset=\"utf-8\">
\t\t\t\t";
        // line 42
        if ($this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "id", array(), "any")) {
            echo "\t\t\t\t\t<input type=\"hidden\" name=\"ToDo\" value=\"saveUpdatedTaxZone\" />
\t\t\t\t\t<input type=\"hidden\" name=\"id\" value=\"";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "id", array(), "any"), "1");
            echo "\" />
\t\t\t\t";
        } else {
            // line 45
            echo "\t\t\t\t\t<input type=\"hidden\" name=\"ToDo\" value=\"saveNewTaxZone\" />
\t\t\t\t";
        }
        // line 47
        echo "
\t\t\t\t<p class=\"intro\">
\t\t\t\t\t<input type=\"submit\" value=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Save", array(), "any"), "1");
        echo "\" class=\"saveButton\" />
\t\t\t\t\tor <a href=\"#\" class=\"cancelLink\">";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Cancel", array(), "any"), "1");
        echo "</a>
\t\t\t\t</p>

\t\t\t\t";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startForm", array(), "any"), "1");
        echo "
\t\t\t\t\t";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "heading", array($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "TaxZoneSettings", array(), "any"), ), "method"), "1");
        echo "

\t\t\t\t\t";
        // line 57
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startRow", array(array("label" => ($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "TaxZoneName", array(), "any")) . (":"), "required" => true), ), "method"), "1");
        // line 60
        echo "
\t\t\t\t\t\t";
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "input", array("text", "name", $this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "name", array(), "any"), array("class" => "Field300"), ), "method"), "1");
        // line 63
        echo "
\t\t\t\t\t\t";
        // line 64
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['util']) ? $context['util'] : null), "tooltip", array("TaxZoneName", "TaxZoneNameHelp", ), "method"), "1");
        echo "
\t\t\t\t\t";
        // line 65
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endRow", array(), "any"), "1");
        echo "

\t\t\t\t\t";
        // line 67
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startRow", array(array("label" => ($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "TaxZoneType", array(), "any")) . (":"), "required" => true), ), "method"), "1");
        // line 70
        echo "
\t\t\t\t\t\t";
        // line 71
        if ($this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "default", array(), "any")) {
            echo "\t\t\t\t\t\t\t";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "TaxZoneTypeDefault", array(), "any"), "1");
            echo "
\t\t\t\t\t\t";
        } else {
            // line 73
            echo "\t\t\t\t\t\t\t<label class=\"row\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"type\" value=\"country\" ";
            // line 75
            if ($this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "type", array(), "any") == "country") {
                echo "checked=\"checked\"";
            }
            echo " />
\t\t\t\t\t\t\t\t";
            // line 76
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "TaxZoneTypeCountry", array(), "any"), "1");
            echo "
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<div class=\"zoneTypeToggle zoneTypeCountry\" ";
            // line 78
            if ($this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "type", array(), "any") != "country") {
                echo "style=\"display: none\"";
            }
            echo ">
\t\t\t\t\t\t\t\t";
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "multiselect", array("countries[]", (isset($context['countryList']) ? $context['countryList'] : null), $this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "countries", array(), "any"), array("size" => 15, "multiple" => "multiple", "class" => "Field250 ISSelectReplacement"), ), "method"), "1");
            // line 83
            echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<label class=\"row\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"type\" value=\"state\" ";
            // line 86
            if ($this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "type", array(), "any") == "state") {
                echo "checked=\"checked\"";
            }
            echo " />
\t\t\t\t\t\t\t\t";
            // line 87
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "TaxZoneTypeState", array(), "any"), "1");
            echo "
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<div class=\"zoneTypeToggle zoneTypeState\" ";
            // line 89
            if ($this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "type", array(), "any") != "state") {
                echo "style=\"display: none\"";
            }
            echo ">
\t\t\t\t\t\t\t\t";
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startRow", array(array("label" => ($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Countries", array(), "any")) . (":"), "required" => true), ), "method"), "1");
            // line 93
            echo "
\t\t\t\t\t\t\t\t\t";
            // line 94
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "multiselect", array("state_countries[]", (isset($context['countryList']) ? $context['countryList'] : null), $this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "countries", array(), "any"), array("size" => 10, "multiple" => "multiple", "class" => "Field250 ISSelectReplacement", "id" => "stateCountrySelect", "onchange" => "Tax_Zone.toggleStateCountry()"), ), "method"), "1");
            // line 100
            echo "
\t\t\t\t\t\t\t\t";
            // line 101
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endRow", array(), "any"), "1");
            echo "

\t\t\t\t\t\t\t\t";
            // line 103
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startRow", array(array("label" => ($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "States", array(), "any")) . (":"), "required" => true), ), "method"), "1");
            // line 106
            echo "
\t\t\t\t\t\t\t\t\t<div class=\"stateSelectSome\" ";
            // line 107
            if ($this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "states", array(), "any") == false) {
                echo "style=\"display: none\"";
            }
            echo ">
\t\t\t\t\t\t\t\t\t\t<select name=\"states[]\" id=\"stateSelect\" size=\"10\" multiple=\"multiple\" class=\"Field250 ISSelectReplacement\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 109
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_iterator_to_array((isset($context['countryStateList']) ? $context['countryStateList'] : null));
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
            foreach ($context['_seq'] as $context['_key'] => $context['country']) {
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<optgroup class=\"country";
                // line 110
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['country']) ? $context['country'] : null), "id", array(), "any"), "1");
                echo "\" label=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['country']) ? $context['country'] : null), "name", array(), "any"), "1");
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                // line 111
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['country']) ? $context['country'] : null), "id", array(), "any"), "1");
                echo "-0\" ";
                if (twig_in_filter((($this->getAttribute((isset($context['country']) ? $context['country'] : null), "id", array(), "any")) . ("-")) . (0), $this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "states", array(), "any"))) {
                    echo "selected=\"selected\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "AllStates", array(), "any"), "1");
                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 112
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_iterator_to_array($this->getAttribute((isset($context['country']) ? $context['country'] : null), "states", array(), "any"));
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
                foreach ($context['_seq'] as $context['stateId'] => $context['state']) {
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                    // line 113
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['country']) ? $context['country'] : null), "id", array(), "any"), "1");
                    echo "-";
                    echo twig_escape_filter($this->env, (isset($context['stateId']) ? $context['stateId'] : null), "1");
                    echo "\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 114
                    if (twig_in_filter((($this->getAttribute((isset($context['country']) ? $context['country'] : null), "id", array(), "any")) . ("-")) . ((isset($context['stateId']) ? $context['stateId'] : null)), $this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "states", array(), "any"))) {
                        echo "selected=\"selected\"";
                    }
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 116
                    echo twig_escape_filter($this->env, (isset($context['state']) ? $context['state'] : null), "1");
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
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
                unset($context['_seq'], $context['_iterated'], $context['stateId'], $context['state'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 118
                echo "\t\t\t\t\t\t\t\t\t\t\t\t</optgroup>
\t\t\t\t\t\t\t\t\t\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 120
            echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"stateSelectNone\" ";
            // line 123
            if ($this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "states", array(), "any")) {
                echo "style=\"display: none\"";
            }
            echo ">
\t\t\t\t\t\t\t\t\t\t<div>";
            // line 124
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "ChooseCountriesBeforeStates", array(), "any"), "1");
            echo "</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
            // line 126
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endRow", array(), "any"), "1");
            echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<label class=\"row\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"type\" value=\"zip\" ";
            // line 129
            if ($this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "type", array(), "any") == "zip") {
                echo "checked=\"checked\"";
            }
            echo " />
\t\t\t\t\t\t\t\t";
            // line 130
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "TaxZoneTypeZip", array(), "any"), "1");
            echo "
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<div class=\"zoneTypeToggle zoneTypeZip\" ";
            // line 132
            if ($this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "type", array(), "any") != "zip") {
                echo "style=\"display: none\"";
            }
            echo ">
\t\t\t\t\t\t\t\t";
            // line 133
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startRow", array(array("label" => ($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Country", array(), "any")) . (":"), "required" => true), ), "method"), "1");
            // line 136
            echo "
\t\t\t\t\t\t\t\t\t";
            // line 137
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "select", array("country", (isset($context['countryList']) ? $context['countryList'] : null), $this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "country", array(), "any"), array("class" => "Field250"), ), "method"), "1");
            // line 139
            echo "
\t\t\t\t\t\t\t\t";
            // line 140
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endRow", array(), "any"), "1");
            echo "

\t\t\t\t\t\t\t\t";
            // line 142
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startRow", array(array("label" => ($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "ZipCodes", array(), "any")) . (":"), "required" => true), ), "method"), "1");
            // line 145
            echo "
\t\t\t\t\t\t\t\t\t<textarea name=\"zip_codes\" class=\"Field250\" rows=\"10\" cols=\"10\">";
            // line 146
            echo twig_join_filter(twig_escape_filter($this->env, $this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "zip_codes", array(), "any"), "1"), "
");
            echo "</textarea>
\t\t\t\t\t\t\t\t\t<br />
\t\t\t\t\t\t\t\t\t<a href='#' onclick='LaunchHelp(850); return false;' target=\"_blank\">
\t\t\t\t\t\t\t\t\t\t";
            // line 149
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "LearnMoreZipCodes", array(), "any"), "1");
            echo "
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t";
            // line 151
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endRow", array(), "any"), "1");
            echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        }
        // line 153
        echo "\t\t\t\t\t";
        // line 154
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endRow", array(), "any"), "1");
        echo "

\t\t\t\t\t";
        // line 156
        if ($this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "default", array(), "any") == 0) {
            echo "\t\t\t\t\t\t";
            // line 157
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startRow", array(array("label" => ($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "TaxZoneAppliesTo", array(), "any")) . (":"), "required" => true), ), "method"), "1");
            // line 160
            echo "
\t\t\t\t\t\t\t<label class=\"row\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"applies_to\" value=\"all\" ";
            // line 162
            if ($this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "groups", array(), "any") == false) {
                echo "checked=\"checked\"";
            }
            echo " />
\t\t\t\t\t\t\t\t";
            // line 163
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "AllCustomersInStore", array(), "any"), "1");
            echo "
\t\t\t\t\t\t\t\t";
            // line 164
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['util']) ? $context['util'] : null), "tooltip", array("TaxZoneAppliesTo", "TaxZoneAppliesToHelp", ), "method"), "1");
            echo "
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<label class=\"row\">
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"applies_to\" value=\"groups\" ";
            // line 167
            if ($this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "groups", array(), "any")) {
                echo "checked=\"checked\"";
            }
            echo " />
\t\t\t\t\t\t\t\t";
            // line 168
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "OnlyTheseCustomerGroups", array(), "any"), "1");
            echo ":
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<div class=\"zoneGroupSelect\" ";
            // line 170
            if ($this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "groups", array(), "any") == false) {
                echo "style=\"display: none\"";
            }
            echo ">
\t\t\t\t\t\t\t\t";
            // line 171
            if ((isset($context['customerGroupList']) ? $context['customerGroupList'] : null)) {
                echo "\t\t\t\t\t\t\t\t\t";
                // line 172
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "multiselect", array("groups[]", (isset($context['customerGroupList']) ? $context['customerGroupList'] : null), $this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "groups", array(), "any"), array("size" => 5, "multiple" => "multiple", "class" => "Field250 ISSelectReplacement"), ), "method"), "1");
                // line 176
                echo "
\t\t\t\t\t\t\t\t";
            } else {
                // line 177
                echo "\t\t\t\t\t\t\t\t\t<p class=\"note\">
\t\t\t\t\t\t\t\t\t\t";
                // line 179
                echo twig_safe_filter($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "NoCustomerGroupsCreate", array(), "any"));
                echo "
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t";
            }
            // line 181
            echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
            // line 183
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endRow", array(), "any"), "1");
            echo "

\t\t\t\t\t\t";
            // line 185
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startRow", array(array("label" => ($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "EnableTaxZone", array(), "any")) . ("?"), "required" => true), ), "method"), "1");
            // line 188
            echo "
\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"enabled\" value=\"1\" ";
            // line 190
            if ($this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "enabled", array(), "any")) {
                echo "checked=\"checked\"";
            }
            echo " />
\t\t\t\t\t\t\t\t";
            // line 191
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "YesEnableTaxZone", array(), "any"), "1");
            echo "
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t";
            // line 193
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endRow", array(), "any"), "1");
            echo "
\t\t\t\t\t";
        }
        // line 194
        echo "
\t\t\t\t\t";
        // line 196
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startButtonRow", array(), "any"), "1");
        echo "
\t\t\t\t\t\t<input type=\"submit\" value=\"";
        // line 197
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Save", array(), "any"), "1");
        echo "\" class=\"saveButton\" />
\t\t\t\t\t\tor <a href=\"#\" class=\"cancelLink\">";
        // line 198
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Cancel", array(), "any"), "1");
        echo "</a>
\t\t\t\t\t";
        // line 199
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endButtonRow", array(), "any"), "1");
        echo "
\t\t\t\t";
        // line 200
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endForm", array(), "any"), "1");
        echo "
\t\t\t</form>
\t\t</div>

\t\t";
        // line 204
        if ($this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "id", array(), "any")) {
            echo "\t\t\t<div id=\"taxRatesTab\">
\t\t\t\t<p class=\"intro\">
\t\t\t\t\t";
            // line 207
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "TaxRatesIntro", array(), "any"), "1");
            echo "
\t\t\t\t</p>

\t\t\t\t";
            // line 210
            if ((isset($context['taxRateGrid']) ? $context['taxRateGrid'] : null) == false) {
                echo "\t\t\t\t\t<p class=\"MessageBox MessageBoxInfo\">
\t\t\t\t\t\t";
                // line 212
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "NoTaxRatesCreateOne", array(), "any"), "1");
                echo "
\t\t\t\t\t</p>
\t\t\t\t";
            }
            // line 214
            echo "
\t\t\t\t<form action=\"index.php\" method=\"post\" accept-charset=\"utf-8\">
\t\t\t\t\t<input type=\"hidden\" name=\"ToDo\" value=\"deleteTaxRates\" />

\t\t\t\t\t<p class=\"intro\">
\t\t\t\t\t\t<input type=\"button\" value=\"";
            // line 220
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "AddATaxRateButton", array(), "any"), "1");
            echo "\" class=\"addTaxRateButton\" />
\t\t\t\t\t\t<input type=\"submit\" value=\"";
            // line 221
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "DeleteSelected", array(), "any"), "1");
            echo "\" class=\"deleteTaxRatesButton\" />
\t\t\t\t\t</p>

\t\t\t\t\t<div class=\"GridContainer\">
\t\t\t\t\t\t";
            // line 225
            echo twig_safe_filter((isset($context['taxRateGrid']) ? $context['taxRateGrid'] : null));
            echo "
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t</div>
\t\t";
        }
        // line 229
        echo "\t</div>
</div>
<script type=\"text/javascript\" charset=\"utf-8\">
\tdefaultZone = '";
        // line 233
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['taxZone']) ? $context['taxZone'] : null), "default", array(), "any"), "1");
        echo "';
\tlang.AllStates = \"";
        // line 234
        echo Interspire_Template_Extension::jsFilter(getLang("AllStates"), "'");
        echo "\";
\tlang.ConfirmCancel = \"";
        // line 235
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "ConfirmCancel", array(), "any"), "1");
        echo "\";
\tlang.ConfirmDeleteTaxRates = \"";
        // line 236
        echo getLang("ConfirmDeleteTaxRates");
        echo "\";
\tlang.SelectTaxRatesToDelete = \"";
        // line 237
        echo Interspire_Template_Extension::jsFilter(getLang("SelectTaxRatesToDelete"), "'");
        echo "\";
\tlang.ConfirmDeleteTaxRates = \"";
        // line 238
        echo getLang("ConfirmDeleteTaxRates");
        echo "\";
\tlang.TaxZoneMissingName = \"";
        // line 239
        echo $this->getEnvironment()->getExtension('interspire')->jsFilter($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "TaxZoneMissingName", array(), "any"));
        echo "\";
\tlang.TaxZoneSelectOneMoreCountries = \"";
        // line 240
        echo $this->getEnvironment()->getExtension('interspire')->jsFilter($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "TaxZoneSelectOneMoreCountries", array(), "any"));
        echo "\";
\tlang.TaxZoneSelectOneMoreStates = \"";
        // line 241
        echo $this->getEnvironment()->getExtension('interspire')->jsFilter($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "TaxZoneSelectOneMoreStates", array(), "any"));
        echo "\";
\tlang.TaxZoneSelectCountry = \"";
        // line 242
        echo $this->getEnvironment()->getExtension('interspire')->jsFilter($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "TaxZoneSelectCountry", array(), "any"));
        echo "\";
\tlang.TaxZoneEnterOneMoreZipCodes = \"";
        // line 243
        echo $this->getEnvironment()->getExtension('interspire')->jsFilter($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "TaxZoneEnterOneMoreZipCodes", array(), "any"));
        echo "\";
\tlang.TaxZoneSelectOneMoreGroups = \"";
        // line 244
        echo $this->getEnvironment()->getExtension('interspire')->jsFilter($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "TaxZoneSelectOneMoreGroups", array(), "any"));
        echo "\";

</script>
<script src=\"script/tax.zone.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";
    }

}
