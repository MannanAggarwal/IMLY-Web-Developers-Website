<?php

if(isset($_POST['submit'])){
	include("../dbconnection.php");
	
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = trim($_POST['password']);
	$cpassword = trim($_POST['confirm-password']);
	
	$qry_signup_insert = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`) VALUES ('$fname','$lname','$email','$password')";
	$qry_signup_select = "SELECT * FROM `users` WHERE `email`= '$email'";
	$run_signup_select = mysqli_query($con,$qry_signup_select);
	/*
	if($run_signup_select==true){
		echo "pass";
	}else{echo "fail";}
	*/
	if(!mysqli_num_rows($run_signup_select)){
		$run_signup_insert = mysqli_query($con,$qry_signup_insert);
		if($run_signup_insert==true){
			?>
			<script>alert("Your account is now created. You are ready to Login.");window.location="../Login/index.html";</script>
			<?php
		}else{
			?>
			<script>alert("There was an error. Please try again.");window.location="../Signup/signup.html";</script>
			<?php
		}
	}else{
		?>
			<script>alert("You are already having an account with this Email. Try with another Email or Go to Login.");window.location="index.html";</script>
			<?php
	}

}
else{echo"sorry";}
?>