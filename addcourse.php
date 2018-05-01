<?php 
session_start();
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing registration page!";
  header("location: error.php");    
}

$active = $_SESSION['active'];
$firstname = $_SESSION['firstname'];

if(!$active){
    header("location: profile.php");
}

require 'functions/pdo.php';
require 'functions/functions.php';
require 'functions/vars.php';


$mentor_id = intval($_GET['mentor_id']);
$course_name = $_GET['crs'];


//Mentor course database setup
$sql = 'INSERT INTO `tblcourses` (mentor_id, course_name) VALUES (:mentor_id, :course_name)';
$add = $pdo->prepare($sql); // Prepare the SQL statement
$add->execute(['mentor_id' => $mentor_id, 'course_name' => $course_name]);
$check = $pdo->lastInsertId();


if($check){
	echo '<p class="text text-success">'.$course_name. ' was add to mentor profile</p>';
}
else{
	echo '<p class="text text-danger">'.$course_name.' failed to add</p>';
}

?>