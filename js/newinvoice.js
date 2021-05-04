function newInvoice() {
	$("addinv").setAttribute("href","#newinvoice");
	$("createInvoice").disabled = true; // disable submit

	allNodes = document.getElementsByClassName("createInvoice");
	for(i = 0; i < allNodes.length; i++) {
		allNodes[i].onclick = function() {
			Effect.toggle ('newinvoice', 'Blind', {duration: 0.4});
			this.setAttribute ('href', '#');
			if ($('overduenotice')) {
				$('overduenotice').style.display = "none";	  
			}
		}
	}

	$("newinvoicecancel").onclick = function() {
		Effect.toggle ('newinvoice', 'Blind', {duration:0.4});
	}
	$("client_id").onchange = function() {
		if ($F("client_id") != 0) {
			$("createInvoice").disabled = false;
			$("newClient").value = "";
		} else {
			$("createInvoice").disabled = true;
		}
	}
	$("newClient").onkeyup = function() {
		if ($F("newClient")=="") {
			$("createInvoice").disabled = true;
			$("client_id").selectedIndex = 0;
		} else {
			$("createInvoice").disabled = false;
			$("client_id").selectedIndex = 0;
		}
	}
}

addEvent(window,'load',newInvoice);