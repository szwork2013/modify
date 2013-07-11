<?php

/* shipments.manage.row.tpl */
class __TwigTemplate_20eefdf0c0594d507defd4af7c347a14 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<tr id=\"tr";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['shipment']) ? $context['shipment'] : null), "shipmentid", array(), "any"), "1");
        echo "\" class=\"GridRow\">
\t";
        // line 2
        if ((isset($context['orderView']) ? $context['orderView'] : null) == false) {
            echo "\t\t<td style=\"text-align: center; width: 23px;\">
\t\t\t<input type=\"checkbox\" name=\"shipments[]\" value=\"";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['shipment']) ? $context['shipment'] : null), "shipmentid", array(), "any"), "1");
            echo "\" />
\t\t</td>
\t";
        }
        // line 6
        echo "\t<td style=\"text-align: center; width: 15px;\">
\t\t<a href=\"#\" onclick=\"Shipments.Expand('";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['shipment']) ? $context['shipment'] : null), "shipmentid", array(), "any"), "1");
        echo "'); return false;\">
\t\t\t<img id=\"expand";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['shipment']) ? $context['shipment'] : null), "shipmentid", array(), "any"), "1");
        echo "\" src=\"images/plus.gif\" align=\"left\" width=\"19\" class=\"ExpandLink\" height=\"16\" title=\"";
        echo getLang("ExpandQuickView");
        echo "\" border=\"0\" />
\t\t</a>
\t</td>
\t<td style=\"text-align: center; width: 18px;\">
\t\t<img src=\"images/shipments.gif\" alt=\"\" />
\t</td>
\t<td class=\"";
        // line 15
        echo twig_safe_filter((isset($context['SortedFieldIdClass']) ? $context['SortedFieldIdClass'] : null));
        echo "\">
\t\t";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['shipment']) ? $context['shipment'] : null), "shipmentid", array(), "any"), "1");
        echo "
\t</td>
\t<td class=\"";
        // line 18
        echo twig_safe_filter((isset($context['SortedFieldNameClass']) ? $context['SortedFieldNameClass'] : null));
        echo "\">
\t\t";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['shipment']) ? $context['shipment'] : null), "shipshipfirstname", array(), "any"), "1");
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['shipment']) ? $context['shipment'] : null), "shipshiplastname", array(), "any"), "1");
        echo "
\t</td>
\t<td class=\"";
        // line 21
        echo twig_safe_filter((isset($context['SortedFieldDateClass']) ? $context['SortedFieldDateClass'] : null));
        echo "\">
\t\t";
        // line 22
        echo $this->getEnvironment()->getExtension('interspire')->dateFormat(twig_escape_filter($this->env, $this->getAttribute((isset($context['shipment']) ? $context['shipment'] : null), "shipdate", array(), "any"), "1"));
        echo "
\t</td>
\t<td style=\"width: 180px;\" class=\"";
        // line 24
        echo twig_safe_filter((isset($context['SortedFieldTrackingNoClass']) ? $context['SortedFieldTrackingNoClass'] : null));
        echo "\">
\t\t<input type=\"text\" name=\"trackingNo\" class=\"Field70\" value=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['shipment']) ? $context['shipment'] : null), "shiptrackno", array(), "any"), "1");
        echo "\" />
\t\t<input type=\"hidden\" name=\"id\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['shipment']) ? $context['shipment'] : null), "shipmentid", array(), "any"), "1");
        echo "\" />
\t\t<input type=\"button\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Save", array(), "any"), "1");
        echo "\" class=\"saveTrackingNoButton\" />
\t</td>
\t<td class=\"";
        // line 29
        echo twig_safe_filter((isset($context['SortedFieldOrderDateClass']) ? $context['SortedFieldOrderDateClass'] : null));
        echo "\">
\t\t";
        // line 30
        echo $this->getEnvironment()->getExtension('interspire')->dateFormat(twig_escape_filter($this->env, $this->getAttribute((isset($context['shipment']) ? $context['shipment'] : null), "shiporderdate", array(), "any"), "1"));
        echo "
\t</td>
\t<td>
\t\t<a title='";
        // line 33
        echo getLang("PrintPackingSlipTitle");
        echo "' href=\"#\" onclick=\"Shipments.PrintPackingSlip('";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['shipment']) ? $context['shipment'] : null), "shipmentid", array(), "any"), "1");
        echo "', '";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['shipment']) ? $context['shipment'] : null), "shiporderid", array(), "any"), "1");
        echo "'); return false;\">";
        echo getLang("PrintPackingSlip");
        echo "</a>
\t</td>
</tr>
<tr id=\"trQ";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['shipment']) ? $context['shipment'] : null), "shipmentid", array(), "any"), "1");
        echo "\" style=\"display: none\">
\t<td>&nbsp;</td>
\t<td colspan=\"";
        // line 38
        if ((isset($context['orderView']) ? $context['orderView'] : null)) {
            echo "7";
        } else {
            echo "8";
        }
        echo "\" class=\"QuickView\">&nbsp;</td>
</tr>";
    }

}
