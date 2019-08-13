<?php

#Extract Method to extract all values from the form
extract($_POST);

require 'db.php';

$sql = mysqli_query($connection, "INSERT INTO courses VALUES ($courseid, '$coursename', '$courselevel' , $credits, '$department')");

if($sql){
	echo "Success";
}

?>

