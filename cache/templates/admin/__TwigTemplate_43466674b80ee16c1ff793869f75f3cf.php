<?php

/* order.quickview.tpl */
class __TwigTemplate_43466674b80ee16c1ff793869f75f3cf extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        $context['helper'] = $this->env->loadTemplate("order.quickview.tpl", true);
        echo "
";
        // line 12
        echo "
";
        // line 42
        echo "
<div class=\"toolbar\">
\t<h1 id=\"pageTitle\">";
        // line 45
        echo getLang("Order");
        echo " #";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "orderid", array(), "any"), "1");
        echo "</h1>
        <a style=\"position:absolute; left:5px; top:8px; width:30px\" class=\"button\" href=\"javascript:history.go(-2)\" type=\"submit\">";
        // line 46
        echo getLang("Back");
        echo "</a>
\t<a style=\"width:59px\" class=\"button\" href=\"index.php?ToDo=viewOrders\" type=\"submit\">";
        // line 47
        echo getLang("AllOrders");
        echo "</a>
</div>
<ul id=\"order\" title=\"";
        // line 49
        echo getLang("Order");
        echo " #";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "orderid", array(), "any"), "1");
        echo "\" selected=\"true\">
\t";
        // line 50
        echo twig_safe_filter((isset($context['message']) ? $context['message'] : null));
        echo "
\t";
        // line 51
        if ($this->getAttribute((isset($context['order']) ? $context['order'] : null), "deleted", array(), "any")) {
            echo "\t\t<li class=\"deletedOrderNotice\">
\t\t\t<span>";
            // line 53
            echo getLang("iphoneDeletedOrderNotice");
            echo "</span>
\t\t</li>
\t";
        }
        // line 55
        echo "\t<li style=\"height:25px;\" class=\"subMenu\">
\t\t<ul class=\"tab\">
\t\t\t<li id=\"od\" onclick=\"SubMenu(this)\" class=\"tabSelected\">";
        // line 58
        echo getLang("OrderDetails");
        echo "</li>
\t\t\t<li id=\"om\" onclick=\"SubMenu(this)\">";
        // line 59
        echo getLang("OrderMessages");
        echo " ";
        if ($this->getAttribute((isset($context['order']) ? $context['order'] : null), "numunreadmessages", array(), "any") > 0) {
            echo "<div class=\"newIcon newOrderIcon\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "numunreadmessages", array(), "any"), "1");
            echo "</div>";
        }
        echo "</li>
\t\t</ul>
\t</li>
\t<li class=\"group\">";
        // line 62
        echo getLang("OrderItems");
        echo "</li>
\t<li>
\t\t<table width=\"95%\" align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
\t\t\t";
        // line 65
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_iterator_to_array((isset($context['orderAddresses']) ? $context['orderAddresses'] : null));
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
        foreach ($context['_seq'] as $context['addressId'] => $context['orderAddress']) {
            echo "\t\t\t\t";
            // line 66
            if ($this->getAttribute((isset($context['loop']) ? $context['loop'] : null), "length", array(), "any") > 1) {
                echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t";
                // line 69
                if ((isset($context['addressId']) ? $context['addressId'] : null) == 0) {
                    echo "\t\t\t\t\t\t\t\t";
                    // line 70
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "DigitalItemDetails", array(), "any"), "1");
                    echo "
\t\t\t\t\t\t\t";
                } else {
                    // line 71
                    echo "\t\t\t\t\t\t\t\t";
                    // line 72
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Destination", array(), "any"), "1");
                    echo " #";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['loop']) ? $context['loop'] : null), "index", array(), "any"), "1");
                    echo "
\t\t\t\t\t\t\t";
                }
                // line 73
                echo "\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t";
            }
            // line 76
            echo "
\t\t\t\t";
            // line 78
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_iterator_to_array($this->getAttribute((isset($context['orderAddress']) ? $context['orderAddress'] : null), "products", array(), "any"));
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
            foreach ($context['_seq'] as $context['_key'] => $context['product']) {
                echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td style=\"padding-left: 12px; padding-top: 5px\" width=\"70%\" class=\"text\">
\t\t\t\t\t\t\t";
                // line 81
                if ($this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodrefunded", array(), "any") == $this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodqty", array(), "any")) {
                    echo "<del>";
                }
                echo "
\t\t\t\t\t\t\t";
                // line 83
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodqty", array(), "any"), "1");
                echo "
\t\t\t\t\t\t\tx

\t\t\t\t\t\t\t";
                // line 86
                if ($this->getAttribute((isset($context['product']) ? $context['product'] : null), "prodname", array(), "any")) {
                    echo "\t\t\t\t\t\t\t\t<a href=\"";
                    // line 87
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['product']) ? $context['product'] : null), "prodlink", array(), "any"), "1");
                    echo "\" target=\"_blank\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodname", array(), "any"), "1");
                    echo "</a>
\t\t\t\t\t\t\t";
                } else {
                    // line 88
                    echo "\t\t\t\t\t\t\t\t";
                    // line 89
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodname", array(), "any"), "1");
                    echo "
\t\t\t\t\t\t\t";
                }
                // line 90
                echo "
\t\t\t\t\t\t\t";
                // line 92
                if ($this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodrefunded", array(), "any") == $this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodqty", array(), "any")) {
                    echo "</del>";
                }
                echo "
\t\t\t\t\t\t\t";
                // line 94
                if ($this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodsku", array(), "any")) {
                    echo "\t\t\t\t\t\t\t\t<br /><em>";
                    // line 95
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodsku", array(), "any"), "1");
                    echo "</em>
\t\t\t\t\t\t\t";
                }
                // line 96
                echo "
\t\t\t\t\t\t\t";
                // line 98
                if ($this->getAttribute((isset($context['product']) ? $context['product'] : null), "options", array(), "any")) {
                    echo "\t\t\t\t\t\t\t\t<blockquote style=\"padding-left: 10px; margin: 0\">
\t\t\t\t\t\t\t\t\t";
                    // line 100
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_iterator_to_array($this->getAttribute((isset($context['product']) ? $context['product'] : null), "options", array(), "any"));
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
                    foreach ($context['_seq'] as $context['name'] => $context['value']) {
                        echo "\t\t\t\t\t\t\t\t\t\t<div>";
                        // line 101
                        echo twig_escape_filter($this->env, (isset($context['name']) ? $context['name'] : null), "1");
                        echo ": ";
                        echo twig_escape_filter($this->env, (isset($context['value']) ? $context['value'] : null), "1");
                        echo "</div>
\t\t\t\t\t\t\t\t\t";
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
                    unset($context['_seq'], $context['_iterated'], $context['name'], $context['value'], $context['_parent'], $context['loop']);
                    $context = array_merge($_parent, array_intersect_key($context, $_parent));
                    // line 102
                    echo "\t\t\t\t\t\t\t\t</blockquote>
\t\t\t\t\t\t\t";
                }
                // line 104
                echo "
\t\t\t\t\t\t\t";
                // line 106
                if ($this->getAttribute((isset($context['product']) ? $context['product'] : null), "preorder_message", array(), "any")) {
                    echo "\t\t\t\t\t\t\t\t<br />
\t\t\t\t\t\t\t\t<em>(";
                    // line 108
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['product']) ? $context['product'] : null), "preorder_message", array(), "any"), "1");
                    echo ")</em>
\t\t\t\t\t\t\t";
                }
                // line 109
                echo "\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td class=\"text\" width=\"30%\" align=\"right\">
\t\t\t\t\t\t\t";
                // line 112
                echo formatPrice(twig_escape_filter($this->env, $this->getAttribute((isset($context['product']) ? $context['product'] : null), "total", array(), "any"), "1"));
                echo "
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>

\t\t\t\t\t";
                // line 116
                if ($this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodwrapname", array(), "any")) {
                    echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td style=\"padding: 2px 0 2px 15px\">
\t\t\t\t\t\t\t\t";
                    // line 119
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "GiftWrapping", array(), "any"), "1");
                    echo ": ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodwrapname", array(), "any"), "1");
                    echo "
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
                }
                // line 122
                echo "
\t\t\t\t\t";
                // line 124
                if ($this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodeventdate", array(), "any")) {
                    echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td style=\"padding: 2px 0 2px 15px\">
\t\t\t\t\t\t\t\t";
                    // line 127
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodeventname", array(), "any"), "1");
                    echo ": ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodeventdate", array(), "any"), "1");
                    echo "
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
                }
                // line 130
                echo "
\t\t\t\t\t";
                // line 132
                if ($this->getAttribute((isset($context['product']) ? $context['product'] : null), "configurable_fields", array(), "any")) {
                    echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"text\" colspan=\"2\" style=\"padding-left: 20px\">
\t\t\t\t\t\t\t\t<strong>";
                    // line 135
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "ConfigurableFields", array(), "any"), "1");
                    echo "</strong>
\t\t\t\t\t\t\t\t<br />
\t\t\t\t\t\t\t\t<dl class=\"HorizontalFormContainer\">
\t\t\t\t\t\t\t\t\t";
                    // line 138
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_iterator_to_array($this->getAttribute((isset($context['product']) ? $context['product'] : null), "configurable_fields", array(), "any"));
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
                    foreach ($context['_seq'] as $context['_key'] => $context['field']) {
                        echo "\t\t\t\t\t\t\t\t\t\t<dt>";
                        // line 139
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['field']) ? $context['field'] : null), "fieldname", array(), "any"), "1");
                        echo ":</dt>
\t\t\t\t\t\t\t\t\t\t<dd>
\t\t\t\t\t\t\t\t\t\t\t";
                        // line 141
                        if ($this->getAttribute((isset($context['field']) ? $context['field'] : null), "fieldtype", array(), "any") == "file") {
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                            // line 142
                            echo twig_escape_filter($this->env, (isset($context['ShopPath']) ? $context['ShopPath'] : null), "1");
                            echo "/viewfile.php?orderprodfield=";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['field']) ? $context['field'] : null), "orderfieldid", array(), "any"), "1");
                            echo "\" target=\"_blank\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 143
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['field']) ? $context['field'] : null), "originalfilename", array(), "any"), "1");
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif ($this->getAttribute((isset($context['field']) ? $context['field'] : null), "fieldtype", array(), "any") == "checkbox") {
                            // line 145
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 146
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Checked", array(), "any"), "1");
                            echo "
\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (twig_length_filter($this->env, $this->getAttribute((isset($context['field']) ? $context['field'] : null), "textcontents", array(), "any")) > 50) {
                            // line 147
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" onclick=\"Order.LoadOrderProductFieldData(";
                            // line 148
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "orderid", array(), "any"), "1");
                            echo "); return false\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<em>";
                            // line 149
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "More", array(), "any"), "1");
                            echo "</em>
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 151
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 152
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['field']) ? $context['field'] : null), "textcontents", array(), "any"), "1");
                            echo "
\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 153
                        echo "\t\t\t\t\t\t\t\t\t\t</dd>
\t\t\t\t\t\t\t\t\t";
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
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                    $context = array_merge($_parent, array_intersect_key($context, $_parent));
                    // line 155
                    echo "\t\t\t\t\t\t\t\t</dl>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
                }
                // line 159
                echo "
\t\t\t\t\t";
                // line 161
                if (($this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodqtyshipped", array(), "any")) || ($this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodrefunded", array(), "any"))) {
                    echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"text\" colspan=\"2\" style=\"padding-left: 20px\">
\t\t\t\t\t\t\t\t";
                    // line 164
                    if ($this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodqtyshipped", array(), "any")) {
                        echo "\t\t\t\t\t\t\t\t\t<div class=\"Shipped\">
\t\t\t\t\t\t\t\t\t\t";
                        // line 166
                        echo getLang("OrderProductsShippedX", array("quantity" => $this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodqtyshipped", array(), "any")));
                        // line 168
                        echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                    }
                    // line 170
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 172
                    if ($this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodrefunded", array(), "any")) {
                        echo "\t\t\t\t\t\t\t\t\t<div class=\"Refunded\">
\t\t\t\t\t\t\t\t\t\t";
                        // line 174
                        if ($this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodrefunded", array(), "any") == $this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodqty", array(), "any")) {
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                            // line 175
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "OrderProductRefunded", array(), "any"), "1");
                            echo "
\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 176
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                            // line 177
                            echo getLang("OrderProductsRefundedX", array("quantity" => $this->getAttribute((isset($context['product']) ? $context['product'] : null), "ordprodrefunded", array(), "any")));
                            // line 179
                            echo "\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 180
                        echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                    }
                    // line 182
                    echo "\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
                }
                // line 185
                echo "\t\t\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 186
            echo "\t\t\t\t<tr>
\t\t\t\t\t<td colspan=\"2\">
\t\t\t\t\t\t<hr noshade=\"noshade\" size=\"1\" />
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['addressId'], $context['orderAddress'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 192
        echo "\t\t\t";
        // line 193
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_iterator_to_array((isset($context['totalRows']) ? $context['totalRows'] : null));
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
        foreach ($context['_seq'] as $context['id'] => $context['total']) {
            echo "\t\t\t\t<tr>
\t\t\t\t\t<td align=\"right\">";
            // line 195
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['total']) ? $context['total'] : null), "label", array(), "any"), "1");
            echo ":</td>
\t\t\t\t\t<td align=\"right\">";
            // line 196
            echo formatPrice(twig_escape_filter($this->env, $this->getAttribute((isset($context['total']) ? $context['total'] : null), "value", array(), "any"), "1"));
            echo "</td>
\t\t\t\t</tr>
\t\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['total'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 198
        echo "\t\t</table>

\t</li>
\t<li class=\"group\">";
        // line 202
        echo getLang("DateOrdered");
        echo "</li>
\t<li>
\t\t";
        // line 204
        echo $this->getEnvironment()->getExtension('interspire')->dateFormat(twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "orddate", array(), "any"), "1"), "d M Y H:i:s");
        echo "<br />
\t</li>
\t<li class=\"group\">";
        // line 206
        echo getLang("EmailAddress");
        echo "</li>
\t<li>
\t\t";
        // line 208
        if ($this->getAttribute((isset($context['order']) ? $context['order'] : null), "custconemail", array(), "any")) {
            echo "\t\t\t<a href=\"mailto:";
            // line 209
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "custconemail", array(), "any"), "1");
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "custconemail", array(), "any"), "1");
            echo "</a>
\t\t";
        } elseif ($this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordbillemail", array(), "any")) {
            // line 210
            echo "\t\t\t<a href=\"mailto:";
            // line 211
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordbillemail", array(), "any"), "1");
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordbillemail", array(), "any"), "1");
            echo "</a>
\t\t";
        } else {
            // line 212
            echo "\t\t\t";
            // line 213
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "NA", array(), "any"), "1");
            echo "
\t\t";
        }
        // line 214
        echo "\t</li>
\t";
        // line 216
        if (($this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordbillphone", array(), "any")) || ($this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordcustconphone", array(), "any"))) {
            echo "\t\t<li class=\"group\">";
            // line 217
            echo getLang("PhoneNumber");
            echo "</li>
\t\t<li>
\t\t\t";
            // line 219
            if ($this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordbillphone", array(), "any")) {
                echo "\t\t\t\t<a href=\"tel:";
                // line 220
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordbillphone", array(), "any"), "1");
                echo "\" type=\"submit\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordbillphone", array(), "any"), "1");
                echo "</a>
\t\t\t";
            } elseif ($this->getAttribute((isset($context['order']) ? $context['order'] : null), "custconphone", array(), "any")) {
                // line 221
                echo "\t\t\t\t<a href=\"tel:";
                // line 222
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "custconphone", array(), "any"), "1");
                echo "\" type=\"submit\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "custconphone", array(), "any"), "1");
                echo "</a>
\t\t\t";
            }
            // line 223
            echo "\t\t</li>
\t";
        }
        // line 225
        echo "\t<li class=\"group\">";
        // line 226
        echo getLang("BillingDetails");
        echo "</li>
\t<li>
\t\t";
        // line 228
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['helper']) ? $context['helper'] : null), "address", array((isset($context['billingAddress']) ? $context['billingAddress'] : null), ), "method"), "1");
        echo "
\t\t(<span style=\"text-decoration:underline; color:#194FDB\" onclick=\"document.location.href='http://maps.google.com/maps?q=";
        // line 229
        echo (((((((((($this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordbillstreet1", array(), "any")) . (" ")) . ($this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordbillstreet2", array(), "any"))) . (" ")) . ($this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordbillsuburb", array(), "any"))) . (" ")) . ($this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordbillstate", array(), "any"))) . (" ")) . ($this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordbillzip", array(), "any"))) . (" ")) . ($this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordbillcountry", array(), "any"));
        echo "'\">";
        echo getLang("MapThis");
        echo "</span>)<hr />
\t\t";
        // line 230
        if ($this->getAttribute((isset($context['order']) ? $context['order'] : null), "orderpaymentmethod", array(), "any") == false) {
            echo "\t\t\t";
            // line 231
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "NA", array(), "any"), "1");
            echo "
\t\t";
        } elseif (($this->getAttribute((isset($context['order']) ? $context['order'] : null), "orderpaymentmethod", array(), "any") != "storecredit") && ($this->getAttribute((isset($context['order']) ? $context['order'] : null), "orderpaymentmethod", array(), "any") != "giftcertificate")) {
            // line 232
            echo "\t\t\t";
            // line 233
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "orderpaymentmethod", array(), "any"), "1");
            echo "
\t\t";
        }
        // line 234
        echo "
\t\t";
        // line 236
        if ($this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordstorecreditamount", array(), "any") > 0) {
            echo "\t\t\t<div>
\t\t\t\t";
            // line 238
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "PaymentStoreCredit", array(), "any"), "1");
            echo "
\t\t\t\t(";
            // line 239
            echo formatPrice(twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordstorecreditamount", array(), "any"), "1"));
            echo ")
\t\t\t</div>
\t\t";
        }
        // line 241
        echo "
\t\t";
        // line 243
        if ($this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordgiftcertificateamount", array(), "any") > 0) {
            echo "\t\t\t<div>
\t\t\t\t";
            // line 245
            echo getLang("PaymentGiftCertificates", array("orderId" => $this->getAttribute((isset($context['order']) ? $context['order'] : null), "orderid", array(), "any")));
            // line 247
            echo "\t\t\t\t(";
            // line 248
            echo formatPrice(twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordgiftcertificateamount", array(), "any"), "1"));
            echo ")
\t\t\t</div>
\t\t";
        }
        // line 250
        echo "\t</li>
\t";
        // line 252
        if ($this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordisdigital", array(), "any") == 0) {
            echo "\t\t<li class=\"group\">";
            // line 253
            echo getLang("ShippingDetails");
            echo "</li>
\t\t<li>
\t\t\t";
            // line 255
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_iterator_to_array((isset($context['orderAddresses']) ? $context['orderAddresses'] : null));
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
            foreach ($context['_seq'] as $context['_key'] => $context['orderAddress']) {
                echo "\t\t\t\t";
                // line 256
                if ($this->getAttribute((isset($context['orderAddress']) ? $context['orderAddress'] : null), "address", array(), "any")) {
                    echo "\t\t\t\t\t";
                    // line 257
                    if ($this->getAttribute((isset($context['loop']) ? $context['loop'] : null), "length", array(), "any") > 1) {
                        echo "\t\t\t\t\t\t<div>";
                        // line 258
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "Destination", array(), "any"), "1");
                        echo " #";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['loop']) ? $context['loop'] : null), "index", array(), "any"), "1");
                        echo "</div>
\t\t\t\t\t";
                    }
                    // line 259
                    echo "\t\t\t\t\t<div style=\"font-weight: normal; padding-left: 5px\">
\t\t\t\t\t\t";
                    // line 261
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context['helper']) ? $context['helper'] : null), "address", array($this->getAttribute((isset($context['orderAddress']) ? $context['orderAddress'] : null), "address", array(), "any"), ), "method"), "1");
                    echo "
\t\t\t\t\t\t(<span style=\"text-decoration:underline; color:#194FDB\" onclick=\"document.location.href='http://maps.google.com/maps?q=";
                    // line 262
                    echo (((((((((($this->getAttribute($this->getAttribute((isset($context['orderAddress']) ? $context['orderAddress'] : null), "address", array(), "any"), "address_1", array(), "any")) . (" ")) . ($this->getAttribute($this->getAttribute((isset($context['orderAddress']) ? $context['orderAddress'] : null), "address", array(), "any"), "address_2", array(), "any"))) . (" ")) . ($this->getAttribute($this->getAttribute((isset($context['orderAddress']) ? $context['orderAddress'] : null), "address", array(), "any"), "city", array(), "any"))) . (" ")) . ($this->getAttribute($this->getAttribute((isset($context['orderAddress']) ? $context['orderAddress'] : null), "address", array(), "any"), "state", array(), "any"))) . (" ")) . ($this->getAttribute($this->getAttribute((isset($context['orderAddress']) ? $context['orderAddress'] : null), "address", array(), "any"), "zip", array(), "any"))) . (" ")) . ($this->getAttribute($this->getAttribute((isset($context['orderAddress']) ? $context['orderAddress'] : null), "address", array(), "any"), "country", array(), "any"));
                    echo "'\">";
                    echo getLang("MapThis");
                    echo "</span>)
\t\t\t\t\t</div>
\t\t\t\t\t<div style=\"padding-left: 5px; margin-top: 10px;\">
\t\t\t\t\t\t";
                    // line 265
                    if ($this->getAttribute($this->getAttribute((isset($context['orderAddress']) ? $context['orderAddress'] : null), "shipping", array(), "any"), "method", array(), "any")) {
                        echo "\t\t\t\t\t\t\t";
                        // line 266
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context['orderAddress']) ? $context['orderAddress'] : null), "shipping", array(), "any"), "method", array(), "any"), "1");
                        echo " (";
                        echo formatPrice(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context['orderAddress']) ? $context['orderAddress'] : null), "shipping", array(), "any"), "cost", array(), "any"), "1"));
                        echo ")
\t\t\t\t\t\t";
                    }
                    // line 267
                    echo "\t\t\t\t\t</div>
\t\t\t\t\t<hr />
\t\t\t\t";
                }
                // line 270
                echo "\t\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['orderAddress'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 271
            echo "\t\t\t";
            // line 272
            if ($this->getAttribute((isset($context['order']) ? $context['order'] : null), "orddateshipped", array(), "any")) {
                echo "\t\t\t\t";
                // line 273
                echo $this->getEnvironment()->getExtension('interspire')->dateFormat(twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "orddateshipped", array(), "any"), "1"), "DisplayDateFormat");
                echo "
\t\t\t";
            }
            // line 274
            echo "\t\t</li>
\t";
        }
        // line 276
        echo "\t";
        // line 277
        if ($this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordcustmessage", array(), "any")) {
            echo "\t\t<li class=\"group\">";
            // line 278
            echo getLang("OrderComments");
            echo "</li>
\t\t<li>
\t\t\t";
            // line 280
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordcustmessage", array(), "any"), "1"));
            echo "
\t\t</li>
\t";
        }
        // line 282
        echo "\t<li class=\"group\">";
        // line 283
        echo getLang("OrderStatus1");
        echo "</li>
\t<li>
\t\t<div id=\"statusMessage\" style=\"width:94%; margin:-7px 0px 5px -10px; display:none; z-index: 10; background: url('images/info.gif') 5px 5px #FFF1AC; background-repeat:no-repeat; padding:5px 0px 5px 30px\" onclick=\"this.style.display='none';\">";
        // line 285
        echo getLang("StatusUpdatedShort");
        echo "</div>
\t\t<select id=\"orderStatus\" style=\"width:98%; font-size:16px\" onblur=\"UpdateOrderStatus(this.value)\" ";
        // line 286
        if ($this->getAttribute((isset($context['order']) ? $context['order'] : null), "deleted", array(), "any")) {
            echo "disabled=\"disabled\"";
        }
        echo ">
\t\t\t";
        // line 287
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_iterator_to_array((isset($context['orderStatuses']) ? $context['orderStatuses'] : null));
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
        foreach ($context['_seq'] as $context['id'] => $context['name']) {
            echo "\t\t\t\t<option value=\"";
            // line 288
            echo twig_escape_filter($this->env, (isset($context['id']) ? $context['id'] : null), "1");
            echo "\" ";
            if ($this->getAttribute((isset($context['order']) ? $context['order'] : null), "ordstatus", array(), "any") == (isset($context['id']) ? $context['id'] : null)) {
                echo "selected=\"selected\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, (isset($context['name']) ? $context['name'] : null), "1");
            echo "</option>
\t\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 289
        echo "\t\t</select>
\t\t<img id=\"statusLoader\" style=\"display:none\" src=\"images/ajax-loader.gif\" width=\"16\" height=\"16\" />
\t</li>
\t";
        // line 293
        if ((!$this->getAttribute((isset($context['order']) ? $context['order'] : null), "deleted", array(), "any"))) {
            echo "\t\t<li class=\"group\">";
            // line 294
            echo getLang("DeleteOrder");
            echo "</li>
\t\t<li>
\t\t\t<form id=\"frmDelete\" method=\"post\" action=\"index.php?ToDo=deleteOrders\" onsubmit=\"return CheckDeleteOrder()\">
\t\t\t\t<input type=\"hidden\" name=\"orders[]\" value=\"";
            // line 297
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "orderid", array(), "any"), "1");
            echo "\" />
\t\t\t\t<input type=\"submit\" value=\"";
            // line 298
            echo getLang("DeleteThisOrder");
            echo "\" style=\"width:98%\" />
\t\t\t</form>
\t\t</li>
\t";
        }
        // line 301
        echo "</ul>

<script type=\"text/javascript\">
\tfunction UpdateOrderStatus(Status) {
\t\tvar os = document.getElementById(\"orderStatus\");
\t\tvar sl = document.getElementById(\"statusLoader\");
\t\tos.style.width = \"90%\";
\t\tos.style.margin = \"0px 5px 0px 0px\";
\t\tsl.style.display = \"\";

\t\t\$.ajax({
\t\t\ttype: \"POST\",
\t\t\turl: \"remote.php\",
\t\t\tdata: \"w=updateOrderStatus&o=";
        // line 315
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "orderid", array(), "any"), "1");
        echo "&s=\"+Status,
\t\t\tsuccess: function(msg){
\t\t\t\t\$('#statusMessage').css('display', 'block');
\t\t\t\tos.style.width = \"98%\";
\t\t\t\tsl.style.display = \"none\";
\t\t\t\twindow.setTimeout(\"\$('#statusMessage').hide();\", 3000);
\t\t\t}
\t\t});
\t}

\tfunction CheckDeleteOrder() {
\t\tif(confirm(\"";
        // line 326
        echo getLang("AreYouSureShort");
        echo "\")) {
\t\t\treturn true;
\t\t}
\t\telse {
\t\t\treturn false;
\t\t}
\t}

\tfunction SubMenu(Tab) {
\t\tswitch(Tab.id) {
\t\t\tcase \"od\": {
\t\t\t\tdocument.location.reload();
\t\t\t\tbreak;
\t\t\t}
\t\t\tcase \"om\": {
\t\t\t\tdocument.location.href = \"index.php?ToDo=viewOrderMessages&orderId=";
        // line 341
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "orderid", array(), "any"), "1");
        echo "\";
\t\t\t\tbreak;
\t\t\t}
\t\t}
\t}

\t\$(function(){
\t\t\$('.deletedOrderNotice .restoreOrderLink').click(function(event){
\t\t\tevent.preventDefault();
\t\t\tif (!confirm(\"";
        // line 350
        echo Interspire_Template_Extension::jsFilter(getLang("iphoneRestoreOrderConfirmation"), "'");
        echo "\")) {
\t\t\t\treturn;
\t\t\t}

\t\t\tvar id = ";
        // line 354
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "orderid", array(), "any"), "1");
        echo ";
\t\t\t\$.ajax({
\t\t\t\ttype: 'POST',
\t\t\t\turl: 'remote.php',
\t\t\t\tdata: {
\t\t\t\t\tremoteSection: 'orders',
\t\t\t\t\tw: 'restoreOrder',
\t\t\t\t\torderId: ";
        // line 361
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['order']) ? $context['order'] : null), "orderid", array(), "any"), "1");
        echo ",
\t\t\t\t},
\t\t\t\tdataType: 'json',
\t\t\t\tsuccess: function (data) {
\t\t\t\t\tif (data && data.success) {
\t\t\t\t\t\tlocation.reload();
\t\t\t\t\t\treturn;
\t\t\t\t\t}
\t\t\t\t\talert(\"";
        // line 369
        echo Interspire_Template_Extension::jsFilter(getLang("iphoneRestoreOrderError"), "'");
        echo "\");
\t\t\t\t},
\t\t\t\terror: function () {
\t\t\t\t\talert(\"";
        // line 372
        echo Interspire_Template_Extension::jsFilter(getLang("iphoneRestoreOrderError"), "'");
        echo "\");
\t\t\t\t}
\t\t\t});
\t\t});
\t});

</script>
";
    }

    // line 3
    public function getcustomFormField($field = null)
    {
        $context = array(
            "field" => $field,
        );

        echo "\t<tr>
\t\t<td class=\"text\" width=\"120\" valign=\"top\">
\t\t\t";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['field']) ? $context['field'] : null), "label", array(), "any"), "1");
        echo "
\t\t</td>
\t\t<td class=\"text\">
\t\t\t";
        // line 9
        echo twig_join_filter(twig_escape_filter($this->env, $this->getAttribute((isset($context['field']) ? $context['field'] : null), "value", array(), "any"), "1"), "<br />");
        echo "
\t\t</td>
\t</tr>
";
    }

    // line 14
    public function getaddress($address = null)
    {
        $context = array(
            "address" => $address,
        );

        echo "\t";
        // line 15
        if (($this->getAttribute((isset($context['address']) ? $context['address'] : null), "firstname", array(), "any")) || ($this->getAttribute((isset($context['address']) ? $context['address'] : null), "lastname", array(), "any"))) {
            echo "\t\t<div>";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['address']) ? $context['address'] : null), "firstname", array(), "any"), "1");
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['address']) ? $context['address'] : null), "lastname", array(), "any"), "1");
            echo "</div>
\t";
        } else {
            // line 17
            echo "\t\t<div>";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['address']) ? $context['address'] : null), "first_name", array(), "any"), "1");
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['address']) ? $context['address'] : null), "last_name", array(), "any"), "1");
            echo "</div>
\t";
        }
        // line 19
        echo "
\t<div>";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['address']) ? $context['address'] : null), "company", array(), "any"), "1");
        echo "</div>

\t";
        // line 23
        if (($this->getAttribute((isset($context['address']) ? $context['address'] : null), "address1", array(), "any")) || ($this->getAttribute((isset($context['address']) ? $context['address'] : null), "address2", array(), "any"))) {
            echo "\t\t<div>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['address']) ? $context['address'] : null), "address1", array(), "any"), "1");
            echo "</div>
\t\t<div>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['address']) ? $context['address'] : null), "address2", array(), "any"), "1");
            echo "</div>
\t";
        } else {
            // line 26
            echo "\t\t<div>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['address']) ? $context['address'] : null), "address_1", array(), "any"), "1");
            echo "</div>
\t\t<div>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['address']) ? $context['address'] : null), "address_2", array(), "any"), "1");
            echo "</div>
\t";
        }
        // line 29
        echo "
\t<div>
\t\t";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['address']) ? $context['address'] : null), "city", array(), "any"), "1");
        if (($this->getAttribute((isset($context['address']) ? $context['address'] : null), "city", array(), "any")) && (($this->getAttribute((isset($context['address']) ? $context['address'] : null), "state", array(), "any")) || ($this->getAttribute((isset($context['address']) ? $context['address'] : null), "zip", array(), "any")))) {
            echo ", ";
        }
        echo "\t\t";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['address']) ? $context['address'] : null), "state", array(), "any"), "1");
        if (($this->getAttribute((isset($context['address']) ? $context['address'] : null), "state", array(), "any")) && ($this->getAttribute((isset($context['address']) ? $context['address'] : null), "zip", array(), "any"))) {
            echo ", ";
        }
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['address']) ? $context['address'] : null), "zip", array(), "any"), "1");
        echo "
\t</div>
\t<div>
\t\t";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['address']) ? $context['address'] : null), "country", array(), "any"), "1");
        echo "

\t\t";
        // line 38
        if ($this->getAttribute((isset($context['address']) ? $context['address'] : null), "countryFlag", array(), "any")) {
            echo "\t\t\t<img src=\"../lib/flags/";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['address']) ? $context['address'] : null), "countryFlag", array(), "any"), "1");
            echo ".gif\" style=\"vertical-align: middle\" alt=\"\" />
\t\t";
        }
        // line 40
        echo "\t</div>
";
    }

}
