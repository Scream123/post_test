<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test POST node</title>
</head>
<body>
	<h3>Test POST node</h3>
	<form method="post">
    	<input type="submit" name="wipe" value="Clear old POSTs" />
	</form>
	<?php
		if($_POST['wipe']) 
		{
        file_put_contents("dump.txt","");
    	}

		$dump = file_get_contents('dump.txt');
		echo $dump;
	?>
</body>
</html>