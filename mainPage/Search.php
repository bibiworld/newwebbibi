<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search</title>
<?php
include ("../conn/conn.php");

?>
</head>

<body>
    <form id="form1" name="form1" method="post" class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div align="left">
        <input name="searchword" type="text" placeholder="Search here..." id="SearchField"  />
		<button type="submit" >Search</button>
      </div>
    </form>
	<?php
	  if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		$sql = "select * from bibi_word
		 where '{$_POST['searchword']}' = spell " ;
		$result = mysql_query($sql);
		
		if (mysql_num_rows($result) < 1)
			echo "Sorry, can not find this word.";
		else
		{
		  while ($row = mysql_fetch_array($result))
		  {
			echo "<tr><td class='title'>".$row['spell']."  [/".$row['yinbiao']."/]<br /></td></tr>";
			echo "<tr><td class='arbo'>".$row['epn'] . "<br /></td></tr>";
			$eg = $row['eg'];
			$eg = str_replace("|", " ", $eg);
			$i = 0;
			$j = 0;
			$num = 0;
			#$arr = array();
			while(($i < strlen($eg)) && ($eg[$i] == '[')){
				$i = $i +1;
				while ($eg[$j] != ']'){
					$j = $j + 1;
				}
				$arr[$num] = substr($eg, $i, $j-$i);
				$j = $j + 1;
				$i = $j;
				$num = $num + 1;
			}
			echo "<tr><td class='arbo'>";
			#echo count($arr);
			for ($k = 0; $k < count($arr); $k++){
				echo $arr[$k]."<br />";
			}
			echo "</td></tr>";
			#echo "<tr><td class='arbo'>".$eg . "</td></tr>";
			echo "</td><td>";
			$filename = "../data/image/imgcombination/{$_POST['searchword']}.";
			$file1 = $filename."jpg";
			$file2 = $filename."png";
			#echo $filename, $file1;
			#	echo "<img src='./data/image/imgcombination/{$_POST['searchword']}.jpg'>";
			if (file_exists($file1)){
				#echo "<img src= '$filename jpg'>";
				echo "<img src='../data/image/imgcombination/{$_POST['searchword']}.jpg'>";
			}
			if (file_exists($file2))
			{
				echo "<img src='../data/image/imgcombination/{$_POST['searchword']}.png'>";
			}
			echo "</td></tr>";
		  }
		}
	  }
	?>
</body>
</html>
