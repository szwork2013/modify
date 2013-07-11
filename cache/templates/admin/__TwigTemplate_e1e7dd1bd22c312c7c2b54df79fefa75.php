<?php

/* vendors.manage.row.tpl */
class __TwigTemplate_e1e7dd1bd22c312c7c2b54df79fefa75 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<tr class=\"GridRow\" onmouseover=\"\$(this).addClass('GrodRowOver');\" onmouseout=\"\$(this).removeClass('GridRowOver');\">
\t<td style=\"text-align: center;\"><input type=\"checkbox\" class=\"check\" name=\"vendors[]\" value=\"";
        // line 2
        echo twig_safe_filter((isset($context['VendorId']) ? $context['VendorId'] : null));
        echo "\" /></td>
\t<td><img src=\"images/vendor.gif\" alt=\"\" /></td>
\t<td>";
        // line 4
        echo twig_safe_filter((isset($context['VendorName']) ? $context['VendorName'] : null));
        echo "</td>
\t<td>";
        // line 5
        echo twig_safe_filter((isset($context['VendorUsers']) ? $context['VendorUsers'] : null));
        echo "</td>
\t<td>
\t\t<a href=\"index.php?ToDo=editVendor&amp;vendorId=";
        // line 7
        echo twig_safe_filter((isset($context['VendorId']) ? $context['VendorId'] : null));
        echo "\">";
        echo getLang("Edit");
        echo "</a>
\t\t<a href=\"index.php?ToDo=viewUsers&amp;vendorId=";
        // line 8
        echo twig_safe_filter((isset($context['VendorId']) ? $context['VendorId'] : null));
        echo "\">";
        echo getLang("ManageUsers");
        echo "</a>
\t\t<a href=\"index.php?ToDo=deleteVendors&amp;vendors[]=";
        // line 9
        echo twig_safe_filter((isset($context['VendorId']) ? $context['VendorId'] : null));
        echo "\" onclick=\"return ConfirmDeleteVendor();\">";
        echo getLang("Delete");
        echo "</a>
\t</td>
</tr>";
    }

}
