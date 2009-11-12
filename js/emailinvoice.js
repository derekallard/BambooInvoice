function initEmail() {
	// reveal email invoice menu option
	if ($('invemailli')) {
		$('invemailli').style.display = "block";
//		$('emailInvoice').setAttribute ("onsubmit", "return ajaxEmail()"); // for future functionality.
		$('emailInvoice').style.display = "none";
//		$('isAjax').value = 'true'; // for future functionality.
	}

    var checkboxArray = document.getElementsByTagName("input");
    for (i=0; i<checkboxArray.length; ++i) {
        if (checkboxArray[i].name == "recipients[]" && checkboxArray[i].value != "1") {
			checkboxArray[i].onclick = function() {
				$("emailError").innerHTML = "";
            }
        }
    }
}

function ajaxEmail() {
	if (inspect_recipients()) {
		$("emailError").innerHTML = "";
		startLoading();
		new Ajax.Request(base_url+'invoices/email', {postBody: Form.serialize($('emailInvoice')), onComplete: stopLoading});	
	} else {
		$("emailError").innerHTML = lang_error_email_recipients;
	}

	return false;
}

function startLoading() {
	// put loading up
}

function stopLoading() {
	// stop loading
//	invoiceHistory
	$('emailSuccess').toggle();
	new Effect.Highlight ('emailSuccess', {startcolor:'#F7E47D', endcolor:'#FFFFFF'});
	Effect.BlindUp('emailInvoice', {duration: '0.4'});
}


function inspect_recipients() {
    var checkboxArray = document.getElementsByTagName("input");
    for (i=0; i<checkboxArray.length; ++i) {
        if (checkboxArray[i].name == "recipients[]" && checkboxArray[i].value != "1") {
			if (checkboxArray[i].checked) {
                return true;
            }
        }
    }
    return false;
}

addEvent(window,'load', initEmail);