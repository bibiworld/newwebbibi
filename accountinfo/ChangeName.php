<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
<?php
	session_start();
	$GuestName = $_SESSION['username'];
?>
</head>

<body>
	<form class="navbar-form navbar-right" method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<input type='text' id = "name" class="form-control" />
		<input type='button' value="提交" />
	</form>
<?php
	if (($_SERVER['REQUEST_METHOD'] == 'POST')){
		$newName = $_POST['name'];
		$sql = "updata bibi_admin set name = '$newName' where name = $_SESSION['username']";
		mysql_query($sql);
	}
?>
	<button onclick="back()"> 返回 </button>
</body>
</html>
