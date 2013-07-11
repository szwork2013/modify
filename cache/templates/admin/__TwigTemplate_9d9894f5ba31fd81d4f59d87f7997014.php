<?php

/* customer.quickorderall.tpl */
class __TwigTemplate_9d9894f5ba31fd81d4f59d87f7997014 extends Twig_Template
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
