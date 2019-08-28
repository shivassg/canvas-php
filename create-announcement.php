<?php

require 'db.php';
extract($_POST);

$sql = mysqli_query($connection, "INSERT into announcement VALUES (DEFAULT , '101' , DEFAULT , '$announcement_title' , '$announcement_message')");
 if($sql){
	header('location:success.php');
}else{
	echo ("Failed") ; //Need to Hanlde to error messages
}

?>