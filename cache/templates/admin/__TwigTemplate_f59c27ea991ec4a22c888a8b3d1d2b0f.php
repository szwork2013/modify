<?php

/* giftcertificate.quickview.tpl */
class __TwigTemplate_f59c27ea991ec4a22c888a8b3d1d2b0f extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"1\">
\t<tr>
\t\t<td valign=\"top\">
\t\t\t<h5 style=\"margin: 0pt 0pt 5pt 0pt\">";
        // line 4
        echo getLang("GiftCertificateDetails");
        echo "</h5>
\t\t\t<table width=\"95%\" border=\"0\" align=\"right\">
\t\t\t\t<tr>
\t\t\t\t\t<td width=\"150\" class=\"text\">";
        // line 7
        echo getLang("GiftCertificateSentTo");
        echo ":</td>
\t\t\t\t\t<td class=\"text\"><a href=\"mailto:";
        // line 8
        echo twig_safe_filter((isset($context['ToEmail']) ? $context['ToEmail'] : null));
        echo "\">";
        echo twig_safe_filter((isset($context['ToName']) ? $context['ToName'] : null));
        echo "</a></td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td width=\"150\" class=\"text\">";
        // line 11
        echo getLang("GiftCertificateSentFrom");
        echo ":</td>
\t\t\t\t\t<td class=\"text\"><a href=\"mailto:";
        // line 12
        echo twig_safe_filter((isset($context['FromEmail']) ? $context['FromEmail'] : null));
        echo "\">";
        echo twig_safe_filter((isset($context['FromName']) ? $context['FromName'] : null));
        echo "</a></td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td width=\"150\" class=\"text\">";
        // line 15
        echo getLang("GiftCertificateMessage");
        echo ":</td>
\t\t\t\t\t<td class=\"text\">";
        // line 16
        echo twig_safe_filter((isset($context['Message']) ? $context['Message'] : null));
        echo "</td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t</td>
\t</tr>
</table>
<br />
<h5 style=\"margin: 0pt 0pt 5pt 0pt\">";
        // line 23
        echo getLang("GiftCertificateHistory");
        echo "</h5>
";
        // line 24
        echo twig_safe_filter((isset($context['GiftCertificateHistory']) ? $context['GiftCertificateHistory'] : null));
    }

}
