<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>无标题文档</title>

<?php
session_start();
include ("../conn/conn.php");
?>



<script language="javascript">
function delWord(word)
{
	//var word = document.getElementById("name").value;
	window.location = "delete.php?name="+word;
	//alert( username);
	
}

function fresh()
{
	window.location = "delWord.php";
	//location.replace(location.href);
	//history.go(0);
}
</script>

<style type="text/css">
<!--
.STYLE1 {
	font-family: "华文琥珀";
	font-size: 36px;
}
-->
</style>
</head>

<body>
<table width="260" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center" class="STYLE1">DEL WORD </div></td>
  </tr>
  <tr>
    <td><form id="form1" name="form1" method="post" action="">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="30"><label>
            <div align="center">单词：
              <input type="text" name="name" id="name"/>
              </div>
          </label></td>
        </tr>
		<tr>
			<td><div align="center">
		<?php
		#提及表单中数据
		$_name = mysql_real_escape_string($_POST['name']);
		
        if ($_SERVER['REQUEST_METHOD'] != 'POST')
            echo "<input type='submit' name='Submit' value='删除' />";
		else{
			$sql = "select * from bibi_word where spell = '$_name'";
			$result = mysql_query($sql);
			if (mysql_num_rows($result) == 0){
				echo "Sorry, there is no word in database." . "<br />";
				echo "<button type='button' onClick='fresh()'>确定</button>";
				#echo "<input type='reset' name='button' id='button' value='确定' />";
			}
			else{
				while($row = mysql_fetch_array($result)){
					echo '['.$row['spell'].']'.'['.$row['yinbiao'].']'.'['.$row['epn'].']'.$row['eg']."<br />";
				}
				#echo "<button typ" . "&nbsp;";
				#echo "<button type='submit' onClick=''>确定删除？</button>";
				echo "<button type='button' onClick='delWord($_name)'>确定删除？</button>";
				echo "<button type='button' onClick='fresh()'>取消</button>";
			}
		}
		?>
          	</div></td>
        </tr>
      </table>
      <label></label>
    </form></td>
  </tr>
</table>
</body>
</html>
