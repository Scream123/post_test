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

		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="sr-only">Toggle navigation</span>
	          </button>
	          <a class="navbar-brand" href="#">Test Post Node</a>
	        </div>

		    <div class="collapse navbar-collapse">
		      <ul class="nav navbar-nav">
		      	<li><a href="#instructions">Instructions</a></li>
		        <li><a href="#data">POSTed Data</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		      <li><a href="#form">Test form</a></li>
		        <li><a href="#what">What is this?</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->

	      </div>
	    </div> <!-- navbar -->

		<div class="jumbotron" id="instructions">
			<h1 class="main-header">Test POST node</h1><br>
			<h3>Instructions:</h3>
			<ul>
				<li>Send test POSTs to '/post_node.php'.</li>
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
	        file_put_contents("dump.txt","<pre><b><h4>POSTed data:</h4></b><br><br>('made by' => 'sam havens',\n'use freely' => 'be nice');</pre>");
	    	}
	    ?>

		<hr id="data">
		<br>
	    <?php

			$dump = file_get_contents('dump.txt');
			echo $dump;
		?>

		<div class="well" id="form">
		<h4>A Form to Use for Testing</h4>
			<form class="form-horizontal" role="form" id="urlform" method="post" action="/post_node.php">
			<div id="newfield"></div>
			  <div class="form-group">
			    <label for="addfield" class="col-sm-2 control-label">Field Name:</label>
			    <div class="col-sm-10">
			      <input type="text" class="col-md-4" id="addfield" name="addfield">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-10">
			      <button class="btn btn-default" id="addfieldbutton">Add Field</button>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-10">
			      <button class="btn btn-primary" type="submit">POST to /post_node.php</button>
			    </div>
			  </div>
			</form>
		</div>

		<div class="well" id="what">
			<p><h4>Test POST node</h4>The test POST node allows you to test a POST (of the HTTP variety) before use in production
			(for example, when you have a client's API to interface with, and they don't have a testing interface).
			Everything sent to /post_node.php will show up here.</p>
			<p>The GET parameter 'response' accepts the value 'reject', which causes the POST node to return a 
			response of 500 (Internal Server Error). It will not actually reject the POST; it will still show up here.</p>
			<p>Get your own <a href="https://github.com/samhavens/post_test">on GitHub!</a></p>
		</div>

	</div> <!-- /container -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>