<?php

require 'db.php';

extract($_POST);
$sql = "SELECT CourseID from courses WHERE department='$department'";
$query = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_array($query)) {

	$rows[] = $row;

}

echo json_encode($rows);
?>