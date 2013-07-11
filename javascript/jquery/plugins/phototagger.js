
// ---
// PhotoTagger plugin written by Ben Nadel.
// Copyright www.bennadel.com 2010.
// ---
(function( window, $ ){
	function PhotoTagger( container, settings ){
		var self = this;
		this.container = container;
		this.settings = settings;
		this.image = this.container.children( "img" );
		this.message = $( "<div class='" + this.getFullClassName( "message" ) + "'></div>" );
		this.tags = $( [] );
		if (
			(this.container.css( "position" ) != "relative") &&
			(this.container.css( "position" ) != "absolute") &&
			(this.container.css( "position" ) != "fixed")
			){
			this.container.css( "position", "relative" );
			
		}
		this.container.width( this.image.width() );
		this.container.height( this.image.height() );
		this.message
			.hide()
			.appendTo( this.container )
		;
		this.container.removeAttr( "title" );
		this.image
			.removeAttr( "title" )
			.removeAttr( "alt" )
		;
		this.isActiveContainer = false;
		this.isLoadingRequired = true;
		if (!this.settings.isDelayedLoad){
			this.isLoadingRequired = false;
			this.loadTags();
		
		}
		this.container.hover(
			function( event ){
				self.activateContainer();
			},
			function( event ){
				self.deactivateContainer();
			}
		);	
		
	}
	
	PhotoTagger.prototype = {
		activateContainer: function(){
			this.isActiveContainer = true;
			if (this.isLoadingRequired){
				this.isLoadingRequired = false;
				this.loadTags();
			
			}
			this.showTags();
		},
		addTag: function( id, x, y, width, height, message, url ){
			var self = this;
			var tag = this.createTag( x, y, width, height, url );
			tag.data( "id", id );
			tag.data( "message", message );
			tag.bind(
				"mouseover.photoTagger",
				function(){
					self.emphasizeTag( tag );
				}
			);
			tag.bind(
				"mouseout.photoTagger",
				function(){
					self.deemphasizeTag( tag );
				}
			);
			this.tags = this.tags.add( tag );
			this.container.append( tag );
			if (this.isActiveContainer){
				tag.show();				
			}
			return( tag );
		},
		createTag: function( left, top, width, height, url ){
			var tag = $( "<a target='_blank' href='"+ url + "' class='" + this.getFullClassName( "tag" ) + "'><br /></a>" );
			tag.css({
				left: (left + "px"),
				top: (top + "px"),
				width: ((width || 1) + "px"),
				height: ((height || 1) + "px"),
				display: "none"
			});
			return( tag );
		},
		deactivateContainer: function(){
			this.isActiveContainer = false;
			this.hideTags();
		},
		deemphasizeTag: function( tag ){
			tag.removeClass( 
				this.getFullClassName( "selected-tag" )
			);
			this.message.hide();
			this.tags.css( "opacity", 1 );
		},
		emphasizeTag: function( tag ){
			var tagPosition = tag.position();
			this.message.html( tag.data( "message" ) );
			
			// Position and show the message.
			this.message
				.css({
					width: (tag.outerWidth()*2-10 + "px"),
					left: ((tagPosition.left + tag.outerWidth() + 12) + "px")
				}).css({
					top: (((tagPosition.top + tag.outerHeight() - this.message.outerHeight()) / 2) + "px")
				})
				.show()
			;
			
			// Make this the selected tag.
			tag.addClass( 
				this.getFullClassName( "selected-tag" )
			);
			
			// Dim all the tags' opacity to visually bring
			// out the currently selected tag.
			this.tags.css( "opacity", this.settings.minOpacity );
			
			// Visually pop the current tag.
			tag.css( "opacity", 1 );
		},
		
		// I get the full CSS class name based on the given 
		// convenience name.
		getFullClassName: function( className ){
			// Prepend the CSS namespace.
			return( this.settings.cssNameSpace + className );
		},
		
		
		// I get the contianer-local top / left coordiantes 
		// of the current mouse position based on the given page-
		// level X,Y coordinates.
		getLocalPosition: function( mouseX, mouseY ){
			// Get the current position of the container.
			var containerOffset = this.container.offset();
		
			// Adjust the client coordiates to acocunt for 
			// the offset of the page and the position of the 
			// container.
			var localPosition = {
				left: Math.floor( 
					mouseX - containerOffset.left + window.scrollLeft() 
				),
				top: Math.floor( 
					mouseY - containerOffset.top + window.scrollTop() 
				)
			};
			
			// Return the local position of the mouse.
			return( localPosition );
		},
		
		
		// I hide the tags associated with this photo.
		hideTags: function(){
			this.tags.hide();
		},
		
		
		// I check to see if the given tag size is valid (tags
		// that entirely eclipse another tag are not valid).
		isPendingTagSizeValid: function(){
			// Get the pending tag dimensions.
			var pendingWidth = this.pendingTag.width();
			var pendingHeight = this.pendingTag.height();
			var pendingLeft = this.pendingTag.position().left;
			var pendingTop = this.pendingTag.position().top;
		
			// Loop over the existing tags to see if any of them
			// are being eclipsed by the pending tag size.
			for (var i = 0 ; i < this.tags.size() ; i++){
			
				// Get the current tag.
				var tag = this.tags.eq( i );	
				
				// Get the current tag position.
				var position = tag.position();
				
				// Check to see if the position is too small.
				if (
					(position.top >= pendingTop) &&
					((position.top + tag.height()) <= (pendingTop + pendingHeight)) &&
					(position.left >= pendingLeft) &&
					((position.left + tag.width()) <= (pendingLeft + pendingWidth))					
					){
					
					// Tag is eclipsed, return false.
					return( false );
					
				}
			
			}
			
			// If we made it this far, the tag is valid.
			return( true );		
		},
		
		// I load the tag records from the server.
		loadTagRecords: function( onSuccess ){
			var self = this;
			
			// Load the tag records.
			$.ajax({
				method: "get",
				url: this.settings.loadURL,
				data: {
					photoID: this.settings.getPhotoID( this.container )
				},
				dataType: "json",
				cache: false,
				success: function( response ){
					// Pass off to handler (if it exists).
					if (onSuccess){
						onSuccess(
							// Clean the response before handing
							// it off to the handler.
							self.settings.cleanAJAXResponse(
								"load",
								response 
							)
						);
					}
				},
				error: function(){
					alert( self.settings.ajaxFailMessage );
				}
			});			
		},
		
		
		// I load the tags from the server and translate them into
		// tags in the photo container.
		loadTags: function(){
			var self = this;
			
			// Load the tag records.
			this.loadTagRecords(
				function( response ){
					// Loop over the response data to create a
					// tag for each record.
					$.each(
						response,
						function( index, tagData ){
							// Add the tag.
							self.addTag(
								tagData.id,
								tagData.x,
								tagData.y,
								tagData.width,
								tagData.height,
								tagData.message,
								tagData.url
							);
						
						}
					
					);
										
				}
			);
		},
						
		// I show the tags associated with this photo.
		showTags: function(){
			this.tags.show();
		}
		
	};
	var isCSSLoaded = false;
	var applyPhotoTagger = function( collection, options ){
		if (
			$.fn.photoTagger.defaultOptions.applyCSS &&
			!isCSSLoaded
			){
			isCSSLoaded = true;
			var styleText = [];
			$.each(
				$.fn.photoTagger.defaultOptions.css,
				function( selector, rule ){
					styleText.push( 
						selector.replace( 
							new RegExp( "\\." ),
							("." + $.fn.photoTagger.defaultOptions.cssNameSpace)
						) + 
						" { " 
					);
					$.each(
						rule,
						function( propertyName, value ){
							styleText.push(
								propertyName + ": " + value + " ;"
							);
						}
					);
					styleText.push( " } " );
				}
			);
			$( "<style type='text/css'>" + styleText.join( "\n" ) + "</style>" )
				.appendTo( "html > head" )
			;
		
		}
		var settings = $.extend(
			{},
			$.fn.photoTagger.defaultOptions,
			options
		);
		collection.each(
			function( index, node ){
				var container = $( this );
				if (container.data( "photoTagger" )){
					return;
					
				}
				var photoTagger = new PhotoTagger( 
					container, 
					settings 
				);
				container.data( "photoTagger", photoTagger );			
			}
		);
		return( collection );
	};
	var applyPhotoTaggerMethod = function( collection, methodName ){
		collection.each(
			function( index, node ){
				var container = $( this );
				var photoTagger = container.data( "photoTagger" );
				if (
					photoTagger && 
					(methodName in photoTagger)
					){
					photoTagger[ methodName ]();
					
				}			
				
			}
		);
		return( collection );
	};
	$.fn.photoTagger = function(){
		if (typeof( arguments[ 0 ] ) == "string"){
			return(
				applyPhotoTaggerMethod( this, arguments[ 0 ] )
			);
			
		} else {
			return(
				applyPhotoTagger( this, arguments[ 0 ] )
			);
		
		}
		
	};
	$.fn.photoTagger.defaultOptions = {
		isDelayedLoad: false,
		loadURL: "",
		cleanAJAXResponse: function( apiAction, response ){
			return( response );
		},
		ajaxFailMessage: "There was a problem with the API.",
		minOpacity: .15,
		getPhotoID: function( container ){
			return( container.find( "> img" ).attr( "id" ) );
		},
		applyCSS: true,
		cssNameSpace: "photo-tagger-",
		css: {
			"a.tag": {
				"background-image": "url( './templates/modify/images/blue/transparent.gif' )",
				"border": "1px solid #FFFFFF",
				"display": "block",
				"height": "1px",
				"position": "absolute",
				"width": "1px",
				"z-index": "100",
				"zoom": "1"
			},
			
			"a.selected-tag": {
				"border-color": "#FFFFFF",
				"z-index": "200"
			},
			
			"div.message": {
				"background-color": "#363636",
				"color": "#FFF",
				"display": "none",
				"font-family": "verdana",
				"font-size": "12px",
				"margin-top": "4px",
				"padding": "5px",
				"position": "absolute",
				"z-index": "200",
				"line-height": "20px",
				"-webkit-border-radius": "5px",
				"-moz-border-radius": "5px",
				"border-radius": "5px",
				"-moz-background-clip": "padding",
				"-webkit-background-clip": "padding-box",
				"background-clip": "padding-box",
			},
			
			"div.message:after": {
				"content": "''",
				"position":"absolute",
				"bottom":"-15px",
				"left":"10px",
				"border-style":"solid", 
				"top":"16px",
				"left":"-10px",
				"bottom":"auto",
				"border-width":"10px 10px 10px 0",
				"border-color":"transparent #363636"
			},
			
			"div.message a": {
				"color": "#FFF",
				"text-decoration": "none",
				"font-weight": "bold"
			}
		}
		
	};

})( jQuery( window ), jQuery );


