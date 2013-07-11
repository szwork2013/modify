<?php

/* settings.tax.pricerebuild.tpl */
class __TwigTemplate_2511066dbcdde300a4b8c6b4eb784719 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<div class=\"ModalTitle\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "RebuildingProductPrices", array(), "any"), "1");
        echo "</div>
<div class=\"ModalContent\">
\t<div id=\"rebuildTaxPrices\">
\t\t<p>";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "RebuildingProductPricesIntro", array(), "any"), "1");
        echo "</p>
\t\t<p>";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "SoFar", array(), "any"), "1");
        echo "</p>
\t\t<ul>
\t\t\t";
        // line 7
        if ((isset($context['isDeleting']) ? $context['isDeleting'] : null)) {
            echo "\t\t\t\t<li class=\"deletes\"><span>0</span> ";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "RebuildingProductPricesNumRemoved", array(), "any"), "1");
            echo "</li>
\t\t\t";
        }
        // line 9
        echo "\t\t\t";
        // line 10
        if ((isset($context['isUpdating']) ? $context['isUpdating'] : null)) {
            echo "\t\t\t\t<li class=\"updates\"><span>0</span> ";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "RebuildingProductPricesNumUpdated", array(), "any"), "1");
            echo "</li>
\t\t\t";
        }
        // line 12
        echo "\t\t</ul>
\t\t<p style=\"text-align: center\"><img src=\"images/loadingAnimation.gif\" alt=\"\" /></p>
\t</div>
</div>
<script type=\"text/javascript\" charset=\"utf-8\">
\tfunction rebuildTaxPrices(start)
\t{
\t\t\$.ajax({
\t\t\turl: 'index.php',
\t\t\ttype: 'post',
\t\t\tdata: {
\t\t\t\t'ToDo': 'rebuildTaxZonePrices',
\t\t\t\t'start': start,
\t\t\t\t'run': true
\t\t\t},
\t\t\tdataType: 'json',
\t\t\tsuccess: function(response) {
\t\t\t\tif(response.finished != undefined && response.finished == true) {
\t\t\t\t\twindow.location = 'index.php?ToDo=viewTaxSettings&rebuilt=1';
\t\t\t\t\t\$.iModal.close();
\t\t\t\t}
\t\t\t\telse if(response.action == undefined || response.changes == undefined) {
\t\t\t\t\talert('";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "ErrorRebuildingTaxPrices", array(), "any"), "1");
        echo "')
\t\t\t\t\t\$.iModal.close();
\t\t\t\t\treturn;
\t\t\t\t}
\t\t\t\t
\t\t\t\taction = response.action;
\t\t\t\tif(action == 'rebuildPricing') {
\t\t\t\t\t\$('#rebuildTaxPrices li.updates span').html(number_format(
\t\t\t\t\t\tparseInt(\$('#rebuildTaxPrices li.updates span').html().replace(',', ''), 10) +
\t\t\t\t\t\tresponse.changes
\t\t\t\t\t));
\t\t\t\t}
\t\t\t\telse if(action == 'deleteZone' || action == 'deleteClass') {
\t\t\t\t\t\$('#rebuildTaxPrices li.deletes span').html(number_format(
\t\t\t\t\t\tparseInt(\$('#rebuildTaxPrices li.deletes span').html().replace(',', ''), 10) +
\t\t\t\t\t\tresponse.changes
\t\t\t\t\t));
\t\t\t\t}
\t\t\t\t
\t\t\t\trebuildTaxPrices(response.nextStart);
\t\t\t},
\t\t\terror: function()
\t\t\t{
\t\t\t\talert('";
        // line 58
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "ErrorRebuildingTaxPrices", array(), "any"), "1");
        echo "')
\t\t\t\t\$.iModal.close();
\t\t\t}
\t\t});
\t}
\t
\trebuildTaxPrices(0);
</script>";
    }

}
