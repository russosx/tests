<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>php js task</title>
</head>
<body>
	<div>
		<form id="id_php_js_task_1" name="php_js_task_1" action="backend.php" method="POST">
			<input type="text" id="id_form_text_1" name="form_text_1" autofocus>
			<input type="submit" value="Submit Task 1">
		</form>
	</div>
	<div>
		<form id="id_php_js_task_2" name="php_js_task_2" action="backend.php" method="POST" onsubmit="return validateField('id_form_text_2')">
			<input type="text" id="id_form_text_2" name="form_text_2">
			<input type="submit" value="Submit Task 2">
		</form>
	</div>
	<div>
		<form id="id_php_js_task_3" name="php_js_task_3">
			<input type="text" id="id_form_text_3" name="form_text_3">
			<input type="button" value="Submit Task 3" onclick="submitAjax()">
			<p id="result"></p>
		</form>
	</div>
	
	<script src="script.js"></script>

</body>
</html>