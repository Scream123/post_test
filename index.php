<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test POST node</title>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<h3 class="main-header">Test POST node</h3>
	<br> <p> Send test POSTs to '/post_node.php'.
	<br>Append '?response=reject' to the URL
	to have the server reject the POST.</p>
	<div class="container">
	<br>
	<form method="post">
    	<input type="submit" name="wipe" value="Clear old POSTs" /><br><br>
	</form>

	</div>
	<?php
		if(isset($_POST['wipe'])) 
		{
        file_put_contents("dump.txt","This is where test POSTs will show up!<br><br><pre>array('made by' => 'sam havens',
    'use freely' => 'be nice');</pre>");
    	}
    ?>

	<br><div class="container"><p> Don't reload the page, 
		<?php echo '<a href="' . $_SERVER['REQUEST_URI'] . '">click here instead!</a>'; ?>
	</p></div>

    <?php

		$dump = file_get_contents('dump.txt');
		echo $dump;
	?>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>