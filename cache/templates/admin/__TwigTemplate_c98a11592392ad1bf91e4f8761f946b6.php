<?php

/* shipments.manage.grid.tpl */
class __TwigTemplate_c98a11592392ad1bf91e4f8761f946b6 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<table class=\"GridPanel SortableGrid AutoExpand\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" style=\"width:100%;\">
\t<tr style=\"text-align: right\">
\t\t<td colspan=\"";
        // line 3
        if ((isset($context['orderView']) ? $context['orderView'] : null) == true) {
            echo "8";
        } else {
            echo "9";
        }
        echo "\" style=\"padding:6px 0px 6px 0px\" class=\"PagingNav\">
\t\t\t";
        // line 4
        echo twig_safe_filter((isset($context['Nav']) ? $context['Nav'] : null));
        echo "
\t\t</td>
\t</tr>
\t<tr class=\"Heading3\">
\t\t";
        // line 8
        if ((isset($context['orderView']) ? $context['orderView'] : null) == false) {
            echo "\t\t\t<td align=\"center\"><input type=\"checkbox\" onclick=\"\$(this.form).find('input:checkbox').not(':disabled').attr('checked', this.checked);\" /></td>
\t\t";
        }
        // line 10
        echo "\t\t<td>&nbsp;</td>
\t\t<td>&nbsp;</td>
\t\t<td nowrap=\"nowrap\" style=\"width: 120px;\">
\t\t\t";
        // line 14
        echo getLang("ShipmentId");
        echo " &nbsp;
\t\t\t";
        // line 15
        echo twig_safe_filter((isset($context['SortLinksId']) ? $context['SortLinksId'] : null));
        echo "
\t\t</td>
\t\t<td>
\t\t\t";
        // line 18
        echo getLang("ShippedTo");
        echo " &nbsp;
\t\t\t";
        // line 19
        echo twig_safe_filter((isset($context['SortLinksName']) ? $context['SortLinksName'] : null));
        echo "
\t\t</td>
\t\t<td nowrap=\"nowrap\">
\t\t\t";
        // line 22
        echo getLang("DateShipped");
        echo " &nbsp;
\t\t\t";
        // line 23
        echo twig_safe_filter((isset($context['SortLinksDate']) ? $context['SortLinksDate'] : null));
        echo "
\t\t</td>
\t\t<td nowrap=\"nowrap\" style=\"width: 120px;\">
\t\t\t";
        // line 26
        echo getLang("TrackingNo");
        echo " &nbsp;
\t\t\t";
        // line 27
        echo twig_safe_filter((isset($context['SortLinksTrackingNo']) ? $context['SortLinksTrackingNo'] : null));
        echo "
\t\t</td>
\t\t<td nowrap=\"nowrap\">
\t\t\t";
        // line 30
        echo getLang("ShipmentOrderDate");
        echo " &nbsp;
\t\t\t";
        // line 31
        echo twig_safe_filter((isset($context['SortLinksOrderDate']) ? $context['SortLinksOrderDate'] : null));
        echo "
\t\t</td>
\t\t<td style=\"width:100px\">
\t\t\t";
        // line 34
        echo getLang("Action");
        echo "\t\t</td>
\t</tr>
\t";
        // line 37
        echo twig_safe_filter((isset($context['ShipmentGrid']) ? $context['ShipmentGrid'] : null));
        echo "
\t<tr style=\"text-align: right\">
\t\t<td colspan=\"";
        // line 39
        if ((isset($context['orderView']) ? $context['orderView'] : null) == true) {
            echo "8";
        } else {
            echo "9";
        }
        echo "\" style=\"padding:6px 0px 6px 0px\" class=\"PagingNav\">
\t\t\t";
        // line 40
        echo twig_safe_filter((isset($context['Nav']) ? $context['Nav'] : null));
        echo "
\t\t</td>
\t</tr>
</table>
<script type=\"text/javascript\" charset=\"utf-8\">
\tlang.Saving = \"";
        // line 45
        echo Interspire_Template_Extension::jsFilter(getLang("Saving"), "'");
        echo "\";
\tlang.ErrorSavingTrackingNo = \"";
        // line 46
        echo Interspire_Template_Extension::jsFilter(getLang("ErrorSavingTrackingNo"), "'");
        echo "\";
</script>";
    }

}
