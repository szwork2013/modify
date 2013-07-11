<?php

/* picnik.intro.tpl */
class __TwigTemplate_d4fa7919c8a2964916f46fc957ff2abb extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<div class=\"ModalTitle\">
\t";
        // line 2
        echo getLang("PicnikIntroTitle");
        echo "</div>
<div class=\"ModalContent\">
\t<div id=\"picnikIntroMessage\"><p>
\t\t<img src=\"images/picnik_logo.jpg\" style=\"float:right; margin:0 0 4px 4px;\" />
\t\t";
        // line 7
        echo getLang("PicnikIntro");
        echo "<br />
\t\t<br clear=\"all\" />
\t</p></div>

\t<div id=\"picnikLoadingMessage\" style=\"display:none;\"><p>
\t\t<img src=\"images/picnik_logo.jpg\" style=\"float:right; margin:0 0 4px 4px;\" />
\t\t";
        // line 13
        echo getLang("PicnikLoading");
        echo "\t\t<br clear=\"all\" />
\t</p></div>

\t<form method=\"post\" id=\"picnikLaunchForm\" action=\"";
        // line 17
        echo twig_escape_filter($this->env, (isset($context['PicnikServiceUrl']) ? $context['PicnikServiceUrl'] : null), "1");
        echo "\">
\t\t<input type=\"hidden\" name=\"_apikey\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, (isset($context['PicnikApiKey']) ? $context['PicnikApiKey'] : null), "1");
        echo "\" />
\t\t<input type=\"hidden\" name=\"_import\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, (isset($context['PicnikImageUrl']) ? $context['PicnikImageUrl'] : null), "1");
        echo "\" />
\t\t<input type=\"hidden\" name=\"_export\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, (isset($context['PicnikSaveHandler']) ? $context['PicnikSaveHandler'] : null), "1");
        echo "\" />
\t\t<input type=\"hidden\" name=\"_export_title\" value=\"";
        // line 21
        echo getLang("PicnikSaveTitle", array("storename" => (isset($context['StoreName']) ? $context['StoreName'] : null)));
        echo "\" />
\t\t<input type=\"hidden\" name=\"_export_agent\" value=\"browser\" />
\t\t<input type=\"hidden\" name=\"_close_target\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, (isset($context['PicnikCloseHandler']) ? $context['PicnikCloseHandler'] : null), "1");
        echo "\" />
\t\t<input type=\"hidden\" name=\"_exclude\" value=\"out\" />
\t</form>

\t<script language=\"javascript\" type=\"text/javascript\">//<![CDATA[
\t\tvar goPicnik = function () {
\t\t\t// display loading message
\t\t\t\$('#picnikLoadingMessage').show();

\t\t\t// hide intro message
\t\t\t\$('#picnikIntroMessage').hide();

\t\t\t// hide checkbox
\t\t\t\$('#picnikShowMessageContainer').hide();
\t\t};

\t\t\$('#picnikLaunchForm').submit(function(evt){
\t\t\tgoPicnik();

\t\t\t// open a new window with a set size to submit the picnik form to
\t\t\tvar windowName = Common.Picnik.generateWindowName();
\t\t\tvar w = Common.Picnik.openPicnikWindow(windowName);

\t\t\t// alter target window for submission
\t\t\t\$('#picnikLaunchForm').attr('target', windowName);
\t\t});

\t\t\$(function(){
\t\t\t\$('#picnikCancelButton').click(function(){
\t\t\t\tCommon.Picnik.cancelEdit();
\t\t\t});

\t\t\t\$('#picnikContinueButton').click(function(){
\t\t\t\t// determine if message should be disabled in future
\t\t\t\tif (\$('#picnikShowMessageContainer').is(':visible') && \$('#picnikShowMessage').is(':checked')) {
\t\t\t\t\t// set a cookie to bypass the message in future
\t\t\t\t\tSetCookie('iscbypasspicnikmessage', '1', 365);
\t\t\t\t}

\t\t\t\t\$('#picnikLaunchForm').submit();
\t\t\t});

\t\t\tif (ReadCookie('iscbypasspicnikmessage') == '1') {
\t\t\t\tgoPicnik();
\t\t\t}
\t\t});
\t//]]></script>
</div>
<div class=\"ModalButtonRow\">
\t<div style=\"float:left;\" id=\"picnikShowMessageContainer\">
\t\t<input type=\"checkbox\" id=\"picnikShowMessage\" /> <label for=\"picnikShowMessage\">";
        // line 73
        echo getLang("PicnikShowMessage");
        echo "</label>
\t</div>
\t<div style=\"float:right;\">
\t\t<input type=\"button\" value=\"";
        // line 76
        echo getLang("Cancel");
        echo "\" id=\"picnikCancelButton\" class=\"SubmitButton\" />
\t\t<input type=\"button\" value=\"";
        // line 77
        echo getLang("PicnikContinue");
        echo "\" id=\"picnikContinueButton\" class=\"SubmitButton\" />
\t</div>
\t<br clear=\"all\" />
</div>
";
    }

}
