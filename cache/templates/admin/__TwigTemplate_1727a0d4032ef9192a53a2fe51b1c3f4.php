<?php

/* settings.tax.rates.grid.tpl */
class __TwigTemplate_1727a0d4032ef9192a53a2fe51b1c3f4 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<table class=\"gridTable SortableGrid\" id=\"taxRatesGrid\" cellspacing=\"0\" cellpadding=\"0\">
\t<thead>
\t\t<tr>
\t\t\t<th class=\"check checkAll\"><input type=\"checkbox\" /></th>
\t\t\t<th class=\"icon\">&nbsp;</th>
\t\t\t<th>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Name", array(), "any"), "1");
        echo "</th>
\t\t\t<th style=\"width: 300px\">";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Rates", array(), "any"), "1");
        echo "</th>
\t\t\t<th style=\"width: 150px\">";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "CalculationPriority", array(), "any"), "1");
        echo "</th>
\t\t\t<th style=\"width: 100px\">";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Status", array(), "any"), "1");
        echo "</th>
\t\t\t<th style=\"width: 150px\">";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Action", array(), "any"), "1");
        echo "</th>
\t\t</tr>
\t</thead>
\t<tbody>
\t\t";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_iterator_to_array((isset($context['taxRates']) ? $context['taxRates'] : null));
        $countable = is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable);
        $length = $countable ? count($context['_seq']) : null;
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if ($countable) {
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context['_key'] => $context['taxRate']) {
            echo "\t\t\t<tr>
\t\t\t\t<td class=\"check\"><input type=\"checkbox\" name=\"taxRate[]\" value=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['taxRate']) ? $context['taxRate'] : null), "id", array(), "any"), "1");
            echo "\" /></td>
\t\t\t\t<td><img src=\"images/tax.gif\" alt=\"\" /></td>
\t\t\t\t<td>
\t\t\t\t\t";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['taxRate']) ? $context['taxRate'] : null), "name", array(), "any"), "1");
            echo "
\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t<table width=\"100%\">
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "DefaultTaxClass", array(), "any"), "1");
            echo ":</td>
\t\t\t\t\t\t\t<td style=\"text-align: right\">";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['taxRate']) ? $context['taxRate'] : null), "default_rate", array(), "any"), "1");
            echo "%</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t";
            // line 27
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_iterator_to_array($this->getAttribute((isset($context['taxRate']) ? $context['taxRate'] : null), "rates", array(), "any"));
            $countable = is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable);
            $length = $countable ? count($context['_seq']) : null;
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if ($countable) {
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context['class'] => $context['rate']) {
                echo "\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<td>";
                // line 29
                echo twig_escape_filter($this->env, (isset($context['class']) ? $context['class'] : null), "1");
                echo ":</td>
\t\t\t\t\t\t\t\t<td style=\"text-align: right\">";
                // line 30
                echo twig_escape_filter($this->env, (isset($context['rate']) ? $context['rate'] : null), "1");
                echo "%</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if ($countable) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['class'], $context['rate'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 32
            echo "\t\t\t\t\t</table>
\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['taxRate']) ? $context['taxRate'] : null), "priority", array(), "any"), "1");
            echo "
\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t<a href=\"#toggle";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['taxRate']) ? $context['taxRate'] : null), "id", array(), "any"), "1");
            echo "\" class=\"toggleTaxRateStatusLink statusToggle";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['taxRate']) ? $context['taxRate'] : null), "enabled", array(), "any"), "1");
            echo "\">
\t\t\t\t\t\t";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Toggle", array(), "any"), "1");
            echo "
\t\t\t\t\t</a>
\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t<a href=\"index.php?ToDo=editTaxRate&amp;id=";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['taxRate']) ? $context['taxRate'] : null), "id", array(), "any"), "1");
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Edit", array(), "any"), "1");
            echo "</a>
\t\t\t\t\t<a href=\"#copy";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['taxRate']) ? $context['taxRate'] : null), "id", array(), "any"), "1");
            echo "\" class=\"copyTaxRateLink\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Copy", array(), "any"), "1");
            echo "</a>
\t\t\t\t\t<a href=\"#\" class=\"deleteTaxRateLink\">";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Delete", array(), "any"), "1");
            echo "</a>
\t\t\t\t</td>
\t\t\t</tr>
\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if ($countable) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['taxRate'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 49
        echo "\t</tbody>
</table>";
    }

}
