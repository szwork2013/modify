<?php

/* Snippets/DashboardAtGlanceItem.html */
class __TwigTemplate_66d4cd1f281a5e94969e9f900afb8ce0 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<li class=\"";
        echo twig_safe_filter((isset($context['Class']) ? $context['Class'] : null));
        echo "\">
\t<a href=\"";
        // line 2
        echo twig_safe_filter((isset($context['Link']) ? $context['Link'] : null));
        echo "\">
\t\t<span class=\"DashboardAtAGlanceIcon\">";
        // line 3
        echo twig_safe_filter((isset($context['Count']) ? $context['Count'] : null));
        echo "</span>
\t\t<span class=\"DashboardAtAGlanceTitle\">";
        // line 4
        echo twig_safe_filter((isset($context['Label']) ? $context['Label'] : null));
        echo "</span>
\t</a>
</li>";
    }

}
