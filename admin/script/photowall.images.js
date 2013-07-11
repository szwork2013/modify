PhotowallImages = {

	// for storing a list of photowall images for the current photowall
	images: []
};

PhotowallImages.refreshDeleteSelectedButton = function () {
	if (PhotowallImages.images.length) {
		$('#photowallImagesDeleteSelected').attr('disabled', false);
	} else {
		$('#photowallImagesDeleteSelected').attr('disabled', true);
	}
};

PhotowallImages.deleteImages = function (deleteImages) {

	var data = {
		photowallimageshandler: 'deleteMultiple',
		'images[]': deleteImages
	};

	var options = {
		cache: false,
		type: 'POST',
		url: 'remote.php?w=photowallimages',
		dataType: 'xml',
		data: data,
		success: function (xml) {
			var nodes;

			var errorhtml = '';
			var warninghtml = '';

			// check for images that weren't deleted due to errors
			$('error', xml).each(function(){
				var imageId = parseInt($(this).attr('image'), 10);
				var image = PhotowallImages.getImageById(imageId);
				if (!image) {
					return;
				}

				image.unfadeRow();
				
				errorhtml += '<li>' + $.htmlEncode($(this).text()) + '</li>';
			});

			if (errorhtml) {
				errorhtml = '<div>' + $.htmlEncode(lang.PhotowallImagesDeletedErrors) + '</div><ul>' + errorhtml + '</ul>';
			}

			// check for images that were deleted but had warning messages
			$('warning', xml).each(function(){
				var imageId = parseInt($(this).attr('image'), 10);
				var image = PhotowallImages.getImageById(imageId);
				if (!image) {
					return;
				}

				warninghtml += '<li>' + $.htmlEncode($(this).text()) + '</li>';

				// image confirmed as deleted, remove it from the dom
				image.removeRow();
			});

			if (warninghtml) {
				warninghtml = '<div>' + $.htmlEncode(lang.PhotowallImagesDeletedWarnings) + '</div><ul>' + warninghtml + '</ul>';
			}

			// check for confirmed deleted images
			$('delete', xml).each(function(){
				var imageId = parseInt($(this).attr('image'), 10);
				var image = PhotowallImages.getImageById(imageId);
				if (!image) {
					return;
				}

				// image confirmed as deleted, remove it from the dom
				image.removeRow();
			});

			$('thumbnail', xml).each(function(){
				var imageId = parseInt($(this).attr('image'), 10);
				var image = PhotowallImages.getImageById(imageId);
				if (!image) {
					return;
				}
			});

			PhotowallImages.refreshDeleteSelectedButton();

			if (errorhtml || warninghtml) {
				window.scrollTo(0, 0);
				display_error('MainMessage', errorhtml + warninghtml);
			} else {
				display_success('MainMessage', $.htmlEncode(lang.PhotowallImagesDeleted));
			}
		}
	};

	$.ajax(options);

	// delete each image from the dom without triggering a server update since we've sent one as a batch above
	for (var i = deleteImages.length; i--;) {
		PhotowallImages.getImageById(deleteImages[i]).deleteImage(false);
	}
};

// returns an instance of PhotowallImages.Image for the given photowall image id
PhotowallImages.getImageById = function (id) {
	for (var i = PhotowallImages.images.length; i--;) {
		if (PhotowallImages.images[i].getId() == id) {
			return PhotowallImages.images[i];
		}
	}
};

// return an array of PhotowallImages.Image objects in the order they are configured on screen
PhotowallImages.getImagesInOrder = function () {
	PhotowallImages.images.sort(function(a,b){
		return a.getSort() - b.getSort();
	});

	return PhotowallImages.images;
};

// return a array of image ids in the order they are configured on screen
PhotowallImages.getImageIdsInOrder = function () {
	var images = PhotowallImages.getImagesInOrder();
	var ids = [];
	for (var i = 0; i < images.length; i++) {
		ids.push(images[i].getId());
	}
	return ids;
};

// handles the selection and insertion of images that already exist for other photowalls and in the store image manager
PhotowallImages.useImageFromGallery = {
	// store the ID's of selected images
	selectedImages: [],

	searchLength: 0,

	searchRunning: false,

	lastSearchTerm: '',

	// makes an ajax call to load 10 images from other photowalls that can be selected
	loadImagesFromPhotowalls: function () {
		$('.ImageLoading', $('#ModalContainer')).show();
		$('#UseImageFromGalleryImagesList', $('#ModalContainer')).hide();

		$.getJSON(
			'remote.php?remoteSection=photowalls&w=getsourcephotowallimages',
			PhotowallImages.useImageFromGallery.loadImagesFromSourceToContainer
		);
	},

	// clear the search field
	clearImageSearchField: function (evt) {
		$('#PhotowallImagesSearch', $('#ModalContainer')).each(function() {
			$(this).val($.data(this, "origValue"));
			$(this).addClass('exampleSearchText');
		});

		$('#ClearImageSearch', $('#ModalContainer')).hide();

		PhotowallImages.useImageFromGallery.changeImageSource();
	},

	// function bound to when a character is typed in the search field
	setSearchTimeout: function (evt) {
		if(evt.keyCode == 13) {
			PhotowallImages.useImageFromGallery.searchRunning = false;
			PhotowallImages.useImageFromGallery.searchLength = $('#PhotowallImagesSearch', $('#ModalContainer')).val().length;
			PhotowallImages.useImageFromGallery.searchPhotowallImages();
		} else {
			PhotowallImages.useImageFromGallery.searchLength = $('#PhotowallImagesSearch', $('#ModalContainer')).val().length;
			setTimeout(PhotowallImages.useImageFromGallery.searchPhotowallImages, 1000);
		}
	},

	searchPhotowallImages: function () {

		PhotowallImages.useImageFromGallery.selectedImages = [];
		$('#UseSelectedImages', $('#ModalContainer')).attr('disabled', 'disabled');

		$('#ClearImageSearch', $('#ModalContainer')).show();

		if(PhotowallImages.useImageFromGallery.searchLength != $('#PhotowallImagesSearch', $('#ModalContainer')).val().length
		|| PhotowallImages.useImageFromGallery.searchRunning
		|| $('#PhotowallImagesSearch', $('#ModalContainer')).val().length < 2
		|| $('#PhotowallImagesSearch', $('#ModalContainer')).val() == PhotowallImages.useImageFromGallery.lastSearchTerm) {
			return;
		}

		PhotowallImages.useImageFromGallery.lastSearchTerm = $('#PhotowallImagesSearch', $('#ModalContainer')).val();
		PhotowallImages.useImageFromGallery.searchRunning = true;

		var action = 'getsourcephotowallimages';
		if ($('#PhotowallImageSource', $('#ModalContainer')).val() == 'imagemanager') {
			action = 'getsourceimagemanager';
		}

		$.getJSON(
			'remote.php?remoteSection=photowalls&w=' + action + '&searchterm=' + encodeURIComponent($('#PhotowallImagesSearch', $('#ModalContainer')).val()),
			function(json) {
				PhotowallImages.useImageFromGallery.loadImagesFromSourceToContainer(json);
				PhotowallImages.useImageFromGallery.searchRunning = false;
			}
		);
	},

	// makes an ajax call to load the the first 10 images from the image manager
	loadImagesFromImageGallery: function () {
		$('.ImageLoading', $('#ModalContainer')).show();
		$('#UseImageFromGalleryImagesList', $('#ModalContainer')).hide();
		$('#ChangeImageSourceButton', $('#ModalContainer')).bind('click', PhotowallImages.useImageFromGallery.changeImageSource);
		$.getJSON(
			'remote.php?remoteSection=photowalls&w=getsourceimagemanager',
			PhotowallImages.useImageFromGallery.loadImagesFromSourceToContainer
		);
	},

	// the callback function that is used when retrieving images, used by both the photowalls and image manager sources
	// this function will place the images into the appropriate container and setup all the events
	loadImagesFromSourceToContainer: function(json) {
		if(!json.success) {
			alert(json.message);
			return;
		}

		if(json.images.length == 0) {
			$('#UseImageFromGalleryImagesList', $('#ModalContainer')).show();
			$('#UseImageFromGalleryImagesList', $('#ModalContainer')).addClass('NoPhotowallImagesMessage');
			$('#UseImageFromGalleryImagesList', $('#ModalContainer')).html(json.message);
			$('#ImageGalleryPaging', $('#ModalContainer')).html('');
			$('.ImageLoading', $('#ModalContainer')).hide();
			return;
		} else {
			$('#UseImageFromGalleryImagesList', $('#ModalContainer')).removeClass('NoPhotowallImagesMessage');
		}

		// ideally this HTML would be templated somewhere
		var imageHTML = '<div class="GalleryImageContainer"><div class="galleryImage" id="{image.id}"><img width="{image.thumbwidth}" height="{image.thumbheight}" src="{image.url}" /><div class="overlaySelect" style="margin-top:-{image.margintop}px;"></div></div><span class="PhotowallName">{image.photowallname}</span><a class="ViewLarger thickbox" href="{image.zoom}">' + lang.ImageFromGalleryViewLarger + '</a></div>';
		var allImagesHTML = '';
		var image = {};

		for(i=0;i<json.images.length;i++) {
			image = json.images[i];
			allImagesHTML += imageHTML.replace('{image.url}', '../photowall_images/' + image['url'])
									  .replace(/\{image\.id\}/g, image['id'])
									  .replace('{image.zoom}', image['zoom'])
									  .replace('{image.zoomwidth}', image['zoomwidth'])
									  .replace('{image.zoomheight}', image['zoomheight'])
									  .replace('{image.thumbwidth}', image['thumbwidth'])
									  .replace('{image.thumbheight}', image['thumbheight'])
									  .replace('{image.margintop}', image['thumbheight'])
									  .replace('{image.photowallname}', image['photowallname']);
		}

		$('.ImageLoading', $('#ModalContainer')).hide();

		// load the paging and bind all the links so they make an ajax call and do not change the page
		$('#ImageGalleryPaging', $('#ModalContainer')).html(json.paging);
		$('#ImageGalleryPaging a', $('#ModalContainer')).bind('click', PhotowallImages.useImageFromGallery.onClickPaging);
		$('#UseImageFromGalleryImagesList', $('#ModalContainer')).show();
		$('#UseImageFromGalleryImagesList', $('#ModalContainer')).html(allImagesHTML);
		tb_init('#ModalContainer .thickbox');

		$('#UseImageFromGalleryImagesList .galleryImage', $('#ModalContainer')).bind('click', PhotowallImages.useImageFromGallery.onClickImage);

		for(i=0;i<PhotowallImages.useImageFromGallery.selectedImages.length;i++) {
			$('#' + PhotowallImages.useImageFromGallery.selectedImages[i], $('#ModalContainer')).addClass('galleryImageSelected');
		}
	},

	// this function is called when the user changes the image source -- an be either image manager or other photowalls
	changeImageSource: function () {
		if($('#PhotowallImageSource', $('#ModalContainer')).val() == 'photowalls') {
			PhotowallImages.useImageFromGallery.loadImagesFromPhotowalls();
		} else {
			PhotowallImages.useImageFromGallery.loadImagesFromImageGallery();
		}
	},

	// callback that is activated when the modal window is closed
	onShowModal: function () {

		$('#ChangeImageSourceButton', $('#ModalContainer')).bind('click', PhotowallImages.useImageFromGallery.changeImageSource);
		$('#UseSelectedImages', $('#ModalContainer')).bind('click', PhotowallImages.useImageFromGallerySubmit);
		$('#ClearImageSearchLink', $('#ModalContainer')).bind('click', PhotowallImages.useImageFromGallery.clearImageSearchField);
		$('#PhotowallImagesSearch', $('#ModalContainer')).bind('keyup', PhotowallImages.useImageFromGallery.setSearchTimeout);

		$('#ClearImageSearch', $('#ModalContainer')).hide();

		$('#PhotowallImagesSearch', $('#ModalContainer')).each(function() {
			$.data(this, "origValue", $(this).val());
		});

		$('#PhotowallImagesSearch', $('#ModalContainer')).bind('focus', function() {
			if($.data(this, "origValue") == $(this).val()) {
				$(this).val('');
				$(this).removeClass('exampleSearchText');
			}
		});

		$('#PhotowallImagesSearch', $('#ModalContainer')).bind('blur', function() {
			if($(this).val() == '') {
				$(this).val($.data(this, "origValue"));
				$(this).addClass('exampleSearchText');
			}
		});

		PhotowallImages.useImageFromGallery.loadImagesFromPhotowalls();
	},

	// callback that is activated when the modal window is closed
	onCloseModal: function () {
		PhotowallImages.useImageFromGallery.selectedImages = [];
		$.iModal.close();
	},

	// callback function for clicking on the paging links, this stops them from acting as normal links and runs an ajax call
	onClickPaging: function (evt) {
		$.getJSON(
			$(this).attr('href'),
			PhotowallImages.useImageFromGallery.loadImagesFromSourceToContainer
		);
		return false;
	},

	// function called when the user clicks on the 'View Larger' link
	onClickViewLarger: function (imageZoom, imageWidth, imageHeight) {
		var w = window.open('image.htm?margin=50&title=' + encodeURIComponent(lang.PhotowallImage) + '&image=' + encodeURIComponent(imageZoom), 'photowallImageZoom' , 'width=' +(imageWidth+110) + ',height=' + (imageHeight+110));
		if (!w) {
			return;
		}
		var windowPositionTop = 0;
		var windowPositionLeft = 0;

		windowPositionTop = (screen.availHeight - (imageHeight+110))/2;
		windowPositionLeft = (screen.availWidth - (imageWidth+110))/2;

		w.moveTo(windowPositionLeft, windowPositionTop);
		w.focus();
	},

	// function called when the user clicks on an image to select it for insertion to the current photowall
	onClickImage: function (evt) {
		if(PhotowallImages.useImageFromGallery.selectedImages.in_array($(this).attr('id'))) {
			var newSelected = [];

			for(i=0;i<PhotowallImages.useImageFromGallery.selectedImages.length;i++) {
				if(PhotowallImages.useImageFromGallery.selectedImages[i] != $(this).attr('id')) {
					newSelected.push(PhotowallImages.useImageFromGallery.selectedImages[i]);
				}
			}

			PhotowallImages.useImageFromGallery.selectedImages = newSelected;
			$(this).removeClass('galleryImageSelected');
		} else {
			$(this).addClass('galleryImageSelected');
			PhotowallImages.useImageFromGallery.selectedImages.push($(this).attr('id'));
		}

		if(PhotowallImages.useImageFromGallery.selectedImages.length > 0) {
			$('#UseSelectedImages', $('#ModalContainer')).removeAttr('disabled');
		} else {
			$('#UseSelectedImages', $('#ModalContainer')).attr('disabled', 'disabled');
		}
	},

	// function called when the user clicks 'Use selected images'
	// it sends the list of selected images to the server which ads the images to the current photowall
	useSelectedImages: function () {

		for(i=0;i<PhotowallImages.useImageFromGallery.selectedImages.length;i++) {
			sendPOST += 'images[]=' + PhotowallImages.useImageFromGallery.selectedImages[i] + '&';
		}

		$.post(
			'remote.php?remoteSection=photowalls&w=useselectedimages',
			sendPOST,
			function (json) {
				PhotowallImages.useImageFromGallery.onCloseModal();
			},
			'JSON'
		);

		return false;
	}

};

PhotowallImages.useImageFromGallerySubmit = function () {
	var error = false;

	$('#UseSelectedImages', $('#ModalContainer')).attr('disabled', 'disabled');

	if (!PhotowallImages.useImageFromGallery.selectedImages.length) {
		PhotowallImages.useImageFromGallery.onCloseModal();
		return false;
	}

	// send urls as ajax
	var data = {
		photowallimageshandler: 'useSourceImages',
		'images[]': PhotowallImages.useImageFromGallery.selectedImages
	};

	var successCallback = function (xml) {
		var nodes;
		var images = 0;

		// the response xml will contain new image information, each separately encoded as json
		$('image', xml).each(function(){
			var image;

			try {
				eval('image = ' + $(this).text() + ';');
			} catch (e) {
				return;
			}

			// if successfully eval'd the image object should be ok to send directly to the PhotowallImages.Image constructor which will handle displaying of the new image
			new PhotowallImages.Image(image);
			images++;
		});

		// the response xml will contain error information for each failed url -- combine and display errors
		var errors = [];
		$('error', xml).each(function(){
			errors.push($.htmlEncode($(this).text()));
		});

		var html = '';

		if (images) {
			if (images == 1) {
				html += lang.PhotowallImageAddedSuccessfully + ' ';
			} else {
				html += lang.PhotowallImagesAddedSuccessfully.replace(/\%1\$d/g, images) + ' ';
			}
		}

		if (errors.length) {
			html += lang.PhotowallImageUrlsFailed + '<ul><li>';
			html += errors.join('</li><li>');
			html += '</li></ul>';
			window.scrollTo(0, 0);
			display_error('MainMessage', html);
		} else if (images) {
			display_success('MainMessage', html);
		}
	};

	var completeCallback = function () {
		// close dialog
		PhotowallImages.useImageFromGallery.onCloseModal();
	};

	var options = {
		cache: false,
		type: 'POST',
		url: 'remote.php?w=photowallimages',
		dataType: 'xml',
		data: data,
		success: successCallback,
		complete: completeCallback
	};

	$.ajax(options);
};

PhotowallImages.useImageFromWebDialogSubmit = function () {
	var urlInputs = $('#ModalContentContainer .UseImageFromWebDialogImageUrl');

	var validUrls = [];
	var error = false;

	urlInputs.each(function(){
		var urlInput = $(this);
		var url = String(urlInput.val()).replace(/^\s+|\s+$/, '');

		if (!url) {
			// ignore blank inputs
			return;
		}

		// ideally this would perform some basic client-side validation before sending to server -- but what then? show error instead of sending? field highlighting? there's no room for error presentation in the modal ui design, so the modal is dismissed and errors come back from the server and shown in #MainMessage
		validUrls.push(url);
	});

	if (!validUrls.length) {
		return;
	}

	// send urls as ajax
	var data = {
		photowallimageshandler: 'newImageWeb',
		'imageurls[]': validUrls
	};

	var successCallback = function (xml) {
		var nodes;
		var images = 0;

		// the response xml will contain new image information, each separately encoded as json
		$('image', xml).each(function(){
			var image;

			try {
				eval('image = ' + $(this).text() + ';');
			} catch (e) {
				return;
			}

			// if successfully eval'd the image object should be ok to send directly to the PhotowallImages.Image constructor which will handle displaying of the new image
			new PhotowallImages.Image(image);
			images++;
		});

		// the response xml will contain error information for each failed url -- combine and display errors
		var errors = [];
		$('error', xml).each(function(){
			var message = $(this).text();
			var url = $(this).attr('url');

			if (url) {
				errors.push($.htmlEncode(url) + ' (<a href="#" onclick="alert(' + $.htmlEncode(tinymce.util.JSON.serialize(message)) + ');return false;">' + $.htmlEncode(lang.ShowErrorMessage) + '</a>)');
			} else {
				errors.push($.htmlEncode(message));
			}
		});

		var html = '';

		if (images) {
			if (images == 1) {
				html += lang.PhotowallImageAddedSuccessfully + ' ';
			} else {
				html += lang.PhotowallImagesAddedSuccessfully.replace(/\%1\$d/g, images) + ' ';
			}
		}

		if (errors.length) {
			html += lang.PhotowallImageUrlsFailed + '<ul><li>';
			html += errors.join('</li><li>');
			html += '</li></ul>';
			window.scrollTo(0, 0);
			display_error('MainMessage', html);
		} else if (images) {
			display_success('MainMessage', html);
		}
	};

	var completeCallback = function () {
		// close dialog
		$.modal.close();
	};

	var options = {
		cache: false,
		type: 'POST',
		url: 'remote.php?w=photowallimages',
		dataType: 'xml',
		data: data,
		success: successCallback,
		complete: completeCallback
	};

	$.ajax(options);

	$('#ModalContentContainer input').attr('disabled', true);
};

// when a new image is added the sortable element will be refreshed - disable this when adding images in bulk, then enable it again after
PhotowallImages.refreshSortableOnNewImage = true;

// refresh the jquery ui sortable photowall image list
PhotowallImages.refreshSortable = function () {
	if (!PhotowallImages.refreshSortableOnNewImage) {
		return;
	}

	$('#photowallImagesList').sortable('refresh');

};

// javascript data model used for managing photowall images
PhotowallImages.Image = function (id, preview, zoom, original, description, sort) {
	
	if (typeof id == 'object') {
		// initialise using first parameter object key/value pairs instead
		preview = id.preview;
		zoom = id.zoom;
		original = id.original;
		description = id.description;
		sort = id.sort;
		id = id.id;
	}

	var self = this;

	var _id, _preview, _zoom, _original, _description, _sort, _row;

	var _defaultAjaxSuccessHandler = function (xml) {
		// generic request handler -- looks for the presence of an <error> tag in the response with text content and triggers an error message with it
		var message = $(xml).find('error').text();
		if (message) {
			window.scrollTo(0, 0);
			display_error('MainMessage', $.htmlEncode(message));
			return false;
		}

		// display success message as long as the message is not just "1"
		message = $(xml).find('success').text();
		if (message && message != '1') {
			display_success('MainMessage', message);
		}

		return true;
	};

	// sends data to the server-side ajax handler for photowall images
	var _ajax = function (handler, data, success, error, complete) {

		complete = complete || function(){};

		success = success || _defaultAjaxSuccessHandler;

		error = error || function(data){console.log(data)};

		data.photowallimageshandler = handler;

		var options = {
			cache: false,
			type: 'POST',
			url: 'remote.php?w=photowallimages',
			dataType: 'xml',
			data: data,
			complete: complete,
			success: success,
			error: error
		};

		$.ajax(options);
	};

	self.setId = function (id) {
		id = parseInt(id, 10);

		_id = id;

		// update ids in the _row dom
		self.getRow().attr('id', 'photowallImagesListItem_' + id);

		$.data(self.getRow().find('.photowallImageCheck input')[0], 'photowallImageId', id);
	};

	self.getId = function () {
		return _id;
	};

	self.setPreview = function (preview, refresh) {
		if (typeof refresh == 'undefined') {
			var refresh = false;
		}

		if (refresh || _preview !== preview) {
			// update preview urls in the _row dom

			if (!preview) {
				// server has provided invalid preview url which indicates the source image on the server is missing
				$('.photowallImageThumbDisplay > a', self.getRow())
					.text('?')
					.attr('alt', lang.PhotowallImagesNoSourceImageNoThumbnail)
					.attr('title', lang.PhotowallImagesNoSourceImageNoThumbnail)
					.click(function(evt){
						evt.preventDefault();
						alert(lang.PhotowallImagesNoSourceImageNoThumbnail);
					});

			} else {
				var backgroundUrl = preview;
				if (refresh) {
					backgroundUrl += '?rand=' + Math.random()
				}

				$('.photowallImageThumbDisplay > a', self.getRow()).css({
					backgroundImage: 'url(' + backgroundUrl + ')'
				});
			}
			_preview = preview;
		}
	};

	self.setZoom = function (zoom) {
		_zoom = zoom;
	};

	self.getZoom = function () {
		return _zoom;
	};

	self.setOriginal = function (original) {
		_original = original
	};

	self.getOriginal = function () {
		return _original;
	};

	self.setDescription = function (description, update) {
		if (typeof update == 'undefined') {
			update = false;
		}

		// trim whitespace from supplied descriptions
		description = String(description).replace(/^\s+|\s+$/, '');

		if (update && _description !== description) {
			_ajax('updateImageDescription', { image: self.getId(), description: description });
		}

		_description = description;

		// update the description in the _row dom
		var textarea = $('.photowallImageDescription > textarea', self.getRow());

		if (!_description) {
			textarea.val(lang.ClickHereToAddADescription);
		} else {
			textarea.val(_description);
		}
	};

	self.getDescription = function () {
		return _description;
	};

	self.setSort = function (sort) {
		// note: this doesn't re-order the dom or change values for other images
		_sort = sort;
	};

	self.getSort = function () {
		return _sort;
	};

	// returns the jquery object for this image, representing it's row in the dom
	self.getRow = function () {
		return _row;
	};

	self.removeRow = function () {
		// remove this image's row from the dom
		self.getRow().remove();

		// remove this image from internal image list
		for (var i = PhotowallImages.images.length; i--;) {
			if (PhotowallImages.images[i] === self) {
				PhotowallImages.images.splice(i, 1);
			}
		}

		PhotowallImages.refreshDeleteSelectedButton();
	};

	self.fadeRow = function () {
		self.getRow().css({opacity: 0.2});
	};

	self.unfadeRow = function () {
		self.getRow().css({opacity: 1});
	};

	// delete this photowall image from the server - this method does NOT confirm with the user, other UI methods calling this should obtain confirmation first
	self.deleteImage = function (updateServer) {
		if (typeof updateServer == 'undefined') {
			updateServer = true;
		}

		if (updateServer) {
			// request image removal from server
			PhotowallImages.deleteImages([self.getId()]);
		} else {
			// deleteImages will call this function again with updateServer as false
			self.fadeRow();
		}
	};

	// generate html for inserting this image as a row in the image management
	self.getRowHtml = function () {
		var html = PhotowallImages.newRowTemplate;
		// replace placeholders if necessary
		return html;
	};
	
	self.onDeleteClick = function (evt) {
		evt.preventDefault();
		if (confirm(lang.ConfirmDeletePhotowallImage)) {
			self.deleteImage();
		}
	};

	self.onEditClick = function (evt) {
		evt.preventDefault();
		Common.Picnik.launchEditor('photowallimage', self.getId(), function(data){
			self.setPreview(data.thumbnail, true);
			self.setZoom(data.zoom);
			display_success('MainMessage', $.htmlEncode(lang.PhotowallImageEdited));
		});
	};

	self.showZoomImage = function () {
		// open a view of the zoom image
		if (!self.getZoom()) {
			// no zoom url supplied, abort
			return;
		}

		window.open(self.getZoom());
	};

	// moves the current image into the sort list after the supplied other image (provided by id) - will update all other affected image instances and also trigger an update on the server - if previousId is false, this image will be moved to the top of the list
	self.moveAfterOtherImage = function (previousId, updateUi) {
		if (typeof updateUi == 'undefined') {
			updateUi = false;
			// re-ordering the ui through jquery etc to simulate a drag+drop is not implemented yet - would need to update the dom manually
		}

		// first push an update to the server to perform the same action in the database, just incase the following js fails for some reason at least the server will update properly
		var data = {
			move: self.getId()
		};

		if (previousId) {
			data.after = previousId;
		}

		_ajax('moveImageAfterOtherImage', data);

		// server action has been dispatched, now simulate the change in the local ui
		if (!previousId) {
			// moving to top of list, setting afterSort to -1 forces the following checks to correspond to this
			var afterSort = -1;
		} else {
			var previousImage = PhotowallImages.getImageById(previousId);
			if (!previousImage) {
				alert('photowall.images.js: unable to get image by id ' + previousId);
			}
			var afterSort = previousImage.getSort();
		}

		var moveSort = self.getSort();
		var newSort = afterSort;

		var shiftValue, shiftHighpass, shiftLowpass;

		// shift all sort values between the old image location and new location, either up or down, depending on whether the image was moved up or down in the sort
		if (moveSort > afterSort) {
			newSort++;
			shiftValue = 1;
			shiftHighpass = moveSort;
			shiftLowpass = afterSort;
		} else {
			shiftValue = -1;
			shiftHighpass = afterSort + 1;
			shiftLowpass = moveSort;
		}

		var images = PhotowallImages.getImagesInOrder();
		var image;
		for (var i = images.length; i--;) {
			image = images[i];
			if (image.getSort() > shiftLowpass && image.getSort() < shiftHighpass) {
				image.setSort(image.getSort() + shiftValue);
			}
		}

		self.setSort(newSort);
	};

	self.onPreviewClick = function (evt) {
		evt.preventDefault();
		self.showZoomImage();
	};

	// add this instance to the images array
	PhotowallImages.images.push(self);

	// generate the html and create a jquery object for it
	_row = $(self.getRowHtml());

	// apply provided default values
	self.setId(id);
	self.setPreview(preview);
	self.setZoom(zoom);
	self.setOriginal(original);
	self.setDescription(description);
	self.setSort(sort);

	// attach events to the input elements
	$('.photowallImageDelete', self.getRow()).click(self.onDeleteClick);
	$('.photowallImageThumbDisplay a', self.getRow()).click(self.onPreviewClick);
	$('.photowallImageEdit', self.getRow()).click(self.onEditClick);

	// finally, add it to the list
	$('#photowallImagesList').append(self.getRow());

	// setup editable descriptions

	var _blurTimeout;

	var _descriptionCancelClick = function () {
		window.clearTimeout(_blurTimeout);
		$('.photowallImageDescription > textarea', self.getRow()).removeClass('editing');
		self.setDescription(self.getDescription());
		$('.photowallImageDescription > div', self.getRow()).hide();
	};

	var _descriptionSaveClick = function () {
		window.clearTimeout(_blurTimeout);
		var textarea = $('.photowallImageDescription > textarea', self.getRow());
		textarea.removeClass('editing');
		var description = textarea.val();
		if (description === '') {
			textarea.val(lang.ClickHereToAddADescription);
		}
		self.setDescription(description, true);
		$('.photowallImageDescription > div', self.getRow()).hide();
	};

	var _descriptionFocus = function () {
		window.clearTimeout(_blurTimeout);
		var textarea = $(this);
		textarea.addClass('editing');
		var description = textarea.val();
		if (description === lang.ClickHereToAddADescription) {
			textarea.val('');
		}
		// delayed select as chrome doesn't like instant select
		window.setTimeout(function(){
			textarea[0].select();
		}, 1);
		$('.photowallImageDescription > div', self.getRow()).show();
	};

	var _descriptionBlur = function () {
		_blurTimeout = window.setTimeout(_descriptionSaveClick, 1000);
	};

	$('.photowallImageDescription > textarea', self.getRow()).focus(_descriptionFocus).blur(_descriptionBlur);

	$('.photowallImageDescription .photowallImageDescriptionSave', self.getRow()).click(_descriptionSaveClick);

	$('.photowallImageDescription .photowallImageDescriptionCancel', self.getRow()).click(_descriptionCancelClick);

	// refresh the sortable
	PhotowallImages.refreshSortable();

	PhotowallImages.refreshDeleteSelectedButton();
};

PhotowallImages.uploader = {

	onStart: function () {
		// upload sequence starting
		PhotowallImages.uploader.totalCount = 0;
		PhotowallImages.uploader.successCount = 0;
		PhotowallImages.uploader.errorFiles = [];
		PhotowallImages.uploader.generalErrors = [];
	},

	onSuccess: function (data) {
		// file successfully sent to server, parse response for errors & warnings

		if (data.error !== false) {
			// general error that probably means file-specific information isn't available
			PhotowallImages.uploader.generalErrors.push(data.error);
		} else {
			PhotowallImages.uploader.totalCount++;
		}

		if (data.files && data.files.length) {
			var file;
			for (var i = 0; i < data.files.length; i++) {
				file = data.files[i];

				if (file.error === false) {
					new PhotowallImages.Image(file); // will automatically update ui
					PhotowallImages.uploader.successCount++;
				} else {
					PhotowallImages.uploader.errorFiles.push(file);
				}
			}
		}
	},

	onFinished: function () {
		// upload sequence finished
		var error = false;
		var html = '';

		if (PhotowallImages.uploader.generalErrors.length) {
			error = true;
			for (var i = 0; i < PhotowallImages.uploader.generalErrors.length; i++) {
				html += '<div>' + $.htmlEncode(PhotowallImages.uploader.generalErrors[i]) + '</div>';
			}

		} else if (PhotowallImages.uploader.errorFiles.length) {
			error = true;

			html += '<div>' + lang.PhotowallImagesNotUploadedDueToErrors;

			if (PhotowallImages.uploader.errorFiles.length < PhotowallImages.uploader.totalCount) {
				html += lang.PhotowallImagesAnyImageNotListedHere;
			}

			html += ':</div><ul>';

			for (var i = 0; i < PhotowallImages.uploader.errorFiles.length; i++) {
				var file = PhotowallImages.uploader.errorFiles[i];

				html += '<li>';

				html += $.htmlEncode(file.name) + ': ' + $.htmlEncode(file.error);

				html += '</li>';
			}

			html += '</ul>';

		} else if (PhotowallImages.uploader.successCount == 0) {
			error = true;
			html += lang.PhotowallImageNoFilesUploaded;

		} else {
			if (PhotowallImages.uploader.successCount == 1) {
				html += lang.PhotowallImageAddedSuccessfully;
			} else {
				html += lang.PhotowallImagesAddedSuccessfully.replace(/\%1\$d/g, PhotowallImages.uploader.successCount);
			}
		}

		if (error) {
			window.scrollTo(0, 0);
			display_error('MainMessage', html);
		} else {
			display_success('MainMessage', html);
		}
	}
};

//
// on dom-ready setup stuff for photowall image management

$(function(){
	if (!$('#photowallImagesList').length) {
		// don't bother running this code if the photowall images list isn't present
		return;
	}

	//
	// setup the master checkbox

	$('.photowallImagesTable td.photowallImageCheck input').click(function(){
		$('#photowallImagesList .photowallImageCheck input').attr('checked', this.checked);
	});

	//
	// setup the 'delete selected' button

	$('#photowallImagesDeleteSelected').click(function(evt){
		evt.preventDefault();

		var deleteImages = [];

		$('#photowallImagesList .photowallImageCheck input:checked').each(function(){
			if ($.data(this, 'photowallImageId')) {
				deleteImages.push($.data(this, 'photowallImageId'));
			}
		});

		if (!deleteImages.length) {
			// none were checked
			alert(lang.ChoosePhotowallImage);
			return;
		}

		if (!confirm(lang.ConfirmDeletePhotowallImage)) {
			return;
		}

		// uncheck the master checkbox
		$('.photowallImagesTable td.photowallImageCheck input').attr('checked', false);

		PhotowallImages.deleteImages(deleteImages);
	});

	//
	// setup the 'new image' uploader row

	$('.PhotowallImageNewUpload').click(function(evt) {
		// handle clicks on the 'Upload an Image' menu item when swfupload support is not available
		evt.preventDefault();

		var url = 'https://www.modifywatches.com/admin/remote.php?w=photowallimages&photowallimageshandler=newImageUpload';
		var data = {};
		
		var dialog = new MultiUploadDialog({
			action: url,
			data: data,
			titletext: lang.UploadAnImage,
			introtext: lang.PhotowallImagesNonFlashIntro,
			submittext: lang.PhotowallImagesUploadImagesElipsis,
			closetext: lang.CancelEdit,
			cleartext: lang.PhotowallImagesNonFlashRemove,
			noinputsalerttext: lang.PhotowallImagesChooseAnImage
		});

		PhotowallImages.uploader.onStart();

		$(dialog).bind('uploadsuccess', function(evt, data){
			PhotowallImages.uploader.onSuccess(data);
		});

		$(dialog).bind('uploadsfinished', function(evt){
			PhotowallImages.uploader.onFinished();
		});
	});

	$('#photowallImageNewWeb').click(function(evt) {
		// handle clicks on the 'Use Image from Web' menu item
		evt.preventDefault();

		$.iModal({
			type: 'inline',
			inline: '#UseImageFromWebDialog',
			width: 390
		});

		$('#ModalContentContainer .UseImageFromWebDialogImageUrl').focus(function(evt){
			var self = this;
			setTimeout(function(){
				// chrome doesn't like an immediate select() -- other browsers are also fine with this method
				if (self.value === self.defaultValue) {
					self.select();
				}
			}, 1);

		}).eq(0).focus();
	});

	$('#photowallImageNewGallery').click(function(evt) {
		// handle clicks on the 'Choose from Gallery' menu item
		$.iModal({
			type: 'inline',
			inline: '#UseImageFromGallery',
			onShow: PhotowallImages.useImageFromGallery.onShowModal,
			onClose: PhotowallImages.useImageFromGallery.onCloseModal,
			width: 780
		});

	});

	//
	// setup new image: upload

	if (DetectFlashVer(8, 0, 0)) {

		// show any notices about alternative upload methods
		$('.SwfUploadAlternativeNotice').show();

		var post_params = {
			PHPSESSID: shop.config.sessionid
		};

		// flash uploader
		PhotowallImages.swfUploader = new SWFUpload({
			// Backend Settings
			upload_url: shop.config.AppPath + "/admin/remote.php?w=photowallimages&photowallimageshandler=newImageUpload",	// Relative to the SWF file or absolute
			// File Upload Settings
			file_size_limit : shop.config.maxUploadSize + "B",
			file_types: PhotowallImages.swfUploadFileTypes,
			file_types_description : " " + lang.Images,
			file_upload_limit : "0",

			post_params: post_params,
			// Event Handler Settings
			file_queue_error_handler : fileQueueError,
			file_dialog_complete_handler : fileDialogComplete,

			upload_progress_handler : function (file, bytesLoaded) {
				var percent = Math.ceil((bytesLoaded / file.size) * 100);

				$('.progressBarPercentage').css('width', parseInt(percent) + "%");
				$('.progressPercent').html(percent+ "%");

				if (bytesLoaded === file.size) {
					//	change the message at 100% to tell the user the server is doing something
					$('.ProgressBarText').text(lang.PhotowallImagesProcessing);
				}
			},

			upload_error_handler : function (file, errorCode, message) {
				// transport error of some sort (self-signed ssl cert, for example);
				UploadError = lang.PhotowallImagesTransportError;
				return;
			},

			upload_success_handler : function (file, serverData) {
				// called when the upload http request was successful, even if some files may have failed

				var result;

				try {
					eval('result = ' + serverData + ';');
				} catch (e) {
					// when the server response can't be eval'd it usually means there's a PHP ERROR, WARNING or NOTICE in the response body along with the usual response -- at this point the javascript has no idea what the response really is
					UploadError = lang.PhotowallImagesUploadError;
					return;
				}

				if (result.error) {
					// general error such as exceeding maximum POST size
					UploadError = result.error;
					return;
				}

				var i, file;

				for (i = 0; i < result.files.length; i++) {
					file = result.files[i];

					if (file.error) {
						// specific file error such as not an acceptable image, file too big
						UploadErrorFiles.push(file);
						continue;
					}

					// file is ok -- instanciate it for the ui (the json data returned from the server is compatible with the Image class constructor)
					new PhotowallImages.Image(file);
				}
			},

			upload_start_handler : function (file) {
				$('.progressBarPercentage').css('width', "0%");
				$('.progressPercent').html("0%");
				$('.progressBarStatus').text(lang.PhotowallImagesUploadProgressStatus.replace(/\%1\$d/g, FileCount).replace(/\%2\$d/g, TotalItemsToUpload));
				$('.ProgressBarText').text(lang.PhotowallImagesUploadProgressFile.replace(/\%1\$s/g, file.name));
			},

			upload_complete_handler : function (file) {
				// this is mostly a copy of the funcionality found in swfupload.handlers uploadComplete function, except the photowall image upload handler returns more detailed error information on a per-image basis

				if (this.getStats().files_queued > 0) {
					// start the next upload
					FileCount++;
					this.startUpload();
					return;
				}

				// no more uploads, close the dialog
				$.iModal.close();

				var error = false;
				var html = '';

				if (UploadError) {
					error = true;
					html += '<div>' + $.htmlEncode(UploadError) + '</div>';

				} else if (UploadErrorFiles.length) {
					error = true;

					html += '<div>' + lang.PhotowallImagesNotUploadedDueToErrors;

					if (UploadErrorFiles.length !== TotalItemsToUpload) {
						html += lang.PhotowallImagesAnyImageNotListedHere;
					}

					html += ':</div><ul>';

					for (var i = 0; i < UploadErrorFiles.length; i++) {
						var file = UploadErrorFiles[i];

						html += '<li>';

						html += $.htmlEncode(file.name) + ': ' + $.htmlEncode(file.error);

						html += '</li>';
					}

					html += '</ul>';

				} else {
					// there's no duplicate checks for photowall image management, skip it

					if (FileCount == 1) {
						html += lang.PhotowallImageAddedSuccessfully;
					} else {
						html += lang.PhotowallImagesAddedSuccessfully.replace(/\%1\$d/g, FileCount);
					}
				}

				if (error) {
					window.scrollTo(0, 0);
					display_error('MainMessage', html);
				} else {
					display_success('MainMessage', html);
				}
			},

			// Button Settings
			button_placeholder_id : "photowallImageNewUploadPlaceholder",

			// adapt to width and height of upload link since it's text based
			button_width: $('#photowallImageNewUpload').width(),
			button_height: $('#photowallImageNewUpload').parent().height(),

			button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
			button_cursor: SWFUpload.CURSOR.HAND,

			// Flash Settings
			flash_url : "images/swfupload.swf",

			// Debug Settings
			debug: false
		});

	} else {
		// flash upload capability was not detected, hide any notices about alternative upload methods
		$('.SwfUploadAlternativeNotice').hide();
	}

	//
	// setup the sortable image list

	$('#photowallImagesList').sortable({
		axis: 'y',
		distance: 15,
		start: function (evt, ui) {
			// on drag start, adjust the width of the helper to be the same width as the rest of the rows - necessary on at least firefox
			ui.helper.width($('#photowallImagesListItemNew').width());
		}
	});

	$('#photowallImagesList').bind('sortupdate', function(evt, ui){
		// handles when the photowall image list is reordered

		var rxp = /^photowallImagesListItem_([0-9]+)$/;

		if (!rxp.test(ui.item.attr('id'))) {
			return;
		}

		var itemId = parseInt(RegExp.$1, 10);
		if (!itemId) {
			return;
		}

		var image = PhotowallImages.getImageById(itemId);
		if (!image) {
			return;
		}

		var prevId = false;

		var prev = ui.item.prev('.photowallImagesListItem');
		if (prev.length) {
			if (!rxp.test(prev.attr('id'))) {
				return;
			}
			prevId = parseInt(RegExp.$1, 10);
		}

		// push an update to the server instructing it to reorder the image that was just moved
		image.moveAfterOtherImage(prevId, false);
	});

	$('#photowallImagesList').bind('sortstop', function (evt, ui){
		// handles when sorting of the photowall image list stops, whether it's changed or not

		var rxp = /^photowallImagesListItem_([0-9]+)$/;

		if (!rxp.test(ui.item.attr('id'))) {
			return;
		}

		var itemId = parseInt(RegExp.$1, 10);
		if (!itemId) {
			return;
		}

		var image = PhotowallImages.getImageById(itemId);
		if (!image) {
			return;
		}
	});
});



$(window).unload(function(){
	try {
		PhotowallImages.swfUploader.destroy();
	} catch (e) {
		// mute any errors since the user is navigating away anyway
	}
});
