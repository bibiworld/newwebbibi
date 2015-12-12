<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>无标题文档</title>

<?php
session_start();
include ("../conn/conn.php");
?>

<?php
function abslength($str)
{
    if(empty($str)){
        return 0;
    }
    if(function_exists('mb_strlen')){
        return mb_strlen($str,'utf-8');
    }
    else {
        preg_match_all("/./u", $str, $ar);
        return count($ar[0]);
    }
}
$i = 0;
$isOk = false;
function chkinput($str){
  $len = abslength($str);
  #echo "<br/>" . mb_strlen($str) . ' ' . $len . "<br />";
  $end = mb_substr($str, $len-1, 1);
  if (($str[0] == '[') && ($end == ']')){
	while($i < $len-1){
		$here = mb_substr($str, $i, 1);
		$next = mb_substr($str, $i+1, 1);
		#echo $here . "<br />" . $next . "<br />";
		if (($here == ']') && ($next != '['))
			return false;
		$i++;
	} 
	return true;
  }
  else{
  	return false;
  }
}
?>

<style type="text/css">
<!--
.STYLE1 {
	font-family: "华文琥珀";
	font-size: 36px;
}
.error {color: #FF0000;}
-->
</style>
</head>

<body>
<?php 
$nameErr = $epnErr = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if (empty($_POST["name"])){
		$nameErr = "Word spell is required!";
	}
	if (empty($_POST["epn"])){
		$epnErr = "Word explaination is required!";
	}
}
?>

<table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%"><div align="center" class="STYLE1">ADD WORD</div>
	<p align="center"><span class="error">* 必需的字段</span></p></td>
  </tr>
  <tr>
    <td><form id="form1" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<p align="left"><lable for = "name" >
			  拼写:
		      </label><br />
			<input name="name" type="text" id="name" size="35" />
			<span class = "error">* <?php echo $nameErr; ?></span>
			<br />eg : search</p>
			<p align="left"><lable for = "yinbiao">
			  音标:
		      </label><br />
			  <input name="yinbiao" type="text" size="35" />
			<br />eg : s??rt? </p>
			<p align="left"><lable for = "epn">
			  释义:</label><br />
			  <textarea name="epn" cols="36" rows="5"></textarea>
			  <span class = "error">* <?php echo $epnErr; ?></span>
			<br />
			eg : n.搜寻,探究v.搜寻,探求,调查</p>
		<p align="left"><lable for = "eg">
			例子:
			</label><br />
		  <textarea name="eg" cols="36" rows="5"></textarea>
			<br />
		  eg : [We|did|a|computer|search|for|blinder.][我们用电脑做了一次关于盲人的搜索。]</p>
			<div align="center">
	          <input type="submit" name="Submit" value="Submit" />
		</div>
    </form>    </td>
  </tr>
  <tr>
    <td>
  		<?php
		#提交表单中的单双引号
		$_name = mysql_real_escape_string($_POST['name']);
		$_yinbiao = mysql_real_escape_string($_POST['yinbiao']);
		$_epn = mysql_real_escape_string($_POST['epn']);
		$_eg = mysql_real_escape_string($_POST['eg']);
			  
		$isRight = (($nameErr == "") && ($epnErr == ""));
		if ((($_SERVER['REQUEST_METHOD'] == 'POST')) && ($isRight)){
		  $sql = "select * from bibi_word where '$_name' = spell";
		  #echo $sql . "<br />";
		  $result = mysql_query($sql);
		  if (mysql_num_rows($result) > 0)
			echo "Sorry, word had been added." . "<br />";
		  else{
			#echo $_POST['name'] . $_POST['yinbiao'] . $_POST['epn'] . $_POST['eg'];
			if (($_POST['eg'] != "") && (!chkinput($_POST['eg']))){
				echo "Eg Invalid Input , " . "<br />";
				echo "Square bracket should be used to cover the eg." . "<br />";
				echo "If there is more than one eg , you should seperate them with square bracket." . "<br />";
				echo "Here is the example:" . "<br />";
				echo "[this is a example for eg input.][这是一个例子输入的举例。]";
			}
			else{
			  
			  $add = "insert into bibi_word (spell, yinbiao, epn, eg) 
				values('$_name', '$_yinbiao', '$_epn', '$_eg')";
			  #echo $add . "<br />";
			  mysql_query($add) or die("insert Error. " . mysql_error());
			  
			  #在log文件中添加纪录
			  $fin = fopen("../log/addWord.txt",'a');
			  if (!$fin){
			  	echo "file to log add word doesn't exists!" . "<br />";
				exit;
			  }
			  $nowTime = date('Y-m-d H:i:s',time());
			  #echo $nowTime . "<br />";
			  $time = "Time : " . $nowTime;
			  $addedWord = "Word : " . $_name;
			  $add = $_name . ' ' . $_yinbiao . ' ' . $_epn . ' ' . $_eg;
			  #echo $time . " " . $addedTime . "<br />";
			  fwrite($fin, $time . " ");
			  fwrite($fin, $addedWord . "\n");
			  fwrite($fin, $add . "\n");
			  fclose($fin);
			  
			  echo "Sucessfully add!";
		  	}
		  }
		}
		?>    </td>
  </tr>
</table>
</body>
</html>
