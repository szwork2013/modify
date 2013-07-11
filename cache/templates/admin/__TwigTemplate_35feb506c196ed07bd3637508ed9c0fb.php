<?php

/* googleadwords.form.tpl */
class __TwigTemplate_35feb506c196ed07bd3637508ed9c0fb extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "
\t<form action=\"index.php?ToDo=runAddon&addon=addon_googleadwords&func=ExportCSV\" onSubmit=\"return ValidateForm(CheckForm);\" name=\"frmGoogleAdWords\" method=\"post\">
\t<div class=\"BodyContainer\">
\t<table class=\"OuterPanel\">
\t\t  <tr>
\t\t\t<td class=\"Heading1\">";
        // line 6
        echo getLang("GoogleAdWordsGenerator");
        echo "</td>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t<td class=\"Intro\">
\t\t\t\t<p>";
        // line 10
        echo getLang("GoogleAdWordsFormIntro");
        echo "</p>
\t\t\t\t";
        // line 11
        echo twig_safe_filter((isset($context['Message']) ? $context['Message'] : null));
        echo "
\t\t\t</td>
\t\t  </tr>

\t\t  <tr>
\t\t\t    <td>
\t\t\t\t\t<div>
\t\t\t\t\t\t<input type=\"submit\" name=\"SubmitButton1\" value=\"";
        // line 18
        echo getLang("Export");
        echo "\" class=\"FormButton\">
\t\t\t\t\t\t<input type=\"button\" name=\"CancelButton1\" value=\"";
        // line 19
        echo getLang("Cancel");
        echo "\" class=\"FormButton\" onclick=\"ConfirmCancel()\"><br /><img src=\"images/blank.gif\" width=\"1\" height=\"10\" /></div>
\t\t\t\t</td>
\t\t\t  </tr>
\t\t\t\t<tr>
\t\t\t\t\t<td>
\t\t\t\t\t  <table class=\"Panel\">
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t  <td class=\"Heading2\" colspan=2>";
        // line 26
        echo getLang("GoogleAdWordsAdFormatOptions");
        echo "</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t\t<span class=\"Required\">*</span>&nbsp;";
        // line 30
        echo getLang("GoogleAdWordsCreateAdsFor");
        echo ":
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<table border=\"0\">
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td valign=\"top\">
\t\t\t\t\t\t\t\t\t\t\t<select size=\"5\" id=\"category\" name=\"category[]\" class=\"Field300 ISSelectReplacement\" multiple=\"multiple\" style=\"height: 140px;\">
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" SELECTED>";
        // line 37
        echo getLang("GoogleAdWordsAllProducts");
        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 38
        echo twig_safe_filter((isset($context['CategoryOptions']) ? $context['CategoryOptions'] : null));
        echo "
\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td valign=\"top\">
\t\t\t\t\t\t\t\t\t\t\t<div style=\"position:relative; top:200px; left:10px\">
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 43
        echo getLang("GoogleAdWordsExampleAd");
        echo ":<br />
\t\t\t\t\t\t\t\t\t\t\t\t<div style=\"border:1px solid rgb(180, 208, 220); width:252px; font-size:14px; font-family:arial; padding:4px 3px 3px 5px; line-height:1.2; margin-top:5px\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" style=\"font-size:14px; font-family:arial; color:#0000CC\"><span id=\"ad_title\">iPod Touch 8GB</span></a>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div style=\"font-size:12px; color:black\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span id=\"ad_desc1\">The sleek new iPod from Apple.</span><br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span id=\"ad_desc2\">Buy online. Only \$199.</span><br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span id=\"ad_link\" style=\"color:#008000\">";
        // line 49
        echo twig_safe_filter((isset($context['HTTPHost']) ? $context['HTTPHost'] : null));
        echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td></td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<p class=\"InfoTip\" style=\"margin-left:0px; width:260px\"><a href=\"#\" onclick=\"LaunchHelp(708)\">";
        // line 61
        echo getLang("GoogleAdWordsPlaceholdersHelp");
        echo "</a></p>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t\t<span class=\"Required\">*</span>&nbsp;";
        // line 66
        echo getLang("GoogleAdWordsHeadline");
        echo ":
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<input type=\"text\" id=\"title\" name=\"title\" class=\"Field300\" value=\"{PRODNAME}\" maxlength=\"25\">
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t\t<span class=\"Required\">*</span>&nbsp;";
        // line 74
        echo getLang("GoogleAdWordsDesc1");
        echo ":
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<input type=\"text\" id=\"desc1\" name=\"desc1\" class=\"Field300\" value=\"{PRODSUMMARY}\" maxlength=\"35\">
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t\t<span class=\"Required\">*</span>&nbsp;";
        // line 82
        echo getLang("GoogleAdWordsDesc2");
        echo ":
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<input type=\"text\" id=\"desc2\" name=\"desc2\" class=\"Field300\" value=\"Buy online. Only {PRODPRICE}.\" maxlength=\"35\">
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t\t<span class=\"Required\">*</span>&nbsp;";
        // line 90
        echo getLang("GoogleAdWordsDisplayURL");
        echo ":
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\thttp:// <input type=\"text\" id=\"displayurl\" name=\"displayurl\" class=\"Field300\" style=\"width:265px\" value=\"";
        // line 93
        echo twig_safe_filter((isset($context['HTTPHost']) ? $context['HTTPHost'] : null));
        echo "\" maxlength=\"35\">
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t\t<span class=\"Required\">*</span>&nbsp;";
        // line 98
        echo getLang("GoogleAdWordsDestinationURL");
        echo ":
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\thttp:// <input type=\"text\" id=\"destinationurl\" name=\"destinationurl\" class=\"Field300\" style=\"width:265px\" value=\"{PRODLINK}\" maxlength=\"1024\">
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t</table>
\t\t\t\t<table class=\"Panel\">
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">&nbsp;</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"submit\" name=\"SubmitButton2\" value=\"";
        // line 109
        echo getLang("Export");
        echo "\" class=\"FormButton\">
\t\t\t\t\t\t\t<input type=\"button\" name=\"CancelButton2\" value=\"";
        // line 110
        echo getLang("Cancel");
        echo "\" class=\"FormButton\" onclick=\"ConfirmCancel()\">
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr><td class=\"Gap\"></td></tr>
\t\t\t </table>
\t\t\t</td>
\t\t</tr>
\t</table>
\t</div>
\t</form>

\t<script type=\"text/javascript\">

\t\t// Details for the example ad
\t\tvar PRODNAME = 'iPod Touch 8GB';
\t\tvar PRODBRAND = 'Apple';
\t\tvar PRODSUMMARY = 'The sleek new iPod from Apple.';
\t\tvar PRODPRICE = '\$199';
\t\tvar PRODSKU = 'SKU12345';
\t\tvar PRODCAT = 'MP3 Players';

\t\tfunction CheckForm() {
\t\t\tif(g('category_old').selectedIndex == -1) {
\t\t\t\talert('";
        // line 133
        echo getLang("GoogleAdWordsChooseCategory");
        echo "');
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(g('title').value == '') {
\t\t\t\talert('";
        // line 138
        echo getLang("GoogleAdWordsEnterTitle");
        echo "');
\t\t\t\tg('title').focus();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(g('desc1').value == '') {
\t\t\t\talert('";
        // line 144
        echo getLang("GoogleAdWordsEnterDesc");
        echo "');
\t\t\t\tg('desc1').focus();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(g('desc2').value == '') {
\t\t\t\talert('";
        // line 150
        echo getLang("GoogleAdWordsEnterDesc");
        echo "');
\t\t\t\tg('desc2').focus();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(g('displayurl').value == '') {
\t\t\t\talert('";
        // line 156
        echo getLang("GoogleAdWordsEnterDisplayURL");
        echo "');
\t\t\t\tg('displayurl').focus();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(g('destinationurl').value == '') {
\t\t\t\talert('";
        // line 162
        echo getLang("GoogleAdWordsEnterDestinationURL");
        echo "');
\t\t\t\tg('destinationurl').focus();
\t\t\t\treturn false;
\t\t\t}

\t\t\treturn true;
\t\t}

\t\tfunction ConfirmCancel()
\t\t{
\t\t\tif(confirm('";
        // line 172
        echo getLang("GoogleAdWordsCancelMessage");
        echo "'))
\t\t\t\tdocument.location.href='index.php?ToDo=';
\t\t\telse
\t\t\t\treturn false;
\t\t}

\t\tfunction GoogleAdWordsReplaceTokens(Val) {
\t\t\tchanged = Val.replace('{PRODNAME}', PRODNAME);
\t\t\tchanged = changed.replace('{PRODBRAND}', PRODBRAND);
\t\t\tchanged = changed.replace('{PRODSUMMARY}', PRODSUMMARY);
\t\t\tchanged = changed.replace('{PRODPRICE}', PRODPRICE);
\t\t\tchanged = changed.replace('{PRODSKU}', PRODSKU);
\t\t\tchanged = changed.replace('{PRODCAT}', PRODCAT);
\t\t\treturn changed;
\t\t}

\t\t\$('input:text').keyup(function(event) {
\t\t\t// Update the example ad when a key is released in any of the fields
\t\t\t\$('#ad_title').html(GoogleAdWordsReplaceTokens(\$('#title').val()));
\t\t\t\$('#ad_desc1').html(GoogleAdWordsReplaceTokens(\$('#desc1').val()));
\t\t\t\$('#ad_desc2').html(GoogleAdWordsReplaceTokens(\$('#desc2').val()));
\t\t\t\$('#ad_link').html(GoogleAdWordsReplaceTokens(\$('#displayurl').val()));
\t\t});

\t</script>
";
    }

}
