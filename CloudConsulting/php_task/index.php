<?php

function el($s, $cr = "<br>") {
	echo "$s$cr";
}

/*
1) Print an associative array as an ASCII table. E.g you have this array:
 */

el("1) Print an associative array as an ASCII table");

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
el("");

/*
	2) Split an array of numbers into a specified number of groups so that the 
	sum of all elements in each group would be as equal as possible.
 */

el("2) Split an array of numbers into a specified number of groups");

$array = [1,2,4,7,1,6,2,8,8,8,1,4,3];

function groupBySum(array $array, $ngroups) {
	$result = [];
	$N = count($array);
	$j = 0; $offset = 1;
	rsort($array);
	for ($i = 0; $i < $N; ++$i) {
		$result[$j][] = $array[$i];
		$j += $offset;
		if ($j == $ngroups || $j < 0) {
			$offset = -$offset;
			$j += $offset;
		}
	}
	return $result;
}

$grouped_array = groupBySum($array, 3);

$sums = [];
foreach ($grouped_array as $key => $value) {
	$sums[] = array_sum($value);
}
print_r($sums);
el("");

/*
	3) Draw an image using GD primitives (squares, circles, lines).
 */

el("3) Draw an image using GD primitives (squares, circles, lines).");

$image = imagecreatetruecolor(640, 480);

$white = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
$black = imagecolorallocate($image, 0x00, 0x00, 0x00);
$gray = imagecolorallocate($image, 0xC0, 0xC0, 0xC0);
$darknavy = imagecolorallocate($image, 0x00, 0x00, 0x50);

imagefilledrectangle($image, 0, 0, 640, 480, $white);

// road
imageline($image, 20, 460, 620, 460, $black);
// wheels
imagefilledarc($image, 200, 435, 50, 50, 0, 360, $black, IMG_ARC_PIE);
imagefilledarc($image, 450, 435, 50, 50, 0, 360, $black, IMG_ARC_PIE);
// body
imagefilledrectangle($image, 250, 350, 520, 410, $gray);
// cab
imagefilledpolygon($image, [250, 410, 150, 410, 200, 310, 250, 310], 4, $darknavy);


imagepng($image, 'image.png');
imagedestroy($image);
el("See image.png");
