<?php

/* googlecheckout.button.tpl */
class __TwigTemplate_bf87e83ee187925b7f4ba64f3934839a extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<div class=\"FloatRight GoogleCheckout\">

\t";
        // line 3
        echo twig_safe_filter((isset($context['GoogleCheckoutOrUse']) ? $context['GoogleCheckoutOrUse'] : null));
        echo "

\t";
        // line 5
        echo twig_safe_filter((isset($context['GoogleCheckoutButton']) ? $context['GoogleCheckoutButton'] : null));
        echo "

</div>";
    }

}
