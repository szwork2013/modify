<?php

/* Snippets/DashboardRecentOrdersItem.html */
class __TwigTemplate_db19fb928de4c63d40eb75c76dd83352 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<li>
\t<span class=\"OrderStatus OrderStatus";
        // line 2
        echo twig_safe_filter((isset($context['OrderStatusId']) ? $context['OrderStatusId'] : null));
        echo "\">";
        echo twig_safe_filter((isset($context['OrderStatus']) ? $context['OrderStatus'] : null));
        echo "</span>
\t<span class=\"OrderDetails\">
\t\t<a href=\"index.php?ToDo=viewOrders&amp;orderId=";
        // line 4
        echo twig_safe_filter((isset($context['OrderId']) ? $context['OrderId'] : null));
        echo "\">Order #";
        echo twig_safe_filter((isset($context['OrderId']) ? $context['OrderId'] : null));
        echo " - ";
        echo twig_safe_filter((isset($context['CustomerName']) ? $context['CustomerName'] : null));
        echo "</a>
\t\t<small>";
        // line 5
        echo twig_safe_filter((isset($context['OrderSummary']) ? $context['OrderSummary'] : null));
        echo "</small>
\t</span>
</li>";
    }

}
