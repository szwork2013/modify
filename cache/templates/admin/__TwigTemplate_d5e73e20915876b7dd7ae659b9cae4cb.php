<?php

/* returns.manage.row.tpl */
class __TwigTemplate_d5e73e20915876b7dd7ae659b9cae4cb extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "\t<tr id=\"tr";
        echo twig_safe_filter((isset($context['ReturnId']) ? $context['ReturnId'] : null));
        echo "\" class=\"GridRow\" onmouseover=\"this.className='GridRowOver'\" onmouseout=\"this.className='GridRow'\">
\t\t<td align=\"center\" style=\"width:23px\">
\t\t\t<input type=\"checkbox\" name=\"returns[]\" value=\"";
        // line 3
        echo twig_safe_filter((isset($context['ReturnId']) ? $context['ReturnId'] : null));
        echo "\" class=\"DeleteCheck\">
\t\t</td>
\t\t<td align=\"center\" style=\"width:15px\">
\t\t\t<a href=\"#\" onclick=\"QuickReturnView('";
        // line 6
        echo twig_safe_filter((isset($context['ReturnId']) ? $context['ReturnId'] : null));
        echo "'); return false;\">
\t\t\t\t<img id=\"expand";
        // line 7
        echo twig_safe_filter((isset($context['ReturnId']) ? $context['ReturnId'] : null));
        echo "\" src=\"images/plus.gif\" class=\"ExpandLink\" align=\"left\" width=\"19\" height=\"16\" title=\"";
        echo getLang("ExpandReturnQuickView");
        echo "\" border=\"0\">
\t\t\t</a>
\t\t</td>
\t\t<td align=\"center\" style=\"width:18px\">
\t\t\t<img src='images/return.gif' height=\"16\" width=\"16\" />
\t\t</td>
\t\t<td class=\"";
        // line 13
        echo twig_safe_filter((isset($context['SortedFieldIdClass']) ? $context['SortedFieldIdClass'] : null));
        echo "\">
\t\t\t";
        // line 14
        echo twig_safe_filter((isset($context['ReturnId']) ? $context['ReturnId'] : null));
        echo "
\t\t</td>
\t\t<td class=\"";
        // line 16
        echo twig_safe_filter((isset($context['SortedFieldReturnItemClass']) ? $context['SortedFieldReturnItemClass'] : null));
        echo "\">
\t\t\t";
        // line 17
        echo twig_safe_filter((isset($context['ReturnQty']) ? $context['ReturnQty'] : null));
        echo "<a href=\"";
        echo twig_safe_filter((isset($context['ProductLink']) ? $context['ProductLink'] : null));
        echo "\" target=\"_blank\">";
        echo twig_safe_filter((isset($context['ProdName']) ? $context['ProdName'] : null));
        echo "</a>
\t\t\t";
        // line 18
        echo twig_safe_filter((isset($context['ReturnedProductOptions']) ? $context['ReturnedProductOptions'] : null));
        echo "
\t\t</td>
\t\t<td class=\"";
        // line 20
        echo twig_safe_filter((isset($context['SortedFieldOrderClass']) ? $context['SortedFieldOrderClass'] : null));
        echo "\">
\t\t\t<a href=\"index.php?ToDo=viewOrders&amp;searchQuery=";
        // line 21
        echo twig_safe_filter((isset($context['OrderId']) ? $context['OrderId'] : null));
        echo "\">";
        echo getLang("OrderNo");
        echo twig_safe_filter((isset($context['OrderId']) ? $context['OrderId'] : null));
        echo "</a> ";
        if (((!$this->getAttribute((isset($context['return']) ? $context['return'] : null), "orderid", array(), "any"))) || ($this->getAttribute((isset($context['return']) ? $context['return'] : null), "order_deleted", array(), "any"))) {
            echo "<span class=\"light\">(";
            echo getLang("deleted");
            echo ")</span>";
        }
        echo "\t\t</td>
\t\t<td class=\"";
        // line 23
        echo twig_safe_filter((isset($context['SortedFieldCustClass']) ? $context['SortedFieldCustClass'] : null));
        echo "\">
\t\t\t<a href=\"index.php?ToDo=viewCustomers&amp;searchQuery=";
        // line 24
        echo twig_safe_filter((isset($context['CustomerId']) ? $context['CustomerId'] : null));
        echo "\">";
        echo twig_safe_filter((isset($context['Customer']) ? $context['Customer'] : null));
        echo "</a>
\t\t</td>
\t\t<td nowrap=\"nowrap\" class=\"";
        // line 26
        echo twig_safe_filter((isset($context['SortedFieldDateClass']) ? $context['SortedFieldDateClass'] : null));
        echo "\">
\t\t\t";
        // line 27
        echo twig_safe_filter((isset($context['Date']) ? $context['Date'] : null));
        echo "
\t\t</td>
\t\t<td class=\"";
        // line 29
        echo twig_safe_filter((isset($context['SortedFieldStatusClass']) ? $context['SortedFieldStatusClass'] : null));
        echo "\">
\t\t\t<select ";
        // line 30
        echo twig_safe_filter((isset($context['ReturnStatusDisabled']) ? $context['ReturnStatusDisabled'] : null));
        echo " name=\"return_status_";
        echo twig_safe_filter((isset($context['ReturnId']) ? $context['ReturnId'] : null));
        echo "\" id=\"status_";
        echo twig_safe_filter((isset($context['ReturnId']) ? $context['ReturnId'] : null));
        echo "\" class=\"Field returnStatusSelect\">
\t\t\t\t";
        // line 31
        echo twig_safe_filter((isset($context['ReturnStatusOptions']) ? $context['ReturnStatusOptions'] : null));
        echo "
\t\t\t</select>
\t\t\t<img id=\"ajax_status_";
        // line 33
        echo twig_safe_filter((isset($context['ReturnId']) ? $context['ReturnId'] : null));
        echo "\" src=\"images/ajax-loader.gif\" style=\"visibility: hidden;\" />
\t\t</td>
\t\t<td>
\t\t\t";
        // line 36
        echo twig_safe_filter((isset($context['IssueCreditLink']) ? $context['IssueCreditLink'] : null));
        echo "
\t\t</td>
\t</tr>
\t<tr id=\"trQ";
        // line 39
        echo twig_safe_filter((isset($context['ReturnId']) ? $context['ReturnId'] : null));
        echo "\" style=\"display:none\">
\t\t<td colspan=\"3\">
\t\t\t&nbsp;
\t\t</td>
\t\t<td colspan=\"6\" id=\"tdQ";
        // line 43
        echo twig_safe_filter((isset($context['ReturnId']) ? $context['ReturnId'] : null));
        echo "\" class=\"QuickView\">
\t\t</td>
\t\t<td colspan=\"1\">&nbsp;</td>
\t</tr>
";
    }

}
