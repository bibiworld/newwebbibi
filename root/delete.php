<meta http-equiv="Content-Type" content="text/html; charset=utf8" />

<?php
session_start();
include ("../conn/conn.php");
?>


<?php
$a = $_GET['name'];
if ($a){
	echo "$a"."<br />";
	$sql = "delete from bibi_word where spell='$a'";
	echo $sql;
	mysql_query($sql);
	echo "<script language='javascript'>
	alert('删除成功'); 
	window.location='delWord.php';
	</script>";
}
?>