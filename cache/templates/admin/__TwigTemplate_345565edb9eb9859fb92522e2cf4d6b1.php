<?php

/* Snippets/OptimizerConfigFormStorewide.html */
class __TwigTemplate_345565edb9eb9859fb92522e2cf4d6b1 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<form id=\"OptimizerConfigForm\" onsubmit=\"Optimizer.SaveConfigForm('";
        echo twig_safe_filter((isset($context['ModuleId']) ? $context['ModuleId'] : null));
        echo "'); return false;\" action=\"\">
\t<div class=\"ModalTitle\">
\t\t";
        // line 3
        echo getLang("TestConfigHeadline");
        echo twig_safe_filter((isset($context['ModuleName']) ? $context['ModuleName'] : null));
        echo "
\t</div>

\t<div class=\"ModalContent\" style=\"height:350px; overflow: auto;\">
\t\t\t
\t\t<div class=\"InfoTip\">
\t\t\t";
        // line 9
        echo twig_safe_filter((isset($context['Help']) ? $context['Help'] : null));
        echo "
\t\t</div>
\t\t\t<div class=\"clear\" style=\"margin-bottom:10px; border-bottom:1px #999999 solid;\">
\t\t\t\t<dl>
\t\t\t\t\t<dt>";
        // line 13
        echo getLang("TestType");
        echo ":</dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t";
        // line 15
        echo twig_safe_filter((isset($context['TestType']) ? $context['TestType'] : null));
        echo "
\t\t\t\t\t</dd>

\t\t\t\t\t<dt style=\"padding-top:12px;\">";
        // line 18
        echo twig_safe_filter((isset($context['TestPageURLLabel']) ? $context['TestPageURLLabel'] : null));
        echo ":</dt>
\t\t\t\t\t<dd style=\"padding-top:8px;\">
\t\t\t\t\t\t<input onclick=\"this.select();\" readonly class=\"Field300\" value=\"";
        // line 20
        echo twig_safe_filter((isset($context['ValidateTestPageUrl']) ? $context['ValidateTestPageUrl'] : null));
        echo "\" />
\t\t\t\t\t</dd>
\t\t\t\t
\t\t\t\t\t<dt style=\"padding-top:12px;";
        // line 23
        echo twig_safe_filter((isset($context['HideVariationPageUrl']) ? $context['HideVariationPageUrl'] : null));
        echo "\">";
        echo getLang("VariationPageUrl");
        echo ":</dt>
\t\t\t\t\t<dd style=\"padding-top:8px;";
        // line 24
        echo twig_safe_filter((isset($context['HideVariationPageUrl']) ? $context['HideVariationPageUrl'] : null));
        echo "\">
\t\t\t\t\t\t<input onclick=\"this.select();\" readonly class=\"Field300\" value=\"";
        // line 25
        echo twig_safe_filter((isset($context['ValidateVariationPageUrl']) ? $context['ValidateVariationPageUrl'] : null));
        echo "\" />
\t\t\t\t\t</dd>


\t\t\t\t\t<dt style=\"padding-top:12px;\">";
        // line 29
        echo getLang("ConversionPageUrl");
        echo ":</dt>
\t\t\t\t\t<dd style=\"padding-top:8px;\">
\t\t\t\t\t\t<input onclick=\"this.select();\" readonly class=\"Field300\" value=\"";
        // line 31
        echo twig_safe_filter((isset($context['ValidateConversionPageUrl']) ? $context['ValidateConversionPageUrl'] : null));
        echo "\" />
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t
\t\t\t</div>

\t\t\t<div>
\t\t\t\t<dl>
\t\t\t\t\t<dt style=\"padding-top:15px;\">&nbsp; &nbsp;";
        // line 39
        echo getLang("ScriptInstallURL");
        echo ":</dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<input name=\"InstallUrl\" style='width:210px' value=\"\" />
\t\t\t\t\t\t&nbsp; <input name=\"SaveManual\" type=\"button\" onclick=\"Optimizer.InstallAutoScripts();\" value=\"";
        // line 42
        echo getLang("InstallScript");
        echo "\">
\t\t\t\t\t\t&nbsp; <img height=\"16\" width=\"24\" border=\"0\" style=\"margin-top: 5px;\" src=\"images/help.gif\" onmouseover=\"ShowHelp('d1', '";
        // line 43
        echo getLang("ScriptInstallURL");
        echo "', '";
        echo getLang("InstallUrlHelp");
        echo "')\" onmouseout=\"HideHelp('d1');\"/>
\t\t\t\t\t\t<div id=\"d1\" style=\"display: none;\"></div>
\t\t\t\t\t\t<div class=\"GrayHelpText\">";
        // line 45
        echo getLang("InstallUrlIntro");
        echo "</div>
\t\t\t\t\t</dd>

\t\t\t\t\t<dt style=\"padding-top:12px;\"><span class='Required'>*</span> ";
        // line 48
        echo getLang("ConversionPage");
        echo ":</dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<select id=\"ConversionPage\" name=\"ConversionPage\" onchange=\"Optimizer.ChangeConversionPage('";
        // line 50
        echo twig_safe_filter((isset($context['ModuleId']) ? $context['ModuleId'] : null));
        echo "');\">
\t\t\t\t\t\t\t<option value='' >";
        // line 51
        echo getLang("ChooseAnOption");
        echo "</option>
\t\t\t\t\t\t\t";
        // line 52
        echo twig_safe_filter((isset($context['ConversionPageOptions']) ? $context['ConversionPageOptions'] : null));
        echo "
\t\t\t\t\t\t</select>
\t\t\t\t\t\t&nbsp; <img height=\"16\" width=\"24\" border=\"0\" style=\"margin-top: 5px;\" src=\"images/help.gif\" onmouseover=\"ShowHelp('d2', '";
        // line 54
        echo getLang("ConversionPage");
        echo "', '";
        echo getLang("ConversionPageHelp");
        echo "')\" onmouseout=\"HideHelp('d2');\"/>
\t\t\t\t\t\t<div id=\"d2\" style=\"display: none;\"></div>
\t\t\t\t\t\t<div id=\"CustomConversionHelp\" style=\"";
        // line 56
        echo twig_safe_filter((isset($context['HideCustomConversionHelp']) ? $context['HideCustomConversionHelp'] : null));
        echo "\">

\t\t\t\t\t\t\t<img class=\"FloatLeft\" alt=\"\" src=\"images/nodejoin.gif\"/>
\t\t\t\t\t\t\t<input value=\"";
        // line 59
        echo twig_safe_filter((isset($context['ConversionPageURL']) ? $context['ConversionPageURL'] : null));
        echo "\" name='ConversionPageUrl' id='ConversionPageUrl' class='Field200' />

\t\t\t\t\t\t\t<img height=\"16\" width=\"24\" border=\"0\" style=\"margin-top: 5px;\" src=\"images/help.gif\" onmouseover=\"ShowHelp('d3', '";
        // line 61
        echo getLang("CustomConversionPage");
        echo "', '";
        echo getLang("CustomConversionHelp");
        echo "')\" onmouseout=\"HideHelp('d3');\"/>
\t\t\t\t\t\t\t<div id=\"d3\" style=\"display: none;\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</dd>
\t\t\t\t\t<dt><span class='Required'>*</span> ";
        // line 65
        echo getLang("ControlScript");
        echo ":</dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<textarea rows=\"5\" id=\"ControlScript\" name=\"ControlScript\" class=\"Field300\">";
        // line 67
        echo twig_safe_filter((isset($context['ControlScript']) ? $context['ControlScript'] : null));
        echo "</textarea>
\t\t\t\t\t\t<img height=\"16\" width=\"24\" border=\"0\" style=\"margin-top: 5px;\" src=\"images/help.gif\" onmouseover=\"ShowHelp('d4', '";
        // line 68
        echo getLang("ControlScript");
        echo "', '";
        echo getLang("ControlScriptHelp");
        echo "')\" onmouseout=\"HideHelp('d4');\"/>
\t\t\t\t\t\t<div id=\"d4\" style=\"display: none;\"></div>
\t\t\t\t\t</dd>

\t\t\t\t\t<dt><span class='Required'>*</span> ";
        // line 72
        echo getLang("TrackingScript");
        echo ":</dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<textarea rows=\"5\" id=\"TrackingScript\" name=\"TrackingScript\" class=\"Field300\">";
        // line 74
        echo twig_safe_filter((isset($context['TrackingScript']) ? $context['TrackingScript'] : null));
        echo "</textarea>
\t\t\t\t\t\t<img height=\"16\" width=\"24\" border=\"0\" style=\"margin-top: 5px;\" src=\"images/help.gif\" onmouseover=\"ShowHelp('d5', '";
        // line 75
        echo getLang("TrackingScript");
        echo "', '";
        echo getLang("TrackingScriptHelp");
        echo "')\" onmouseout=\"HideHelp('d5');\"/>
\t\t\t\t\t\t<div id=\"d5\" style=\"display: none;\"></div>
\t\t\t\t\t</dd>

\t\t\t\t\t<dt><span class='Required'>*</span> ";
        // line 79
        echo getLang("ConversionScript");
        echo ":</dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<textarea rows=\"5\" id=\"ConversionScript\" name=\"ConversionScript\" class=\"Field300\">";
        // line 81
        echo twig_safe_filter((isset($context['ConversionScript']) ? $context['ConversionScript'] : null));
        echo "</textarea>
\t\t\t\t\t\t<img height=\"16\" width=\"24\" border=\"0\" style=\"margin-top: 5px;\" src=\"images/help.gif\" onmouseover=\"ShowHelp('d6', '";
        // line 82
        echo getLang("ConversionScript");
        echo "', '";
        echo getLang("ConversionScriptHelp");
        echo "')\" onmouseout=\"HideHelp('d6');\"/>
\t\t\t\t\t\t<div id=\"d6\" style=\"display: none;\"></div>
\t\t\t\t\t</dd>

\t\t\t\t</dl>
\t\t\t</div>
\t</div>
\t<div style=\"height:30px;\" class=\"ModalButtonRow\">
\t\t<div class=\"FloatLeft\" style=\"margin-left:10px;\">
\t\t\t<img class=\"LoadingIndicator\" style=\"vertical-align: middle; display: none;\" alt=\"\" src=\"images/loading.gif\"/>
\t\t\t<input type=\"button\" onclick=\"\$.modal.close();\" value=\"Cancel\" class=\"CloseButton FormButton\"/>
\t\t
\t\t</div>
\t\t<div class=\"FloatRight\" style=\"font-weight:bold;margin-right:10px;\">
\t\t\t<input name='Save' type=\"submit\" value=\"";
        // line 96
        echo getLang("SaveAndLaunch");
        echo "\" class=\"Submit\"/>
\t\t</div>
\t</div>
</form>
<script type=\"text/javascript\">
lang.ChooseConvertionpage = \"";
        // line 101
        echo getLang("ChooseConvertionpage");
        echo "\";
lang.EnterInstallUrl = \"";
        // line 102
        echo getLang("EnterInstallUrl");
        echo "\";
lang.EnterConversionScript = \"";
        // line 103
        echo getLang("EnterConversionScript");
        echo "\";
lang.EnterControlScript = \"";
        // line 104
        echo getLang("EnterControlScript");
        echo "\";
lang.EnterTrackingScript = \"";
        // line 105
        echo getLang("EnterTrackingScript");
        echo "\";
lang.ProblemDuringRequest = \"";
        // line 106
        echo getLang("ProblemDuringRequest");
        echo "\";
lang.EnterValidConversionUrl = \"";
        // line 107
        echo getLang("EnterValidConversionUrl");
        echo "\";
</script>";
    }

}
