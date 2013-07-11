<?php

/* vendors.manage.tpl */
class __TwigTemplate_e0e3ed889477b1738cc6feb372ef6c16 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<form action=\"index.php?ToDo=deleteVendors\" name=\"frmVendors\" id=\"frmVendors\" method=\"post\" onsubmit=\"return ConfirmDeleteSelected();\">
\t<div class=\"BodyContainer\">
\t<table cellSpacing=\"0\" cellPadding=\"0\" width=\"100%\">
\t<tr>
\t\t<td class=\"Heading1\">";
        // line 5
        echo getLang("Vendors");
        echo "</td>
\t</tr>
\t<tr>
\t\t<td class=\"Intro\">
\t\t\t<p>";
        // line 9
        echo getLang("VendorsIntro");
        echo "</p>
\t\t\t";
        // line 10
        echo twig_safe_filter((isset($context['Message']) ? $context['Message'] : null));
        echo "
\t\t\t<p>
\t\t\t\t<input type=\"button\" onclick=\"window.location='index.php?ToDo=addVendor';\" value=\"";
        // line 12
        echo getLang("AddVendor");
        echo "\" class=\"SmallButton\" />
\t\t\t\t<input name=\"DeleteButton\" type=\"submit\" value=\"";
        // line 13
        echo getLang("DeleteSelected");
        echo "\" class=\"SmallButton\" ";
        echo twig_safe_filter((isset($context['DisableDelete']) ? $context['DisableDelete'] : null));
        echo " />
\t\t\t</p>
\t\t</td>
\t</tr>
\t<tr>
\t\t<td>
\t\t\t<div class=\"GridContainer\">
\t\t\t\t";
        // line 20
        echo twig_safe_filter((isset($context['VendorDataGrid']) ? $context['VendorDataGrid'] : null));
        echo "
\t\t\t</div>
\t\t</td>
\t</tr>
\t</table>
\t</div>
</form>

<script type=\"text/javascript\">
\tfunction ConfirmDeleteSelected()
\t{
\t\tif(!\$('.GridContainer input[type=checkbox].check:checked').length) {
\t\t\talert('";
        // line 32
        echo getLang("SelectOneMoreVendorsDelete");
        echo "');
\t\t\treturn false;
\t\t}
\t\tif(confirm('";
        // line 35
        echo getLang("ConfirmDeleteVendors");
        echo "')) {
\t\t\treturn true;
\t\t}
\t\telse {
\t\t\treturn false;
\t\t}
\t}
</script>
";
    }

}
