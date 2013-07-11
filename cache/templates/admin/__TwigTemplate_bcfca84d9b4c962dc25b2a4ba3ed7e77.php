<?php

/* paypalexpress.button.tpl */
class __TwigTemplate_bcfca84d9b4c962dc25b2a4ba3ed7e77 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<div class=\"FloatRight PayPalExpressCheckout\">

\t<p>";
        // line 3
        echo getLang("PayPalExpressOrUse");
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
\t\t\t<input type=\"hidden\" name=\"provider\" value=\"paypalexpress\" />
\t\t\t<input type=\"hidden\" name=\"action\" value=\"set_external_checkout\" />
\t\t</form>
\t</p>
</div>";
    }

}
