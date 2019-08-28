<!DOCTYPE html>
<html>
   <head>
      <title> Professor Dashboard </title>
      <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-12/css/all.css">
      <link rel="stylesheet" href="css/style.css">
      <style>
         body{
            background-color: white;
            font-family: Nunito, sans-serif;
            font-size: 14px;
         }
         #wrapper {
         padding-left: 0;
         -webkit-transition: all 0.5s ease;
         -moz-transition: all 0.5s ease;
         -o-transition: all 0.5s ease;
         transition: all 0.5s ease;
         }
         #wrapper.toggled {
         padding-left: 250px;
         }
         #sidebar-wrapper {
         z-index: 1000;
         position: fixed;
         left: 250px;
         width: 0;
         height: 100%;
         margin-left: -250px;
         overflow-y: auto;
         background: white;
         -webkit-transition: all 0.5s ease;
         -moz-transition: all 0.5s ease;
         -o-transition: all 0.5s ease;
         transition: all 0.5s ease;
         border: solid 1px #C7CDD1;
         }
         #wrapper.toggled #sidebar-wrapper {
         width: 250px;
         }
         #page-content-wrapper {
         width: 100%;
         position: absolute;
         padding: 15px;
         border-bottom: 1px solid #C7CDD1;
         }
         #wrapper.toggled #page-content-wrapper {
         position: absolute;
         margin-right: -250px;
         }
         /* Sidebar Styles */
         .sidebar-nav {
         position: absolute;
         top: 0;
         width: 250px;
         margin: 0;
         padding: 0;
         list-style: none;
         }
         .course-title{
             color: #666;
         }
         .sidebar-nav li {
         text-indent: 20px;
         line-height: 40px;
         }
         .sidebar-nav li a {
         display: block;
         text-decoration: none;
         color: #440099;
         }
         .sidebar-nav li a:hover {
         text-decoration: none;
         color: black;
         background: rgba(255,255,255,0.2);
         }
         .sidebar-nav li a:active,
         .sidebar-nav li a:focus {
         text-decoration: none;
         }
         .sidebar-nav > .sidebar-brand {
         height: 65px;
         font-size: 18px;
         line-height: 60px;
         }
         .sidebar-nav > .sidebar-brand a {
         color: #440099;
         }
         .sidebar-nav > .sidebar-brand a:hover {
         color: black;
         background: none;
         }
         @media(min-width:768px) {
         #wrapper {
         padding-left: 250px;
         }
         #wrapper.toggled {
         padding-left: 0;
         }
         #sidebar-wrapper {
         width: 250px;
         }
         #wrapper.toggled #sidebar-wrapper {
         width: 0;
         }
         #page-content-wrapper {
         padding: 20px;
         position: relative;
         }
         #wrapper.toggled #page-content-wrapper {
         position: relative;
         margin-right: 0;
         }

         .announcement-row{
            box-shadow: 0 -1px #C7CDD1, inset 0 -1px #C7CDD1;
            padding: 16px 0;
            justify-content: space-between;
            /* align-items: center; */
            position: relative;
         }

         .announcement-section {
            display: none;
         }

         .home-content {
            display: none;
         }

         .syllabus-content{
            display: none;
         }

         .grades-content{
            display: none;
         }

         .title-container{
            margin-left: 15px;
            padding-left: 0;
         }

         .announcement-row div.announcement-title {
            margin-bottom: 5px;
         }

         .announcement-section div.annoncement-message{
            margin-bottom: 15px;
         }

        }
      </style>
   </head>
   <body>

   <nav class="navbar navbar-expand-sm nav-dark site-head">
         <a class="navbar-brand my-brand"> UB </a>
         <ul class= "navbar-nav navbarlist">
            <li class="nav-item">
               <a class="nav-link active" href="#"> Dashboard </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#"> Inbox </a>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link"> Profile</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="logout.php"> Log out</a>
            </li>
         </ul>
      </nav> 

      <div id="wrapper">
         <!-- Sidebar -->
         <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
               <li class="sidebar-brand">
                  <a href="#">
                  Fall 2019
                  </a>
               </li>
               <li>
                   <a href="#" onclick="showHome();"> Home </a>
               </li>
               <li>
                  <a href="#" onclick="showAnnouncement();">Announcements</a>
               </li>
               <li>
                  <a href="#"> Assignment </a>
               </li>
               <li>
                  <a href="#">Grades</a>
               </li>
               <li>
                  <a href="#">Files</a>
               </li>
            </ul>
         </div>
         <!-- /#sidebar-wrapper -->
         <!-- Page Content -->
         <div id="page-content-wrapper">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-1">
                    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle" style="color:#692ace;"><i class="fas fa-bars" style="color:#692ace;"></i>Menu</a>
                  </div>
                  <div class="col-md-9">
                     <h3 class="course-title">CPSC-501-11-OOP with Design Patterns-2019FA</h3>
                  </div>
                  <div class="col-md-2">
                  <button type ="button" class ="btn btn-info btn-sm" data-toggle="modal" data-target=".create-announcement"><i class="fas fa-book"></i> Post Announcment </button>
               </div>
            </div>
         </div> <!--container fluid -->
         <!-- /#page-content-wrapper -->
      </div>
      <div id="home-content" class="home-content">
         <p> Home </p>
         <p> Welcome to New Semester </p>
      </div >
      <div id="announcement-section" class="announcement-section">
         <p> Announcement </p>
         <div class="announcement-row" style="opacity:1;">
            <?php
               require 'db.php';
               $courseID ="101";
               $sql = "SELECT * from announcement WHERE courseid='$courseID'";
               $result = mysqli_query( $connection , $sql);
               $resultCheck = mysqli_num_rows($result);
               if($resultCheck > 0){
                  while($row = mysqli_fetch_assoc($result)){
            ?> 
            <div class="container-fluid title-container">
               <div class="row annoncement-row">
                  <div class="announcement-title">
                     <?php echo $row['title'].  '</div>';?>
                  </div>
               </div>
                  <div class="row announcement-message-row">
                     <div class="annoncement-message col-md-8">
                        <?php echo $row['message'];?>
                     </div>
                     <div class="announcement-time col-md-4">
                        <?php echo $row['creationtime'];?>
                     </div>
                  </div>
               <?php } }?>
            </div>
         </div>
      </div>
      <div id="assignment-content" class="assignment-content">
         <p> Assginment </p>
      </div>
      <div id="syllabus-content" class="syllabus-content">
         <p> Syllabus </p>
      </div>
      <div id="grades-content" class="grades-content">
         <p> Grades </p>
      </div>

      </div>
    
      <!-- /#wrapper -->
      <!-- Menu Toggle Script -->

      <!--Post announcement Modal-->
      <div class = "modal create-announcement" id = "create-announcment">
        <div class="modal-dialog modal-md">
          <div class= "modal-content">
            <!--Modal Header-->
            <div class="modal-header bg-info">
                  <h5 class="modal-title text-left text-white">Create New Announcement</h5>
                  <button type="button" class="close text-right" data-dismiss="modal">&times;</button>
            </div> 

            <!--Modal Container -->
            <div class= "container ">
                  <form class="form-horizontal" action = "create-announcement.php" method="POST">
                     <div class="control-group">
                        <label class="control-label" >Title</label>
                        <div class="controls">
                           <input type="text" id="announcement_title" style="min-width: 100%" name="announcement_title" placeholder="" class="input-xlarge" required>
                        </div>
                     </div>
                     <div class="control-group">
                         <label class="control-label"> Message </label>
                         <div class="controls">
                            <!-- <input type="text" id="announcement-message" name="announcement-message" placeholder="Enter Announcement" class="input-xxlarge" requried> -->
                            <textarea class="form-control" rows="5" style="min-width: 100%" name="announcement_message" id="announcement_message" placeholder="Enter Announcement "> </textarea>
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

      <script>

         $("#menu-toggle").click(function(e) {
         e.preventDefault();
         $("#wrapper").toggleClass("toggled");
         });

         function showHome(){
            $('#home-content').show();
            $('#announcement-section').hide();
            $('#syllabus-content').hide();
            $('#grades-content').hide();
            $('#assignment-content').hide();
         }

         function showAnnouncement(){
            $('#home-content').hide();
            $('#syllabus-content').hide();
            $('#grades-content').hide();
            $('#assignment-content').hide();
            $('#announcement-section').show();

         }
      </script>
   </body>
</html>