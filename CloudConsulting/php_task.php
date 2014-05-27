<?php

/*
1) Print an associative array as an ASCII table. E.g you have this array:
 */

$array = array(
    array(
        'Name' => 'Trixie',
        'Color' => 'Green',
        'Element' => 'Earth',
        'Likes' => 'Flowers'
        ),
    array(
        'Name' => 'Tinkerbell',
        'Element' => 'Air',
        'Likes' => 'Singning',
        'Color' => 'Blue'
        ),  
    array(
        'Element' => 'Water',
        'Likes' => 'Dancing',
        'Name' => 'Blum',
        'Color' => 'Pink'
        ),
);

if (count($array) < 1) {
	el("Empty table");
	exit;
}

function el($s, $cr = "<br>") {
	echo "$s$cr";
}

$sizes = [];
foreach ($array as $rec) {
	foreach ($rec as $title => $value) {
		if (!isset($sizes[$title])) {
			$sizes[$title] = strlen($title);
		}
		if ( ($l = strlen($value)) > $sizes[$title] ) {
			$sizes[$title] = $l;
		}
	}
}

$record_format = '';
foreach ($sizes as $title => $len) {
	$record_format .= "| %-" . $len . "s ";
}
$record_format .= "|";

$line = call_user_func_array('sprintf', array_merge([$record_format], array_pad([], count($sizes), ' ')));
$line = str_replace(['|', ' '], ['+', '-'], $line);
$headers = call_user_func_array('sprintf', array_merge([$record_format], array_keys($sizes)));

// $table = [$line];
// $table[] = $headers;
// $table[] = $line;
el($line);
el($headers);
el($line);
foreach ($array as $rec) {
	$args = [$record_format];
	foreach ($sizes as $title => $len) {
		$args[] = isset($rec[$title]) ? $rec[$title] : "";
	}
	// $table[] = call_user_func_array('sprintf', $args);
	el(call_user_func_array('sprintf', $args));
}
el($line);
// $table[] = $line;

// var_dump($record_format);
// var_dump($table);
// var_dump($sizes);

/*
	2) Split an array of numbers into a specified number of groups so that the 
	sum of all elements in each group would be as equal as possible.
 */

