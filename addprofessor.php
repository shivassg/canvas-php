<?php

require 'db.php';
extract($_POST);

 $sql = mysqli_query($connection, "INSERT into courses_professors VALUES ($courseid_professor , $professorid , '$courseterm_professor' , '$professordept')");
 if($sql){
	echo "Sucessfully assigned course to professor";
}

?>