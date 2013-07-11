<?php

/* paypalexpress.providerlist.tpl */
class __TwigTemplate_6c29a204f8dd98823c19843ce714bb33 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<input name=\"credit_checkout_provider\" id=\"credit_checkout_provider_checkout_paypalexpress\" value=\"checkout_paypalexpress\" onclick=\"checkout_provider_changed(this)\" class=\"PAYMENT_PROVIDER_ONLINE\" type=\"radio\" checked=\"checked\"> ";
        echo getLang("CheckoutWithPayPal");
    }

}
