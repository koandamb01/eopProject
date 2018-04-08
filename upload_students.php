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


/* Database connection settings */
require 'functions/pdo.php';

// Code for uploading data from Excel to the database      
$message = '';
$data_insert = $data_update = 0;

if(isset($_POST['upload'])){

  if($_FILES['student_file']['name']){

    $filename = explode(".", $_FILES['student_file']['name']);
    if(end($filename) == "csv"){
  
      $handle = fopen($_FILES['student_file']['tmp_name'], "r");
      while($data = fgetcsv($handle)){

        $firstname = $data[0];
        $lastname = $data[1];
        $email = $data[2];
        $academic_year = $data[3];
        $c_code = $data[4];

        // check someone with this email exist
        $stmt = $pdo->prepare('SELECT * FROM tblstudents WHERE email = ?');
        $stmt->execute([$email]);
        $row = $stmt->rowCount();
        
        if($row == 0){ // Insert new data
          //Run Query now to insert data
          $sql = 'INSERT INTO `tblstudents` (firstname, lastname, email, academic_year, c_code) VALUES
                                            (:firstname, :lastname, :email, :academic_year, :c_code)';

          $stmt = $pdo->prepare($sql); // Prepare the SQL statement
          $stmt->execute(['firstname' => $firstname, 'lastname' => $lastname, 'email' => $email,
                          'academic_year' => $academic_year, 'c_code' => $c_code]);

          $data_insert += 1; // count the number of data insert
        }
        else{
            
            // Get the id of the students record that need to be updates
            $stmt = $pdo->prepare('SELECT student_id FROM tblstudents WHERE email = ?');
            $stmt->execute([$email]);
            $row = $stmt->fetch();
          //Run Query now to insert data
          $sql = 'UPDATE`tblstudents` SET firstname = :firstname, 
                                          lastname = :lastname,
                                          academic_year = :academic_year, 
                                          c_code = :c_code WHERE student_id = :student_id';

          $stmt = $pdo->prepare($sql); // Prepare the SQL statement
          $stmt->execute(['firstname' => $firstname, 'lastname' => $lastname,
                          'academic_year' => $academic_year, 'c_code' => $c_code, 'student_id' => $row->student_id]);
          
          $data_update += 1; // count the number of data update
        }
      }

      $_SESSION['insert'] = $data_insert;
      $_SESSION['update'] = $data_update;

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
  
  $data_update = $_SESSION['update'];
  $data_insert = $_SESSION['insert'];

  $message = $data_insert . " new records insert and ". $data_update . " records update";
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