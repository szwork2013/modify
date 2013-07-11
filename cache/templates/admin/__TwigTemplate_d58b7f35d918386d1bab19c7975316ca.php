<?php

/* paypalpaymentsprous.button.tpl */
class __TwigTemplate_d58b7f35d918386d1bab19c7975316ca extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<div class=\"FloatRight PayPalExpressCheckout\">

\t<p>";
        // line 3
        echo getLang("PayPalPaymentsProOrUse");
        echo "</p>
\t<p>
\t\t<form method=\"post\" action=\"";
        // line 5
        echo twig_safe_filter((isset($context['CheckoutLink']) ? $context['CheckoutLink'] : null));
        echo "\">
\t\t\t<input type=\"image\" name=\"submit\" alt=\"";
        // line 6
        echo getLang("CheckoutWithPayPal");
        echo "\" src=\"https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif\" />
\t\t\t<input type=\"hidden\" name=\"provider\" value=\"paypalpaymentsprous\" />
\t\t\t<input type=\"hidden\" name=\"action\" value=\"set_external_checkout\" />
\t\t</form>
\t</p>
</div>";
    }

}
