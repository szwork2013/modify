<?php

/* giftcertificates.manage.row.tpl */
class __TwigTemplate_be979d18f6f836f4a0ffecc4bf29d634 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "\t<tr id=\"tr";
        echo twig_safe_filter((isset($context['GiftCertificateId']) ? $context['GiftCertificateId'] : null));
        echo "\" class=\"GridRow\" onmouseover=\"this.className='GridRowOver'\" onmouseout=\"this.className='GridRow'\">
\t\t<td align=\"center\" style=\"width:23px\">
\t\t\t<input type=\"checkbox\" name=\"certificates[]\" value=\"";
        // line 3
        echo twig_safe_filter((isset($context['GiftCertificateId']) ? $context['GiftCertificateId'] : null));
        echo "\" class=\"DeleteCheck\">
\t\t</td>
\t\t<td align=\"center\" style=\"width:15px\">
\t\t\t<a href=\"#\" onclick=\"QuickGiftCertificateView('";
        // line 6
        echo twig_safe_filter((isset($context['GiftCertificateId']) ? $context['GiftCertificateId'] : null));
        echo "'); return false;\">
\t\t\t\t<img id=\"expand";
        // line 7
        echo twig_safe_filter((isset($context['GiftCertificateId']) ? $context['GiftCertificateId'] : null));
        echo "\" src=\"images/plus.gif\" class=\"ExpandLink\" align=\"left\" width=\"19\" height=\"16\" title=\"";
        echo getLang("ExpandGiftCertificateQuickView");
        echo "\" border=\"0\">
\t\t\t</a>
\t\t</td>
\t\t<td align=\"center\" style=\"width:18px\">
\t\t\t<img src='images/giftcertificate.gif' height=\"16\" width=\"16\" />
\t\t</td>
\t\t<td class=\"";
        // line 13
        echo twig_safe_filter((isset($context['SortedFieldCodeClass']) ? $context['SortedFieldCodeClass'] : null));
        echo "\">
\t\t\t";
        // line 14
        echo twig_safe_filter((isset($context['GiftCertificateCode']) ? $context['GiftCertificateCode'] : null));
        echo "
\t\t</td>
\t\t<td class=\"";
        // line 16
        echo twig_safe_filter((isset($context['SortedFieldCustClass']) ? $context['SortedFieldCustClass'] : null));
        echo "\">
\t\t\t<a href=\"index.php?ToDo=viewCustomers&amp;searchQuery=";
        // line 17
        echo twig_safe_filter((isset($context['GiftCertificateCustomerId']) ? $context['GiftCertificateCustomerId'] : null));
        echo "\" target=\"_blak\">";
        echo twig_safe_filter((isset($context['GiftCertificateCustomerName']) ? $context['GiftCertificateCustomerName'] : null));
        echo "</a>
\t\t</td>
\t\t<td class=\"";
        // line 19
        echo twig_safe_filter((isset($context['SortedFieldCertificateAmountClass']) ? $context['SortedFieldCertificateAmountClass'] : null));
        echo "\">
\t\t\t";
        // line 20
        echo twig_safe_filter((isset($context['GiftCertificateAmount']) ? $context['GiftCertificateAmount'] : null));
        echo "
\t\t</td>
\t\t<td class=\"";
        // line 22
        echo twig_safe_filter((isset($context['SortedFieldCertificateBalanceClass']) ? $context['SortedFieldCertificateBalanceClass'] : null));
        echo "\">
\t\t\t";
        // line 23
        echo twig_safe_filter((isset($context['GiftCertificateBalance']) ? $context['GiftCertificateBalance'] : null));
        echo "
\t\t</td>
\t\t<td class=\"";
        // line 25
        echo twig_safe_filter((isset($context['SortedFieldPurchaseDateClass']) ? $context['SortedFieldPurchaseDateClass'] : null));
        echo "\">
\t\t\t";
        // line 26
        echo twig_safe_filter((isset($context['GiftCertificatePurchaseDate']) ? $context['GiftCertificatePurchaseDate'] : null));
        echo "
\t\t</td>
\t\t<td class=\"";
        // line 28
        echo twig_safe_filter((isset($context['SortedFieldStatusClass']) ? $context['SortedFieldStatusClass'] : null));
        echo "\">
\t\t\t<select name=\"certificate_status_";
        // line 29
        echo twig_safe_filter((isset($context['GiftCertificateId']) ? $context['GiftCertificateId'] : null));
        echo "\" id=\"status_";
        echo twig_safe_filter((isset($context['GiftCertificateId']) ? $context['GiftCertificateId'] : null));
        echo "\" class=\"Field\" onchange=\"UpdateGiftCertificateStatus(";
        echo twig_safe_filter((isset($context['GiftCertificateId']) ? $context['GiftCertificateId'] : null));
        echo ", this.options[this.selectedIndex].value, this.options[this.selectedIndex].text)\">
\t\t\t\t";
        // line 30
        echo twig_safe_filter((isset($context['GiftCertificateStatusOptions']) ? $context['GiftCertificateStatusOptions'] : null));
        echo "
\t\t\t</select>
\t\t\t&nbsp;
\t\t</td>
\t</tr>
\t<tr id=\"trQ";
        // line 35
        echo twig_safe_filter((isset($context['GiftCertificateId']) ? $context['GiftCertificateId'] : null));
        echo "\" style=\"display: none;\">
\t\t<td colspan=\"3\">&nbsp;</td>
\t\t<td colspan=\"2\" id=\"tdQ";
        // line 37
        echo twig_safe_filter((isset($context['GiftCertificateId']) ? $context['GiftCertificateId'] : null));
        echo "\" class=\"QuickView\">
\t\t</td>
\t\t<td colspan=\"3\">&nbsp;</td>
\t</tr>
";
    }

}
