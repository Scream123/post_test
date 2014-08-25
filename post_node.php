<?php
	$post_data = "<pre>\n";
	$post_data .= print_r($_POST, true);
	$post_data .= "</pre>\n";

	$filename = 'dump.txt';
	$now      = date("Y-m-d H:i:s"); 

	$handle = fopen($filename, 'a+');
	fwrite($handle, $now);
	fwrite($handle, $post_data);
	fclose($handle);
?>
