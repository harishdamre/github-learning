<?php
error_reporting(0);
session_start();

include("includes/connection.php");

if(isset($_POST['login'])){
	
$email = mysqli_real_escape_string($conn,$_POST['email']);
$pass = mysqli_real_escape_string($conn,$_POST['pass']);
	
$select_user = "select * from users where user_email='$email' AND user_pass='$pass' AND status='verified'";	
	
$query = mysqli_query($conn,$select_user);

$check_user = mysqli_num_rows($query);	

if($check_user == 1){
	
$_SESSION['user_email']=$email;
	
echo"<script>window.open('home.php','_self')</script>";	
	
}
else{
echo"<script>alert('Incorrect Details,Please Try Again')</script>";	
	
	
}
	
}
?>