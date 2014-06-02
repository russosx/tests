function validateField(fieldname) {
	var value = document.getElementById(fieldname).value;
	if (!value) {
		alert('Value of ' + fieldname + ' is empty!');
		return false;
	}
	return true;
}

function ajaxRequest() {
		var activexmodes = ["Msxml2.XMLHTTP", "Microsoft.XMLHTTP"];
		if (window.ActiveXObject) {
			for (var i = 0; i < activexmodes.length; i++) {
				try {
					return new ActiveXObject(activexmodes[i]);
				} catch(e) {
			    
				}
			}
		} else if (window.XMLHttpRequest) {
			return new XMLHttpRequest();
		}
		return false;
}

function submitAjax() {
	if (validateField('id_form_text_3')) {
		var xmlhttp = ajaxRequest();
		if (xmlhttp) {
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4  && xmlhttp.status == 200) {
					document.getElementById("result").innerHTML = xmlhttp.responseText;
				}
			};
			var text = encodeURIComponent(document.getElementById("id_form_text_3").value);
			var parameters = "form_text_3=" + text;
			xmlhttp.open("POST", "backend.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send(parameters);
			return true;
		}
	}
	return false;
}
