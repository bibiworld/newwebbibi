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

    <title>Signin</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/signin.css" rel="stylesheet">

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
//session_destroy();
include ("conn/conn.php");
?>
  </head>

  <body>

    <div class="container">

      <form action="checkusrlogin.php" method="post" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="userName" class="sr-only">Account name</label>
		<input name="username" class="form-control" type="text" id="userName" size="18" placeholder="Account name" required autofocus>
        <label for="passwd" class="sr-only">Password</label>
		<input name="userpwd" class="form-control" type="password" id="passwd" size="18" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
		
	    
        <div align="left">
          <input class="btn btn-lg btn-primary btn-block" type="submit" name="Submit" value="Sign in" />
          <a href="register.php" target='' class="href.css/a">Sign up</a>   
		  &nbsp
		  <a href="getPasswd.php" target='_self' class="href.css/a">Forget Password</a>          </div>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
