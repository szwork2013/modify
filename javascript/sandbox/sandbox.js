
// JavaScript Document

// Declare Global Variables \\
var currentStep = 1;
var activeSize; // Which size is open?
var beenOpenedBig = false; // Had the big size been opened already?
var beenOpenedBigger = false; // Had the bigger size been opened already?
var inBigSandbox = new Array();
inBigSandbox[0] = new Array();
inBigSandbox[1] = new Array();
var inBiggerSandbox = {};
inBiggerSandbox[0] = new Array();
inBiggerSandbox[1] = new Array();
var bigStyleWatchCurItem = "";
var biggerStyleWatchCurItem = "";
var bigStyleMods = new Array();
var biggerStyleMods = new Array();
var currentBigStep = 1;
var	currentBiggerStep = 1;

var whyBuildBig = ['You like to scream softly', 'Small and smoove is winning', 
'You want an accent, not a centerpiece', 'You wear tight jackets'];

var whyBuildBigger = ['You love Modify and the world must know.', 'You only want all the attention.', 
'You want a centerpiece, not an accent.', 'Bigger is better, homey.'];


// Handle the div resizing during the first step of the sandbox process 
$(function() {
	
	var dataInfo = {};
	$.get('../../sandbox/data.txt?75', function(data) {
		
		dataInfo = $.parseJSON(data);
		
		if(window.location.hash) hashLoad();
	});
	
	$("#bigStyleStarter .starterBottom, #biggerStyleStarter .starterBottom").hover(function(){
		whyBuildBig.sort(function() {return 0.5 - Math.random()});
		whyBuildBigger.sort(function() {return 0.5 - Math.random()});
		for (var i = 0; i < 4; i++) {
			$("#bigStyleStarter .starterBottom .starterBottomExpanded").append(whyBuildBig[i] + "<br />");
			$("#biggerStyleStarter .starterBottom .starterBottomExpanded").append(whyBuildBigger[i] + "<br />");
		}
		$("#bigStyleStarter .starterBottom .starterBottomExpanded").slideDown();
		$("#biggerStyleStarter .starterBottom .starterBottomExpanded").slideDown();
	}, function() {
		$("#bigStyleStarter .starterBottom .starterBottomExpanded").slideUp();
		$("#bigStyleStarter .starterBottom .starterBottomExpanded").empty();
		$("#biggerStyleStarter .starterBottom .starterBottomExpanded").slideUp();
		$("#biggerStyleStarter .starterBottom .starterBottomExpanded").empty();
	});
	
	$(".starterImageBigLS").hover(function() {
		$(this).children().show();	
	}, function() {
		$(this).children().hide();
	});
	
	$(".starterImageBiggerLS").hover(function() {
		$(this).children().show();	
	}, function() {
		$(this).children().hide();
	});
	
	$(".starterCallToActionBig").hover(function() {
		$(this).css( 'background-position', '0 -42px' );	
	}, function() {
		$(this).css( 'background-position', '0 0' );
	});
	
	$(".starterCallToActionBigger").hover(function() {
		$(this).css( 'background-position', '0 -42px' );	
	}, function() {
		$(this).css( 'background-position', '0 0' );
	});
	
	function toggleSize(size) {
		
		$("#canvasHeaderBiggerSwitch").unbind('click');
		$("#canvasHeaderBigSwitch").unbind('click');
		if ($("#bigStyleWatchPopout").is(":visible")) {  
       		$("#bigStyleWatchPopout").fadeOut(400, function() {
				
				$("#bigStyleWatchDisplay").fadeIn(400);
			});
		}
		if ($("#biggerStyleWatchPopout").is(":visible")) {  
       		$("#biggerStyleWatchPopout").fadeOut(400, function() {
				$("#biggerStyleWatchDisplay").fadeIn(400);
			});
		}
		
		if (size == "big") {
			activeSize = "big";
			$("#canvasHeaderBiggerSwitch").css({ 'background-position' : '0 -41px', 'cursor' : 'pointer' }).bind('click', function() {
				toggleSize('bigger');
			});
			$("#canvasHeaderBigSwitch").css({ 'background-position' : '0 0px', 'cursor' : 'default' }).unbind('click');
			$("#sandboxCanvasSlider").animate( {left: 0 }, 800);
			updateSelectorBubbles('big');
			$(".biggerSoldOut").hide();
			$(".bigSoldOut").show();
		}
		else if (size == "bigger") {
			activeSize = "bigger";
			$("#canvasHeaderBigSwitch").css({ 'background-position' : '0 -41px', 'cursor' : 'pointer' }).bind('click', function() {
				toggleSize('big');
			});



			$("#canvasHeaderBiggerSwitch").css({ 'background-position' : '0 0px', 'cursor' : 'default' }).unbind('click');
			$("#sandboxCanvasSlider").animate( {left: -701 }, 800);
			updateSelectorBubbles('bigger');
			$(".bigSoldOut").hide();
			$(".biggerSoldOut").show();
		}
	}
	
	$("#canvasHeaderBigSwitch").bind('click', function() {
		activeSize = "big"; //Set the current active size to this size
		transitionFromStepOne('Big');
	});
	
	$("#canvasHeaderBiggerSwitch").bind('click', function() {
		activeSize = "bigger"; //Set the current active size to this size
		transitionFromStepOne('Bigger');
	});
	
	function updateSelectorBubbles(size) {
		$(".selectorBubble").remove();
		$("div.remove").remove();
		if(size == 'big') {
			for (var i=0; i<2; i++) {
				for(var j=0; j<inBigSandbox[i].length; j++) {
					var count = inBigSandbox[i][j][1];
					if(count >= 1) {
						if (i==0) var type = "faces";
						if (i==1) var type = "strap";
						var id = inBigSandbox[i][j][0];
						if(id.charAt(id.length-3) == 2) {
							id = setCharAt(id, id.length-3, 1);
						}
						else {
							id = setCharAt(id, id.length-3,3);
						}
						$("li").has($('a[id="' + id + '"]')).filter(":first").append("<div class='remove' id='"+ id + "' title='" + type + "'>remove</div><div class='selectorBubble'>" + count + "</div>");
					}
				}
			}
		}
		else if(size == 'bigger') {
			for (var i=0; i<2; i++) {
				for(var j=0; j<inBiggerSandbox[i].length; j++) {
					var count = inBiggerSandbox[i][j][1]
					if(count >= 1) {
						if (i==0) var type = "faces";
						if (i==1) var type = "strap";
						var id = inBiggerSandbox[i][j][0];
						$("li").has($('a[id="' + id + '"]')).filter(":first").append("<div class='remove' id='"+ id + "' title='" + type + "'>remove</div><div class='selectorBubble'>" + count + "</div>");
					}
				}
			}
		}
	}
	
	function transitionFromStepOne(size) {
		$(".starterImageBigLS").hide();
		$(".starterImageBiggerLS").hide();
		$(".starterImage").fadeOut(200, function() {
			if (window["current"+size+"Step"] == 1) {
				$(".sampleContent").fadeIn();	
			}
		});
		$("#greySelect").fadeOut(200, function() {
			$("#faceSelectorContainer").fadeIn();
			$("#strapSelectorContainer").fadeIn();	
		});
		$("#greyBottom").fadeOut(200, function() {
			$("#bottomRowInnerContent").fadeIn();	
		});
		$(".step2").removeClass("stepInactive").css('cursor', 'pointer').bind('click', function() {
			$("#sandboxScrolling").animate( {left: -0 }, 1000);
			$(".step2").removeClass("stepInactive");
			$(".step1").addClass("stepInactive");
			$(".step3").addClass("stepInactive");
		});
		
		$(".step1").addClass("stepInactive");
		
		if (size == "Big") {
			toggleSize('big');
		}
		else if (size == "Bigger") {
			toggleSize('bigger');
		}

		$('.scrollbars').jScrollPane({
				verticalDragMinHeight: 100,
				verticalDragMaxHeight: 100
		});
	}
	
	$("ul.thumb li a").hover(function() { // Used to display the thumbnail preview of the piece
		var offset = $(this).offset();	// Get the position coordinates of the object that is being hovered
		$('#itemHoverDiv').animate( { // Set the absolute coordinates of the thumbnail preview element
			left: offset.left + 48,
			top: (offset.top - 15 )
		}, 0);
		var url = "url(" + $(this).attr("href") + ")"
		$("#itemHoverImageDiv").css("background-image", url);
		$('#itemHoverDiv').fadeIn(0); // Display it!
	}, function() {

		$('#itemHoverDiv').fadeOut(0);
	});
	
	$("ul.thumb li a").click(function() { //Here we get into the real fun. This handles adding products to the Sandbox!
		if (activeSize == "big") {
			if (currentBigStep == 1) {
				$('#bigStyleCanvas .sampleContent').fadeOut(400, function() {  // Hide the "Alrighty Then" frame
					$('#bigStyleWatchDisplay').css('height', 350).fadeIn(0);         // Bring in the actual watch piece
				});
				currentBigStep = 2;
			}
			var currentObject = $(this);
			sku = ($(this).attr('id')); // Get SKU of clicked item
			if(sku.charAt(sku.length-3) == 1) {
				sku = setCharAt(sku, sku.length-3, 2);
			}
			else {
				sku = setCharAt(sku, sku.length-3, 4);
			}
			var type = dataInfo.SKU[sku].productType;  // Get product type of clicked item
			
			if ($("#bigStyleWatchPopout").is(":visible")) {
				$("#bigStyleWatchPopout").fadeOut(400, function() { // Hide the the other piece
					$("#bigStyleWatchDisplay").fadeIn(400, function() {

						var update = updateSandbox("add", type, sku);	
					});  // Display the popout
				});
			}
			else {
				var update = updateSandbox("add", type, sku);
			}
			
			return false;
		}
		if (activeSize == "bigger") {
			if (currentBiggerStep == 1) {
				$('#biggerStyleCanvas .sampleContent').fadeOut(400, function() {  // Hide the "Alrighty Then" frame
					$('#biggerStyleWatchDisplay').css('height', 350).fadeIn(0);         // Bring in the actual watch piece
				});
				currentBiggerStep = 2;
			}
			var currentObject = $(this);
			sku = $(this).attr('id'); // Get SKU of clicked item
			var type = dataInfo.SKU[sku].productType;  // Get product type of clicked item
			
			
			if ($("#biggerStyleWatchPopout").is(":visible")) { //If the popout is visible, hide that ish.
				$("#biggerStyleWatchPopout").fadeOut(400, function() { // Hide the the other piece
					$("#biggerStyleWatchDisplay").fadeIn(400, function() {
						var update = updateSandbox("add", type, sku);	
					});  // Display the popout
				});
			}
			else {
					var update = updateSandbox("add", type, sku);
			}
			
			return false;
		}
	});
	
	
	// Handle removing products from Sandbox
	$(".delete").live("click", function() {
		var sku = $(this).attr('id');
		var type = $(this).attr('title');
		
		if (activeSize == "big") {
			var length = 0;
			var index = null;
			if (type == "faces") {
				index = 0;
				length = inBigSandbox[0].length;
			}
			if (type == "strap") {
				index = 1;
				length = inBigSandbox[1].length;
			}
			for (var i = 0; i<length; i++) {
				if (inBigSandbox[index][i][0] == sku && inBigSandbox[index][i][1] == 1) {
					$(this).parent().fadeOut(100,function() {
						$(this).remove();
					});
				}
				else if (inBigSandbox[index][i][0] == sku && inBigSandbox[index][i][1] > 2) {
					$(this).prev('.moveUp').attr('src', '/templates/modify/images/blue/sandbox/combo/' + (parseInt(inBigSandbox[index][i][1])-1) + 'mini.png');
				}
				else if (inBigSandbox[index][i][0] == sku && inBigSandbox[index][i][1] == 2) {
					$(this).removeClass('moveUp');
					$(this).prev('.moveUp').remove();	
				}
			}
			updateSandbox("remove", type, sku);
		}
		if (activeSize == "bigger") {
			var length = 0;
			var index = null;
			if (type == "faces") {
				index = 0;
				length = inBiggerSandbox[0].length;
			}
			if (type == "strap") {
				index = 1;
				length = inBiggerSandbox[1].length;
			}
			for (var i = 0; i<length; i++) {
				if (inBiggerSandbox[index][i][0] == sku && inBiggerSandbox[index][i][1] == 1) {
					$(this).parent().fadeOut(100,function() {
						$(this).remove();
					});
				}
				else if (inBiggerSandbox[index][i][0] == sku && inBiggerSandbox[index][i][1] > 2) {
					$(this).prev('.moveUp').attr('src', '/templates/modify/images/blue/sandbox/combo/' + (parseInt(inBiggerSandbox[index][i][1])-1) + 'mini.png');
				}
				else if (inBiggerSandbox[index][i][0] == sku && inBiggerSandbox[index][i][1] == 2) {
					$(this).removeClass('moveUp');
					$(this).prev('.moveUp').remove();	
				}
			}
			updateSandbox("remove", type, sku);
		}
		return false;
	});
	
	$(".remove").live("click", function() {
		var sku = $(this).attr('id');
		var type = $(this).attr('title');

		if (activeSize == "big") {
			if(sku.charAt(sku.length-3) == 1) {
				sku = setCharAt(sku, sku.length-3, 2);
			}
			else {
				sku = setCharAt(sku, sku.length-3, 4);
			}
			var length = 0;
			var index = null;
			if (type == "faces") {
				index = 0;
				length = inBigSandbox[0].length;
			}
			if (type == "strap") {
				index = 1;
				length = inBigSandbox[1].length;
			}
			for (var i = 0; i<length; i++) {
				if (inBigSandbox[index][i][0] == sku && inBigSandbox[index][i][1] == 1) {
					$('.delete[id="' + sku + '"]').parent().fadeOut(100,function() {
						$('.delete[id="' + sku + '"]').remove();
					});
				}
				else if (inBigSandbox[index][i][0] == sku && inBigSandbox[index][i][1] > 2) {
					$('.delete[id="' + sku + '"]').prev('.moveUp').attr('src', '/templates/modify/images/blue/sandbox/combo/' + (parseInt(inBigSandbox[index][i][1])-1) + 'mini.png');
				}
				else if (inBigSandbox[index][i][0] == sku && inBigSandbox[index][i][1] == 2) {
					$('.delete[id="' + sku + '"]').removeClass('moveUp');
					$('.delete[id="' + sku + '"]').prev('.moveUp').remove();	
				}
			}
			updateSandbox("remove", type, sku);
		}
		if (activeSize == "bigger") {
			var length = 0;
			var index = null;
			if (type == "faces") {
				index = 0;
				length = inBiggerSandbox[0].length;
			}
			if (type == "strap") {
				index = 1;
				length = inBiggerSandbox[1].length;
			}
			for (var i = 0; i<length; i++) {
				if (inBiggerSandbox[index][i][0] == sku && inBiggerSandbox[index][i][1] == 1) {
					$('.delete[id="' + sku + '"]').parent().fadeOut(100,function() {
						$('.delete[id="' + sku + '"]').remove();
					});
				}
				else if (inBiggerSandbox[index][i][0] == sku && inBiggerSandbox[index][i][1] > 2) {
					$('.delete[id="' + sku + '"]').prev('.moveUp').attr('src', '/templates/modify/images/blue/sandbox/combo/' + (parseInt(inBiggerSandbox[index][i][1])-1) + 'mini.png');
				}
				else if (inBiggerSandbox[index][i][0] == sku && inBiggerSandbox[index][i][1] == 2) {
					$('.delete[id="' + sku + '"]').removeClass('moveUp');
					$('.delete[id="' + sku + '"]').prev('.moveUp').remove();	
				}
			}
			updateSandbox("remove", type, sku);
		}
		return false;
	});
	
	// Open up the individual pop-out page when the watch is clicked... AWESOME!!!!! //
	$("#bigStyleWatchDisplay .watchDisplay").live("click", function() {		
		openIndividual("open", $(this).attr('id'),"big");
	});
	
	// Open up the individual pop-out page when the watch is clicked... AWESOME!!!!! //
	$("#biggerStyleWatchDisplay .watchDisplay").live("click", function() {		
		openIndividual("open", $(this).attr('id'),"bigger");
	});
	
	function openIndividual(action, sku, size, direction) {
		if (action == "open") {
			$(".addThis").fadeOut();
			if (size == "big") {
				bigStyleWatchCurItem = sku;           // Set sku for global use
			}
			else {
				biggerStyleWatchCurItem = sku;           // Set sku for global use
			}
			var name = dataInfo.SKU[sku].productName; // Get Name
			var description = dataInfo.SKU[sku].productDescription; // Get Description
			var type = dataInfo.SKU[sku].productType; // Get the clicked product's type
			
			url = "url('/templates/modify/images/blue/sandbox/" + type + "/bigish_" + sku + ".jpg')"; // Get the image URL of the product
			$(".popoutImage").css( "background-image", url);  // Load the image in
			$(".popoutImageLink").attr("href", "/templates/modify/images/blue/sandbox/" + type + "/big_" + sku + ".jpg");  
			$(".popoutWatchName").text(name);  // Set name
			$(".popoutDescription").html(description); // Set description
			$(".indivFB").attr('title', sku);
			$(".indivTwit").attr('title', sku);
			$(".indivEmail").attr('title', sku);
			
			var pinParams = $(".popoutShare iframe").attr("src");
			if (pinParams != undefined) {
				pinParams = pinParams.indexOf("?");	
				pinParams = $(".popoutShare iframe").attr("src").slice(0,pinParams+1);
				$(".popoutShare iframe").attr("src", pinParams + "url="+encodeURIComponent("https://dev.modifywatches.com/sandbox.php#sku=\""+sku+"\";size=\""+size+"\";")+"&media="+encodeURIComponent("https://dev.modifywatches.com/templates/modify/images/blue/sandbox/"+type+"/bigish_"+sku+".jpg")+"&description="+encodeURIComponent(name)+"&layout=horizontal");
			}
			
			$("#"+ size + "StyleWatchDisplay").fadeOut(400, function() { // Hide the the other piece
				$("#"+ size + "StyleWatchPopout").fadeIn(400);  // Display the popout
			});
			indivHashes(sku, size);
		}
		else if (action == "move") {
			var currentIndex = null;
			
			for (var i = 0; i < window[size+ "StyleMods"].length; i++) { // Loop through all items being displayed in sandbox.
				if (window[size+ "StyleMods"][i] == sku) { 
					currentIndex = i;
				}
			}
			if (currentIndex != null && currentIndex != (window[size+ "StyleMods"].length-1)) {
				$("#popoutTop").fadeOut();
				if (direction == "right") {
					var nextPieceIndex = parseInt(currentIndex) + 1; // Get next pieces index
				}
				if (direction == "left") {
					var nextPieceIndex = parseInt(currentIndex) - 1; // Get next pieces index
				}
				sku = window[size + "StyleMods"][nextPieceIndex]; // Get next pieces SKU
				window[size + "StyleWatchCurItem"] = sku; // Update this variable
				var name = dataInfo.SKU[sku].productName; // Get Name
				var description = dataInfo.SKU[sku].productDescription; // Get Description
				var type = dataInfo.SKU[sku].productType; // Get the clicked product's type
				
				url = "url('/templates/modify/images/blue/sandbox/" + type + "/bigish_" + sku + ".jpg')"; // Get the image URL of the product
				$(".popoutImage").css( "background-image", url);  // Load the image in
				$(".popoutImageLink").attr("href", "/templates/modify/images/blue/sandbox/" + type + "/big_" + sku + ".jpg");  
				$(".popoutWatchName").text(name);  // Set name
				$(".popoutDescription").html(description); // Set description
				$(".indivFB").attr('title', sku);
				$(".indivTwit").attr('title', sku);
				$(".indivEmail").attr('title', sku);
				
				var pinParams = $(".popoutShare iframe").attr("src");
				if (pinParams != undefined) {
					pinParams = pinParams.indexOf("?");	
					pinParams = $(".popoutShare iframe").attr("src").slice(0,pinParams+1);
					$(".popoutShare iframe").attr("src", pinParams + "url="+encodeURIComponent("https://dev.modifywatches.com/sandbox.php#sku=\""+sku+"\";size=\""+size+"\";")+"&media="+encodeURIComponent("https://dev.modifywatches.com/templates/modify/images/blue/sandbox/"+type+"/bigish_"+sku+".jpg")+"&description="+encodeURIComponent(name)+"&layout=horizontal");
				}
				
				$("#popoutTop").fadeIn();
			}
			indivHashes(sku, size);
		}
	}
	
	// Move to the next watch in array when "sandboxMoveRight" is clicked //
	$("#bigStyleWatchPopout #sandboxMoveRight").click(function() {
		openIndividual("move", bigStyleWatchCurItem, "big", "right");
	});
	
	
	// Move left! //
	$("#bigStyleWatchPopout #sandboxMoveLeft").click(function() {
		openIndividual("move", bigStyleWatchCurItem, "big", "left");
	});
	
	// Move to the next watch in array when "sandboxMoveRight" is clicked //
	$("#biggerStyleWatchPopout #sandboxMoveRight").click(function() {
		openIndividual("move", biggerStyleWatchCurItem, "bigger", "right");
	});
	
	
	// Move left! //
	$("#biggerStyleWatchPopout #sandboxMoveLeft").click(function() {
		openIndividual("move", biggerStyleWatchCurItem, "bigger", "left");
	});
	
	// Move left on left key //
	$(document).keydown(function(e){
    if (e.keyCode == 37) { 
		if ($("#bigStyleWatchPopout").is(":visible")) {  
       		$("#bigStyleWatchPopout #sandboxMoveLeft").click();
       		return false;
		}
		if ($("#biggerStyleWatchPopout").is(":visible")) {  
       		$("#biggerStyleWatchPopout #sandboxMoveLeft").click();
       		return false;
		}
    }
	});
	
	// Move right on right key //
	$(document).keydown(function(e){
    if (e.keyCode == 39) { 
		if ($("#bigStyleWatchPopout").is(":visible")) {  
		   $("#bigStyleWatchPopout #sandboxMoveRight").click();
		   return false;
		}
		if ($("#biggerStyleWatchPopout").is(":visible")) {  
		   $("#biggerStyleWatchPopout #sandboxMoveRight").click();
		   return false;
		}
    }
	});
	
	// Close popout on escape key //
	$(document).keydown(function(e){
    if (e.keyCode == 27) { 
		if ($("#bigStyleWatchPopout").is(":visible")) {  
       		$("#bigStyleWatchPopout").fadeOut(400, function() {
				$("#bigStyleWatchDisplay").fadeIn(400);
				$(".addThis").fadeIn();
				genHashURL();
			});

       		return false;
		}
		if ($("#biggerStyleWatchPopout").is(":visible")) {  
       		$("#biggerStyleWatchPopout").fadeOut(400, function() {
				$("#biggerStyleWatchDisplay").fadeIn(400);
				$(".addThis").fadeIn();
				genHashURL();
			});
       		return false;
		}
    }
	});
	
	//Close the individual pop-out page when the close div is clicked! //
	$("#bigStyleWatchPopout .popoutClose").live("click", function() {
		$("#bigStyleWatchPopout").fadeOut(400, function() {
			$("#bigStyleWatchDisplay").fadeIn(400);
			$(".addThis").fadeIn();
			genHashURL();
		});
	});
	
	
	//Close the individual pop-out page when the close div is clicked! //
	$("#biggerStyleWatchPopout .popoutClose").live("click", function() {
		$("#biggerStyleWatchPopout").fadeOut(400, function() {
			$("#biggerStyleWatchDisplay").fadeIn(400);
			$(".addThis").fadeIn();
			genHashURL();
		});
	});
	
	$("#addToCart").click(function() {
		$(this).css('background-position', '0 -106px');
		addToCart();
	});
	
	function updateSandbox(action, type, sku) {
		if (activeSize == "big") {
			if (action == "add") {
				if (type == "faces") { //Check if face
					var facemultiples = false;
					if (inBigSandbox[0].length > 0) {
						for (var i = 0; i < inBigSandbox[0].length; i++) { //loop through array	
							if (inBigSandbox[0][i][0] == sku) { //Check if its already there
								facemultiples = true;
								inBigSandbox[0][i][1] = parseInt(inBigSandbox[0][i][1]) + 1; // If so, increase quantity.
							}
						}
					}
					if (facemultiples == false) {
						newsku = setCharAt(sku, sku.length-3, 1);
						var piecePrice = parseInt($('a#' + newsku).parent().parent().prev().children('.price').html());
						inBigSandbox[0].push(new Array(sku, 1, piecePrice));
					}
				}  // Add the new piece into the party
				else {
					var strapmultiples = false;
					if (inBigSandbox[1].length > 0) {
						for (var i = 0; i < inBigSandbox[1].length; i++) { //loop through array			
							if (inBigSandbox[1][i][0] == sku) { //Check if its already there
								strapmultiples = true;
								inBigSandbox[1][i][1] = parseInt(inBigSandbox[1][i][1]) + 1; // If so, increase quantity.
							}
						}
					}
					if (strapmultiples == false) {
						newsku = setCharAt(sku, sku.length-3, 3);
						var piecePrice = parseInt($('a#' + newsku).parent().parent().prev().children('.price').html());
						inBigSandbox[1].push(new Array(sku, 1, piecePrice));
					}
				}
				
				var updatethis = updateSandbox("update");
				return false;
			}
			
			if (action == "remove") { // Let's remove some pieces
				if (type == "faces") { //If its a face...
					for (var i = 0; i < inBigSandbox[0].length; i++) { //Loop through the faces
						if (inBigSandbox[0][i][0] == sku) { //Check if we are at the right index...
							if (inBigSandbox[0][i][1] == 1) { //if there is only one in the sandbox...
								inBigSandbox[0].splice(i, 1); //Get rid of it
								i = inBigSandbox[0].length; // And exit loop
							}
							else { // If more than one in sandbox...
								inBigSandbox[0][i][1] = parseInt(inBigSandbox[0][i][1]) - 1; //Get rid of one
								i = inBigSandbox[0].length; //And exit loop
							}
						}
					}
				}
				if (type == "strap") { //read above comments, these are almost identical.
					for (var i = 0; i < inBigSandbox[1].length; i++) {
						if (inBigSandbox[1][i][0] == sku) {
							if (inBigSandbox[1][i][1] == 1) {
								inBigSandbox[1].splice(i, 1);
								i = inBigSandbox[1].length;
							}
							else {
								inBigSandbox[1][i][1] = parseInt(inBigSandbox[1][i][1]) - 1;
								i = inBigSandbox[1].length;
							}
						}
					}
				}
				var updatethis = updateSandbox("update"); //Re populate sandbox
			}
			
			if (action == "update") {
				bigStyleMods = [];
				$('#bigStyleWatchDisplay').jScrollPane({verticalDragMinHeight: 100, verticalDragMaxHeight: 100}).data('jsp').destroy(); // Kill the scrollbars so we can recreate them to adapt to height changes.
				$('#bigStyleWatchDisplay').empty(); // Kill all currently displayed products
				
				var numberOfFaces = 0;
				var numberOfIndivFaces = inBigSandbox[0].length;
				if (numberOfIndivFaces > 0) {
					for (var i = 0; i < numberOfIndivFaces; i++) {
						numberOfFaces +=parseInt(inBigSandbox[0][i][1]);  // Get number of faces in Big Sandbox
					}
				}
				var numberOfStraps = 0;
				var numberOfIndivStraps = inBigSandbox[1].length;
				if (numberOfIndivStraps > 0) {
					for (var i = 0; i < numberOfIndivStraps; i++) {
						numberOfStraps += parseInt(inBigSandbox[1][i][1]);  // Get number of straps in Big Sandbox
					}
				}
				
				if ((numberOfIndivFaces < 4 && numberOfIndivStraps < 2) || (numberOfIndivStraps < 4 && numberOfIndivFaces < 2)) {
					var displayWidth = 216;
					var displayHeight = 240;
				}
				else
				{
					var displayWidth = 152;
					var displayHeight = 167;
				}
				
				if (numberOfFaces > 0 && numberOfStraps > 0) { // If there are actually combos to make
					for (var i = 0; i < numberOfIndivFaces; i++) { // Loop through all faces in Sandbox
						for (var j = 0; j < numberOfIndivStraps; j++) { // And for each face, loop through straps in Sandbox
							combosku = inBigSandbox[0][i][0] + inBigSandbox[1][j][0]; // Get URL image of this combination
							productName = dataInfo.combos.SKU[combosku].productName;
							$('#bigStyleWatchDisplay').append("<div style='width:" + displayWidth + "px; height:" + displayHeight + "px;' class='watchDisplay' id='" + combosku + "'><div class='img'><img src='/templates/modify/images/blue/sandbox/combo/" + combosku + ".jpg' style='width:" + (displayWidth - 11) + "px;' /></div><div class='desc'>" + productName + "</div></div>"); // Add this combination to the DOM.
							bigStyleMods.push(combosku);
						}
					}
				}
				if (numberOfFaces > 0 && numberOfStraps == 0) { // If there is only faces
					for (var i = 0; i < numberOfIndivFaces; i++) { // Loop through all faces in Sandbox
						productName = dataInfo.SKU[inBigSandbox[0][i][0]].productName;
						$('#bigStyleWatchDisplay').append("<div style='width:" + displayWidth + "px; height:" + displayHeight + "px;' class='watchDisplay' id='" + inBigSandbox[0][i][0] + "'><div class='img'><img src='/templates/modify/images/blue/sandbox/faces/" + inBigSandbox[0][i][0] + ".jpg' style='width:" + (displayWidth - 11) + "px;' /></div><div class='desc'>" + productName + "</div></div>"); // Add this combination to the DOM.
						bigStyleMods.push(inBigSandbox[0][i][0]);
					}	
				}
				else if (numberOfStraps > 0 && numberOfFaces == 0) { // If there is only straps
					for (var i = 0; i < numberOfIndivStraps; i++) { // Loop through all straps in Sandbox
						productName = dataInfo.SKU[inBigSandbox[1][i][0]].productName;
						$('#bigStyleWatchDisplay').append("<div style='width:" + displayWidth + "px; height:" + displayHeight + "px;' class='watchDisplay' id='" + inBigSandbox[1][i][0] + "'><div class='img'><img src='/templates/modify/images/blue/sandbox/strap/" + inBigSandbox[1][i][0] + ".jpg' style='width:" + (displayWidth - 11) + "px;' /></div><div class='desc'>" + productName + "</div></div>"); // Add this combination to the DOM.
						bigStyleMods.push(inBigSandbox[1][i][0]);
					}	
				}
				if ((parseInt(numberOfIndivFaces) > 3 && parseInt(numberOfIndivStraps) < 2) || (parseInt(numberOfIndivStraps) > 3 && parseInt(numberOfIndivFaces) < 2)  || (parseInt(numberOfIndivStraps)*parseInt(numberOfIndivFaces)) > 10) {
					$('#bigStyleWatchDisplay').css('overflow', 'auto');
					$('#bigStyleWatchDisplay').css('overflow-y', 'auto');
					$('#bigStyleWatchDisplay').jScrollPane({ // Reinitialize the scrollbars
						verticalDragMinHeight: 100,
						verticalDragMaxHeight: 100
					});		
				}
				
				$("#bigFaceCount").html(numberOfFaces);
				$("#bigStrapCount").html(numberOfStraps);
				$("#bigModCount").html((parseInt(numberOfFaces)*parseInt(numberOfStraps)));
				$("#totalModCount").html((parseInt($("#biggerModCount").html()) + parseInt($("#bigModCount").html())));
				if (parseInt($("#totalModCount").html()) == 0) { $("#imsosad").show(); } else { $("#imsosad").hide(); }
				
				$('#cumulativePrice').html(function() {
				  var totalPrice = 0;
				  for (var i = 0; i < inBigSandbox[0].length; i++) {
					quantity = inBigSandbox[0][i][1];
					totalPrice += inBigSandbox[0][i][2]*quantity;
				  }
				  for (var i = 0; i < inBigSandbox[1].length; i++) {
					quantity = inBigSandbox[1][i][1];
					totalPrice += inBigSandbox[1][i][2]*quantity;
				  }
				  for (var i = 0; i < inBiggerSandbox[0].length; i++) {
					quantity = inBiggerSandbox[0][i][1];
					totalPrice += inBiggerSandbox[0][i][2]*quantity;
				  }
				  for (var i = 0; i < inBiggerSandbox[1].length; i++) {
					quantity = inBiggerSandbox[1][i][1];
					totalPrice += inBiggerSandbox[1][i][2]*quantity;
				  }
				  totalPrice = "$" + totalPrice;
				  return totalPrice;
				});
				
				updateSelectorBubbles('big');
				genHashURL();
			}
			

			return false;
		}
		else if (activeSize == "bigger") {
			if (action == "add") {
				if (type == "faces") { //Check if face
					var facemultiples = false;
					if (inBiggerSandbox[0].length > 0) {
						for (var i = 0; i < inBiggerSandbox[0].length; i++) { //loop through array	
							if (inBiggerSandbox[0][i][0] == sku) { //Check if its already there
								facemultiples = true;
								inBiggerSandbox[0][i][1] = parseInt(inBiggerSandbox[0][i][1]) + 1; // If so, increase quantity.
							}
						}
					}
					if (facemultiples == false) {
						var piecePrice = parseInt($('a#' + sku).parent().parent().prev().children('.price').html());
						inBiggerSandbox[0].push(new Array(sku, 1, piecePrice));
					}
				}  // Add the new piece into the party
				else {
					var strapmultiples = false;
					if (inBiggerSandbox[1].length > 0) {
						for (var i = 0; i < inBiggerSandbox[1].length; i++) { //loop through array			
							if (inBiggerSandbox[1][i][0] == sku) { //Check if its already there
								strapmultiples = true;
								inBiggerSandbox[1][i][1] = parseInt(inBiggerSandbox[1][i][1]) + 1; // If so, increase quantity.
							}
						}
					}
					if (strapmultiples == false) {
						var piecePrice = parseInt($('a#' + sku).parent().parent().prev().children('.price').html());
						inBiggerSandbox[1].push(new Array(sku, 1, piecePrice));
					}
				}
				
				var updatethis = updateSandbox("update");
				return false;
			}
			
			if (action == "remove") { // Let's remove some pieces
				if (type == "faces") { //If its a face...
					for (var i = 0; i < inBiggerSandbox[0].length; i++) { //Loop through the faces
						if (inBiggerSandbox[0][i][0] == sku) { //Check if we are at the right index...
							if (inBiggerSandbox[0][i][1] == 1) { //if there is only one in the sandbox...
								inBiggerSandbox[0].splice(i, 1); //Get rid of it
								i = inBiggerSandbox[0].length; // And exit loop
							}
							else { // If more than one in sandbox...
								inBiggerSandbox[0][i][1] = parseInt(inBiggerSandbox[0][i][1]) - 1; //Get rid of one
								i = inBiggerSandbox[0].length; //And exit loop
							}
						}
					}
				}
				if (type == "strap") { //read above comments, these are almost identical.
					for (var i = 0; i < inBiggerSandbox[1].length; i++) {
						if (inBiggerSandbox[1][i][0] == sku) {
							if (inBiggerSandbox[1][i][1] == 1) {
								inBiggerSandbox[1].splice(i, 1);
								i = inBiggerSandbox[1].length;
							}
							else {
								inBiggerSandbox[1][i][1] = parseInt(inBiggerSandbox[1][i][1]) - 1;
								i = inBiggerSandbox[1].length;
							}
						}
					}
				}
				var updatethis = updateSandbox("update"); //Re populate sandbox
			}
			
			if (action == "update") {
				biggerStyleMods = [];
				$('#biggerStyleWatchDisplay').jScrollPane({verticalDragMinHeight: 100, verticalDragMaxHeight: 100}).data('jsp').destroy(); // Kill the scrollbars so we can recreate them to adapt to height changes.
				$('#biggerStyleWatchDisplay').empty(); // Kill all currently displayed products
				
				var numberOfFaces = 0;
				var numberOfIndivFaces = inBiggerSandbox[0].length;
				if (numberOfIndivFaces > 0) {
					for (var i = 0; i < numberOfIndivFaces; i++) {
						numberOfFaces +=parseInt(inBiggerSandbox[0][i][1]);  // Get number of faces in Bigger Sandbox
					}
				}
				var numberOfStraps = 0;
				var numberOfIndivStraps = inBiggerSandbox[1].length;
				if (numberOfIndivStraps > 0) {
					for (var i = 0; i < numberOfIndivStraps; i++) {
						numberOfStraps += parseInt(inBiggerSandbox[1][i][1]);  // Get number of straps in Bigger Sandbox
					}
				}
				
				if ((numberOfIndivFaces < 4 && numberOfIndivStraps < 2) || (numberOfIndivStraps < 4 && numberOfIndivFaces < 2)) {
					var displayWidth = 216;
					var displayHeight = 240;
				}
				else
				{
					var displayWidth = 152;
					var displayHeight = 167;
				}
				
				var totalPrice = 0;
				if (numberOfFaces > 0 && numberOfStraps > 0) { // If there are actually combos to make
					for (var i = 0; i < numberOfIndivFaces; i++) { // Loop through all faces in Sandbox
						for (var j = 0; j < numberOfIndivStraps; j++) { // And for each face, loop through straps in Sandbox
							combosku = inBiggerSandbox[0][i][0] + inBiggerSandbox[1][j][0]; // Get URL image of this combination
							productName = dataInfo.combos.SKU[combosku].productName;
							$('#biggerStyleWatchDisplay').append("<div style='width:" + displayWidth + "px; height:" + displayHeight + "px;' class='watchDisplay' id='" + combosku + "'><div class='img'><img src='/templates/modify/images/blue/sandbox/combo/" + combosku + ".jpg' style='width:" + (displayWidth - 11) + "px;' /></div><div class='desc'>" + productName + "</div></div>"); // Add this combination to the DOM.
							biggerStyleMods.push(combosku);
						}
					}
				}
				if (numberOfFaces > 0 && numberOfStraps == 0) { // If there is only faces
					for (var i = 0; i < numberOfIndivFaces; i++) { // Loop through all faces in Sandbox
						productName = dataInfo.SKU[inBiggerSandbox[0][i][0]].productName;
						$('#biggerStyleWatchDisplay').append("<div style='width:" + displayWidth + "px; height:" + displayHeight + "px;' class='watchDisplay' id='" + inBiggerSandbox[0][i][0] + "'><div class='img'><img src='/templates/modify/images/blue/sandbox/faces/" + inBiggerSandbox[0][i][0] + ".jpg' style='width:" + (displayWidth - 11) + "px;' /></div><div class='desc'>" + productName + "</div></div>"); // Add this combination to the DOM.
						biggerStyleMods.push(inBiggerSandbox[0][i][0]);
					}	
				}
				else if (numberOfStraps > 0 && numberOfFaces == 0) { // If there is only straps
					for (var i = 0; i < numberOfIndivStraps; i++) { // Loop through all straps in Sandbox
						productName = dataInfo.SKU[inBiggerSandbox[1][i][0]].productName;
						$('#biggerStyleWatchDisplay').append("<div style='width:" + displayWidth + "px; height:" + displayHeight + "px;' class='watchDisplay' id='" + inBiggerSandbox[1][i][0] + "'><div class='img'><img src='/templates/modify/images/blue/sandbox/strap/" + inBiggerSandbox[1][i][0] + ".jpg' style='width:" + (displayWidth - 11) + "px;' /></div><div class='desc'>" + productName + "</div></div>"); // Add this combination to the DOM.
						biggerStyleMods.push(inBiggerSandbox[1][i][0]);
					}	
				}
				
				if ((parseInt(numberOfIndivFaces) > 3 && parseInt(numberOfIndivStraps) < 2) || (parseInt(numberOfIndivStraps) > 3 && parseInt(numberOfIndivFaces) < 2)  || (parseInt(numberOfIndivStraps)*parseInt(numberOfIndivFaces)) > 10) {
					$('#biggerStyleWatchDisplay').css('overflow', 'auto');
					$('#biggerStyleWatchDisplay').css('overflow-y', 'auto');
					$('#biggerStyleWatchDisplay').jScrollPane({ // Reinitialize the scrollbars
						verticalDragMinHeight: 100,
						verticalDragMaxHeight: 100
					});		
				}
				
				$("#biggerFaceCount").html(numberOfFaces);
				$("#biggerStrapCount").html(numberOfStraps);
				$("#biggerModCount").html((parseInt(numberOfFaces)*parseInt(numberOfStraps)));
				$("#totalModCount").html((parseInt($("#biggerModCount").html()) + parseInt($("#bigModCount").html())));
				if (parseInt($("#totalModCount").html()) == 0) { $("#imsosad").show(); } else { $("#imsosad").hide(); }
				
				$('#cumulativePrice').html(function() {
				  var totalPrice = 0;
				  for (var i = 0; i < inBigSandbox[0].length; i++) {
					quantity = inBigSandbox[0][i][1];
					totalPrice += inBigSandbox[0][i][2]*quantity;
				  }
				  for (var i = 0; i < inBigSandbox[1].length; i++) {
					quantity = inBigSandbox[1][i][1];
					totalPrice += inBigSandbox[1][i][2]*quantity;
				  }
				  for (var i = 0; i < inBiggerSandbox[0].length; i++) {
					quantity = inBiggerSandbox[0][i][1];
					totalPrice += inBiggerSandbox[0][i][2]*quantity;
				  }
				  for (var i = 0; i < inBiggerSandbox[1].length; i++) {
					quantity = inBiggerSandbox[1][i][1];
					totalPrice += inBiggerSandbox[1][i][2]*quantity;
				  }
				  totalPrice = "$" + totalPrice;
				  return totalPrice;
				});
				
				updateSelectorBubbles('bigger');
				genHashURL();
			}
			
			return false;
		}
		
	}
	
	function addToCart () {
		var products = new Array();
		var response = {};
		
		for (i = 0; i < inBigSandbox[0].length; i++) {
			var productId = dataInfo.SKU[inBigSandbox[0][i][0]].productID;
			var productQuantity = inBigSandbox[0][i][1];
			products.push(new Array(productId, productQuantity));
		}
		for (i = 0; i < inBigSandbox[1].length; i++) {
			var productId = dataInfo.SKU[inBigSandbox[1][i][0]].productID;
			var productQuantity = inBigSandbox[1][i][1];
			products.push(new Array(productId, productQuantity));
		}
		for (i = 0; i < inBiggerSandbox[0].length; i++) {
			var productId = dataInfo.SKU[inBiggerSandbox[0][i][0]].productID;
			var productQuantity = inBiggerSandbox[0][i][1];
			products.push(new Array(productId, productQuantity));
		}
		for (i = 0; i < inBiggerSandbox[1].length; i++) {
			var productId = dataInfo.SKU[inBiggerSandbox[1][i][0]].productID;
			var productQuantity = inBiggerSandbox[1][i][1];
			products.push(new Array(productId, productQuantity));
		}
	
		// $.post("http://dev.modifywatches.com/cart.php", { action: "addsandbox", product_info: products }, function(data) { console.log(data); } );
		url = "https://dev.modifywatches.com/cart.php";
		$.post(url,{ action: "addsandbox", product_info: products }, function(data) {
			
			$("#sandboxCheckout").html(data);
			$("#sandboxScrolling").animate( {left: -975 }, 1000);
			$(".step3").removeClass("stepInactive");
			$(".step1").addClass("stepInactive");
			$(".step2").addClass("stepInactive");
			clearCart();
			$('#addToCart').css('background-position', '');
		});
			
		return false;
	}
	
	function clearCart() {
		inBiggerSandbox[0].length = 0;
		inBiggerSandbox[1].length = 0;
		inBigSandbox[0].length = 0;
		inBigSandbox[1].length = 0;
		updateSandbox("update");
		return false;	
	}
	
	$("#clearButton").bind('click', function() {
		clearCart();
		return false;
	});
	
	function hashLoad() {
		var mf,ms,cf,cs,sku = null;
		eval(decode(window.location.hash.substring(1)));
		$("#greySelect").hide();
		$("#greyBottom").hide();
		if(mf != null) {
			activeSize = "big";
			if (currentBigStep == 1) {
				$('#bigStyleCanvas .sampleContent').hide();  // Hide the "Alrighty Then" frame
				$('#bigStyleWatchDisplay').css('height', 350).show();         // Bring in the actual watch piece
				currentBigStep = 2;
			}
			transitionFromStepOne('Big');
			mf = mf.split(",");
			for(var i = 0; i < mf.length; i++) {
				pieces = mf[i].split("-");
				for (var j=0; j<pieces[1]; j++) {
					updateSandbox("add", "faces", pieces[0]);
				}
			}
		}
		
		if(ms != null) {
			activeSize = "big";
			if (currentBigStep == 1) {
				$('#bigStyleCanvas .sampleContent').hide();  // Hide the "Alrighty Then" frame
				$('#bigStyleWatchDisplay').css('height', 350).show();         // Bring in the actual watch piece
				currentBigStep = 2;
			}
			transitionFromStepOne('Big');
			ms = ms.split(",");
			for(var i = 0; i < ms.length; i++) {
				pieces = ms[i].split("-");
				for (var j=0; j<pieces[1]; j++) {
					updateSandbox("add", "strap", pieces[0]);
				}
			}
		}
		
		if(cf != null) {
			activeSize = "bigger";
			if (currentBiggerStep == 1) {
				$('#biggerStyleCanvas .sampleContent').hide();  // Hide the "Alrighty Then" frame
				$('#biggerStyleWatchDisplay').css('height', 350).show();         // Bring in the actual watch piece
				currentBiggerStep = 2;
			}
			transitionFromStepOne('Bigger');
			cf = cf.split(",");
			for(var i = 0; i < cf.length; i++) {
				pieces = cf[i].split("-");
				for (var j=0; j<pieces[1]; j++) {
					updateSandbox("add", "faces", pieces[0]);
				}
			}
		}
		
		if(cs != null) {
			activeSize = "bigger";
			if (currentBiggerStep == 1) {
				$('#biggerStyleCanvas .sampleContent').hide();  // Hide the "Alrighty Then" frame
				$('#biggerStyleWatchDisplay').css('height', 350).show();         // Bring in the actual watch piece
				currentBiggerStep = 2;
			}
			transitionFromStepOne('Bigger');
			cs = cs.split(",");
			for(var i = 0; i < cs.length; i++) {
				pieces = cs[i].split("-");
				for (var j=1; j<pieces[1]; j++) {
					updateSandbox("add", "strap", pieces[0]);
				}
			}
		}
		if(sku != null) {
			activeSize = size;
			if (activeSize == "bigger") {
				if (currentBiggerStep == 1) {
					$('#biggerStyleCanvas .sampleContent').hide();  // Hide the "Alrighty Then" frame
					$('#biggerStyleWatchDisplay').css('height', 350).show();         // Bring in the actual watch piece

					currentBiggerStep = 2;
				}
				transitionFromStepOne('Bigger');
			}
			else {
				if (currentBigStep == 1) {
					$('#bigStyleCanvas .sampleContent').hide();  // Hide the "Alrighty Then" frame
					$('#bigStyleWatchDisplay').css('height', 350).show();         // Bring in the actual watch piece
					currentBigStep = 2;
				}
				transitionFromStepOne('Big');
			}
			openIndividual("open", sku, size);
		}
	}
	
	function decode(str) {
    	return unescape(str.replace(/\+/g, " "));
	}
	
	function indivHashes(sku, size) {
		window.location.hash = 'sku="'+sku+'";size="'+size+'";';
	}
	
	function genHashURL() {
		var shareURL = "";
		if(inBigSandbox[0].length > 0) {
			shareURL += 'mf="';
			for(i= 0; i< inBigSandbox[0].length; i++) {
				if(i==0) {
					shareURL += inBigSandbox[0][i][0] + "-" + inBigSandbox[0][i][1];
				}
				else {
					shareURL += "," + inBigSandbox[0][i][0] + "-" + inBigSandbox[0][i][1];
				}
			}
			shareURL += '";';
		}
		
		if(inBigSandbox[1].length > 0) {
			shareURL += 'ms="';
			for(i= 0; i< inBigSandbox[1].length; i++) {
				if(i==0) {
					shareURL += inBigSandbox[1][i][0] + "-" + inBigSandbox[1][i][1];
				}
				else {
					shareURL += "," + inBigSandbox[1][i][0] + "-" + inBigSandbox[1][i][1];
				}
			}
			shareURL += '";';
		}
		
		if(inBiggerSandbox[0].length > 0) {
			shareURL += 'cf="';
			for(i= 0; i< inBiggerSandbox[0].length; i++) {
				if(i==0) {
					shareURL += inBiggerSandbox[0][i][0] + "-" + inBiggerSandbox[0][i][1];
				}
				else {
					shareURL += "," + inBiggerSandbox[0][i][0] + "-" + inBiggerSandbox[0][i][1];
				}
			}
			shareURL += '";';
		}
		
		if(inBiggerSandbox[1].length > 0) {
			shareURL += 'cs="';
			for(i= 0; i< inBiggerSandbox[1].length; i++) {
				if(i==0) {
					shareURL += inBiggerSandbox[1][i][0] + "-" + inBiggerSandbox[1][i][1];
				}
				else {
					shareURL += "," + inBiggerSandbox[1][i][0] + "-" + inBiggerSandbox[1][i][1];
				}
			}
			shareURL += '";';
		}
		window.location.hash = shareURL;
	}
	
	$("#browseMoreFaces").click(function() {
		$("#faceSelector").animate( {top:-215} );
		$("#browseMoreFaces").fadeOut(100, function() {
			$("#browseLessFaces").fadeIn();
		});
	});
	
	$("#browseMoreStraps").click(function() {
		$("#strapSelector").animate( {top:-205} );
		$("#browseMoreStraps").fadeOut(100, function() {
			$("#browseLessStraps").fadeIn();
		});
	});
	
	$("#browseLessStraps").click(function() {
		$("#strapSelector").animate( {top:0} );
		$("#browseLessStraps").fadeOut(100, function() {
			$("#browseMoreStraps").fadeIn();
		});
	});
	
	$("#browseLessFaces").click(function() {
		$("#faceSelector").animate( {top:0} );
		$("#browseLessFaces").fadeOut(100, function() {
			$("#browseMoreFaces").fadeIn();			
		});
	});
	
});

var addthis_share = {
	templates : {
		twitter : 'Check out the dope watches I just created with @modifywatches! {{url}}'
	},
	
	url_transforms : {
		shorten : {
			twitter : 'bitly',
			facebook : 'bitly',
			email : 'bitly'
		}
	},

	shorteners : {
		bitly : {
			login : 'seanchaotic',
			apiKey : 'R_12245b509e1305d4eedfed85961f8527'
		}
	}
};

function setCharAt(str,index,chr) {
	if(index > str.length-1) return str;
	return str.substr(0,index) + chr + str.substr(index+1);
}

(function() {
    window.PinIt = window.PinIt || { loaded:false };
    if (window.PinIt.loaded) return;
    window.PinIt.loaded = true;
    function async_load(){
        var s = document.createElement("script");
        s.type = "text/javascript";
        s.async = true;
        if (window.location.protocol == "https:")
            s.src = "https://assets.pinterest.com/js/pinit.js";
        else
            s.src = "http://assets.pinterest.com/js/pinit.js";
        var x = document.getElementsByTagName("script")[0];
        x.parentNode.insertBefore(s, x);
    }
    if (window.attachEvent)
        window.attachEvent("onload", async_load);
    else
        window.addEventListener("load", async_load, false);
})();