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

      <link rel="stylesheet" href ="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

      <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
      
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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

    <!-- Navigation Bar Section -->

    


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

    <div class = "bs-example">
        <!-- Nav tabs for Courses Students Professors section -->

        <ul class = "nav nav-tabs">
          <li class ="nav-item" id = "courses-table-click"> <a data-toggle="tab" class = "active nav-link" href = "#course-table">Courses</a></li>
         <li class ="nav-item" id = "student-table-click"> <a data-toggle="tab" class = "nav-link" href = "#students-table" >Students</a> </li>
         <li class ="nav-item"> <a data-toggle="tab" class = "nav-link" href = "#professors-table"> Professors </a></li>

        </ul>

        <div class = "tab-content">
          <table class = "coursetable" id="course-table" style="width:100%" cellspacing="0">
            <thead>
              <tr>
               <th> Course ID </th>
               <th> Course Name </th>
               <th> Course Level </th>
               <th> Credits </th>
               <th> Department </th>
               <th> </th>
             </tr>
            </thead>
         </table> 

         <table class = "studenttable" id="student-table" style="width:100%" cellspacing="0">
            <thead>
              <tr>
               <th> Course ID </th>
               <th> UB ID </th>
               <th> Term </th>
               <th> </th>
            </thead>
          </tr>
         </table>
        </div>
    </div>



<!-- Adding jquery code for datatable to show in the admin dashboard -->
<script type = "text/javascript" >

  $(document).ready(function () {
   $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
      var currentTab = $(e.target).text(); // get current tab
      switch (currentTab)   {
         case 'Courses' :   //do nothing
            var table = $('#course-table').DataTable();
            table.columns.adjust().draw();
            break ;
         case 'Students' :
            var table = $('#students-table').DataTable();
            table.columns.adjust().draw();
            break ;
         default: //do nothing 
      };
   }) ; 
});

</script>

     <!--  <footer class = "footer">
         <p > Sample website developed by Shiva Shankar Ganesan</p>
      </footer> -->
   </body>
</html>