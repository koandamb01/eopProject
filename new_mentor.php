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

/* Database connection settings */
require 'functions/pdo.php';

/* declare page variable */
$page = 'New Mentor';

/*start html beginning tags and display page navigation bar */
header_Nav($page, $firstname);


/* Declarer form variables */
$date = $firstname = $lastname = $user = $academic = $email = "";

$timestamp = time();
$date = date('Y-m-d', $timestamp);

// declare an array to record the form value
$formVars = array('date' => $date, 'firstname' => $firstname, 'lastname' => $lastname, 'user' => $user, 'academic' => $academic, 'email' => $email);
?>
<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li class="active">New Mentor</li>
        </ol>
    </div>
</section>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $schedule = array();

    $firstname = test_input($_POST['firstname']);
    $lastname = test_input($_POST['lastname']);
    $email = $_POST['email'];
    $academic_year = $_POST['academic'];

    
    // check if a mentor with this email exist
    $stmt = $pdo->prepare('SELECT * FROM tblmentors WHERE email = ?');
    $stmt->execute([$email]);
    $row = $stmt->rowCount();
        
    if($row == 0){ // Insert new data
      //Run Query now to insert Mentor data to the database
      $sql = 'INSERT INTO `tblmentors` (firstname, lastname, email, academic_year) VALUES (:firstname, :lastname, :email, :academic_year)';
      // Prepare the SQL statement
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'academic_year' => $academic_year]);

    }
    else{
      $_SESSION['message'] = "This mentor already exist. Please go to the mentor page to update their information";
      header("location: success.php");  
    }

    // Record the time for the week
     // record monday data
       if(isset($_POST['MonFrom2'])){
          
          if(!empty($_POST['MonFrom1'])){

            if(!empty($_POST['MonFrom2'])){
              
              $MonFrom1 = date("H:i", strtotime($_POST['MonFrom1'])); $MonTo1 = date("H:i", strtotime($_POST['MonTo1'])); //
              $MonFrom2 = date("H:i", strtotime($_POST['MonFrom2'])); $MonTo2 = date("H:i", strtotime($_POST['MonTo2'])); // Monday
      
              $schedule["Mon1"] = array($MonFrom1, $MonTo1);
              $schedule["Mon2"] = array($MonFrom2, $MonTo2);
            }
            else {
                
                $MonFrom1 = date("H:i", strtotime($_POST['MonFrom1'])); $MonTo1 = date("H:i", strtotime($_POST['MonTo1'])); //
                $schedule["Mon1"] = array($MonFrom1, $MonTo1);
            }
          }
          elseif (!empty($_POST['MonFrom2'])){
            
            $MonFrom2 = date("H:i", strtotime($_POST['MonFrom2'])); $MonTo2 = date("H:i", strtotime($_POST['MonTo2'])); // Monday
            $schedule["Mon2"] = array($MonFrom2, $MonTo2);
          }
          else{
            //echo "Both Mondays are EMPTY";
          } 
       }

       elseif (!empty($_POST['MonFrom1'])) {
          $MonFrom1 = date("H:i", strtotime($_POST['MonFrom1'])); $MonTo1 = date("H:i", strtotime($_POST['MonTo1'])); //
          $schedule["Mon1"] = array($MonFrom1, $MonTo1);
       }
       else{
          //echo "Both Mondays are EMPTY";
       }

       

      // record tuesday data
       if(isset($_POST['TueFrom2'])){
          
          if(!empty($_POST['TueFrom1'])){

            if(!empty($_POST['TueFrom2'])){
              
              $TueFrom1 = date("H:i", strtotime($_POST['TueFrom1'])); $TueTo1 = date("H:i", strtotime($_POST['TueTo1'])); 
              $TueFrom2 = date("H:i", strtotime($_POST['TueFrom2'])); $TueTo2 = date("H:i", strtotime($_POST['TueTo2'])); 
      
              $schedule["Tue1"] = array($TueFrom1, $TueTo1);
              $schedule["Tue2"] = array($TueFrom2, $TueTo2);
            }
            else {
                
                $TueFrom1 = date("H:i", strtotime($_POST['TueFrom1'])); $TueTo1 = date("H:i", strtotime($_POST['TueTo1']));
                $schedule["Tue1"] = array($TueFrom1, $TueTo1);
            }
          }
          elseif (!empty($_POST['TueFrom2'])){
            
            $TueFrom2 = date("H:i", strtotime($_POST['TueFrom2'])); $TueTo2 = date("H:i", strtotime($_POST['TueTo2'])); 
            $schedule["Tue2"] = array($TueFrom2, $TueTo2);
          }
          else{
            //echo "Both Tuesdays are EMPTY";
          } 
       }

       elseif (!empty($_POST['TueFrom1'])) {
          $TueFrom1 = date("H:i", strtotime($_POST['TueFrom1'])); $TueTo1 = date("H:i", strtotime($_POST['TueTo1']));
          $schedule["Tue1"] = array($TueFrom1, $TueTo1);
       }
       else{
          //echo "Both Tuesdays are EMPTY";
       }


        // record Wednesday data
       if(isset($_POST['WedFrom2'])){
          
          if(!empty($_POST['WedFrom1'])){

            if(!empty($_POST['WedFrom2'])){
              
              $WedFrom1 = date("H:i", strtotime($_POST['WedFrom1'])); $WedTo1 = date("H:i", strtotime($_POST['WedTo1'])); // 
              $WedFrom2 = date("H:i", strtotime($_POST['WedFrom2'])); $WedTo2 = date("H:i", strtotime($_POST['WedTo2'])); // Wednesday
      
              $schedule["Wed1"] = array($WedFrom1, $WedTo1);
              $schedule["Wed2"] = array($WedFrom2, $WedTo2);
            }
            else {
                
                $WedFrom1 = date("H:i", strtotime($_POST['WedFrom1'])); $WedTo1 = date("H:i", strtotime($_POST['WedTo1'])); // 
                $schedule["Wed1"] = array($WedFrom1, $WedTo1);
            }
          }
          elseif (!empty($_POST['WedFrom2'])){
            
            $WedFrom2 = date("H:i", strtotime($_POST['WedFrom2'])); $WedTo2 = date("H:i", strtotime($_POST['WedTo2'])); // Wednesday
            $schedule["Wed2"] = array($WedFrom2, $WedTo2);
          }
          else{
            echo "Both Wednesdays are EMPTY";
          } 
       }

       elseif (!empty($_POST['MonFrom1'])) {
          $WedFrom1 = date("H:i", strtotime($_POST['WedFrom1'])); $WedTo1 = date("H:i", strtotime($_POST['WedTo1'])); // 
          $schedule["Wed1"] = array($WedFrom1, $WedTo1);
       }
       else{
          //echo "Both Wednesdays are EMPTY";
       }


       // record Thursdays data
       if(isset($_POST['ThuFrom2'])){
          
          if(!empty($_POST['ThuFrom1'])){

            if(!empty($_POST['ThuFrom2'])){
              
              $ThuFrom1 = date("H:i", strtotime($_POST['ThuFrom1'])); $ThuTo1 = date("H:i", strtotime($_POST['ThuTo1'])); // 
              $ThuFrom2 = date("H:i", strtotime($_POST['ThuFrom2'])); $ThuTo2 = date("H:i", strtotime($_POST['ThuTo2']));
      
              $schedule["Thu1"] = array($ThuFrom1, $ThuTo1);
              $schedule["Thu2"] = array($ThuFrom2, $ThuTo2);
            }
            else {
                
                $ThuFrom1 = date("H:i", strtotime($_POST['ThuFrom1'])); $ThuTo1 = date("H:i", strtotime($_POST['ThuTo1']));
                $schedule["Thu1"] = array($ThuFrom1, $ThuTo1);
            }
          }
          elseif (!empty($_POST['ThuFrom2'])){
            
            $ThuFrom2 = date("H:i", strtotime($_POST['ThuFrom2'])); $ThuTo2 = date("H:i", strtotime($_POST['ThuTo2']));
            $schedule["Thu2"] = array($ThuFrom2, $ThuTo2);
          }
          else{
            //echo "Both Thursdays are EMPTY";
          } 
       }

       elseif (!empty($_POST['ThuFrom1'])) {
          $ThuFrom1 = date("H:i", strtotime($_POST['ThuFrom1'])); $ThuTo1 = date("H:i", strtotime($_POST['ThuTo1']));
          $schedule["Thu1"] = array($ThuFrom1, $ThuTo1);
       }
       else{
          //echo "Both Thursdays are EMPTY";
       }


        // record Fridays data
       if(isset($_POST['FriFrom2'])){
          
          if(!empty($_POST['FriFrom1'])){

            if(!empty($_POST['FriFrom2'])){
              
              $FriFrom1 = date("H:i", strtotime($_POST['FriFrom1'])); $FriTo1 = date("H:i", strtotime($_POST['FriTo1'])); 
              $FriFrom2 = date("H:i", strtotime($_POST['FriFrom2'])); $FriTo2 = date("H:i", strtotime($_POST['FriTo2'])); 
      
              $schedule["Fri1"] = array($FriFrom1, $FriTo1);
              $schedule["Fri2"] = array($FriFrom2, $FriTo2);
            }
            else {
                
                $FriFrom1 = date("H:i", strtotime($_POST['FriFrom1'])); $FriTo1 = date("H:i", strtotime($_POST['FriTo1']));
                $schedule["Fri1"] = array($FriFrom1, $FriTo1);
            }
          }
          elseif (!empty($_POST['FriFrom2'])){
            
            $FriFrom2 = date("H:i", strtotime($_POST['FriFrom2'])); $FriTo2 = date("H:i", strtotime($_POST['FriTo2']));
            $schedule["Fri2"] = array($FriFrom2, $FriTo2);
          }
          else{
            //echo "Both Fridays are EMPTY";
          } 
       }

       elseif (!empty($_POST['FriFrom1'])) {
          $FriFrom1 = date("H:i", strtotime($_POST['FriFrom1'])); $FriTo1 = date("H:i", strtotime($_POST['FriTo1']));
          $schedule["Fri1"] = array($FriFrom1, $FriTo1);
       }
       else{
          //echo "Both Fridays are EMPTY";
       }


      // Mentor schedule database setup
      $stmt = $pdo->prepare('SELECT mentor_id FROM tblmentors WHERE email = ?');
      $stmt->execute([$email]);
      $row = $stmt->fetch();
      $mentor_id = $row->mentor_id;

      $sql = 'INSERT INTO `tblschedule` (mentor_id, day, start_at, end_at, period) VALUES
                                      (:mentor_id, :day, :start_at, :end_at, :period)';

      foreach ($schedule as $key => $value) {

        if($key == "Mon1"){
          $day = 1;
          $period = 1;
          $stmt = $pdo->prepare($sql); // Prepare the SQL statement
          $stmt->execute(['mentor_id' => $mentor_id, 'day' => $day, 'start_at' => $value[0], 'end_at' => $value[1], 'period' => $period]);
        }
        if($key == "Mon2"){
          $day = 1;
          $period = 2;
          $stmt = $pdo->prepare($sql); // Prepare the SQL statement
          $stmt->execute(['mentor_id' => $mentor_id, 'day' => $day, 'start_at' => $value[0], 'end_at' => $value[1], 'period' => $period]);
        }

        // add the rest of the week later
      }


      //Mentor course database setup
      $sql = 'INSERT INTO `tblcourses` (mentor_id, course_name) VALUES (:mentor_id, :course_name)';
      
      foreach ($_POST['course'] as $course) {
          $stmt = $pdo->prepare($sql); // Prepare the SQL statement
          $stmt->execute(['mentor_id' => $mentor_id, 'course_name' => $course]);
      }


      //$_SESSION['message'] = "You have successfully inserted a new mentor schedule!";
     // header("location: success.php");  

}


       /*

      // Mentor schedule database setup
      $stmt = $pdo->prepare('SELECT mentor_id FROM tblmentors WHERE email = ?');
      $stmt->execute([$email]);
      $row = $stmt->fetch();


      $sql = 'INSERT INTO `tblschedule` (mentor_id, day, start_at, end_at) VALUES
                                      (:mentor_id, :day, :start_at, :end_at)';

      $stmt = $pdo->prepare($sql); // Prepare the SQL statement
      $stmt->execute(['mentor_id' => $mentor_id, 'day' => $day, 'start_at' => $start_at, 'end_at' => $end_at]);


    
    header("location: new_mentor.php?updation=1");

  }

  /*if(isset($_GET['updation'])){

    $MonFrom1 = date("H:i", strtotime($_POST['MonFrom1'])); $MonTo1 = date("H:i", strtotime($_POST['MonTo1'])); 

    echo "From: ".$MonFrom1. "To ".$MonTo1;

  }


    //echo "From: ".$MonFrom1. "To ".$MonTo1;

    /*foreach ($_POST['course'] as $postElement => $postValue) {
      echo("\$_POST[$postElement] = $postValue<br/>\n");
    }

    */







 ?>

<section id="main">
    <div class="container">
      <div class="row">
        <?php sideMenu();?>
        <div class="col-md-9">
          <!-- Websitte overview -->
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">New Mentor</h3>
                </div>
                <div class="panel-body">
                  <?php mentorForm($formVars);?>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>

<?php footer();?>