<?php

/* module.freeshippingwhenoverx.tpl */
class __TwigTemplate_ed4029ba4bcde637994d41d075d53a77 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo getLang("FREESHIPPINGWHENOVERXWhen");
        echo "
";
        // line 2
        echo twig_safe_filter((isset($context['CurrencyLeft']) ? $context['CurrencyLeft'] : null));
        echo "<input name=\"varn_amount\" class=\"discountFirst Field20\" id=\"amount\" size=\"3\" value=\"";
        echo twig_safe_filter((isset($context['varn_amount']) ? $context['varn_amount'] : null));
        echo "\" />";
        echo twig_safe_filter((isset($context['CurrencyRight']) ? $context['CurrencyRight'] : null));
        echo "
";
        // line 3
        echo getLang("FREESHIPPINGWHENOVERXShip");
    }

}
