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
$page = 'Edit Session';

/*start html beginning tags and display page navigation bar */
header_Nav($page, $firstname);

/* Declarer form variables */
$session_id = $student_id = $firstname = $lastname = $user = $academic = $email = "";
$mentor_id = $mentor = $sessionType = $sessionStart = $sessionEnd = $course = $sessionSemester = $sessionNotes = "";

$timestamp = time();
$date = date('Y-m-d', $timestamp);


if(isset($_GET['session_id'])){
  // record current session id
  $session_id = $_GET['session_id'];
  $_SESSION['session_id'] = $_GET['session_id'];
  // Fetch session for current id
  $stmt = $pdo->prepare('SELECT * FROM tblsessions WHERE session_id = ?');
  $stmt->execute([$session_id]);
  $sessionsRow = $stmt->fetch();


  $student_id = $sessionsRow->student_id; // get student id from current session
  $_SESSION['student_id'] = $student_id;
  // fetch student data
  $stmt = $pdo->prepare('SELECT * FROM tblstudents WHERE student_id = ?');
  $stmt->execute([$student_id]);
  $studentsRow = $stmt->fetch();

  $mentor_id = $sessionsRow->mentor_id; // get mentor id from current session
  $_SESSION['mentor_id'] = $mentor_id;
  $stmt = $pdo->prepare('SELECT * FROM tblmentors WHERE mentor_id = ?');
  $stmt->execute([$mentor_id]);
  $mentorsRow = $stmt->fetch();

  $user = $_SESSION['firstname'];
  $stmt = $pdo->prepare('SELECT * FROM users WHERE firstname = ?');
  $stmt->execute([$user]);
  $row = $stmt->fetch();
  $_SESSION['user_id'] = $row->id;

  // distribute data to all variables
  $firstname = $studentsRow->firstname;
  $lastname = $studentsRow->lastname;
  $academic = $studentsRow->academic_year;
  $email = $studentsRow->email;
  $mentor = $mentorsRow->firstname;

  $sessionType = $sessionsRow->session_type;
  $sessionStart = $sessionsRow->session_start;
  $sessionEnd = $sessionsRow->session_end;
  $course = $sessionsRow->course;
  $sessionNotes = $sessionsRow->notes;
  $sessionSemester = $sessionsRow->semester;
}

// declare an array to record the form value
$formVars = array('date' => $date, 'firstname' => $firstname, 'lastname' => $lastname, 'user' => $user, 'academic' => $academic,
                  'email' => $email, 'mentor' => $mentor, 'sessionType' => $sessionType, 'sessionStart' => $sessionStart, 
                  'sessionEnd' => $sessionEnd, 'course' => $course, 'sessionSemester' => $sessionSemester, 'sessionNotes' => $sessionNotes);

if($_SERVER["REQUEST_METHOD"] == "POST"){

  // Get froms input information
  $sessionType = $_POST['sessionType'];
  $sessionStart = $_POST['sessionStart'];
  $sessionEnd = $_POST['sessionEnd'];
  $sessionDuration = $sessionEnd - $sessionStart;
  $course = $_POST['course'];
  $sessionSemester = $_POST['semester'];
  $sessionNotes = test_input($_POST['sessionNotes']);


  $user_id = $_SESSION['user_id']; // Get user name
  $session_id = $_SESSION['session_id'];
  $student_id = $_SESSION['student_id'];
  $mentor_id = $_SESSION['mentor_id'];

  // update data for this session
  $sql = 'UPDATE tblsessions SET user_id = :user_id, student_id = :student_id, mentor_id = :mentor_id, course = :course, session_type = :session_type, 
                                semester = :semester, session_start = :session_start, session_end = :session_end, session_duration = :session_duration, 
                                notes = :notes, session_date = :session_date WHERE session_id = :session_id';
  $stmt = $pdo->prepare($sql);

  $stmt->execute(['user_id' => $user_id, 'student_id' => $student_id, 'mentor_id' => $mentor_id, 'course' => $course, 'session_type' => $sessionType, 'semester' => $sessionSemester, 
                'session_start' => $sessionStart, 'session_end' => $sessionEnd, 'session_duration' => $sessionDuration, 'notes' => $sessionNotes, 'session_date' => $date, 'session_id' => $session_id]);

  $_SESSION['message'] = "You have successfully updated a session!";
  header("location: sessions.php?updation=1");
}

?>
<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="sessions.php">Sessions</a></li>
            <li class="active">Edit Session</li>
        </ol>
    </div>
</section>

<section id="main">
    <div class="container">
      <div class="row">
        <?php sideMenu(0);?>
        <div class="col-md-9">
          <!-- Websitte overview -->
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">Edit Session</h3>
                </div>
                <div class="panel-body">
                  <?php sessionsForm($formVars) ?>
                </div>
              </div>
        </div>
      </div>
    </div>
</section>

<?php footer();?>