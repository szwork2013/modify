<?php

/* password.frontend.html */
class __TwigTemplate_bd624fc8759a4d425ca5a48a556ec317 extends Twig_Template
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
