<?php

/* password.frontend.html */
class __TwigTemplate_ce13f0d5d067aee5016a22426c4c4acd extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<input type=\"password\" autocomplete=\"off\" ";
        echo twig_safe_filter((isset($context['FormFieldDefaultArgs']) ? $context['FormFieldDefaultArgs'] : null));
        echo " value=\"\" />
<div class=\"LittleNotePassword\" style=\"display: ";
        // line 2
        echo twig_safe_filter((isset($context['FormFieldHidePasswordMsg']) ? $context['FormFieldHidePasswordMsg'] : null));
        echo "\">(";
        echo getLang("CustomFieldsPasswordMsg");
        echo ")</div>
";
    }

}
