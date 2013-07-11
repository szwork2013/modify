<?php

/* Snippets/CreateShipmentItem.html */
class __TwigTemplate_81609a5b69770ec5e83ba02e357ae975 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<tr class=\"GridRow\" onmouseover=\"\$(this).addClass('GridRowOver');\" onmouseout=\"\$(this).removeClass('GridRowOver');\">
\t<td><strong>";
        // line 2
        echo twig_safe_filter((isset($context['ProductName']) ? $context['ProductName'] : null));
        echo "</strong></td>
\t<td style=\"text-align: center;\">";
        // line 3
        echo twig_safe_filter((isset($context['QuantityInput']) ? $context['QuantityInput'] : null));
        echo "</td>
</tr>";
    }

}
