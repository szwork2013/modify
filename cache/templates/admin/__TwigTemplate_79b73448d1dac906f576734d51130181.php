<?php

/* exporttemplates.form.tab.tpl */
class __TwigTemplate_79b73448d1dac906f576734d51130181 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<li><a href=\"#\" id=\"tab";
        echo twig_safe_filter((isset($context['FileIndex']) ? $context['FileIndex'] : null));
        echo "\" onclick=\"ShowTab(";
        echo twig_safe_filter((isset($context['FileIndex']) ? $context['FileIndex'] : null));
        echo ")\" ";
        echo twig_safe_filter((isset($context['TabDisplay']) ? $context['TabDisplay'] : null));
        echo ">";
        echo twig_safe_filter((isset($context['TypeTitle']) ? $context['TypeTitle'] : null));
        echo "</a></li>";
    }

}
