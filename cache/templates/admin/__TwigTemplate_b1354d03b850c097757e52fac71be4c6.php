<?php

/* customer.quickorderall.tpl */
class __TwigTemplate_b1354d03b850c097757e52fac71be4c6 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<input class=\"Text\" style=\"width:170px\" type=\"button\" value=\"";
        echo getLang("ViewCompleteOrderDetails");
        echo "\" onclick=\"document.location.href='index.php?ToDo=viewOrders&customerId=";
        echo twig_safe_filter((isset($context['CustomerId']) ? $context['CustomerId'] : null));
        echo "'\" />";
    }

}
