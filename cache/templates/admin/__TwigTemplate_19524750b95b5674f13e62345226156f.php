<?php

/* Snippets/PageRSSItemHelp.html */
class __TwigTemplate_19524750b95b5674f13e62345226156f extends Twig_Template
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
