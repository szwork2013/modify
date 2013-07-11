<?php

/* product.category.tpl */
class __TwigTemplate_855ffe8c8c693b0aed834db48ed2e399 extends Twig_Template
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
