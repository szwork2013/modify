
// Are we selling a digital photowall? By default we're not
var sellingDP = false;
var photowallCheckedDimensions = false;

if(ReadCookie('DontShowDimensionsCheck') == 'yes') {
	photowallCheckedDimensions = true;
}

function ConfirmCancel() {
	if(confirm(lang.ConfirmCancelPhotowall))
		document.location.href = "index.php?ToDo=runAddon&addon=addon_photowall";
}

function MoveOptionUp(obj) {
	if(obj.selectedIndex == -1) {
		alert(lang.ChooseOptionValue);
		obj.focus();
		return;
	}

	for(i = 0; i < obj.options.length; i++) {
		if(obj.options[i].selected) {
			if(i != 0 && !obj.options[i-1].selected) {
				SwapOptions(obj, i, i-1);
				obj.options[i-1].selected = true;
			}
		}
	}
}

function MoveOptionDown(obj)
{
	if(obj.selectedIndex == -1) {
		alert(lang.ChooseOptionValue);
		obj.focus();
		return;
	}

	for(i = obj.options.length-1; i >= 0; i--) {
		if(obj.options[i].selected) {
			if (i != (obj.options.length-1) && ! obj.options[i+1].selected) {
				SwapOptions(obj, i, i+1);
				obj.options[i+1].selected = true;
			}
		}
	}
}

function SwapOptions(obj, i, j)
{
	var o = obj.options;
	var i_selected = o[i].selected;
	var j_selected = o[j].selected;
	var temp = new Option(o[i].text, o[i].value, o[i].defaultSelected, o[i].selected);
	var temp2= new Option(o[j].text, o[j].value, o[j].defaultSelected, o[j].selected);

	o[i] = temp2;
	o[j] = temp;
	o[i].selected = j_selected;
	o[j].selected = i_selected;
}

function SaveAndAddAnother() {
	var f = g('frmPhotowall');
	var d = document.createElement('input');
	d.type = 'hidden';
	d.name = 'addanother';
	d.value = '1';
	f.appendChild(d);
}

function HideFieldHelpText(field)
{

	if ($(field).is('.FieldHelp')) {
		field.value = '';
		$(field).removeClass('FieldHelp');
	}
}


function ShowFieldHelpText(field, help)
{
	field.value = field.value.replace(/^\s+/, '').replace(/\s+$/, '');
	if (field.value == '') {
		field.value = help;
		$(field).addClass('FieldHelp');
	}
}

function GetFieldLabel(key, label)
{
	var newNo, parts, index, numbers = [lang.Number0, lang.Number1, lang.Number2, lang.Number3, lang.Number4, lang.Number5, lang.Number6, lang.Number7, lang.Number8, lang.Number9];

	parts = key.toString();
	parts = parts.split('');
	newNo = '';

	for (var i=0; i<parts.length; i++) {
		index = numbers.array_search(parts[i]);
		if (index !== false) {
			newNo = newNo + numbers[index];
		}
	}

	return label.replace(/\%s/, newNo);
}

$(document).ready(function() {
	if ($('#EventDateRequired').attr('checked')) {
		$('#DateFieldNameTR').show();
		$('#DateLimitTR').show();
	} else {
		$('#DateFieldNameTR').hide();
		$('#DateLimitTR').hide();
	}

	$('#LimitDates1').hide();
	$('#LimitDates2').hide();
	$('#LimitDates3').hide();

	if ($('#LimitDates').attr('checked')) {
		if ($('#LimitDatesSelect').val() == 1) {
			$('#LimitDates1').show();
		}
		if ($('#LimitDatesSelect').val() == 2) {
			$('#LimitDates2').show();
		}
		if ($('#LimitDatesSelect').val() == 3) {
			$('#LimitDates3').show();
		}
	} else {
			$('#LimitDatesSelect').attr("disabled", true);
	}
});



$('#EventDateRequired').click(function () {
		$('#DateFieldNameTR').toggle();
		$('#DateLimitTR').toggle();
});

$('#LimitDates').click(function () {

		$('#LimitDates1').hide();
		$('#LimitDates2').hide();
		$('#LimitDates3').hide();

		if ($('#LimitDates').attr('checked')) {
			$('#LimitDatesSelect').attr("disabled", false);
			if ($('#LimitDatesSelect').val() == 1) {
				$('#LimitDates1').show();
			}
			if ($('#LimitDatesSelect').val() == 2) {
				$('#LimitDates2').show();
			}
			if ($('#LimitDatesSelect').val() == 3) {
				$('#LimitDates3').show();
			}
		} else {
			$('#LimitDatesSelect').attr("disabled", true);
		}
});

$('#LimitDatesSelect').change(function () {

		$('#LimitDates1').hide();
		$('#LimitDates2').hide();
		$('#LimitDates3').hide();

		if ($('#LimitDatesSelect').val() == 1) {
			$('#LimitDates1').show();
		}
		if ($('#LimitDatesSelect').val() == 2) {
			$('#LimitDates2').show();
		}
		if ($('#LimitDatesSelect').val() == 3) {
			$('#LimitDates3').show();
		}
});
