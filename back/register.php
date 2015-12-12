<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>

<style type="text/css">
<!--
.error {color: #FF0000;}
.STYLE1 {
	font-family: "华文琥珀";
	font-size: 36px;
}
body,td,th {
	color: #eee;
}
body {
	background-color: #555;
	background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAB9JREFUeNpi/P//PwM6YGLAAuCCmpqacC2MRGsHCDAA+fIHfeQbO8kAAAAASUVORK5CYII=);
}
-->
</style>
</head>

<?php
include("conn/conn.php");
#session_start();
?>
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
<?php
$name = $pwd = $tishi = "";
$nameErr = $pwdErr = $tishiErr = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if (empty($_POST["name"])){
		$nameErr = "Account name is required!";
	}
	if (empty($_POST["pwd"])){
		$pwdErr = "Password is required!";
	}
	if (empty($_POST["tishi"])){
		$tishiErr = "be useful while forgetting password!";
	}
}
?>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center" class="STYLE1">
      <div align="left">用户注册</div>
    </div>
	<p><span class="error">* 必需的字段</span></p></td>
  </tr>
  <tr>
    <td><form id="form1" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="12%" height="30" ><label>用户名：</label></td>
          <td width="88%" height="30"><label>
            <input type="text" name="name" id="username" />
          </label>
            <span class='error'>* <?php echo $nameErr; ?></span>
			<button onClick="chkName()" type="button">检查</button></td>
        </tr>
        <tr>
          <td height="30"><label>密码：</label></td>
          <td height="30"><label>
            <input type="password" name="pwd" />
          </label>
            <span class='error'>* <?php echo $pwdErr; ?></span></td>
        </tr>
        <tr>
          <td height="30"><label>提示：</label></td>
          <td height="30"><label>
            <input name="tishi" type="text" value="忘记密码" />
          </label>
            <span class='error'>* <?php echo $tishiErr; ?></span></td>
        </tr>
        <tr>
          <td colspan="2"><label>

              <div align="left">
                <input type="submit" name="Submit" value="提交" />
              </div>
            </label></td>
          </tr>
      </table>
        </form>
    </td>
  </tr>
	<tr><td>
	  <?php
	  #提交表单的数据
	  $_name = mysql_real_escape_string($_POST['name']);
	  $_pwd = mysql_real_escape_string($_POST['pwd']);
	  $_tishi = mysql_real_escape_string($_POST['tishi']);
	  
	  $isRight = (($nameErr == "") && ($pwdErr == "") && ($tishiErr == ""));
	  if (($_SERVER['REQUEST_METHOD'] == "POST") && ($isRight))
	  {
	  	$sql = "select * from bibi_admin where name = '$_name'";
		$result = mysql_query($sql);
		if (mysql_num_rows($result) > 0){
			echo "The account name has been existed.";
		}
		else{
			$sql = "insert into bibi_admin (name, pwd, tishi)
				values('$_name', '$_pwd', '$_tishi')";
			mysql_query($sql) or die("add account Failed." . mysql_error());
			echo "Successfully added!";
			
			$fin = fopen("log/addUser.txt",'a');
			if (!$fin){
				echo "Log file error open";
				exit;
			}
			$nowTime = date('Y-m-d H:i:s',time());
			#echo $nowTime . "<br />";
			$time = "Time : " . $nowTime;
			$addedname = "Name : " . $_name;
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
