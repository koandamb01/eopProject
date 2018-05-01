<?php 
session_start();
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing registration page!";
  header("location: error.php");    
}

$active = $_SESSION['active'];
$first_name = $_SESSION['firstname'];

if(!$active){
    header("location: profile.php");
}


require 'functions/functions.php';
/* Database connection settings */
require 'functions/pdo.php';

/* declare page variable */
$page = 'New Session';

/*start html beginning tags and display page navigation bar */
header_Nav($page, $first_name);

/* Declarer form variables */
$student_id = $message = $firstname = $lastname = $user = $academic = $email = "";
$mentor = $sessionType = $sessionStart = $sessionEnd = $course = $sessionNotes = "";

$timestamp = time();
$date = date('Y-m-d', $timestamp);

if(isset($_GET['student_id'])){
  
  $student_id = intval($_GET['student_id']);
  $sql = 'SELECT * FROM tblstudents WHERE student_id = :student_id';
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['student_id' => $student_id]);
  $row = $stmt->fetch();

  $firstname = $row->firstname;
  $lastname = $row->lastname;
  $academic = $row->academic_year;
  $email = $row->email;
  $_SESSION['student_id'] = $student_id;
}
$user = $_SESSION['firstname'];

// declare an array to record the form value
$formVars = array('date' => $date, 'firstname' => $firstname, 'lastname' => $lastname, 'user' => $user, 'academic' => $academic,
                  'email' => $email, 'mentor' => $mentor, 'sessionType' => $sessionType, 'sessionStart' => $sessionStart, 
                  'sessionEnd' => $sessionEnd, 'course' => $course, 'sessionNotes' => $sessionNotes);



if($_SERVER["REQUEST_METHOD"] == "POST"){
  // Get User ID
  $username = $_SESSION['firstname'];
  $sql = 'SELECT id FROM users WHERE firstname = :firstname';
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['firstname' => $username]);
  $row = $stmt->fetch();
  $user_id = $row->id;

  // Get mentor ID
  $mentor = test_input($_POST['mentor']);
  $sql = 'SELECT mentor_id FROM tblmentors WHERE firstname = :firstname';
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['firstname' => $mentor]);
  $row = $stmt->fetch();
  $mentor_id = $row->mentor_id;

  // Get froms input information
  $sessionType = $_POST['sessionType'];
  $sessionStart = $_POST['sessionStart'];
  $sessionEnd = $_POST['sessionEnd'];
  $sessionDuration = $sessionEnd - $sessionStart;
  $course = $_POST['course'];
  $semester = $_POST['semester'];
  $sessionNotes = test_input($_POST['sessionNotes']);

  $student_id = $_SESSION['student_id'];

  /*echo 'From: '.$sessionStart.'<br> TO: '.$sessionEnd.'<br>';
  //echo $sessionDuration;
  //echo $sessionDuration->format('%h')." Hours ".$sessionDuration->format('%i')." Minutes";

$datetime1 = new DateTime('2014-02-11 04:04:26 AM');
$datetime2 = new DateTime('2014-02-11 05:36:56 AM');
$interval = $datetime1->diff($datetime2);
echo $interval->format('%h')." Hours ".$interval->format('%i')." Minutes";


  //echo 'user id: '.$user_id. '<br> student id: '.$student_id. '<br> Mentor id: '.$mentor_id;;
  */
  $sql = 'INSERT INTO `tblsessions` (user_id, student_id, mentor_id, course, session_type, semester, session_start, session_end, session_duration, notes, session_date) VALUES 
                                    (:user_id, :student_id, :mentor_id, :course, :session_type, :semester, :session_start, :session_end, :session_duration, :notes, :session_date)';

  $stmt = $pdo->prepare($sql);

  $stmt->execute(['user_id' => $user_id, 'student_id' => $student_id, 'mentor_id' => $mentor_id, 'course' => $course, 'session_type' => $sessionType, 'semester' => $semester, 
                'session_start' => $sessionStart, 'session_end' => $sessionEnd, 'session_duration' => $sessionDuration, 'notes' => $sessionNotes, 'session_date' => $date]);

  $_SESSION['message'] = "You have successfully inserted a new session!";
  header("location: new_session.php?updation=1");
}

if(isset($_GET['updation'])){
  $message = $_SESSION['message'];
}

?>
<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="sessions.php">Sessions</a></li>
            <li class="active">New Session</li>
        </ol>
    </div>
</section>

<section id="main">
    <div class="container">
      <h4 class="text-center text-primary"><?php echo $message; ?></h4>
      <div class="row">
        <?php sideMenu(0);?>
        <div class="col-md-9">
          <!-- Websitte overview -->
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">New Session</h3>
                </div>
                <div class="panel-body">

                  <?php
                    sessionsForm($formVars); ?>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>

<?php footer();?>