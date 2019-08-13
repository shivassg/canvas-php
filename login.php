<?php
session_start();

if(isset($_POST['login-submit'])){ ##Checking if the flow came from the submit button

require 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$_SESSION['username'] = $username;

if( $username == "" || $password == ""){
	#Need to check if the username or password is empty and show error 
	echo "Unsuccessfull login";
	exit();
}
else{ #Successfull login

	$select = mysqli_query($connection, "Select * from users where ubID = $username and password = '$password'");
	$value = mysqli_fetch_row($select);
	$fetch = mysqli_fetch_assoc($select);
	
	if($value){

		header("Location:admin-dashboard.php");
		
	}
	else{
		echo "Invalid username and password";
	}
}




}