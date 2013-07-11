<?php

/* shipments.quickview.tpl */
class __TwigTemplate_44e2b47e3cad22a7c8848f1bc2395aaf extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
\t<tr>
\t\t<td valign=\"top\" width=\"33%\" class=\"QuickViewPanel\">
\t\t\t<h5>";
        // line 4
        echo getLang("BillingDetails");
        echo "</h5>
\t\t\t<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text\" width=\"120\" valign=\"top\"=>";
        // line 7
        echo getLang("CustomerDetails");
        echo ":</td>
\t\t\t\t\t<td class=\"text\">
\t\t\t\t\t\t";
        // line 9
        echo twig_safe_filter((isset($context['BillingAddress']) ? $context['BillingAddress'] : null));
        echo "
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text\" valign=\"top\">";
        // line 13
        echo getLang("Email");
        echo ":</td>
\t\t\t\t\t<td class=\"text\">";
        // line 14
        echo twig_safe_filter((isset($context['BillingEmail']) ? $context['BillingEmail'] : null));
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text\" valign=\"top\">";
        // line 17
        echo getLang("PhoneNumber");
        echo ":</td>
\t\t\t\t\t<td class=\"text\">";
        // line 18
        echo twig_safe_filter((isset($context['BillingPhone']) ? $context['BillingPhone'] : null));
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text\">";
        // line 21
        echo getLang("ShipmentOrderId");
        echo "</td>
\t\t\t\t\t<td class=\"text\"><a href=\"index.php?ToDo=viewOrders&amp;orderId=";
        // line 22
        echo twig_safe_filter((isset($context['OrderId']) ? $context['OrderId'] : null));
        echo "\" target=\"_blank\">#";
        echo twig_safe_filter((isset($context['OrderId']) ? $context['OrderId'] : null));
        echo "</a>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text\" valign=\"top\">";
        // line 24
        echo getLang("ShipmentOrderDate");
        echo ":</td>
\t\t\t\t\t<td class=\"text\">";
        // line 25
        echo twig_safe_filter((isset($context['OrderDate']) ? $context['OrderDate'] : null));
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr style=\"";
        // line 27
        echo twig_safe_filter((isset($context['HideVendor']) ? $context['HideVendor'] : null));
        echo "\">
\t\t\t\t\t<td class=\"text\" valign=\"top\">";
        // line 28
        echo getLang("Vendor");
        echo ":</td>
\t\t\t\t\t<td class=\"text\">";
        // line 29
        echo twig_safe_filter((isset($context['VendorName']) ? $context['VendorName'] : null));
        echo "</td>
\t\t\t\t</tr>

\t\t\t</table>
\t\t</td>
\t\t<td valign=\"top\" width=\"33%\" class=\"QuickViewPanel\" style=\"padding-left:15px\">
\t\t\t<h5>";
        // line 35
        echo getLang("ShippingDetails");
        echo "</h5>
\t\t\t<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text\" valign=\"top\">";
        // line 38
        echo getLang("CustomerDetails");
        echo ":</td>
\t\t\t\t\t<td class=\"text\">
\t\t\t\t\t\t";
        // line 40
        echo twig_safe_filter((isset($context['ShippingAddress']) ? $context['ShippingAddress'] : null));
        echo "
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text\" valign=\"top\">";
        // line 44
        echo getLang("Email");
        echo ":</td>
\t\t\t\t\t<td class=\"text\">";
        // line 45
        echo twig_safe_filter((isset($context['ShippingEmail']) ? $context['ShippingEmail'] : null));
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text\" valign=\"top\">";
        // line 48
        echo getLang("PhoneNumber");
        echo ":</td>
\t\t\t\t\t<td class=\"text\">";
        // line 49
        echo twig_safe_filter((isset($context['ShippingPhone']) ? $context['ShippingPhone'] : null));
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text\" valign=\"top\">";
        // line 52
        echo getLang("ShippingMethod");
        echo ":</td>
\t\t\t\t\t<td class=\"text\">";
        // line 53
        echo twig_safe_filter((isset($context['ShippingMethod']) ? $context['ShippingMethod'] : null));
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text\" valign=\"top\">";
        // line 56
        echo getLang("ShippingDate");
        echo ":</td>
\t\t\t\t\t<td class=\"text\">";
        // line 57
        echo twig_safe_filter((isset($context['ShipmentDate']) ? $context['ShipmentDate'] : null));
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text\" valign=\"top\">";
        // line 60
        echo getLang("TrackingNumber");
        echo ":</td>
\t\t\t\t\t<td class=\"text\">";
        // line 61
        echo twig_safe_filter((isset($context['TrackingNo']) ? $context['TrackingNo'] : null));
        echo "</td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t</td>
\t\t<td valign=\"top\" width=\"33%\" style=\"padding-left:10px\">
\t\t\t<h5>";
        // line 66
        echo getLang("ShippedItems");
        echo "</h5>
\t\t\t";
        // line 67
        echo twig_safe_filter((isset($context['ProductsTable']) ? $context['ProductsTable'] : null));
        echo "
\t\t\t<div style=\"";
        // line 68
        echo twig_safe_filter((isset($context['HideShipmentComments']) ? $context['HideShipmentComments'] : null));
        echo "\">
\t\t\t\t<h5 style=\"margin-top: 10px;\">";
        // line 69
        echo getLang("ShipmentComments");
        echo "</h5>
\t\t\t\t<div style=\"margin-left: 20px;\">
\t\t\t\t\t";
        // line 71
        echo twig_safe_filter((isset($context['ShipmentComments']) ? $context['ShipmentComments'] : null));
        echo "
\t\t\t\t</div>
\t\t\t</div>
\t\t</td>
\t</tr>
</table>";
    }

}
