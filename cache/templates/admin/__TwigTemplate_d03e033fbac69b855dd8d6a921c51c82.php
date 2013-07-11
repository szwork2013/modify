<?php

/* downloadernew.loading.tpl */
class __TwigTemplate_d03e033fbac69b855dd8d6a921c51c82 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<center><fieldset>
\t<legend id=\"legendText\">";
        // line 2
        echo twig_safe_filter((isset($context['DownloadPleaseWait']) ? $context['DownloadPleaseWait'] : null));
        echo "</legend>
\t<div id=\"contentDiv\">
\t\t<img src=\"images/loadingAnimation.gif\" >
\t</div>
</fieldset></center>
<script type=\"text/javascript\">// <![CDATA[
window.setTimeout(function() {
\t\$.ajax({
\t\turl: 'remote.php',
\t\tdata: 'w=downloadtemplatefile&template=";
        // line 11
        echo twig_safe_filter((isset($context['TemplateId']) ? $context['TemplateId'] : null));
        echo "',
\t\ttype: 'POST',
\t\tdataType: 'xml',
\t\tsuccess: function(data) {
\t\t\ttb_remove();
\t\t\tif(\$('status', data).text() == 1) {
\t\t\t\twindow.location = 'index.php?ToDo=changeTemplate&template=";
        // line 17
        echo twig_safe_filter((isset($context['TemplateId']) ? $context['TemplateId'] : null));
        echo "&color=";
        echo twig_safe_filter((isset($context['TemplateColor']) ? $context['TemplateColor'] : null));
        echo "'
\t\t\t}
\t\t\telse {
\t\t\t\talert(\$('message', data).text());
\t\t\t}
\t\t}
\t});
}, 1000);
//]]></script>
";
    }

}
