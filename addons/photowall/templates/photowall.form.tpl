<style type="text/css">
	@import url("Styles/photowall.css");
</style>
<form enctype="multipart/form-data" action="index.php?ToDo={{ FormAction|safe }}" id="frmPhotowall" method="post">
<input id="currentTab" name="currentTab" value="0" type="hidden">
<div class="BodyContainer">
	<table cellSpacing="0" cellPadding="0" width="100%" style="margin-left: 4px; margin-top: 8px;">
	<tr>
		<td class="Heading1">{{ Title|safe }}</td>
	</tr>
	<tr>
		<td class="Intro">
			<p>{{ Intro|safe }}</p>
			<div id="MainMessage">
				{{ Message|safe }}
			</div>
			<p>
				<input type="submit" disabled="disabled" value="{% lang 'SaveAndExit' %}" class="FormButton" />
				<input type="submit" disabled="disabled" value="{{ SaveAndAddAnother|safe }}" onclick="SaveAndAddAnother()" class="FormButton" style="width:130px" />
				<input type="reset" value="{% lang 'Cancel' %}" class="FormButton" onclick="ConfirmCancel()" />
			</p>
		</td>
	</tr>
	<tr>
    	<td>
        <a href="#" onclick="ShowPhotowallTag(53); return false;" id="photowallTag2">Open Tagging System</a>
			<!-- Start images & videos -->
			<div id="div8" style="padding-top: 10px;">
				<table class="Panel">
				<tr>
					<td class="Heading2" colspan="2">{% lang 'PhotowallImages' %}</td>
				</tr>
				<tr>
					<td colspan="2">

						<div style="margin:11px 0 6px 6px;">
							<button class="Button" id="photowallImagesDeleteSelected" disabled="disabled">{% lang 'DeleteSelected' %}</button>
						</div>

						<table class="GridPanel photowallImagesTable" cellspacing="0">
							<tbody>
								<tr class="Heading3">
									<td class="photowallImageCheck" style="padding-left:5px;"><input type="checkbox" /></td>
									<td class="photowallImageThumbDisplay" style="width:{{ photowallImage_thumbnailWidth|safe }}px;">{% lang 'Image' %}</td>
									<td class="photowallImageDescription">{% lang 'Description' %}</td>
									<td class="photowallImageAction">{% lang 'Action' %}</td>
                                    <td class="photowallImageVisible">{% lang 'Visible' %}</td>
								</tr>
							<tbody>
						</table>

						<div class="photowallImagesListItem" id="photowallImagesListItemNew">
							<table cellspacing="0">
								<tbody>
									<tr class="GridRowNoOver">
										<td class="photowallImageCheck"><input type="checkbox" /></td>
										<td class="photowallImageThumbDisplay" style="width:{{ photowallImage_thumbnailWidth|safe }}px;">
											<div class="photowallImageNewPlaceholder" style="width:{{ photowallImage_thumbnailWidth|safe }}px; height:{{ photowallImage_thumbnailHeight|safe }}px;"><div style="line-height:{{ photowallImage_thumbnailHeight|safe }}px;"><span>{% lang 'NewImage' %}</span></div></div>
										</td>
										<td class="photowallImageDescription">
											<p>{% lang 'PhotowallImagesSelectUploadMethod' %}</p>
											<ul>
												<li><span id="photowallImageNewUploadPlaceholder"></span><a id="photowallImageNewUpload" class="PhotowallImageNewUpload" href="#">{% lang 'UploadAnImage' %}</a> <span class="SwfUploadAlternativeNotice" style="display:none;">{% lang 'PhotowallImagesBasicUploader' %}</span></li>
												<li><a id="photowallImageNewWeb" href="#">{% lang 'UseImageFromWeb' %}</a></li>
												<li><a id="photowallImageNewGallery" href="#">{% lang 'ChooseFromGallery' %}</a></li>
											</ul>
										</td>
										<td class="photowallImageAction">&nbsp;</td>
                                        <td class="photowallImageVisible">&nbsp;</td>
									</tr>
								</tbody>
							</table>
						</div>

						{{ photowallImagesList|safe }}

					</td>
				</tr>
				</table>
			</div><!-- End images & videos -->

			<table border="0" cellspacing="0" cellpadding="2" width="100%" class="PanelPlain" id="SaveButtons">
				<tr>
					<td>
						<input type="submit" disabled="disabled" value="{% lang 'SaveAndExit' %}" class="FormButton" />
						<input type="submit" disabled="disabled" value="{{ SaveAndAddAnother|safe }}" onclick="SaveAndAddAnother();" class="FormButton" style="width:130px" />
						<input type="reset" value="{% lang 'Cancel' %}" class="FormButton" onclick="ConfirmCancel()" />
					</td>
				</tr>
			</table>
		</td>
	</tr>
	</table>
</div>
</form>

<script type="text/javascript" src="../javascript/jquery.growinguploader.js?{{ JSCacheToken }}"></script>
<script type="text/javascript" src="../javascript/jquery/plugins/ajax.file.upload.js?{{ JSCacheToken }}"></script>
<script type="text/javascript" src="script/multiuploaddialog.js?{{ JSCacheToken }}"></script>
<script type="text/javascript">//<![CDATA[
var shop = { config: { } };

shop.config.AppPath = '{{ AppPath|safe }}';
shop.config.sessionid = '{{ sessionid|safe }}';
shop.config.maxUploadSize = '{{ maxUploadSize|safe }}';

lang.EnterFixedShipping = '{% jslang 'EnterFixedShipping' %}';
lang.PhotowallHasNoDownloads = '{% jslang 'PhotowallHasNoDownloads' %}';
lang.EnterCurrentInventory = '{% jslang 'EnterCurrentInventory' %}';
lang.EnterLowInventory = '{% jslang 'EnterLowInventory' %}';
lang.ChoosePhotowallVariation = '{% jslang 'ChoosePhotowallVariation' %}';
lang.VariationChooseVariation = '{% jslang 'VariationChooseVariation' %}';
lang.VariationEnterValidPrice = '{% jslang 'VariationEnterValidPrice' %}';
lang.VariationEnterValidWeight = '{% jslang 'VariationEnterValidWeight' %}';
lang.VariationEnterValidImage = '{% jslang 'VariationEnterValidImage' %}';
lang.VariationEnterValidStockLevel = '{% jslang 'VariationEnterValidStockLevel' %}';
lang.VariationEnterValidLowStockLevel = '{% jslang 'VariationEnterValidLowStockLevel' %}';
lang.EnterCustomFieldName = '{% jslang 'EnterCustomFieldName' %}';
lang.SelectOneMoreWrapOptions = '{% jslang 'SelectOneMoreWrapOptions' %}';
lang.EnterSortOrder = '{% jslang 'EnterSortOrder' %}';
lang.EnterEventDateName = '{% jslang 'EnterEventDateName' %}';
lang.EnterEventDateRange = '{% jslang 'EnterEventDateRange' %}';
lang.AddPhotowallWithEmptyDimensions = '{% jslang 'AddPhotowallWithEmptyDimensions' %}';
lang.ConfirmCancelPhotowall = '{% lang 'ConfirmCancelPhotowall' %}';
lang.ChooseOptionValue = '{% jslang 'ChooseOptionValue' %}';
lang.MorePricingOptions = '{% jslang 'MorePricingOptions' %}';
lang.LessPricingOptions = '{% jslang 'LessPricingOptions' %}';
lang.ConfirmChangeDownloadEdit = '{% jslang 'ConfirmChangeDownloadEdit' %}';
lang.InvalidExpiresAfter = '{% jslang 'InvalidExpiresAfter' %}';
lang.InvalidMaxDownloads = '{% jslang 'InvalidMaxDownloads' %}';
lang.SavingDownload = '{% jslang 'SavingDownload' %}';
lang.UploadFailed2 = '{% jslang 'UploadFailed2' %}';
lang.SelectDownloadFile = '{% jslang 'SelectDownloadFile' %}';
lang.UploadingDownload = '{% jslang 'UploadingDownload' %}';
lang.ConfirmDeleteDownload = '{% jslang 'ConfirmDeleteDownload' %}';
lang.DigitalDownloadDeleted = '{% jslang 'DigitalDownloadDeleted' %}';
lang.NoParent = '{% jslang 'NoParent' %}';
lang.NoCategoryName = '{% jslang 'NoCategoryName' %}';
lang.PhotowallWillUseVariation = '{% jslang 'PhotowallWillUseVariation' %}';
lang.PhotowallWillUseVariationSemi = '{% jslang 'PhotowallWillUseVariationSemi' %}';
lang.ConfirmRemoveProdField = '{% jslang 'ConfirmRemoveProdField' %}';
lang.DiscountRulesForEachItem = '{% jslang 'DiscountRulesForEachItem' %}';
lang.DiscountRulesOffEachItem = '{% jslang 'DiscountRulesOffEachItem' %}';
lang.DiscountRulesField = '{% jslang 'DiscountRulesField' %}';
lang.Number0 = '{% jslang 'Number0' %}';
lang.Number1 = '{% jslang 'Number1' %}';
lang.Number2 = '{% jslang 'Number2' %}';
lang.Number3 = '{% jslang 'Number3' %}';
lang.Number4 = '{% jslang 'Number4' %}';
lang.Number5 = '{% jslang 'Number5' %}';
lang.Number6 = '{% jslang 'Number6' %}';
lang.Number7 = '{% jslang 'Number7' %}';
lang.Number8 = '{% jslang 'Number8' %}';
lang.Number9 = '{% jslang 'Number9' %}';
lang.VideoLoading = '{% jslang 'VideoLoading' %}';
lang.VideoPleaseEnterSearchTerm = '{% jslang 'VideoPleaseEnterSearchTerm' %}';
lang.ClickHereToAddADescription = '{% jslang 'ClickHereToAddADescription' %}';
lang.ConfirmDeletePhotowallImage = '{% jslang 'ConfirmDeletePhotowallImage' %}';
lang.ChoosePhotowallImage = '{% jslang 'ChoosePhotowallImage' %}';
lang.PhotowallImagesDeleted = '{% jslang 'PhotowallImagesDeleted' %}';
lang.PhotowallImagesDeletedErrors = '{% jslang 'PhotowallImagesDeletedErrors' %}';
lang.PhotowallImagesDeletedWarnings = '{% jslang 'PhotowallImagesDeletedWarnings' %}';
lang.PhotowallImage = '{% jslang 'PhotowallImage' %}';
lang.PhotowallImageAddedSuccessfully = '{% jslang 'PhotowallImageAddedSuccessfully' %}';
lang.PhotowallImagesAddedSuccessfully = '{% jslang 'PhotowallImagesAddedSuccessfully' %}';
lang.PhotowallImageUrlsFailed = '{% jslang 'PhotowallImageUrlsFailed' %}';
lang.Images = '{% jslang 'Images' %}';
lang.PhotowallImagesProcessing = '{% jslang 'PhotowallImagesProcessing' %}';
lang.PhotowallImagesUploadError = '{% jslang 'PhotowallImagesUploadError' %}';
lang.PhotowallImagesTransportError = '{% jslang 'PhotowallImagesTransportError' %}';
lang.PhotowallImagesUploadProgressStatus = '{% jslang 'PhotowallImagesUploadProgressStatus' %}';
lang.PhotowallImagesUploadProgressFile = '{% jslang 'PhotowallImagesUploadProgressFile' %}';
lang.PhotowallImagesSortOrderChanged = '{% jslang 'PhotowallImagesSortOrderChanged' %}';
lang.ImageFromGalleryViewLarger = '{% jslang 'ImageFromGalleryViewLarger' %}';
lang.PhotowallImagesNoSourceImageNoThumbnail = '{% jslang 'PhotowallImagesNoSourceImageNoThumbnail' %}';
lang.PhotowallImagesNotUploadedDueToErrors = '{% jslang 'PhotowallImagesNotUploadedDueToErrors' %}';
lang.PhotowallImagesAnyImageNotListedHere = '{% jslang 'PhotowallImagesAnyImageNotListedHere' %}';
lang.UploadAnImage = '{% jslang 'UploadAnImage' %}';
lang.PhotowallImagesNonFlashIntro = '{% jslang 'PhotowallImagesNonFlashIntro' %}';
lang.PhotowallImagesUploadImagesElipsis = '{% jslang 'PhotowallImagesUploadImagesElipsis' %}';
lang.CancelEdit = '{% jslang 'CancelEdit' %}';
lang.PhotowallImagesNonFlashRemove = '{% jslang 'PhotowallImagesNonFlashRemove' %}';
lang.ShowErrorMessage = '{% jslang 'ShowErrorMessage' %}';
lang.PhotowallImagesChooseAnImage = '{% jslang 'PhotowallImagesChooseAnImage' %}';
lang.PleaseChooseAReleaseDate = '{% jslang 'PleaseChooseAReleaseDate' %}';
lang.PleaseChooseAReleaseDateInTheFuture = '{% jslang 'PleaseChooseAReleaseDateInTheFuture' %}';
lang.PhotowallImageEdited = '{% jslang 'PhotowallImageEdited' %}';
lang.PhotowallMinimumError = '{% jslang 'PhotowallMinimumError' %}';
lang.PhotowallMaximumError = '{% jslang 'PhotowallMaximumError' %}';
lang.PhotowallMinimumMaximumError = '{% jslang 'PhotowallMinimumMaximumError' %}';
//]]></script>
<script type="text/javascript" src="/javascript/tinymce/tiny_mce_gzip.js?1"></script>
<script type="text/javascript" src="script/photowall.js?{{ JSCacheToken }}"></script>
<script type="text/javascript">//<![CDATA[
$(document).ready(function() {

	$('#frmPhotowall').bind('submit', function () {
		return ValidateForm(CheckAddPhotowallForm);
	});

	{{ OptionButtons|safe }}

	{{ MoreImages|safe }}

	$('input[type=submit]').attr('disabled', '');
});

function ShowPhotowallTag(id) {
	var l = (screen.availWidth/2) - (550/2);
	var t = 0;
	if(jQuery.browser.msie) {
		var width = 550;
	}
	else {
		var width = 550;
	}

	windowLocation = 'index.php?ToDo=runAddon&addon=addon_photowall&w=popupPhotowallTag&PrintFooter=false&PrintHeader=false';
	windowLocation += '&ImageID='+id;
	var w = window.open(windowLocation, 'photowallTag', "width="+width+",height="+(screen.availHeight-100)+",left="+l+",top="+t);
	w.focus();
	return false;
}
//]]></script>

<div style="display:none;" id="UseImageFromWebDialog">
	<input type="hidden" name="quoteSession" value="{{ quoteSession }}" id="quoteSession">
	<div class="ModalTitle">{% lang 'UseImageFromWebDialogTitle' %}</div>
	<div class="ModalContent">
		<input type="text" class="Field100pct UseImageFromWebDialogImageUrl" name="imageurl[]" value="http://" /><br />
		<input type="text" class="Field100pct UseImageFromWebDialogImageUrl" name="imageurl[]" value="http://" /><br />
		<input type="text" class="Field100pct UseImageFromWebDialogImageUrl" name="imageurl[]" value="http://" /><br />
		<input type="text" class="Field100pct UseImageFromWebDialogImageUrl" name="imageurl[]" value="http://" /><br />
		<input type="text" class="Field100pct UseImageFromWebDialogImageUrl" name="imageurl[]" value="http://" /><br />
	</div>
	<div class="ModalButtonRow">
		<div class="FloatLeft">
			<img src="images/loading.gif" alt="" style="vertical-align: middle; display: none;" class="LoadingIndicator" />
			<input type="button" class="CloseButton FormButton" value="{% lang 'Close' %}" onclick="$.modal.close();return false;" />
		</div>
		<input type="button" class="Submit" value="{% lang 'UseImages' %}" onclick="PhotowallImages.useImageFromWebDialogSubmit();return false;" />
	</div>
</div><!-- end #UseImageFromWebDialog --><!-- located here to be outside of posted photowall info -->