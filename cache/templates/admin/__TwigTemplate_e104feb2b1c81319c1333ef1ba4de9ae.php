<?php

/* singleline.frontend.html */
class __TwigTemplate_e104feb2b1c81319c1333ef1ba4de9ae extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<input type=\"text\" ";
        echo twig_safe_filter((isset($context['FormFieldDefaultArgs']) ? $context['FormFieldDefaultArgs'] : null));
        echo " value=\"";
        echo twig_safe_filter((isset($context['FormFieldValue']) ? $context['FormFieldValue'] : null));
        echo "\" />";
    }

}
