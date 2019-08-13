<?php

require 'db.php';
$sql = "Select * from courses";
$query = mysqli_query($connection, $sql);

while($row = mysqli_fetch_array($query)){

	$rows[] = $row;
	
}

echo json_encode($rows);

?>