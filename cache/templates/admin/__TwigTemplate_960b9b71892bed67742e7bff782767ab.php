<?php

/* Snippets/ShipmentQuickViewItem.html */
class __TwigTemplate_960b9b71892bed67742e7bff782767ab extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<tr>
\t<td style=\"padding-left: 10pt; padding-bottom: 5pt;\" width=\"70%\" class=\"text\">
\t\t";
        // line 3
        echo twig_safe_filter((isset($context['ProductQty']) ? $context['ProductQty'] : null));
        echo " x ";
        echo twig_safe_filter((isset($context['ProductName']) ? $context['ProductName'] : null));
        echo "
\t\t";
        // line 4
        echo twig_safe_filter((isset($context['ProductOptions']) ? $context['ProductOptions'] : null));
        echo "
\t\t";
        // line 5
        echo twig_safe_filter((isset($context['EventDate']) ? $context['EventDate'] : null));
        echo "
\t</td>
</tr>";
    }

}
