<?php 
require 'functions/pdo.php';

// find current semester
$currentSemester = '';


// fall semester range from August 08 to December 12
// Spring semester range from January 01 to May 05
// Summer semester range from June 06 to July 07
$timestamp = time();
$date = date('m', $timestamp);

if($date >= 1 && $date <= 5){
	$currentSemester = 'Spring';
}

if($date >= 6 && $date <= 7){
	$currentSemester = 'Summer';
}

if($date >= 8 && $date <= 12){
	$currentSemester = 'Fall';
}




// run query for session data
$stmt = $pdo->prepare('SELECT * FROM tblsessions WHERE semester = ? ORDER BY session_date ASC');
$stmt->execute([$currentSemester]);
$sessionCount = $stmt->rowCount();

// run query to count the number of students
$stmt = $pdo->query('SELECT * FROM tblstudents');
$studentCount = $stmt->rowCount();

// run query to count the number of freshman
$stmt = $pdo->prepare('SELECT * FROM tblstudents WHERE academic_year = ?');
$stmt->execute(['freshman']);
$freshmanCount = $stmt->rowCount();

// run query to count the number of sophomore
$stmt->execute(['sophomore']);
$sophomoreCount = $stmt->rowCount();

// run query to count the number of junior
$stmt->execute(['junior']);
$juniorCount = $stmt->rowCount();

// run query to count the number of senior
$stmt->execute(['senior']);
$seniorCount = $stmt->rowCount();

// Run query to count the number of mentors
$stmt = $pdo->query('SELECT * FROM tblmentors');
$mentorCount = $stmt->rowCount();

// Run query to count the number of users
$stmt = $pdo->query('SELECT * FROM users');
$userCount = $stmt->rowCount();


// run query to count the total number of tutorials
$stmt = $pdo->prepare('SELECT * FROM tblsessions WHERE session_type = ? AND semester = ?');
$stmt->execute(['Academic Mentoring', $currentSemester]);
$acadMentoringCount = $stmt->rowCount();

$stmt->execute(['AEGIS']);
$aegisCount = $stmt->rowCount();


// Calculate to total hours of the semester so far
$stmt = $pdo->prepare('SELECT SUM(session_duration) AS totalHours FROM tblsessions WHERE semester = ?');
$stmt->execute([$currentSemester]);
$row = $stmt->fetch();
$totalHours = $row->totalHours;


?>