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
$page = 'Edit Mentor';

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
            <li><a href="sessions.php">Sessions</a></li>
            <li class="active">Edit Mentor</li>
        </ol>
    </div>
</section>

<section id="main">
    <div class="container">
      <div class="row">
        <?php sideMenu(1);?>
        <div class="col-md-9">
          <!-- Websitte overview -->
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">Edit Mentor</h3>
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