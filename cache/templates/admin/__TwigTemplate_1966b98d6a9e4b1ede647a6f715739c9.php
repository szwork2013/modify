<?php

/* giftcertificate.quickview.item.tpl */
class __TwigTemplate_1966b98d6a9e4b1ede647a6f715739c9 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"1\">
\t<tr>
\t\t<td valign=\"top\">
\t\t\t<h5 style=\"margin: 0pt 0pt 5pt 10px\"><a href=\"index.php?ToDo=viewOrders&amp;searchQuery=";
        // line 4
        echo twig_safe_filter((isset($context['OrderId']) ? $context['OrderId'] : null));
        echo "\" target=\"_blank\">";
        echo getLang("OrderNo");
        echo twig_safe_filter((isset($context['OrderPrefix']) ? $context['OrderPrefix'] : null));
        echo twig_safe_filter((isset($context['OrderId']) ? $context['OrderId'] : null));
        echo "</a></h5>
\t\t\t<table width=\"95%\" border=\"0\" align=\"right\">
\t\t\t\t<tr>
\t\t\t\t\t<td width=\"150\" class=\"text\">";
        // line 7
        echo getLang("OrderDate1");
        echo ":</td>
\t\t\t\t\t<td class=\"text\">";
        // line 8
        echo twig_safe_filter((isset($context['OrderDate']) ? $context['OrderDate'] : null));
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td width=\"150\" class=\"text\">";
        // line 11
        echo getLang("Customer");
        echo ":</td>
\t\t\t\t\t<td class=\"text\"><a href=\"index.php?ToDo=viewCustomers&amp;searchQuery=";
        // line 12
        echo twig_safe_filter((isset($context['CustomerId']) ? $context['CustomerId'] : null));
        echo "\" target=\"_blank\">";
        echo twig_safe_filter((isset($context['CustomerName']) ? $context['CustomerName'] : null));
        echo "</a></td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text\">";
        // line 15
        echo getLang("BalanceUsed");
        echo ":</td>
\t\t\t\t\t<td class=\"text\">";
        // line 16
        echo twig_safe_filter((isset($context['BalanceUsed']) ? $context['BalanceUsed'] : null));
        echo " (";
        echo twig_safe_filter((isset($context['BalanceRemaining']) ? $context['BalanceRemaining'] : null));
        echo " ";
        echo getLang("Remaining");
        echo ")</td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t</td>
\t</tr>
</table>
<br />";
    }

}
