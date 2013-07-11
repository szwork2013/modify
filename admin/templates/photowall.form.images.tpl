<style type="text/css">
.swfupload {
	position: absolute;
	z-index: 1;
	outline: none;
}
</style>

<div style="display:none;" id="MultiUploadDialogTemplate">
	<div class="ModalTitle">%titletext%</div>
	<div class="ModalContent">
		<div class="MultiUploadDialogContent">
			<div class="UploadDialog">
				<p>%introtext%</p>
				<div class="GrowingUploader">
					<input type="file" name="Filedata" width="300" class="Button MultiUploadDialogInput" /> <a href="#">%cleartext%</a>
				</div>
			</div>
			<div class="ProgressIndicator" style="display:none;">
				<p class="ProgressMessage"></p>
				<div class="ProgressBar">
					<div class="ProgressBarColour">&nbsp;</div>
					<div class="ProgressBarText"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="ModalButtonRow">
		<div class="MultiUploadDialogButtons">
			<div class="FloatLeft">
				<input type="button" class="CloseButton FormButton" value="%closetext%" />
			</div>
			<input type="button" class="Submit FormButton" value="%submittext%" />
		</div>
	</div>
</div><!-- end #MultiUploadDialogTemplate -->

<div style="display:none;" id="UseImageFromGallery">
	<div class="ModalTitle">{% lang 'UseImageFromGalleryTitle' %}</div>
	<div class="ModalContent">
		<div class="useImageFromGalleryHeaderRow">
			
			<input type="button" id="ChangeImageSourceButton" class="Button FloatRight" value="{% lang 'Go' %}" />
			<select id="PhotowallImageSource">
				<option value="photowalls">{% lang 'PhotowallImageSourcePhotowalls' %}</option>
				<option value="imagemanager">{% lang 'PhotowallImageSourceImageManager' %}</option>
			</select>
			<input type="text" value="{% lang 'Search' %}" title="{% lang 'PhotowallImagesSearchForImages' %}" id="PhotowallImagesSearch" class="exampleSearchText" />
			<span id="ClearImageSearch" class="FloatRight"><a href="#" id="ClearImageSearchLink">{% lang 'ClearImageSearch' %}</a></span>
			{% lang 'PhotowallImageUseImageFromGalleryIntro' %}
		</div>
		<div id="UseImageFromGalleryImageLoading" class="ImageLoading" style="display: none;">
			<img src="images/loading.gif" alt="" style="vertical-align: middle;" class="LoadingIndicator" /> {% lang 'PhotowallImageSourceLoading' %}
		</div>
		<div id="UseImageFromGalleryImagesList">

		</div>
		<div id="ImageGalleryPaging">

		</div>
	</div>
	<div class="ModalButtonRow">
		<div class="FloatLeft">
			<input type="button" class="CloseButton FormButton" value="{% lang 'Close' %}" onclick="$.modal.close();return false;" />
		</div>
		<input type="button" class="Submit" value="{% lang 'UseSelectedImages' %}" id="UseSelectedImages" />
	</div>
</div><!-- end #UseImageFromGallery -->

<div style="display:none;" id="UseImageFromGallery">
	<div class="ModalTitle">{% lang 'UseImageFromGalleryTitle' %}</div>
	<div class="ModalContent">
		<div class="useImageFromGalleryHeaderRow">
			
			<input type="button" id="ChangeImageSourceButton" class="Button FloatRight" value="{% lang 'Go' %}" />
			<select id="PhotowallImageSource">
				<option value="photowalls">{% lang 'PhotowallImageSourcePhotowalls' %}</option>
				<option value="imagemanager">{% lang 'PhotowallImageSourceImageManager' %}</option>
			</select>
			<span class="ImageGalleryBrowserOr">{% lang 'Or' %}</span>
			<input type="text" value="{% lang 'Search' %}" title="{% lang 'PhotowallImagesSearchForImages' %}" id="PhotowallImagesSearch" class="exampleSearchText" />
			<span id="ClearImageSearch" class="FloatRight"><a href="#" id="ClearImageSearchLink">{% lang 'ClearImageSearch' %}</a></span>
		</div>
		<div id="UseImageFromGalleryImageLoading" class="ImageLoading" style="display: none;">
			<img src="images/loading.gif" alt="" style="vertical-align: middle;" class="LoadingIndicator" /> {% lang 'PhotowallImageSourceLoading' %}
		</div>
		<div id="UseImageFromGalleryImagesList">

		</div>
		<div id="ImageGalleryPaging">

		</div>
	</div>
	<div class="ModalButtonRow">
		<div class="FloatLeft">
			<input type="button" class="CloseButton FormButton" value="{% lang 'Close' %}" onclick="$.modal.close();return false;" />
		</div>
		<input type="button" class="Submit" value="{% lang 'UseSelectedImages' %}" id="UseSelectedImages" disabled="disabled" />
	</div>
</div><!-- end #UseImageFromGallery -->

<div style="display: none" id="ProgressWindow">
	<div id="ProgressBarDiv" style="text-align: center;">
		<br/>
		<span id="ProgressBarText" class="ProgressBarText">{% lang 'imageManagerUploadInProgress' %}</span><br/>
		<br/>
		<br/>
		<div style="border: 1px solid #ccc; width: 300px; padding: 0px; margin: 0 auto; position: relative;">
			<div class="progressBarPercentage" style="margin: 0; padding: 0; background: url('images/progressbar.gif') no-repeat; height: 20px; width: 0%;">
				&nbsp;
			</div>
			<div style="position: absolute; top: 0px; left: 0; text-align: center; width: 300px; font-weight: bold;line-height:1.5;color:#333333;font-family:Tahoma;font-size:11px;" class="progressPercent">&nbsp;</div>
		</div>
		<span id="progressBarStatus" class="progressBarStatus" style="text-align: center; font-size: 10px; color: gray; padding-top: 5px;">&nbsp;</span>
		<br/>
		<br/>
		<br/>
	</div>
</div><!-- End #ProgressWindow -->

<script type="text/javascript" src="script/detect.flash.js?{{ JSCacheToken }}"></script>
<script type="text/javascript" src="script/swfupload.js?{{ JSCacheToken }}"></script>
<script type="text/javascript" src="script/swfupload.handlers.js?{{ JSCacheToken }}"></script>
<script type="text/javascript" src="script/photowall.images.js?{{ JSCacheToken }}"></script>
<script type="text/javascript">//<![CDATA[

PhotowallImages.newRowTemplate = {{ photowallImage_newRowTemplate_js|safe }};
PhotowallImages.swfUploadFileTypes = {{ photowallImage_swfUploadFileTypes_js|safe }};

$(function(){

	// disable sortable refreshing for bulk adding of existing images
	PhotowallImages.refreshSortableOnNewImage = false;

	// initialise existing images
	{{ photowallImage_javascriptInitialiseCode|safe }}

	// after bulk-adding existing images, enable sortable refreshing again and manually trigger a refresh
	PhotowallImages.refreshSortableOnNewImage = true;
	PhotowallImages.refreshSortable();
});

//]]></script>

<!-- to be populated by javascript -->
<div id="photowallImagesList"></div>
