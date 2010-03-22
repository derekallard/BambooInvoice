function init() {
	// validate amount box

	$('new_item').style.display = 'block'; // reveal the new item button if js is enabled

	// get rid of non-js version and overwrite with js version
	datePickerString = '<label>' + lang_invoice_date_issued + '<input type="hidden" name="dateIssued" id="dateIssued" value="' + datePicker1 + '"/></label><span id="dateIssuedDisplay">' + datePicker2 + '</span> <a href="#" id="changeDate" onclick="Effect.toggle (\'cal1Container\', \'Blind\', {duration:0.4});return false;">' + lang_invoice_change + '</a>';
	$('dateIssuedContainer').innerHTML =  datePickerString;
	
	recalculate_items();

	item_count = $$('#item_area .item_row').length;
}


//item_count = 1; // currently 1 itemized item


amount = 0; // total amound of an itemized invoice

function validateCreateInvoice() {
	return true;
}


//	Insert the date into the form field
function insert_date(cal) {
	cal = eval(cal);

	$("dateIssuedDisplay").innerHTML = cal.date_str('n');
	$("dateIssued").value = cal.date_str('n');
	Effect.toggle ('cal1Container', 'Blind', {duration:'0.4'});
	$("amount").focus();
}


function create_itemized_fields()
{
	// add a new counter to item_count, which tracks the current number of items.
	item_count++;
	var row = document.createElement('tr');
	row.setAttribute('id', 'item'+item_count);

	var td = document.createElement('td');
	var p = document.createElement('p');
	var label = document.createElement('label');
	var span = document.createElement('span');
	var theData = document.createTextNode(lang_quantity);
	var theInput = document.createElement('input');
	theInput.setAttribute('type', 'text');
	theInput.setAttribute('name', 'items['+item_count+'][quantity]');
	theInput.setAttribute('size', '3');
	theInput.setAttribute('value', '1');
	theInput.setAttribute('onkeyup', 'recalculate_items();');
	span.appendChild(theData);
	label.appendChild(span);
	label.appendChild(theInput);
	p.appendChild(label);
	td.appendChild(p);
	row.appendChild(td);

	var td = document.createElement('td');
	var p = document.createElement('p');
	var label = document.createElement('label');
	var span = document.createElement('span');
	var theData = document.createTextNode(lang_work_description);
	var theTextarea = document.createElement('textarea');
	theTextarea.setAttribute('name', 'items['+item_count+'][work_description]');
	theTextarea.setAttribute('rows', '5');
	theTextarea.setAttribute('cols', '70');
	span.appendChild(theData);
	label.appendChild(span);
	label.appendChild(theTextarea);
	p.appendChild(label);
	td.appendChild(p);
	row.appendChild(td);
	
	var td = document.createElement('td');
	var p = document.createElement('p');
	var label = document.createElement('label');
	var span = document.createElement('span');
	var theData = document.createTextNode(lang_taxable);
	var theInput = document.createElement('input');
	theInput.setAttribute('type', 'checkbox');
	theInput.setAttribute('name', 'items['+item_count+'][taxable]');

	if (taxable)
	{
		theInput.setAttribute('checked', 'checked');
	}
	else
	{
		theInput.checked = false;
	}

	theInput.setAttribute('value', '1');
	theInput.setAttribute('onclick', 'recalculate_items();');
	span.appendChild(theData);
	label.appendChild(span);
	label.appendChild(theInput);
	p.appendChild(label);
	td.appendChild(p);
	row.appendChild(td);

	var td = document.createElement('td');
	var p = document.createElement('p');
	var label = document.createElement('label');
	var span = document.createElement('span');
	var theData = document.createTextNode(lang_amount);
	var theInput = document.createElement('input');
	theInput.setAttribute('type', 'text');
	theInput.setAttribute('name', 'items['+item_count+'][amount]');
	theInput.setAttribute('id', 'items['+item_count+'][amount]');
	theInput.setAttribute('size', '5');
	theInput.setAttribute('value', '0.00');
	theInput.setAttribute('onkeyup', 'recalculate_items();');
	span.appendChild(theData);
	label.appendChild(span);
	label.appendChild(document.createTextNode(bi_currency_symbol));
	label.appendChild(theInput);
	p.appendChild(label);
	td.appendChild(p);
	row.appendChild(td);

	var td = document.createElement('td');
	var p = document.createElement('p');
	var Ahref = document.createElement('a');
	var img = document.createElement('img');
	img.setAttribute('alt', 'remove row');
	Ahref.setAttribute('href',img.setAttribute('src',base_url_no_index+'img/cancel.png'));
	Ahref.id=item_count;
	Ahref.onclick = function()
	{
		$('item_area').removeChild($("item"+this.getAttribute('id')+""));
		recalculate_items();
		return false;
	}
	Ahref.appendChild(img);
	p.appendChild(Ahref);
	td.appendChild(p);
	row.appendChild(td);

	$('item_area').appendChild(row);

	return false;
}


function recalculate_items()
{
	new Ajax.Request(base_url+'invoices/recalculate_items', {postBody: Form.serialize('createInvoice'), onComplete: function(transport) {
		data = transport.responseText.evalJSON();
		// {"amount" : "5.00", "tax1_amount" : "0.30", "tax2_amount" : "0.00", "total_amount" : "5.30"}
		$('item_amount').innerHTML = data.amount;
		$('item_total_amount').innerHTML = data.total_amount;
		if ($('item_tax1amount')) {$('item_tax1amount').innerHTML = data.tax1_amount;}
		if ($('item_tax2amount')) {$('item_tax2amount').innerHTML = data.tax2_amount;}
	}})
}

addEvent(window,'load', init);