<?php

/* Snippets/PaymentValidation_generic.creditcard.html */
class __TwigTemplate_e9057f5eecf7e77d826b7c38c85381c8 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<script type=\"text/javascript\">
\tvar PaymentValidation_";
        // line 2
        echo twig_safe_filter((isset($context['PaymentMethodId']) ? $context['PaymentMethodId'] : null));
        echo " = {
\t\tcc_name: \$(\":input[name='paymentField[";
        // line 3
        echo twig_safe_filter((isset($context['PaymentMethodId']) ? $context['PaymentMethodId'] : null));
        echo "][creditcard_name]']\"),
\t\tcc_cctype: \$(\":input[name='paymentField[";
        // line 4
        echo twig_safe_filter((isset($context['PaymentMethodId']) ? $context['PaymentMethodId'] : null));
        echo "][creditcard_cctype]']\"),
\t\tcc_ccno: \$(\":input[name='paymentField[";
        // line 5
        echo twig_safe_filter((isset($context['PaymentMethodId']) ? $context['PaymentMethodId'] : null));
        echo "][creditcard_ccno]']\"),
\t\tcc_cccvd: \$(\":input[name='paymentField[";
        // line 6
        echo twig_safe_filter((isset($context['PaymentMethodId']) ? $context['PaymentMethodId'] : null));
        echo "][creditcard_cccvd]']\"),
\t\tcc_ccexpm: \$(\":input[name='paymentField[";
        // line 7
        echo twig_safe_filter((isset($context['PaymentMethodId']) ? $context['PaymentMethodId'] : null));
        echo "][creditcard_ccexpm]']\"),
\t\tcc_ccexpy: \$(\":input[name='paymentField[";
        // line 8
        echo twig_safe_filter((isset($context['PaymentMethodId']) ? $context['PaymentMethodId'] : null));
        echo "][creditcard_ccexpy]']\"),
\t\tcc_ccissueno: \$(\":input[name='paymentField[";
        // line 9
        echo twig_safe_filter((isset($context['PaymentMethodId']) ? $context['PaymentMethodId'] : null));
        echo "][creditcard_issueno]']\"),
\t\tcc_ccissuedatem: \$(\":input[name='paymentField[";
        // line 10
        echo twig_safe_filter((isset($context['PaymentMethodId']) ? $context['PaymentMethodId'] : null));
        echo "][creditcard_issuedatem]']\"),
\t\tcc_ccissuedatey: \$(\":input[name='paymentField[";
        // line 11
        echo twig_safe_filter((isset($context['PaymentMethodId']) ? $context['PaymentMethodId'] : null));
        echo "][creditcard_issuedatey]']\"),

\t\tpayment_form: \$(\"#paymentMethodForm_";
        // line 13
        echo twig_safe_filter((isset($context['PaymentMethodId']) ? $context['PaymentMethodId'] : null));
        echo "\"),

\t\tcheckForm: function() {
\t\t\tvar obj = PaymentValidation_";
        // line 16
        echo twig_safe_filter((isset($context['PaymentMethodId']) ? $context['PaymentMethodId'] : null));
        echo ";

\t\t\tif(obj.cc_name.val() == \"\") {
\t\t\t\talert(\"";
        // line 19
        echo getLang("CCManualEnterName");
        echo "\");
\t\t\t\tobj.cc_name.focus();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(obj.cc_cctype.val() == \"\") {
\t\t\t\talert(\"";
        // line 25
        echo getLang("CCManualChooseCardType");
        echo "\");
\t\t\t\tobj.cc_cctype.focus();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(isNaN(obj.cc_ccno.val()) || obj.cc_ccno.val() == \"\" || !obj.validateCreditCard()) {
\t\t\t\talert(\"";
        // line 31
        echo getLang("CCManualEnterCardNumber");
        echo "\");
\t\t\t\tobj.cc_ccno.focus();
\t\t\t\tobj.cc_ccno.select();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(obj.requiresCVV2() && (obj.cc_cccvd.val() == \"\" || isNaN(obj.cc_cccvd.val()) || obj.cc_cccvd.val().length > 4)) {
\t\t\t\talert(\"";
        // line 38
        echo getLang("CCManualEnterCVV2Number");
        echo "\");
\t\t\t\tobj.cc_cccvd.focus();
\t\t\t\tobj.cc_cccvd.select();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(obj.cc_ccexpm.selectedIndex == 0) {
\t\t\t\talert(\"";
        // line 45
        echo getLang("CCManualEnterCreditCardMonth");
        echo "\");
\t\t\t\tobj.cc_ccexpm.focus();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(obj.cc_ccexpy.selectedIndex == 0) {
\t\t\t\talert(\"";
        // line 51
        echo getLang("CCManualEnterCreditCardYear");
        echo "\");
\t\t\t\tobj.cc_ccexpy.focus();
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(obj.hasIssueNo() && (obj.cc_ccissueno.val() == \"\" || isNaN(obj.cc_ccissueno.val())) ) {
\t\t\t\tif(obj.hasIssueDate() && (obj.cc_ccissuedatem.val() == \"\"  || obj.cc_ccissuedatem.val() == \"\")) {
\t\t\t\t\talert(\"";
        // line 58
        echo getLang("CCManualEnterIssueDetails");
        echo "\");
\t\t\t\t\tobj.cc_ccissueno.focus();
\t\t\t\t\treturn false;
\t\t\t\t}
\t\t\t}

\t\t\treturn true;
\t\t},

\t\tvalidateCreditCard: function() {
\t\t\tvar number = PaymentValidation_";
        // line 68
        echo twig_safe_filter((isset($context['PaymentMethodId']) ? $context['PaymentMethodId'] : null));
        echo ".cc_ccno.val();

\t\t\t// Strip any non-digits (useful for credit card numbers with spaces and hyphens)
\t\t\tnumber=number.replace(/\\D/g, '');

\t\t\t// Set the string length and parity
\t\t\tvar number_length=number.length;
\t\t\tvar parity=number_length % 2;

\t\t\t// Loop through each digit and do the maths
\t\t\tvar total=0;
\t\t\tfor (i=0; i < number_length; i++) {
\t\t\t\tvar digit=number.charAt(i);
\t\t\t\t// Multiply alternate digits by two
\t\t\t\tif (i % 2 == parity) {
\t\t\t\t\tdigit=digit * 2;
\t\t\t\t\t// If the sum is two digits, add them together (in effect)
\t\t\t\t\tif (digit > 9) {
\t\t\t\t\t\tdigit=digit - 9;
\t\t\t\t\t}
\t\t\t\t}
\t\t\t\t// Total up the digits
\t\t\t\ttotal = total + parseInt(digit);
\t\t\t}

\t\t\t// If the total mod 10 equals 0, the number is valid
\t\t\tif (total % 10 == 0) {
\t\t\t\treturn true;
\t\t\t} else {
\t\t\t\treturn false;
\t\t\t}
\t\t},

\t\trequiresCVV2: function() {
\t\t\tvar type = PaymentValidation_";
        // line 102
        echo twig_safe_filter((isset($context['PaymentMethodId']) ? $context['PaymentMethodId'] : null));
        echo ".cc_cctype;
\t\t\tif(type.val()) {
\t\t\t\tif (type.find('option:selected').hasClass('requiresCVV2')) {
\t\t\t\t\treturn true;
\t\t\t\t}
\t\t\t\telse {
\t\t\t\t\treturn false;
\t\t\t\t}
\t\t\t}
\t\t\telse {
\t\t\t\treturn false;
\t\t\t}
\t\t},

\t\thasIssueDate: function() {
\t\t\tvar type = PaymentValidation_";
        // line 117
        echo twig_safe_filter((isset($context['PaymentMethodId']) ? $context['PaymentMethodId'] : null));
        echo ".cc_cctype;
\t\t\tif(type.val()) {
\t\t\t\tif (type.find('option:selected').hasClass('hasIssueDate')) {
\t\t\t\t\treturn true;
\t\t\t\t}
\t\t\t\telse {
\t\t\t\t\treturn false;
\t\t\t\t}
\t\t\t}
\t\t\telse {
\t\t\t\treturn false;
\t\t\t}
\t\t},

\t\thasIssueNo: function() {
\t\t\tvar type = PaymentValidation_";
        // line 132
        echo twig_safe_filter((isset($context['PaymentMethodId']) ? $context['PaymentMethodId'] : null));
        echo ".cc_cctype;
\t\t\tif(type.val()) {
\t\t\t\tif (type.find('option:selected').hasClass('hasIssueNo')) {
\t\t\t\t\treturn true;
\t\t\t\t}
\t\t\t\telse {
\t\t\t\t\treturn false;
\t\t\t\t}
\t\t\t}
\t\t\telse {
\t\t\t\treturn false;
\t\t\t}
\t\t},

\t\tupdateCreditCardType: function() {
\t\t\tvar obj = PaymentValidation_";
        // line 147
        echo twig_safe_filter((isset($context['PaymentMethodId']) ? $context['PaymentMethodId'] : null));
        echo ";

\t\t\tif(obj.requiresCVV2()) {
\t\t\t\tobj.payment_form.find('.Field_creditcard_cccvd').show();
\t\t\t}
\t\t\telse {
\t\t\t\tobj.payment_form.find('.Field_creditcard_cccvd').hide();
\t\t\t}
\t\t\tif(obj.hasIssueNo()) {
\t\t\t\tobj.payment_form.find('.Field_creditcard_issueno').show();
\t\t\t}
\t\t\telse {
\t\t\t\tobj.payment_form.find('.Field_creditcard_issueno').hide();
\t\t\t}
\t\t\tif(obj.hasIssueDate()) {
\t\t\t\tobj.payment_form.find('.Field_creditcard_issuedate').show();
\t\t\t}
\t\t\telse {
\t\t\t\tobj.payment_form.find('.Field_creditcard_issuedate').hide();
\t\t\t}
\t\t}
\t};

\t\$(document).ready(function() {
\t\tPaymentValidation_";
        // line 171
        echo twig_safe_filter((isset($context['PaymentMethodId']) ? $context['PaymentMethodId'] : null));
        echo ".updateCreditCardType();
\t});
</script>";
    }

}
