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
		if(isset($_POST['wipe'])) 
		{
        file_put_contents("dump.txt","This is where test POSTs will show up!");
    	}
    ?>

	<p> Don't reload the page, 
		<?php echo '<a href="' . $_SERVER['REQUEST_URI'] . '">click here instead!</a>'; ?>
	</p>

    <?php

		$dump = file_get_contents('dump.txt');
		echo $dump;
	?>
</body>
</html>