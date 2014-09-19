<?php
	
	//this is where POSTs are sent to

	// If index.php has radio button for reject checked, reject incoming POSTS

	if (isset($_GET['response']) && $_GET['response'] == "reject") 
	{
		$code = 500;
	}
	else
	{
		$code = 200;
	}

	http_response_code($code);

	$post_data = "<pre>\n";
	$post_data .= print_r($_POST, true);
	$post_data .= "HTTP Response Code Returned: " . $code . "\n";
	$post_data .= "</pre>\n";

	$filename = 'dump.txt';
	$now      = date("Y-m-d H:i:s"); 

	$handle = fopen($filename, 'a+');
	fwrite($handle, $now);
	fwrite($handle, $post_data);
	fclose($handle);
?>
