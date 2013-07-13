{% import "macros/util.tpl" as util %}
{% import "macros/forms.tpl" as formBuilder %}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xml:lang="en" lang="en">
<head>
	<link rel="stylesheet" href="Styles/order.form.css" type="text/css" charset="utf-8">
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
				loadURL: "https://dev.modifywatches.com/remote.php?w=getphotowallltags",
				saveURL: "https://dev.modifywatches.com/admin/remote.php?w=savephotowalltags",
				deleteURL: "https://dev.modifywatches.com/admin/remote.php?w=deletephotowalltags",
 
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
					remoteSection: 'orders',
					w: 'editOrderItemSearch',
					quoteSession: $('input[name=quoteSession]').val()
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

					var sku = '';
					if (result.sku) {
						sku = result.sku + ' / ';
					}

					var details = $('<div class="productDetails">' + sku + result.price + '</div>');
					row.append(details);

					return '<div class="recordContent ' + result.className + '">' + row.html() + '</div>';
				},
				scrollHeight: 300
			})
			.result(function(e, item)
			{
				if (item.id === 0) {
					return;
				}

				if (item.id == 'virtual') {
					Order_Form.showAddVirtualItemDialog(item.virtualName);
					return;
				}

				Order_Form.addItem(item.id);
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
	<div style="float:left;width:500px;height:500px;padding:5px;border:1px solid #e2e2e2;margin:5px;">
        <div class="photo-container">
            <img id="photo{{ ImageID|safe }}" src="{{ ImageURL|safe }}" />
        </div>
        <br style="clear:both;" />
    </div>
    <div class="orderMachineStateItems" style="display:block;">
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
          <div>
              <a class="addVirtualItemLink" href="#">{% lang 'AddVirtualItemLink' %}</a>
              <div class="addVirtualItemLinkAfter"></div>
          </div>
      {{ formBuilder.endRow }}
  {{ formBuilder.endForm }}

  {{ formBuilder.startForm(['type': 'vertical']) }}
      {{ formBuilder.heading(lang.ItemsInOrder) }}

      {{ formBuilder.startRow }}
          <div {% if quote.items %}style="display: none"{% endif %} class="orderNoItemsMessage">
              <p class="MessageBox MessageBoxInfo">
                  {% lang 'ThisOrderIsCurrentlyEmpty' %}
              </p>
          </div>
          <div {% if quote.items == false %}style="display: none"{% endif %} class="orderItemsGrid">
              {{ itemsTable|safe }}
          </div>
          <div {% if quote.items == false %}style="display: none"{% endif %} id="itemSubtotal">
              {% lang 'SubTotal' %}: <span>{{ subtotal }}</span>
          </div>
      {{ formBuilder.endRow }}
  {{ formBuilder.endForm }}
</div>
</body>

</html>
