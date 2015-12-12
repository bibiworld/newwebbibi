<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

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
<script type="text/javascript">
  function display(y){
    //var elems = document.getElementsByTagName("*");
	var list = ["Search", "AdSearch", "FuzzyMatch", "Info", "Wordbook", "Log", "fucntion"];
	
	for(var i=0;i<7;i++){
	  //alert("elem tri");
	  //alert(lists[i]);
	  if (list[i] == y){
	    $(list[i]).style.display = "";
	  }
	  else{
	      $(list[i]).style.display = "none";
	  }
	} 
  } 
  function $(s){
	  return document.getElementById(s);
  } 
</script>
  <style type="text/css">
	<!--
	.fixFont {
	color: #0099FF;
	font-size: 16px;
}
	-->
	</style>
  </head>

  <body onLoad="display('Search')">

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">BIBIWORLD <label class="fixFont">Welcome, <?php echo $GuestName;?>!</label></a> 
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Search</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="signup.php">SIGNUP</a></li>
            <li><a href="signin.php">SIGNIN</a></li>
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
            <li><a href="#" onClick="display('Info')">Info</a></li>
			<?php
				if ($GuestName != 'root'){
            		echo '<li><a href="#" onClick="display(' . 'Wordbook' . ')">Wordbook</a></li>';
            		echo '<li><a href="#" onClick="display(' . 'Log' . ')">Log</a></li>';
          		}
				else{
					echo '<li><a href="#" onClick="display(' . 'Function' . ')">Function</a></li>';
				}
			?>
		  </ul>
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Search</a></li>
            <li><a href="#" onClick="display('Search')">Search</a></li>
            <li><a href="#" onClick="display('AdSearch')">Advanced Search</a></li>
            <li><a href="#" onClick="display('FuzzyMatch')">Fuzzy Matching</a></li>
          </ul>
        </div>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		 <div id="Search">
		  <h1 class="page-header">BIBISearch</h1>
		  <?php
		  	include ("Search.php");
		  ?>
         </div>
		
         <div id="AdSearch">
		  <?php
		  	echo "<h1 class=" . "sub-header" . ">AdSearch</h1>";
		  	include ("AdSearch.php");
		  ?>
		 </div>
		
         <div id="FuzzyMatch">
		  <h1 class="sub-header">Fuzzy Match</h1>
		  <?php
		  	include ("FuzzyMatch.php");
		  ?>
		 </div>
		
         <div id="Info">
		  <h1 class="sub-header">Infomation</h1>
		  <?php
		  	include ("accountinfo/info.php");
		  ?>
		 </div>
		
         <div id="Wordbook">
		  <h1 class="sub-header">Wordbook</h1>
		  <?php
		  	include ("accountinfo/Wordbook.php");
		  ?>
		 </div>
		
         <div id="Log">
		  <h1 class="sub-header">Search History</h1>
		  <?php
		  	include ("accountinfo/Log.php");
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
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
