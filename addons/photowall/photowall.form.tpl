hi

{% import "../../admin/macros/util.tpl" as util %}
{% import "../../admin/macros/forms.tpl" as formBuilder %}
<link rel="stylesheet" type="text/css" href="../../javascript/jquery/themes/cupertino/ui.all.css" />
<script type="text/javascript" src="../../javascript/jquery/plugins/jquery.htmlEncode.js?{{ JSCacheToken }}"></script>

<form enctype="multipart/form-data" action="index.php?ToDo={{ FormAction|safe }}" id="frmProduct" method="post">
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
			<ul id="tabnav">
				<li><a href="#" id="tab8" onclick="ShowTab(8)">{% lang 'ImagesVideos' %}</a></li>
			</ul>
		</td>
	</tr>
    	<td>
			<!-- Start images & videos -->
			<div id="div8" style="padding-top: 10px;">
				<table class="Panel">
				<tr>
					<td class="Heading2" colspan="2">{% lang 'ProductImages' %}</td>
				</tr>
				<tr>
					<td colspan="2">
						<div style="margin:10px 0 6px 10px;">{% lang 'ProductImagesIntroduction' %}</div>

						<div style="margin:11px 0 6px 6px;">
							<button class="Button" id="productImagesDeleteSelected" disabled="disabled">{% lang 'DeleteSelected' %}</button>
						</div>

						<table class="GridPanel productImagesTable" cellspacing="0">
							<tbody>
								<tr class="Heading3">
									<td class="productImageCheck" style="padding-left:5px;"><input type="checkbox" /></td>
									<td class="productImageThumbDisplay" style="width:{{ productImage_thumbnailWidth|safe }}px;">{% lang 'Image' %}</td>
									<td class="productImageDescription">{% lang 'Description' %}</td>
									<td class="productImageBaseThumb"><span class="HelpText" onmouseout="HideQuickHelp(this)" onmouseover="ShowQuickHelp(this, '{% jslang 'UseAsBaseThumbnail' %}', '{% jslang 'UseAsBaseThumbnailHelpText' %}')">{% lang 'UseAsBaseThumbnail' %}</span></td>
									<td class="productImageAction">{% lang 'Action' %}</td>
								</tr>
							<tbody>
						</table>

						<div class="productImagesListItem" id="productImagesListItemNew">
							<table cellspacing="0">
								<tbody>
									<tr class="GridRowNoOver">
										<td class="productImageCheck"><input type="checkbox" /></td>
										<td class="productImageThumbDisplay" style="width:{{ productImage_thumbnailWidth|safe }}px;">
											<div class="productImageNewPlaceholder" style="width:{{ productImage_thumbnailWidth|safe }}px; height:{{ productImage_thumbnailHeight|safe }}px;"><div style="line-height:{{ productImage_thumbnailHeight|safe }}px;"><span>{% lang 'NewImage' %}</span></div></div>
										</td>
										<td class="productImageDescription">
											<p>{% lang 'ProductImagesSelectUploadMethod' %}</p>
											<ul>
												<li><span id="productImageNewUploadPlaceholder"></span><a id="productImageNewUpload" class="ProductImageNewUpload" href="#">{% lang 'UploadAnImage' %}</a> <span class="SwfUploadAlternativeNotice" style="display:none;">{% lang 'ProductImagesBasicUploader' %}</span></li>
												<li><a id="productImageNewWeb" href="#">{% lang 'UseImageFromWeb' %}</a></li>
												<li><a id="productImageNewGallery" href="#">{% lang 'ChooseFromGallery' %}</a></li>
											</ul>
										</td>
										<td class="productImageBaseThumb">&nbsp;</td>
										<td class="productImageAction">&nbsp;</td>
									</tr>
								</tbody>
							</table>
						</div>

						{{ productImagesList|safe }}

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

lang.EnterFixedShipping = '{% jslang 'EnterFixedShipping' %}';
lang.ProductHasNoDownloads = '{% jslang 'ProductHasNoDownloads' %}';
lang.EnterCurrentInventory = '{% jslang 'EnterCurrentInventory' %}';
lang.EnterLowInventory = '{% jslang 'EnterLowInventory' %}';
lang.ChooseProductVariation = '{% jslang 'ChooseProductVariation' %}';
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
lang.AddProductWithEmptyDimensions = '{% jslang 'AddProductWithEmptyDimensions' %}';
lang.ConfirmCancelProduct = '{% lang 'ConfirmCancelProduct' %}';
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
lang.ProductWillUseVariation = '{% jslang 'ProductWillUseVariation' %}';
lang.ProductWillUseVariationSemi = '{% jslang 'ProductWillUseVariationSemi' %}';
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
lang.ConfirmDeleteProductImage = '{% jslang 'ConfirmDeleteProductImage' %}';
lang.ChooseProductImage = '{% jslang 'ChooseProductImage' %}';
lang.ProductImagesDeleted = '{% jslang 'ProductImagesDeleted' %}';
lang.ProductImagesDeletedErrors = '{% jslang 'ProductImagesDeletedErrors' %}';
lang.ProductImagesDeletedWarnings = '{% jslang 'ProductImagesDeletedWarnings' %}';
lang.ProductImage = '{% jslang 'ProductImage' %}';
lang.ProductImageAddedSuccessfully = '{% jslang 'ProductImageAddedSuccessfully' %}';
lang.ProductImagesAddedSuccessfully = '{% jslang 'ProductImagesAddedSuccessfully' %}';
lang.ProductImageUrlsFailed = '{% jslang 'ProductImageUrlsFailed' %}';
lang.Images = '{% jslang 'Images' %}';
lang.ProductImagesProcessing = '{% jslang 'ProductImagesProcessing' %}';
lang.ProductImagesUploadError = '{% jslang 'ProductImagesUploadError' %}';
lang.ProductImagesTransportError = '{% jslang 'ProductImagesTransportError' %}';
lang.ProductImagesUploadProgressStatus = '{% jslang 'ProductImagesUploadProgressStatus' %}';
lang.ProductImagesUploadProgressFile = '{% jslang 'ProductImagesUploadProgressFile' %}';
lang.ProductImagesSortOrderChanged = '{% jslang 'ProductImagesSortOrderChanged' %}';
lang.ImageFromGalleryViewLarger = '{% jslang 'ImageFromGalleryViewLarger' %}';
lang.ProductImagesNoSourceImageNoThumbnail = '{% jslang 'ProductImagesNoSourceImageNoThumbnail' %}';
lang.ProductImagesNotUploadedDueToErrors = '{% jslang 'ProductImagesNotUploadedDueToErrors' %}';
lang.ProductImagesAnyImageNotListedHere = '{% jslang 'ProductImagesAnyImageNotListedHere' %}';
lang.UploadAnImage = '{% jslang 'UploadAnImage' %}';
lang.ProductImagesNonFlashIntro = '{% jslang 'ProductImagesNonFlashIntro' %}';
lang.ProductImagesUploadImagesElipsis = '{% jslang 'ProductImagesUploadImagesElipsis' %}';
lang.CancelEdit = '{% jslang 'CancelEdit' %}';
lang.ProductImagesNonFlashRemove = '{% jslang 'ProductImagesNonFlashRemove' %}';
lang.ShowErrorMessage = '{% jslang 'ShowErrorMessage' %}';
lang.ProductImagesChooseAnImage = '{% jslang 'ProductImagesChooseAnImage' %}';
lang.PleaseChooseAReleaseDate = '{% jslang 'PleaseChooseAReleaseDate' %}';
lang.PleaseChooseAReleaseDateInTheFuture = '{% jslang 'PleaseChooseAReleaseDateInTheFuture' %}';
lang.ProductImageEdited = '{% jslang 'ProductImageEdited' %}';
lang.ProductMinimumError = '{% jslang 'ProductMinimumError' %}';
lang.ProductMaximumError = '{% jslang 'ProductMaximumError' %}';
lang.ProductMinimumMaximumError = '{% jslang 'ProductMinimumMaximumError' %}';
//]]></script>
<script type="text/javascript" src="script/product.js?{{ JSCacheToken }}"></script>
<script type="text/javascript" src="script/product.youtube.js?{{ JSCacheToken }}"></script>
<script type="text/javascript">//<![CDATA[
$(document).ready(function() {

	$('#frmProduct').bind('submit', function () {
		return ValidateForm(CheckAddProductForm);
	});

	{{ OptionButtons|safe }}

	// Toggle the product type
	var f = g('ProductType_0');
	if(f.checked)
	{
		ToggleType(0);
	}
	else
	{
		ToggleType(1);
	}

	ToggleAllowPurchasing();
	ToggleCallForPricing();

	if(g('prodInvTrack_2').checked) {
		$('#prodOptionsRequired').attr('checked', true);
		$('#prodOptionsRequired').attr('disabled', true);
	}

	$('#prodInvTrack_2').click(function() {
		if(this.checked) {
			$('#prodOptionsRequired').attr('checked', true);
			$('#prodOptionsRequired').attr('disabled', true);
		}
	});

	$('#prodInvTrack_1').click(function() {
		$('#prodOptionsRequired').attr('checked', false);
		$('#prodOptionsRequired').attr('disabled', false);
	});

	$('#prodInvTrack_0').click(function() {
		$('#prodOptionsRequired').attr('checked', false);
		$('#prodOptionsRequired').attr('disabled', false);
	});

	{{ MoreImages|safe }}

	ShowTab({{ CurrentTab|safe }});

	// Are related products set to auto?
	if(shop.config.IsProdRelatedAuto == 'checked="checked"') {
		toggle_related_auto(true);
	}

	youtube.videos = '{{ YouTubeVideos|safe }}';
	youtube.init();

	$('input[type=submit]').attr('disabled', '');

	$('input[name=_prodorderable]').bind('click', function(){
		$('._prodorderable_detail').hide();
		if (this.checked) {
			$('#_prodorderable_' + $(this).val() + '_detail').show();
		}
	});

	$('input[name=_prodorderable]:checked').trigger('click');

	$('#prodreleasedate').datepicker({
		showOn: 'both',
		buttonImage: 'images/calendar.gif',
		buttonImageOnly: true,
		minDate: new Date(),
		firstDay: 1,
		duration: '',
		dateFormat: 'mm/dd/yy'
	});

	$('#prodreleasedate').bind('keydown keyup keypress', function(event){
		switch (event.keyCode) {
			case 8: // backspace
			case 16: // shift
			case 17: // control
			case 18: // alt
			case 35: // end
			case 36: // home
			case 37: // left
			case 38: // up
			case 39: // right
			case 40: // down
			case 46: // delete
				return;
				break;
		}

		if ((event.shiftKey || event.metaKey) && event.keyCode == 88) {
			// cut
			return;
		}

		event.preventDefault();
	});

	$("#OpenGraphUseProductName").change(function() {
		if($(this).is(':checked')) {
			$(this).parent('label').nextAll('.NodeJoin:first').hide();
		}
		else {
			$(this).parent('label').nextAll('.NodeJoin:first').show();
		}
	});

	$("#OpenGraphUseMetaDescription").change(function() {
		if($(this).is(':checked')) {
			$(this).parent('label').nextAll('.NodeJoin:first').hide();
		}
		else {
			$(this).parent('label').nextAll('.NodeJoin:first').show();
		}
	});
});
//]]></script>

<div style="display:none;" id="UseImageFromWebDialog">
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
		<input type="button" class="Submit" value="{% lang 'UseImages' %}" onclick="ProductImages.useImageFromWebDialogSubmit();return false;" />
	</div>
</div><!-- end #UseImageFromWebDialog --><!-- located here to be outside of posted product info -->

<div id="QuickCategoryCreation" style="display: none;">
	<div class="ModalTitle">{% lang 'CreateACategory' %}</div>
	<div class="ModalContent">
		<table class="Panel" width="100%">
			<tr>
				<td><strong>{% lang 'CatName' %}:</strong></td>
			</tr>
			<tr>
				<td><input id="QuickCatName" type="text" name="catname" value=""  class="Field250" style="width: 100%;" /></td>
			</tr>
		</table>
		<div style="height: 4px; font-size: 1px;"></div>
		<table class="Panel" width="100%">
			<tr>
				<td><strong>{% lang 'CatParentCategory' %}:</strong></td>
			</tr>
			<tr>
				<td>
					<select name="catparentid" size="8" id="QuickCatParent" style="width: 100%">
					</select>
				</td>
			</tr>
		</table>
	</div>
	<div class="ModalButtonRow">
		<div class="FloatLeft">
			<img src="images/loading.gif" alt="" style="vertical-align: middle; display: none;" class="LoadingIndicator" />
			<input type="button" class="CloseButton FormButton" value="{% lang 'Cancel' %}" onclick="$.modal.close();" />
		</div>
		<input type="button" class="Submit" value="{% lang 'Save' %}" onclick="SaveQuickCategory()" />
	</div>
</div>

<div id="AddProductWithEmptyDimensions" style="display: none;">
<div class="ModalTitle">{% lang 'ConfirmProductDimension' %}</div>
	<div class="ModalContent">
		{% lang 'AddProductWithEmptyDimensions' %}<br /><br />
		<input type="checkbox" value="{% lang 'DontShowDimensionsCheck' %}" id="DontShowDimensionsCheck" name="DontShowDimensionsCheck" /> <label for="DontShowDimensionsCheck">{% lang 'DontShowDimensionsAgain' %}</label>
	</div>
	<div class="ModalButtonRow">
		<div class="FloatLeft">
			<input type="button" class="CloseButton FormButton" value="{% lang 'Cancel' %}" onclick="$.modal.close();" />
		</div>
		<input type="button" class="Submit" value="{% lang 'Continue' %}" onclick="CheckedDimensionsContinue()" />
	</div>
</div>
