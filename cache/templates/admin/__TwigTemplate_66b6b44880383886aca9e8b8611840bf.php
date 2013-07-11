<?php

/* product.category.tpl */
class __TwigTemplate_66b6b44880383886aca9e8b8611840bf extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<select id=\"accounting_quickbooks_newprodcategoryidx\" name=\"accounting_quickbooks[newprodcategoryidx][]\" class=\"Field250 ISSelectReplacement\" size=\"12\" multiple>
\t";
        // line 2
        echo twig_safe_filter((isset($context['CategoryOptions']) ? $context['CategoryOptions'] : null));
        echo "
</select>";
    }

}
