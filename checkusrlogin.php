<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>无标题文档</title>
</head>

<?php
include ("conn/conn.php");
$username = $_POST['username'];
$userpwd  = $_POST['userpwd'];
#echo $username , $userpwd;

?>


<body>

<?php
$sql = "select * from bibi_admin
		where name = '{$username}'";
$result = mysql_query($sql);
$info = mysql_fetch_array($result);

#echo "get this1";
#echo $result;
#echo (mysql_num_rows($result) < 1);
if ($info == false){
	echo "<script language='javascript'>alert('No account name!');history.back();</script>";
	#echo "error!";
	exit;
}

if ($info['pwd'] != $userpwd){
	echo "<script language = \"javascript\">alert(\"Password is wrong!\");history.back(); </script>";
	exit;
}
else{
	session_start();
	$_SESSION['username'] = $info['name'];
	#session_register("
	header("location:index.php");
	exit;
}
?>

</body>
</html>
