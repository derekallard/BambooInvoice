// Accordian effect
function accordianInit() {
	accorianClients = document.getElementsByClassName('displayLink');
	for (i=0; i<accorianClients.length; i++) {
		accorianClients[i].onclick = function() {
			Effect.toggle ('clientInfo'+this.getAttribute('id').substr(6), 'Blind', {duration:'0.4'});
		}
	}
}

function contactLinkInit() {
	contactLinks = document.getElementsByClassName('addcontact');
	for (i=0; i<contactLinks.length; i++) {
		contactLinks[i].setAttribute ('href', 'javascript:void(0);');
		contactLinks[i].onclick = function() {
			clientContactEntry (this.getAttribute('id'));
		}
	}
	
	$('close').onclick = function() {
		new Effect.Fade('clientContactEntry', {duration:0.6});
	}
}

function strip_tags (str) {
	return str.replace(/(<([^>]+)>)/ig,""); 
}

function clientContactEntry (id) {
	// the following line gets the name of the company they're about to add a contact to	
	company_name = strip_tags($(id).innerHTML);
	$('company_nameContact').innerHTML = company_name;
	$('client_contact_id').value = id.substr(11);
	new Effect.Appear('clientContactEntry', {duration:0.6});
	new Draggable('clientContactEntry',{revert:false});
	Field.focus('first_name')
}

function checkClient() {
	if($F('zip').length == 5) {
		var url = 'checkZip.cfm';
		var params = 'zip=' + $F('zip');
	}
}

function ajaxAddContact() {
	if ($F('first_name') != '' && $F('last_name') != '' && checkMail($F('email'))) {
		new Ajax.Request(base_url+'clientcontacts/add', {postBody: 'client_id='+$F('client_contact_id')+'&'+Form.serialize($('clientcontact')), onComplete: addContact});	
	} else {
		$('ajaxstatus').innerHTML = lang_clients_contact_add;
	}
}

function addContact (response) {
	// if there is a no contact notice, remove it
	if ($('nocontact'+$('client_contact_id').value)) {
		$('nocontact'+$('client_contact_id').value).style.display = 'none';
	}
	// add to list
	newClientTable = '<table id="clientTable' + response.responseText + '">';
	newClientTable += '<tr class="contactname"><td>' + $F('first_name') + ' ' + $F('last_name') + '</td>';
	newClientTable += '<td class="clienteditdelete">';
	newClientTable += '<td class="clienteditdelete"><a href="'+base_url+'clientcontacts/edit/';
	newClientTable += response.responseText + '">'+lang_edit+'</a> | ';
	newClientTable += ' <a href="javascript:void(0);" onclick="ajaxDeleteContact (this.getAttribute(\'id\'));"';
	newClientTable += '" class="ajaxDelContact" id="_' + response.responseText + '">'+lang_delete+'</a></td>';
	newClientTable += '</tr><tr><td colspan="2"><a href="mailto:';
	newClientTable += $F('email') + '">' + $F('email') + '</a><br />' + $F('phone') + '</td></tr></table>';
	// hide and clear the form
	new Insertion.Bottom ('contactList'+$('client_contact_id').value, newClientTable);
	new Effect.Highlight ('clientTable' + response.responseText, {startcolor:'#F7E47D', endcolor:'#FFFFFF'});
	new Effect.Fade('clientContactEntry', {duration:0.6});
	setTimeout ('clearForm()', 600);
}

function clearForm() {
	// blank out form
	$('first_name').value = '';
	$('last_name').value = '';
	$('email').value = '';
	$('phone').value = '';
	$('ajaxstatus').innerHTML = '';	
}

function ajaxDeleteContact(id) {
	new Ajax.Updater('ajaxFeedback',base_url+'/clientcontacts/delete/', {postBody: 'id='+id.substr(1), onSuccess: deleteContact(id.substr(1))});
}

function deleteContact (id) {
	new Effect.Highlight ('clientTable'+id, {startcolor:'#F7E47D', endcolor:'#FFFFFF'});
	Effect.Fade ('clientTable'+id);
}

function deleteContactInit() {
	deleteContactLinks = document.getElementsByClassName('ajaxDelContact');
	for (i=0; i<deleteContactLinks.length; i++) {
		deleteContactLinks[i].setAttribute ('href', 'javascript:void(0)');
		deleteContactLinks[i].onclick = function() {
			ajaxDeleteContact (this.getAttribute("id"));
		}
	}
}

addEvent (window, "load", deleteContactInit);
addEvent (window, "load", accordianInit);
addEvent (window, "load", contactLinkInit);