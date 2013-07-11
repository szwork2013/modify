<?php

/* stats.orders.bydategrid.tpl */
class __TwigTemplate_db91d6edd097ad11f3ba33784c7deb49 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<a name=\"ordersByDateAnchor\"></a>
<div style=\"text-align:right\">
\t<div style=\"padding-bottom:10px\">
\t\t";
        // line 4
        echo getLang("OrdersPerPage");
        echo ":
\t\t<select onchange=\"ChangeOrdersByDatePerPage(this.options[this.selectedIndex].value)\">
\t\t\t<option ";
        // line 6
        echo twig_safe_filter((isset($context['IsShowPerPage5']) ? $context['IsShowPerPage5'] : null));
        echo " value=\"5\">5</option>
\t\t\t<option ";
        // line 7
        echo twig_safe_filter((isset($context['IsShowPerPage10']) ? $context['IsShowPerPage10'] : null));
        echo " value=\"10\">10</option>
\t\t\t<option ";
        // line 8
        echo twig_safe_filter((isset($context['IsShowPerPage20']) ? $context['IsShowPerPage20'] : null));
        echo " value=\"20\">20</option>
\t\t\t<option ";
        // line 9
        echo twig_safe_filter((isset($context['IsShowPerPage30']) ? $context['IsShowPerPage30'] : null));
        echo " value=\"30\">30</option>
\t\t\t<option ";
        // line 10
        echo twig_safe_filter((isset($context['IsShowPerPage50']) ? $context['IsShowPerPage50'] : null));
        echo " value=\"50\">50</option>
\t\t\t<option ";
        // line 11
        echo twig_safe_filter((isset($context['IsShowPerPage100']) ? $context['IsShowPerPage100'] : null));
        echo " value=\"100\">100</option>
\t\t\t<option ";
        // line 12
        echo twig_safe_filter((isset($context['IsShowPerPage200']) ? $context['IsShowPerPage200'] : null));
        echo " value=\"200\">200</option>
\t\t</select>
\t</div>
\t";
        // line 15
        echo twig_safe_filter((isset($context['Paging']) ? $context['Paging'] : null));
        echo "
</div>
<br />
<table width=\"100%\" border=0 cellspacing=1 cellpadding=5 class=\"text\">
\t<tr class=\"Heading3\">
\t\t<td nowrap align=\"left\">
\t\t\t";
        // line 21
        echo getLang("OrderID");
        echo " &nbsp;
\t\t\t";
        // line 22
        echo twig_safe_filter((isset($context['SortLinksId']) ? $context['SortLinksId'] : null));
        echo "
\t\t</td>

\t\t<td nowrap align=\"left\">
\t\t\t";
        // line 26
        echo getLang("Customer");
        echo " &nbsp;
\t\t\t";
        // line 27
        echo twig_safe_filter((isset($context['SortLinksCust']) ? $context['SortLinksCust'] : null));
        echo "
\t\t</td>
\t\t<td nowrap align=\"left\">
\t\t\t";
        // line 30
        echo getLang("Date");
        echo " &nbsp;
\t\t\t";
        // line 31
        echo twig_safe_filter((isset($context['SortLinksDate']) ? $context['SortLinksDate'] : null));
        echo "
\t\t</td>
\t\t<td nowrap align=\"left\">
\t\t\t";
        // line 34
        echo getLang("Total");
        echo " &nbsp;
\t\t\t";
        // line 35
        echo twig_safe_filter((isset($context['SortLinksTotal']) ? $context['SortLinksTotal'] : null));
        echo "
\t\t</td>
\t\t<td nowrap align=\"left\">
\t\t\t";
        // line 38
        echo getLang("Action");
        echo "\t\t</td>
\t</tr>
\t";
        // line 41
        echo twig_safe_filter((isset($context['OrderGrid']) ? $context['OrderGrid'] : null));
        echo "
</table>
";
        // line 43
        echo twig_safe_filter((isset($context['JumpToOrdersByDateGrid']) ? $context['JumpToOrdersByDateGrid'] : null));
        echo "
";
    }

}
