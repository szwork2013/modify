<?php

/* orders.view.tpl */
class __TwigTemplate_065b41a828230f22f807c2e572206d90 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "
\t<form action=\"index.php\" id=\"frmSearch\" method=\"get\" onsubmit=\"return ValidateForm(CheckViewForm)\">
\t<input type=\"hidden\" name=\"ToDo\" value=\"searchOrdersRedirect\" />
\t<div class=\"BodyContainer\">
\t<table class=\"OuterPanel\">
\t  <tr>
\t\t<td class=\"Heading1\" id=\"tdHeading\">";
        // line 7
        echo getLang("CreateNewOrdersView");
        echo "</td>
\t\t</tr>
\t\t<tr>
\t\t<td class=\"Intro\">
\t\t\t<p>";
        // line 11
        echo getLang("OrderViewIntro");
        echo "</p>
\t\t\t";
        // line 12
        echo twig_safe_filter((isset($context['Message']) ? $context['Message'] : null));
        echo "
\t\t\t<p><input type=\"submit\" name=\"SubmitButton1\" value=\"";
        // line 13
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
        // line 20
        echo getLang("ViewDetails");
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr><td class=\"Gap\"></td></tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t<span class=\"Required\">*</span>&nbsp;";
        // line 25
        echo getLang("NameThisView");
        echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<input type=\"text\" id=\"viewName\" name=\"viewName\" class=\"Field250\">
\t\t\t\t\t\t<img onmouseout=\"HideHelp('d2');\" onmouseover=\"ShowHelp('d2', '";
        // line 29
        echo getLang("NameThisView");
        echo "', '";
        echo getLang("NameThisOrdersViewHelp");
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
        // line 41
        echo getLang("AdvancedSearch");
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 45
        echo getLang("SearchKeywords");
        echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<input type=\"text\" id=\"searchQuery\" name=\"searchQuery\" class=\"Field250\">
\t\t\t\t\t\t<img onmouseout=\"HideHelp('d1');\" onmouseover=\"ShowHelp('d1', '";
        // line 49
        echo getLang("SearchKeywords");
        echo "', '";
        echo getLang("SearchKeywordsOrderHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t<div style=\"display:none\" id=\"d1\"></div>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 55
        echo getLang("OrderStatus1");
        echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<select id=\"orderStatus\" name=\"orderStatus\" class=\"Field250\">
\t\t\t\t\t\t\t<option value=\"\">";
        // line 59
        echo getLang("ChooseAnOrderStatus");
        echo "</option>
\t\t\t\t\t\t\t";
        // line 60
        echo twig_safe_filter((isset($context['OrderStatusOptions']) ? $context['OrderStatusOptions'] : null));
        echo "
\t\t\t\t\t\t</select>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 66
        echo getLang("PaymentMethod");
        echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<select id=\"paymentMethod\" name=\"paymentMethod\" class=\"Field250\">
\t\t\t\t\t\t\t<option value=\"\">";
        // line 70
        echo getLang("ChooseAPaymentMethod");
        echo "</option>
\t\t\t\t\t\t\t";
        // line 71
        echo twig_safe_filter((isset($context['OrderPaymentOptions']) ? $context['OrderPaymentOptions'] : null));
        echo "
\t\t\t\t\t\t</select>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t";
        // line 75
        if ((isset($context['OrderTypeOptions']) ? $context['OrderTypeOptions'] : null)) {
            echo "\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
            // line 78
            echo getLang("OrderType");
            echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<select id=\"ebayOrderId\" name=\"ebayOrderId\" class=\"Field250\">
\t\t\t\t\t\t\t<option value=\"\">";
            // line 82
            echo getLang("ChooseAnOrderType");
            echo "</option>
\t\t\t\t\t\t\t";
            // line 83
            echo twig_safe_filter((isset($context['OrderTypeOptions']) ? $context['OrderTypeOptions'] : null));
            echo "
\t\t\t\t\t\t</select>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t";
        }
        // line 87
        echo "\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 90
        echo getLang("ShippingMethod");
        echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<select id=\"shippingMethod\" name=\"shippingMethod\" class=\"Field250\">
\t\t\t\t\t\t\t<option value=\"\">";
        // line 94
        echo getLang("ChooseAShippingMethod");
        echo "</option>
\t\t\t\t\t\t\t";
        // line 95
        echo twig_safe_filter((isset($context['OrderShippingOptions']) ? $context['OrderShippingOptions'] : null));
        echo "
\t\t\t\t\t\t</select>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 101
        echo getLang("CouponCode");
        echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<input type=\"text\" name=\"couponCode\" class=\"Field250\" />
\t\t\t\t\t\t<img onmouseout=\"HideHelp('couponcode');\" onmouseover=\"ShowHelp('couponcode', '";
        // line 105
        echo getLang("CouponCode");
        echo "', '";
        echo getLang("OrderCouponCodeHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t<div style=\"display:none\" id=\"couponcode\"></div>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 111
        echo getLang("PreOrders");
        echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<input type=\"checkbox\" name=\"preorders[]\" value=\"0\" id=\"preorders_0\" checked=\"checked\" /> <label for=\"preorders_0\">";
        // line 114
        echo getLang("Includeordersthatdonotcontainpreorderproducts");
        echo "</label><br />
\t\t\t\t\t\t<input type=\"checkbox\" name=\"preorders[]\" value=\"1\" id=\"preorders_1\" checked=\"checked\" /> <label for=\"preorders_1\">";
        // line 115
        echo getLang("Includeordersthatcontainpreorderproducts");
        echo "</label><br />
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t";
        // line 118
        if ($this->getAttribute((isset($context['ISC_CFG']) ? $context['ISC_CFG'] : null), "DeletedOrdersAction", array(), "any") == "delete") {
            echo "\t\t\t\t  <tr>
\t\t\t\t\t  <td class=\"FieldLabel\">
\t\t\t\t\t\t  &nbsp;&nbsp;&nbsp;";
            // line 121
            echo getLang("DeletedOrders");
            echo ":
\t\t\t\t\t  </td>
\t\t\t\t\t  <td>
\t\t\t\t\t\t  <label><input name=\"searchDeletedOrders\" value=\"no\" type=\"radio\" checked=\"checked\" />";
            // line 124
            echo getLang("SearchDeletedOrders_No");
            echo "</label><br />
\t\t\t\t\t\t  <label><input name=\"searchDeletedOrders\" value=\"both\" type=\"radio\" />";
            // line 125
            echo getLang("SearchDeletedOrders_Both");
            echo "</label><br />
\t\t\t\t\t\t  <label><input name=\"searchDeletedOrders\" value=\"only\" type=\"radio\" />";
            // line 126
            echo getLang("SearchDeletedOrders_Only");
            echo "</label>
\t\t\t\t\t  </td>
\t\t\t\t  </tr>
\t\t\t\t";
        }
        // line 129
        echo "\t\t\t\t<tr><td class=\"Gap\" colspan=\"2\"></td></tr>
\t\t\t </table>
\t\t\t</td>
\t\t</tr>
\t\t<tr>
\t\t\t<td>
\t\t\t  <table class=\"Panel\">
\t\t\t\t<tr>
\t\t\t\t  <td class=\"Heading2\" colspan=2>";
        // line 138
        echo getLang("SearchByRange");
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 142
        echo getLang("OrderID");
        echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t";
        // line 145
        echo getLang("SearchFrom");
        echo " &nbsp;&nbsp;<input type=\"text\" id=\"orderFrom\" name=\"orderFrom\" class=\"Field50\"> ";
        echo getLang("SearchTo");
        echo "\t\t\t\t\t\t&nbsp;&nbsp;<input type=\"text\" id=\"orderTo\" name=\"orderTo\" class=\"Field50\">
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 151
        echo getLang("OrderTotal");
        echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t";
        // line 154
        echo getLang("SearchFrom");
        echo " ";
        echo twig_safe_filter((isset($context['CurrencyTokenLeft']) ? $context['CurrencyTokenLeft'] : null));
        echo "<input type=\"text\" id=\"totalFrom\" name=\"totalFrom\" class=\"Field50\"> ";
        echo twig_safe_filter((isset($context['CurrencyTokenRight']) ? $context['CurrencyTokenRight'] : null));
        echo " ";
        echo getLang("SearchTo");
        echo "\t\t\t\t\t\t";
        // line 155
        echo twig_safe_filter((isset($context['CurrencyTokenLeft']) ? $context['CurrencyTokenLeft'] : null));
        echo "<input type=\"text\" id=\"totalTo\" name=\"totalTo\" class=\"Field50\"> ";
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
        // line 166
        echo getLang("SearchByDate");
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr><td class=\"Gap\"></td></tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 171
        echo getLang("DateRange");
        echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<select name=\"dateRange\" id=\"dateRange\" onchange=\"ToggleRange()\" class=\"Field250\">
\t\t\t\t\t\t\t<option value=\"\">";
        // line 175
        echo getLang("ChooseOrderDate");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"today\">";
        // line 176
        echo getLang("Today");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"yesterday\">";
        // line 177
        echo getLang("Yesterday");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"day\">";
        // line 178
        echo getLang("Last24Hours");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"week\">";
        // line 179
        echo getLang("Last7Days");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"month\">";
        // line 180
        echo getLang("Last30Days");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"this_month\">";
        // line 181
        echo getLang("ThisMonth");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"this_year\">";
        // line 182
        echo getLang("ThisYear");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"custom\">";
        // line 183
        echo getLang("CustomPeriod");
        echo "</option>
\t\t\t\t\t\t</select>
\t\t\t\t\t\t<div id=\"dateRangeCustom\" style=\"margin-left: 30px; margin-top: 10px;\">
\t\t\t\t\t\t\t";
        // line 186
        echo getLang("SearchFrom");
        echo " <input class=\"plain\" name=\"fromDate\" id=\"dc1\" size=\"12\" onfocus=\"this.blur()\" readonly><a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fStartPop(g('dc1'),g('dc2'));return false;\" HIDEFOCUS><img name=\"popcal\" align=\"absmiddle\" src=\"images/calbtn.gif\" width=\"34\" height=\"22\" border=\"0\" alt=\"\"></a>
\t\t\t\t\t\t\t";
        // line 187
        echo getLang("SearchTo");
        echo " <input class=\"plain\" name=\"toDate\" id=\"dc2\" size=\"12\" onfocus=\"this.blur()\" readonly><a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fEndPop(g('dc1'),g('dc2'));return false;\" HIDEFOCUS><img name=\"popcal\" align=\"absmiddle\" src=\"images/calbtn.gif\" width=\"34\" height=\"22\" border=\"0\" alt=\"\"></a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 193
        echo getLang("SearchByDateType");
        echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<label><input name=\"SearchByDate\" value=\"0\" type=\"radio\" checked=\"checked\" />";
        // line 196
        echo getLang("SearchByOrderDate");
        echo "</label><br />
\t\t\t\t\t\t<label><input name=\"SearchByDate\" value=\"1\" type=\"radio\" />";
        // line 197
        echo getLang("SearchByEventDate");
        echo "</label><br />
\t\t\t\t\t\t<label><input name=\"SearchByDate\" value=\"2\" type=\"radio\" />";
        // line 198
        echo getLang("SearchByOrderAndEventDate");
        echo "</label>
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
        // line 209
        echo getLang("SortOrder");
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr><td class=\"Gap\"></td></tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 214
        echo getLang("SortOrder");
        echo ":
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<select name=\"sortField\" class=\"Field120\">
\t\t\t\t\t\t\t<option value=\"orderid\">";
        // line 218
        echo getLang("OrderId");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"custname\">";
        // line 219
        echo getLang("Customer");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"orddate\">";
        // line 220
        echo getLang("Date");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"ordstats\">";
        // line 221
        echo getLang("Status");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"newmessages\">";
        // line 222
        echo getLang("NewMessages");
        echo "</option>
\t\t\t\t\t\t\t<option value=\"total_inc_tax\">";
        // line 223
        echo getLang("Total");
        echo "</option>
\t\t\t\t\t\t</select>
\t\t\t\t\t\tin&nbsp;
\t\t\t\t\t\t<select name=\"sortOrder\" class=\"Field110\">
\t\t\t\t\t\t<option value=\"asc\">";
        // line 227
        echo getLang("AscendingOrder");
        echo "</option>
\t\t\t\t\t\t<option value=\"desc\">";
        // line 228
        echo getLang("DescendingOrder");
        echo "</option>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"Gap\">&nbsp;</td>
\t\t\t\t\t<td class=\"Gap\"><input type=\"submit\" name=\"SubmitButton1\" value=\"";
        // line 233
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
\t\t\tif(range.options[range.selectedIndex].value == \"custom\")
\t\t\t{
\t\t\t\tg('dateRangeCustom').style.display = '';
\t\t\t}
\t\t\telse
\t\t\t{
\t\t\t\tg('dateRangeCustom').style.display = 'none';
\t\t\t}
\t\t}

\t\tToggleRange();

\t\tfunction ConfirmCancel() {
\t\t\tif(confirm(\"";
        // line 266
        echo getLang("ConfirmCancelSearch");
        echo "\")) {
\t\t\t\thistory.go(-1);
\t\t\t}
\t\t}

\t\tfunction CheckViewForm() {
\t\t\tvar viewName = g(\"viewName\");
\t\t\tvar orderFrom = g(\"orderFrom\");
\t\t\tvar orderTo = g(\"orderTo\");
\t\t\tvar totalFrom = g(\"totalFrom\");
\t\t\tvar totalTo = g(\"totalTo\");
\t\t\tvar fromDate = g(\"dc1\");
\t\t\tvar toDate = g(\"dc2\");

\t\t\tif(viewName.value == \"\") {
\t\t\t\talert(\"";
        // line 281
        echo getLang("EnterViewName");
        echo "\");
\t\t\t\tviewName.focus();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(orderFrom.value != \"\" && isNaN(orderFrom.value)) {
\t\t\t\talert(\"";
        // line 287
        echo getLang("SearchEnterValidOrderId");
        echo "\");
\t\t\t\torderFrom.focus();
\t\t\t\torderFrom.select();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(orderTo.value != \"\" && isNaN(orderTo.value)) {
\t\t\t\talert(\"";
        // line 294
        echo getLang("SearchEnterValidOrderId");
        echo "\");
\t\t\t\torderTo.focus();
\t\t\t\torderTo.select();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(totalFrom.value != \"\" && isNaN(priceFormat(totalFrom.value))) {
\t\t\t\talert(\"";
        // line 301
        echo getLang("SearchEnterValidTotal");
        echo "\");
\t\t\t\ttotalFrom.focus();
\t\t\t\ttotalFrom.select();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(totalTo.value != \"\" && isNaN(priceFormat(totalTo.value))) {
\t\t\t\talert(\"";
        // line 308
        echo getLang("SearchEnterValidTotal");
        echo "\");
\t\t\t\ttotalTo.focus();
\t\t\t\ttotalTo.select();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(fromDate.value != \"\" && fromDate.value == toDate.value) {
\t\t\t\talert(\"";
        // line 315
        echo getLang("SearchChooseDifferentDates");
        echo "\");
\t\t\t\treturn false;
\t\t\t}

\t\t\treturn true;
\t\t}

\t</script>
";
    }

}
