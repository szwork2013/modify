<?php

/* customer.quickorderall.tpl */
class __TwigTemplate_c2a7c249755225eb7f0a5069991df05c extends Twig_Template
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
