/* Common Javascript functions for use throughout Interspire Shopping Cart */

// Fetch the value of a cookie
function get_cookie(name) {
	name = name += "=";
	var cookie_start = document.cookie.indexOf(name);
	if(cookie_start > -1) {
		cookie_start = cookie_start+name.length;
		cookie_end = document.cookie.indexOf(';', cookie_start);
		if(cookie_end == -1) {
			cookie_end = document.cookie.length;
		}
		return unescape(document.cookie.substring(cookie_start, cookie_end));
	}
}

// Set a cookie
function set_cookie(name, value, expires)
{
	if(!expires) {
		expires = "; expires=Wed, 1 Jan 2020 00:00:00 GMT;"
	} else {
		expire = new Date();
		expire.setTime(expire.getTime()+(expires*1000));
		expires = "; expires="+expire.toGMTString();
	}
	document.cookie = name+"="+escape(value)+expires;
}

/* Javascript functions for the products page */
var num_products_to_compare = 0;
var product_option_value = "";
var CurrentProdTab = "";
function showProductImage(filename, product_id, currentImage) {
	var l = (screen.availWidth/2)-350;
	var t = (screen.availHeight/2)-300;
	var variationAdd = '';
	if(ShowVariationThumb) {
		variationAdd = '&variation_id='+$('body').attr('currentVariation');
		CurrentProdThumbImage = null;
	}
	UrlAddOn = '';

	if(currentImage) {
		UrlAddOn = "&current_image="+currentImage;
	} else if(CurrentProdThumbImage) {
		UrlAddOn = "&current_image="+CurrentProdThumbImage;
	}
	var imgPopup = window.open(filename + "?product_id="+product_id+variationAdd+UrlAddOn, "imagePop", "toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=0,resizable=1,width=700,height=600,top="+t+",left="+l);
	imgPopup.focus();
}

function CheckQuantityLimits (form)
{
	var qty = parseInt($('#qty_').val(), 10);

	if (qty < productMinQty) {
		alert(lang.ProductMinQtyError);
		return false;
	}

	if (qty > productMaxQty) {
		alert(lang.ProductMaxQtyError);
		return false;
	}

	return true;
}

function CheckProductConfigurableFields(form)
{
	var requiredFields = $('.FieldRequired');
	var valid = true;
	requiredFields.each(function() {
		var namePart = this.name.replace(/^.*\[/, '');
		var fieldId = namePart.replace(/\].*$/, '');

		if(this.type=='checkbox' ) {
			if(!this.checked) {
				valid = false;
				alert(lang.EnterRequiredField);
				this.focus();
				return false;
			}
		} else if(this.value == '') {
			if(this.type != 'file' || (this.type == 'file' && document.getElementById('CurrentProductFile_'+fieldId).value == '')) {
				valid = false;
				alert(lang.EnterRequiredField);
				this.focus();
				return false;
			}
		}
	});

	var fileFields = $(form).find('input[type=file]');
	fileFields.each(function() {
		if(this.value != '') {
			var namePart = this.name.replace(/^.*\[/, '');
			var fieldId = namePart.replace(/\].*$/, '');
			var fileTypes = document.getElementById('ProductFileType_'+fieldId).value;

			fileTypes = ','+fileTypes.replace(' ', '').toLowerCase()+','
			var ext = this.value.replace(/^.*\./, '').toLowerCase();

			if(fileTypes.indexOf(','+ext+',') == -1) {
				alert(lang.InvalidFileTypeJS);
				this.focus();
				this.select();
				valid = false;
			}

		}
	});

	return valid;
}

function check_add_to_cart(form, required) {
	var valid = true;
	var qtyInputs = $(form).find('input.qtyInput');
	qtyInputs.each(function() {
		if(isNaN($(this).val()) || $(this).val() <= 0) {
			alert(lang.InvalidQuantity);
			this.focus();
			this.select();
			valid = false;
			return false;
		}
	});
	if(valid == false) {
		return false;
	}

	if(!CheckProductConfigurableFields(form)) {
		return false;
	}

	if (!CheckQuantityLimits(form)) {
		return false;
	}

	if(required && !$(form).find('.CartVariationId').val()) {
		alert(lang.OptionMessage);
		var select = $(form).find('select').get(0);
		if(select) {
			select.focus();
		}
		var radio = $(form).find('input[type=radio]').get(0);
		if(radio) {
			radio.focus();
		}
		return false;
	}

	if (!CheckEventDate()) {
		return false;
	}

	return true;
}

function compareProducts(compare_path) {
	var pids = "";

	if($('form').find('input[name=compare_product_ids]:checked').size() >= 2) {
		var cpids = document.getElementsByName('compare_product_ids');

		for(i = 0; i < cpids.length; i++) {
			if(cpids[i].checked)
				pids = pids + cpids[i].value + "/";
		}

		pids = pids.replace(/\/$/, "");
		document.location.href = compare_path + pids;
		return false;
	}

	alert(lang.CompareSelectMessage);
	return false;
}

function product_comparison_box_changed(state) {
	// Increment num_products_to_compare - needs to be > 0 to submit the product comparison form


	if(state)
		num_products_to_compare++;
	else
		if (num_products_to_compare != 0)
			num_products_to_compare--;
}

function remove_product_from_comparison(id) {
	if(num_compare_items > 2) {
		for(i = 1; i < 11; i++) {
			document.getElementById("compare_"+i+"_"+id).style.display = "none";
		}

		num_compare_items--;
	}
	else {
		alert(lang.CompareTwoProducts);
	}
}

function show_product_review_form() {
	document.getElementById("rating_box").style.display = "";
	if(typeof(HideProductTabs) != 'undefined' && HideProductTabs == 0) {
		CurrentProdTab = 'ProductReviews_Tab';
	} else {
		document.location.href = "#write_review";
	}
}

function jump_to_product_reviews() {
	if(typeof(HideProductTabs) != 'undefined' && HideProductTabs == 0) {
		CurrentProdTab = 'ProductReviews_Tab';
	} else {
		document.location.href = "#reviews";
	}
}

function g(id) {
	return document.getElementById(id);
}

function check_product_review_form() {
	var revrating = g("revrating");
	var revtitle = g("revtitle");
	var revtext = g("revtext");
	var revfromname = g("revfromname");
	var captcha = g("captcha");

	if(revrating.selectedIndex == 0) {
		alert(lang.ReviewNoRating);
		revrating.focus();
		return false;
	}

	if(revtitle.value == "") {
		alert(lang.ReviewNoTitle);
		revtitle.focus();
		return false;
	}

	if(revtext.value == "") {
		alert(lang.ReviewNoText);
		revtext.focus();
		return false;
	}

	if(captcha.value == "" && HideReviewCaptcha != "none") {
		alert(lang.ReviewNoCaptcha);
		captcha.focus();
		return false;
	}

	return true;
}

function check_small_search_form() {
	var search_query = g("search_query");

	if(search_query.value == "") {
		alert(lang.EmptySmallSearch);
		search_query.focus();
		return false;
	}

	return true;
}

function setCurrency(currencyId)
{
	var gotoURL = location.href;

	if (location.search !== '')
	{
		if (gotoURL.search(/[&|\?]setCurrencyId=[0-9]+/) > -1)
			gotoURL = gotoURL.replace(/([&|\?]setCurrencyId=)[0-9]+/, '$1' + currencyId);
		else
			gotoURL = gotoURL + '&setCurrencyId=' + currencyId;
	}
	else
		gotoURL = gotoURL + '?setCurrencyId=' + currencyId;

	location.href = gotoURL;
}


// Dummy sel_panel function for when design mode isn't enabled
function sel_panel(id) {}

function inline_add_to_cart(filename, product_id, quantity, returnTo) {
	if(typeof(quantity) == 'undefined') {
		var quantity = '1';
	}
	var html = '<form action="' + filename + '/cart.php" method="post" id="inlineCartAdd">';
	if(typeof(returnTo) != 'undefined' && returnTo == true) {
		var returnLocation = window.location;
		html += '<input type="hidden" name="returnUrl" value="'+escape(returnLocation)+'" />';
	}
	html += '<input type="hidden" name="action" value="add" />';
	html += '<input type="hidden" name="qty" value="'+quantity+'" />';
	html += '<input type="hidden" name="product_id" value="'+product_id+'" />';
	html += '<\/form>';
   $('body').append(html);
   $('#inlineCartAdd').submit();
}

function ShowPopupHelp(content, url, decodeHtmlEntities) {
	var popupWindow = open('', 'view','height=450,width=550');

	if(decodeHtmlEntities) {
		content = HtmlEntityDecode(content);
	}
	if (window.focus) {
		popupWindow.focus();
	}

	var doc = popupWindow.document;
	doc.write(content);
	doc.close();

	return false;
}

function HtmlEntityDecode(str) {
   try {
	  var tarea=document.createElement('textarea');
	  tarea.innerHTML = str; return tarea.value;
	  tarea.parentNode.removeChild(tarea);
   } catch(e) {
	  //for IE add <div id="htmlconverter" style="display:none;"></div> to the page
	  document.getElementById("htmlconverter").innerHTML = '<textarea id="innerConverter">' + str + '</textarea>';
	  var content = document.getElementById("innerConverter").value;
	  document.getElementById("htmlconverter").innerHTML = "";
	  return content;
   }
}

function setProductThumbHeight()
{
	var ImageBoxDiv = $('.Content .ProductList .ProductImage');
	var ImageListDiv = $('.Content .ProductList:not(.List) li');
	var CurrentListHeight = ImageListDiv.height();
	var ProductImageMargin = ImageBoxDiv.css('margin-left')*2;
/*
	ImageBoxDiv.height(ThumbImageHeight);
	ImageBoxDiv.width(ThumbImageWidth);
	ImageBoxDiv.css('line-height', ThumbImageHeight+'px');
*/

	var ImageBoxHeight = ThumbImageHeight;

	if (parseInt(ImageBoxDiv.css("padding-top"), 10)) {
		ImageBoxHeight += parseInt(ImageBoxDiv.css("padding-top"), 10) * 2; //Total Padding Width
	}

	if(parseInt(ImageBoxDiv.css("margin-top"), 10)) {
		ImageBoxHeight += parseInt(ImageBoxDiv.css("margin-top"), 10) * 2; //Total Margin Width
	}

	if (parseInt(ImageBoxDiv.css("borderTopWidth"), 10)) {
		ImageBoxHeight += parseInt(ImageBoxDiv.css("borderTopWidth"), 10) * 2; //Total Border Width
	}

	ImageBoxDiv.height(ImageBoxHeight);
	ImageBoxDiv.width(ThumbImageWidth);
	if ($.browser.msie && $.browser.version >= 7 && $.browser.version < 8) {
		// this is a specific browser check because this fix is only applicable for ie7
		ImageBoxDiv.css('line-height', ImageBoxHeight+'px');
	}


	//calculate the new list container width based on the difference between the thumb image and default thumb size
	var ImageListWidth = ImageListDiv.width() + (ThumbImageWidth-120);
	ImageListDiv.width(ImageListWidth);

//	var ImageListHeight = ImageListDiv.height() + (ImageBoxDiv.height() - 120);
//	ImageListDiv.height(ImageListHeight);



	$('.Content .ProductList.List .ProductDetails').css('margin-left',ThumbImageWidth+2+'px');
	$('.Content .ProductList.List li').height(Math.max(CurrentListHeight, ThumbImageHeight));
}

// Dummy JS object to hold language strings.
var lang = {
};

// IE 6 doesn't support the :hover selector on elements other than links, so
// we use jQuery to work some magic to get our hover styles applied.
if(document.all) {
	var isIE7 = /*@cc_on@if(@_jscript_version>=5.7)!@end@*/false;
	if(isIE7 == false) {
		$(document).ready(function() {
			$('.ProductList li').hover(function() {
				$(this).addClass('Over');
			},
			function() {
				$(this).removeClass('Over');
			});
			$('.ComparisonTable tr').hover(function() {
				$(this).addClass('Over');
			},
			function() {
				$(this).removeClass('Over');
			});
		});
	}
	$('.ProductList li:last-child').addClass('LastChild');
}

function ShowLoadingIndicator() {
	if (typeof(disableLoadingIndicator) != 'undefined' && disableLoadingIndicator) {
		return;
	}
	var width = $(window).width();
	var position = $('#Container').css('position');
	if (position == 'relative') {
		width = $('#Container').width();
	}

	var scrollTop;
	if(self.pageYOffset) {
		scrollTop = self.pageYOffset;
	}
	else if(document.documentElement && document.documentElement.scrollTop) {
		scrollTop = document.documentElement.scrollTop;
	}
	else if(document.body) {
		scrollTop = document.body.scrollTop;
	}
	$('#AjaxLoading').css('position', 'fixed');
	$('#AjaxLoading').css('top', '0px');
	$('#AjaxLoading').css('left', parseInt((width-150)/2)+"px");
	$('#AjaxLoading').show();
}

function HideLoadingIndicator() {
	$('#AjaxLoading').hide();
}


var loadedImages = {};

// Ensure that all product lists are the same height
function setProductListHeights(imgName, className) {
	// hack job putting this here but it needs to be reused by search ajax pager
	if (typeof(DesignMode) != 'undefined') {
		return;
	}

	if (typeof imgName != 'undefined') {
		if (typeof loadedImages[imgName] != 'undefined') {
			return;
		}

		loadedImages[imgName] = true;
	}

	setProductThumbHeight();

	/**
	 * Sets the height of the elements passed in to match that of the one that
	 * has the greatest height.
	 *
	 * @param ele The element(s) to adjust the height for.
	 * @return void
	 */
	function setHeight(ele) {
		var ele = $(ele),
			maxHeight = 0;

		ele
			// reset the height just in case it was set by the stylesheet so
			// we can detect it
			.css('height', 'auto')
			// get the one with the greatest height
			.each(function() {
				if ($(this).height() > maxHeight) {
					maxHeight = $(this).height();
				}
			})
			// and set them all to the greatest height
			.css('height', maxHeight);
	}

	if (!className) {
		className = '.Content';
	}

	setHeight(className + ' .ProductList:not(.List) li .ProductDetails');

	if (typeof imgName != 'undefined') {
		setHeight(className + ' .ProductList:not(.List) li .ProductPriceRating:has(img[src$="'+imgName+'"])');
	}

	setHeight(className + ' .ProductList:not(.List) li');
}


function fastCartAction(event) {
	var url = '';

	// Supplied URL
	if (typeof(event) == 'string') {
		var url = event;
	}
	// Event raised from a clicked link
	else if (event.type == 'click' && $(event.target).is('a')) {
		event.preventDefault();
		var url = event.target.href;
	}
	// 'Add' button on product details page
	else if (event.type == 'submit') {
		var url = $('#productDetailsAddToCartForm').attr('action') + '?' + $('#productDetailsAddToCartForm').serialize();
	}

	// Make sure a valid URL was supplied
	if (!url || url.indexOf('cart.php') == -1) {
		return false;
	}

	_showFastCart(url + '&fastcart=1');
	return false;

}
function _showFastCart(url) {

	// strip protocol from url to fix cross protocol ajax access denied problem
	url = url.replace(/^http[s]{0,1}:\/\/[^\/]*\/?/, '/');

	$.iModal.close();
	$.iModal({
		type: 'ajax',
		width: 700,
		url: url,
		closeTxt: true,
		onAjaxError: function() {
			window.location.href = url.replace(/&fastcart=1/, '');
		},
		onShow: function() {
			$("#fastCartSuggestive a[href*='cart.php?action=add']").unbind('click');
			$("#fastCartSuggestive a[href*='cart.php?action=add']").click(function(event) {
				// attach action to suggestive products' link
				fastCartAction(event);
			});

			var itemTxt = $('#fastCartNumItemsTxt').html();
			if (itemTxt) {
				// update the view cart item count on top menu
				$('.CartLink span').html('(' + itemTxt + ')');
			}
			setProductListHeights(null, '.fastCartContent');
			$('.fastCartContent .ProductList:not(.List) li').width(ThumbImageWidth);
		},
		onClose: function() {
			if (window.location.href.match(config.ShopPath + '/cart.php')) {
				// reload if we are on the cart page
				$('#ModalContainer').remove();
				window.location = window.location.href
			} else {
				$('#ModalContainer').remove();
			}
		}
	});
}


/**
* Adds a script tag to the DOM that forces a hit to tracksearchclick. Should be called by a mousedown event as calling it by a click event can sometimes be cancelled by the browser navigating away from the page.
*/
function isc_TrackSearchClick (searchId) {
	if (!searchId) {
		return;
	}

	$('#SearchTracker').remove();

	var trackurl = 'search.php?action=tracksearchclick&searchid=' + encodeURIComponent(searchId) + '&random=' + Math.random();

	var script = document.createElement('script');
	script.type = "text/javascript";
	script.src = trackurl;
	script.id = "SearchTracker";

	window.document.body.appendChild(script);
}

$(document).ready(function() {
	if($('.Rating img').length > 0) {
		$('.Rating img').each(function() {
			if($(this).height() == 0) {
				$(this).load(function() {
					// Load rating img and find the tallest product.
					var imgName = $(this).attr('src').split('/');
					var imgKey = imgName.length-1;
					setProductListHeights(imgName[imgKey]);
				});
			} else {
				setProductListHeights();
				return false;
			}
		});
	} else {
		setProductListHeights();
	}

	$('.InitialFocus').focus();
	$('table.Stylize tr:first-child').addClass('First');
	$('table.Stylize tr:last-child').addClass('Last');
	$('table.Stylize tr td:odd').addClass('Odd');
	$('table.Stylize tr td:even').addClass('Even');
	$('table.Stylize tr:even').addClass('Odd');
	$('table.Stylize tr:even').addClass('Even');

	$('.TabContainer .TabNav li').click(function() {
		$(this).parent('.TabNav').find('li').removeClass('Active');
		$(this).parents('.TabContainer').find('.TabContent').hide();
		$(this).addClass('Active');
		$(this).parents('.TabContainer').find('#TabContent'+this.id).show();
		$(this).find('a').blur();
		return false;
	});

	$('html').ajaxStart(function() {
		ShowLoadingIndicator();
	});

	$('html').ajaxComplete(function() {
		HideLoadingIndicator();
	});

	// generic checkbox => element visibility toggle based on id of checkbox and class names of other elements
	$('.CheckboxTogglesOtherElements').live('change', function(event){
		if (!this.id) {
			return;
		}

		var className = 'ShowIf_' + this.id + '_Checked';
		var elements = $('.' + className);

		if (this.checked) {
			// easy, show matching elements
			elements.show();
			return;
		}

		// if not checked it's a little more tricky -- only hide elements if they are not showing for multiple check boxes
		var classExpression = /^ShowIf_(.+)_Checked$/;
		elements.each(function(){
			var $$ = $(this);

			// before hiding this element, check its classes to see if it has another ShowIf_?_Checked - if it does, see if that class points to a checked box
			var classes = $$.attr('class').split(/\s+/);
			var checked = false;
			$.each(classes, function(key,value){
				if (value === className) {
					// we're processing this class already so we know it's unchecked - ignore it
					return;
				}

				var result = classExpression.exec(value);
				if (result === null) {
					// not a ShowIf_?_Class
					return;
				}

				var id = result[1];
				if ($('#' + id ).attr('checked')) {
					// found a checked box
					checked = true;
					return false;
				}
			});

			if (!checked) {
				// found no checkbox that should be keeping this element visible
				$$.hide();
			}
		});

	}).change();
});

var config = {};


// Modify Specific Function 

$(document).ready(function() {
	var winScroll = 0;
	
	// Change header style & also lock the sidebar selector
	$(window).scroll(function() {
	    if($(this).scrollTop() >= 50 ) {
			$('#header').addClass('mini');
		}
		else if($('#header').hasClass('mini')) {
			$('#header').removeClass('mini');
		}
	});
});

// usage: log('inside coolFunc', this, arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function f(){ log.history = log.history || []; log.history.push(arguments); if(this.console) { var args = arguments, newarr; args.callee = args.callee.caller; newarr = [].slice.call(args); if (typeof console.log === 'object') log.apply.call(console.log, console, newarr); else console.log.apply(console, newarr);}};

// make it safe to use console.log always
(function(a){function b(){}for(var c="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","),d;!!(d=c.pop());){a[d]=a[d]||b;}})
(function(){try{console.log();return window.console;}catch(a){return (window.console={});}}());

// place any jQuery/helper plugins in here, instead of separate, slower script files.
(function($) {
    $.fn.jumpTo = function(settings) {

		var win = $(window);

        var defaults = {
            destination : null,
			finalWidth: 0,
			finalHeight: 0,
			type: 'straight',
			speed: 2,
			fade: true
        };

		var opts = {
			settings: $.extend({}, defaults, settings)
		};

		var moveNode = function(el) {
			el = $(el);
			var settings = $.extend({},opts.settings);
			
			var pos = el.offset();
			var clone = el.clone().css({
				position: 'fixed',
				top: pos.top,
				left: pos.left,
				zIndex: 100
			}).appendTo('body');
			
			var destPos = $(settings.destination).offset();
			var destCoords = {
				left: destPos.left - pos.left,
				top: pos.top - destPos.top
			}
			
			var thirdCoord = {
				left: destCoords.left * 2,
				top: 0
			}

			var timeoutSpeed = settings.speed / destCoords.left;
			var A = -(destCoords.top/(destCoords.left*(thirdCoord.left-destCoords.left)));
			var B = (destCoords.top - A*(destCoords.left*destCoords.left))/destCoords.left;
			
			var x = 1;
			var comp = 0;
			var move = setInterval(function() {
				clone.offset({
					top: pos.top - (A*x*x + B*x),
					left: pos.left + x
				});
				if (destCoords.left < 0) {
					if (clone.offset().left <= destPos.left) {
						clearInterval(move);
						clone.fadeOut(300, function() { $(this).remove() });
					}
				} else {
					if(clone.offset().left >= destPos.left) {
						clearInterval(move);
						clone.fadeOut(300, function() { $(this).remove() });
					}
				}
				if(Math.abs(destCoords.left - pos.left) < 10) {
					growth = 2;
				} else {
					growth = 5;	
				}
				if (destCoords.left < 0) {
					x-=growth;
				} else {
					x+=growth;
				}
				
				ratio = clone.offset().left / destPos.left;
				var width = el.width();
				clone.css({
					width: (1-ratio+0.2)*width
				});
			}, timeoutSpeed);			
		};

		if (moveNode(this)) {
			return true;	
		} else {
			return false;	
		}
	};
})(jQuery);



// GRID!
if(typeof Object.create!=="function"){Object.create=function(a){function b(){}b.prototype=a;return new b}}var ua={toString:function(){return navigator.userAgent},test:function(a){return this.toString().toLowerCase().indexOf(a.toLowerCase())>-1}};ua.version=(ua.toString().toLowerCase().match(/[\s\S]+(?:rv|it|ra|ie)[\/: ]([\d.]+)/)||[])[1];ua.webkit=ua.test("webkit");ua.gecko=ua.test("gecko")&&!ua.webkit;ua.opera=ua.test("opera");ua.ie=ua.test("msie")&&!ua.opera;ua.ie6=ua.ie&&document.compatMode&&typeof document.documentElement.style.maxHeight==="undefined";ua.ie7=ua.ie&&document.documentElement&&typeof document.documentElement.style.maxHeight!=="undefined"&&typeof XDomainRequest==="undefined";ua.ie8=ua.ie&&typeof XDomainRequest!=="undefined";var domReady=function(){var a=[];var b=function(){if(!arguments.callee.done){arguments.callee.done=true;for(var b=0;b<a.length;b++){a[b]()}}};if(document.addEventListener){document.addEventListener("DOMContentLoaded",b,false)}if(ua.ie){(function(){try{document.documentElement.doScroll("left")}catch(a){setTimeout(arguments.callee,50);return}b()})();document.onreadystatechange=function(){if(document.readyState==="complete"){document.onreadystatechange=null;b()}}}if(ua.webkit&&document.readyState){(function(){if(document.readyState!=="loading"){b()}else{setTimeout(arguments.callee,10)}})()}window.onload=b;return function(b){if(typeof b==="function"){a[a.length]=b}return b}}();var cssHelper=function(){var a={BLOCKS:/[^\s{][^{]*\{(?:[^{}]*\{[^{}]*\}[^{}]*|[^{}]*)*\}/g,BLOCKS_INSIDE:/[^\s{][^{]*\{[^{}]*\}/g,DECLARATIONS:/[a-zA-Z\-]+[^;]*:[^;]+;/g,RELATIVE_URLS:/url\(['"]?([^\/\)'"][^:\)'"]+)['"]?\)/g,REDUNDANT_COMPONENTS:/(?:\/\*([^*\\\\]|\*(?!\/))+\*\/|@import[^;]+;)/g,REDUNDANT_WHITESPACE:/\s*(,|:|;|\{|\})\s*/g,MORE_WHITESPACE:/\s{2,}/g,FINAL_SEMICOLONS:/;\}/g,NOT_WHITESPACE:/\S+/g};var b,c=false;var d=[];var e=function(a){if(typeof a==="function"){d[d.length]=a}};var f=function(){for(var a=0;a<d.length;a++){d[a](b)}};var g={};var h=function(a,b){if(g[a]){var c=g[a].listeners;if(c){for(var d=0;d<c.length;d++){c[d](b)}}}};var i=function(a,b,c){if(ua.ie&&!window.XMLHttpRequest){window.XMLHttpRequest=function(){return new ActiveXObject("Microsoft.XMLHTTP")}}if(!XMLHttpRequest){return""}var d=new XMLHttpRequest;try{d.open("get",a,true);d.setRequestHeader("X_REQUESTED_WITH","XMLHttpRequest")}catch(e){c();return}var f=false;setTimeout(function(){f=true},5e3);document.documentElement.style.cursor="progress";d.onreadystatechange=function(){if(d.readyState===4&&!f){if(!d.status&&location.protocol==="file:"||d.status>=200&&d.status<300||d.status===304||navigator.userAgent.indexOf("Safari")>-1&&typeof d.status==="undefined"){b(d.responseText)}else{c()}document.documentElement.style.cursor="";d=null}};d.send("")};var j=function(b){b=b.replace(a.REDUNDANT_COMPONENTS,"");b=b.replace(a.REDUNDANT_WHITESPACE,"$1");b=b.replace(a.MORE_WHITESPACE," ");b=b.replace(a.FINAL_SEMICOLONS,"}");return b};var k={mediaQueryList:function(b){var c={};var d=b.indexOf("{");var e=b.substring(0,d);b=b.substring(d+1,b.length-1);var f=[],g=[];var h=e.toLowerCase().substring(7).split(",");for(var i=0;i<h.length;i++){f[f.length]=k.mediaQuery(h[i],c)}var j=b.match(a.BLOCKS_INSIDE);if(j!==null){for(i=0;i<j.length;i++){g[g.length]=k.rule(j[i],c)}}c.getMediaQueries=function(){return f};c.getRules=function(){return g};c.getListText=function(){return e};c.getCssText=function(){return b};return c},mediaQuery:function(b,c){b=b||"";var d=false,e;var f=[];var g=true;var h=b.match(a.NOT_WHITESPACE);for(var i=0;i<h.length;i++){var j=h[i];if(!e&&(j==="not"||j==="only")){if(j==="not"){d=true}}else{if(!e){e=j}else{if(j.charAt(0)==="("){var k=j.substring(1,j.length-1).split(":");f[f.length]={mediaFeature:k[0],value:k[1]||null}}}}}return{getList:function(){return c||null},getValid:function(){return g},getNot:function(){return d},getMediaType:function(){return e},getExpressions:function(){return f}}},rule:function(a,b){var c={};var d=a.indexOf("{");var e=a.substring(0,d);var f=e.split(",");var g=[];var h=a.substring(d+1,a.length-1).split(";");for(var i=0;i<h.length;i++){g[g.length]=k.declaration(h[i],c)}c.getMediaQueryList=function(){return b||null};c.getSelectors=function(){return f};c.getSelectorText=function(){return e};c.getDeclarations=function(){return g};c.getPropertyValue=function(a){for(var b=0;b<g.length;b++){if(g[b].getProperty()===a){return g[b].getValue()}}return null};return c},declaration:function(a,b){var c=a.indexOf(":");var d=a.substring(0,c);var e=a.substring(c+1);return{getRule:function(){return b||null},getProperty:function(){return d},getValue:function(){return e}}}};var l=function(c){if(typeof c.cssHelperText!=="string"){return}var d={mediaQueryLists:[],rules:[],selectors:{},declarations:[],properties:{}};var e=d.mediaQueryLists;var f=d.rules;var g=c.cssHelperText.match(a.BLOCKS);if(g!==null){for(var h=0;h<g.length;h++){if(g[h].substring(0,7)==="@media "){e[e.length]=k.mediaQueryList(g[h]);f=d.rules=f.concat(e[e.length-1].getRules())}else{f[f.length]=k.rule(g[h])}}}var i=d.selectors;var j=function(a){var b=a.getSelectors();for(var c=0;c<b.length;c++){var d=b[c];if(!i[d]){i[d]=[]}i[d][i[d].length]=a}};for(h=0;h<f.length;h++){j(f[h])}var l=d.declarations;for(h=0;h<f.length;h++){l=d.declarations=l.concat(f[h].getDeclarations())}var m=d.properties;for(h=0;h<l.length;h++){var n=l[h].getProperty();if(!m[n]){m[n]=[]}m[n][m[n].length]=l[h]}c.cssHelperParsed=d;b[b.length]=c;return d};var m=function(a,b){a.cssHelperText=j(b||a.innerHTML);return l(a)};var n=function(){c=true;b=[];var d=[];var e=function(){for(var a=0;a<d.length;a++){l(d[a])}var b=document.getElementsByTagName("style");for(a=0;a<b.length;a++){m(b[a])}c=false;f()};var g=document.getElementsByTagName("link");for(var h=0;h<g.length;h++){var k=g[h];if(k.getAttribute("rel").indexOf("style")>-1&&k.href&&k.href.length!==0&&!k.disabled){d[d.length]=k}}if(d.length>0){var n=0;var o=function(){n++;if(n===d.length){e()}};var p=function(b){var c=b.href;i(c,function(d){d=j(d).replace(a.RELATIVE_URLS,"url("+c.substring(0,c.lastIndexOf("/"))+"/$1)");b.cssHelperText=d;o()},o)};for(h=0;h<d.length;h++){p(d[h])}}else{e()}};var o={mediaQueryLists:"array",rules:"array",selectors:"object",declarations:"array",properties:"object"};var p={mediaQueryLists:null,rules:null,selectors:null,declarations:null,properties:null};var q=function(a,b){if(p[a]!==null){if(o[a]==="array"){return p[a]=p[a].concat(b)}else{var c=p[a];for(var d in b){if(b.hasOwnProperty(d)){if(!c[d]){c[d]=b[d]}else{c[d]=c[d].concat(b[d])}}}return c}}};var r=function(a){p[a]=o[a]==="array"?[]:{};for(var c=0;c<b.length;c++){q(a,b[c].cssHelperParsed[a])}return p[a]};domReady(function(){var a=document.body.getElementsByTagName("*");for(var b=0;b<a.length;b++){a[b].checkedByCssHelper=true}if(document.implementation.hasFeature("MutationEvents","2.0")||window.MutationEvent){document.body.addEventListener("DOMNodeInserted",function(a){var b=a.target;if(b.nodeType===1){h("DOMElementInserted",b);b.checkedByCssHelper=true}},false)}else{setInterval(function(){var a=document.body.getElementsByTagName("*");for(var b=0;b<a.length;b++){if(!a[b].checkedByCssHelper){h("DOMElementInserted",a[b]);a[b].checkedByCssHelper=true}}},1e3)}});var s=function(a){if(typeof window.innerWidth!="undefined"){return window["inner"+a]}else{if(typeof document.documentElement!="undefined"&&typeof document.documentElement.clientWidth!="undefined"&&document.documentElement.clientWidth!=0){return document.documentElement["client"+a]}}};return{addStyle:function(a,b){var c=document.createElement("style");c.setAttribute("type","text/css");document.getElementsByTagName("head")[0].appendChild(c);if(c.styleSheet){c.styleSheet.cssText=a}else{c.appendChild(document.createTextNode(a))}c.addedWithCssHelper=true;if(typeof b==="undefined"||b===true){cssHelper.parsed(function(b){var d=m(c,a);for(var e in d){if(d.hasOwnProperty(e)){q(e,d[e])}}h("newStyleParsed",c)})}else{c.parsingDisallowed=true}return c},removeStyle:function(a){return a.parentNode.removeChild(a)},parsed:function(a){if(c){e(a)}else{if(typeof b!=="undefined"){if(typeof a==="function"){a(b)}}else{e(a);n()}}},mediaQueryLists:function(a){cssHelper.parsed(function(b){a(p.mediaQueryLists||r("mediaQueryLists"))})},rules:function(a){cssHelper.parsed(function(b){a(p.rules||r("rules"))})},selectors:function(a){cssHelper.parsed(function(b){a(p.selectors||r("selectors"))})},declarations:function(a){cssHelper.parsed(function(b){a(p.declarations||r("declarations"))})},properties:function(a){cssHelper.parsed(function(b){a(p.properties||r("properties"))})},broadcast:h,addListener:function(a,b){if(typeof b==="function"){if(!g[a]){g[a]={listeners:[]}}g[a].listeners[g[a].listeners.length]=b}},removeListener:function(a,b){if(typeof b==="function"&&g[a]){var c=g[a].listeners;for(var d=0;d<c.length;d++){if(c[d]===b){c.splice(d,1);d-=1}}}},getViewportWidth:function(){return s("Width")},getViewportHeight:function(){return s("Height")}}}();domReady(function(){var b;var c={LENGTH_UNIT:/[0-9]+(em|ex|px|in|cm|mm|pt|pc)$/,RESOLUTION_UNIT:/[0-9]+(dpi|dpcm)$/,ASPECT_RATIO:/^[0-9]+\/[0-9]+$/,ABSOLUTE_VALUE:/^[0-9]*(\.[0-9]+)*$/};var d=[];var e=function(){var a="css3-mediaqueries-test";var b=document.createElement("div");b.id=a;var c=cssHelper.addStyle("@media all and (width) { #"+a+" { width: 1px !important; } }",false);document.body.appendChild(b);var d=b.offsetWidth===1;c.parentNode.removeChild(c);b.parentNode.removeChild(b);e=function(){return d};return d};var f=function(){b=document.createElement("div");b.style.cssText="position:absolute;top:-9999em;left:-9999em;"+"margin:0;border:none;padding:0;width:1em;font-size:1em;";document.body.appendChild(b);if(b.offsetWidth!==16){b.style.fontSize=16/b.offsetWidth+"em"}b.style.width=""};var g=function(a){b.style.width=a;var c=b.offsetWidth;b.style.width="";return c};var h=function(a,b){var d=a.length;var e=a.substring(0,4)==="min-";var f=!e&&a.substring(0,4)==="max-";if(b!==null){var h;var i;if(c.LENGTH_UNIT.exec(b)){h="length";i=g(b)}else{if(c.RESOLUTION_UNIT.exec(b)){h="resolution";i=parseInt(b,10);var j=b.substring((i+"").length)}else{if(c.ASPECT_RATIO.exec(b)){h="aspect-ratio";i=b.split("/")}else{if(c.ABSOLUTE_VALUE){h="absolute";i=b}else{h="unknown"}}}}}var k,l;if("device-width"===a.substring(d-12,d)){k=screen.width;if(b!==null){if(h==="length"){return e&&k>=i||f&&k<i||!e&&!f&&k===i}else{return false}}else{return k>0}}else{if("device-height"===a.substring(d-13,d)){l=screen.height;if(b!==null){if(h==="length"){return e&&l>=i||f&&l<i||!e&&!f&&l===i}else{return false}}else{return l>0}}else{if("width"===a.substring(d-5,d)){k=document.documentElement.clientWidth||document.body.clientWidth;if(b!==null){if(h==="length"){return e&&k>=i||f&&k<i||!e&&!f&&k===i}else{return false}}else{return k>0}}else{if("height"===a.substring(d-6,d)){l=document.documentElement.clientHeight||document.body.clientHeight;if(b!==null){if(h==="length"){return e&&l>=i||f&&l<i||!e&&!f&&l===i}else{return false}}else{return l>0}}else{if("device-aspect-ratio"===a.substring(d-19,d)){return h==="aspect-ratio"&&screen.width*i[1]===screen.height*i[0]}else{if("color-index"===a.substring(d-11,d)){var m=Math.pow(2,screen.colorDepth);if(b!==null){if(h==="absolute"){return e&&m>=i||f&&m<i||!e&&!f&&m===i}else{return false}}else{return m>0}}else{if("color"===a.substring(d-5,d)){var n=screen.colorDepth;if(b!==null){if(h==="absolute"){return e&&n>=i||f&&n<i||!e&&!f&&n===i}else{return false}}else{return n>0}}else{if("resolution"===a.substring(d-10,d)){var o;if(j==="dpcm"){o=g("1cm")}else{o=g("1in")}if(b!==null){if(h==="resolution"){return e&&o>=i||f&&o<i||!e&&!f&&o===i}else{return false}}else{return o>0}}else{return false}}}}}}}}};var i=function(a){var b=a.getValid();var c=a.getExpressions();var d=c.length;if(d>0){for(var e=0;e<d&&b;e++){b=h(c[e].mediaFeature,c[e].value)}var f=a.getNot();return b&&!f||f&&!b}};var j=function(a){var b=a.getMediaQueries();var c={};for(var e=0;e<b.length;e++){if(i(b[e])){c[b[e].getMediaType()]=true}}var f=[],g=0;for(var h in c){if(c.hasOwnProperty(h)){if(g>0){f[g++]=","}f[g++]=h}}if(f.length>0){d[d.length]=cssHelper.addStyle("@media "+f.join("")+"{"+a.getCssText()+"}",false)}};var k=function(a){for(var b=0;b<a.length;b++){j(a[b])}if(ua.ie){document.documentElement.style.display="block";setTimeout(function(){document.documentElement.style.display=""},0);setTimeout(function(){cssHelper.broadcast("cssMediaQueriesTested")},100)}else{cssHelper.broadcast("cssMediaQueriesTested")}};var l=function(){for(var a=0;a<d.length;a++){cssHelper.removeStyle(d[a])}d=[];cssHelper.mediaQueryLists(k)};var m=0;var n=function(){var a=cssHelper.getViewportWidth();var b=cssHelper.getViewportHeight();if(ua.ie){var c=document.createElement("div");c.style.position="absolute";c.style.top="-9999em";c.style.overflow="scroll";document.body.appendChild(c);m=c.offsetWidth-c.clientWidth;document.body.removeChild(c)}var d;var f=function(){var c=cssHelper.getViewportWidth();var f=cssHelper.getViewportHeight();if(Math.abs(c-a)>m||Math.abs(f-b)>m){a=c;b=f;clearTimeout(d);d=setTimeout(function(){if(!e()){l()}else{cssHelper.broadcast("cssMediaQueriesTested")}},500)}};window.onresize=function(){var a=window.onresize||function(){};return function(){a();f()}}()};var o=document.documentElement;o.style.marginLeft="-32767px";setTimeout(function(){o.style.marginTop=""},2e4);return function(){if(!e()){cssHelper.addListener("newStyleParsed",function(a){k(a.cssHelperParsed.mediaQueryLists)});cssHelper.addListener("cssMediaQueriesTested",function(){if(ua.ie){o.style.width="1px"}setTimeout(function(){o.style.width="";o.style.marginLeft=""},0);cssHelper.removeListener("cssMediaQueriesTested",arguments.callee)});f();l()}else{o.style.marginLeft=""}n()}}());try{document.execCommand("BackgroundImageCache",false,true)}catch(e){}

// Lazy Load!
(function(a,b,c,d){var e=a(b);a.fn.lazyload=function(f){function j(){var b=0;g.each(function(){var c=a(this);if(i.skip_invisible&&!c.is(":visible"))return;if(!a.abovethetop(this,i)&&!a.leftofbegin(this,i))if(!a.belowthefold(this,i)&&!a.rightoffold(this,i))c.trigger("appear"),b=0;else if(++b>i.failure_limit)return!1})}var g=this,h,i={threshold:0,failure_limit:0,event:"scroll",effect:"show",container:b,data_attribute:"original",skip_invisible:!0,appear:null,load:null};return f&&(d!==f.failurelimit&&(f.failure_limit=f.failurelimit,delete f.failurelimit),d!==f.effectspeed&&(f.effect_speed=f.effectspeed,delete f.effectspeed),a.extend(i,f)),h=i.container===d||i.container===b?e:a(i.container),0===i.event.indexOf("scroll")&&h.bind(i.event,function(a){return j()}),this.each(function(){var b=this,c=a(b);b.loaded=!1,c.one("appear",function(){if(!this.loaded){if(i.appear){var d=g.length;i.appear.call(b,d,i)}a("<img />").bind("load",function(){c.hide().attr("src",c.data(i.data_attribute))[i.effect](i.effect_speed),b.loaded=!0;var d=a.grep(g,function(a){return!a.loaded});g=a(d);if(i.load){var e=g.length;i.load.call(b,e,i)}}).attr("src",c.data(i.data_attribute))}}),0!==i.event.indexOf("scroll")&&c.bind(i.event,function(a){b.loaded||c.trigger("appear")})}),e.bind("resize",function(a){j()}),/iphone|ipod|ipad.*os 5/gi.test(navigator.appVersion)&&e.bind("pageshow",function(b){b.originalEvent.persisted&&g.each(function(){a(this).trigger("appear")})}),a(c).ready(function(){j()}),this},a.belowthefold=function(c,f){var g;return f.container===d||f.container===b?g=e.height()+e.scrollTop():g=a(f.container).offset().top+a(f.container).height(),g<=a(c).offset().top-f.threshold},a.rightoffold=function(c,f){var g;return f.container===d||f.container===b?g=e.width()+e.scrollLeft():g=a(f.container).offset().left+a(f.container).width(),g<=a(c).offset().left-f.threshold},a.abovethetop=function(c,f){var g;return f.container===d||f.container===b?g=e.scrollTop():g=a(f.container).offset().top,g>=a(c).offset().top+f.threshold+a(c).height()},a.leftofbegin=function(c,f){var g;return f.container===d||f.container===b?g=e.scrollLeft():g=a(f.container).offset().left,g>=a(c).offset().left+f.threshold+a(c).width()},a.inviewport=function(b,c){return!a.rightoffold(b,c)&&!a.leftofbegin(b,c)&&!a.belowthefold(b,c)&&!a.abovethetop(b,c)},a.extend(a.expr[":"],{"below-the-fold":function(b){return a.belowthefold(b,{threshold:0})},"above-the-top":function(b){return!a.belowthefold(b,{threshold:0})},"right-of-screen":function(b){return a.rightoffold(b,{threshold:0})},"left-of-screen":function(b){return!a.rightoffold(b,{threshold:0})},"in-viewport":function(b){return a.inviewport(b,{threshold:0})},"above-the-fold":function(b){return!a.belowthefold(b,{threshold:0})},"right-of-fold":function(b){return a.rightoffold(b,{threshold:0})},"left-of-fold":function(b){return!a.rightoffold(b,{threshold:0})}})})(jQuery,window,document)
