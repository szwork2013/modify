<?php

/* Snippets/CustomerGroupProductRow.html */
class __TwigTemplate_174b730b8be399913be1d973cc663569 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<div id=\"productRule";
        echo twig_safe_filter((isset($context['ProductId']) ? $context['ProductId'] : null));
        echo "\" class=\"prodRules\">
\t";
        // line 2
        echo getLang("ForThisProduct1");
        echo "\t<a href=\"#\" onclick=\"ShowProductSelector('productRuleName";
        // line 3
        echo twig_safe_filter((isset($context['ProductId']) ? $context['ProductId'] : null));
        echo "', 'productRuleValue";
        echo twig_safe_filter((isset($context['ProductId']) ? $context['ProductId'] : null));
        echo "', 'productRuleDiscount";
        echo twig_safe_filter((isset($context['ProductId']) ? $context['ProductId'] : null));
        echo "'); return false;\" id=\"productRuleName";
        echo twig_safe_filter((isset($context['ProductId']) ? $context['ProductId'] : null));
        echo "\">";
        echo getLang("ForThisProduct2");
        echo " (";
        echo twig_safe_filter((isset($context['SelectedItemName']) ? $context['SelectedItemName'] : null));
        echo ")</a>

\t<input class=\"prodRulesProductId\" type=\"hidden\" id=\"productRuleValue";
        // line 5
        echo twig_safe_filter((isset($context['ProductId']) ? $context['ProductId'] : null));
        echo "\" value=\"";
        echo twig_safe_filter((isset($context['CatOrProdId']) ? $context['CatOrProdId'] : null));
        echo "\" onchange=\"remapHiddenDiscounts('product', ";
        echo twig_safe_filter((isset($context['ProductId']) ? $context['ProductId'] : null));
        echo ");\" />
\t";
        // line 6
        echo getLang("CustomersReceiveA");
        echo "
\t<span id=\"productDiscountRulesAmountPrefix";
        // line 8
        echo twig_safe_filter((isset($context['ProductId']) ? $context['ProductId'] : null));
        echo "\">";
        echo twig_safe_filter((isset($context['AmountPrefix']) ? $context['AmountPrefix'] : null));
        echo "</span>
\t<input class=\"prodRulesDiscount Field50\" id=\"productRuleDiscount";
        // line 9
        echo twig_safe_filter((isset($context['ProductId']) ? $context['ProductId'] : null));
        echo "\" type=\"text\" value=\"";
        echo twig_safe_filter((isset($context['DiscountAmount']) ? $context['DiscountAmount'] : null));
        echo "\" class=\"Field50\" style=\"width:30px\" onchange=\"remapHiddenDiscounts('product', ";
        echo twig_safe_filter((isset($context['ProductId']) ? $context['ProductId'] : null));
        echo ");\" />
\t<span id=\"productDiscountRulesAmountPostfix";
        // line 10
        echo twig_safe_filter((isset($context['ProductId']) ? $context['ProductId'] : null));
        echo "\">";
        echo twig_safe_filter((isset($context['AmountPostfix']) ? $context['AmountPostfix'] : null));
        echo "</span>

\t<select id=\"productDiscountMethod";
        // line 12
        echo twig_safe_filter((isset($context['ProductId']) ? $context['ProductId'] : null));
        echo "\" class=\"Field120\" onchange=\"ToggleDiscountRateValueType(";
        echo twig_safe_filter((isset($context['ProductId']) ? $context['ProductId'] : null));
        echo ", 'product');\">
\t\t<option value=\"price\" ";
        // line 13
        echo twig_safe_filter((isset($context['DiscountMethodPrice']) ? $context['DiscountMethodPrice'] : null));
        echo ">";
        echo getLang("PriceDiscount");
        echo "</option>
\t\t<option value=\"percent\" ";
        // line 14
        echo twig_safe_filter((isset($context['DiscountMethodPercent']) ? $context['DiscountMethodPercent'] : null));
        echo ">";
        echo getLang("PercentageDiscount");
        echo "</option>
\t\t<option value=\"fixed\" ";
        // line 15
        echo twig_safe_filter((isset($context['DiscountMethodFixed']) ? $context['DiscountMethodFixed'] : null));
        echo ">";
        echo getLang("FixedPrice");
        echo "</option>
\t</select>

\t<img title=\"";
        // line 18
        echo getLang("AddAnotherProdDiscount");
        echo "\" style=\"cursor:pointer\" src=\"images/addicon.gif\" width=\"16\" height=\"16\" onclick=\"addDiscountRule('product')\" />
\t<img title=\"";
        // line 19
        echo getLang("RemoveThisProdDiscount");
        echo "\" style=\"cursor:pointer\" src=\"images/delicon.gif\" width=\"16\" height=\"16\" onclick=\"removeDiscountRule('product', ";
        echo twig_safe_filter((isset($context['ProductId']) ? $context['ProductId'] : null));
        echo ")\" />
</div>";
    }

}
