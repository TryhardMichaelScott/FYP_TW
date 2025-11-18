<?php
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$database = "travelv2"; 

$con = mysqli_connect("$db_host", "$db_username", "$db_password", "$database");

if(!$con)
{
	die("連線失敗!!!!!");

	$ssql = "set names utf8";
	mysqli_query($con,$ssql);
}
?>