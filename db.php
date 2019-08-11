<?php 
$serverName = "localhost";
$username = "";
$password = "shankar083";
$dbname = "canvas";
$connection = mysqli_connect($serverName, $username, $password ,$dbname);

if(!$connection){
	die("Connection not established");
}else{
	echo "Success";
}

?>