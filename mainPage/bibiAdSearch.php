<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="file:///E|/favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="file:///E|/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php
  	session_start();
	if (isset($_SESSION['username']))  { 
  		$GuestName = $_SESSION['username'];
	}
	else
		$GuestName = "guest";
?>
  <style type="text/css">
	<!--
	.fixFont {
	color: #0099FF;
	font-size: 16px;
}
	-->
	</style>
  </head>

  <body >

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>          </button>
          <a class="navbar-brand" href="#">BIBIWORLD <label class="fixFont">Welcome, <?php echo $GuestName;?>!</label></a> 
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Search</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="../signup.php">SIGNUP</a></li>
			<?php
				if ($GuestName == "guest")
            		echo '<li><a href="../signin.php">SIGNIN</a></li>';
				else
					echo '<li><a href="../reload.php">LOGOUT</a></li>';
          	?>
		  </ul>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Dashboard <span class="sr-only">(current)</span></a></li>
            <li><a href="bibiInfo.php">Info</a></li>
			<?php
				if ($GuestName != 'root'){
            		echo '<li><a href="bibiWordbook.php">Wordbook</a></li>';
            		echo '<li><a href="bibiLog.php">Log</a></li>';
          		}
				else{
					echo '<li><a href="bibiFunction.php">Function</a></li>';
				}
			?>
		  </ul>
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Search</a></li>
            <li><a href="bibiSearch.php">Search</a></li>
            <li><a href="bibiAdSearch.php">Advanced Search</a></li>
            <li><a href="bibiFuzzyMatch.php">Fuzzy Matching</a></li>
          </ul>
        </div>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		
         <div id="AdSearch">
		  <?php
		  	echo "<h1 class=" . "sub-header" . ">AdSearch</h1>";
		  	include ("../AdSearch.php");
		  ?>
		 </div>
		</div>
		
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="file:///E|/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="file:///E|/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
