<?php

/* Snippets/CustomerGroupCategoryRow.html */
class __TwigTemplate_c7e4432f428d36fb97c802832901d146 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<div id=\"categoryRule";
        echo twig_safe_filter((isset($context['CategoryId']) ? $context['CategoryId'] : null));
        echo "\" class=\"catRules\">
\t";
        // line 2
        echo getLang("ForProductsInThisCategory");
        echo "\t<select id=\"categoryRuleValue";
        // line 3
        echo twig_safe_filter((isset($context['CategoryId']) ? $context['CategoryId'] : null));
        echo "\" class=\"catRulesProductId\" onchange=\"\$('#categoryRuleDiscount";
        echo twig_safe_filter((isset($context['CategoryId']) ? $context['CategoryId'] : null));
        echo "').focus(); remapHiddenDiscounts('category', ";
        echo twig_safe_filter((isset($context['CategoryId']) ? $context['CategoryId'] : null));
        echo ");\">
\t\t<option>-- Choose a Category --</option>
\t\t";
        // line 5
        echo twig_safe_filter((isset($context['CategoryOptions']) ? $context['CategoryOptions'] : null));
        echo "
\t</select>
\t";
        // line 7
        echo getLang("CustomersReceiveA");
        echo "
\t<span id=\"categoryDiscountRulesAmountPrefix";
        // line 9
        echo twig_safe_filter((isset($context['CategoryId']) ? $context['CategoryId'] : null));
        echo "\">";
        echo twig_safe_filter((isset($context['AmountPrefix']) ? $context['AmountPrefix'] : null));
        echo "</span>
\t<input class=\"catRulesDiscount Field50\" id=\"categoryRuleDiscount";
        // line 10
        echo twig_safe_filter((isset($context['CategoryId']) ? $context['CategoryId'] : null));
        echo "\" type=\"text\" value=\"";
        echo twig_safe_filter((isset($context['DiscountAmount']) ? $context['DiscountAmount'] : null));
        echo "\" class=\"Field50\" style=\"width:30px\" onchange=\"remapHiddenDiscounts('category', ";
        echo twig_safe_filter((isset($context['CategoryId']) ? $context['CategoryId'] : null));
        echo ");\" />
\t<span id=\"categoryDiscountRulesAmountPostfix";
        // line 11
        echo twig_safe_filter((isset($context['CategoryId']) ? $context['CategoryId'] : null));
        echo "\">";
        echo twig_safe_filter((isset($context['AmountPostfix']) ? $context['AmountPostfix'] : null));
        echo "</span>

\t<select id=\"categoryDiscountMethod";
        // line 13
        echo twig_safe_filter((isset($context['CategoryId']) ? $context['CategoryId'] : null));
        echo "\" class=\"Field120\" onchange=\"ToggleDiscountRateValueType(";
        echo twig_safe_filter((isset($context['CategoryId']) ? $context['CategoryId'] : null));
        echo ", 'category');\">
\t\t<option value=\"price\" ";
        // line 14
        echo twig_safe_filter((isset($context['DiscountMethodPrice']) ? $context['DiscountMethodPrice'] : null));
        echo ">";
        echo getLang("PriceDiscount");
        echo "</option>
\t\t<option value=\"percent\" ";
        // line 15
        echo twig_safe_filter((isset($context['DiscountMethodPercent']) ? $context['DiscountMethodPercent'] : null));
        echo ">";
        echo getLang("PercentageDiscount");
        echo "</option>
\t\t<option value=\"fixed\" ";
        // line 16
        echo twig_safe_filter((isset($context['DiscountMethodFixed']) ? $context['DiscountMethodFixed'] : null));
        echo ">";
        echo getLang("FixedPrice");
        echo "</option>
\t</select>

\t<span id=\"categoryDiscountRulesLineEnding";
        // line 19
        echo twig_safe_filter((isset($context['CategoryId']) ? $context['CategoryId'] : null));
        echo "\"> ";
        echo getLang("For");
        echo " </span>
\t<select id=\"categoryRuleAppliesTo";
        // line 20
        echo twig_safe_filter((isset($context['CategoryId']) ? $context['CategoryId'] : null));
        echo "\" onchange=\"remapHiddenDiscounts('category', ";
        echo twig_safe_filter((isset($context['CategoryId']) ? $context['CategoryId'] : null));
        echo ");\">
\t\t<option value=\"CATEGORY_ONLY\" ";
        // line 21
        echo twig_safe_filter((isset($context['DiscountCatTypeCat']) ? $context['DiscountCatTypeCat'] : null));
        echo ">";
        echo getLang("ProductsInThisCategory");
        echo "</option>
\t\t<option value=\"CATEGORY_AND_SUBCATS\" ";
        // line 22
        echo twig_safe_filter((isset($context['DiscountCatTypeCatAndSub']) ? $context['DiscountCatTypeCatAndSub'] : null));
        echo ">";
        echo getLang("ProductsInThisCategory2");
        echo "</option>
\t</select>

\t<img title=\"";
        // line 25
        echo getLang("AddAnotherCategoryDiscount");
        echo "\" style=\"cursor:pointer\" src=\"images/addicon.gif\" width=\"16\" height=\"16\" onclick=\"addDiscountRule('category');\" />
\t<img title=\"";
        // line 26
        echo getLang("RemoveThisCategoryDiscount");
        echo "\" style=\"cursor:pointer\" src=\"images/delicon.gif\" width=\"16\" height=\"16\" onclick=\"removeDiscountRule('category', ";
        echo twig_safe_filter((isset($context['CategoryId']) ? $context['CategoryId'] : null));
        echo ")\" />
</div>";
    }

}
