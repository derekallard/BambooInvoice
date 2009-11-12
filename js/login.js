function loginValidateInit() {
	$("username").focus();
//	$("loginform").setAttribute("onsubmit", "return checkform()"); // why isn't this working in IE?
}

function checkform() {
	allowSubmit = 0;
	if ($F("username") == "") {
			$("userError").innerHTML = lang_error_login_username;
			allowSubmit++;
	} else {
			$("userError").innerHTML = "";
	}
	if ($F("password")=="") {
			$("passError").innerHTML = lang_error_login_password;
			allowSubmit++;
	} else {
			$("passError").innerHTML = "";
	}
	if (allowSubmit>0) {
		return false;
	} else {
		return true;
	}
	return false;
}

addEvent(window,'load', loginValidateInit);
