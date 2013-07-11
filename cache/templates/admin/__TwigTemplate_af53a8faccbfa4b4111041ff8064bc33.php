<?php

/* customers.groups.manage.row.tpl */
class __TwigTemplate_af53a8faccbfa4b4111041ff8064bc33 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "
\t<tr id=\"tr";
        // line 2
        echo twig_safe_filter((isset($context['CustomerId']) ? $context['CustomerId'] : null));
        echo "\" class=\"GridRow ";
        echo twig_safe_filter((isset($context['GridRowSel']) ? $context['GridRowSel'] : null));
        echo "\" onmouseover=\"this.className='GridRowOver ";
        echo twig_safe_filter((isset($context['GridRowSelOver']) ? $context['GridRowSelOver'] : null));
        echo "'\" onmouseout=\"this.className='GridRow ";
        echo twig_safe_filter((isset($context['GridRowSel']) ? $context['GridRowSel'] : null));
        echo "'\">
\t\t<td align=\"center\" style=\"width:25px\">
\t\t\t<input type=\"checkbox\" name=\"groups[]\" value=\"";
        // line 4
        echo twig_safe_filter((isset($context['CustomerGroupId']) ? $context['CustomerGroupId'] : null));
        echo "\">
\t\t</td>
\t\t<td align=\"center\" style=\"width:18px\">
\t\t\t<img src=\"images/customer_group.gif\" width=\"16\" height=\"16\">
\t\t</td>
\t\t<td class=\"";
        // line 9
        echo twig_safe_filter((isset($context['SortedFieldGroupNameClass']) ? $context['SortedFieldGroupNameClass'] : null));
        echo "\">
\t\t\t";
        // line 10
        echo twig_safe_filter((isset($context['GroupName']) ? $context['GroupName'] : null));
        echo " ";
        echo twig_safe_filter((isset($context['DefaultText']) ? $context['DefaultText'] : null));
        echo "
\t\t</td>
\t\t<td class=\"";
        // line 12
        echo twig_safe_filter((isset($context['SortedFieldDiscountClass']) ? $context['SortedFieldDiscountClass'] : null));
        echo "\">
\t\t\t";
        // line 13
        echo twig_safe_filter((isset($context['Discount']) ? $context['Discount'] : null));
        echo "
\t\t</td>
\t\t<td class=\"";
        // line 15
        echo twig_safe_filter((isset($context['SortedFieldDiscountRulesClass']) ? $context['SortedFieldDiscountRulesClass'] : null));
        echo "\">
\t\t\t";
        // line 16
        echo twig_safe_filter((isset($context['DiscountRules']) ? $context['DiscountRules'] : null));
        echo "
\t\t</td>
\t\t<td class=\"";
        // line 18
        echo twig_safe_filter((isset($context['SortedFieldCustomersInGroupClass']) ? $context['SortedFieldCustomersInGroupClass'] : null));
        echo "\">
\t\t\t";
        // line 19
        echo twig_safe_filter((isset($context['CustomersInGroup']) ? $context['CustomersInGroup'] : null));
        echo "
\t\t</td>
\t\t<td class=\"";
        // line 21
        echo twig_safe_filter((isset($context['SortedFieldNumOrdersClass']) ? $context['SortedFieldNumOrdersClass'] : null));
        echo "\">
\t\t\t";
        // line 22
        echo twig_safe_filter((isset($context['EditLink']) ? $context['EditLink'] : null));
        echo "
\t\t</td>
\t</tr>
";
    }

}
