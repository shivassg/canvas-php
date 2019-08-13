<?php 
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "shiva123";
$dBName = "canvas";
$connection = mysqli_connect($serverName, $dBUsername, $dBPassword , $dBName);

if(!$connection){
	die("Connection Failed:".mysqli_connect_error());
}

?>