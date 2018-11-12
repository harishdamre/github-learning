<?php
include("includes/connection.php");


if(isset($_POST['sign_up'])){
	
$name = mysqli_real_escape_string($conn,$_POST['u_name']);
$pass = mysqli_real_escape_string($conn,$_POST['u_pass']);
$email = mysqli_real_escape_string($conn,$_POST['u_email']);
$country = mysqli_real_escape_string($conn,$_POST['u_country']);
$gender = mysqli_real_escape_string($conn,$_POST['u_gender']);
$birthday = mysqli_real_escape_string($conn,$_POST['u_birthday']);
$status = "Unverified";
$posts = "No";
$ver_code = mt_rand();
	
if(strlen($pass)<8){
	
	echo "<script>alert('password should be minimum 8 characters')</script>";
	exit();
	  
}	

$check_email = "select * from users where user_email='$email'";
$run_email = mysqli_query($conn,$check_email);

$check = mysqli_num_rows($run_email);

if($check==1){
echo "<script>alert('Email Already Exist, Please Try Another')</script>";
	exit();	
	
	
}

$insert = "insert into users (user_name,user_pass,user_email,user_country,user_gender,user_birthday,user_image,user_reg_date,status,ver_code,posts) 
values ('$name','$pass','$email','$country','$gender','$birthday','default.jpg',NOW(),'$status','$ver_code','$posts')"; 

$query = mysqli_query($conn,$insert);

if($query){
echo"<h3 style='width:400px'; text-align:justify>Hi, $name Congratulation registration is almost complete, please check your Email for final verification.</h3> ";		
}
else
{
echo "Registration Failed, Please Try Again ";
}
}


?>