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

require 'functions/functions.php';
/* declare page variable */
$page = 'Upload';

/*start html beginning tags and display page navigation bar */
header_Nav($page, $firstname);

/* Display section breadcrumb */
breadcrumb($page);

// connect to the database
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'eop';
$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn) {die ('Failed to connect to MySQL: ' . mysqli_connect_error());}
// Code for uploading data from Excel to the database


 /* $sql = "DELETE FROM `tblstudents`";
         // Execute the sql statment
        $query = mysqli_query($conn, $sql);
        if(!$query) {die ('SQL Error: ' . mysqli_error($conn));}
        */
       
$message = '';

if(isset($_POST['upload'])){

  if($_FILES['student_file']['name']){

    $filename = explode(".", $_FILES['student_file']['name']);
    if(end($filename) == "csv"){

      $handle = fopen($_FILES['student_file']['tmp_name'], "r");
      while($data = fgetcsv($handle)){
        $student_id = mysqli_real_escape_string($conn, $data[0]);
        $firstname = mysqli_real_escape_string($conn, $data[1]);
        $lastname = mysqli_real_escape_string($conn, $data[2]);
        $email = mysqli_real_escape_string($conn, $data[3]);
        $academic_year = mysqli_real_escape_string($conn, $data[4]);
        $is_eop = mysqli_real_escape_string($conn, $data[5]);
        $counselor_pin = mysqli_real_escape_string($conn, $data[6]);  

       
        //Run Query now to insert data
        $sql = " INSERT INTO `tblstudents` (student_id, firstname, lastname, email, academic_year, is_eop, counselor_pin) VALUES
                  ('" .$student_id. "', '".$firstname."', '".$lastname."', '".$email."', '".$academic_year."', 
                    '".$is_eop."', '".$counselor_pin."')";

        // Execute the sql statment
        $query = mysqli_query($conn, $sql);
        if(!$query) {die ('SQL Error: ' . mysqli_error($conn));}
      }
      fclose($handle);
      header("location: upload_students.php?updation=1");
    }
    else{
      $message = "Please Select CSV File Only";
    }
  }
  else{
    $message = "Please Select File";
  }
}

if(isset($_GET['updation'])){
  $message = "Student Information update Done";
}
?>

 <section id="main">
    <div class="container">
      <h4 class="text-center text-danger"><?php echo $message; ?></h4>
      <br>
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Please Select File(Only CSV Format)</label>
                  <input type="file" class="form-control" name="student_file" />
                </div>
                
                <input type="submit" name="upload" class="btn btn-info btn-block" value="Upload">
                <br>
          </form>
        </div>
      </div>
    </div>
  </section>

  <?php

  footer();

  ?>