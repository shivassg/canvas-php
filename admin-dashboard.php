<?php
session_start();
$session= $_SESSION['username'];
if(empty($session)){
  header('location:index.php');
}

require 'db.php';
$query = "SELECT DISTINCT department from courses";
$result = mysqli_query($connection, $query);


?>

<!DOCTYPE html>
<html>
   <head>
      <title> Admin Dashboard </title>
      <meta charset="utf-8">
      <link rel = "shortcuticon" href="">


      <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
      
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

      <link rel="stylesheet" href ="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src ="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

      <link rel = //cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css>

      <style>
         *{
         margin: 0;
         padding: 0;
         }
         body{
         background-color: white;
         font-family: Nunito, sans-serif;
         }
         .site-head{
         background-color: #6f42c1; /*purple color*/
         }
         .nav-link{
         color: #CBBDE2;
         }
         .nav-link:hover{
         color: #FFFFFF;
         }
         .navbar-brand{
         color: #FFFFFF ;
         }
         .my-brand{
         color: #FFFFFF !important;
         }
         .footer{
         position: absolute;
         margin: auto;
         bottom: 0;
         height: 50px;
         width: 100%;
         background-color: #F1F1F1
         }

         .welcome-note{
            text-align: right;
         }
      </style>
   </head>
   <body>
      <nav class = "navbar navbar-expand-sm nav-dark site-head">
         <a class = "navbar-brand my-brand">UB</a>
         <ul class = "navbar-nav">
            <li class="nav-item active"  >
               <a class = "nav-link" href="#"> Dashboard </a>
            </li> 

            <li class = "nav-item">
               <a class = "nav-link" href="contact.html"> Inbox </a>
            </li>
            <li class = "nav-item">
               <a class = "nav-link" href="contact.html"> Profile </a>
            </li>
            <li class = "nav-item " >
               <a class = "nav-link" href = "logout.php"> Log out </a>
            </li>
         </ul>
      </nav>

      <div class = "container">

        <div class ="row text-center">  
         <div class = "col-md-4">
          <button type ="button"
          class ="btn btn-info btn-sm" data-toggle="modal" data-target=".new-course"> Add new course </button>
          </div>
         <div class = "col-md-4">
        <button type ="button"
          class ="btn btn-info btn-sm" data-toggle="modal" data-target=".new-student"> Add student </button>
        </div>
        <div class = "col-md-4">
        <button type ="button"
          class ="btn btn-info btn-sm" data-toggle="modal" data-target=".new-professor"> Add Professor </button>
       </div>
     </div>

        <ul class = "nav nav-tabs">
          <li class ="nav-item" id = "courses-table-click"> <a class = "active nav-link" href = "#course-table">Courses</a></li>
         <li class ="nav-item" id = "student-table-click"> <a class = "nav-link" href = "#students-table" >Students</a> </li>
         <li class ="nav-item"> <a class = "nav-link" href = "#professors-table"> Professors </a></li>

        </ul>
         <!--  <table class = "coursetable" id="course-table" style="width:100%" cellspacing="0">
            <thead>
               <th> Course ID </th>
               <th> Course Name </th>
               <th> Course Level </th>
               <th> Credits </th>
               <th> Department </th>
               <th> </th>
            </thead>
         </table> -->
         <table class = "studenttable" id="student-table" style="width:100%" cellspacing="0">
            <thead>
               <th> Course ID </th>
               <th> UB ID </th>
               <th> Term </th>
               <th> </th>
            </thead>
         </table>
      </div>

      <!--Add Course Modal -->

      <div class="modal new-course" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-left">New Course</h5>
        <button type="button" class="close text-right" data-dismiss="modal">&times;</button>
      </div>

            <div class= "container ">
            <form class="form-horizontal" action='newcourse.php' method="POST">


     <div class="control-group">
      <label>CourseID</label>
      <div class="controls">
        <input type="number" id="courseid" name="courseid" placeholder="" class="input-xlarge">
      </div>
    </div>
 
    <div class="control-group">
      <label class="control-label" >Course name</label>
      <div class="controls">
        <input type="text" id="coursename" name="coursename" placeholder="" class="input-xlarge" required>
        <!-- <p class="help-block">Please provide your E-mail</p> -->
      </div>
    </div>
 
    <div class="control-group">
      <label class="control-label" >Course level</label>
      <div class="controls">
        <input type="text" id="courselevel" name="courselevel" placeholder="" class="input-xlarge" required>
        <!-- <p class="help-block">Password should be at least 4 characters</p> -->
      </div>
    </div>
 
    <div class="control-group">
      <label class="control-label">Credits</label>
      <div class="controls">
        <input type="number" id="credits" name="credits" placeholder="" class="input-xlarge" required>
        <!-- <p class="help-block">Please confirm password</p> -->
      </div>
    </div>

    <div class="control-group">
      <label class="control-label">Department</label>
      <div class="controls">
        <!-- <input type="text"  id="department" name="department" placeholder="" class="input-xlarge" required> -->
        <!-- <p class="help-block">Please confirm password</p> -->
      <select name = "department">
        <!-- Hardcoding the department values for now. Need to retrieve from DB later-->
        <option> Computer Science </option>
        <option> Electricals </option> 
        <option> Mechanical </option>
      </select>
      </div>
    </div>

    <div class = "modal-footer">
        <button type="submit" class="btn btn-success">Submit</button>
   </div>


 </form>
 
   </div>


          </div>
        </div>
      </div>


      <!-- Adding student modal -->

      <div class="modal new-student" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-left">Add Student to Course</h5>
        <button type="button" class="close text-right" data-dismiss="modal">&times;</button>
      </div>

            <div class= "container ">
            <form class="form-horizontal" action='newcourse.php' method="POST">

    <div class = "control-group">
      <label> Department </label>
      <div class = "controls">
       <select name = "department-selection" id="department-selection" onselect = "loadCourseid()">
          <?php
          while($row = mysqli_fetch_assoc($result)){
            echo "<option>". $row['department']. "</option>";
          }
          ?>
       </select> 
      </div>

    </div>

     <div class="control-group">
      <label>CourseID</label>
      <div class="controls">
       <!--  <input type="number" id="courseid" name="courseid" placeholder="" class="input-xlarge"> -->
       <!-- <select>
        </select> -->
      </div>
    </div>
 
    <div class="control-group">
      <label class="control-label" >Student ID</label>
      <div class="controls">
        <input type="text" id="coursename" name="coursename" placeholder="" class="input-xlarge" required>
        <!-- <p class="help-block">Please provide your E-mail</p> -->
      </div>
    </div>
 
    <div class="control-group">
      <label class="control-label" >Term</label>
      <div class="controls">
        <input type="text" id="courselevel" name="courselevel" placeholder="" class="input-xlarge" required>
        <!-- <p class="help-block">Password should be at least 4 characters</p> -->
      </div>
    </div>
 
    <div class = "modal-footer">
        <button type="submit" class="btn btn-success">Submit</button>
   </div>


 </form>
 
   </div>


          </div>
        </div>
      </div>


<script type = "text/javascript" >

var editor;
document.getElementById("student-table-click").addEventListener("click", viewStudent, false);
document.getElementById("courses-table-click").addEventListener("click", viewCourses, false);

function viewStudent() {

    $('#course-table').hide();
    $('#student-table').show();

    //View students in the course in the admin dashboard
     $("#student-table").DataTable({

        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false,
        "ajax": {
            "url": "student-fetch.php",
            "dataSrc": ""
        },
        "columns": [{
                "data": "courseid"
            },
            {
                "data": "studentid"
            },
            {
                "data": "term"
            },
            {
                data: null,
                className: "center",
                defaultContent: '<a href="" class="editor_edit">Edit</a> / <a href="" class="editor_remove">Delete</a>'
            }
        ]
    });


}
//To load course ids based on department selection in the add new student to the course form
function loadCourseid(){
  var selectedDepartment = document.getElementById("department-selection").value;
}

function viewCourses() {
    $('#course-table').show();
    $('#student-table').hide();
}

$(document).ready(function() {


    $('#student-table').hide();

    // Edit record
    $('#course-table').on('click', 'a.editor_edit', function(e) {
        e.preventDefault();

        editor.edit($(this).closest('tr'), {
            title: 'Edit record',
            buttons: 'Update'
        });
    });

    // Delete a record
    $('#course-table').on('click', 'a.editor_remove', function(e) {
        e.preventDefault();

        editor.remove($(this).closest('tr'), {
            title: 'Delete record',
            message: 'Are you sure you wish to remove this record?',
            buttons: 'Delete'
        });
    });


    //View course table in admin dashboard
    $("#course-table").DataTable({

        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false,
        "ajax": {
            "url": "fetch.php",
            "dataSrc": ""
        },
        "bDestroy": true,
        "columns": [{
                "data": "CourseID"
            },
            {
                "data": "CourseName"
            },
            {
                "data": "CourseLevel"
            },
            {
                "data": "Credits"
            },
            {
                "data": "Department"
            },
            {
                data: null,
                className: "center",
                defaultContent: '<a href="" class="editor_edit">Edit</a> / <a href="" class="editor_remove">Delete</a>'
            }
        ]
    });


});




</script>

     <!--  <footer class = "footer">
         <p > Sample website developed by Shiva Shankar Ganesan</p>
      </footer> -->
   </body>
</html>