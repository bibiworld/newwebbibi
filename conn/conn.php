<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$conn = mysql_connect("localhost", "root", "bibiworld");
if (!$conn)
{
	die("Could not connect : " . mysql_error());
}
mysql_select_db("bibidata", $conn) or die("DATABASE bibidata error".mysql_error());

?>