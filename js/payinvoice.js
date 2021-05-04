function init() {
	// validate amount box
	if ($("amount")) {
		$("amount").onkeyup = function() {
			if (!IsNumeric($F("amount"))) {
				$("amountError").innerHTML = lang_numbers_only;
				$("amount").focus();
			} else {
				$("amountError").innerHTML = "";
			}
		}
	}

	// reveal pay invoice menu option
	if ($('invpayli')) {
		$('invpayli').style.display = "block";
		$('enterPayment').setAttribute ("onsubmit", "return ajaxPayment()");
		$('enterPayment').style.display = "none";
	}

	// get rid of non-js version and overwrite with js version
	datePickerString = '<label>' + lang_invoice_date_issued + '<input type="hidden" name="date_paid" id="date_paid" value="' + datePicker1 + '"/></label><span id="dateIssuedDisplay">' + datePicker2 + '</span> <a href="#" id="changeDate" onclick="Effect.toggle (\'cal1Container\', \'Blind\', {duration:0.4});return false;">' + lang_invoice_change + '</a>';
	if ($('date_paid_container')) {
		$('date_paid_container').innerHTML =  datePickerString;
	}
}

function ajaxPayment() {
	invoiceAmount = $('invoiceAmount').innerHTML;
	if ($F('amount') == '') {
		$("amountError").innerHTML = lang_amount_error;
		return false;
	} else {
		
	}
}


function set_date(td, cal) {					
	cal = eval(cal);
	
	// If the user is clicking a cell that is already
	// selected we'll de-select it and clear the form field
	
	if (last_click[cal.id] == td.firstChild.nodeValue) {
		td.className = "caldaycells";
		last_click[cal.id] = '';
		remove_date(cal);
		cal.selected_date =  '';
		return;
	}
				
	// Onward!
	if (document.getElementById(cal.id + "selected")) {
		document.getElementById(cal.id + "selected").className = "caldaycells";
		document.getElementById(cal.id + "selected").id = "";
	}
									
	td.className = "caldayselected";
	td.id = cal.id + "selected";

	cal.selected_date = cal.date_obj.getFullYear() + '' + cal.date_obj.getMonth() + '' + cal.date;			
	cal.date_obj.setDate(td.firstChild.nodeValue);
	cal = new calendar(cal.id, cal.date_obj, true, true);
	cal.selected_date = cal.date_obj.getFullYear() + '' + cal.date_obj.getMonth() + '' + cal.date;			
	
	last_date = cal.date;

	//cal.date
	last_click[cal.id] = cal.date;
				
	// Insert the date into the form
	insert_date(cal);
}

//	Insert the date into the form field
function insert_date(cal) {
/*	cal = eval(cal);

	// format date for display as month #, yyyyy
	
	$("date_paidDisplay").innerHTML = cal.date_str('y');
	$("date_paid").value = cal.date_str('n');
	Effect.toggle ('cal1Container', 'Blind', {duration: '0.4'});
	$("amount").focus();
*/
	cal = eval(cal);

	$("dateIssuedDisplay").innerHTML = cal.date_str('n');
	$("date_paid").value = cal.date_str('n');
	Effect.toggle ('cal1Container', 'Blind', {duration:'0.4'});
	$("amount").focus();
}

addEvent(window,'load', init);