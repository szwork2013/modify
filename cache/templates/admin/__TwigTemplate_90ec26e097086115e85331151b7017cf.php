<?php

/* Snippets/OrderRefundForm.html */
class __TwigTemplate_90ec26e097086115e85331151b7017cf extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<div id=\"exportBox\">
\t<div class=\"ModalTitle\">
\t\t";
        // line 3
        echo getLang("Refund");
        echo "\t</div>
\t<form action=\"index.php?ToDo=refundOrder&orderid=";
        // line 5
        echo twig_safe_filter((isset($context['OrderId']) ? $context['OrderId'] : null));
        echo "\" method=\"Post\" onsubmit=\"return Order.ValidateRefundForm();\">
\t\t<div class=\"ModalContent\">
\t\t\t\t<table border=\"0\" cellpadding=\"0\" cellspacing=\"5\" width=\"100%\">
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td width=\"10px\" align=\"right\" valign=\"top\"><input type='radio' value='full' name=\"refundType\" id=\"refundType_full\" /></td>
\t\t\t\t\t\t<td class=\"FieldLabel\" align=\"left\"  valign=\"top\">
\t\t\t\t\t\t\t<label for=\"refundType_full\">";
        // line 11
        echo getLang("RefundFullAmount");
        echo "</label>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>

\t\t\t\t\t<tr>
\t\t\t\t\t\t<td align=\"right\" valign=\"top\"><input type='radio' value='partial' name=\"refundType\" id=\"refundType_partial\" /></td>
\t\t\t\t\t\t<td class=\"FieldLabel\" align=\"left\" valign=\"top\">
\t\t\t\t\t\t\t<label for=\"refundType_partial\">";
        // line 18
        echo getLang("RefundPartialAmount");
        echo "</label><br />
\t\t\t\t\t\t\t";
        // line 19
        echo twig_safe_filter((isset($context['CurrencyToken']) ? $context['CurrencyToken'] : null));
        echo "<input style = 'magin-left:50px'  name=\"refundAmt\"  class=\"Field80\" />
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t</table>
\t\t</div>
\t\t<div id=\"ModalButtonRow\">
\t\t\t<div class=\"FloatLeft\"><input class=\"CloseButton\" value=\"Close\" onclick=\"\$.modal.close();\" type=\"button\"></div>
\t\t\t<img src=\"images/loading.gif\" alt=\"\" style=\"display: none;\" class=\"LoadingIndicator\">
\t\t\t<input class=\"Submit SubmitButton\" value=\"";
        // line 27
        echo getLang("Refund");
        echo "\" type=\"submit\">
\t\t</div>
\t</form>
</div>";
    }

}
