<?php require 'functions/functions.php';
/* declare page variable */
$page = 'New Session';

/*start html beginning tags and display page navigation bar */
header_Nav($page);

/* Declarer form variables */
$firstname = $lastname = $user = $academic = $iseop = $email = $counselor = "";
$mentor = $sessionType = $sessionStart = $sessionEnd = $sessionCourse = $sessionNotes = "";

$timestamp = time();
$date = date('Y-m-d', $timestamp);

// declare an array to record the form value
$formVars = array('date' => $date, 'firstname' => $firstname, 'lastname' => $lastname, 'user' => $user, 'academic' => $academic,
                  'iseop' => $iseop, 'email' => $email, 'counselor' => $counselor, 'mentor' => $mentor,
                  'sessionType' => $sessionType, 'sessionStart' => $sessionStart, 'sessionEnd' => $sessionEnd, 'sessionCourse' => $sessionCourse, 'sessionNotes' => $sessionNotes);
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
      <div class="row">
        <?php sideMenu();?>
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