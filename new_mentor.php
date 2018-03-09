<?php require 'functions/functions.php';
/* declare page variable */
$page = 'New Mentor';

/*start html beginning tags and display page navigation bar */
header_Nav($page);


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