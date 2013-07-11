<div class="photowallImagesListItem">
	<table cellspacing="0" class="GridPanel">
		<tbody>
			<tr class="GridRow" onmouseover="$(this).addClass('GridRowOver').removeClass('GridRow');" onmouseout="$(this).addClass('GridRow').removeClass('GridRowOver');">
				<td class="photowallImageCheck"><input type="checkbox" /></td>
				<td class="photowallImageThumbDisplay" style="width:{{ photowallImage_thumbnailWidth|safe }}px;">
					<a style="width:{{ photowallImage_thumbnailWidth|safe }}px; height:{{ photowallImage_thumbnailHeight|safe }}px;" title="{% lang 'ClickToShowFullSizeImage' %}"></a>
				</td>
				<td class="photowallImageDescription"><textarea rows="4"></textarea><div style="display:none;"><input type="button" class="photowallImageDescriptionSave" value="{% lang 'Save' %}" /> <input type="button" class="photowallImageDescriptionCancel" value="{% lang 'Cancel' %}" /></div></td>
				<td class="photowallImageBaseThumb"><input type="radio" name="photowallImageBaseThumb" /></td>
				<td class="photowallImageAction">
					<a href="#" class="photowallImageDelete">{% lang 'Delete' %}</a>
					<a href="#" class="photowallImageEdit">{% lang 'Edit' %}</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>
