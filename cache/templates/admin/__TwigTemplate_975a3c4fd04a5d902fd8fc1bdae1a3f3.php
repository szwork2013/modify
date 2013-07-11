<?php

/* googlecheckout.button.tpl */
class __TwigTemplate_975a3c4fd04a5d902fd8fc1bdae1a3f3 extends Twig_Template
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
