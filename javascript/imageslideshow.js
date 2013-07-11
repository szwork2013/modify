var shiftLength = 0;

	$(document).ready(function() {	
		$(".main_image .desc").show(); //Show Banner
		$(".main_image .block").animate({ opacity: 0.85 }, 1 ); //Set Opacity
		$(".image_thumb ul li:first").addClass('active'); //Add the active class (highlights the very first list item by default)
		//runs function, set timer here
			slideSwitchTimer = setInterval( 'slideSwitchTimed()', 6000 );
	});
	
	window.onblur = function () {
		slideSwitchTimer = clearInterval(slideSwitchTimer);
	}
	
	window.onfocus = function () {
		slideSwitchTimer = setInterval('slideSwitchTimed()', 6000);	
	}
	
	//runs function on click
	$(function() {
		$(".image_thumb ul li").click(function () {
				clearInterval(slideSwitchTimer);
				slideSwitchTimer = setInterval( 'slideSwitchTimed()', 6000 );
				$active = $(this);
				slideSwitchClick();
				return false;
		})
	});

	function slideSwitchTimed() {
		$active = $('.image_thumb ul li.active').next();
		if ( $active.length == 0 ) {
			$active = $('.image_thumb ul li:first');
			$(".image_thumb ul").animate({ left: 0 }, 250 );
			shiftLength = 0;
		}//goes back to start when finishes
		slideSwitch();
	}
	function slideSwitchClick() {
		slideSwitch();
	}
	function slideSwitch() {
		var $prev = $('.image_thumb ul li.active');
		//Show active list-item
		$prev.removeClass('active');
		$active.addClass('active');
		//Set Variables
		var imgAlt = $active.find('img').attr("alt"); //Get Alt Tag of Image
		var imgTitle = $active.find('a').attr("href"); //Get Main Image URL
		var imgDesc = $active.find('.block').html(); //Get HTML of the "block" container
		var imgDescHeight = $(".main_image").find('.block').height(); //Find the height of the "block"
		if ($(this).is(".active")) { //If the list item is active/selected, then…
			return false; // Don't click through – Prevents repetitive animations on active/selected list-item
		} else { //If not active then…
			//Animate the Description
			$(".main_image img").animate({ opacity: 0}, 250 );
			$(".main_image .block").animate({ opacity: 0, marginBottom: -imgDescHeight }, 250 , function() {
			$(".main_image .block").html(imgDesc).animate({ opacity: 0.85, marginBottom: "0" }, 250 );
			$(".main_image img").attr({ src: imgTitle , alt: imgAlt}).animate({ opacity: 1}, 250 );
			});
			
			 if ($('.image_thumb ul li.active').attr("name") == (parseInt($('.image_thumb ul').children().size())-1) || $('.image_thumb ul li.active').attr("name") == (parseInt($('.image_thumb ul').children().size())-2)) {
				 $(".image_thumb ul").animate({ left: -448 }, 250 );
			}
			else if ($('.image_thumb ul li.active').attr("name") == parseInt($('.image_thumb ul').children().size())) {}
			else {
				shiftLength = parseInt($('.image_thumb ul li.active').attr("name"))*112 - 112;
				$(".image_thumb ul").animate({ left: -shiftLength }, 250 );
			}
		}
		return false;
	}