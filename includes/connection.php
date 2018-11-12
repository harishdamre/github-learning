<?php

//session_start();
// Create connection
$conn = mysqli_connect("localhost","root","","social_network");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "";
?>


