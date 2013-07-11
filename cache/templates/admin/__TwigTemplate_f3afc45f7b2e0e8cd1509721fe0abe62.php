<?php

/* order.form.item.tpl */
class __TwigTemplate_f3afc45f7b2e0e8cd1509721fe0abe62 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        $context['orderform'] = $this->env->loadTemplate("macros/orderform.tpl", true);
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['orderform']) ? $context['orderform'] : null), "quoteItemGridItem", array((isset($context['item']) ? $context['item'] : null), (isset($context['config']) ? $context['config'] : null), ), "method"), "1");
        echo "
";
    }

}
