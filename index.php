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
		<div class="jumbotron">
			<h1 class="main-header">Test POST node</h1><br>
			<h3>Instructions:</h3>
			<ul>
				<li> Send test POSTs to '/post_node.php'.</li>
				<li>Append '?response=reject' to the URL to have the server reject the POST.</li>
			</ul>
		</div>

		<div class="well" style="max-width: 50%; margin: 0 auto 10px;">
			<br>
				<?php echo '<a class="btn btn-primary btn-lg btn-block" href="' . $_SERVER['REQUEST_URI'] . 
				'">Don\'t reload the page; click here instead!</a>'; ?>
			<br>

			<br>
			<form method="post">
		    	<button type="submit" name="wipe" value="Clear old POSTs" class="btn btn-danger btn-lg btn-block">
		    	Clear old Posts</button><br><br>
			</form>
		</div>

		<?php
			if(isset($_POST['wipe'])) 
			{
	        file_put_contents("dump.txt","<h4>This is where test POSTs will show up!</h4><br><br><pre>array('made by' => 'sam havens',
	    'use freely' => 'be nice');</pre>");
	    	}
	    ?>

		<hr>
		<br>
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