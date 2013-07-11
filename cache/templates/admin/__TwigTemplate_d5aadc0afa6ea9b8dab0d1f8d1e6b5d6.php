<?php

/* product.form.tpl */
class __TwigTemplate_d5aadc0afa6ea9b8dab0d1f8d1e6b5d6 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        $context['util'] = $this->env->loadTemplate("macros/util.tpl", true);
        // line 2
        $context['formBuilder'] = $this->env->loadTemplate("macros/forms.tpl", true);
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../javascript/jquery/themes/cupertino/ui.all.css\" />
<script type=\"text/javascript\" src=\"../javascript/jquery/plugins/jquery.htmlEncode.js?";
        // line 4
        echo twig_escape_filter($this->env, (isset($context['JSCacheToken']) ? $context['JSCacheToken'] : null), "1");
        echo "\"></script>

<input type=\"hidden\" name=\"youTubeVideos\" id=\"youTubeVideos\" value=\"";
        // line 6
        echo twig_safe_filter((isset($context['YouTubeVideos']) ? $context['YouTubeVideos'] : null));
        echo "\">

<form enctype=\"multipart/form-data\" action=\"index.php?ToDo=";
        // line 8
        echo twig_safe_filter((isset($context['FormAction']) ? $context['FormAction'] : null));
        echo "\" id=\"frmProduct\" method=\"post\">
<input type=\"hidden\" name=\"productId\" id=\"productId\" value=\"";
        // line 9
        echo twig_safe_filter((isset($context['ProductId']) ? $context['ProductId'] : null));
        echo "\">
<input type=\"hidden\" name=\"productHash\" id=\"productHash\" value=\"";
        // line 10
        echo twig_safe_filter((isset($context['ProductHash']) ? $context['ProductHash'] : null));
        echo "\">
<input type=\"hidden\" name=\"originalProductId\" id=\"originalProductId\" value=\"";
        // line 11
        echo twig_safe_filter((isset($context['OriginalProductId']) ? $context['OriginalProductId'] : null));
        echo "\">
<input id=\"currentTab\" name=\"currentTab\" value=\"0\" type=\"hidden\">
<input id=\"productVariationExisting\" name=\"productVariationExisting\" value=\"";
        // line 13
        echo twig_safe_filter((isset($context['ProductVariationExisting']) ? $context['ProductVariationExisting'] : null));
        echo "\" type=\"hidden\">
<div id=\"youTubeData\" style=\"display: none;\"></div>
<div class=\"BodyContainer\">
\t<table cellSpacing=\"0\" cellPadding=\"0\" width=\"100%\" style=\"margin-left: 4px; margin-top: 8px;\">
\t<tr>
\t\t<td class=\"Heading1\">";
        // line 18
        echo twig_safe_filter((isset($context['Title']) ? $context['Title'] : null));
        echo "</td>
\t</tr>
\t<tr>
\t\t<td class=\"Intro\">
\t\t\t<p>";
        // line 22
        echo twig_safe_filter((isset($context['Intro']) ? $context['Intro'] : null));
        echo "</p>
\t\t\t<div id=\"MainMessage\">
\t\t\t\t";
        // line 24
        echo twig_safe_filter((isset($context['Message']) ? $context['Message'] : null));
        echo "
\t\t\t</div>
\t\t\t<p>
\t\t\t\t<input type=\"submit\" disabled=\"disabled\" value=\"";
        // line 27
        echo getLang("SaveAndExit");
        echo "\" class=\"FormButton\" />
\t\t\t\t<input type=\"submit\" disabled=\"disabled\" value=\"";
        // line 28
        echo twig_safe_filter((isset($context['SaveAndAddAnother']) ? $context['SaveAndAddAnother'] : null));
        echo "\" onclick=\"SaveAndAddAnother()\" class=\"FormButton\" style=\"width:130px\" />
\t\t\t\t<input type=\"reset\" value=\"";
        // line 29
        echo getLang("Cancel");
        echo "\" class=\"FormButton\" onclick=\"ConfirmCancel()\" />
\t\t\t</p>
\t\t</td>
\t</tr>
\t<tr>
\t\t<td>
\t\t\t<ul id=\"tabnav\">
\t\t\t\t<li><a href=\"#\" class=\"active\" id=\"tab0\" onclick=\"ShowTab(0)\">";
        // line 36
        echo getLang("Details");
        echo "</a></li>
\t\t\t\t<li style=\"display: ";
        // line 37
        echo twig_safe_filter((isset($context['HideDigitalOptions']) ? $context['HideDigitalOptions'] : null));
        echo "\"><a href=\"#\" id=\"tab2\" class=\"ShowOnDigitalProduct\" onclick=\"ShowTab(2)\" style=\"display: none;\">";
        echo getLang("DigitalDownloads");
        echo "</a></li>
\t\t\t\t<li><a href=\"#\" id=\"tab8\" onclick=\"ShowTab(8)\">";
        // line 38
        echo getLang("ImagesVideos");
        echo "</a></li>
\t\t\t\t<li><a href=\"#\" id=\"tab1\" onclick=\"ShowTab(1)\">";
        // line 39
        echo getLang("EventDate");
        echo "</a></li>
\t\t\t\t<li style=\"display: ";
        // line 40
        echo twig_safe_filter((isset($context['HideInventoryOptions']) ? $context['HideInventoryOptions'] : null));
        echo "\"><a href=\"#\" id=\"tab3\" class=\"HideOnDigitalProduct\" onclick=\"ShowTab(3)\">";
        echo getLang("Inventory");
        echo "</a></li>
\t\t\t\t<li><a href=\"#\" id=\"tab4\" onclick=\"ShowTab(4)\" class=\"HideOnDigitalProduct\">";
        // line 41
        echo getLang("Variations");
        echo "</a></li>
                <li><a href=\"#\" id=\"tab10\" onclick=\"ShowTab(10)\" class=\"HideOnDigitalProduct\">";
        // line 42
        echo getLang("Associations");
        echo "</a></li>
\t\t\t\t<li><a href=\"#\" id=\"tab5\" onclick=\"ShowTab(5)\">";
        // line 43
        echo getLang("ConfigurableCustomFields");
        echo "</a></li>
\t\t\t\t<li><a href=\"#\" id=\"tab6\" onclick=\"ShowTab(6)\">";
        // line 44
        echo getLang("OtherDetails");
        echo "</a></li>
\t\t\t\t<li><a href=\"#\" id=\"tab7\" onclick=\"ShowTab(7)\">";
        // line 45
        echo getLang("DiscountRules");
        echo "</a></li>
\t\t\t\t<li><a href=\"#\" id=\"tab9\" onclick=\"ShowTab(9)\">";
        // line 46
        echo getLang("GoogleWebsiteOptimizer");
        echo "</a></li>
\t\t\t</ul>
\t\t</td>
\t</tr>
\t<tr>
\t\t<td>
\t\t\t<!-- Start product details -->
\t\t\t<div id=\"div0\" style=\"padding-top: 10px;\">
\t\t\t\t<div style=\"padding-bottom:5px\">";
        // line 54
        echo getLang("CatalogInformationIntro");
        echo "</div>
\t\t\t\t<table width=\"100%\" class=\"Panel\">
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"Heading2\" colspan=\"2\">";
        // line 57
        echo getLang("CatalogInformation");
        echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t<span class=\"Required\">*</span>&nbsp;";
        // line 61
        echo getLang("ProductType");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<div id=\"ProductType\" class=\"Field\" style=\"float:left\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<input ";
        // line 66
        echo twig_safe_filter((isset($context['ProdType_1']) ? $context['ProdType_1'] : null));
        echo " id=\"ProductType_0\" type=\"radio\" name=\"prodtype\" value=\"1\" onclick=\"ToggleType(0)\"/><label for=\"ProductType_0\">";
        echo getLang("PhysicalProduct");
        echo "</label>
                                    <span style=\"display:";
        // line 67
        echo twig_safe_filter((isset($context['ProdType_0Hidden']) ? $context['ProdType_0Hidden'] : null));
        echo ";\" id=\"physicalTypes\">
                                        <p style=\"padding-left:25px;\">
                                            <span class=\"Required\">*</span>&nbsp;";
        // line 69
        echo getLang("PhysicalProductType");
        echo "<br />
                                            <input style=\"margin-top:10px;\" type=\"radio\" name=\"physProdType\" id=\"physProdTypeFace\" value=\"1\" ";
        // line 70
        echo twig_safe_filter((isset($context['IsPhysProd_1']) ? $context['IsPhysProd_1'] : null));
        echo " /> <label for=\"physProdTypeFace\">";
        echo getLang("PhysicalProductFace");
        echo "</label><br />
                                            <input type=\"radio\" name=\"physProdType\" id=\"physProdTypeStrap\" value=\"2\" ";
        // line 71
        echo twig_safe_filter((isset($context['IsPhysProd_2']) ? $context['IsPhysProd_2'] : null));
        echo " /> <label for=\"physProdTypeStrap\">";
        echo getLang("PhysicalProductStrap");
        echo "</label><br />
                                            <input disabled type=\"radio\" name=\"physProdType\" id=\"physProdTypeMod\" value=\"3\" ";
        // line 72
        echo twig_safe_filter((isset($context['IsPhysProd_3']) ? $context['IsPhysProd_3'] : null));
        echo " /> <label for=\"physProdTypeMod\">";
        echo getLang("PhysicalProductMod");
        echo "</label><br />
                                            <input type=\"radio\" name=\"physProdType\" id=\"physProdTypeSet\" value=\"4\" ";
        // line 73
        echo twig_safe_filter((isset($context['IsPhysProd_4']) ? $context['IsPhysProd_4'] : null));
        echo " /> <label for=\"physProdTypeSet\">";
        echo getLang("PhysicalProductSet");
        echo "</label><br />
                                            <input type=\"radio\" name=\"physProdType\" id=\"physProdTypeOther\" value=\"5\" ";
        // line 74
        echo twig_safe_filter((isset($context['IsPhysProd_5']) ? $context['IsPhysProd_5'] : null));
        echo " /> <label for=\"physProdTypeOther\">";
        echo getLang("PhysicalProductOther");
        echo "</label>
                                        </p>
                                    </span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<input ";
        // line 79
        echo twig_safe_filter((isset($context['ProdType_2']) ? $context['ProdType_2'] : null));
        echo " id=\"ProductType_1\" type=\"radio\" name=\"prodtype\" value=\"2\" onclick=\"ToggleType(1)\" /><label for=\"ProductType_1\">";
        echo getLang("DownloadableProduct");
        echo "</label>
\t\t\t\t\t\t\t\t</div>
                                <div>
\t\t\t\t\t\t\t\t\t<input ";
        // line 82
        echo twig_safe_filter((isset($context['ProdType_5']) ? $context['ProdType_5'] : null));
        echo " id=\"ProductType_2\" type=\"radio\" name=\"prodtype\" value=\"5\" onclick=\"ToggleType(5)\" /><label for=\"ProductType_5\">";
        echo getLang("SubscriptionProduct");
        echo "</label>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d1');\" onmouseover=\"ShowHelp('d1', '";
        // line 85
        echo getLang("ProductType");
        echo "', '";
        echo getLang("ProductTypeHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\" style=\"margin-top: 5px;\" />
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d1\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t<span class=\"Required\">*</span>&nbsp;";
        // line 91
        echo getLang("ProductName");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"text\" id=\"prodName\" name=\"prodName\" class=\"Field400\" value=\"";
        // line 94
        echo twig_safe_filter((isset($context['ProdName']) ? $context['ProdName'] : null));
        echo "\">
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 99
        echo getLang("ProductCodeSKU");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"text\" id=\"prodCode\" name=\"prodCode\" class=\"Field400\" value=\"";
        // line 102
        echo twig_safe_filter((isset($context['ProdCode']) ? $context['ProdCode'] : null));
        echo "\">
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d2');\" onmouseover=\"ShowHelp('d2', '";
        // line 103
        echo getLang("ProductCodeSKU");
        echo "', '";
        echo getLang("ProductCodeSKUHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d2\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t<span class=\"Required\">*</span>&nbsp;";
        // line 109
        echo getLang("Categories");
        echo ":<br />
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;<span style=\"";
        // line 110
        echo twig_safe_filter((isset($context['HideCategoryCreation']) ? $context['HideCategoryCreation'] : null));
        echo "\">(<a href=\"#\" onclick=\"CreateNewCategory(); return false;\">";
        echo getLang("CreateNew");
        echo "</a>)</span>
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<select size=\"5\" id=\"category\" name=\"category[]\" class=\"Field400 ISSelectReplacement\" multiple=\"multiple\" style=\"height: 140px;\">
\t\t\t\t\t\t\t";
        // line 114
        echo twig_safe_filter((isset($context['CategoryOptions']) ? $context['CategoryOptions'] : null));
        echo "
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d3');\" onmouseover=\"ShowHelp('d3', '";
        // line 116
        echo getLang("Categories");
        echo "', '";
        echo getLang("ProductCategoriesHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d3\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr style=\"";
        // line 120
        echo twig_safe_filter((isset($context['HideVendorOption']) ? $context['HideVendorOption'] : null));
        echo "\">
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 122
        echo getLang("Vendor");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<span style=\"";
        // line 125
        echo twig_safe_filter((isset($context['HideVendorLabel']) ? $context['HideVendorLabel'] : null));
        echo "\">";
        echo twig_safe_filter((isset($context['CurrentVendor']) ? $context['CurrentVendor'] : null));
        echo "</span>
\t\t\t\t\t\t\t<select name=\"vendor\" id=\"vendor\" class=\"Field400\" style=\"";
        // line 126
        echo twig_safe_filter((isset($context['HideVendorSelect']) ? $context['HideVendorSelect'] : null));
        echo "\" onchange=\"toggleVendorSettings(\$(this).val());\">
\t\t\t\t\t\t\t\t";
        // line 127
        echo twig_safe_filter((isset($context['VendorList']) ? $context['VendorList'] : null));
        echo "
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t<img style=\"";
        // line 129
        echo twig_safe_filter((isset($context['HideVendorSelect']) ? $context['HideVendorSelect'] : null));
        echo "\" onmouseout=\"HideHelp('vendorhelp');\" onmouseover=\"ShowHelp('vendorhelp', '";
        echo getLang("Vendor");
        echo "', '";
        echo getLang("ProductVendorHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"vendorhelp\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t</table>
\t\t\t\t<table width=\"100%\" class=\"Panel\">
\t\t\t\t\t<tr>
\t\t\t\t\t  <td class=\"Heading2\" colspan=2>";
        // line 136
        echo getLang("ProductDescription");
        echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td colspan=\"2\">
\t\t\t\t\t\t\t";
        // line 140
        echo twig_safe_filter((isset($context['WYSIWYG']) ? $context['WYSIWYG'] : null));
        echo "
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t</table>
\t\t\t\t<table width=\"100%\" class=\"Panel\">
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"Heading2\" colspan=\"2\">";
        // line 146
        echo getLang("ProductPriceOptions");
        echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t<span class=\"Required\">*</span>&nbsp;";
        // line 150
        echo getLang("PreorderAvailability");
        echo "</td>
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<div><label><input type=\"radio\" name=\"_prodorderable\" id=\"_prodorderable_yes\" value=\"yes\" ";
        // line 153
        if ((isset($context['_prodorderable']) ? $context['_prodorderable'] : null) == "yes") {
            echo "checked=\"checked\"";
        }
        echo " /> ";
        echo getLang("ThisProductCanBePurchasedInMyOnlineStore");
        echo "</label></div>

\t\t\t\t\t\t\t<div><label><input type=\"radio\" name=\"_prodorderable\" id=\"_prodorderable_pre\" value=\"pre\" ";
        // line 155
        if ((isset($context['_prodorderable']) ? $context['_prodorderable'] : null) == "pre") {
            echo "checked=\"checked\"";
        }
        echo " /> ";
        echo getLang("ThisProductIsComingSoonButIWantToTakePreOrders");
        echo "</label></div>
\t\t\t\t\t\t\t<div class=\"_prodorderable_detail\" id=\"_prodorderable_pre_detail\" style=\"display:none;\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<img src=\"images/nodejoin.gif\" alt=\"\" style=\"vertical-align: middle;\" /> ";
        // line 158
        echo getLang("Message");
        echo ": <input type=\"text\" name=\"prodpreordermessage\" id=\"prodpreordermessage\" class=\"Field300\" value=\"";
        echo twig_escape_filter($this->env, (isset($context['prodpreordermessage']) ? $context['prodpreordermessage'] : null), "1");
        echo "\" maxlength=\"250\" />
\t\t\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('PreorderMessageHelp');\" onmouseover=\"ShowHelp('PreorderMessageHelp', '";
        // line 159
        echo Interspire_Template_Extension::jsFilter(getLang("PreorderMessage"), "'");
        echo "?', '";
        echo Interspire_Template_Extension::jsFilter(getLang("PreorderMessageHelp"), "'");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t\t\t<div style=\"display:none\" id=\"PreorderMessageHelp\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<img src=\"images/nodejoin.gif\" alt=\"\" style=\"vertical-align: middle;\" /> ";
        // line 163
        echo getLang("ReleaseDate");
        echo ": <input type=\"text\" name=\"prodreleasedate\" id=\"prodreleasedate\" class=\"Field80\" value=\"";
        echo twig_escape_filter($this->env, (isset($context['prodreleasedate']) ? $context['prodreleasedate'] : null), "1");
        echo "\" />
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"prodreleasedateremove\" id=\"prodreleasedateremove\" ";
        // line 164
        if ((isset($context['prodreleasedateremove']) ? $context['prodreleasedateremove'] : null)) {
            echo "checked=\"checked\"";
        }
        echo " /> <label for=\"prodreleasedateremove\" />";
        echo getLang("RemovePreOrderStatusOnThisDate");
        echo "</label>
\t\t\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('PreorderRemoveDateHelp');\" onmouseover=\"ShowHelp('PreorderRemoveDateHelp', '";
        // line 165
        echo Interspire_Template_Extension::jsFilter(getLang("RemovePreOrderStatusOnThisDate"), "'");
        echo "?', '";
        echo Interspire_Template_Extension::jsFilter(getLang("PreorderRemoveDateHelp"), "'");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t\t\t<div style=\"display:none\" id=\"PreorderRemoveDateHelp\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div><label><input type=\"radio\" name=\"_prodorderable\" id=\"_prodorderable_no\" value=\"no\" ";
        // line 170
        if ((isset($context['_prodorderable']) ? $context['_prodorderable'] : null) == "no") {
            echo "checked=\"checked\"";
        }
        echo " /> ";
        echo getLang("ThisProductCannotBePurchasedInMyOnlineStore");
        echo "</label></div>
\t\t\t\t\t\t\t<div class=\"_prodorderable_detail\" id=\"_prodorderable_no_detail\" style=\"display:none;\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<img src=\"images/nodejoin.gif\" alt=\"\" style=\"vertical-align: middle;\" />
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"prodHidePrices\" id=\"prodHidePrices\" value=\"1\" ";
        // line 174
        echo twig_safe_filter((isset($context['ProdHidePrice']) ? $context['ProdHidePrice'] : null));
        echo " onclick=\"ToggleCallForPricing()\" />
\t\t\t\t\t\t\t\t\t<label for=\"prodHidePrices\">";
        // line 175
        echo getLang("ProductCallForPricing");
        echo "</label>
\t\t\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('prodhidepriceshelp');\" onmouseover=\"ShowHelp('prodhidepriceshelp', '";
        // line 176
        echo Interspire_Template_Extension::jsFilter(getLang("ProductCallForPricing"), "'");
        echo "?', '";
        echo Interspire_Template_Extension::jsFilter(getLang("ProductCallForPricingHelp"), "'");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\" />
\t\t\t\t\t\t\t\t\t<div style=\"display:none\" id=\"prodhidepriceshelp\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div id=\"prodCallForPricingLabelContainer\" style=\"margin-left: 18px; display:none;\">
\t\t\t\t\t\t\t\t\t<img src=\"images/nodejoin.gif\" alt=\"\" style=\"vertical-align: middle;\" /> <label for=\"prodCallForPricingLabel\">";
        // line 180
        echo getLang("ProductCallForPricingLabel");
        echo ":</label> <input type=\"text\" name=\"prodCallForPricingLabel\" id=\"prodCallForPricingLabel\" class=\"Field250\" value=\"";
        echo twig_safe_filter((isset($context['ProdCallForPricingLabel']) ? $context['ProdCallForPricingLabel'] : null));
        echo "\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t<span class=\"Required\">*</span>&nbsp;";
        // line 187
        echo getLang("Price");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t";
        // line 190
        echo twig_safe_filter((isset($context['CurrencyTokenLeft']) ? $context['CurrencyTokenLeft'] : null));
        echo " <input type=\"text\" id=\"prodPrice\" name=\"prodPrice\" class=\"Field80\" value=\"";
        echo twig_safe_filter((isset($context['ProdPrice']) ? $context['ProdPrice'] : null));
        echo "\" style=\"text-align: right;\" /> ";
        echo twig_safe_filter((isset($context['CurrencyTokenRight']) ? $context['CurrencyTokenRight'] : null));
        echo "
\t\t\t\t\t\t\t";
        // line 191
        if ((isset($context['enterPricesWithTax']) ? $context['enterPricesWithTax'] : null)) {
            echo "\t\t\t\t\t\t\t\t";
            // line 192
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "IncTax", array(), "any"), "1");
            echo "
\t\t\t\t\t\t\t";
        } else {
            // line 193
            echo "\t\t\t\t\t\t\t\t";
            // line 194
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "ExTax", array(), "any"), "1");
            echo "
\t\t\t\t\t\t\t";
        }
        // line 195
        echo "\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d6');\" onmouseover=\"ShowHelp('d6', '";
        // line 196
        echo getLang("Price");
        echo "', '";
        echo getLang("PriceHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d6\"></div>
\t\t\t\t\t\t\t<a href=\"javascript:void(0)\" class=\"ExpandLink\" onclick=\"toggle_price_options()\"><span id=\"more_price_options\">";
        // line 198
        echo getLang("MorePricingOptions");
        echo " &raquo;</span></a>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr id=\"tr_costprice\" style=\"display:none\">
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 203
        echo getLang("CostPrice");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t";
        // line 206
        echo twig_safe_filter((isset($context['CurrencyTokenLeft']) ? $context['CurrencyTokenLeft'] : null));
        echo " <input type=\"text\" id=\"prodCostPrice\" name=\"prodCostPrice\" class=\"Field80\" value=\"";
        echo twig_safe_filter((isset($context['ProdCostPrice']) ? $context['ProdCostPrice'] : null));
        echo "\" style=\"text-align: right;\" /> ";
        echo twig_safe_filter((isset($context['CurrencyTokenRight']) ? $context['CurrencyTokenRight'] : null));
        echo "
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d7');\" onmouseover=\"ShowHelp('d7', '";
        // line 207
        echo getLang("CostPrice");
        echo "', '";
        echo getLang("CostPriceHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d7\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr id=\"tr_retailprice\" style=\"display:none\">
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 213
        echo getLang("RetailPrice");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t";
        // line 216
        echo twig_safe_filter((isset($context['CurrencyTokenLeft']) ? $context['CurrencyTokenLeft'] : null));
        echo " <input type=\"text\" id=\"prodRetailPrice\" name=\"prodRetailPrice\" class=\"Field80\" value=\"";
        echo twig_safe_filter((isset($context['ProdRetailPrice']) ? $context['ProdRetailPrice'] : null));
        echo "\" style=\"text-align: right;\" /> ";
        echo twig_safe_filter((isset($context['CurrencyTokenRight']) ? $context['CurrencyTokenRight'] : null));
        echo "
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d8');\" onmouseover=\"ShowHelp('d8', '";
        // line 217
        echo getLang("RetailPrice");
        echo "', '";
        echo getLang("RetailPriceHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d8\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr id=\"tr_saleprice\" style=\"display:none\">
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 223
        echo getLang("SalePrice");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t";
        // line 226
        echo twig_safe_filter((isset($context['CurrencyTokenLeft']) ? $context['CurrencyTokenLeft'] : null));
        echo " <input type=\"text\" id=\"prodSalePrice\" name=\"prodSalePrice\" class=\"Field80\" value=\"";
        echo twig_safe_filter((isset($context['ProdSalePrice']) ? $context['ProdSalePrice'] : null));
        echo "\" style=\"text-align: right;\" /> ";
        echo twig_safe_filter((isset($context['CurrencyTokenRight']) ? $context['CurrencyTokenRight'] : null));
        echo "
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d9');\" onmouseover=\"ShowHelp('d9', '";
        // line 227
        echo getLang("SalePrice");
        echo "', '";
        echo getLang("SalePriceHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d9\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t<span class=\"Required\">*</span>&nbsp;";
        // line 233
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "ProductTaxClass", array(), "any"), "1");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t";
        // line 236
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "select", array("tax_class_id", (isset($context['taxClasses']) ? $context['taxClasses'] : null), $this->getAttribute((isset($context['product']) ? $context['product'] : null), "tax_class_id", array(), "any"), array("class" => "Field250"), ), "method"), "1");
        // line 238
        echo "
\t\t\t\t\t\t\t";
        // line 239
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['util']) ? $context['util'] : null), "tooltip", array("ProductTaxClass", "ProductTaxClassHelp", ), "method"), "1");
        echo "
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t</table>
\t\t\t\t<table width=\"100%\" class=\"Panel HideOnDigitalProduct\" id=\"shipping_table\">
\t\t\t\t\t<tr>
\t\t\t\t\t  <td class=\"Heading2\" colspan=2>";
        // line 245
        echo getLang("ShippingDetails");
        echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t<span class=\"Required\">*</span>&nbsp;";
        // line 249
        echo getLang("ProductWeight");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"text\" id=\"prodWeight\" name=\"prodWeight\" class=\"Field80\" value=\"";
        // line 252
        echo twig_safe_filter((isset($context['ProdWeight']) ? $context['ProdWeight'] : null));
        echo "\" style=\"text-align: right;\" /> ";
        echo twig_safe_filter((isset($context['WeightMeasurement']) ? $context['WeightMeasurement'] : null));
        echo "
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d14');\" onmouseover=\"ShowHelp('d14', '";
        // line 253
        echo getLang("ProductWeight");
        echo "', '";
        echo twig_safe_filter((isset($context['ProductWeightHelp']) ? $context['ProductWeightHelp'] : null));
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d14\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 259
        echo getLang("ProductWidth");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"text\" id=\"prodWidth\" name=\"prodWidth\" class=\"Field80\" value=\"";
        // line 262
        echo twig_safe_filter((isset($context['ProdWidth']) ? $context['ProdWidth'] : null));
        echo "\" style=\"text-align: right;\" /> ";
        echo twig_safe_filter((isset($context['LengthMeasurement']) ? $context['LengthMeasurement'] : null));
        echo "
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d15');\" onmouseover=\"ShowHelp('d15', '";
        // line 263
        echo getLang("ProductWidth");
        echo "', '";
        echo twig_safe_filter((isset($context['ProductWidthHelp']) ? $context['ProductWidthHelp'] : null));
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d15\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 269
        echo getLang("ProductHeight");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"text\" id=\"prodHeight\" name=\"prodHeight\" class=\"Field80\" value=\"";
        // line 272
        echo twig_safe_filter((isset($context['ProdHeight']) ? $context['ProdHeight'] : null));
        echo "\" style=\"text-align: right;\" /> ";
        echo twig_safe_filter((isset($context['LengthMeasurement']) ? $context['LengthMeasurement'] : null));
        echo "
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d16');\" onmouseover=\"ShowHelp('d16', '";
        // line 273
        echo getLang("ProductHeight");
        echo "', '";
        echo twig_safe_filter((isset($context['ProductHeightHelp']) ? $context['ProductHeightHelp'] : null));
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d16\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 279
        echo getLang("ProductDepth");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"text\" id=\"prodDepth\" name=\"prodDepth\" class=\"Field80\" value=\"";
        // line 282
        echo twig_safe_filter((isset($context['ProdDepth']) ? $context['ProdDepth'] : null));
        echo "\" style=\"text-align: right;\" /> ";
        echo twig_safe_filter((isset($context['LengthMeasurement']) ? $context['LengthMeasurement'] : null));
        echo "
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d17');\" onmouseover=\"ShowHelp('d17', '";
        // line 283
        echo getLang("ProductDepth");
        echo "', '";
        echo twig_safe_filter((isset($context['ProductDepthHelp']) ? $context['ProductDepthHelp'] : null));
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d17\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 289
        echo getLang("FixedShippingCost");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t";
        // line 292
        echo twig_safe_filter((isset($context['CurrencyTokenLeft']) ? $context['CurrencyTokenLeft'] : null));
        echo " <input type=\"text\" id=\"prodFixedCost\" name=\"prodFixedCost\" class=\"Field80\" style=\"width:70px; text-align: right;\" value=\"";
        echo twig_safe_filter((isset($context['ProdFixedShippingCost']) ? $context['ProdFixedShippingCost'] : null));
        echo "\" onkeyup=\"document.getElementById('prodFreeShipping').checked=false\"> ";
        echo twig_safe_filter((isset($context['CurrencyTokenRight']) ? $context['CurrencyTokenRight'] : null));
        echo "
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d21');\" onmouseover=\"ShowHelp('d21', '";
        // line 293
        echo getLang("FixedShippingCost");
        echo "', '";
        echo getLang("FixedShippingCostHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d21\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 299
        echo getLang("FreeShipping");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"prodFreeShipping\" name=\"prodFreeShipping\" value=\"1\" ";
        // line 302
        echo twig_safe_filter((isset($context['FreeShipping']) ? $context['FreeShipping'] : null));
        echo " onclick=\"if(this.checked) { document.getElementById('prodFixedCost').value='0'; }\"> <label for=\"prodFreeShipping\">";
        echo getLang("YesFreeShipping");
        echo "</label>
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d30');\" onmouseover=\"ShowHelp('d30', '";
        // line 303
        echo getLang("FreeShipping");
        echo "', '";
        echo getLang("FreeShippingProductHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d30\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t</table>
\t\t\t</div> <!-- End product details -->

\t\t\t<!-- Start event/delivery date -->
\t\t\t<div id=\"div1\" style=\"padding-top: 10px;\">
\t\t\t\t<div style=\"padding-bottom:5px\">";
        // line 312
        echo getLang("EventDateIntro");
        echo "</div>
\t\t\t\t  <table width=\"100%\" class=\"Panel\">
\t\t\t\t\t<tr>
\t\t\t\t\t  <td class=\"Heading2\" colspan=2>";
        // line 315
        echo getLang("EventDate");
        echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">&nbsp;&nbsp;&nbsp;";
        // line 318
        echo getLang("EventDateRequired");
        echo "</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<label><input id=\"EventDateRequired\" name=\"EventDateRequired\" type=\"checkbox\" ";
        // line 320
        echo twig_safe_filter((isset($context['EventDateRequired']) ? $context['EventDateRequired'] : null));
        echo " /> ";
        echo getLang("EventDateRequiredInfo");
        echo "</label>
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('ed1');\" onmouseover=\"ShowHelp('ed1', '";
        // line 321
        echo getLang("EventDateRequiredHelpHeader");
        echo "', '";
        echo getLang("EventDateRequiredHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\" style=\"margin-top: 5px;\" />
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"ed1\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr id=\"DateFieldNameTR\">
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t<span class=\"Required\">*</span>
\t\t\t\t\t\t\t";
        // line 328
        echo getLang("EventDateFieldName");
        echo "\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input id=\"EventDateFieldName\" name=\"EventDateFieldName\" value=\"";
        // line 331
        echo twig_safe_filter((isset($context['EventDateFieldName']) ? $context['EventDateFieldName'] : null));
        echo "\" type=\"text\" class=\"Field300\" />
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('ed2');\" onmouseover=\"ShowHelp('ed2', '";
        // line 332
        echo getLang("EventDateFieldNameHelpHeader");
        echo "', '";
        echo getLang("EventDateFieldNameHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\" style=\"margin-top: 5px;\" />
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"ed2\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr id=\"DateLimitTR\">
\t\t\t\t\t\t<td class=\"FieldLabel\">&nbsp;&nbsp;&nbsp;";
        // line 337
        echo getLang("EventDateLimit");
        echo "\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td style=\"padding-bottom: 10px;\">
\t\t\t\t\t\t\t<label><input id=\"LimitDates\" name=\"LimitDates\" type=\"checkbox\" ";
        // line 340
        echo twig_safe_filter((isset($context['LimitDates']) ? $context['LimitDates'] : null));
        echo " /> ";
        echo getLang("EventDateLimitInfo");
        echo "</label>
\t\t\t\t\t\t\t<select id=\"LimitDatesSelect\" name=\"LimitDatesSelect\">
\t\t\t\t\t\t\t\t<option value=\"1\" ";
        // line 342
        echo twig_safe_filter((isset($context['LimitDateOption1']) ? $context['LimitDateOption1'] : null));
        echo ">";
        echo getLang("EventDateLimitOption1");
        echo "</option>
\t\t\t\t\t\t\t\t<option value=\"2\" ";
        // line 343
        echo twig_safe_filter((isset($context['LimitDateOption2']) ? $context['LimitDateOption2'] : null));
        echo ">";
        echo getLang("EventDateLimitOption2");
        echo "</option>
\t\t\t\t\t\t\t\t<option value=\"3\" ";
        // line 344
        echo twig_safe_filter((isset($context['LimitDateOption3']) ? $context['LimitDateOption3'] : null));
        echo ">";
        echo getLang("EventDateLimitOption3");
        echo "</option>
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t";
        // line 346
        echo getLang("EventDateLimitInfo2");
        echo "\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('ed3');\" onmouseover=\"ShowHelp('ed3', '";
        // line 347
        echo getLang("EventDateLimitHelpHeader");
        echo "', '";
        echo getLang("EventDateLimitHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\" style=\"margin-top: 5px;\" />
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"ed3\"></div>
\t\t\t\t\t\t\t<br/>
\t\t\t\t\t\t\t<div id=\"LimitDates1\">
\t\t\t\t\t\t\t\t<img style=\"float: left;\" src=\"images/nodejoin.gif\"/>
\t\t\t\t\t\t\t\t<span id=customDate7 style=\"float : left; display:block; margin-top:2px;\">&nbsp;
\t\t\t\t\t\t\t\t";
        // line 353
        echo getLang("EventDateLimitOption1Info");
        echo "\t\t\t\t\t\t\t\t<select name=\"Calendar1[From][Day]\" class=\"\" style=\"margin-bottom:3px\">
\t\t\t\t\t\t\t\t\t";
        // line 355
        echo twig_safe_filter((isset($context['OverviewFromDays']) ? $context['OverviewFromDays'] : null));
        echo "
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t<select name=\"Calendar1[From][Mth]\" class=\"\" style=\"margin-bottom:3px\">
\t\t\t\t\t\t\t\t\t";
        // line 358
        echo twig_safe_filter((isset($context['OverviewFromMonths']) ? $context['OverviewFromMonths'] : null));
        echo "
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t<select name=\"Calendar1[From][Yr]\" class=\"\" style=\"margin-bottom:3px\">
\t\t\t\t\t\t\t\t\t";
        // line 361
        echo twig_safe_filter((isset($context['OverviewFromYears']) ? $context['OverviewFromYears'] : null));
        echo "
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t<span class=body>";
        // line 363
        echo getLang("EventDateLimitOption1Info2");
        echo "</span>
\t\t\t\t\t\t\t\t<select name=\"Calendar1[To][Day]\" class=\"\" style=\"margin-bottom:3px\">
\t\t\t\t\t\t\t\t\t";
        // line 365
        echo twig_safe_filter((isset($context['OverviewToDays']) ? $context['OverviewToDays'] : null));
        echo "
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t<select name=\"Calendar1[To][Mth]\" class=\"\" style=\"margin-bottom:3px\">
\t\t\t\t\t\t\t\t\t";
        // line 368
        echo twig_safe_filter((isset($context['OverviewToMonths']) ? $context['OverviewToMonths'] : null));
        echo "
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t<select name=\"Calendar1[To][Yr]\" class=\"\" style=\"margin-bottom:3px\">
\t\t\t\t\t\t\t\t\t";
        // line 371
        echo twig_safe_filter((isset($context['OverviewToYears']) ? $context['OverviewToYears'] : null));
        echo "
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</span>&nbsp;
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div id=\"LimitDates2\">
\t\t\t\t\t\t\t\t<img style=\"float: left;\" src=\"images/nodejoin.gif\"/>
\t\t\t\t\t\t\t\t<span id=customDate7 style=\"float : left; display:block; margin-top:2px;\">&nbsp;
\t\t\t\t\t\t\t\t";
        // line 378
        echo getLang("EventDateLimitOption2Info");
        echo "\t\t\t\t\t\t\t\t<select name=\"Calendar2[From][Day]\" class=\"\" style=\"margin-bottom:3px\">
\t\t\t\t\t\t\t\t\t";
        // line 380
        echo twig_safe_filter((isset($context['OverviewFromDays']) ? $context['OverviewFromDays'] : null));
        echo "
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t<select name=\"Calendar2[From][Mth]\" class=\"\" style=\"margin-bottom:3px\">
\t\t\t\t\t\t\t\t\t";
        // line 383
        echo twig_safe_filter((isset($context['OverviewFromMonths']) ? $context['OverviewFromMonths'] : null));
        echo "
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t<select name=\"Calendar2[From][Yr]\" class=\"\" style=\"margin-bottom:3px\">
\t\t\t\t\t\t\t\t\t";
        // line 386
        echo twig_safe_filter((isset($context['OverviewFromYears']) ? $context['OverviewFromYears'] : null));
        echo "
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</span>&nbsp;
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div id=\"LimitDates3\">
\t\t\t\t\t\t\t\t<img style=\"float: left;\" src=\"images/nodejoin.gif\"/>
\t\t\t\t\t\t\t\t<span id=customDate7 style=\"float : left; display:block; margin-top:2px;\">&nbsp;
\t\t\t\t\t\t\t\t";
        // line 393
        echo getLang("EventDateLimitOption3Info");
        echo "\t\t\t\t\t\t\t\t<select name=\"Calendar3[To][Day]\" class=\"\" style=\"margin-bottom:3px\">
\t\t\t\t\t\t\t\t\t";
        // line 395
        echo twig_safe_filter((isset($context['OverviewToDays']) ? $context['OverviewToDays'] : null));
        echo "
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t<select name=\"Calendar3[To][Mth]\" class=\"\" style=\"margin-bottom:3px\">
\t\t\t\t\t\t\t\t\t";
        // line 398
        echo twig_safe_filter((isset($context['OverviewToMonths']) ? $context['OverviewToMonths'] : null));
        echo "
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t<select name=\"Calendar3[To][Yr]\" class=\"\" style=\"margin-bottom:3px\">
\t\t\t\t\t\t\t\t\t";
        // line 401
        echo twig_safe_filter((isset($context['OverviewToYears']) ? $context['OverviewToYears'] : null));
        echo "
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</span>&nbsp;
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t </table>
\t\t\t</div> <!-- End event/delivery date -->

\t\t\t<!-- Start download file -->
\t\t\t<div id=\"div2\" style=\"padding-top: 10px;\">
\t\t\t\t<div style=\"padding-bottom:5px\">";
        // line 412
        echo getLang("ProductDownloadIntro");
        echo "</div>
\t\t\t\t<div id=\"DownloadStatus\"></div>
\t\t\t\t  <table class=\"Panel\">
\t\t\t\t\t<tr id=\"ExistingDownloads\" style=\"display: ";
        // line 415
        echo twig_safe_filter((isset($context['DisplayDownloaadGrid']) ? $context['DisplayDownloaadGrid'] : null));
        echo ";\">
\t\t\t\t\t\t<td style=\"padding-top: 5px;\" colspan=\"2\" >
\t\t\t\t\t\t\t<table class=\"GridPanel\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" id=\"ExistingDownloadsGrid\" style=\"width:100%;\">
\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t<tr class=\"Heading3\">
\t\t\t\t\t\t\t\t\t\t<td align=\"center\">&nbsp;</td>
\t\t\t\t\t\t\t\t\t\t<td>";
        // line 421
        echo getLang("FileName");
        echo "</td>
\t\t\t\t\t\t\t\t\t\t<td align=\"right\" nowrap=\"nowrap\">";
        // line 422
        echo getLang("FileSize");
        echo "</td>
\t\t\t\t\t\t\t\t\t\t<td align=\"right\"><span onmouseover=\"ShowQuickHelp(this, '";
        // line 423
        echo getLang("Downloads");
        echo "', '";
        echo getLang("DownloadsHelp");
        echo "');\" onmouseout=\"HideQuickHelp(this);\" class=\"HelpText\">";
        echo getLang("Downloads");
        echo "</span></td>
\t\t\t\t\t\t\t\t\t\t<td nowrap=\"nowrap\">";
        // line 424
        echo getLang("MaximumDownloads");
        echo "</td>
\t\t\t\t\t\t\t\t\t\t<td nowrap=\"nowrap\">";
        // line 425
        echo getLang("ExpiresAfterHeader");
        echo "</td>
\t\t\t\t\t\t\t\t\t\t<td>";
        // line 426
        echo getLang("Action");
        echo "</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t";
        // line 430
        echo twig_safe_filter((isset($context['DownloadsGrid']) ? $context['DownloadsGrid'] : null));
        echo "
\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr id=\"DownloadUploadGap\" style=\"display: ";
        // line 435
        echo twig_safe_filter((isset($context['DisplayDownloadUploadGap']) ? $context['DisplayDownloadUploadGap'] : null));
        echo "\">
\t\t\t\t\t\t<td class=\"Sep\" colspan=\"2\">&nbsp;</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr style=\"display: ";
        // line 438
        echo twig_safe_filter((isset($context['DisplayDownloadUploadHeading']) ? $context['DisplayDownloadUploadHeading'] : null));
        echo "\">
\t\t\t\t\t\t<td class=\"Heading2\" id=\"DownloadUploadHeading\" colspan=\"2\">";
        // line 439
        echo getLang("DigitalDownloadUploadHeading");
        echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tbody id=\"NewDownload\" style=\"display: ";
        // line 441
        echo twig_safe_filter((isset($context['DisplayNewDownload']) ? $context['DisplayNewDownload'] : null));
        echo "\">
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 444
        echo getLang("DownloadDescription");
        echo ":
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"downdescription\" id=\"DownloadDescription\" class=\"Field200\" />
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr id=\"EditDownload\" style=\"display: none;\">
\t\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 452
        echo getLang("EditExistingDownload");
        echo ":
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td id=\"EditDownloadFile\">&nbsp;
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr id=\"NewDownloadUpload\">
\t\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t\t<span class=\"Required\">*</span>&nbsp;";
        // line 460
        echo getLang("UploadNewDownload");
        echo ":
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"downloadid\" id=\"CurrentDownloadId\" value=\"\" />
\t\t\t\t\t\t\t\t<div id=\"StatusUploading\" style=\"display: none;\">
\t\t\t\t\t\t\t\t\t<input type=\"button\" class=\"SmallButton\" disabled=\"disabled\" value=\"";
        // line 465
        echo getLang("SavingDownload");
        echo "\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<label><input id=\"ProductImportUseUpload\" type=\"radio\" name=\"useserver\" value=\"0\" checked=\"checked\" onclick=\"ToggleSource();\" /> ";
        // line 467
        echo getLang("ImportFileUpload");
        echo " ";
        echo getLang("MaxUploadSize");
        echo "</label>
\t\t\t\t\t\t\t\t<div id=\"StatusNormal\">
\t\t\t\t\t\t\t\t\t<input type=\"file\" class=\"Field\" name=\"newdownload\" id=\"NewDownloadFile\" />
\t\t\t\t\t\t\t\t\t<span id=\"EditDownloadButtons\" style=\"display: none;\">
\t\t\t\t\t\t\t\t\t\t<input type=\"button\" value=\"";
        // line 471
        echo getLang("SaveDownload");
        echo "\" onclick=\"saveDownload();\" class=\"SmallButton\" style=\"width: 90px;\" />
\t\t\t\t\t\t\t\t\t\t<input type=\"button\" value=\"";
        // line 472
        echo getLang("CancelEdit");
        echo "\" onclick=\"cancelDownloadEdit();\" class=\"SmallButton\" style=\"width: 60px\" />
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<span style=\"font-size: 11px; font-style: italic;\">";
        // line 475
        echo getLang("MaxUploadSize");
        echo "</span>
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<label><input id=\"ProductImportUseServer\" type=\"radio\" name=\"useserver\" value=\"1\" onclick=\"ToggleSource();\" /> ";
        // line 477
        echo getLang("ImportProductFileServer");
        echo "</label>
\t\t\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('i1');\" onmouseover=\"ShowHelp('i1', '";
        // line 478
        echo getLang("ImportProductFileServer");
        echo "', '";
        echo getLang("ImportProductFileServerDesc");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t\t\t<div style=\"display: none;\" id=\"i1\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div id=\"ProductImportServerField\" style=\"margin-left: 25px; display: none;\">
\t\t\t\t\t\t\t\t\t<select name=\"serverfile\" id=\"ServerFile\" class=\"Field250\">
\t\t\t\t\t\t\t\t\t\t<option value=\"\">";
        // line 483
        echo getLang("ImportChooseFile");
        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
        // line 484
        echo twig_safe_filter((isset($context['ServerFiles']) ? $context['ServerFiles'] : null));
        echo "
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div id=\"ProductImportServerNoList\" style=\"margin: 5px 0 0 25px; display: none; font-style: italic;\" class=\"Field500\">
\t\t\t\t\t\t\t\t\t";
        // line 488
        echo getLang("FieldNoServerFilesProductDownloads");
        echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<br/>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 495
        echo getLang("ExpiresAfter");
        echo ":
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"downexpiresafter\" id=\"DownloadExpiresAfter\" class=\"Field40\" />
\t\t\t\t\t\t\t\t<select name=\"downloadexpiresrange\" id=\"DownloadExpiresRange\">
\t\t\t\t\t\t\t\t\t<option value=\"days\">";
        // line 500
        echo getLang("RangeDays");
        echo "</option>
\t\t\t\t\t\t\t\t\t<option value=\"weeks\">";
        // line 501
        echo getLang("RangeWeeks");
        echo "</option>
\t\t\t\t\t\t\t\t\t<option value=\"months\">";
        // line 502
        echo getLang("RangeMonths");
        echo "</option>
\t\t\t\t\t\t\t\t\t<option value=\"years\">";
        // line 503
        echo getLang("RangeYears");
        echo "</option>
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('dlexpires');\" onmouseover=\"ShowHelp('dlexpires', '";
        // line 505
        echo getLang("ExpiresAfter");
        echo "', '";
        echo getLang("ExpiresAfterHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t\t<div style=\"display:none\" id=\"dlexpires\"></div>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 511
        echo getLang("MaximumDownloads");
        echo ":
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"downmaxdownloads\" id=\"DownloadMaxDownloads\" class=\"Field40\" />
\t\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('dldownloads');\" onmouseover=\"ShowHelp('dldownloads', '";
        // line 515
        echo getLang("MaximumDownloads");
        echo "', '";
        echo getLang("MaximumDownloadsHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t\t<div style=\"display:none\" id=\"dldownloads\"></div>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td clas=\"FieldLabel\">&nbsp;</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<input type=\"button\" value=\"";
        // line 522
        echo getLang("AttachFile");
        echo "\" onclick=\"attachFile();\" class=\"FormButton Field120\" />
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>&nbsp;</td>
\t\t\t\t\t\t\t<td>

\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t</tbody>
\t\t\t\t  </table>
\t\t\t</div> <!-- End download file -->

\t\t\t<!-- Start inventory tracking -->
\t\t\t<div id=\"div3\" style=\"padding-top: 10px;\">
\t\t\t\t<div style=\"padding-bottom:5px\">";
        // line 537
        echo getLang("InventoryTrackingIntro");
        echo "</div>
\t\t\t\t  <table class=\"Panel\" id=\"tabInventory\">
\t\t\t\t\t<tr>
\t\t\t\t\t  <td class=\"Heading2\" colspan=2>";
        // line 540
        echo getLang("InventoryTracking");
        echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 544
        echo getLang("TrackingMethod");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"radio\" id=\"prodInvTrack_0\" name=\"prodInvTrack\" value=\"0\" onclick=\"ToggleProductInventoryOptions(false); toggleVariationInventoryColumns();\" ";
        // line 547
        echo twig_safe_filter((isset($context['InvTrack_0']) ? $context['InvTrack_0'] : null));
        echo "> <label for=\"prodInvTrack_0\">";
        echo getLang("DoNotTrackInventory");
        echo "</label>
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d23');\" onmouseover=\"ShowHelp('d23', '";
        // line 548
        echo getLang("TrackingMethod");
        echo "', '";
        echo getLang("TrackingMethodHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d23\"></div><br />
\t\t\t\t\t\t\t<input type=\"radio\" id=\"prodInvTrack_1\" name=\"prodInvTrack\" value=\"1\" onclick=\"ToggleProductInventoryOptions(true); toggleVariationInventoryColumns();\" ";
        // line 550
        echo twig_safe_filter((isset($context['InvTrack_1']) ? $context['InvTrack_1'] : null));
        echo "> <label for=\"prodInvTrack_1\">";
        echo getLang("TrackInvForProduct");
        echo "</label><br />
\t\t\t\t\t\t\t<div id=\"divTrackProd\" style=\"display: ";
        // line 551
        echo twig_safe_filter((isset($context['HideProductInventoryOptions']) ? $context['HideProductInventoryOptions'] : null));
        echo "; padding-left:30pt; padding-top:3pt; padding-bottom:3pt\">
\t\t\t\t\t\t\t\t<table border=\"0\">
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t";
        // line 555
        echo getLang("CurrentStockLevel");
        echo ":
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"prodCurrentInv\" name=\"prodCurrentInv\" class=\"Field50\" value=\"";
        // line 558
        echo twig_safe_filter((isset($context['CurrentStockLevel']) ? $context['CurrentStockLevel'] : null));
        echo "\">
\t\t\t\t\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d24');\" onmouseover=\"ShowHelp('d24', '";
        // line 559
        echo getLang("CurrentStockLevel");
        echo "', '";
        echo getLang("CurrentStockLevelHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d24\"></div>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t";
        // line 565
        echo getLang("LowStockLevel1");
        echo ":
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"prodLowInv\" name=\"prodLowInv\" class=\"Field50\" value=\"";
        // line 568
        echo twig_safe_filter((isset($context['LowStockLevel']) ? $context['LowStockLevel'] : null));
        echo "\">
\t\t\t\t\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d25');\" onmouseover=\"ShowHelp('d25', '";
        // line 569
        echo getLang("LowStockLevel");
        echo "', '";
        echo getLang("LowStockLevelHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d25\"></div>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"radio\" id=\"prodInvTrack_2\" name=\"prodInvTrack\" value=\"2\" onclick=\"ToggleProductInventoryOptions(false); toggleVariationInventoryColumns();\" ";
        // line 576
        echo twig_safe_filter((isset($context['InvTrack_2']) ? $context['InvTrack_2'] : null));
        echo "> <label for=\"prodInvTrack_2\">";
        echo getLang("TrackInvForProductOpt");
        echo "</label>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t </table>
\t\t\t</div><!-- End inventory tracking -->

\t\t\t<!-- Start product variations -->
\t\t\t<div id=\"div4\" style=\"padding-top: 10px;\">
\t\t\t\t<div style=\"padding-bottom:5px\">";
        // line 584
        echo getLang("ProductVariationsIntro");
        echo "</div>
\t\t\t\t  <table class=\"Panel\" id=\"tabInventory\">
\t\t\t\t\t<tr>
\t\t\t\t\t  <td class=\"Heading2\" colspan=2>";
        // line 587
        echo getLang("ProductVariationOptions");
        echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 591
        echo getLang("ThisProduct");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td style=\"padding-bottom:10px\">
\t\t\t\t\t\t\t<input type=\"radio\" name=\"useProdVariation\" id=\"useProdVariationNo\" value=\"0\" ";
        // line 594
        echo twig_safe_filter((isset($context['IsNoVariation']) ? $context['IsNoVariation'] : null));
        echo " /> <label for=\"useProdVariationNo\">";
        echo getLang("ProductWillNotUseVariation");
        echo "</label><br />
\t\t\t\t\t\t\t<input type=\"radio\" name=\"useProdVariation\" id=\"useProdVariationYes\" value=\"1\" ";
        // line 595
        echo twig_safe_filter((isset($context['IsYesVariation']) ? $context['IsYesVariation'] : null));
        echo " ";
        echo twig_safe_filter((isset($context['VariationDisabled']) ? $context['VariationDisabled'] : null));
        echo " /> <label for=\"useProdVariationYes\" id=\"variationLabel\" style=\"color:";
        echo twig_safe_filter((isset($context['VariationColor']) ? $context['VariationColor'] : null));
        echo "\">";
        echo getLang("ProductWillUseVariation");
        echo "</label>
\t\t\t\t\t\t\t<span style=\"display:";
        // line 596
        echo twig_safe_filter((isset($context['HideVariationList']) ? $context['HideVariationList'] : null));
        echo ";\" id=\"variationList\">
\t\t\t\t\t\t\t\t<select class=\"Field200\" name=\"variationId\" id=\"variationId\">
\t\t\t\t\t\t\t\t\t<option value=\"\">";
        // line 598
        echo getLang("ChooseAVariation");
        echo "</option>
\t\t\t\t\t\t\t\t\t";
        // line 599
        echo twig_safe_filter((isset($context['VariationOptions']) ? $context['VariationOptions'] : null));
        echo "
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t<div style=\"padding-left:20px\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"prodOptionsRequired\" id=\"prodOptionsRequired\" ";
        // line 602
        echo twig_safe_filter((isset($context['OptionsRequired']) ? $context['OptionsRequired'] : null));
        echo " value=\"ON\" /> <label for=\"prodOptionsRequired\">";
        echo getLang("ProductOptionRequired");
        echo "</label>
\t\t\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('dforceopt');\" onmouseover=\"ShowHelp('dforceopt', '";
        // line 603
        echo getLang("ProductOptionRequiredTitle");
        echo "', '";
        echo getLang("ProductOptionRequiredHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t\t\t<div style=\"display:none\" id=\"dforceopt\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t</table>
\t\t\t\t<div style=\"display:";
        // line 610
        echo twig_safe_filter((isset($context['HideVariationCombinationList']) ? $context['HideVariationCombinationList'] : null));
        echo "; margin-bottom:5px\" class=\"GridContainer\" id=\"variationCombinationsList\">
\t\t\t\t\t";
        // line 611
        echo twig_safe_filter((isset($context['VariationCombinationList']) ? $context['VariationCombinationList'] : null));
        echo "
\t\t\t\t</div>
\t\t\t</div><!-- End product variations -->

\t\t\t<!-- Start custom fields -->
\t\t\t<div id=\"div5\" style=\"padding-top: 10px;\">
\t\t\t\t<div style=\"padding-bottom:5px\">";
        // line 617
        echo getLang("CustomFieldsIntro");
        echo "</div>
\t\t\t\t  <table class=\"Panel\">
\t\t\t\t\t<tr>
\t\t\t\t\t  <td class=\"Heading2\" colspan=2>";
        // line 620
        echo getLang("CustomFields");
        echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t  </table>
\t\t\t\t  <table class=\"Panel\" id=\"CustomFieldsContainer\">
\t\t\t\t  <tbody>
\t\t\t\t\t";
        // line 625
        echo twig_safe_filter((isset($context['CustomFields']) ? $context['CustomFields'] : null));
        echo "
\t\t\t\t  </tbody>
\t\t\t\t  </table>
\t\t\t\t  <div style=\"padding:10px 0px 10px 5px\">";
        // line 628
        echo getLang("ConfigurableFieldsIntro");
        echo "</div>
\t\t\t\t\t<table width=\"100%\" class=\"Panel\">
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"Heading2\" colspan=\"4\">";
        // line 631
        echo getLang("ConfigurableFields");
        echo "</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t</table>
\t\t\t\t\t<input type=\"hidden\" id=\"FieldLastKey\" value=\"";
        // line 634
        echo twig_safe_filter((isset($context['FieldLastKey']) ? $context['FieldLastKey'] : null));
        echo "\" />
\t\t\t\t\t<table width=\"100%\" class=\"Panel\" id=\"ProductFieldsContainer\">
\t\t\t\t\t\t";
        // line 636
        echo twig_safe_filter((isset($context['ProductFields']) ? $context['ProductFields'] : null));
        echo "
\t\t\t\t\t</table>
\t\t\t</div><!-- End custom fields -->

\t\t\t<!-- Start related products -->
\t\t\t<div id=\"div6\" style=\"padding-top: 10px;\">
\t\t\t\t<div style=\"padding-bottom:5px\">";
        // line 642
        echo getLang("RelatedProductsIntro");
        echo "</div>
\t\t\t\t  <table width=\"100%\" class=\"Panel\">
\t\t\t\t\t<tr>
\t\t\t\t\t  <td class=\"Heading2\" colspan=2>";
        // line 645
        echo getLang("RelatedProducts");
        echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 649
        echo getLang("RelatedProducts");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"prodRelatedAuto\" name=\"prodRelatedAuto\" value=\"1\" onclick=\"toggle_related_auto(this.checked)\" ";
        // line 652
        echo twig_safe_filter((isset($context['IsProdRelatedAuto']) ? $context['IsProdRelatedAuto'] : null));
        echo "> <label for=\"prodRelatedAuto\">";
        echo getLang("ProductRelatedOptionsAutomatically");
        echo "</label>
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d34');\" onmouseover=\"ShowHelp('d34', '";
        // line 653
        echo getLang("RelatedProducts");
        echo "', '";
        echo getLang("RelatedProductsHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d34\"></div>
\t\t\t\t\t\t\t<blockquote id=\"relatedProductsBoxes\">
\t\t\t\t\t\t\t\t<select id=\"relCategory\" size=\"10\" name=\"relCategory\" class=\"Field400\" onchange=\"GetProducts(this)\">
\t\t\t\t\t\t\t\t\t";
        // line 657
        echo twig_safe_filter((isset($context['RelatedCategoryOptions']) ? $context['RelatedCategoryOptions'] : null));
        echo "
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t<br />
\t\t\t\t\t\t\t\t<select size=\"10\" id=\"relProducts\" name=\"relProducts\" onDblClick=\"AddRelatedProduct(this)\" class=\"Field400\">
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t<br />
\t\t\t\t\t\t\t\t* <em>";
        // line 663
        echo getLang("DoubleClickToAdd");
        echo "</em><br />
\t\t\t\t\t\t\t\t<select multiple size=\"5\" id=\"related\" name=\"prodRelatedProducts[]\" onDblClick=\"RemoveRelatedProduct(this)\" class=\"Field400\">";
        // line 664
        echo twig_safe_filter((isset($context['RelatedProductOptions']) ? $context['RelatedProductOptions'] : null));
        echo "</select><br />
\t\t\t\t\t\t\t\t* <em>";
        // line 665
        echo getLang("DoubleClickToRemove");
        echo "</em><br />
\t\t\t\t\t\t\t</blockquote>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t </table>
\t\t\t\t <br />
\t\t\t\t<div style=\"padding-bottom:5px\">";
        // line 671
        echo getLang("OtherDetailsIntro");
        echo "</div>
\t\t\t\t<table width=\"100%\" class=\"Panel\">
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"Heading2\" colspan=\"2\">";
        // line 674
        echo getLang("OtherDetails");
        echo "</td>
\t\t\t\t\t</tr>
                    <tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 678
        echo getLang("ProductSubTitle");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t                        <input type=\"text\" id=\"prodSubTitle\" name=\"prodSubTitle\" class=\"Field400\" value=\"";
        // line 681
        echo twig_safe_filter((isset($context['ProdSubTitle']) ? $context['ProdSubTitle'] : null));
        echo "\">
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d18');\" onmouseover=\"ShowHelp('templatelayout', '";
        // line 682
        echo getLang("ProductSubTitle");
        echo "', '";
        echo getLang("ProductSubTitleHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d18\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
                    <tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 688
        echo getLang("ProductQuote");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<textarea id=\"prodQuote\" name=\"prodQuote\" class=\"Field400\" rows=\"4\">";
        // line 691
        echo twig_safe_filter((isset($context['ProdQuote']) ? $context['ProdQuote'] : null));
        echo "</textarea>
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d18');\" onmouseover=\"ShowHelp('templatelayout', '";
        // line 692
        echo getLang("ProductQuote");
        echo "', '";
        echo getLang("ProductQuoteHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d18\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
                    <tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 698
        echo getLang("ProductQuoteAuthor");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t                        <input type=\"text\" id=\"prodQuoteAuthor\" name=\"prodQuoteAuthor\" class=\"Field400\" value=\"";
        // line 701
        echo twig_safe_filter((isset($context['ProdQuoteAuthor']) ? $context['ProdQuoteAuthor'] : null));
        echo "\">
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d18');\" onmouseover=\"ShowHelp('templatelayout', '";
        // line 702
        echo getLang("ProductQuoteAuthor");
        echo "', '";
        echo getLang("ProductQuoteAuthorHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d18\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 708
        echo getLang("ProductWarranty");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<textarea id=\"prodWarranty\" name=\"prodWarranty\" class=\"Field400\" rows=\"5\">";
        // line 711
        echo twig_safe_filter((isset($context['ProdWarranty']) ? $context['ProdWarranty'] : null));
        echo "</textarea>
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d18');\" onmouseover=\"ShowHelp('d18', '";
        // line 712
        echo getLang("ProductWarranty");
        echo "', '";
        echo getLang("ProductWarrantyHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d18\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 718
        echo getLang("TemplateLayoutFile");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<select name=\"prodlayoutfile\" id=\"prodlayoutfile\" class=\"Field400\">
\t\t\t\t\t\t\t\t";
        // line 722
        echo twig_safe_filter((isset($context['LayoutFiles']) ? $context['LayoutFiles'] : null));
        echo "
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('templatelayout');\" onmouseover=\"ShowHelp('templatelayout', '";
        // line 724
        echo getLang("TemplateLayoutFile");
        echo "', '";
        echo getLang("ProductTemplateLayoutFileHelp1");
        echo twig_safe_filter((isset($context['template']) ? $context['template'] : null));
        echo getLang("ProductTemplateLayoutFileHelp2");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"templatelayout\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 730
        echo getLang("BrandName");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<select name=\"brandbox\" id=\"brandbox\" class=\"Field200\">
\t\t\t\t\t\t\t\t<option value=\"\">";
        // line 734
        echo getLang("ChooseAnExistingBrand");
        echo "</option>
\t\t\t\t\t\t\t\t";
        // line 735
        echo twig_safe_filter((isset($context['BrandNameOptions']) ? $context['BrandNameOptions'] : null));
        echo "
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t<span style=\"";
        // line 737
        echo twig_safe_filter((isset($context['HideAddBrandBox']) ? $context['HideAddBrandBox'] : null));
        echo "\">
\t\t\t\t\t\t\t\t";
        // line 738
        echo getLang("OrCreateANewBrand");
        echo ":
\t\t\t\t\t\t\t\t<input type=\"text\" id=\"brandname\" name=\"brandname\" class=\"Field100\" style=\"width:120px\" value=\"";
        // line 739
        echo twig_safe_filter((isset($context['BrandName']) ? $context['BrandName'] : null));
        echo "\">
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d33');\" onmouseover=\"ShowHelp('d33', '";
        // line 741
        echo getLang("BrandName");
        echo "', '";
        echo twig_safe_filter((isset($context['BrandNameProdHelp']) ? $context['BrandNameProdHelp'] : null));
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d33\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 747
        echo getLang("ProductUPC");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"text\" id=\"prodUPC\" name=\"prodUPC\" class=\"Field400\" value=\"";
        // line 750
        echo twig_safe_filter((isset($context['ProdUPC']) ? $context['ProdUPC'] : null));
        echo "\">
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d28');\" onmouseover=\"ShowHelp('d28', '";
        // line 751
        echo getLang("ProductUPC");
        echo "', '";
        echo getLang("ProductUPCHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d28\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 757
        echo getLang("SearchKeywords");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"text\" id=\"prodSearchKeywords\" name=\"prodSearchKeywords\" class=\"Field400\" value=\"";
        // line 760
        echo twig_safe_filter((isset($context['ProdSearchKeywords']) ? $context['ProdSearchKeywords'] : null));
        echo "\">
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d19');\" onmouseover=\"ShowHelp('d19', '";
        // line 761
        echo getLang("SearchKeywords");
        echo "', '";
        echo getLang("SearchKeywordsHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d19\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 767
        echo getLang("ProductTags");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"text\" id=\"prodTags\" name=\"prodTags\" class=\"Field400\" value=\"";
        // line 770
        echo twig_safe_filter((isset($context['ProdTags']) ? $context['ProdTags'] : null));
        echo "\">
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d19');\" onmouseover=\"ShowHelp('d19', '";
        // line 771
        echo getLang("ProductTags");
        echo "', '";
        echo getLang("ProductTagsHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d19\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 777
        echo getLang("Availability");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"text\" id=\"prodAvailability\" name=\"prodAvailability\" class=\"Field400\" value=\"";
        // line 780
        echo twig_safe_filter((isset($context['ProdAvailability']) ? $context['ProdAvailability'] : null));
        echo "\">
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d27');\" onmouseover=\"ShowHelp('d27', '";
        // line 781
        echo getLang("Availability");
        echo "', '";
        echo getLang("AvailabilityHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d27\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 787
        echo getLang("Visible");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"prodVisible\" name=\"prodVisible\" value=\"1\" ";
        // line 790
        echo twig_safe_filter((isset($context['ProdVisible']) ? $context['ProdVisible'] : null));
        echo "> <label for=\"prodVisible\">";
        echo getLang("YesProductVisible");
        echo "</label>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 795
        echo getLang("FeaturedProduct");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<div style=\"";
        // line 798
        echo twig_safe_filter((isset($context['HideStoreFeatured']) ? $context['HideStoreFeatured'] : null));
        echo "\">
\t\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"prodFeatured\" name=\"prodFeatured\" value=\"1\" ";
        // line 799
        echo twig_safe_filter((isset($context['ProdFeatured']) ? $context['ProdFeatured'] : null));
        echo "> <label for=\"prodFeatured\">";
        echo getLang("YesProductFeatured");
        echo "</label>
\t\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d11');\" onmouseover=\"ShowHelp('d11', '";
        // line 800
        echo getLang("FeaturedProduct");
        echo "', '";
        echo getLang("FeaturedProductHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d11\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div style=\"";
        // line 803
        echo twig_safe_filter((isset($context['HideVendorFeatured']) ? $context['HideVendorFeatured'] : null));
        echo "\" id=\"vendorFeaturedToggle\">
\t\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"prodvendorfeatured\" name=\"prodvendorfeatured\" value=\"1\" ";
        // line 804
        echo twig_safe_filter((isset($context['ProdVendorFeatured']) ? $context['ProdVendorFeatured'] : null));
        echo "> <label for=\"prodvendorfeatured\">";
        echo getLang("YesProductVendorFeatured");
        echo "</label>
\t\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('prodvendorfeaturedhelp');\" onmouseover=\"ShowHelp('prodvendorfeaturedhelp', '";
        // line 805
        echo getLang("VendorFeaturedProduct");
        echo "', '";
        echo getLang("VendorFeaturedProductHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\" />
\t\t\t\t\t\t\t\t<div style=\"display:none\" id=\"prodvendorfeaturedhelp\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>

\t\t\t\t\t<tr class=\"HideOnDigitalProduct\">
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 813
        echo getLang("GiftWrapping");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<label><input type=\"radio\" onclick=\"ToggleGiftWrapping(this.value)\" name=\"prodwraptype\" value=\"default\" ";
        // line 816
        echo twig_safe_filter((isset($context['WrappingOptionsDefaultChecked']) ? $context['WrappingOptionsDefaultChecked'] : null));
        echo " /> ";
        echo getLang("ProductGiftWrappingDefault");
        echo "</label>
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('prodwrappinghelp');\" onmouseover=\"ShowHelp('prodwrappinghelp', '";
        // line 817
        echo getLang("GiftWrapping");
        echo "', '";
        echo getLang("GiftWrappingHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"prodwrappinghelp\"></div><br />
\t\t\t\t\t\t\t<label style=\"display: black;\"><input type=\"radio\" onclick=\"ToggleGiftWrapping(this.value)\" name=\"prodwraptype\" value=\"none\" ";
        // line 819
        echo twig_safe_filter((isset($context['WrappingOptionsNoneChecked']) ? $context['WrappingOptionsNoneChecked'] : null));
        echo " /> ";
        echo getLang("ProductGiftWrappingNone");
        echo "</label>
\t\t\t\t\t\t\t<label style=\"display: block;\"><input type=\"radio\" onclick=\"ToggleGiftWrapping(this.value)\" name=\"prodwraptype\" id=\"prodwraptype_custom\" value=\"custom\" ";
        // line 820
        echo twig_safe_filter((isset($context['WrappingOptionsCustomChecked']) ? $context['WrappingOptionsCustomChecked'] : null));
        echo " /> ";
        echo getLang("ProductGiftWrappingCustom");
        echo "</label>
\t\t\t\t\t\t\t<div style=\"";
        // line 821
        echo twig_safe_filter((isset($context['HideGiftWrappingOptions']) ? $context['HideGiftWrappingOptions'] : null));
        echo "\" id=\"GiftWrapOptions\">
\t\t\t\t\t\t\t\t<img src=\"images/nodejoin.gif\" alt=\"\" style=\"float: left; margin-right: 10px;\" />
\t\t\t\t\t\t\t\t<select name=\"prodwrapoptions[]\" id=\"prodwrapoptions\" multiple=\"multiple\" size=\"10\" class=\"Field300 ISSelectReplacement\">
\t\t\t\t\t\t\t\t\t";
        // line 824
        echo twig_safe_filter((isset($context['WrappingOptions']) ? $context['WrappingOptions'] : null));
        echo "
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>

\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 832
        echo getLang("SortOrder");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"text\" id=\"prodSortOrder\" name=\"prodSortOrder\" class=\"Field80\" style=\"width:30px\" value=\"";
        // line 835
        echo twig_safe_filter((isset($context['ProdSortOrder']) ? $context['ProdSortOrder'] : null));
        echo "\">
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('d20');\" onmouseover=\"ShowHelp('d20', '";
        // line 836
        echo getLang("SortOrder");
        echo "', '";
        echo getLang("SortOrderHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"d20\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t<span class=\"Required\">*</span>&nbsp;";
        // line 842
        echo getLang("ProductCondition");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<select name=\"prodCondition\" id=\"prodCondition\">
\t\t\t\t\t\t\t\t<option value=\"New\" ";
        // line 846
        echo twig_safe_filter((isset($context['ProdConditionNewSelected']) ? $context['ProdConditionNewSelected'] : null));
        echo ">";
        echo getLang("ConditionNew");
        echo "</option>
\t\t\t\t\t\t\t\t<option value=\"Used\" ";
        // line 847
        echo twig_safe_filter((isset($context['ProdConditionUsedSelected']) ? $context['ProdConditionUsedSelected'] : null));
        echo ">";
        echo getLang("ConditionUsed");
        echo "</option>
\t\t\t\t\t\t\t\t<option value=\"Refurbished\" ";
        // line 848
        echo twig_safe_filter((isset($context['ProdConditionRefurbishedSelected']) ? $context['ProdConditionRefurbishedSelected'] : null));
        echo ">";
        echo getLang("ConditionRefurbished");
        echo "</option>
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('dcond');\" onmouseover=\"ShowHelp('dcond', '";
        // line 850
        echo getLang("ProductCondition");
        echo "', '";
        echo getLang("ProductConditionHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"dcond\"></div>
\t\t\t\t\t\t\t<label><input type=\"checkbox\" name=\"prodShowCondition\" id=\"prodShowCondition\" value=\"1\" ";
        // line 852
        echo twig_safe_filter((isset($context['ProdShowCondition']) ? $context['ProdShowCondition'] : null));
        echo " />";
        echo getLang("ShowConditionOnProduct");
        echo "</label>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 857
        echo getLang("ProductMinimumQuantity");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"text\" id=\"prodminqty\" name=\"prodminqty\" class=\"Field50\" value=\"";
        // line 860
        echo twig_escape_filter($this->env, (isset($context['prodminqty']) ? $context['prodminqty'] : null), "1");
        echo "\" />
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('ProductMinimumQuantityHelp');\" onmouseover=\"ShowHelp('ProductMinimumQuantityHelp', '";
        // line 861
        echo getLang("ProductMinimumQuantity");
        echo "', '";
        echo getLang("ProductMinimumQuantityHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\" />
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"ProductMinimumQuantityHelp\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 867
        echo getLang("ProductMaximumQuantity");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"text\" id=\"prodmaxqty\" name=\"prodmaxqty\" class=\"Field50\" value=\"";
        // line 870
        echo twig_escape_filter($this->env, (isset($context['prodmaxqty']) ? $context['prodmaxqty'] : null), "1");
        echo "\" />
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('ProductMaximumQuantityHelp');\" onmouseover=\"ShowHelp('ProductMaximumQuantityHelp', '";
        // line 871
        echo getLang("ProductMaximumQuantity");
        echo "', '";
        echo getLang("ProductMaximumQuantityHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\" />
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"ProductMaximumQuantityHelp\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"Heading2\" colspan=\"2\">";
        // line 876
        echo getLang("SearchEngineOptimization");
        echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 880
        echo getLang("PageTitle");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"text\" id=\"prodPageTitle\" name=\"prodPageTitle\" class=\"Field400\" value=\"";
        // line 883
        echo twig_safe_filter((isset($context['ProdPageTitle']) ? $context['ProdPageTitle'] : null));
        echo "\" />
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('pagetitlehelp');\" onmouseover=\"ShowHelp('pagetitlehelp', '";
        // line 884
        echo getLang("PageTitle");
        echo "', '";
        echo getLang("ProdPageTitleHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"pagetitlehelp\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 890
        echo getLang("MetaKeywords");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"text\" id=\"prodMetaKeywords\" name=\"prodMetaKeywords\" class=\"Field400\" value=\"";
        // line 893
        echo twig_safe_filter((isset($context['ProdMetaKeywords']) ? $context['ProdMetaKeywords'] : null));
        echo "\" />
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('metataghelp');\" onmouseover=\"ShowHelp('metataghelp', '";
        // line 894
        echo getLang("MetaKeywords");
        echo "', '";
        echo getLang("MetaKeywordsHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"metataghelp\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 900
        echo getLang("MetaDescription");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"text\" id=\"prodMetaDesc\" name=\"prodMetaDesc\" class=\"Field400\" value=\"";
        // line 903
        echo twig_safe_filter((isset($context['ProdMetaDesc']) ? $context['ProdMetaDesc'] : null));
        echo "\" />
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('metadeschelp');\" onmouseover=\"ShowHelp('metadeschelp', '";
        // line 904
        echo getLang("MetaDescription");
        echo "', '";
        echo getLang("MetaDescriptionHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"metadeschelp\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t<td></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"Heading2\" colspan=\"2\">";
        // line 912
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "FacebookOpenGraphSettings", array(), "any"), "1");
        echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 916
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "ObjectType", array(), "any"), "1");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t";
        // line 919
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "select", array("OpenGraphObjectType", (isset($context['openGraphTypes']) ? $context['openGraphTypes'] : null), (isset($context['openGraphSelectedType']) ? $context['openGraphSelectedType'] : null), array("class" => "Field100"), ), "method"), "1");
        echo "
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 924
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Title", array(), "any"), "1");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<label><input type=\"checkbox\" name=\"OpenGraphUseProductName\" id=\"OpenGraphUseProductName\" value=\"1\" ";
        // line 927
        if ((isset($context['openGraphUseProductName']) ? $context['openGraphUseProductName'] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "UseProductName", array(), "any"), "1");
        echo "</label>
\t\t\t\t\t\t\t<div class=\"NodeJoin\" ";
        // line 928
        if ((isset($context['openGraphUseProductName']) ? $context['openGraphUseProductName'] : null)) {
            echo "style=\"display: none;\"";
        }
        echo ">
\t\t\t\t\t\t\t\t<img src=\"images/nodejoin.gif\" style=\"vertical-align: middle;\" alt=\"\" />
\t\t\t\t\t\t\t\t<input type=\"text\" class=\"Field350\" name=\"OpenGraphTitle\" id=\"OpenGraphTitle\" value=\"";
        // line 930
        echo twig_escape_filter($this->env, (isset($context['openGraphTitle']) ? $context['openGraphTitle'] : null), "1");
        echo "\" />
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 936
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Description", array(), "any"), "1");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<label><input type=\"checkbox\" name=\"OpenGraphUseMetaDescription\" id=\"OpenGraphUseMetaDescription\" value=\"1\" ";
        // line 939
        if ((isset($context['openGraphUseMetaDescription']) ? $context['openGraphUseMetaDescription'] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "UseMetaDescription", array(), "any"), "1");
        echo "</label>
\t\t\t\t\t\t\t<div class=\"NodeJoin\" ";
        // line 940
        if ((isset($context['openGraphUseMetaDescription']) ? $context['openGraphUseMetaDescription'] : null)) {
            echo "style=\"display: none;\"";
        }
        echo ">
\t\t\t\t\t\t\t\t<img src=\"images/nodejoin.gif\" style=\"vertical-align: middle;\" alt=\"\" />
\t\t\t\t\t\t\t\t<input type=\"text\" class=\"Field350\" name=\"OpenGraphDescription\" id=\"OpenGraphDescription\" value=\"";
        // line 942
        echo twig_escape_filter($this->env, (isset($context['openGraphDescription']) ? $context['openGraphDescription'] : null), "1");
        echo "\" />
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 948
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Image", array(), "any"), "1");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<label><input type=\"radio\" name=\"OpenGraphUseImage\" value=\"1\" ";
        // line 951
        if ((isset($context['openGraphUseImage']) ? $context['openGraphUseImage'] : null)) {
            echo "checked=\"checked\"";
        }
        echo " />";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "UseThumbnailImage", array(), "any"), "1");
        echo "</label>
\t\t\t\t\t\t\t<br />
\t\t\t\t\t\t\t<label><input type=\"radio\" name=\"OpenGraphUseImage\" value=\"0\" ";
        // line 953
        if ((isset($context['openGraphUseImage']) ? $context['openGraphUseImage'] : null) == false) {
            echo "checked=\"checked\"";
        }
        echo " />";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "DontUseImage", array(), "any"), "1");
        echo "</label>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"Heading2\" colspan=\"2\">";
        // line 960
        echo getLang("MYOBSettings");
        echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 964
        echo getLang("MYOBAsset");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"text\" class=\"Field\" id=\"prodMYOBAsset\" name=\"prodMYOBAsset\" maxlength=\"6\" size=\"6\" value=\"";
        // line 967
        echo twig_safe_filter((isset($context['ProdMYOBAsset']) ? $context['ProdMYOBAsset'] : null));
        echo "\" />
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('myobassethelp');\" onmouseover=\"ShowHelp('myobassethelp', '";
        // line 968
        echo getLang("MYOBAsset");
        echo "', '";
        echo getLang("MYOBAssetHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"myobassethelp\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 974
        echo getLang("MYOBIncome");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"text\" class=\"Field\" id=\"prodMYOBIncome\" name=\"prodMYOBIncome\" maxlength=\"6\" size=\"6\" value=\"";
        // line 977
        echo twig_safe_filter((isset($context['ProdMYOBIncome']) ? $context['ProdMYOBIncome'] : null));
        echo "\" />
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('myobincomehelp');\" onmouseover=\"ShowHelp('myobincomehelp', '";
        // line 978
        echo getLang("MYOBIncome");
        echo "', '";
        echo getLang("MYOBIncomeHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"myobincomehelp\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 984
        echo getLang("MYOBExpense");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"text\" class=\"Field\" id=\"prodMYOBExpense\" name=\"prodMYOBExpense\" maxlength=\"6\" size=\"6\" value=\"";
        // line 987
        echo twig_safe_filter((isset($context['ProdMYOBExpense']) ? $context['ProdMYOBExpense'] : null));
        echo "\" />
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('myobexpensehelp');\" onmouseover=\"ShowHelp('myobexpensehelp', '";
        // line 988
        echo getLang("MYOBExpense");
        echo "', '";
        echo getLang("MYOBExpenseHelp");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"myobexpensehelp\"></div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"Heading2\" colspan=\"2\">";
        // line 993
        echo getLang("PeachtreeSettings");
        echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 997
        echo getLang("PeachtreeGL");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"text\" class=\"Field\" id=\"prodPeachtreeGL\" name=\"prodPeachtreeGL\" maxlength=\"20\" size=\"6\" value=\"";
        // line 1000
        echo twig_safe_filter((isset($context['ProdPeachtreeGL']) ? $context['ProdPeachtreeGL'] : null));
        echo "\" />
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"Heading2\" colspan=\"2\">";
        // line 1004
        echo getLang("ShoppingComparison");
        echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td colspan=\"2\"><p class=\"Intro\">";
        // line 1007
        echo getLang("ShoppingComparisonInstructions");
        echo "</p></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 1011
        echo getLang("ShoppingComparisonIncludeProductIn");
        echo "\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<select name=\"comparisons[]\" class=\"Field250 ISSelectReplacement\" multiple=\"multiple\" style=\"height: 108px;\">
\t\t\t\t\t\t\t\t";
        // line 1015
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_iterator_to_array((isset($context['shoppingComparisonModules']) ? $context['shoppingComparisonModules'] : null));
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
        foreach ($context['_seq'] as $context['_key'] => $context['module']) {
            echo "\t\t\t\t\t\t\t\t<option value=\"";
            // line 1016
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['module']) ? $context['module'] : null), "getId", array(), "method"), "1");
            echo "\"";
            if ($this->getAttribute((isset($context['module']) ? $context['module'] : null), "selected", array(), "any")) {
                echo " selected=\"selected\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['module']) ? $context['module'] : null), "getName", array(), "method"), "1");
            echo "</option>
\t\t\t\t\t\t\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 1017
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t";
        // line 1019
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['tooltip']) ? $context['tooltip'] : null), "tooltip", array("shoppingComparisonToolTip", "ShoppingComparisonProductToolTipTitle", "ShoppingComparisonProductToolTipContent", ), "method"), "1");
        echo "
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"Heading2\" colspan=\"2\">";
        // line 1023
        echo getLang("GoogleCheckoutSettings");
        echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 1027
        echo getLang("DisableGoogleCheckout");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"prodDisableGoogleCheckout\" value=\"0\"/>
\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"prodDisableGoogleCheckout\" id=\"prodDisableGoogleCheckout\" value=\"1\" ";
        // line 1031
        if ((isset($context['ProdDisableGoogleCheckout']) ? $context['ProdDisableGoogleCheckout'] : null) == 1) {
            echo "checked=\"checked\"";
        }
        echo " />
\t\t\t\t\t\t\t<label for=\"prodDisableGoogleCheckout\">";
        // line 1032
        echo getLang("YesDisableGoogleCheckout");
        echo "</label>
\t\t\t\t\t\t\t<img onmouseout=\"HideHelp('prodDisableGoogleCheckoutHelp');\" onmouseover=\"ShowHelp('prodDisableGoogleCheckoutHelp', '";
        // line 1033
        echo Interspire_Template_Extension::jsFilter(getLang("DisableGoogleCheckout"), "'");
        echo "', '";
        echo Interspire_Template_Extension::jsFilter(getLang("DisableGoogleCheckoutHelp"), "'");
        echo "')\" src=\"images/help.gif\" width=\"24\" height=\"16\" border=\"0\">
\t\t\t\t\t\t\t<div style=\"display:none\" id=\"prodDisableGoogleCheckoutHelp\"></div>

\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t</table>
\t\t\t</div><!-- End related products -->

\t\t\t<!-- Start discount rules -->
\t\t\t<div id=\"div7\" style=\"padding-top: 10px;\">
\t\t\t\t<div style=\"padding-bottom:5px\">";
        // line 1043
        echo getLang("DiscountRulesIntro");
        echo "</div>
\t\t\t\t<div id=\"DiscountRulesWarning\" class=\"MessageBox MessageBoxInfo\" style=\"display: ";
        // line 1044
        echo twig_safe_filter((isset($context['HideDiscountRulesWarningBox']) ? $context['HideDiscountRulesWarningBox'] : null));
        echo ";\">";
        echo twig_safe_filter((isset($context['DiscountRulesWarningText']) ? $context['DiscountRulesWarningText'] : null));
        echo "</div>
\t\t\t\t<div id=\"DiscountRulesDisplay\" style=\"display: ";
        // line 1045
        echo twig_safe_filter((isset($context['DiscountRulesWithWarning']) ? $context['DiscountRulesWithWarning'] : null));
        echo ";\">
\t\t\t\t\t<table class=\"Panel\">
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t  <td class=\"Heading2\" colspan=2>";
        // line 1048
        echo getLang("DiscountRules");
        echo "</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t</table>
\t\t\t\t\t<table class=\"Panel\" id=\"DiscountRulesContainer\">
\t\t\t\t\t<tbody>
\t\t\t\t\t\t";
        // line 1053
        echo twig_safe_filter((isset($context['DiscountRules']) ? $context['DiscountRules'] : null));
        echo "
\t\t\t\t\t</tbody>
\t\t\t\t\t</table>
\t\t\t\t</div>
\t\t\t</div><!-- End discount rules -->
\t\t\t<!-- Start images & videos -->
\t\t\t<div id=\"div8\" style=\"padding-top: 10px;\">
\t\t\t\t<table class=\"Panel\">
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"Heading2\" colspan=\"2\">";
        // line 1062
        echo getLang("ProductImages");
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td colspan=\"2\">
\t\t\t\t\t\t<div style=\"margin:10px 0 6px 10px;\">";
        // line 1066
        echo getLang("ProductImagesIntroduction");
        echo "</div>

\t\t\t\t\t\t<div style=\"margin:11px 0 6px 6px;\">
\t\t\t\t\t\t\t<button class=\"Button\" id=\"productImagesDeleteSelected\" disabled=\"disabled\">";
        // line 1069
        echo getLang("DeleteSelected");
        echo "</button>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<table class=\"GridPanel productImagesTable\" cellspacing=\"0\">
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t<tr class=\"Heading3\">
\t\t\t\t\t\t\t\t\t<td class=\"productImageCheck\" style=\"padding-left:5px;\"><input type=\"checkbox\" /></td>
\t\t\t\t\t\t\t\t\t<td class=\"productImageThumbDisplay\" style=\"width:";
        // line 1076
        echo twig_safe_filter((isset($context['productImage_thumbnailWidth']) ? $context['productImage_thumbnailWidth'] : null));
        echo "px;\">";
        echo getLang("Image");
        echo "</td>
\t\t\t\t\t\t\t\t\t<td class=\"productImageDescription\">";
        // line 1077
        echo getLang("Description");
        echo "</td>
                                    <td class=\"productImageComponent\"><span class=\"HelpText\" onmouseout=\"HideQuickHelp(this)\" onmouseover=\"ShowQuickHelp(this, '";
        // line 1078
        echo Interspire_Template_Extension::jsFilter(getLang("UseAsComponent"), "'");
        echo "', '";
        echo Interspire_Template_Extension::jsFilter(getLang("UseAsComponentHelpText"), "'");
        echo "')\">";
        echo getLang("UseAsComponent");
        echo "</span></td>
\t\t\t\t\t\t\t\t\t<td class=\"productImageBaseThumb\"><span class=\"HelpText\" onmouseout=\"HideQuickHelp(this)\" onmouseover=\"ShowQuickHelp(this, '";
        // line 1079
        echo Interspire_Template_Extension::jsFilter(getLang("UseAsBaseThumbnail"), "'");
        echo "', '";
        echo Interspire_Template_Extension::jsFilter(getLang("UseAsBaseThumbnailHelpText"), "'");
        echo "')\">";
        echo getLang("UseAsBaseThumbnail");
        echo "</span></td>
\t\t\t\t\t\t\t\t\t<td class=\"productImageAction\">";
        // line 1080
        echo getLang("Action");
        echo "</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t</table>

\t\t\t\t\t\t<div class=\"productImagesListItem\" id=\"productImagesListItemNew\">
\t\t\t\t\t\t\t<table cellspacing=\"0\">
\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t<tr class=\"GridRowNoOver\">
\t\t\t\t\t\t\t\t\t\t<td class=\"productImageCheck\"><input type=\"checkbox\" /></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"productImageThumbDisplay\" style=\"width:";
        // line 1090
        echo twig_safe_filter((isset($context['productImage_thumbnailWidth']) ? $context['productImage_thumbnailWidth'] : null));
        echo "px;\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"productImageNewPlaceholder\" style=\"width:";
        // line 1091
        echo twig_safe_filter((isset($context['productImage_thumbnailWidth']) ? $context['productImage_thumbnailWidth'] : null));
        echo "px; height:";
        echo twig_safe_filter((isset($context['productImage_thumbnailHeight']) ? $context['productImage_thumbnailHeight'] : null));
        echo "px;\"><div style=\"line-height:";
        echo twig_safe_filter((isset($context['productImage_thumbnailHeight']) ? $context['productImage_thumbnailHeight'] : null));
        echo "px;\"><span>";
        echo getLang("NewImage");
        echo "</span></div></div>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"productImageDescription\">
\t\t\t\t\t\t\t\t\t\t\t<p>";
        // line 1094
        echo getLang("ProductImagesSelectUploadMethod");
        echo "</p>
\t\t\t\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t\t\t\t<li><span id=\"productImageNewUploadPlaceholder\"></span><a id=\"productImageNewUpload\" class=\"ProductImageNewUpload\" href=\"#\">";
        // line 1096
        echo getLang("UploadAnImage");
        echo "</a> <span class=\"SwfUploadAlternativeNotice\" style=\"display:none;\">";
        echo getLang("ProductImagesBasicUploader");
        echo "</span></li>
\t\t\t\t\t\t\t\t\t\t\t\t<li><a id=\"productImageNewWeb\" href=\"#\">";
        // line 1097
        echo getLang("UseImageFromWeb");
        echo "</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t<li><a id=\"productImageNewGallery\" href=\"#\">";
        // line 1098
        echo getLang("ChooseFromGallery");
        echo "</a></li>
\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"productImageBaseThumb\">&nbsp;</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"productImageAction\">&nbsp;</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t";
        // line 1108
        echo twig_safe_filter((isset($context['productImagesList']) ? $context['productImagesList'] : null));
        echo "

\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t</table>
\t\t\t\t<table class=\"Panel\">
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"Heading2\" colspan=\"2\">";
        // line 1115
        echo getLang("YouTubeVideos");
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"videoIntroRow\" colspan=\"2\">
\t\t\t\t\t\t";
        // line 1119
        echo getLang("YouTubeVideosIntro");
        echo "\t\t\t\t\t</td>
\t\t\t\t</tr>

\t\t\t\t<tr>
\t\t\t\t\t<td class=\"videoControlRow\" colspan=\"2\">
\t\t\t\t\t\t<input type=\"text\" class=\"Field250 exampleSearchText SetOriginalValue\" id=\"searchYouTube\" name=\"searchYouTube\" value=\"";
        // line 1125
        echo getLang("VideoTypeToSearch");
        echo "\" /> <input type=\"button\" class=\"Button\" value=\"";
        echo getLang("VideoFindVideos");
        echo "\" id=\"findVideosButton\" />
\t\t\t\t\t</td>
\t\t\t\t</tr>

\t\t\t\t<tr>
\t\t\t\t\t<td class=\"videoControlRow\" colspan=\"2\">
\t\t\t\t\t\t<div id=\"youtubeContainer\">
\t\t\t\t\t\t\t<div id=\"youtubeLeftBox\" class=\"youtubeVideoListBox\">
\t\t\t\t\t\t\t\t<ul id=\"youTubeSearchVideos\" style=\"display: none;\"></ul>
\t\t\t\t\t\t\t\t<div id=\"useSearchVideos\">";
        // line 1134
        echo getLang("VideoUseSearchField");
        echo "</div>
\t\t\t\t\t\t\t\t<div id=\"noSearchVideos\" style=\"display: none;\">";
        // line 1135
        echo getLang("VideoNoResults");
        echo "</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div id=\"youtubeJoinBox\">
\t\t\t\t\t\t\t\t<input type=\"button\" value=\"&raquo;\" style=\"width: 40px;\" id=\"addYouTubeVideos\" /><br /><br />
\t\t\t\t\t\t\t\t<input type=\"button\" value=\"&laquo;\" style=\"width: 40px;\" id=\"removeYouTubeVideos\" />
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div id=\"youtubeRightBox\" class=\"youtubeVideoListBox\">
\t\t\t\t\t\t\t\t<ul id=\"youTubeCurrentVideos\" style=\"display: none;\"></ul>
\t\t\t\t\t\t\t\t<div id=\"noCurrentVideos\">";
        // line 1143
        echo getLang("VideoClickToAdd");
        echo "</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t</table>
\t\t\t</div><!-- End images & videos -->

\t\t\t<!-- Start Google website optimizer -->
\t\t\t<div id=\"div9\">
\t\t\t\t<p class=\"InfoTip\" style=\"margin-bottom: 15px; margin-top: 15px;\">";
        // line 1153
        echo twig_safe_filter((isset($context['GoogleWebsiteOptimizerIntro']) ? $context['GoogleWebsiteOptimizerIntro'] : null));
        echo "</p>

\t\t\t\t<table width=\"100%\" class=\"Panel\" style=\"margin-top: 0; padding-top: 0;  ";
        // line 1155
        echo twig_safe_filter((isset($context['ShowEnableGoogleWebsiteOptimzer']) ? $context['ShowEnableGoogleWebsiteOptimzer'] : null));
        echo "\">
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"Heading2\" colspan=\"2\">";
        // line 1157
        echo getLang("GoogleWebsiteOptimizer");
        echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t";
        // line 1161
        echo getLang("EnableGoogleWebsiteOptimizer");
        echo "?
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<input ";
        // line 1164
        echo twig_safe_filter((isset($context['DisableOptimizerCheckbox']) ? $context['DisableOptimizerCheckbox'] : null));
        echo " type=\"checkbox\" name=\"prodEnableOptimizer\" id=\"prodEnableOptimizer\" ";
        echo twig_safe_filter((isset($context['CheckEnableOptimizer']) ? $context['CheckEnableOptimizer'] : null));
        echo " onclick = \"ToggleOptimizerConfigForm(";
        echo twig_safe_filter((isset($context['SkipOptimizerConfirmMsg']) ? $context['SkipOptimizerConfirmMsg'] : null));
        echo ");\" />
\t\t\t\t\t\t\t<label for=\"prodEnableOptimizer\">";
        // line 1165
        echo getLang("YesEnableGoogleWebsiteOptimizer");
        echo "</label>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t</table>
\t\t\t\t";
        // line 1169
        echo twig_safe_filter((isset($context['OptimizerConfigForm']) ? $context['OptimizerConfigForm'] : null));
        echo "
\t\t\t</div>
\t\t\t<!-- End Google website optimizer -->
            
            <!-- Begin Product Associations -->
            <div id=\"div10\" style=\"padding-top: 10px;\">
\t\t\t\t<div style=\"padding-bottom:5px\">";
        // line 1175
        echo getLang("ProductAssociationsIntro");
        echo "</div>
\t\t\t\t  <table class=\"Panel\" id=\"tabInventory\">
\t\t\t\t\t<tr>
\t\t\t\t\t  <td class=\"Heading2\" colspan=2>";
        // line 1178
        echo getLang("ProductAssociationOptions");
        echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"FieldLabel\">
\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;";
        // line 1182
        echo getLang("ThisProduct");
        echo ":
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td style=\"padding-bottom:10px\">
\t\t\t\t\t\t\t<input type=\"radio\" name=\"useProdAssociation\" id=\"useProdAssociationNo\" value=\"0\" ";
        // line 1185
        echo twig_safe_filter((isset($context['IsNoAssociation']) ? $context['IsNoAssociation'] : null));
        echo " /> <label for=\"useProdAssociationNo\">";
        echo getLang("ProductWillNotUseAssociation");
        echo "</label><br />
\t\t\t\t\t\t\t<input type=\"radio\" name=\"useProdAssociation\" id=\"useProdAssociationYes\" value=\"1\" ";
        // line 1186
        echo twig_safe_filter((isset($context['IsYesAssociation']) ? $context['IsYesAssociation'] : null));
        echo " /> <label for=\"useProdAssociationYes\" id=\"AssociationLabel\" style=\"color:";
        echo twig_safe_filter((isset($context['AssociationColor']) ? $context['AssociationColor'] : null));
        echo "\">";
        echo getLang("ProductWillUseAssociation");
        echo "</label>
\t\t\t\t\t\t\t<span style=\"display:";
        // line 1187
        echo twig_safe_filter((isset($context['HideAssociationList']) ? $context['HideAssociationList'] : null));
        echo ";\" id=\"associationList\">
\t\t\t\t\t\t\t\t<div id=\"usedforproddiv\" style=\"padding-left:25px\">
                                    <select size=\"12\" name=\"products\" id=\"ProductSelect\" class=\"Field250\" onchange=\"\$('#ProductRemoveButton').attr('disabled', false);\">
                                        ";
        // line 1190
        echo twig_safe_filter((isset($context['AssociationOptions']) ? $context['AssociationOptions'] : null));
        echo "
                                    </select>
                                    <div class=\"Field250\" style=\"text-align: left;\">
                                        <div style=\"float: right;\">
                                            <input type=\"button\" value=\"";
        // line 1194
        echo getLang("AssociationRemoveSelected");
        echo "\" id=\"ProductRemoveButton\" disabled=\"disabled\" class=\"FormButton\" style=\"width: 125px;\" onclick=\"removeFromProductSelect('ProductSelect', 'prodids');\" />
                                        </div>
                                        <input type=\"button\" value=\"";
        // line 1196
        echo getLang("AssociationAddProduct");
        echo "\" class=\"FormButton\" style=\"width: 125px;\" onclick=\"openProductSelect('coupon', 'ProductSelect', 'prodids');\" />
                                    <input type=\"hidden\" name=\"prodids\" id=\"prodids\" class=\"Field250\" value=\"";
        // line 1197
        echo twig_safe_filter((isset($context['ProductIds']) ? $context['ProductIds'] : null));
        echo "\" />
                                </div>
                                <p>
                                    <span class=\"Required\">*</span>&nbsp;";
        // line 1200
        echo getLang("ProductAssociationType");
        echo "<br />
                                    <input type=\"radio\" name=\"prodAssociationType\" id=\"prodAssociationTypePseudo\" value=\"0\" ";
        // line 1201
        echo twig_safe_filter((isset($context['IsPseudoAssociation']) ? $context['IsPseudoAssociation'] : null));
        echo " /> <label for=\"prodAssociationTypePseudo\">";
        echo getLang("ProductAssociationTypePseudo");
        echo "</label><br />
                                    <input type=\"radio\" name=\"prodAssociationType\" id=\"prodAssociationTypeInventory\" value=\"1\" ";
        // line 1202
        echo twig_safe_filter((isset($context['IsInventoryAssociation']) ? $context['IsInventoryAssociation'] : null));
        echo " /> <label for=\"prodAssociationTypeInventory\">";
        echo getLang("ProductAssociationTypeInventory");
        echo "</label>
                                </p>
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t</table>
\t\t\t\t<div style=\"display:";
        // line 1208
        echo twig_safe_filter((isset($context['HideVariationCombinationList']) ? $context['HideVariationCombinationList'] : null));
        echo "; margin-bottom:5px\" class=\"GridContainer\" id=\"variationCombinationsList\">
\t\t\t\t\t";
        // line 1209
        echo twig_safe_filter((isset($context['AssociationCombinationList']) ? $context['AssociationCombinationList'] : null));
        echo "
\t\t\t\t</div>
\t\t\t</div>
            <!-- End Product Associations -->

\t\t\t<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\" width=\"100%\" class=\"PanelPlain\" id=\"SaveButtons\">
\t\t\t\t<tr>
\t\t\t\t\t<td>
\t\t\t\t\t\t<input type=\"submit\" disabled=\"disabled\" value=\"";
        // line 1217
        echo getLang("SaveAndExit");
        echo "\" class=\"FormButton\" />
\t\t\t\t\t\t<input type=\"submit\" disabled=\"disabled\" value=\"";
        // line 1218
        echo twig_safe_filter((isset($context['SaveAndAddAnother']) ? $context['SaveAndAddAnother'] : null));
        echo "\" onclick=\"SaveAndAddAnother();\" class=\"FormButton\" style=\"width:130px\" />
\t\t\t\t\t\t<input type=\"reset\" value=\"";
        // line 1219
        echo getLang("Cancel");
        echo "\" class=\"FormButton\" onclick=\"ConfirmCancel()\" />
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t</td>
\t</tr>
\t</table>
</div>
</form>

<script type=\"text/javascript\" src=\"../javascript/jquery.growinguploader.js?";
        // line 1229
        echo twig_escape_filter($this->env, (isset($context['JSCacheToken']) ? $context['JSCacheToken'] : null), "1");
        echo "\"></script>
<script type=\"text/javascript\" src=\"../javascript/jquery/plugins/ajax.file.upload.js?";
        // line 1230
        echo twig_escape_filter($this->env, (isset($context['JSCacheToken']) ? $context['JSCacheToken'] : null), "1");
        echo "\"></script>
<script type=\"text/javascript\" src=\"script/multiuploaddialog.js?";
        // line 1231
        echo twig_escape_filter($this->env, (isset($context['JSCacheToken']) ? $context['JSCacheToken'] : null), "1");
        echo "\"></script>
<script type=\"text/javascript\">//<![CDATA[
var shop = { config: { } };

shop.config.DiscountRulesEnabled = '";
        // line 1235
        echo twig_safe_filter((isset($context['DiscountRulesEnabled']) ? $context['DiscountRulesEnabled'] : null));
        echo "';
shop.config.NoCategoriesJS = '";
        // line 1236
        echo twig_safe_filter((isset($context['NoCategoriesJS']) ? $context['NoCategoriesJS'] : null));
        echo "';
shop.config.IsProdRelatedAuto = '";
        // line 1237
        echo twig_safe_filter((isset($context['IsProdRelatedAuto']) ? $context['IsProdRelatedAuto'] : null));
        echo "';
shop.config.CurrencyTokenLeft = '";
        // line 1238
        echo twig_safe_filter((isset($context['CurrencyTokenLeft']) ? $context['CurrencyTokenLeft'] : null));
        echo "';
shop.config.CurrencyTokenRight = '";
        // line 1239
        echo twig_safe_filter((isset($context['CurrencyTokenRight']) ? $context['CurrencyTokenRight'] : null));
        echo "';
shop.config.AppPath = '";
        // line 1240
        echo twig_safe_filter((isset($context['AppPath']) ? $context['AppPath'] : null));
        echo "';
shop.config.sessionid = '";
        // line 1241
        echo twig_safe_filter((isset($context['sessionid']) ? $context['sessionid'] : null));
        echo "';
shop.config.maxUploadSize = '";
        // line 1242
        echo twig_safe_filter((isset($context['maxUploadSize']) ? $context['maxUploadSize'] : null));
        echo "';

lang.DiscountRulesNotEnabledWarning = '";
        // line 1244
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesNotEnabledWarning"), "'");
        echo "';
lang.DiscountRulesVariationWarning = '";
        // line 1245
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesVariationWarning"), "'");
        echo "';
lang.PleaseWaitRelated = '";
        // line 1246
        echo Interspire_Template_Extension::jsFilter(getLang("PleaseWaitRelated"), "'");
        echo "';
lang.NoProdsInCat = '";
        // line 1247
        echo Interspire_Template_Extension::jsFilter(getLang("NoProdsInCat"), "'");
        echo "';
lang.PleaseChooseAProduct = '";
        // line 1248
        echo Interspire_Template_Extension::jsFilter(getLang("PleaseChooseAProduct"), "'");
        echo "';
lang.ProdAlreadyInRelatedList = '";
        // line 1249
        echo Interspire_Template_Extension::jsFilter(getLang("ProdAlreadyInRelatedList"), "'");
        echo "';
lang.MoreImages = '";
        // line 1250
        echo Interspire_Template_Extension::jsFilter(getLang("MoreImages"), "'");
        echo "';
lang.LessImages = '";
        // line 1251
        echo Interspire_Template_Extension::jsFilter(getLang("LessImages"), "'");
        echo "';
lang.EnterProductFieldName = '";
        // line 1252
        echo Interspire_Template_Extension::jsFilter(getLang("EnterProductFieldName"), "'");
        echo "';
lang.EnterProductFieldFileType = '";
        // line 1253
        echo Interspire_Template_Extension::jsFilter(getLang("EnterProductFieldFileType"), "'");
        echo "';
lang.EnterProductFieldFileSize = '";
        // line 1254
        echo Interspire_Template_Extension::jsFilter(getLang("EnterProductFieldFileSize"), "'");
        echo "';
lang.EnterValidProductFieldFileSize = '";
        // line 1255
        echo Interspire_Template_Extension::jsFilter(getLang("EnterValidProductFieldFileSize"), "'");
        echo "';
lang.DiscountRulesQuantityMinRequired = '";
        // line 1256
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesQuantityMinRequired"), "'");
        echo "';
lang.DiscountRulesQuantityMinInvalid = '";
        // line 1257
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesQuantityMinInvalid"), "'");
        echo "';
lang.DiscountRulesQuantityMaxRequired = '";
        // line 1258
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesQuantityMaxRequired"), "'");
        echo "';
lang.DiscountRulesQuantityMaxInvalid = '";
        // line 1259
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesQuantityMaxInvalid"), "'");
        echo "';
lang.DiscountRulesTypeRequired = '";
        // line 1260
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesTypeRequired"), "'");
        echo "';
lang.DiscountRulesTypeInvalid = '";
        // line 1261
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesTypeInvalid"), "'");
        echo "';
lang.DiscountRulesAmountRequired = '";
        // line 1262
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesAmountRequired"), "'");
        echo "';
lang.DiscountRulesAmountInvalid = '";
        // line 1263
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesAmountInvalid"), "'");
        echo "';
lang.DiscountRulesAmountPriceInvalid = '";
        // line 1264
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesAmountPriceInvalid"), "'");
        echo "';
lang.DiscountRulesAmountPercentInvalid = '";
        // line 1265
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesAmountPercentInvalid"), "'");
        echo "';
lang.DiscountRulesAmountPercentIsFloat = '";
        // line 1266
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesAmountPercentIsFloat"), "'");
        echo "';
lang.DiscountRulesAmountFixedInvalid = '";
        // line 1267
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesAmountFixedInvalid"), "'");
        echo "';
lang.DiscountRulesQuantityMinHigher = '";
        // line 1268
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesQuantityMinHigher"), "'");
        echo "';
lang.DiscountRulesQuantityBothAstrix = '";
        // line 1269
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesQuantityBothAstrix"), "'");
        echo "';
lang.DiscountRulesQuantityMinPrevMaxAstrix = '";
        // line 1270
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesQuantityMinPrevMaxAstrix"), "'");
        echo "';
lang.DiscountRulesQuantityMinOverlap = '";
        // line 1271
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesQuantityMinOverlap"), "'");
        echo "';
lang.DiscountRulesQuantityMaxOverlap = '";
        // line 1272
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesQuantityMaxOverlap"), "'");
        echo "';
lang.EnterProdName = '";
        // line 1273
        echo Interspire_Template_Extension::jsFilter(getLang("EnterProdName"), "'");
        echo "';
lang.MustCreateCategoryFirst = '";
        // line 1274
        echo Interspire_Template_Extension::jsFilter(getLang("MustCreateCategoryFirst"), "'");
        echo "';
lang.ChooseCategory = '";
        // line 1275
        echo Interspire_Template_Extension::jsFilter(getLang("ChooseCategory"), "'");
        echo "';
lang.EnterPrice = '";
        // line 1276
        echo Interspire_Template_Extension::jsFilter(getLang("EnterPrice"), "'");
        echo "';
lang.EnterCostPrice = '";
        // line 1277
        echo Interspire_Template_Extension::jsFilter(getLang("EnterCostPrice"), "'");
        echo "';
lang.EnterRetailPrice = '";
        // line 1278
        echo Interspire_Template_Extension::jsFilter(getLang("EnterRetailPrice"), "'");
        echo "';
lang.EnterSalePrice = '";
        // line 1279
        echo Interspire_Template_Extension::jsFilter(getLang("EnterSalePrice"), "'");
        echo "';
lang.ChooseValidImage = '";
        // line 1280
        echo Interspire_Template_Extension::jsFilter(getLang("ChooseValidImage"), "'");
        echo "';
lang.EnterWeight = '";
        // line 1281
        echo Interspire_Template_Extension::jsFilter(getLang("EnterWeight"), "'");
        echo "';
lang.EnterWidth = '";
        // line 1282
        echo Interspire_Template_Extension::jsFilter(getLang("EnterWidth"), "'");
        echo "';
lang.EnterHeight = '";
        // line 1283
        echo Interspire_Template_Extension::jsFilter(getLang("EnterHeight"), "'");
        echo "';
lang.EnterDepth = '";
        // line 1284
        echo Interspire_Template_Extension::jsFilter(getLang("EnterDepth"), "'");
        echo "';
lang.EnterFixedShipping = '";
        // line 1285
        echo Interspire_Template_Extension::jsFilter(getLang("EnterFixedShipping"), "'");
        echo "';
lang.ProductHasNoDownloads = '";
        // line 1286
        echo Interspire_Template_Extension::jsFilter(getLang("ProductHasNoDownloads"), "'");
        echo "';
lang.EnterCurrentInventory = '";
        // line 1287
        echo Interspire_Template_Extension::jsFilter(getLang("EnterCurrentInventory"), "'");
        echo "';
lang.EnterLowInventory = '";
        // line 1288
        echo Interspire_Template_Extension::jsFilter(getLang("EnterLowInventory"), "'");
        echo "';
lang.ChooseProductVariation = '";
        // line 1289
        echo Interspire_Template_Extension::jsFilter(getLang("ChooseProductVariation"), "'");
        echo "';
lang.VariationChooseVariation = '";
        // line 1290
        echo Interspire_Template_Extension::jsFilter(getLang("VariationChooseVariation"), "'");
        echo "';
lang.VariationEnterValidPrice = '";
        // line 1291
        echo Interspire_Template_Extension::jsFilter(getLang("VariationEnterValidPrice"), "'");
        echo "';
lang.VariationEnterValidWeight = '";
        // line 1292
        echo Interspire_Template_Extension::jsFilter(getLang("VariationEnterValidWeight"), "'");
        echo "';
lang.VariationEnterValidImage = '";
        // line 1293
        echo Interspire_Template_Extension::jsFilter(getLang("VariationEnterValidImage"), "'");
        echo "';
lang.VariationEnterValidStockLevel = '";
        // line 1294
        echo Interspire_Template_Extension::jsFilter(getLang("VariationEnterValidStockLevel"), "'");
        echo "';
lang.VariationEnterValidLowStockLevel = '";
        // line 1295
        echo Interspire_Template_Extension::jsFilter(getLang("VariationEnterValidLowStockLevel"), "'");
        echo "';
lang.EnterCustomFieldName = '";
        // line 1296
        echo Interspire_Template_Extension::jsFilter(getLang("EnterCustomFieldName"), "'");
        echo "';
lang.SelectOneMoreWrapOptions = '";
        // line 1297
        echo Interspire_Template_Extension::jsFilter(getLang("SelectOneMoreWrapOptions"), "'");
        echo "';
lang.EnterSortOrder = '";
        // line 1298
        echo Interspire_Template_Extension::jsFilter(getLang("EnterSortOrder"), "'");
        echo "';
lang.EnterEventDateName = '";
        // line 1299
        echo Interspire_Template_Extension::jsFilter(getLang("EnterEventDateName"), "'");
        echo "';
lang.EnterEventDateRange = '";
        // line 1300
        echo Interspire_Template_Extension::jsFilter(getLang("EnterEventDateRange"), "'");
        echo "';
lang.AddProductWithEmptyDimensions = '";
        // line 1301
        echo Interspire_Template_Extension::jsFilter(getLang("AddProductWithEmptyDimensions"), "'");
        echo "';
lang.ConfirmCancelProduct = '";
        // line 1302
        echo getLang("ConfirmCancelProduct");
        echo "';
lang.ChooseOptionValue = '";
        // line 1303
        echo Interspire_Template_Extension::jsFilter(getLang("ChooseOptionValue"), "'");
        echo "';
lang.MorePricingOptions = '";
        // line 1304
        echo Interspire_Template_Extension::jsFilter(getLang("MorePricingOptions"), "'");
        echo "';
lang.LessPricingOptions = '";
        // line 1305
        echo Interspire_Template_Extension::jsFilter(getLang("LessPricingOptions"), "'");
        echo "';
lang.ConfirmChangeDownloadEdit = '";
        // line 1306
        echo Interspire_Template_Extension::jsFilter(getLang("ConfirmChangeDownloadEdit"), "'");
        echo "';
lang.InvalidExpiresAfter = '";
        // line 1307
        echo Interspire_Template_Extension::jsFilter(getLang("InvalidExpiresAfter"), "'");
        echo "';
lang.InvalidMaxDownloads = '";
        // line 1308
        echo Interspire_Template_Extension::jsFilter(getLang("InvalidMaxDownloads"), "'");
        echo "';
lang.SavingDownload = '";
        // line 1309
        echo Interspire_Template_Extension::jsFilter(getLang("SavingDownload"), "'");
        echo "';
lang.UploadFailed2 = '";
        // line 1310
        echo Interspire_Template_Extension::jsFilter(getLang("UploadFailed2"), "'");
        echo "';
lang.SelectDownloadFile = '";
        // line 1311
        echo Interspire_Template_Extension::jsFilter(getLang("SelectDownloadFile"), "'");
        echo "';
lang.UploadingDownload = '";
        // line 1312
        echo Interspire_Template_Extension::jsFilter(getLang("UploadingDownload"), "'");
        echo "';
lang.ConfirmDeleteDownload = '";
        // line 1313
        echo Interspire_Template_Extension::jsFilter(getLang("ConfirmDeleteDownload"), "'");
        echo "';
lang.DigitalDownloadDeleted = '";
        // line 1314
        echo Interspire_Template_Extension::jsFilter(getLang("DigitalDownloadDeleted"), "'");
        echo "';
lang.NoParent = '";
        // line 1315
        echo Interspire_Template_Extension::jsFilter(getLang("NoParent"), "'");
        echo "';
lang.NoCategoryName = '";
        // line 1316
        echo Interspire_Template_Extension::jsFilter(getLang("NoCategoryName"), "'");
        echo "';
lang.ProductWillUseVariation = '";
        // line 1317
        echo Interspire_Template_Extension::jsFilter(getLang("ProductWillUseVariation"), "'");
        echo "';
lang.ProductWillUseVariationSemi = '";
        // line 1318
        echo Interspire_Template_Extension::jsFilter(getLang("ProductWillUseVariationSemi"), "'");
        echo "';
lang.ConfirmRemoveProdField = '";
        // line 1319
        echo Interspire_Template_Extension::jsFilter(getLang("ConfirmRemoveProdField"), "'");
        echo "';
lang.DiscountRulesForEachItem = '";
        // line 1320
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesForEachItem"), "'");
        echo "';
lang.DiscountRulesOffEachItem = '";
        // line 1321
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesOffEachItem"), "'");
        echo "';
lang.DiscountRulesField = '";
        // line 1322
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesField"), "'");
        echo "';
lang.Number0 = '";
        // line 1323
        echo Interspire_Template_Extension::jsFilter(getLang("Number0"), "'");
        echo "';
lang.Number1 = '";
        // line 1324
        echo Interspire_Template_Extension::jsFilter(getLang("Number1"), "'");
        echo "';
lang.Number2 = '";
        // line 1325
        echo Interspire_Template_Extension::jsFilter(getLang("Number2"), "'");
        echo "';
lang.Number3 = '";
        // line 1326
        echo Interspire_Template_Extension::jsFilter(getLang("Number3"), "'");
        echo "';
lang.Number4 = '";
        // line 1327
        echo Interspire_Template_Extension::jsFilter(getLang("Number4"), "'");
        echo "';
lang.Number5 = '";
        // line 1328
        echo Interspire_Template_Extension::jsFilter(getLang("Number5"), "'");
        echo "';
lang.Number6 = '";
        // line 1329
        echo Interspire_Template_Extension::jsFilter(getLang("Number6"), "'");
        echo "';
lang.Number7 = '";
        // line 1330
        echo Interspire_Template_Extension::jsFilter(getLang("Number7"), "'");
        echo "';
lang.Number8 = '";
        // line 1331
        echo Interspire_Template_Extension::jsFilter(getLang("Number8"), "'");
        echo "';
lang.Number9 = '";
        // line 1332
        echo Interspire_Template_Extension::jsFilter(getLang("Number9"), "'");
        echo "';
lang.VideoLoading = '";
        // line 1333
        echo Interspire_Template_Extension::jsFilter(getLang("VideoLoading"), "'");
        echo "';
lang.VideoPleaseEnterSearchTerm = '";
        // line 1334
        echo Interspire_Template_Extension::jsFilter(getLang("VideoPleaseEnterSearchTerm"), "'");
        echo "';
lang.ClickHereToAddADescription = '";
        // line 1335
        echo Interspire_Template_Extension::jsFilter(getLang("ClickHereToAddADescription"), "'");
        echo "';
lang.ConfirmDeleteProductImage = '";
        // line 1336
        echo Interspire_Template_Extension::jsFilter(getLang("ConfirmDeleteProductImage"), "'");
        echo "';
lang.ChooseProductImage = '";
        // line 1337
        echo Interspire_Template_Extension::jsFilter(getLang("ChooseProductImage"), "'");
        echo "';
lang.ProductImagesDeleted = '";
        // line 1338
        echo Interspire_Template_Extension::jsFilter(getLang("ProductImagesDeleted"), "'");
        echo "';
lang.ProductImagesDeletedErrors = '";
        // line 1339
        echo Interspire_Template_Extension::jsFilter(getLang("ProductImagesDeletedErrors"), "'");
        echo "';
lang.ProductImagesDeletedWarnings = '";
        // line 1340
        echo Interspire_Template_Extension::jsFilter(getLang("ProductImagesDeletedWarnings"), "'");
        echo "';
lang.ProductImage = '";
        // line 1341
        echo Interspire_Template_Extension::jsFilter(getLang("ProductImage"), "'");
        echo "';
lang.ProductImageAddedSuccessfully = '";
        // line 1342
        echo Interspire_Template_Extension::jsFilter(getLang("ProductImageAddedSuccessfully"), "'");
        echo "';
lang.ProductImagesAddedSuccessfully = '";
        // line 1343
        echo Interspire_Template_Extension::jsFilter(getLang("ProductImagesAddedSuccessfully"), "'");
        echo "';
lang.ProductImageUrlsFailed = '";
        // line 1344
        echo Interspire_Template_Extension::jsFilter(getLang("ProductImageUrlsFailed"), "'");
        echo "';
lang.Images = '";
        // line 1345
        echo Interspire_Template_Extension::jsFilter(getLang("Images"), "'");
        echo "';
lang.ProductImagesProcessing = '";
        // line 1346
        echo Interspire_Template_Extension::jsFilter(getLang("ProductImagesProcessing"), "'");
        echo "';
lang.ProductImagesUploadError = '";
        // line 1347
        echo Interspire_Template_Extension::jsFilter(getLang("ProductImagesUploadError"), "'");
        echo "';
lang.ProductImagesTransportError = '";
        // line 1348
        echo Interspire_Template_Extension::jsFilter(getLang("ProductImagesTransportError"), "'");
        echo "';
lang.ProductImagesUploadProgressStatus = '";
        // line 1349
        echo Interspire_Template_Extension::jsFilter(getLang("ProductImagesUploadProgressStatus"), "'");
        echo "';
lang.ProductImagesUploadProgressFile = '";
        // line 1350
        echo Interspire_Template_Extension::jsFilter(getLang("ProductImagesUploadProgressFile"), "'");
        echo "';
lang.ProductImagesSortOrderChanged = '";
        // line 1351
        echo Interspire_Template_Extension::jsFilter(getLang("ProductImagesSortOrderChanged"), "'");
        echo "';
lang.ImageFromGalleryViewLarger = '";
        // line 1352
        echo Interspire_Template_Extension::jsFilter(getLang("ImageFromGalleryViewLarger"), "'");
        echo "';
lang.ProductImagesNoSourceImageNoThumbnail = '";
        // line 1353
        echo Interspire_Template_Extension::jsFilter(getLang("ProductImagesNoSourceImageNoThumbnail"), "'");
        echo "';
lang.ProductImagesNotUploadedDueToErrors = '";
        // line 1354
        echo Interspire_Template_Extension::jsFilter(getLang("ProductImagesNotUploadedDueToErrors"), "'");
        echo "';
lang.ProductImagesAnyImageNotListedHere = '";
        // line 1355
        echo Interspire_Template_Extension::jsFilter(getLang("ProductImagesAnyImageNotListedHere"), "'");
        echo "';
lang.UploadAnImage = '";
        // line 1356
        echo Interspire_Template_Extension::jsFilter(getLang("UploadAnImage"), "'");
        echo "';
lang.ProductImagesNonFlashIntro = '";
        // line 1357
        echo Interspire_Template_Extension::jsFilter(getLang("ProductImagesNonFlashIntro"), "'");
        echo "';
lang.ProductImagesUploadImagesElipsis = '";
        // line 1358
        echo Interspire_Template_Extension::jsFilter(getLang("ProductImagesUploadImagesElipsis"), "'");
        echo "';
lang.CancelEdit = '";
        // line 1359
        echo Interspire_Template_Extension::jsFilter(getLang("CancelEdit"), "'");
        echo "';
lang.ProductImagesNonFlashRemove = '";
        // line 1360
        echo Interspire_Template_Extension::jsFilter(getLang("ProductImagesNonFlashRemove"), "'");
        echo "';
lang.ShowErrorMessage = '";
        // line 1361
        echo Interspire_Template_Extension::jsFilter(getLang("ShowErrorMessage"), "'");
        echo "';
lang.ProductImagesChooseAnImage = '";
        // line 1362
        echo Interspire_Template_Extension::jsFilter(getLang("ProductImagesChooseAnImage"), "'");
        echo "';
lang.PleaseChooseAReleaseDate = '";
        // line 1363
        echo Interspire_Template_Extension::jsFilter(getLang("PleaseChooseAReleaseDate"), "'");
        echo "';
lang.PleaseChooseAReleaseDateInTheFuture = '";
        // line 1364
        echo Interspire_Template_Extension::jsFilter(getLang("PleaseChooseAReleaseDateInTheFuture"), "'");
        echo "';
lang.ProductImageEdited = '";
        // line 1365
        echo Interspire_Template_Extension::jsFilter(getLang("ProductImageEdited"), "'");
        echo "';
lang.ProductMinimumError = '";
        // line 1366
        echo Interspire_Template_Extension::jsFilter(getLang("ProductMinimumError"), "'");
        echo "';
lang.ProductMaximumError = '";
        // line 1367
        echo Interspire_Template_Extension::jsFilter(getLang("ProductMaximumError"), "'");
        echo "';
lang.ProductMinimumMaximumError = '";
        // line 1368
        echo Interspire_Template_Extension::jsFilter(getLang("ProductMinimumMaximumError"), "'");
        echo "';
lang.ProductMinimumMaximumError = '";
        // line 1369
        echo Interspire_Template_Extension::jsFilter(getLang("ProductMinimumMaximumError"), "'");
        echo "';
lang.ProductAssociationError = '";
        // line 1370
        echo Interspire_Template_Extension::jsFilter(getLang("ProductAssociationError"), "'");
        echo "';
lang.ProductAssociationEmptyError = '";
        // line 1371
        echo Interspire_Template_Extension::jsFilter(getLang("ProductAssociationEmptyError"), "'");
        echo "';
//]]></script>
<script type=\"text/javascript\" src=\"script/product.js?";
        // line 1373
        echo twig_escape_filter($this->env, (isset($context['JSCacheToken']) ? $context['JSCacheToken'] : null), "1");
        echo "\"></script>
<script type=\"text/javascript\" src=\"script/product.youtube.js?";
        // line 1374
        echo twig_escape_filter($this->env, (isset($context['JSCacheToken']) ? $context['JSCacheToken'] : null), "1");
        echo "\"></script>
<script type=\"text/javascript\">//<![CDATA[
\$(document).ready(function() {

\t\$('#frmProduct').bind('submit', function () {
\t\treturn ValidateForm(CheckAddProductForm);
\t});

\t";
        // line 1382
        echo twig_safe_filter((isset($context['OptionButtons']) ? $context['OptionButtons'] : null));
        echo "

\t// Toggle the product type
\tvar f = g('ProductType_0');
\tif(f.checked)
\t{
\t\tToggleType(0);
\t}
\telse
\t{
\t\tToggleType(1);
\t}

\tToggleAllowPurchasing();
\tToggleCallForPricing();

\tif(g('prodInvTrack_2').checked) {
\t\t\$('#prodOptionsRequired').attr('checked', true);
\t\t\$('#prodOptionsRequired').attr('disabled', true);
\t}

\t\$('#prodInvTrack_2').click(function() {
\t\tif(this.checked) {
\t\t\t\$('#prodOptionsRequired').attr('checked', true);
\t\t\t\$('#prodOptionsRequired').attr('disabled', true);
\t\t}
\t});

\t\$('#prodInvTrack_1').click(function() {
\t\t\$('#prodOptionsRequired').attr('checked', false);
\t\t\$('#prodOptionsRequired').attr('disabled', false);
\t});

\t\$('#prodInvTrack_0').click(function() {
\t\t\$('#prodOptionsRequired').attr('checked', false);
\t\t\$('#prodOptionsRequired').attr('disabled', false);
\t});

\t";
        // line 1420
        echo twig_safe_filter((isset($context['MoreImages']) ? $context['MoreImages'] : null));
        echo "

\tShowTab(";
        // line 1422
        echo twig_safe_filter((isset($context['CurrentTab']) ? $context['CurrentTab'] : null));
        echo ");

\t// Are related products set to auto?
\tif(shop.config.IsProdRelatedAuto == 'checked=\"checked\"') {
\t\ttoggle_related_auto(true);
\t}

\tyoutube.videos = '";
        // line 1429
        echo twig_safe_filter((isset($context['YouTubeVideos']) ? $context['YouTubeVideos'] : null));
        echo "';
\tyoutube.init();

\t\$('input[type=submit]').attr('disabled', '');

\t\$('input[name=_prodorderable]').bind('click', function(){
\t\t\$('._prodorderable_detail').hide();
\t\tif (this.checked) {
\t\t\t\$('#_prodorderable_' + \$(this).val() + '_detail').show();
\t\t}
\t});

\t\$('input[name=_prodorderable]:checked').trigger('click');

\t\$('#prodreleasedate').datepicker({
\t\tshowOn: 'both',
\t\tbuttonImage: 'images/calendar.gif',
\t\tbuttonImageOnly: true,
\t\tminDate: new Date(),
\t\tfirstDay: 1,
\t\tduration: '',
\t\tdateFormat: 'mm/dd/yy'
\t});

\t\$('#prodreleasedate').bind('keydown keyup keypress', function(event){
\t\tswitch (event.keyCode) {
\t\t\tcase 8: // backspace
\t\t\tcase 16: // shift
\t\t\tcase 17: // control
\t\t\tcase 18: // alt
\t\t\tcase 35: // end
\t\t\tcase 36: // home
\t\t\tcase 37: // left
\t\t\tcase 38: // up
\t\t\tcase 39: // right
\t\t\tcase 40: // down
\t\t\tcase 46: // delete
\t\t\t\treturn;
\t\t\t\tbreak;
\t\t}

\t\tif ((event.shiftKey || event.metaKey) && event.keyCode == 88) {
\t\t\t// cut
\t\t\treturn;
\t\t}

\t\tevent.preventDefault();
\t});

\t\$(\"#OpenGraphUseProductName\").change(function() {
\t\tif(\$(this).is(':checked')) {
\t\t\t\$(this).parent('label').nextAll('.NodeJoin:first').hide();
\t\t}
\t\telse {
\t\t\t\$(this).parent('label').nextAll('.NodeJoin:first').show();
\t\t}
\t});

\t\$(\"#OpenGraphUseMetaDescription\").change(function() {
\t\tif(\$(this).is(':checked')) {
\t\t\t\$(this).parent('label').nextAll('.NodeJoin:first').hide();
\t\t}
\t\telse {
\t\t\t\$(this).parent('label').nextAll('.NodeJoin:first').show();
\t\t}
\t});
});
//]]></script>

<div style=\"display:none;\" id=\"UseImageFromWebDialog\">
\t<div class=\"ModalTitle\">";
        // line 1499
        echo getLang("UseImageFromWebDialogTitle");
        echo "</div>
\t<div class=\"ModalContent\">
\t\t<input type=\"text\" class=\"Field100pct UseImageFromWebDialogImageUrl\" name=\"imageurl[]\" value=\"http://\" /><br />
\t\t<input type=\"text\" class=\"Field100pct UseImageFromWebDialogImageUrl\" name=\"imageurl[]\" value=\"http://\" /><br />
\t\t<input type=\"text\" class=\"Field100pct UseImageFromWebDialogImageUrl\" name=\"imageurl[]\" value=\"http://\" /><br />
\t\t<input type=\"text\" class=\"Field100pct UseImageFromWebDialogImageUrl\" name=\"imageurl[]\" value=\"http://\" /><br />
\t\t<input type=\"text\" class=\"Field100pct UseImageFromWebDialogImageUrl\" name=\"imageurl[]\" value=\"http://\" /><br />
\t</div>
\t<div class=\"ModalButtonRow\">
\t\t<div class=\"FloatLeft\">
\t\t\t<img src=\"images/loading.gif\" alt=\"\" style=\"vertical-align: middle; display: none;\" class=\"LoadingIndicator\" />
\t\t\t<input type=\"button\" class=\"CloseButton FormButton\" value=\"";
        // line 1510
        echo getLang("Close");
        echo "\" onclick=\"\$.modal.close();return false;\" />
\t\t</div>
\t\t<input type=\"button\" class=\"Submit\" value=\"";
        // line 1512
        echo getLang("UseImages");
        echo "\" onclick=\"ProductImages.useImageFromWebDialogSubmit();return false;\" />
\t</div>
</div><!-- end #UseImageFromWebDialog --><!-- located here to be outside of posted product info -->

<div id=\"QuickCategoryCreation\" style=\"display: none;\">
\t<div class=\"ModalTitle\">";
        // line 1517
        echo getLang("CreateACategory");
        echo "</div>
\t<div class=\"ModalContent\">
\t\t<table class=\"Panel\" width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td><strong>";
        // line 1521
        echo getLang("CatName");
        echo ":</strong></td>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<td><input id=\"QuickCatName\" type=\"text\" name=\"catname\" value=\"\"  class=\"Field250\" style=\"width: 100%;\" /></td>
\t\t\t</tr>
\t\t</table>
\t\t<div style=\"height: 4px; font-size: 1px;\"></div>
\t\t<table class=\"Panel\" width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td><strong>";
        // line 1530
        echo getLang("CatParentCategory");
        echo ":</strong></td>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<td>
\t\t\t\t\t<select name=\"catparentid\" size=\"8\" id=\"QuickCatParent\" style=\"width: 100%\">
\t\t\t\t\t</select>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<div class=\"ModalButtonRow\">
\t\t<div class=\"FloatLeft\">
\t\t\t<img src=\"images/loading.gif\" alt=\"\" style=\"vertical-align: middle; display: none;\" class=\"LoadingIndicator\" />
\t\t\t<input type=\"button\" class=\"CloseButton FormButton\" value=\"";
        // line 1543
        echo getLang("Cancel");
        echo "\" onclick=\"\$.modal.close();\" />
\t\t</div>
\t\t<input type=\"button\" class=\"Submit\" value=\"";
        // line 1545
        echo getLang("Save");
        echo "\" onclick=\"SaveQuickCategory()\" />
\t</div>
</div>

<div id=\"AddProductWithEmptyDimensions\" style=\"display: none;\">
<div class=\"ModalTitle\">";
        // line 1550
        echo getLang("ConfirmProductDimension");
        echo "</div>
\t<div class=\"ModalContent\">
\t\t";
        // line 1552
        echo getLang("AddProductWithEmptyDimensions");
        echo "<br /><br />
\t\t<input type=\"checkbox\" value=\"";
        // line 1553
        echo getLang("DontShowDimensionsCheck");
        echo "\" id=\"DontShowDimensionsCheck\" name=\"DontShowDimensionsCheck\" /> <label for=\"DontShowDimensionsCheck\">";
        echo getLang("DontShowDimensionsAgain");
        echo "</label>
\t</div>
\t<div class=\"ModalButtonRow\">
\t\t<div class=\"FloatLeft\">
\t\t\t<input type=\"button\" class=\"CloseButton FormButton\" value=\"";
        // line 1557
        echo getLang("Cancel");
        echo "\" onclick=\"\$.modal.close();\" />
\t\t</div>
\t\t<input type=\"button\" class=\"Submit\" value=\"";
        // line 1559
        echo getLang("Continue");
        echo "\" onclick=\"CheckedDimensionsContinue()\" />
\t</div>
</div>
";
    }

}
