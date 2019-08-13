<?php

require 'db.php';
$sql = "select * from courses_students";
$query = mysqli_query($connection, $sql);

while($row = mysqli_fetch_array($query)){

	$rows[] = $row;
	
}

print_r(json_encode($rows));

?>