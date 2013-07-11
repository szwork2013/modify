<?php

/* error.tpl */
class __TwigTemplate_1d5795dae4a19ad1ebaadf0a2079254e extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<div id=\"content\">
\t<h1>";
        // line 2
        echo twig_safe_filter((isset($context['ErrorTitle']) ? $context['ErrorTitle'] : null));
        echo "</h1>
\t<p class=\"intro\">
\t\t";
        // line 4
        echo twig_safe_filter((isset($context['Message']) ? $context['Message'] : null));
        echo "
\t</p>
</div>";
    }

}
