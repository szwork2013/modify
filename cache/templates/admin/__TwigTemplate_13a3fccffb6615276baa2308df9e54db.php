<?php

/* export.grid.row.tpl */
class __TwigTemplate_13a3fccffb6615276baa2308df9e54db extends Twig_Template
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
