$(document).ready(function() {
	var slideWidth = $('#comSlideshowSlider .comSlide').length * 109;
	
	$(".iframe").fancybox({
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'width'             : 350,
		'height'            : 300
		
	});

	$('#comMainPhoto').hover(function() {
		curHeight = $('#comPhotoOverlay').height();
		autoHeight = $('#comPhotoOverlay').css('height', 'auto').height();
		$('#comPhotoOverlay').height(curHeight).animate({height: autoHeight}, 200);
	}, function() {
		$('#comPhotoOverlay').animate( {height: 20} ); 	
	});
	
	$('.comSlide').click(function() {
		var image = $(this).children('.comSlideInfo').children('.slideImage').attr('href');
		$('#comMainPhoto').css('background-image', 'url(' + image + ')');
		$('#comPhotoOverlay').html($(this).children('.comSlideInfo').html());
	});
	
	$('#comScrollRight').click(function() {
		currentLeft = $('#comSlideshowSlider').css('left').slice(0, -2);
		if(	currentLeft > (436 - slideWidth)) {
			$('#comSlideshowSlider').animate({ left: '-=109' });
		}
	});
	
	$('#comScrollLeft').click(function() {
		currentLeft = $('#comSlideshowSlider').css('left').slice(0, -2);
		if(	currentLeft < 0) {
			$('#comSlideshowSlider').animate({ left: '+=109' });
		}
	});
	
});