<?php

/* emailintegration.moduleexport.tpl */
class __TwigTemplate_291900c76b1017eed10ba4e2c8a2caf8 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<div class=\"ModalTitle\">
\t<span class=\"ExportMachine_State_CommenceExport ExportMachine_State_ExportFailed\" style=\"display:none;\">
\t\t";
        // line 3
        echo twig_escape_filter($this->env, (isset($context['modalTitle']) ? $context['modalTitle'] : null), "1");
        echo "
\t</span>

\t<span class=\"ExportMachine_State_SelectList ExportMachine_State_PrepareConfigureFields\" style=\"display:none;\">
\t\t";
        // line 7
        echo twig_escape_filter($this->env, (isset($context['modalTitle']) ? $context['modalTitle'] : null), "1");
        echo " (";
        echo getLang("EmailIntegration_Export_Dialog_StepTemplate", array("a" => 1, "b" => 3));
        echo ")
\t</span>
\t<span class=\"ExportMachine_State_ConfigureFields\" style=\"display:none;\">
\t\t";
        // line 10
        echo twig_escape_filter($this->env, (isset($context['modalTitle']) ? $context['modalTitle'] : null), "1");
        echo " (";
        echo getLang("EmailIntegration_Export_Dialog_StepTemplate", array("a" => 2, "b" => 3));
        echo ")
\t</span>
\t<span class=\"ExportMachine_State_ConfirmExport\" style=\"display:none;\">
\t\t";
        // line 13
        echo twig_escape_filter($this->env, (isset($context['modalTitle']) ? $context['modalTitle'] : null), "1");
        echo " (";
        echo getLang("EmailIntegration_Export_Dialog_StepTemplate", array("a" => 2, "b" => 3));
        echo ")
\t</span>
\t<span class=\"ExportMachine_State_Confirmation\" style=\"display:none;\">
\t\t";
        // line 16
        echo getLang("EmailIntegration_Export_Dialog_CommencedTitle");
        echo "\t</span>
</div>

<div class=\"ModalContent\">
\t<div class=\"ExportMachine_StateContainer\">
\t\t";
        // line 22
        if ((!twig_length_filter($this->env, (isset($context['lists']) ? $context['lists'] : null)))) {
            echo "\t\t\t<div class=\"ExportMachine_State_NoLists\" style=\"display:none\">
\t\t\t\t<br />
\t\t\t\t";
            // line 25
            echo getLang("EmailIntegration_Export_Dialog_NoLists", array("module_id" => $this->getAttribute((isset($context['module']) ? $context['module'] : null), "id", array(), "any"), "module_name" => $this->getAttribute((isset($context['module']) ? $context['module'] : null), "name", array(), "any")));
            // line 28
            echo "\t\t\t</div>
\t\t";
        } else {
            // line 30
            echo "\t\t\t<div class=\"ExportMachine_State_SelectList\" style=\"display:none;\">
\t\t\t\t<br />
\t\t\t\t";
            // line 33
            echo getLang("EmailIntegration_Export_Dialog_WhichList", array("provider" => $this->getAttribute((isset($context['module']) ? $context['module'] : null), "name", array(), "any"), "type" => twig_lower_filter($this->env, (isset($context['typePlural']) ? $context['typePlural'] : null))));
            // line 36
            echo "<br />
\t\t\t\t<br />
\t\t\t\t<select class=\"Field100pct ExportMachine_SelectList\" size=\"8\" accesskey=\"l\">
\t\t\t\t\t";
            // line 39
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_iterator_to_array((isset($context['lists']) ? $context['lists'] : null));
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
            foreach ($context['_seq'] as $context['_key'] => $context['list']) {
                echo "\t\t\t\t\t\t<option value=\"";
                // line 40
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['list']) ? $context['list'] : null), "provider_list_id", array(), "any"), "1");
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['list']) ? $context['list'] : null), "name", array(), "any"), "1");
                echo "</option>
\t\t\t\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['list'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 41
            echo "\t\t\t\t</select><br />
\t\t\t\t<br />
\t\t\t\t";
            // line 44
            echo getLang("EmailIntegration_Export_Dialog_DontSeeList");
            echo "<br />
\t\t\t</div>

\t\t\t<div class=\"ExportMachine_State_PrepareConfigureFields\" style=\"display:none;\">
\t\t\t\t<br />
\t\t\t\t";
            // line 49
            echo getLang("EmailIntegration_Export_Dialog_LoadingFields");
            echo "<br />
\t\t\t</div>

\t\t\t<div class=\"ExportMachine_State_ConfigureFields ExportMachine_ConfigureFields\" style=\"display:none;\">
\t\t\t\t<br />
\t\t\t\t";
            // line 54
            echo getLang("FieldSyncFormIntro", array("provider" => $this->getAttribute((isset($context['module']) ? $context['module'] : null), "name", array(), "any")));
            // line 56
            echo "<br />
\t\t\t\t<br />
\t\t\t\t<div class=\"ExportMachine_ConfigureFields_OkMessage MessageBox MessageBoxSuccess\" style=\"display:none;\">";
            // line 58
            echo getLang("EmailIntegration_Export_Dialog_MappingValid");
            echo "</div>
\t\t\t\t<div class=\"ExportMachine_ConfigureFields_ErrorMessage MessageBox MessageBoxError\" style=\"display:none;\">";
            // line 59
            echo getLang("EmailIntegration_Export_Dialog_MappingInvalid");
            echo "</div>

\t\t\t\t";
            // line 61
            echo "
\t\t\t\t<div class=\"ExportMachine_ConfigureFields_Container\"></div>
\t\t\t</div>

\t\t\t<div class=\"ExportMachine_State_ConfigureFields ExportMachine_GuessFields\" style=\"display:none;\">
\t\t\t\t<input type=\"checkbox\" id=\"fieldSyncFormGuessFields\" /> <label for=\"fieldSyncFormGuessFields\">";
            // line 66
            echo getLang("FieldSyncFormGuessFieldsLabel", array("provider" => $this->getAttribute((isset($context['module']) ? $context['module'] : null), "name", array(), "any")));
            // line 68
            echo "</label>
\t\t\t</div>

\t\t\t<div class=\"ExportMachine_State_ConfirmExport\" style=\"display:none;\">
\t\t\t\t<br />
\t\t\t\t";
            // line 73
            echo getLang("EmailIntegration_Export_Dialog_Confirmation", array("type" => twig_lower_filter($this->env, (isset($context['typePlural']) ? $context['typePlural'] : null)), "module" => $this->getAttribute((isset($context['module']) ? $context['module'] : null), "name", array(), "any"), "list" => "<span class=\"ExportMachine_ConfirmExport_ListName\"></span>"));
            // line 77
            echo "<br />
\t\t\t\t<br />
\t\t\t\t<table cellspacing=\"0\">
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td valign=\"top\"><input type=\"checkbox\" id=\"ExportMachine_ConfirmExport_DoubleOptin\" checked=\"checked\" /></td>
\t\t\t\t\t\t<td><label for=\"ExportMachine_ConfirmExport_DoubleOptin\">";
            // line 82
            echo getLang("EmailIntegration_Export_Dialog_DoubleOptin");
            echo "</label></td>
\t\t\t\t\t</tr>
\t\t\t\t\t";
            // line 84
            if ($this->getAttribute($this->getAttribute((isset($context['module']) ? $context['module'] : null), "object", array(), "any"), "supportsSubscriberUpdates", array(), "any")) {
                echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td valign=\"top\"><input type=\"checkbox\" id=\"ExportMachine_ConfirmExport_UpdateExisting\" checked=\"checked\" /></td>
\t\t\t\t\t\t\t<td><label for=\"ExportMachine_ConfirmExport_UpdateExisting\">";
                // line 87
                echo getLang("EmailIntegration_Export_Dialog_UpdateExisting");
                echo "</label></td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>&nbsp;</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<div class=\"ExportMachine_Note\">";
                // line 92
                echo getLang("EmailIntegration_Export_Dialog_UpdateExisting_Note");
                echo "</div>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
            } else {
                // line 95
                echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td valign=\"top\"><input type=\"checkbox\" disabled=\"disabled\" /></td>
\t\t\t\t\t\t\t<td><label class=\"Disabled\">";
                // line 98
                echo getLang("EmailIntegration_Export_Dialog_UpdateExisting");
                echo "</label></td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>&nbsp;</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<div class=\"ExportMachine_Note\">";
                // line 103
                echo getLang("EmailIntegration_Export_Dialog_UpdateExisting_Disabled", array("module" => $this->getAttribute((isset($context['module']) ? $context['module'] : null), "name", array(), "any")));
                // line 105
                echo "</div>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
            }
            // line 108
            echo "\t\t\t\t</table>
\t\t\t\t<br />
\t\t\t\t";
            // line 111
            echo getLang("EmailIntegration_Export_Dialog_ToBegin");
            echo "<br />
\t\t\t</div>

\t\t\t<div class=\"ExportMachine_State_CommenceExport\" style=\"display:none;\">
\t\t\t\t<br />
\t\t\t\t";
            // line 116
            echo getLang("EmailIntegration_Export_Dialog_Commencing");
            echo "<br />
\t\t\t</div>

\t\t\t<div class=\"ExportMachine_State_ExportFailed\" style=\"display:none;\">
\t\t\t\t<br />
\t\t\t\t<div class=\"MessageBox MessageBoxError\">
\t\t\t\t\t";
            // line 122
            echo getLang("EmailIntegration_Export_Dialog_CommencError_1");
            echo "\t\t\t\t</div>
\t\t\t\t<br />
\t\t\t\t";
            // line 125
            echo getLang("EmailIntegration_Export_Dialog_CommencError_2");
            echo "<br />
\t\t\t</div>

\t\t\t<div class=\"ExportMachine_State_Confirmation\" style=\"display:none;\">
\t\t\t\t<br />
\t\t\t\t";
            // line 130
            echo getLang("EmailIntegration_Export_Dialog_Commenced", array("useremail" => (isset($context['useremail']) ? $context['useremail'] : null)));
            // line 132
            echo "\t\t\t</div>
\t\t";
        }
        // line 134
        echo "\t</div>
</div>

<div class=\"ModalButtonRow ExportMachine_ButtonRow\">
\t<div style=\"float:left;\">
\t\t<button class=\"ExportMachine_CancelButton\" disabled=\"disabled\" accesskey=\"c\">";
        // line 140
        echo getLang("Cancel_AccessKeyC");
        echo "</button>
\t</div>

\t<div style=\"float:right\">
\t\t<button class=\"ExportMachine_BackButton\" disabled=\"disabled\" accesskey=\"b\">&lt; ";
        // line 144
        echo getLang("Back_AccessKeyB");
        echo "</button><button class=\"ExportMachine_NextButton\" disabled=\"disabled\" accesskey=\"n\">";
        echo getLang("Next_AccessKeyN");
        echo " &gt;</button><button class=\"ExportMachine_FinishButton\" style=\"display:none;\" accesskey=\"f\">";
        echo getLang("Finish_AccessKeyF");
        echo "</button><button class=\"ExportMachine_CloseButton\" style=\"display:none;\" accesskey=\"o\">";
        echo getLang("Close_AccessKeyO");
        echo "</button>
\t</div>

\t<br clear=\"both\" />
</div>
";
    }

}
