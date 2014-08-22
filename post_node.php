<?php
	$post_data = "<pre>\n";
	$post_data .= print_r($_POST, true);
	$post_data .= "</pre>\n";

	$filename = 'dump.txt';

	$handle = fopen($filename, 'a+');
	fwrite($handle, $post_data);
	fclose($handle);
?>
