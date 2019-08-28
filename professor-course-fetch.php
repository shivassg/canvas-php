<?php
/*
Fetching courses for the logged in professor 
*/

require 'db.php';
 
$professorid = 1056083;



//$sql = "SELECT courseid, term, department FROM courses_professors WHERE ubid = $professorid";
$sql= "SELECT courses_professors.courseid, courses.CourseName, courses.CourseLevel, courses_professors.department FROM courses_professors INNER JOIN courses ON courses_professors.courseid = courses.CourseID WHERE courses_professors.ubid = $professorid";
$result = mysqli_query( $connection , $sql);
$resultCheck = mysqli_num_rows($result);
//echo $resultCheck;

if($resultCheck > 0){
    while($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }
}else{
    echo "";
}

echo json_encode($rows);
?>