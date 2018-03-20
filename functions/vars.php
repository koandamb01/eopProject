<?php
require 'pdo.php';

$sessionsList = array('','Academic Mentoring', 'AEGIS', 'Peer Mentoring', 'Study Group');// Array for all sessions names

$semestersList = array('fall', 'spring', 'summer'); // Array for all Semesters names

$academicYear = array('','Freshman', 'Sophomore', 'Junior', 'Senior', 'Graduate'); // array for the academic dropdown menu options

$mentorsList = array('', 'Mohamed', 'Sarah', 'Kadi', 'Adam'); // array for counselor type dropdown menu options (run query to get names later)


// run query to retrieve all counselors firstname from the database
$title = 'counselor';
$sql = 'SELECT firstname FROM users WHERE title = :title';
$stmt = $pdo->prepare($sql);
$stmt->execute(['title' => $title]);
$rows = $stmt->fetchALL(); // Array with counselors lists data

//push all the counselor name into an array;
$counselor_lists = array();
foreach ($rows as $row) {
	array_push($counselor_lists, $row->firstname);
}
?>