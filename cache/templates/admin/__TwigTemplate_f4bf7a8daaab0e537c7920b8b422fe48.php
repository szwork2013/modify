<?php

/* order.viewwrapping.tpl */
class __TwigTemplate_f4bf7a8daaab0e537c7920b8b422fe48 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<div id=\"ModalTitle\">
\t";
        // line 2
        echo getLang("GiftWrappingFor");
        echo " ";
        echo twig_safe_filter((isset($context['ProductQuantity']) ? $context['ProductQuantity'] : null));
        echo " x ";
        echo twig_safe_filter((isset($context['ProductName']) ? $context['ProductName'] : null));
        echo "
</div>
<div id=\"ModalContent\" style=\"min-height: 100px; max-height: 400px; overflow: auto;\">
\t<table cellspacing=\"5\" cellpadding=\"0\" border=\"0\" width=\"100%\">
\t\t<tr>
\t\t\t<td class=\"FieldLabel\">";
        // line 7
        echo getLang("GiftWrapping");
        echo ":</td>
\t\t\t<td style=\"padding: 4px;\">";
        // line 8
        echo twig_safe_filter((isset($context['WrapName']) ? $context['WrapName'] : null));
        echo " (";
        echo twig_safe_filter((isset($context['WrapPrice']) ? $context['WrapPrice'] : null));
        echo ")</td>
\t\t</tr>
\t\t<tr style=\"";
        // line 10
        echo twig_safe_filter((isset($context['HideWrapMessage']) ? $context['HideWrapMessage'] : null));
        echo "\">
\t\t\t<td class=\"FieldLabel\">";
        // line 11
        echo getLang("GiftMessage");
        echo ":</td>
\t\t\t<td style=\"padding: 4px;\">";
        // line 12
        echo twig_safe_filter((isset($context['WrapMessage']) ? $context['WrapMessage'] : null));
        echo "</td>
\t\t</tr>
\t</table>
</div>
<div id=\"ModalButtonRow\">
\t\t<input type=\"button\" class=\"Submit\" value=\"";
        // line 17
        echo getLang("Close");
        echo "\" onclick=\"\$.modal.close();\" />
</div>";
    }

}
