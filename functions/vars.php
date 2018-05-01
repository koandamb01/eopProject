<?php
require 'pdo.php';

$sessionsList = array('','Academic Mentoring', 'AEGIS', 'Peer Mentoring', 'Study Group');// Array for all sessions names

$semestersList = array('fall', 'spring', 'summer'); // Array for all Semesters names

$academicYear = array('freshman', 'Freshman', 'sophomore', 'Sophomre', 'junior', 'Junior', 'senior', 'Senior', 'graduate', 'Graduate'); // array for the academic dropdown menu options


// run query to retrieve all mentors firstname from the database
$stmt = $pdo->query('SELECT firstname FROM tblmentors ORDER BY firstname ASC');
$rows = $stmt->fetchALL(); // Array with counselors lists data

//push all the counselor name into an array;
$mentorsList = array('');
foreach ($rows as $row) {
	array_push($mentorsList, $row->firstname);
}


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