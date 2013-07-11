<?php

/* vendors.manage.grid.tpl */
class __TwigTemplate_d3d34098745b6bdc258cbdf9e6a62bab extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<table class=\"GridPanel SortableGrid\" cellspacing=\"0\" cellpadding=\"0\">
\t<tr style=\"";
        // line 2
        echo twig_safe_filter((isset($context['HidePaging']) ? $context['HidePaging'] : null));
        echo "\">
\t\t<td colspan=\"5\" style=\"text-align: right; padding: 0 0 6px 0;\" class=\"PagingNav\">
\t\t\t";
        // line 4
        echo twig_safe_filter((isset($context['Nav']) ? $context['Nav'] : null));
        echo "
\t\t</td>
\t</tr>
\t<tr class=\"Heading3\">
\t\t<td style=\"text-align: center; width: 10px;\"><input type=\"checkbox\" onclick=\"\$(this.form).find('input:checkbox').not(':disabled').attr('checked', this.checked);\" /></td>
\t\t<td style=\"width: 10px;\">&nbsp;</td>
\t\t<td>";
        // line 10
        echo getLang("VendorName");
        echo "</td>
\t\t<td style=\"width: 300px;\">";
        // line 11
        echo getLang("VendorUsers");
        echo "</td>
\t\t<td style=\"width: 160px;\">";
        // line 12
        echo getLang("Action");
        echo "</td>
\t</tr>
\t";
        // line 14
        echo twig_safe_filter((isset($context['VendorsGrid']) ? $context['VendorsGrid'] : null));
        echo "
\t<tr>
\t\t<td colspan=\"5\" style=\"text-align: right; padding: 6px 0;\" class=\"PagingNav\">
\t\t\t";
        // line 17
        echo twig_safe_filter((isset($context['Nav']) ? $context['Nav'] : null));
        echo "
\t\t</td>
\t</tr>
</table>";
    }

}
