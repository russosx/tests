<?php

function echopost($varname) {
	if (isset($_POST[$varname])) {
		echo strrev(htmlspecialchars($_POST[$varname])) . ' ' . phpversion();
		return true;
	}
	return false;
}

echopost("form_text_1") || echopost("form_text_2") || echopost("form_text_3");
