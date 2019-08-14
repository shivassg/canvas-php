<?php

require 'db.php';
extract($_POST);

$sql = mysqli_query($connection, "INSERT into courses_professors VALUES ($courseid_professor , $professorid , '$courseterm_professor' , '$professor_department')");
 if($sql){
	header('location:success.php');
}else{
	echo ("Failed") ; //Need to Hanlde to error messages
}

?>