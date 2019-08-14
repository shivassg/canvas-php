<?php
session_start();
$session = $_SESSION['username'];
if (empty($session)) {
  header('location:index.php');
}

require 'db.php';
$query = "SELECT DISTINCT department from courses";
$result = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($result)){
  $rows[] = $row;
}

?>

<!DOCTYPE html>
<html>
   <head>
      <title> Admin Dashboard </title>
      <meta charset="utf-8">
      <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

      <link rel="stylesheet" href ="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src ="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-12/css/all.css">
      <link rel="stylesheet" href="css/style.css">


    
   </head>
   <body>
   
      <nav class = "navbar navbar-expand-sm nav-dark site-head">
  
         <a class = "navbar-brand my-brand">UB</a>

         <ul class = "navbar-nav  navbarlist">
            <li class="nav-item " >
               <a class = "nav-link active" href="#"> Dashboard </a>
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
      
        <div class ="row text-center add-buttons">
         <div class = "col-md-4">
          <button type ="button"
          class ="btn btn-info btn-sm" data-toggle="modal" data-target=".new-course"><i class="fas fa-book"></i> Add new course </button>
          </div>
         <div class = "col-md-4">
        <button type ="button"
          class ="btn btn-info btn-sm" data-toggle="modal" data-target=".new-student"><i class="fas fa-user-graduate"></i> Add student </button>
        </div>
        <div class = "col-md-4">
        <button type ="button"
          class ="btn btn-info btn-sm" data-toggle="modal" data-target="#new-professor"><i class="fas fa-user"></i> Add Professor </button>
       </div>
     </div>

        <ul class = "nav nav-tabs">
          <li class ="nav-item" id = "courses-table-click"> <a class = "active nav-link" href = "#course-table">Courses</a></li>
         <li class ="nav-item" id = "student-table-click"> <a class = "nav-link" href = "#students-table" >Students</a> </li>
         <li class ="nav-item"> <a class = "nav-link" href = "#professors-table"> Professors </a></li>

        </ul>
          <table class = "coursetable" id="course-table" style="width:100%" cellspacing="0">
            <thead>
               <th> Course ID </th>
               <th> Course Name </th>
               <th> Course Level </th>
               <th> Credits </th>
               <th> Department </th>
               <th> </th>
            </thead>
         </table>
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
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header bg-info">
               <h5 class="modal-title text-left text-white">New Course</h5>
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
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header bg-info">
               <h5 class="modal-title text-left text-white">Add Student to Course</h5>
        <button type="button" class="close text-right" data-dismiss="modal">&times;</button>
      </div>

            <div class= "container ">
            <form class="form-horizontal" action='addcourse-student.php' method="POST">

    <div class = "control-group">
      <label> Department </label>
      <div class = "controls">
       <select name = "department_selection" id="department-selection">
        <option selected disabled > Select Department </option>
          <?php

              foreach ($rows as $key => $value) {
              echo '<option value="' . $value['department'] . '">' . $value['department'] . '</option>';
              }
          ?>
       </select>
      </div>

    </div>

     <div class="control-group">
      <label>CourseID</label>
      <div class="controls">
        <select name= "course_id" id = "course_id">
          <option selected disabled> Select Course ID </option>
        </select>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" >Student ID</label>
      <div class="controls">
        <input type="text" id="student_id" name="student_id" placeholder="" class="input-xlarge" required>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" >Term</label>
      <div class="controls">
        <input type="text" id="student_term" name="student_term" placeholder="" class="input-xlarge" required>
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
<!-- Adding student modal ends -->
    

<!--Add Professor Modal-->

      <div class = "modal new-professor" id = "new-professor">
        <div class="modal-dialog modal-md">
          <div class= "modal-content">


            <!--Modal Header-->
            <div class="modal-header bg-info">
                  <h5 class="modal-title text-left text-white">Add Professor to Course</h5>
                  <button type="button" class="close text-right" data-dismiss="modal">&times;</button>
            </div> 

            <!--Modal Container -->
            <div class= "container ">
                  <form class="form-horizontal" action = "addprofessor.php" method="POST">
                     <div class = "control-group">
                        <label> Department </label>
                        <div class = "controls">
                          <select name = "professor_department" id = "professor_department">
                            <option selected disabled > Select Department </option>
                             <?php
                             foreach ($rows as $key => $value) {
                              echo '<option value="' . $value['department'] . '">' . $value['department'] . '</option>';
                                 }
                             ?>
                          </select>
                        </div>
                     </div>

                     <div class="control-group">
                        <label>CourseID</label>
                        <div class="controls">
                        <select name= "courseid_professor" id="course_id_professor">
                        <option selected disabled> Select Course ID </option>
                        </select>
                        </div>
                     </div>

                     <div class="control-group">
                        <label class="control-label" >Professor UB ID</label>
                        <div class="controls">
                           <input type="text" id="professor-ubid" name="professorid" placeholder="" class="input-xlarge" required>
                           <!-- <p class="help-block">Please provide your E-mail</p> -->
                        </div>
                     </div>
                     <div class="control-group">
                        <label class="control-label" >Term</label>
                        <div class="controls">
                           <input type="text" id="courseterm_professor" name="courseterm_professor" placeholder="" class="input-xlarge" required>
                           <!-- <p class="help-block">Password should be at least 4 characters</p> -->
                        </div>
                     </div>
                     <div class = "modal-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                     </div>
                  </form>
               </div>


          </div> <!--modal content-->
        </div> <!--Modal Dialog-->
      </div> <!--Modal-->
      
<!--Add Professor modal ends-->


<script type = "text/javascript" >

var editor;
document.getElementById("student-table-click").addEventListener("click", viewStudent, false);
document.getElementById("courses-table-click").addEventListener("click", viewCourses, false);

function viewStudent() {

    // //$('#course-table').hide();
     $('#student-table').show();
$('#course-table').DataTable().destroy();
$('#course-table').empty();
    //View students in the course in the admin dashboard
     $("#student-table").DataTable({

        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false,
         "bDestroy": true,
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


function viewCourses() {
    $('#course-table').show();
    $('#student-table').hide();
    $('#student-table').DataTable().destroy();
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


}

$(document).ready(function() {


    // $('#student-table').hide();

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

 // CourseID selection based on department in "Add student to course form"
 $('#department-selection').on('change', function(){
        var department = $(this).val();
        if(department){
            $.ajax({
                type:'POST',
                url:'selectcourseid.php',
                data:'department='+department,
                success:function(myData){
                  //alert(myData);
                  $.each(JSON.parse(myData), function (key, value) {
     $('#course_id').append($('<option></option>').attr('value', value.CourseID).text(value.CourseID));

  })

                }
            });
        }else{
          
        }
    });


 //Course ID selection based on department in "Add professor to course form"

 $('#professor_department').on('change', function(){
        var department = $(this).val();
        if(department){
            $.ajax({
                type:'POST',
                url:'selectcourseid.php',
                data:'department='+department,
                success:function(myData){
                  //alert(myData);
                  $.each(JSON.parse(myData), function (key, value) {
     $('#course_id_professor').append($('<option></option>').attr('value', value.CourseID).text(value.CourseID));

  })

                }
            });
        }else{
          
        }
    });


</script>

     <!--  <footer class = "footer">
         <p > Sample website developed by Shiva Shankar Ganesan</p>
      </footer> -->
   </body>
</html>