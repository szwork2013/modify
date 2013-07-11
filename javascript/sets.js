$(function() { 
	$('.sizeSelect').change(function() {
		if($(this).val() == "classic") {
			var href = $(this).parent().contents().find("a").attr('href');
			$(this).parent().contents().find("a").attr('href', setCharAt(href, href.length-3, 5));
		}
		else {
			var href = $(this).parent().contents().find("a").attr('href');
			$(this).parent().contents().find("a").attr('href', setCharAt(href, href.length-3, 6));
		}
	});
	
	function setCharAt(str,index,chr) {
		if(index > str.length-1) return str;
		return str.substr(0,index) + chr + str.substr(index+1);
	}
});