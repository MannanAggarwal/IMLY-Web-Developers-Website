<?php

if(isset($_POST['submit'])){
	include("../dbconnection.php");
	$username = $_POST['username'];
	$password = trim($_POST['password']);
	
	$qry_login_select = "SELECT * FROM `users` WHERE `email`= '$username'";
	$run_login_select = mysqli_query($con,$qry_login_select);
	
	if(mysqli_num_rows($run_login_select)){
		?><script>alert("You are now logged in.");window.location = "../index.html";</script><?php
		
	}else{
		?><script>alert("Either check your username and password or Create a new account.");window.location = "../Login/index.html";</script><?php
	}
}

?>