<?php

#Extract Method to extract all values from the form
extract($_POST);

require 'db.php';

$sql = mysqli_query($connection, "INSERT INTO courses_students VALUES ($course_id, $student_id, '$student_term' , '$department_selection')");

if($sql){
	header('location:success.php') ;
}else{
	echo "Failed";  //Need to Hanlde to error messages
}
?>