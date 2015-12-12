<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search</title>
<?php
include ("conn/conn.php");

?>
</head>

<body>
	<?php
		if ($GuestName == "guest")
			echo "Please login first!" . "</ br>";
		else{
	?>
 			<h3 class="sub-header"> Account Info: <?php  echo $GuestName;?></h3>
 			<h6 > <a href="#"> Modify Account Name</a> </h6>
 			<h6 > <a href="#"> Modify Password</a> </h6>
 			<h3 class="sub-header"> Function : </h3>
	<?php
			if ($GuestName == "root"){
				echo "<a href='#'>Add Word</a>" . "</ br>";
			}
			else{
			}
		}
	?>
</body>
</html>