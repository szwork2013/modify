<?php

/* photowall.form.images.row.tpl */
class __TwigTemplate_b0c6f3ba2c343dd41f0cec4f25c9acb0 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<div class=\"photowallImagesListItem\">
\t<table cellspacing=\"0\" class=\"GridPanel\">
\t\t<tbody>
\t\t\t<tr class=\"GridRow\" onmouseover=\"\$(this).addClass('GridRowOver').removeClass('GridRow');\" onmouseout=\"\$(this).addClass('GridRow').removeClass('GridRowOver');\">
\t\t\t\t<td class=\"photowallImageCheck\"><input type=\"checkbox\" /></td>
\t\t\t\t<td class=\"photowallImageThumbDisplay\" style=\"width:";
        // line 6
        echo twig_safe_filter((isset($context['photowallImage_thumbnailWidth']) ? $context['photowallImage_thumbnailWidth'] : null));
        echo "px;\">
\t\t\t\t\t<a style=\"width:";
        // line 7
        echo twig_safe_filter((isset($context['photowallImage_thumbnailWidth']) ? $context['photowallImage_thumbnailWidth'] : null));
        echo "px; height:";
        echo twig_safe_filter((isset($context['photowallImage_thumbnailHeight']) ? $context['photowallImage_thumbnailHeight'] : null));
        echo "px;\" title=\"";
        echo getLang("ClickToShowFullSizeImage");
        echo "\"></a>
\t\t\t\t</td>
\t\t\t\t<td class=\"photowallImageDescription\"><textarea rows=\"4\"></textarea><div style=\"display:none;\"><input type=\"button\" class=\"photowallImageDescriptionSave\" value=\"";
        // line 9
        echo getLang("Save");
        echo "\" /> <input type=\"button\" class=\"photowallImageDescriptionCancel\" value=\"";
        echo getLang("Cancel");
        echo "\" /></div></td>
\t\t\t\t<td class=\"photowallImageBaseThumb\"><input type=\"radio\" name=\"photowallImageBaseThumb\" /></td>
\t\t\t\t<td class=\"photowallImageAction\">
\t\t\t\t\t<a href=\"#\" class=\"photowallImageDelete\">";
        // line 12
        echo getLang("Delete");
        echo "</a>
\t\t\t\t\t<a href=\"#\" class=\"photowallImageEdit\">";
        // line 13
        echo getLang("Edit");
        echo "</a>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</tbody>
\t</table>
</div>
";
    }

}
