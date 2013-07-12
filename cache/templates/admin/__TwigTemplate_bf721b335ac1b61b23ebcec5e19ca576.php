<?php

/* photowall.form.tagger.tpl */
class __TwigTemplate_bf721b335ac1b61b23ebcec5e19ca576 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        $context['util'] = $this->env->loadTemplate("macros/util.tpl", true);
        // line 2
        $context['formBuilder'] = $this->env->loadTemplate("macros/forms.tpl", true);
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html  xml:lang=\"en\" lang=\"en\">
<head>
\t<link rel=\"stylesheet\" href=\"Styles/order.form.css\" type=\"text/css\" charset=\"utf-8\">
    <style type=\"text/css\">
\t\tbody {
\t\t\tfont-family:\"Trebuchet MS\", Arial, Helvetica, sans-serif;\t
\t\t}
\t\t
\t\th1 {
\t\t\ttext-align:center;\t
\t\t}
\t</style>
\t<script type=\"text/javascript\" src=\"../javascript/jqueryis.js?1\"></script>
\t<script type=\"text/javascript\" src=\"script/phototagger.js\"></script>
    <script type=\"text/javascript\" src=\"../javascript/jquery/plugins/autocomplete/jquery.autocomplete.js?1\" charset=\"utf-8\"></script>
    <script type=\"text/javascript\">
\t\tlang = new Array;
\t\tlang[\"TypeAProductNameSkuEtc\"] = \"Type a product name, SKU, etc to search or click the icon to browse by category...\";
\t
\t\t\$(function(){
 
\t\t\t// Set up the photo tagger.
\t\t\t\$( \"div.photo-container\" ).photoTagger({
\t\t\t\t
\t\t\t\t// The API urls.
\t\t\t\tloadURL: \"https://dev.modifywatches.com/remote.php?w=getphotowallltags\",
\t\t\t\tsaveURL: \"https://dev.modifywatches.com/admin/remote.php?w=savephotowalltags\",
\t\t\t\tdeleteURL: \"https://dev.modifywatches.com/admin/remote.php?w=deletephotowalltags\",
 
\t\t\t\tcleanAJAXResponse: function( apiAction, response ){
\t\t\t\t\tif (apiAction == \"load\"){
\t\t\t\t\t\treturn response;
\t\t\t\t\t}
 
\t\t\t\t\t// Return cleaned response.
\t\t\t\t\treturn( response );
\t\t\t\t}
\t\t\t});
\t\t\t
\t\t\tInitProductSearch();
 
\t\t});
\t\t
\t\tfunction InitProductSearch () {
\t\tif (!\$('.quoteItemSearch input').size()) {
\t\t\treturn;
\t\t}

\t\t\$('.quoteItemSearch input')
\t\t\t.autocomplete('remote.php', {
\t\t\t\tdataType: 'json',
\t\t\t\thighlight: false,
\t\t\t\tmatchSubset: false,
\t\t\t\tresultsClass: 'quoteItemSearchResults',
\t\t\t\tfocusOnSelect: false,
\t\t\t\tmax: 11,
\t\t\t\tparse: function(data)
\t\t\t\t{
\t\t\t\t\t// count the actual results of the query - if there are no results, prepend a 'no results' indicator
\t\t\t\t\tvar actualResults = 0;
\t\t\t\t\tvar array = new Array();

\t\t\t\t\tfor(var i=0; i < data.length; i++) {
\t\t\t\t\t\tif (data[i].id != 'virtual') {
\t\t\t\t\t\t\tactualResults++;
\t\t\t\t\t\t}

\t\t\t\t\t\tarray[array.length] = {
\t\t\t\t\t\t\tdata: data[i],
\t\t\t\t\t\t\tvalue: data[i].id,
\t\t\t\t\t\t\tresult: data[i].name
\t\t\t\t\t\t};
\t\t\t\t\t}

\t\t\t\t\tif (!actualResults) {
\t\t\t\t\t\t// prepend no-results indicator for formatItem to use
\t\t\t\t\t\tarray.unshift({
\t\t\t\t\t\t\tdata: {
\t\t\t\t\t\t\t\tid: 0
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\tvalue: '',
\t\t\t\t\t\t\tresult: ''
\t\t\t\t\t\t});
\t\t\t\t\t}

\t\t\t\t\treturn array;
\t\t\t\t},
\t\t\t\textraParams: {
\t\t\t\t\tw: 'photowallItemSearch'
\t\t\t\t},
\t\t\t\tformatItem: function(result, position, total, query)
\t\t\t\t{
\t\t\t\t\tif (result.id === 0) {
\t\t\t\t\t\trow = '<div class=\"recordNoResults\">'
\t\t\t\t\t\t\t+ lang.QuoteItemSearchNone.replace(':query', \$('.quoteItemSearch input').val())
\t\t\t\t\t\t\t+ '</div>';
\t\t\t\t\t\treturn row;
\t\t\t\t\t}

\t\t\t\t\tvar row = \$('<div></div>');

\t\t\t\t\trow.append('<input type=\"hidden\" class=\"searchResultProductId\" value=\"' + result.id + '\" />');
\t\t\t\t\tif (result.link) {
\t\t\t\t\t\trow.append('<div class=\"viewItemLink\"><a href=\"' + result.link + '\" target=\"_blank\">View Product</a></div>');
\t\t\t\t\t}
\t\t\t\t\trow.append('<strong>' + result.name + '</strong>');

\t\t\t\t\treturn '<div class=\"recordContent ' + result.className + '\">' + row.html() + '</div>';
\t\t\t\t},
\t\t\t\tscrollHeight: 300
\t\t\t})
\t\t\t.result(function(e, item)
\t\t\t{
\t\t\t\tif (item.id === 0) {
\t\t\t\t\treturn;
\t\t\t\t}
\t\t\t\t
\t\t\t\t\$(\"#pendingproductid\").val(item.id)
\t\t\t\t\$( \"div.photo-container\" ).photoTagger('addPendingTagAPI');
\t\t\t\t\$(\"#productSearchArea\").fadeOut();
\t\t\t})
\t\t\t.blur(function()
\t\t\t{
\t\t\t\t\$(this)
\t\t\t\t\t.val(lang.TypeAProductNameSkuEtc)
\t\t\t\t\t.addClass('quoteItemSearchDefaultValue');
\t\t\t})
\t\t\t.focus(function()
\t\t\t{
\t\t\t\t\$(this)
\t\t\t\t\t.val('')
\t\t\t\t\t.removeClass('quoteItemSearchDefaultValue');
\t\t\t})
\t\t\t.trigger('blur');
\t}
\t</script>

</head>
<body>
\t<h1>Tag This Photo!</h1>
    <div>
    \t<ol>
            <li>Click and drag on the photo to draw a box around the product you would like to tag.<br /></li>
            <li>In the box that appears (you may need to scroll down), start typing the name of the product, when it shows up... click on it!<br /></li>
            <li>Double-click a tag to delete it. <br />
            \t<span style=\"font-size:12px;\"><b>Note:</b> Tags are *clickable* on the Photowall, just not here.</span>
            </li>
        </ol>
    </div>
\t<div style=\"float:left;width:500px;padding:5px;border:1px solid #e2e2e2;margin:5px;\">
        <div class=\"photo-container\">
            <img id=\"photo";
        // line 155
        echo twig_safe_filter((isset($context['ImageID']) ? $context['ImageID'] : null));
        echo "\" src=\"";
        echo twig_safe_filter((isset($context['ImageURL']) ? $context['ImageURL'] : null));
        echo "\" />
        </div>
    </div>
    <div id=\"productSearchArea\" style=\"display:none;\">
    <input type=\"hidden\" id=\"pendingproductid\" />
  ";
        // line 160
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startForm", array(array("type" => "vertical"), ), "method"), "1");
        echo "
      ";
        // line 161
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "heading", array("Search Items", ), "method"), "1");
        echo "

      ";
        // line 163
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startRow", array(array("last" => true), ), "method"), "1");
        // line 165
        echo "
          <div>
              <a href=\"#\" class=\"quoteItemSearchIcon\" />&nbsp;</a>
              <div class=\"quoteItemSearch\">
                  <input type=\"text\" />
              </div>
          </div>
      ";
        // line 172
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endRow", array(), "any"), "1");
        echo "
  ";
        // line 173
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endForm", array(), "any"), "1");
        echo "
</div>
</body>

</html>
";
    }

}
