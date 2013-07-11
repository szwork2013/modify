<?php

/* ordermessages.manage.tpl */
class __TwigTemplate_d05be29af9a3f29c36fb30b683bcc4f7 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<div class=\"toolbar\">
\t<h1 id=\"pageTitle\">";
        // line 2
        echo getLang("Order");
        echo " #";
        echo twig_safe_filter((isset($context['OrderId']) ? $context['OrderId'] : null));
        echo "</h1>
        <a style=\"position:absolute; left:5px; top:8px; width:30px\" class=\"button\" href=\"javascript:history.go(-2)\" type=\"submit\">Back</a>
\t<a style=\"width:59px\" class=\"button\" href=\"";
        // line 4
        echo twig_safe_filter((isset($context['ShopPath']) ? $context['ShopPath'] : null));
        echo "/admin/index.php?ToDo=viewOrders\" type=\"submit\">";
        echo getLang("AllOrders");
        echo "</a>
</div>
<ul id=\"order\" title=\"";
        // line 6
        echo getLang("Order");
        echo " #";
        echo twig_safe_filter((isset($context['OrderId']) ? $context['OrderId'] : null));
        echo "\" selected=\"true\">
\t<li style=\"height:25px\" class=\"subMenu\">
\t\t<ul class=\"tab\">
\t\t\t<li id=\"od\" onclick=\"SubMenu(this)\">";
        // line 9
        echo getLang("OrderDetails");
        echo "</li>
\t\t\t<li id=\"om\" onclick=\"SubMenu(this)\" class=\"tabSelected\">";
        // line 10
        echo getLang("OrderMessages");
        echo "</li>
\t\t</ul>
\t</li>
\t";
        // line 13
        echo twig_safe_filter((isset($context['MessageGrid']) ? $context['MessageGrid'] : null));
        echo "
\t<li class=\"group\">";
        // line 14
        echo getLang("PostNewMessage");
        echo "</li>
\t<li style=\"border-bottom:solid 1px transparent\">
\t\t<form enctype=\"multipart/form-data\" action=\"index.php?ToDo=saveNewOrderMessage\" onsubmit=\"return CheckMessageForm()\" method=\"post\">
\t\t\t<input type=\"hidden\" name=\"orderId\" value=\"";
        // line 17
        echo twig_safe_filter((isset($context['OrderId']) ? $context['OrderId'] : null));
        echo "\">
\t\t\t<input type=\"hidden\" name=\"messageId\" value=\"";
        // line 18
        echo twig_safe_filter((isset($context['MessageId']) ? $context['MessageId'] : null));
        echo "\">
\t\t\t<input type=\"hidden\" name=\"subject\" value=\"";
        // line 19
        echo twig_safe_filter((isset($context['MessageSubject']) ? $context['MessageSubject'] : null));
        echo "\">
\t\t\t<textarea id=\"message\" name=\"message\" style=\"width:93%; height:50px; font-size:15px; color:#CACACA\" onclick=\"SetupTextbox()\">";
        // line 20
        echo getLang("TapToTypeMessage");
        echo "</textarea>
\t\t\t<input type=\"submit\" value=\"Send Message to Customer\" style=\"width:98%\" />
\t\t</form>
\t</li>
</ul>

<script type=\"text/javascript\">

\tfunction SubMenu(Tab) {
\t\tswitch(Tab.id) {
\t\t\tcase \"od\": {
\t\t\t\tdocument.location.href = \"index.php?ToDo=viewSingleOrder&o=";
        // line 31
        echo twig_safe_filter((isset($context['OrderId']) ? $context['OrderId'] : null));
        echo "\";
\t\t\t\tbreak;
\t\t\t}
\t\t\tcase \"om\": {
\t\t\t\tdocument.location.reload();
\t\t\t\tbreak;
\t\t\t}
\t\t}
\t}

\tfunction SetupTextbox() {
\t\tvar m = document.getElementById(\"message\");
\t\tm.style.color = \"#000\";
\t\tm.value = \"\";
\t}

\tfunction CheckMessageForm() {
\t\tvar m = document.getElementById(\"message\");

\t\tif(m.value == \"\" || m.value == \"";
        // line 50
        echo getLang("TapToTypeMessage");
        echo "\") {
\t\t\talert(\"";
        // line 51
        echo getLang("EnterMessageShort");
        echo "\");
\t\t\treturn false;
\t\t}

\t\treturn true;
\t}

</script>";
    }

}
