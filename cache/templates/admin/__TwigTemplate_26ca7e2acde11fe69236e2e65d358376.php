<?php

/* Snippets/PageRSSItemHelp.html */
class __TwigTemplate_26ca7e2acde11fe69236e2e65d358376 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<li><a href=\"javascript: LaunchHelp('";
        echo twig_safe_filter((isset($context['RSSLink']) ? $context['RSSLink'] : null));
        echo "');\">";
        echo twig_safe_filter((isset($context['RSSTitle']) ? $context['RSSTitle'] : null));
        echo "</a></li>";
    }

}
