<?php 
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'eop';


// Set DSN
$dsn = 'mysql:host='. $host .';dbname='. $dbname;

// Create a PDO instance
$pdo = new PDO($dsn, $user, $pass);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
?>