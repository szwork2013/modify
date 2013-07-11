<?php

/* exporttemplates.form.grid.tpl */
class __TwigTemplate_c84c15541c011456d907ad8a52aefd6e extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<ul class=\"SortableList\" id=\"";
        echo twig_safe_filter((isset($context['TypeName']) ? $context['TypeName'] : null));
        echo "FieldList\">
\t";
        // line 2
        echo twig_safe_filter((isset($context['GridData']) ? $context['GridData'] : null));
        echo "
</ul>";
    }

}
