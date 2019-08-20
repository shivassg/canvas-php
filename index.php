<?php 
error_reporting(0);
session_start(); 
$session= "";
$session= $_SESSION['username'];
if($session!=""){
	header('location:admin-dashboard.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title> Canvas Application </title>
	<meta charset="utf-8">
	<link rel = "shortcuticon" href="">
	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-12/css/all.css">
	<link rel="stylesheet" href="css/style.css">

	<style>
		
		body{
			background-color: #6f42c1; /*Purple color*/
		}

		.field-icon {
  			position: absolute;
			top: calc(50% - 0.5em);
 			z-index: 2;
		}
		.input-wrapper{
			position: relative;
		}

	</style>

</head>

<body>

	<div class = "container login-form">

		<p class="logout-message"> Successfully logged out </p>

		<div class = "card">
			<div class = "card-img-top text-center">
				<img src = "images/logo.png" class = "logo"  alt = "Univerity Of Bridgeport">
			</div>
			<div class = "card-body">

				<p class ="invalid-login" id="invalid-loign-text"> Invalid Username or Password </p>
				
				<p class = "login-title text-center"> Login to University of Bridgeport (Canvas) </p>

				<form action = "login.php" method = "post">
					<div class = "row">
						<div class = "col-md-6 text-center"> Username </div>
						<div class = "col-md-6 text-left input-box"> <input type ="text" id = "username" placeholder="Enter the UB ID" name = "username" required></div>
					</div>
					<div class = "row">
						<div class = "col-md-6 text-center"> Password </div>
						<div class = "col-md-6 text-left input-box">
							<input type = "password" placeholder = "Enter the password" id ="password" name = "password" required>
						</div>
					</div>

					<div class = "row">
						<div class = "col-md-12 text-right submit-button"> <input  type = "submit"  name = "login-submit"  class = "btn btn-sm btn-primary" > </div>
					</div>
				</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	function validate(){
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;

		var jq = $("username").val();
		console.log(jq);

		if( username == "" || username == " " || username ==null ){
			document.getElementById("invalid-loign-text").style.display ="block";
			return false;
		}
		else if (password =="" || password == " " || password == null){
			document.getElementById("invalid-loign-text").style.display ="block";
			return false;
		}
	}
	
</script>



</body>
</html>
