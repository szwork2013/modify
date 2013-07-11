<?php

/* photowall.form.tpl */
class __TwigTemplate_31e68ea9d766040ae7f2a987f850c641 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<style type=\"text/css\">
\t@import url(\"Styles/photowall.css\");
</style>
<form enctype=\"multipart/form-data\" action=\"index.php?ToDo=";
        // line 4
        echo twig_safe_filter((isset($context['FormAction']) ? $context['FormAction'] : null));
        echo "\" id=\"frmPhotowall\" method=\"post\">
<input id=\"currentTab\" name=\"currentTab\" value=\"0\" type=\"hidden\">
<div class=\"BodyContainer\">
\t<table cellSpacing=\"0\" cellPadding=\"0\" width=\"100%\" style=\"margin-left: 4px; margin-top: 8px;\">
\t<tr>
\t\t<td class=\"Heading1\">";
        // line 9
        echo twig_safe_filter((isset($context['Title']) ? $context['Title'] : null));
        echo "</td>
\t</tr>
\t<tr>
\t\t<td class=\"Intro\">
\t\t\t<p>";
        // line 13
        echo twig_safe_filter((isset($context['Intro']) ? $context['Intro'] : null));
        echo "</p>
\t\t\t<div id=\"MainMessage\">
\t\t\t\t";
        // line 15
        echo twig_safe_filter((isset($context['Message']) ? $context['Message'] : null));
        echo "
\t\t\t</div>
\t\t\t<p>
\t\t\t\t<input type=\"submit\" disabled=\"disabled\" value=\"";
        // line 18
        echo getLang("SaveAndExit");
        echo "\" class=\"FormButton\" />
\t\t\t\t<input type=\"submit\" disabled=\"disabled\" value=\"";
        // line 19
        echo twig_safe_filter((isset($context['SaveAndAddAnother']) ? $context['SaveAndAddAnother'] : null));
        echo "\" onclick=\"SaveAndAddAnother()\" class=\"FormButton\" style=\"width:130px\" />
\t\t\t\t<input type=\"reset\" value=\"";
        // line 20
        echo getLang("Cancel");
        echo "\" class=\"FormButton\" onclick=\"ConfirmCancel()\" />
\t\t\t</p>
\t\t</td>
\t</tr>
\t<tr>
    \t<td>
        <a href=\"#\" onclick=\"ShowPhotowallTag(53); return false;\" id=\"photowallTag2\">Open Tagging System</a>
\t\t\t<!-- Start images & videos -->
\t\t\t<div id=\"div8\" style=\"padding-top: 10px;\">
\t\t\t\t<table class=\"Panel\">
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"Heading2\" colspan=\"2\">";
        // line 31
        echo getLang("PhotowallImages");
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td colspan=\"2\">

\t\t\t\t\t\t<div style=\"margin:11px 0 6px 6px;\">
\t\t\t\t\t\t\t<button class=\"Button\" id=\"photowallImagesDeleteSelected\" disabled=\"disabled\">";
        // line 37
        echo getLang("DeleteSelected");
        echo "</button>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<table class=\"GridPanel photowallImagesTable\" cellspacing=\"0\">
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t<tr class=\"Heading3\">
\t\t\t\t\t\t\t\t\t<td class=\"photowallImageCheck\" style=\"padding-left:5px;\"><input type=\"checkbox\" /></td>
\t\t\t\t\t\t\t\t\t<td class=\"photowallImageThumbDisplay\" style=\"width:";
        // line 44
        echo twig_safe_filter((isset($context['photowallImage_thumbnailWidth']) ? $context['photowallImage_thumbnailWidth'] : null));
        echo "px;\">";
        echo getLang("Image");
        echo "</td>
\t\t\t\t\t\t\t\t\t<td class=\"photowallImageDescription\">";
        // line 45
        echo getLang("Description");
        echo "</td>
\t\t\t\t\t\t\t\t\t<td class=\"photowallImageAction\">";
        // line 46
        echo getLang("Action");
        echo "</td>
                                    <td class=\"photowallImageVisible\">";
        // line 47
        echo getLang("Visible");
        echo "</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t</table>

\t\t\t\t\t\t<div class=\"photowallImagesListItem\" id=\"photowallImagesListItemNew\">
\t\t\t\t\t\t\t<table cellspacing=\"0\">
\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t<tr class=\"GridRowNoOver\">
\t\t\t\t\t\t\t\t\t\t<td class=\"photowallImageCheck\"><input type=\"checkbox\" /></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"photowallImageThumbDisplay\" style=\"width:";
        // line 57
        echo twig_safe_filter((isset($context['photowallImage_thumbnailWidth']) ? $context['photowallImage_thumbnailWidth'] : null));
        echo "px;\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"photowallImageNewPlaceholder\" style=\"width:";
        // line 58
        echo twig_safe_filter((isset($context['photowallImage_thumbnailWidth']) ? $context['photowallImage_thumbnailWidth'] : null));
        echo "px; height:";
        echo twig_safe_filter((isset($context['photowallImage_thumbnailHeight']) ? $context['photowallImage_thumbnailHeight'] : null));
        echo "px;\"><div style=\"line-height:";
        echo twig_safe_filter((isset($context['photowallImage_thumbnailHeight']) ? $context['photowallImage_thumbnailHeight'] : null));
        echo "px;\"><span>";
        echo getLang("NewImage");
        echo "</span></div></div>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"photowallImageDescription\">
\t\t\t\t\t\t\t\t\t\t\t<p>";
        // line 61
        echo getLang("PhotowallImagesSelectUploadMethod");
        echo "</p>
\t\t\t\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t\t\t\t<li><span id=\"photowallImageNewUploadPlaceholder\"></span><a id=\"photowallImageNewUpload\" class=\"PhotowallImageNewUpload\" href=\"#\">";
        // line 63
        echo getLang("UploadAnImage");
        echo "</a> <span class=\"SwfUploadAlternativeNotice\" style=\"display:none;\">";
        echo getLang("PhotowallImagesBasicUploader");
        echo "</span></li>
\t\t\t\t\t\t\t\t\t\t\t\t<li><a id=\"photowallImageNewWeb\" href=\"#\">";
        // line 64
        echo getLang("UseImageFromWeb");
        echo "</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t<li><a id=\"photowallImageNewGallery\" href=\"#\">";
        // line 65
        echo getLang("ChooseFromGallery");
        echo "</a></li>
\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"photowallImageAction\">&nbsp;</td>
                                        <td class=\"photowallImageVisible\">&nbsp;</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t";
        // line 75
        echo twig_safe_filter((isset($context['photowallImagesList']) ? $context['photowallImagesList'] : null));
        echo "

\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t</table>
\t\t\t</div><!-- End images & videos -->

\t\t\t<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\" width=\"100%\" class=\"PanelPlain\" id=\"SaveButtons\">
\t\t\t\t<tr>
\t\t\t\t\t<td>
\t\t\t\t\t\t<input type=\"submit\" disabled=\"disabled\" value=\"";
        // line 85
        echo getLang("SaveAndExit");
        echo "\" class=\"FormButton\" />
\t\t\t\t\t\t<input type=\"submit\" disabled=\"disabled\" value=\"";
        // line 86
        echo twig_safe_filter((isset($context['SaveAndAddAnother']) ? $context['SaveAndAddAnother'] : null));
        echo "\" onclick=\"SaveAndAddAnother();\" class=\"FormButton\" style=\"width:130px\" />
\t\t\t\t\t\t<input type=\"reset\" value=\"";
        // line 87
        echo getLang("Cancel");
        echo "\" class=\"FormButton\" onclick=\"ConfirmCancel()\" />
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t</td>
\t</tr>
\t</table>
</div>
</form>

<script type=\"text/javascript\" src=\"../javascript/jquery.growinguploader.js?";
        // line 97
        echo twig_escape_filter($this->env, (isset($context['JSCacheToken']) ? $context['JSCacheToken'] : null), "1");
        echo "\"></script>
<script type=\"text/javascript\" src=\"../javascript/jquery/plugins/ajax.file.upload.js?";
        // line 98
        echo twig_escape_filter($this->env, (isset($context['JSCacheToken']) ? $context['JSCacheToken'] : null), "1");
        echo "\"></script>
<script type=\"text/javascript\" src=\"script/multiuploaddialog.js?";
        // line 99
        echo twig_escape_filter($this->env, (isset($context['JSCacheToken']) ? $context['JSCacheToken'] : null), "1");
        echo "\"></script>
<script type=\"text/javascript\">//<![CDATA[
var shop = { config: { } };

shop.config.AppPath = '";
        // line 103
        echo twig_safe_filter((isset($context['AppPath']) ? $context['AppPath'] : null));
        echo "';
shop.config.sessionid = '";
        // line 104
        echo twig_safe_filter((isset($context['sessionid']) ? $context['sessionid'] : null));
        echo "';
shop.config.maxUploadSize = '";
        // line 105
        echo twig_safe_filter((isset($context['maxUploadSize']) ? $context['maxUploadSize'] : null));
        echo "';

lang.EnterFixedShipping = '";
        // line 107
        echo Interspire_Template_Extension::jsFilter(getLang("EnterFixedShipping"), "'");
        echo "';
lang.PhotowallHasNoDownloads = '";
        // line 108
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallHasNoDownloads"), "'");
        echo "';
lang.EnterCurrentInventory = '";
        // line 109
        echo Interspire_Template_Extension::jsFilter(getLang("EnterCurrentInventory"), "'");
        echo "';
lang.EnterLowInventory = '";
        // line 110
        echo Interspire_Template_Extension::jsFilter(getLang("EnterLowInventory"), "'");
        echo "';
lang.ChoosePhotowallVariation = '";
        // line 111
        echo Interspire_Template_Extension::jsFilter(getLang("ChoosePhotowallVariation"), "'");
        echo "';
lang.VariationChooseVariation = '";
        // line 112
        echo Interspire_Template_Extension::jsFilter(getLang("VariationChooseVariation"), "'");
        echo "';
lang.VariationEnterValidPrice = '";
        // line 113
        echo Interspire_Template_Extension::jsFilter(getLang("VariationEnterValidPrice"), "'");
        echo "';
lang.VariationEnterValidWeight = '";
        // line 114
        echo Interspire_Template_Extension::jsFilter(getLang("VariationEnterValidWeight"), "'");
        echo "';
lang.VariationEnterValidImage = '";
        // line 115
        echo Interspire_Template_Extension::jsFilter(getLang("VariationEnterValidImage"), "'");
        echo "';
lang.VariationEnterValidStockLevel = '";
        // line 116
        echo Interspire_Template_Extension::jsFilter(getLang("VariationEnterValidStockLevel"), "'");
        echo "';
lang.VariationEnterValidLowStockLevel = '";
        // line 117
        echo Interspire_Template_Extension::jsFilter(getLang("VariationEnterValidLowStockLevel"), "'");
        echo "';
lang.EnterCustomFieldName = '";
        // line 118
        echo Interspire_Template_Extension::jsFilter(getLang("EnterCustomFieldName"), "'");
        echo "';
lang.SelectOneMoreWrapOptions = '";
        // line 119
        echo Interspire_Template_Extension::jsFilter(getLang("SelectOneMoreWrapOptions"), "'");
        echo "';
lang.EnterSortOrder = '";
        // line 120
        echo Interspire_Template_Extension::jsFilter(getLang("EnterSortOrder"), "'");
        echo "';
lang.EnterEventDateName = '";
        // line 121
        echo Interspire_Template_Extension::jsFilter(getLang("EnterEventDateName"), "'");
        echo "';
lang.EnterEventDateRange = '";
        // line 122
        echo Interspire_Template_Extension::jsFilter(getLang("EnterEventDateRange"), "'");
        echo "';
lang.AddPhotowallWithEmptyDimensions = '";
        // line 123
        echo Interspire_Template_Extension::jsFilter(getLang("AddPhotowallWithEmptyDimensions"), "'");
        echo "';
lang.ConfirmCancelPhotowall = '";
        // line 124
        echo getLang("ConfirmCancelPhotowall");
        echo "';
lang.ChooseOptionValue = '";
        // line 125
        echo Interspire_Template_Extension::jsFilter(getLang("ChooseOptionValue"), "'");
        echo "';
lang.MorePricingOptions = '";
        // line 126
        echo Interspire_Template_Extension::jsFilter(getLang("MorePricingOptions"), "'");
        echo "';
lang.LessPricingOptions = '";
        // line 127
        echo Interspire_Template_Extension::jsFilter(getLang("LessPricingOptions"), "'");
        echo "';
lang.ConfirmChangeDownloadEdit = '";
        // line 128
        echo Interspire_Template_Extension::jsFilter(getLang("ConfirmChangeDownloadEdit"), "'");
        echo "';
lang.InvalidExpiresAfter = '";
        // line 129
        echo Interspire_Template_Extension::jsFilter(getLang("InvalidExpiresAfter"), "'");
        echo "';
lang.InvalidMaxDownloads = '";
        // line 130
        echo Interspire_Template_Extension::jsFilter(getLang("InvalidMaxDownloads"), "'");
        echo "';
lang.SavingDownload = '";
        // line 131
        echo Interspire_Template_Extension::jsFilter(getLang("SavingDownload"), "'");
        echo "';
lang.UploadFailed2 = '";
        // line 132
        echo Interspire_Template_Extension::jsFilter(getLang("UploadFailed2"), "'");
        echo "';
lang.SelectDownloadFile = '";
        // line 133
        echo Interspire_Template_Extension::jsFilter(getLang("SelectDownloadFile"), "'");
        echo "';
lang.UploadingDownload = '";
        // line 134
        echo Interspire_Template_Extension::jsFilter(getLang("UploadingDownload"), "'");
        echo "';
lang.ConfirmDeleteDownload = '";
        // line 135
        echo Interspire_Template_Extension::jsFilter(getLang("ConfirmDeleteDownload"), "'");
        echo "';
lang.DigitalDownloadDeleted = '";
        // line 136
        echo Interspire_Template_Extension::jsFilter(getLang("DigitalDownloadDeleted"), "'");
        echo "';
lang.NoParent = '";
        // line 137
        echo Interspire_Template_Extension::jsFilter(getLang("NoParent"), "'");
        echo "';
lang.NoCategoryName = '";
        // line 138
        echo Interspire_Template_Extension::jsFilter(getLang("NoCategoryName"), "'");
        echo "';
lang.PhotowallWillUseVariation = '";
        // line 139
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallWillUseVariation"), "'");
        echo "';
lang.PhotowallWillUseVariationSemi = '";
        // line 140
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallWillUseVariationSemi"), "'");
        echo "';
lang.ConfirmRemoveProdField = '";
        // line 141
        echo Interspire_Template_Extension::jsFilter(getLang("ConfirmRemoveProdField"), "'");
        echo "';
lang.DiscountRulesForEachItem = '";
        // line 142
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesForEachItem"), "'");
        echo "';
lang.DiscountRulesOffEachItem = '";
        // line 143
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesOffEachItem"), "'");
        echo "';
lang.DiscountRulesField = '";
        // line 144
        echo Interspire_Template_Extension::jsFilter(getLang("DiscountRulesField"), "'");
        echo "';
lang.Number0 = '";
        // line 145
        echo Interspire_Template_Extension::jsFilter(getLang("Number0"), "'");
        echo "';
lang.Number1 = '";
        // line 146
        echo Interspire_Template_Extension::jsFilter(getLang("Number1"), "'");
        echo "';
lang.Number2 = '";
        // line 147
        echo Interspire_Template_Extension::jsFilter(getLang("Number2"), "'");
        echo "';
lang.Number3 = '";
        // line 148
        echo Interspire_Template_Extension::jsFilter(getLang("Number3"), "'");
        echo "';
lang.Number4 = '";
        // line 149
        echo Interspire_Template_Extension::jsFilter(getLang("Number4"), "'");
        echo "';
lang.Number5 = '";
        // line 150
        echo Interspire_Template_Extension::jsFilter(getLang("Number5"), "'");
        echo "';
lang.Number6 = '";
        // line 151
        echo Interspire_Template_Extension::jsFilter(getLang("Number6"), "'");
        echo "';
lang.Number7 = '";
        // line 152
        echo Interspire_Template_Extension::jsFilter(getLang("Number7"), "'");
        echo "';
lang.Number8 = '";
        // line 153
        echo Interspire_Template_Extension::jsFilter(getLang("Number8"), "'");
        echo "';
lang.Number9 = '";
        // line 154
        echo Interspire_Template_Extension::jsFilter(getLang("Number9"), "'");
        echo "';
lang.VideoLoading = '";
        // line 155
        echo Interspire_Template_Extension::jsFilter(getLang("VideoLoading"), "'");
        echo "';
lang.VideoPleaseEnterSearchTerm = '";
        // line 156
        echo Interspire_Template_Extension::jsFilter(getLang("VideoPleaseEnterSearchTerm"), "'");
        echo "';
lang.ClickHereToAddADescription = '";
        // line 157
        echo Interspire_Template_Extension::jsFilter(getLang("ClickHereToAddADescription"), "'");
        echo "';
lang.ConfirmDeletePhotowallImage = '";
        // line 158
        echo Interspire_Template_Extension::jsFilter(getLang("ConfirmDeletePhotowallImage"), "'");
        echo "';
lang.ChoosePhotowallImage = '";
        // line 159
        echo Interspire_Template_Extension::jsFilter(getLang("ChoosePhotowallImage"), "'");
        echo "';
lang.PhotowallImagesDeleted = '";
        // line 160
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallImagesDeleted"), "'");
        echo "';
lang.PhotowallImagesDeletedErrors = '";
        // line 161
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallImagesDeletedErrors"), "'");
        echo "';
lang.PhotowallImagesDeletedWarnings = '";
        // line 162
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallImagesDeletedWarnings"), "'");
        echo "';
lang.PhotowallImage = '";
        // line 163
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallImage"), "'");
        echo "';
lang.PhotowallImageAddedSuccessfully = '";
        // line 164
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallImageAddedSuccessfully"), "'");
        echo "';
lang.PhotowallImagesAddedSuccessfully = '";
        // line 165
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallImagesAddedSuccessfully"), "'");
        echo "';
lang.PhotowallImageUrlsFailed = '";
        // line 166
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallImageUrlsFailed"), "'");
        echo "';
lang.Images = '";
        // line 167
        echo Interspire_Template_Extension::jsFilter(getLang("Images"), "'");
        echo "';
lang.PhotowallImagesProcessing = '";
        // line 168
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallImagesProcessing"), "'");
        echo "';
lang.PhotowallImagesUploadError = '";
        // line 169
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallImagesUploadError"), "'");
        echo "';
lang.PhotowallImagesTransportError = '";
        // line 170
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallImagesTransportError"), "'");
        echo "';
lang.PhotowallImagesUploadProgressStatus = '";
        // line 171
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallImagesUploadProgressStatus"), "'");
        echo "';
lang.PhotowallImagesUploadProgressFile = '";
        // line 172
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallImagesUploadProgressFile"), "'");
        echo "';
lang.PhotowallImagesSortOrderChanged = '";
        // line 173
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallImagesSortOrderChanged"), "'");
        echo "';
lang.ImageFromGalleryViewLarger = '";
        // line 174
        echo Interspire_Template_Extension::jsFilter(getLang("ImageFromGalleryViewLarger"), "'");
        echo "';
lang.PhotowallImagesNoSourceImageNoThumbnail = '";
        // line 175
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallImagesNoSourceImageNoThumbnail"), "'");
        echo "';
lang.PhotowallImagesNotUploadedDueToErrors = '";
        // line 176
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallImagesNotUploadedDueToErrors"), "'");
        echo "';
lang.PhotowallImagesAnyImageNotListedHere = '";
        // line 177
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallImagesAnyImageNotListedHere"), "'");
        echo "';
lang.UploadAnImage = '";
        // line 178
        echo Interspire_Template_Extension::jsFilter(getLang("UploadAnImage"), "'");
        echo "';
lang.PhotowallImagesNonFlashIntro = '";
        // line 179
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallImagesNonFlashIntro"), "'");
        echo "';
lang.PhotowallImagesUploadImagesElipsis = '";
        // line 180
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallImagesUploadImagesElipsis"), "'");
        echo "';
lang.CancelEdit = '";
        // line 181
        echo Interspire_Template_Extension::jsFilter(getLang("CancelEdit"), "'");
        echo "';
lang.PhotowallImagesNonFlashRemove = '";
        // line 182
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallImagesNonFlashRemove"), "'");
        echo "';
lang.ShowErrorMessage = '";
        // line 183
        echo Interspire_Template_Extension::jsFilter(getLang("ShowErrorMessage"), "'");
        echo "';
lang.PhotowallImagesChooseAnImage = '";
        // line 184
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallImagesChooseAnImage"), "'");
        echo "';
lang.PleaseChooseAReleaseDate = '";
        // line 185
        echo Interspire_Template_Extension::jsFilter(getLang("PleaseChooseAReleaseDate"), "'");
        echo "';
lang.PleaseChooseAReleaseDateInTheFuture = '";
        // line 186
        echo Interspire_Template_Extension::jsFilter(getLang("PleaseChooseAReleaseDateInTheFuture"), "'");
        echo "';
lang.PhotowallImageEdited = '";
        // line 187
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallImageEdited"), "'");
        echo "';
lang.PhotowallMinimumError = '";
        // line 188
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallMinimumError"), "'");
        echo "';
lang.PhotowallMaximumError = '";
        // line 189
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallMaximumError"), "'");
        echo "';
lang.PhotowallMinimumMaximumError = '";
        // line 190
        echo Interspire_Template_Extension::jsFilter(getLang("PhotowallMinimumMaximumError"), "'");
        echo "';
//]]></script>
<script type=\"text/javascript\" src=\"/javascript/tinymce/tiny_mce_gzip.js?1\"></script>
<script type=\"text/javascript\" src=\"script/photowall.js?";
        // line 193
        echo twig_escape_filter($this->env, (isset($context['JSCacheToken']) ? $context['JSCacheToken'] : null), "1");
        echo "\"></script>
<script type=\"text/javascript\">//<![CDATA[
\$(document).ready(function() {

\t\$('#frmPhotowall').bind('submit', function () {
\t\treturn ValidateForm(CheckAddPhotowallForm);
\t});

\t";
        // line 201
        echo twig_safe_filter((isset($context['OptionButtons']) ? $context['OptionButtons'] : null));
        echo "

\t";
        // line 203
        echo twig_safe_filter((isset($context['MoreImages']) ? $context['MoreImages'] : null));
        echo "

\t\$('input[type=submit]').attr('disabled', '');
});

function ShowPhotowallTag(id) {
\tvar l = (screen.availWidth/2) - (550/2);
\tvar t = 0;
\tif(jQuery.browser.msie) {
\t\tvar width = 550;
\t}
\telse {
\t\tvar width = 550;
\t}

\twindowLocation = 'index.php?ToDo=runAddon&addon=addon_photowall&w=popupPhotowallTag&PrintFooter=false&PrintHeader=false';
\twindowLocation += '&ImageID='+id;
\tvar w = window.open(windowLocation, 'photowallTag', \"width=\"+width+\",height=\"+(screen.availHeight-100)+\",left=\"+l+\",top=\"+t);
\tw.focus();
\treturn false;
}
//]]></script>

<div style=\"display:none;\" id=\"UseImageFromWebDialog\">
\t<input type=\"hidden\" name=\"quoteSession\" value=\"";
        // line 227
        echo twig_escape_filter($this->env, (isset($context['quoteSession']) ? $context['quoteSession'] : null), "1");
        echo "\" id=\"quoteSession\">
\t<div class=\"ModalTitle\">";
        // line 228
        echo getLang("UseImageFromWebDialogTitle");
        echo "</div>
\t<div class=\"ModalContent\">
\t\t<input type=\"text\" class=\"Field100pct UseImageFromWebDialogImageUrl\" name=\"imageurl[]\" value=\"http://\" /><br />
\t\t<input type=\"text\" class=\"Field100pct UseImageFromWebDialogImageUrl\" name=\"imageurl[]\" value=\"http://\" /><br />
\t\t<input type=\"text\" class=\"Field100pct UseImageFromWebDialogImageUrl\" name=\"imageurl[]\" value=\"http://\" /><br />
\t\t<input type=\"text\" class=\"Field100pct UseImageFromWebDialogImageUrl\" name=\"imageurl[]\" value=\"http://\" /><br />
\t\t<input type=\"text\" class=\"Field100pct UseImageFromWebDialogImageUrl\" name=\"imageurl[]\" value=\"http://\" /><br />
\t</div>
\t<div class=\"ModalButtonRow\">
\t\t<div class=\"FloatLeft\">
\t\t\t<img src=\"images/loading.gif\" alt=\"\" style=\"vertical-align: middle; display: none;\" class=\"LoadingIndicator\" />
\t\t\t<input type=\"button\" class=\"CloseButton FormButton\" value=\"";
        // line 239
        echo getLang("Close");
        echo "\" onclick=\"\$.modal.close();return false;\" />
\t\t</div>
\t\t<input type=\"button\" class=\"Submit\" value=\"";
        // line 241
        echo getLang("UseImages");
        echo "\" onclick=\"PhotowallImages.useImageFromWebDialogSubmit();return false;\" />
\t</div>
</div><!-- end #UseImageFromWebDialog --><!-- located here to be outside of posted photowall info -->";
    }

}
