{% import "macros/util.tpl" as util %}
{% import "macros/forms.tpl" as formBuilder %}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xml:lang="en" lang="en">
<head>
	<link rel="stylesheet" href="Styles/order.form.css" type="text/css" charset="utf-8">
    <style type="text/css">
		body {
			font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;	
		}
		
		h1 {
			text-align:center;	
		}
	</style>
	<script type="text/javascript" src="../javascript/jqueryis.js?1"></script>
	<script type="text/javascript" src="script/phototagger.js"></script>
    <script type="text/javascript" src="../javascript/jquery/plugins/autocomplete/jquery.autocomplete.js?1" charset="utf-8"></script>
    <script type="text/javascript">
		lang = new Array;
		lang["TypeAProductNameSkuEtc"] = "Type a product name, SKU, etc to search or click the icon to browse by category...";
	
		$(function(){
 
			// Set up the photo tagger.
			$( "div.photo-container" ).photoTagger({
				
				// The API urls.
				loadURL: "https://www.modifywatches.com/remote.php?w=getphotowallltags",
				saveURL: "https://www.modifywatches.com/admin/remote.php?w=savephotowalltags",
				deleteURL: "https://www.modifywatches.com/admin/remote.php?w=deletephotowalltags",
 
				cleanAJAXResponse: function( apiAction, response ){
					if (apiAction == "load"){
						return response;
					}
 
					// Return cleaned response.
					return( response );
				}
			});
			
			InitProductSearch();
 
		});
		
		function InitProductSearch () {
		if (!$('.quoteItemSearch input').size()) {
			return;
		}

		$('.quoteItemSearch input')
			.autocomplete('remote.php', {
				dataType: 'json',
				highlight: false,
				matchSubset: false,
				resultsClass: 'quoteItemSearchResults',
				focusOnSelect: false,
				max: 11,
				parse: function(data)
				{
					// count the actual results of the query - if there are no results, prepend a 'no results' indicator
					var actualResults = 0;
					var array = new Array();

					for(var i=0; i < data.length; i++) {
						if (data[i].id != 'virtual') {
							actualResults++;
						}

						array[array.length] = {
							data: data[i],
							value: data[i].id,
							result: data[i].name
						};
					}

					if (!actualResults) {
						// prepend no-results indicator for formatItem to use
						array.unshift({
							data: {
								id: 0
							},
							value: '',
							result: ''
						});
					}

					return array;
				},
				extraParams: {
					w: 'photowallItemSearch'
				},
				formatItem: function(result, position, total, query)
				{
					if (result.id === 0) {
						row = '<div class="recordNoResults">'
							+ lang.QuoteItemSearchNone.replace(':query', $('.quoteItemSearch input').val())
							+ '</div>';
						return row;
					}

					var row = $('<div></div>');

					row.append('<input type="hidden" class="searchResultProductId" value="' + result.id + '" />');
					if (result.link) {
						row.append('<div class="viewItemLink"><a href="' + result.link + '" target="_blank">View Product</a></div>');
					}
					row.append('<strong>' + result.name + '</strong>');

					return '<div class="recordContent ' + result.className + '">' + row.html() + '</div>';
				},
				scrollHeight: 300
			})
			.result(function(e, item)
			{
				if (item.id === 0) {
					return;
				}
				
				$("#pendingproductid").val(item.id)
				$( "div.photo-container" ).photoTagger('addPendingTagAPI');
				$("#productSearchArea").fadeOut();
			})
			.blur(function()
			{
				$(this)
					.val(lang.TypeAProductNameSkuEtc)
					.addClass('quoteItemSearchDefaultValue');
			})
			.focus(function()
			{
				$(this)
					.val('')
					.removeClass('quoteItemSearchDefaultValue');
			})
			.trigger('blur');
	}
	</script>

</head>
<body>
	<h1>Tag This Photo!</h1>
    <div>
    	<ol>
            <li>Click and drag on the photo to draw a box around the product you would like to tag.<br /></li>
            <li>In the box that appears (you may need to scroll down), start typing the name of the product, when it shows up... click on it!<br /></li>
            <li>Double-click a tag to delete it. <br />
            	<span style="font-size:12px;"><b>Note:</b> Tags are *clickable* on the Photowall, just not here.</span>
            </li>
        </ol>
    </div>
	<div style="float:left;width:500px;padding:5px;border:1px solid #e2e2e2;margin:5px;">
        <div class="photo-container">
            <img id="photo{{ ImageID|safe }}" src="{{ ImageURL|safe }}" />
        </div>
    </div>
    <div id="productSearchArea" style="display:none;">
    <input type="hidden" id="pendingproductid" />
  {{ formBuilder.startForm(['type': 'vertical']) }}
      {{ formBuilder.heading('Search Items') }}

      {{ formBuilder.startRow([
          'last': true,
      ]) }}
          <div>
              <a href="#" class="quoteItemSearchIcon" />&nbsp;</a>
              <div class="quoteItemSearch">
                  <input type="text" />
              </div>
          </div>
      {{ formBuilder.endRow }}
  {{ formBuilder.endForm }}
</div>
</body>

</html>
