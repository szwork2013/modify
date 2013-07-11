<?php

/* Snippets/CustomerGroupHiddenBlock.html */
class __TwigTemplate_d4cc10f35faf8e80ce4331a109bc31c7 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<input type=\"hidden\" id=\"";
        echo twig_safe_filter((isset($context['Type']) ? $context['Type'] : null));
        echo "_discountid_";
        echo twig_safe_filter((isset($context['DiscountId']) ? $context['DiscountId'] : null));
        echo "\" name=\"discountlist[";
        echo twig_safe_filter((isset($context['DiscountType']) ? $context['DiscountType'] : null));
        echo "][";
        echo twig_safe_filter((isset($context['DiscountId']) ? $context['DiscountId'] : null));
        echo "][discountid]\" value=\"";
        echo twig_safe_filter((isset($context['DiscountId']) ? $context['DiscountId'] : null));
        echo "\" class=\"hidden";
        echo twig_safe_filter((isset($context['Type']) ? $context['Type'] : null));
        echo "RecordId\" />
<input type=\"hidden\" id=\"";
        // line 2
        echo twig_safe_filter((isset($context['Type']) ? $context['Type'] : null));
        echo "_discounttype_";
        echo twig_safe_filter((isset($context['Discountid']) ? $context['Discountid'] : null));
        echo "\" name=\"discountlist[";
        echo twig_safe_filter((isset($context['DiscountType']) ? $context['DiscountType'] : null));
        echo "][";
        echo twig_safe_filter((isset($context['DiscountId']) ? $context['DiscountId'] : null));
        echo "][discounttype]\" value=\"";
        echo twig_safe_filter((isset($context['DiscountType']) ? $context['DiscountType'] : null));
        echo "\" />
<input type=\"hidden\" id=\"";
        // line 3
        echo twig_safe_filter((isset($context['Type']) ? $context['Type'] : null));
        echo "_catorprodid_";
        echo twig_safe_filter((isset($context['DiscountId']) ? $context['DiscountId'] : null));
        echo "\" name=\"discountlist[";
        echo twig_safe_filter((isset($context['DiscountType']) ? $context['DiscountType'] : null));
        echo "][";
        echo twig_safe_filter((isset($context['DiscountId']) ? $context['DiscountId'] : null));
        echo "][catorprodid]\" value=\"";
        echo twig_safe_filter((isset($context['CatOrProdId']) ? $context['CatOrProdId'] : null));
        echo "\" />
<input type=\"hidden\" id=\"";
        // line 4
        echo twig_safe_filter((isset($context['Type']) ? $context['Type'] : null));
        echo "_discountpercent_";
        echo twig_safe_filter((isset($context['DiscountId']) ? $context['DiscountId'] : null));
        echo "\" name=\"discountlist[";
        echo twig_safe_filter((isset($context['DiscountType']) ? $context['DiscountType'] : null));
        echo "][";
        echo twig_safe_filter((isset($context['DiscountId']) ? $context['DiscountId'] : null));
        echo "][discountpercent]\" value=\"";
        echo twig_safe_filter((isset($context['DiscountPercent']) ? $context['DiscountPercent'] : null));
        echo "\" />
<input type=\"hidden\" id=\"";
        // line 5
        echo twig_safe_filter((isset($context['Type']) ? $context['Type'] : null));
        echo "_appliesto_";
        echo twig_safe_filter((isset($context['DiscountId']) ? $context['DiscountId'] : null));
        echo "\" name=\"discountlist[";
        echo twig_safe_filter((isset($context['DiscountType']) ? $context['DiscountType'] : null));
        echo "][";
        echo twig_safe_filter((isset($context['DiscountId']) ? $context['DiscountId'] : null));
        echo "][appliesto]\" value=\"";
        echo twig_safe_filter((isset($context['AppliesTo']) ? $context['AppliesTo'] : null));
        echo "\" />
<input type=\"hidden\" id=\"";
        // line 6
        echo twig_safe_filter((isset($context['Type']) ? $context['Type'] : null));
        echo "_discountmethod_";
        echo twig_safe_filter((isset($context['DiscountId']) ? $context['DiscountId'] : null));
        echo "\" name=\"discountlist[";
        echo twig_safe_filter((isset($context['DiscountType']) ? $context['DiscountType'] : null));
        echo "][";
        echo twig_safe_filter((isset($context['DiscountId']) ? $context['DiscountId'] : null));
        echo "][discountmethod]\" value=\"";
        echo twig_safe_filter((isset($context['DiscountMethod']) ? $context['DiscountMethod'] : null));
        echo "\" />
";
    }

}
