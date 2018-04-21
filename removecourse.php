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


$sql = 'DELETE FROM tblcourses WHERE mentor_id = :mentor_id AND course_name = :course_name';
$del = $pdo->prepare($sql);
$del->execute(['mentor_id' => $mentor_id, 'course_name' => $course_name]);
$count = $del->rowCount();

if($count > 0){
	echo '<p class="text text-success">'.$count. ' course was removed from mentor profile</p>';
}
else{
	echo '<p class="text text-danger">Course does not exist</p>';
}

?>