<?php

/* stats.products.bynumviewsgrid.tpl */
class __TwigTemplate_97df37d49cb84e5faff58c733adbe8de extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<a name=\"productsByNumViews\"></a>
<div style=\"text-align:right\">
\t<div style=\"padding-bottom:10px\">
\t\t";
        // line 4
        echo getLang("ProductsPerPage");
        echo ":
\t\t<select onchange=\"ChangeProductsByNumViewsPerPage(this.options[this.selectedIndex].value)\">
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
\t\t</select>
\t</div>
\t";
        // line 14
        echo twig_safe_filter((isset($context['Paging']) ? $context['Paging'] : null));
        echo "
</div>
<br />
<table width=\"100%\" border=0 cellspacing=1 cellpadding=5 class=\"text\">
\t<tr class=\"Heading3\">
\t\t<td align=\"left\">
\t\t\t";
        // line 20
        echo getLang("ProductID");
        echo " &nbsp;
\t\t\t";
        // line 21
        echo twig_safe_filter((isset($context['SortLinksProductId']) ? $context['SortLinksProductId'] : null));
        echo "
\t\t</td>
\t\t<td align=\"left\">
\t\t\t";
        // line 24
        echo getLang("ProductSKU");
        echo " &nbsp;
\t\t\t";
        // line 25
        echo twig_safe_filter((isset($context['SortLinksCode']) ? $context['SortLinksCode'] : null));
        echo "
\t\t</td>
\t\t<td align=\"left\">
\t\t\t";
        // line 28
        echo getLang("Item");
        echo " &nbsp;
\t\t\t";
        // line 29
        echo twig_safe_filter((isset($context['SortLinksName']) ? $context['SortLinksName'] : null));
        echo "
\t\t</td>
\t\t<td align=\"left\">
\t\t\t<span onmouseover=\"ShowQuickHelp(this, '";
        // line 32
        echo getLang("StatsViews");
        echo "', '";
        echo getLang("ProductsByNumViewsHelp");
        echo "');\" onmouseout=\"HideQuickHelp(this);\" class=\"HelpText\">";
        echo getLang("StatsViews");
        echo "</span> &nbsp;
\t\t\t";
        // line 33
        echo twig_safe_filter((isset($context['SortLinksViews']) ? $context['SortLinksViews'] : null));
        echo "
\t\t</td>
\t\t<td align=\"left\">
\t\t\t";
        // line 36
        echo getLang("AverageRating");
        echo " &nbsp;
\t\t\t";
        // line 37
        echo twig_safe_filter((isset($context['SortLinksAverageRating']) ? $context['SortLinksAverageRating'] : null));
        echo "
\t\t</td>
\t</tr>
\t";
        // line 40
        echo twig_safe_filter((isset($context['OrderGrid']) ? $context['OrderGrid'] : null));
        echo "
</table>
";
        // line 42
        echo twig_safe_filter((isset($context['JumpToOrdersByItemsViewsGrid']) ? $context['JumpToOrdersByItemsViewsGrid'] : null));
        echo "
";
    }

}
