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
$message = "";

// declare an array to record the form value
//$formVars = array('date' => $date, 'firstname' => $firstname, 'lastname' => $lastname, 'user' => $user, 'academic' => $academic, 'email' => $email);

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

      require 'schedule.php';

      $_SESSION['message'] = "You have successfully inserted a new mentor schedule!";
      header("location: new_mentor.php?updation=1");
    }
    else{
      $_SESSION['message'] = "This mentor already exist. Please go to the mentor page to update their informations";
      header("location: new_mentor.php?updation=1");
    }
}

    if(isset($_GET['updation'])){
      $message = $_SESSION['message'];
    }
  
     
?>

<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li class="active">New Mentor</li>
        </ol>
    </div>
</section>

<section id="main">
    <div class="container">
      <h4 class="text-center text-primary"><?php echo $message; ?></h4>
      <div class="row">
        <?php sideMenu(1);?>
        <div class="col-md-10">
          <!-- Websitte overview -->
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">New Mentor</h3>
                </div>
                <div class="panel-body">
                  <?php mentorForm();?>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>

<?php footer();?>