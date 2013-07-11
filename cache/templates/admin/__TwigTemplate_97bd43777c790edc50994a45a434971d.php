<?php

/* Snippets/PageRSSItemHelp.html */
class __TwigTemplate_97bd43777c790edc50994a45a434971d extends Twig_Template
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
