<?php 
extract($_POST);
if(isset($_POST['CourseID'])){
  require 'db.php';
  $select = mysqli_query($connection, "DELETE FROM `courses` WHERE `courses`.`CourseID` = $CourseID");
  if($select) {
    echo "Course Successfully deleted!";
  }
}
?>