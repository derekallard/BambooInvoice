function checkMail(email) {
	var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (filter.test(email)) {return true;}
	else {return false;}
}

function IsNumeric(fieldInfo) {
	var allowChars = "0123456789.";
	var IsNumeric=true;
	var Char;
	
	for (i = 0; i < fieldInfo.length && IsNumeric == true; i++) { 
		Char = fieldInfo.charAt(i); 
		if (allowChars.indexOf(Char) == -1) {
			IsNumeric = false;
		}
	}
	return IsNumeric;   
}

function addEvent( obj, type, fn ) {
	if (obj.addEventListener) {
		obj.addEventListener( type, fn, false );
		EventCache.add(obj, type, fn);
	}
	else if (obj.attachEvent) {
		obj["e"+type+fn] = fn;
		obj[type+fn] = function() { obj["e"+type+fn]( window.event ); }
		obj.attachEvent( "on"+type, obj[type+fn] );
		EventCache.add(obj, type, fn);
	}
	else {
		obj["on"+type] = obj["e"+type+fn];
	}
}

var EventCache = function(){
	var listEvents = [];
	return {
		listEvents : listEvents,
		add : function(node, sEventName, fHandler){
			listEvents.push(arguments);
		},
		flush : function(){
			var i, item;
			for(i = listEvents.length - 1; i >= 0; i = i - 1){
				item = listEvents[i];
				if(item[0].removeEventListener){
					item[0].removeEventListener(item[1], item[2], item[3]);
				};
				if(item[1].substring(0, 2) != "on"){
					item[1] = "on" + item[1];
				};
				if(item[0].detachEvent){
					item[0].detachEvent(item[1], item[2]);
				};
				item[0][item[1]] = null;
			};
		}
	};
}();
addEvent(window,'unload',EventCache.flush);

var stripe = function() {
  var tables = document.getElementsByTagName("table");  

  for(var x=0;x!=tables.length;x++){
    var table = tables[x];
	// if it isn't a table, or if it lacks a stripe class, skip it
	if (! table || document.getElementsByClassName("stripe")=="") { return; } 
	
    var tbodies = table.getElementsByTagName("tbody");
    
    for (var h = 0; h < tbodies.length; h++) {
		
	  var even = true;
      var trs = tbodies[h].getElementsByTagName("tr");
      
      for (var i = 0; i < trs.length; i++) {
        trs[i].onmouseover=function(){
          this.className += " ruled"; return false
        }
        trs[i].onmouseout=function(){
          this.className = this.className.replace("ruled", ""); return false
        }
        
        if(even)
          trs[i].className += " even";
        
        even = !even;
      }
    }
  }
}


function highlightInputs() {
	var inputs = document.getElementsByTagName('input');
	var i;
	for (i=0; i<inputs.length; i++) {
		inputs[i].onfocus = function() {
			this.style.background = '#F6F6F6';
		}
		inputs[i].onblur = function() {
			this.style.background = '#FFF';	
		}
	}
}

function showPrint() {
	if ($("invprintli")) {
		$("invprintli").style.display = "block";
	}
	
	// not the best place for this, but convenient enough for now
	if ($("private_note_form")) {
		$("private_note_form").style.display = "none"
	}
}

function requiredFields() {
	requiredFields = document.getElementsByClassName('requiredfield');
	validForm = 1;
	for (i=0; i<requiredFields.length; i++) {
		if (requiredFields[i].value == '') {
			validForm++;
			new Insertion.After (requiredFields[i].getAttribute('id'), ' <strong class="error">' + lang_field_required + '</strong>');
		}
	}
	if (validForm == 1) {
		return true;	
	} else {
		return false;
	}
}

function bamboo_init()
{
		if ($('invoice_status_menu'))
		{
			$('invoice_status_menu').style.display = "none";
		}
		
		if ($('emailaddr'))
		{
			$('emailaddr').innerHTML = '<a href="mailto:info@bambooinvoice.org">info@bambooinvoice.org</a>';
		}
}

addEvent (window, "load", highlightInputs);
addEvent (window, "load", stripe);
addEvent (window, "load", showPrint);
addEvent (window, "load", bamboo_init);

function readMessage (el, effect) {
	Effect.toggle (el, 'appear', {duration:'0.4'});
}