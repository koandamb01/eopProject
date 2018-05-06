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
$page = 'Dashboard';

/*start html beginning tags and display page navigation bar */
header_Nav($page, $firstname);

/* Display section breadcrumb Side Menu*/
breadcrumb($page);

// require summary data
require 'datasummary.php';

// run query for session data
$stmt = $pdo->query('SELECT * FROM tblsessions ORDER BY session_date DESC');
// Fecth all result after the search
$rows = $stmt->fetchAll();
//$sessionCount = $stmt->rowCount();
?>
<!-- body -->
<section id="main">
    <div class="container">
        <div class="row">
        <?php sideMenu(0);?>
            <div class="col-md-9">
                <!-- Websitte overview -->
                <div class="panel panel-default">
                    <div class="panel-heading main-color-bg">
                        <h3 class="panel-title"><?php echo $currentSemester.' Semester Overview'?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-3">
                            <div class="well dash-box">
                                <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $studentCount; ?></h2>
                                <h4>Students</h4>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="well dash-box">
                                <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <?php echo $acadMentoringCount; ?></h2>
                                <h4>Tutorials</h4>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="well dash-box">
                                <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <?php echo $aegisCount; ?></h2>
                                <h4>AEGIS</h4>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="well dash-box">
                                <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> <?php echo $totalHours; ?></h2>
                                <h4>Total Hours</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Latest users -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Latest Students Attendance</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-hover">
                           <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>AcadYear</th>
                                    <th>Email</th>
                                    <th>Conselor</th>
                                    <th>Date</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php foreach($rows as $row):
                                    
                                    $sql = 'SELECT * FROM tblstudents WHERE student_id = :student_id';
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute(['student_id' => $row->student_id]);
                                    $student = $stmt->fetch();

                                    //find the mentor associate to that session
                                    $sql = 'SELECT lastname FROM users WHERE c_code = :c_code';
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute(['c_code' => $student->c_code]);
                                    $counselor = $stmt->fetch();

                                    $date = strtotime($row->session_date);
                                    $date = date('M j, Y', $date);
                                ?>

                                <tr>
                                    <td><?php echo $student->lastname.', '.$student->firstname;?></td>
                                    
                                    <td><?php echo $student->academic_year;?></td>
                                    <td><?php echo $student->email;?></td>
                                    <td><?php echo $counselor->lastname;?></td>
                                    <td><?php echo $date;?></td>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End body -->

<?php footer(); ?>