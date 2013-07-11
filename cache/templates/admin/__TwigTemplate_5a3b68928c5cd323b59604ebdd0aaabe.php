<?php

/* order.type.tpl */
class __TwigTemplate_5a3b68928c5cd323b59604ebdd0aaabe extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<select id=\"accounting_quickbooks_orderoption\" class=\"Field250\" name=\"accounting_quickbooks[orderoption]\">
\t<option value=\"receipt\" ";
        // line 2
        echo twig_safe_filter((isset($context['OrderTypeReceiptSelected']) ? $context['OrderTypeReceiptSelected'] : null));
        echo ">";
        echo getLang("QuickBooksShowSalesOrderOptionSalesReceipt");
        echo "</option>
\t<option value=\"order\" ";
        // line 3
        echo twig_safe_filter((isset($context['OrderTypeOrderSelected']) ? $context['OrderTypeOrderSelected'] : null));
        echo ">";
        echo getLang("QuickBooksShowSalesOrderOptionSalesOrder");
        echo "</option>
</select>

<script type=\"text/javascript\"><!--

\tfunction SetAccountingOrderType()
\t{
\t\tvar orderType = document.getElementById(\"accounting_quickbooks_orderoption\");
\t\tvar originalVal = \$(orderType).val();
\t\torderType.options.length = 0;
\t\t
\t\tif (\$(\"#accounting_quickbooks_type\").val().substr(0, 7) == \"Premier\") {
\t\t\torderType.options[0] = new Option(\"";
        // line 15
        echo getLang("QuickBooksShowSalesOrderOptionSalesReceipt");
        echo "\", \"receipt\");
\t\t\torderType.options[1] = new Option(\"";
        // line 16
        echo getLang("QuickBooksShowSalesOrderOptionSalesOrder");
        echo "\", \"order\");
\t\t\t\$(orderType).val(originalVal);
\t\t} else {
\t\t\torderType.options[0] = new Option(\"";
        // line 19
        echo getLang("QuickBooksShowSalesOrderOptionSalesReceipt");
        echo "\", \"receipt\");
\t\t\t\$(orderType).val(\"receipt\");
\t\t}
\t}

\tfunction SetAccountingOrderTypeOnLoad()
\t{
\t\t\$(\"#accounting_quickbooks_type\").change(SetAccountingOrderType);
\t\tSetAccountingOrderType();
\t}

\t\$(document).ready(
\t\tfunction()
\t\t{
\t\t\tAdminAccountingSettings.addOnLoadFunc(SetAccountingOrderTypeOnLoad);
\t\t}
\t);

//--></script>";
    }

}
