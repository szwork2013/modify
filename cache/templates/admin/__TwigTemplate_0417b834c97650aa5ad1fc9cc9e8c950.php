<?php

/* export.grid.row.tpl */
class __TwigTemplate_0417b834c97650aa5ad1fc9cc9e8c950 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<tr class=\"GridRow\" onmouseover=\"this.className='GridRowOver'\" onmouseout=\"this.className='GridRow'\">
\t";
        // line 2
        echo twig_safe_filter((isset($context['RowData']) ? $context['RowData'] : null));
        echo "
</tr>";
    }

}
