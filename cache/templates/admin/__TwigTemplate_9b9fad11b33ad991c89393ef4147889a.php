<?php

/* giftcertificates.view.tpl */
class __TwigTemplate_9b9fad11b33ad991c89393ef4147889a extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "\t<form enctype=\"multipart/form-data\" action=\"index.php\" id=\"frmSearch\" method=\"get\" onsubmit=\"return ValidateForm(CheckViewForm)\">
\t<input type=\"hidden\" name=\"ToDo\" value=\"searchGiftCertificatesRedirect\" />
\t<div class=\"BodyContainer\">
\t<table class=\"OuterPanel\">
\t  <tr>
\t\t<td class=\"Heading1\" id=\"tdHeading\">";
        // line 6
        echo getLang("CreateNewGiftCertificatesView");
        echo "</td>
\t\t</tr>
\t\t<tr>
\t\t<td class=\"Intro\">
\t\t\t<p>";
        // line 10
        echo getLang("GiftCertificateViewIntro");
        echo "</p>
\t\t\t";
        // line 11
        echo twig_safe_filter((isset($context['Message']) ? $context['Message'] : null));
        echo "
\t\t\t<p><input type=\"submit\" name=\"SubmitButton1\" value=\"";
        // line 12
        echo getLang("Save");
        echo "\" class=\"FormButton\">&nbsp; <input type=\"button\" name=\"CancelButton1\" value=\"";
        echo getLang("Cancel");
        echo "\" class=\"FormButton\" onclick=\"ConfirmCancel()\"></p>
\t\t</td>
\t  </tr>
\t\t<tr>
\t\t\t<td>
\t\t\t  <table class=\"Panel\">
\t\t\t\t<tr>
\t\t\t\t  <td class=\"Heading2\" colspan=2>";
        // line 19
        echo getLang("ViewDetails");
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr><td class=\"Gap\"></td></tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t<span class=\"Required\">*</span>&nbsp;";
        // line 24
        echo getLang("NameThisView");
        echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<input type=\"text\" id=\"viewName\" name=\"viewName\" class=\"Field250\">
\t\t\t\t\t\t<img onmouseout=\"HideHelp('d2');\" onmouseover=\"ShowHelp('d2', '";
        // line 28
        echo getLang("NameThisView");
        echo "', '";
        echo getLang("NameThisGiftCertificatesViewHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t<div style=\"display:none\" id=\"d2\"></div>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr><td class=\"Gap\" colspan=\"2\"></td></tr>
\t\t\t </table>
\t\t\t</td>
\t\t</tr>
\t\t<tr>
\t\t\t<td>
\t\t\t  <table class=\"Panel\">
\t\t\t\t<tr>
\t\t\t\t  <td class=\"Heading2\" colspan=2>";
        // line 40
        echo getLang("AdvancedSearch");
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 44
        echo getLang("SearchKeywords");
        echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<input type=\"text\" id=\"searchQuery\" name=\"searchQuery\" class=\"Field250\">
\t\t\t\t\t\t<img onmouseout=\"HideHelp('d1');\" onmouseover=\"ShowHelp('d1', '";
        // line 48
        echo getLang("SearchKeywords");
        echo "', '";
        echo getLang("SearchKeywordsGiftCertificateHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t<div style=\"display:none\" id=\"d1\"></div>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 54
        echo getLang("GiftCertificateStatus");
        echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<select id=\"certificateStatus\" name=\"certificateStatus\" class=\"Field250\">
\t\t\t\t\t\t\t<option value=\"\">";
        // line 58
        echo getLang("ChooseAGiftCertificateStatus");
        echo "</option>
\t\t\t\t\t\t\t";
        // line 59
        echo twig_safe_filter((isset($context['GiftCertificateStatusOptions']) ? $context['GiftCertificateStatusOptions'] : null));
        echo "
\t\t\t\t\t\t</select>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr><td class=\"Gap\" colspan=\"2\"></td></tr>
\t\t\t </table>
\t\t\t</td>
\t\t</tr>
\t\t<tr>
\t\t\t<td>
\t\t\t  <table class=\"Panel\">
\t\t\t\t<tr>
\t\t\t\t  <td class=\"Heading2\" colspan=2>";
        // line 71
        echo getLang("SearchByRange");
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 75
        echo getLang("GiftCertificateId");
        echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t";
        // line 78
        echo getLang("SearchFrom");
        echo " &nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" id=\"certificateFrom\" name=\"certificateFrom\" class=\"Field50\"> ";
        echo getLang("SearchTo");
        echo "\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" id=\"certificateTo\" name=\"certificateTo\" class=\"Field50\">
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 84
        echo getLang("GiftCertificateAmount");
        echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t";
        // line 87
        echo getLang("SearchFrom");
        echo " &nbsp;";
        echo twig_safe_filter((isset($context['CurrencyTokenLeft']) ? $context['CurrencyTokenLeft'] : null));
        echo "&nbsp;<input type=\"text\" id=\"amountFrom\" name=\"amountFrom\" class=\"Field50\"> ";
        echo twig_safe_filter((isset($context['CurrencyTokenRight']) ? $context['CurrencyTokenRight'] : null));
        echo " ";
        echo getLang("SearchTo");
        echo "\t\t\t\t\t\t&nbsp;";
        // line 88
        echo twig_safe_filter((isset($context['CurrencyTokenLeft']) ? $context['CurrencyTokenLeft'] : null));
        echo "&nbsp;<input type=\"text\" id=\"amountTo\" name=\"amountTo\" class=\"Field50\"> ";
        echo twig_safe_filter((isset($context['CurrencyTokenRight']) ? $context['CurrencyTokenRight'] : null));
        echo "
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 93
        echo getLang("GiftCertificateBalance");
        echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t";
        // line 96
        echo getLang("SearchFrom");
        echo " &nbsp;";
        echo twig_safe_filter((isset($context['CurrencyTokenLeft']) ? $context['CurrencyTokenLeft'] : null));
        echo "&nbsp;<input type=\"text\" id=\"balanceFrom\" name=\"balanceFrom\" class=\"Field50\"> ";
        echo twig_safe_filter((isset($context['CurrencyTokenRight']) ? $context['CurrencyTokenRight'] : null));
        echo " ";
        echo getLang("SearchTo");
        echo "\t\t\t\t\t\t&nbsp;";
        // line 97
        echo twig_safe_filter((isset($context['CurrencyTokenLeft']) ? $context['CurrencyTokenLeft'] : null));
        echo "&nbsp;<input type=\"text\" id=\"balanceTo\" name=\"balanceTo\" class=\"Field50\"> ";
        echo twig_safe_filter((isset($context['CurrencyTokenRight']) ? $context['CurrencyTokenRight'] : null));
        echo "
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr><td class=\"Gap\" colspan=\"2\"></td></tr>
\t\t\t </table>
\t\t\t</td>
\t\t</tr>
\t\t<tr>
\t\t\t<td>
\t\t\t  <table class=\"Panel\">
\t\t\t\t<tr>
\t\t\t\t  <td class=\"Heading2\" colspan=2>";
        // line 108
        echo getLang("SearchByDate");
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr><td class=\"Gap\"></td></tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 113
        echo getLang("GiftCertificatePurchaseDate");
        echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<select name=\"dateRange\" id=\"dateRange\" onchange=\"ToggleRange()\" class=\"Field250\">
\t\t\t\t\t\t\t<option value=\"\">";
        // line 117
        echo getLang("ChooseGiftCertificateDate");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"today\">";
        // line 118
        echo getLang("Today");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"yesterday\">";
        // line 119
        echo getLang("Yesterday");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"day\">";
        // line 120
        echo getLang("Last24Hours");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"week\">";
        // line 121
        echo getLang("Last7Days");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"month\">";
        // line 122
        echo getLang("Last30Days");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"this_month\">";
        // line 123
        echo getLang("ThisMonth");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"this_year\">";
        // line 124
        echo getLang("ThisYear");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"custom\">";
        // line 125
        echo getLang("CustomPeriod");
        echo "</option>
\t\t\t\t\t\t</select>
\t\t\t\t\t\t<div id=\"dateRangeCustom\" style=\"margin-left: 30px; margin-top: 10px;\">
\t\t\t\t\t\t\t";
        // line 128
        echo getLang("SearchFrom");
        echo " <input class=\"plain\" name=\"fromDate\" id=\"dc1\" size=\"12\" onfocus=\"this.blur()\" readonly><a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fStartPop(g('dc1'),g('dc2'));return false;\" HIDEFOCUS><img name=\"popcal\" align=\"absmiddle\" src=\"images/calbtn.gif\" width=\"34\" height=\"22\" border=\"0\" alt=\"\"></a>
\t\t\t\t\t\t\t";
        // line 129
        echo getLang("SearchTo");
        echo " <input class=\"plain\" name=\"toDate\" id=\"dc2\" size=\"12\" onfocus=\"this.blur()\" readonly><a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fEndPop(g('dc1'),g('dc2'));return false;\" HIDEFOCUS><img name=\"popcal\" align=\"absmiddle\" src=\"images/calbtn.gif\" width=\"34\" height=\"22\" border=\"0\" alt=\"\"></a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 135
        echo getLang("ExpiryDateRange");
        echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<select name=\"expiryRange\" id=\"expiryRange\" onchange=\"ToggleExpiryRange()\" class=\"Field250\">
\t\t\t\t\t\t\t<option value=\"\">";
        // line 139
        echo getLang("ChooseGiftCertificateExpiryDate");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"today\">";
        // line 140
        echo getLang("Today");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"tomorrow\">";
        // line 141
        echo getLang("Yesterday");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"week\">";
        // line 142
        echo getLang("Next7Days");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"month\">";
        // line 143
        echo getLang("Next30Days");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"this_month\">";
        // line 144
        echo getLang("ThisMonth");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"next_month\">";
        // line 145
        echo getLang("NextMonth");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"this_year\">";
        // line 146
        echo getLang("ThisYear");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"next_year\">";
        // line 147
        echo getLang("NextYear");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"custom\">";
        // line 148
        echo getLang("CustomPeriod");
        echo "</option>
\t\t\t\t\t\t</select>
\t\t\t\t\t\t<div id=\"expiryRangeCustom\" style=\"margin-left: 30px; margin-top: 10px;\">
\t\t\t\t\t\t\t";
        // line 151
        echo getLang("SearchFrom");
        echo " <input class=\"plain\" name=\"expiryFromDate\" id=\"dc3\" size=\"12\" onfocus=\"this.blur()\" readonly><a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fStartPop(g('dc3'),g('dc4'));return false;\" HIDEFOCUS><img name=\"popcal\" align=\"absmiddle\" src=\"images/calbtn.gif\" width=\"34\" height=\"22\" border=\"0\" alt=\"\"></a>
\t\t\t\t\t\t\t";
        // line 152
        echo getLang("SearchTo");
        echo " <input class=\"plain\" name=\"expiryToDate\" id=\"dc4\" size=\"12\" onfocus=\"this.blur()\" readonly><a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fEndPop(g('dc3'),g('dc4'));return false;\" HIDEFOCUS><img name=\"popcal\" align=\"absmiddle\" src=\"images/calbtn.gif\" width=\"34\" height=\"22\" border=\"0\" alt=\"\"></a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr><td class=\"Gap\" colspan=\"2\"></td></tr>
\t\t\t </table>
\t\t\t</td>
\t\t</tr>
\t\t<tr>
\t\t\t<td>
\t\t\t  <table class=\"Panel\">
\t\t\t\t<tr>
\t\t\t\t  <td class=\"Heading2\" colspan=2>";
        // line 164
        echo getLang("SortOrder");
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr><td class=\"Gap\"></td></tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 169
        echo getLang("SortOrder");
        echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<select name=\"sortField\" class=\"Field120\">
\t\t\t\t\t\t\t<option value=\"giftcertid\">";
        // line 173
        echo getLang("GiftCertificateId");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"giftcertcode\">";
        // line 174
        echo getLang("GiftCertificateCode");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"customername\">";
        // line 175
        echo getLang("GiftCertificatePurchasedBy");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"giftcertamount\">";
        // line 176
        echo getLang("GiftCertificateAmount");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"giftcertbalance\">";
        // line 177
        echo getLang("GiftCertificateBalance");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"giftcertdatepurchased\">";
        // line 178
        echo getLang("GiftCertificatePurchaseDate");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"giftcertstatus\">";
        // line 179
        echo getLang("GiftCertificateStatus");
        echo "</option>
\t\t\t\t\t\t</select>
\t\t\t\t\t\tin&nbsp;
\t\t\t\t\t\t<select name=\"sortOrder\" class=\"Field110\">
\t\t\t\t\t\t<option value=\"asc\">";
        // line 183
        echo getLang("AscendingOrder");
        echo "</option>
\t\t\t\t\t\t<option value=\"desc\">";
        // line 184
        echo getLang("DescendingOrder");
        echo "</option>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"Gap\">&nbsp;</td>
\t\t\t\t\t<td class=\"Gap\"><input type=\"submit\" name=\"SubmitButton1\" value=\"";
        // line 189
        echo getLang("Save");
        echo "\" class=\"FormButton\">&nbsp; <input type=\"button\" name=\"CancelButton1\" value=\"";
        echo getLang("Cancel");
        echo "\" class=\"FormButton\" onclick=\"ConfirmCancel()\">
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr><td class=\"Gap\" colspan=\"2\"></td></tr>
\t\t\t\t<tr><td class=\"Gap\" colspan=\"2\"></td></tr>
\t\t\t\t<tr><td class=\"Sep\" colspan=\"2\"></td></tr>

\t\t\t </table>
\t\t\t</td>
\t\t</tr>
\t</table>
\t<iframe width=132 height=142 name=\"gToday:contrast:agenda.js\" id=\"gToday:contrast:agenda.js\" src=\"calendar/ipopeng.htm\" scrolling=\"no\" frameborder=\"0\" style=\"visibility:visible; z-index:999; position:absolute; left:-500px; top:0px;\"></iframe>
\t</div>
\t</form>

\t<script type=\"text/javascript\">

\t\tfunction ToggleRange()
\t\t{
\t\t\tvar range = g('dateRange');
\t\t\tif(\$('#dateRange').val() == \"custom\") {
\t\t\t\t\$('#dateRangeCustom').show();
\t\t\t}
\t\t\telse
\t\t\t{
\t\t\t\t\$('#dateRangeCustom').hide();
\t\t\t}
\t\t}

\t\tfunction ToggleExpiryRange()
\t\t{
\t\t\tvar range = g('expiryRange');
\t\t\tif(\$('#expiryRange').val() == \"custom\") {
\t\t\t\t\$('#expiryRangeCustom').show();
\t\t\t}
\t\t\telse
\t\t\t{
\t\t\t\t\$('#expiryRangeCustom').hide();
\t\t\t}
\t\t}

\t\tToggleRange();
\t\tToggleExpiryRange();

\t\tfunction ConfirmCancel() {
\t\t\tif(confirm(\"";
        // line 234
        echo getLang("ConfirmCancelSearch");
        echo "\")) {
\t\t\t\thistory.go(-1);
\t\t\t}
\t\t}

\t\tfunction CheckViewForm() {
\t\t\tif(\$('#viewName').val() == \"\") {
\t\t\t\talert(\"";
        // line 241
        echo getLang("EnterViewName");
        echo "\");
\t\t\t\t\$('#viewName').focus();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(\$('#certificateFrom').val() != \"\" && isNaN(\$('#certificateFrom').val())) {
\t\t\t\talert(\"";
        // line 247
        echo getLang("SearchEnterValidCertificateId");
        echo "\");
\t\t\t\t\$('#certificateFrom').focus();
\t\t\t\t\$('#certificateFrom').select();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(\$('#certificateTo').val() != \"\" && isNaN(\$('#certificateTo').val())) {
\t\t\t\talert(\"";
        // line 254
        echo getLang("SearchEnterValidCertificateId");
        echo "\");
\t\t\t\t\$('#certificateTo').focus();
\t\t\t\t\$('#certificateTo').select();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(\$('#amountFrom').val() != \"\" && isNaN(\$('#amountFrom').val())) {
\t\t\t\talert(\"";
        // line 261
        echo getLang("SearchEnterValidAmount");
        echo "\");
\t\t\t\t\$('#amountFrom').focus();
\t\t\t\t\$('#amountFrom').select();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(\$('#amountTo').val() != \"\" && isNaN(\$('#amountTo').val())) {
\t\t\t\talert(\"";
        // line 268
        echo getLang("SearchEnterValidAmount");
        echo "\");
\t\t\t\t\$('#amountTo').focus();
\t\t\t\t\$('#amountTo').select();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(\$('#balanceFrom').val() != \"\" && isNaN(\$('#balanceFrom').val())) {
\t\t\t\talert(\"";
        // line 275
        echo getLang("SearchEnterValidBalance");
        echo "\");
\t\t\t\t\$('#balanceFrom').focus();
\t\t\t\t\$('#balanceFrom').select();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(\$('#balanceTo').val() != \"\" && isNaN(\$('#balanceTo').val())) {
\t\t\t\talert(\"";
        // line 282
        echo getLang("SearchEnterValidBalance");
        echo "\");
\t\t\t\t\$('#balanceTo').focus();
\t\t\t\t\$('#balanceTo').select();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(\$('#dateRange').val() == \"custom\" && \$('#d1').val() == \$('#d2').val()) {
\t\t\t\talert(\"";
        // line 289
        echo getLang("SearchChooseDifferentDates");
        echo "\");
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(\$('#expiryRange').val() == \"custom\" && \$('#d3').val() == \$('#d4').val()) {
\t\t\t\talert(\"";
        // line 294
        echo getLang("SearchChooseDifferentExpiryDates");
        echo "\");
\t\t\t\treturn false;
\t\t\t}

\t\t\treturn true;
\t\t}

\t</script>
";
    }

}
