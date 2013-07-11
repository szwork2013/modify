<?php

/* customer.address.form.tpl */
class __TwigTemplate_1f711b248b3f7c521c402c3f117b17e2 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        $context['util'] = $this->env->loadTemplate("macros/util.tpl", true);
        // line 2
        $context['formBuilder'] = $this->env->loadTemplate("macros/forms.tpl", true);
        echo "<script type=\"text/javascript\" src=\"../javascript/formfield.js?";
        // line 3
        echo twig_escape_filter($this->env, (isset($context['JSCacheToken']) ? $context['JSCacheToken'] : null), "1");
        echo "\"></script>
<form action=\"index.php?ToDo=";
        // line 4
        echo twig_safe_filter((isset($context['FormAction']) ? $context['FormAction'] : null));
        echo "\" onsubmit=\"return ValidateForm(checkAddCustomerAddressForm)\" id=\"frmCustomerAddress\" method=\"post\">
\t<input type=\"hidden\" name=\"addressId\" id=\"addressId\" value=\"";
        // line 5
        echo twig_safe_filter((isset($context['AddressId']) ? $context['AddressId'] : null));
        echo "\">
\t<input type=\"hidden\" name=\"customerId\" id=\"customerId\" value=\"";
        // line 6
        echo twig_safe_filter((isset($context['CustomerId']) ? $context['CustomerId'] : null));
        echo "\">
\t<input type=\"hidden\" name=\"newCustomer\" id=\"newCustomer\" value=\"";
        // line 7
        echo twig_safe_filter((isset($context['NewCustomer']) ? $context['NewCustomer'] : null));
        echo "\">
\t<input type=\"hidden\" name=\"customFieldsAddressFormId\" id=\"customFieldsAddressFormId\" value=\"";
        // line 8
        echo twig_safe_filter((isset($context['CustomFieldsAddressFormId']) ? $context['CustomFieldsAddressFormId'] : null));
        echo "\">
\t<input id=\"currentTab\" name=\"currentTab\" value=\"0\" type=\"hidden\">
\t<div id=\"content\">

\t\t<h1>";
        // line 12
        echo twig_safe_filter((isset($context['Title']) ? $context['Title'] : null));
        echo "</h1>
\t\t<p class=\"intro\">
\t\t\t";
        // line 14
        echo twig_safe_filter((isset($context['Intro']) ? $context['Intro'] : null));
        echo "
\t\t</p>

\t\t";
        // line 17
        echo twig_safe_filter((isset($context['Message']) ? $context['Message'] : null));
        echo "

\t\t";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startButtonRow", array(), "any"), "1");
        echo "
\t\t\t<input type=\"submit\" value=\"";
        // line 20
        echo getLang("SaveAndExit");
        echo "\" class=\"FormButton\" name=\"SaveButton1\" />
\t\t\t<input type=\"submit\" value=\"";
        // line 21
        echo twig_safe_filter((isset($context['SaveAndAddAnother']) ? $context['SaveAndAddAnother'] : null));
        echo "\" name=\"SaveAddAnotherButton1\" onclick=\"saveAndAddAnother();\" class=\"FormButton Field150\" />
\t\t\t<input type=\"reset\" value=\"";
        // line 22
        echo getLang("Cancel");
        echo "\" class=\"FormButton\" name=\"CancelButton1\" onclick=\"confirmCancel()\" />
\t\t";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endButtonRow", array(), "any"), "1");
        echo "

\t\t<ul id=\"tabnav\">
\t\t\t<li><a href=\"#\" id=\"tab0\" onclick=\"ShowTab(0)\" class=\"active\">";
        // line 26
        echo getLang("CustomerAddressDetails");
        echo "</a></li>
\t\t</ul>

\t\t<div id=\"div0\">
\t\t\t<p class=\"intro\">
\t\t\t\t";
        // line 31
        echo getLang("CustomerAddressDetailsIntro");
        echo "\t\t\t</p>

\t\t\t";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startForm", array(), "any"), "1");
        echo "
\t\t\t\t";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "heading", array($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "CustomerAddressDetails", array(), "any"), ), "method"), "1");
        echo "

\t\t\t\t";
        // line 37
        echo twig_safe_filter((isset($context['AddressFields']) ? $context['AddressFields'] : null));
        echo "

\t\t\t\t";
        // line 39
        echo twig_safe_filter((isset($context['CustomFields']) ? $context['CustomFields'] : null));
        echo "

\t\t\t\t";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startButtonRow", array(), "any"), "1");
        echo "
\t\t\t\t\t<input type=\"submit\" value=\"";
        // line 42
        echo getLang("SaveAndExit");
        echo "\" name=\"SaveButton2\" class=\"FormButton\" />
\t\t\t\t\t<input type=\"submit\" value=\"";
        // line 43
        echo twig_safe_filter((isset($context['SaveAndAddAnother']) ? $context['SaveAndAddAnother'] : null));
        echo "\" name=\"SaveAddAnotherButton2\" onclick=\"saveAndAddAnother();\" class=\"FormButton Field150\" />
\t\t\t\t\t<input type=\"reset\" value=\"";
        // line 44
        echo getLang("Cancel");
        echo "\" name=\"CancelButton2\" class=\"FormButton\" onclick=\"confirmCancel()\" />
\t\t\t\t";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endButtonRow", array(), "any"), "1");
        echo "
\t\t\t";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endForm", array(), "any"), "1");
        echo "
\t\t</div>
\t</div>
</form>

<script type=\"text/javascript\"><!--

\tfunction saveAndAddAnother() {
\t\tMakeHidden('addanother', '1', 'frmCustomerAddress');
\t}

\tfunction confirmCancel() {
\t\tif(confirm('";
        // line 58
        echo twig_safe_filter((isset($context['CancelMessage']) ? $context['CancelMessage'] : null));
        echo "')) {
\t\t\tif (\"";
        // line 59
        echo twig_safe_filter((isset($context['CancelGoToManager']) ? $context['CancelGoToManager'] : null));
        echo "\" == \"1\") {
\t\t\t\tdocument.getElementById('frmCustomerAddress').action = 'index.php?ToDo=viewCustomers';
\t\t\t} else {
\t\t\t\tdocument.getElementById('frmCustomerAddress').action = 'index.php?ToDo=editCustomer&customerId=";
        // line 62
        echo twig_safe_filter((isset($context['CustomerId']) ? $context['CustomerId'] : null));
        echo "';
\t\t\t\tMakeHidden('currentTab', '1', 'frmCustomerAddress');
\t\t\t}

\t\t\tdocument.getElementById('frmCustomerAddress').submit();
\t\t\treturn false;
\t\t} else {
\t\t\treturn false;
\t\t}
\t}

\tfunction checkAddCustomerAddressForm()
\t{
\t\tvar formfields = FormField.GetValues(";
        // line 75
        echo twig_safe_filter((isset($context['CustomFieldsAddressFormId']) ? $context['CustomFieldsAddressFormId'] : null));
        echo ");

\t\tfor (var i=0; i<formfields.length; i++) {
\t\t\tvar rtn = FormField.Validate(formfields[i].field);

\t\t\tif (!rtn.status) {
\t\t\t\talert(rtn.msg);
\t\t\t\tFormField.Focus(formfields[i].field);
\t\t\t\treturn false;
\t\t\t}
\t\t}

\t\treturn true;
\t}

\t";
        // line 90
        echo twig_safe_filter((isset($context['FormFieldEventData']) ? $context['FormFieldEventData'] : null));
        echo "

//--></script>";
    }

}
