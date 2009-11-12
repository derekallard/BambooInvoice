function radiovalue (form, name) {
	var setvalue = arguments[2]; 
	var elements = Form.getElements( $(form) ); 
	for (var i = 0; i < elements.length; i++) { 
		var e = elements[i]; 
		if( e.name == name ){ 
			if ( setvalue != null && (setvalue == e.value)) {
				e.checked = true; 
			} 
			if ( e.checked ){
				return e.value; 
			}
		} 
	} 
}

function getInvoices (elm) {
	newhref = radiovalue('filter', 'status') + '/' + $('filter').client_id.options[$('filter').client_id.options.selectedIndex].value;
	new Ajax.Request(base_url+'invoices/retrieveInvoices/', {postBody: Form.serialize($('filter')), onComplete: function(response) {
						if (response.responseText != '') {
							invoiceArray = eval('(' + response.responseText + ')');
							$('invoiceListings').style.position = "relative";
							$('invoiceListings').style.left = "0";
							$('invoiceListings').style.visibility = "visible";
							drawTable(invoiceArray);
						} else {
							$('invoiceListings').style.position = "absolute";
							$('invoiceListings').style.left = "-5000px";
							$('invoiceListings').style.visibility = "hidden";
						}
					}})
}

function drawTable(invoiceArray) {

	var amountTotal = 0;
	var row = document.createElement('tr');
	
	var tbody = document.createElement('tbody');
	tbody.setAttribute ("id", "invoiceRows");

	var container = document.createElement('th');
	var theData = document.createTextNode(lang_invoice);
	container.className="invNum";
	container.appendChild(theData);
	row.appendChild(container);

	var container = document.createElement('th');
	var theData = document.createTextNode(lang_invoice_date_issued);
	container.className="dateIssued";
	container.appendChild(theData);
	row.appendChild(container);
	
	var container = document.createElement('th');
	var theData = document.createTextNode(lang_client_name);
	container.className="clientName";
	container.appendChild(theData);
	row.appendChild(container);
	
	var container = document.createElement('th');
	var theData = document.createTextNode(lang_amount);
	container.className="amount";
	container.appendChild(theData);
	row.appendChild(container);
	
	var container = document.createElement('th');
	var theData = document.createTextNode(lang_status);
	container.className="status";
	container.appendChild(theData);
	row.appendChild(container);

	tbody.appendChild(row);
	
	for(i = 0; i < invoiceArray['invoices'].length; i++) {

		// check the last month... if its different, inject this
		// separator into the code
		invoice_id = invoiceArray['invoices'][i].invoiceId;
		if (invoice_id.indexOf('monthbreak') > -1) {

			var row = document.createElement('tr');
			var container = document.createElement('td');
			container.setAttribute('colspan','5');
			container.setAttribute('class','monthbreak');

			var hr = document.createTextNode(invoice_id.substring(10));

			container.appendChild(hr);
			row.appendChild(container);
			tbody.appendChild(row);
	
		} else {
		
			var row = document.createElement('tr');
	
			var container = document.createElement('td');
			var theLink = document.createElement('a');
			theLink.setAttribute ('href', base_url+'invoices/view/'+invoiceArray['invoices'][i].invoiceId);
			var theData = document.createTextNode(invoiceArray['invoices'][i].invoice_number);
			theLink.appendChild(theData);
			container.appendChild(theLink);
			row.appendChild(container);
	
			var container = document.createElement('td');
			var theLink = document.createElement('a');
			theLink.setAttribute ('href', base_url+'invoices/view/'+invoiceArray['invoices'][i].invoiceId);
			var theData = document.createTextNode(invoiceArray['invoices'][i].dateIssued);
			last_date_issued = theData;
			theLink.appendChild(theData);
			container.appendChild(theLink);
			row.appendChild(container);
			
			var container = document.createElement('td');
			var theLink = document.createElement('a');
			theLink.setAttribute ('href', base_url+'invoices/view/'+invoiceArray['invoices'][i].invoiceId);
			clientName = invoiceArray['invoices'][i].clientName;
			clientName = clientName.replace(/&amp;/g, "&");
			clientName = clientName.replace(/&quot;/g, "\"");
			var theData = document.createTextNode(clientName);
			container.className="cName"; // IE doesn't accept setAttribute on a class... sigh...
			theLink.appendChild(theData);
			container.appendChild(theLink);
			row.appendChild(container);
	
			var container = document.createElement('td');
			var theLink = document.createElement('a');
			theLink.setAttribute ('href', base_url+'invoices/view/'+invoiceArray['invoices'][i].invoiceId);
			var theData = document.createTextNode(bi_currency_symbol+invoiceArray['invoices'][i].amount);
			theLink.appendChild(theData);
			container.appendChild(theLink);
			row.appendChild(container);
			
			var container = document.createElement('td');
			var theLink = document.createElement('a');
			theLink.setAttribute ('href', base_url+'invoices/view/'+invoiceArray['invoices'][i].invoiceId);
			var theData = document.createTextNode(invoiceArray['invoices'][i].status);
			theLink.appendChild(theData);
			container.appendChild(theLink);
			row.appendChild(container);
	
			tbody.appendChild(row);
		}
	}

	document.getElementById('invoiceListings').replaceChild(tbody, $('invoiceRows'));
	stripe();
}