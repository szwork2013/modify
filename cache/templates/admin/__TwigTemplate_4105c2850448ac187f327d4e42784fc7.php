<?php

/* emailintegration.export.javascript.tpl */
class __TwigTemplate_4105c2850448ac187f327d4e42784fc7 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<script language=\"javascript\" type=\"text/javascript\">//<![CDATA[
if (typeof lang == 'undefined') { lang = {}; }
lang.EmailIntegration_ExportMachine_FailedToLoadDialog = \"";
        // line 3
        echo Interspire_Template_Extension::jsFilter(getLang("EmailIntegration_ExportMachine_FailedToLoadDialog"), "'");
        echo "\";
//]]></script>
";
    }

}
