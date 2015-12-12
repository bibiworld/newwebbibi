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
error_reporting(0);
session_start();
//session_destroy();
include ("conn/conn.php");
$name = $message = $email = $pwd = "";
?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
  
  <script language="javascript">
//<!--
function chkName()
{
	var name = document.getElementById("username").value;
	//window.open("checkusrreg.php?name='dfefef'", 'newframe', "width=300, height=20, left=500, top=200, menubar=no, toolbar=no, location=no, scrollbars=no");
	window.open("checkusrreg.php?name="+name, "newframe", "width=300, height=20, left=500,top=200,menubar=0,toolbar=0, location=0, scrollbars=0");
}
//--->
</script>

<body>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <div class="container">
    <div class="row">
        <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Enter Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Enter Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="InputEmailFirst" name="InputEmail" placeholder="Enter Email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Confirm Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="InputEmailSecond" name="InputEmail" placeholder="Confirm Email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
				<div class="form-group">
                    <label for="InputEmail">Enter Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="InputPassword" name="InputPassword" placeholder="Enter Password" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputMessage">Enter Message</label>
                    <div class="input-group">
                        <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
				<?php
					if (($_SERVER['REQUEST_METHOD'] == "POST"))
						echo "<a href = 'index.php'>BackToHomePage</a>";
				?>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
        <div class="col-lg-5 col-md-push-1">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span> Success! Message sent.</strong>
                </div>
                <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-remove"></span><strong> Error! Please check all page inputs.</strong>
                </div>
            </div>
        </div>
    </div>
</div>
	<tr><td>
	  <?php
	  if (($_SERVER['REQUEST_METHOD'] == "POST"))
	  {
	  #提交表单的数据
	  $name = mysql_real_escape_string($_POST['InputName']);
	  $pwd = mysql_real_escape_string($_POST['InputPassword']);
	  $message = mysql_real_escape_string($_POST['InputMessage']);
	  $email = mysql_real_escape_string($_POST['InputEmail']);
	  
	  	$sql = "select * from bibi_admin where name = '$name'";
		$result = mysql_query($sql);
		if (mysql_num_rows($result) > 0){
			echo "The account name has been registed.";
		}
		else{
			$sql = "insert into bibi_admin (name, pwd, tishi, email)
				values('$name', '$pwd', '$message', '$email')";
			mysql_query($sql) or die("add account Failed." . mysql_error());
			echo '[ <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span> Success! Message sent.</strong>
                </div>';
			#echo "<alert>Success registe!</alert>";
			
			$fin = fopen("log/addUser.txt",'a');
			if (!$fin){
				echo "Log file error open";
				exit;
			}
			$nowTime = date('Y-m-d H:i:s',time());
			#echo $nowTime . "<br />";
			$time = "Time : " . $nowTime;
			$addedname = "Name : " . $name;
			fwrite($fin, $time . ' ');
			fwrite($fin, $addedname . "\n");
			fclose($fin);
		}
	  }
	  ?>
	  </td>
  </tr>
</table>
</body>
</html> 