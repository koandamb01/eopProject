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

require 'functions/pdo.php';
require 'functions/functions.php';
require 'functions/vars.php';
/* declare page variable */
$page = 'Mentors';

/*start html beginning tags and display page navigation bar */
header_Nav($page, $firstname);

/* Display section breadcrumb */
breadcrumb($page);

$course_name = '';

if(isset($_POST['search'])){

    if(empty($_POST['course'])){
        $stmt = $pdo->query('SELECT * FROM tblmentors ORDER BY firstname ASC');
        $rows = $stmt->fetchAll();
    }
    else{

        $course_name = $_POST['course'];

        $sql = 'SELECT DISTINCT mentor_id FROM tblcourses WHERE course_name = :course_name ORDER BY mentor_id ASC';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['course_name' => $course_name]);
        $row_ids = $stmt->fetchAll();

        $rows = new ArrayObject();
        foreach ($row_ids as $row_id) {
            $sql = 'SELECT * FROM tblmentors WHERE mentor_id = :mentor_id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['mentor_id' => $row_id->mentor_id]);
            $row = $stmt->fetch();

            $rows->append($row);
        }
    }
}
else{
    $stmt = $pdo->query('SELECT * FROM tblmentors ORDER BY firstname ASC');
    // Fecth all result after the search
    $rows = $stmt->fetchAll();
}



$today = date("l");

$days = array(1 => "Monday", 2 => "Tuesday", 3 => "Wednesday", 4 => "Thursday", 5 => "Friday"); // array the work week days


foreach ($days as $key => $value) {
    
    if ($value == $today) {
        $today = $key;
    }
}

// Prints the day, date, month, year, time, AM or PM
//echo date("l F jS\, Y h:i:s A") . "<br>";
?>
<section id="main">
    <div class="container">
       <form id="myForm" action="<?php echo(htmlspecialchars($_SERVER['PHP_SELF']));?>" method="post">
        <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
                <div class="row">
                    <div class="col-md-2">
                        <h3 class="panel-title">Mentors</h3>    
                    </div>

                    <div class="col-md-1 pull-right">
                        <button class="btn btn-warning" name="reset">Reset</button>
                    </div>

                    <div class="col-md-1 pull-right">
                        <button class="btn btn-success" name="search">Search</button>
                    </div>

                    <div class="col-md-3 pull-right">
                        <input class="form-control" type="text" name="course" value="<?php echo $course_name; ?>" pattern="[A-Za-z]{3}[0-9]{3}" title="Invalid Course Name!" placeholder="CRS101...">
                    </div>
                </div>
            </div>
        </form>

            <div class="panel-body">
                <br>
                <table class="table table-striped table-hover table-height">
                    <thead>
                        <tr>
                            <th>Edit</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>AcadYear</th>
                            <th>Email</th>
                            <th>Available Today?</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($rows as $row) {
                            echo '<tr>
                                    <td><a class="btn btn-sm btn-danger" href="edit_mentor.php?mentor_id=' .$row->mentor_id. '">Edit Mentor</a></td>
                                    <td>'. $row->firstname . '</td>
                                    <td>'. $row->lastname . '</td>
                                    <td>'. $row->academic_year . '</td>
                                    <td>'. $row->email . '</td>';

                            $sql = 'SELECT * FROM tblschedule WHERE mentor_id = :mentor_id AND day = :day';
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute(['mentor_id' => $row->mentor_id, 'day' => $today]);
                            $count = $stmt->rowCount();

                            if($count == 0){
                                echo '<td>No<td>';
                            }else{
                                echo '<td>Yes<td>';
                            }
                                echo '<td><a class="btn btn-sm btn-success" href="mentors.php?mentor_id=' .$row->mentor_id. '">Schedule</a></td>
                                </tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php 
    
if(isset($_GET['mentor_id'])):?>
<?php 
    $mentor_id = $_GET['mentor_id'];

    $sql = 'SELECT * FROM tblschedule WHERE mentor_id = :mentor_id AND period = :period ORDER BY day ASC';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['mentor_id' => $mentor_id, 'period' => 1]);
    $rows1 = $stmt->fetchAll();

    $stmt->execute(['mentor_id' => $mentor_id, 'period' => 2]);
    $rows2 = $stmt->fetchAll();

    $Schedule_1 = array();
    $Schedule_2 = array();


    for ($i=1; $i <= 5; $i++) { 
    
        $check = false;
        foreach ($rows1 as $row) {
            
            if($row->day == $i){
                $Schedule_1[$i] = array($row->start_at, $row->end_at);
                $check = true;
            }
        }

        if($check == false){
            $Schedule_1[$i] = 0;
        }
    }


    for ($i=1; $i <= 5; $i++) { 
    
        $check = false;
        foreach ($rows2 as $row) {
            
            if($row->day == $i){
                $Schedule_2[$i] = array($row->start_at, $row->end_at);
                $check = true;
            }
        }

        if($check == false){
            $Schedule_2[$i] = 0;
        }
    }
    
?>
    

<script>
   window.onload = function() {
    $('#MySchedule').modal('show');
   };
</script>

<!-- Modal for Printing  -->
<div class="modal fade bs-example-modal-lg" id="MySchedule" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php 
                $sql = 'SELECT firstname, lastname FROM tblmentors WHERE mentor_id = :mentor_id';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['mentor_id' => $mentor_id]);
                $row = $stmt->fetch();
            ?>
            <h4 class="modal-title" id="myModalLabel"><?php echo $row->firstname. ' ' .$row->lastname . '<h6>Latest Schedule</h6>'?></h4>
        </div>

        <div class="modal-body">
            <div class="well">
                <div class="row">
                    <div class="col-md-2 text-primary">
                        Period\Day
                    </div>

                    <div class="col-md-2">
                        Monday
                    </div>
                    <div class="col-md-2">
                        Tuesday
                    </div>
                    <div class="col-md-2">
                        Wednesday
                    </div>
                    <div class="col-md-2">
                        Thursday
                    </div>
                    <div class="col-md-2">
                        Friday
                    </div>
                </div>
        
                <!-- Morning Schedule -->
                <div class="row">
                    <hr>
                    <div class="col-md-2">Morning</div>
                <?php
                    foreach ($Schedule_1 as $key => $value) {
    
                        if($value == 0){
                            echo '<div class="col-md-2 bg-danger"><br><br><br></div>';
                        }
                        else{
                            echo '<div class="col-md-2">' . $value[0] . '<br> TO <br>'. $value[1] . '</div>';
                        }
                    }    
                ?>
                </div>
                
                <!-- Evening Schedule -->
                <div class="row">
                    <hr>
                    <div class="col-md-2">Evening</div>
                <?php
                    foreach ($Schedule_2 as $key => $value) {
    
                        if($value == 0){
                            echo '<div class="col-md-2 bg-danger"><br><br><br></div>';
                        }
                        else{
                            echo '<div class="col-md-2">' . $value[0] . '<br> TO <br>'. $value[1] . '</div>';
                        }
                    }     
                ?>
                </div>
            </div>
            <br>

            <?php
                $sql = 'SELECT course_name FROM tblcourses WHERE mentor_id = :mentor_id ORDER BY course_name ASC';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['mentor_id' => $mentor_id]);
                $rows = $stmt->fetchAll();
             ?>
             <h6>Mentor Courses</h6>
             <div class="well">
                 <div class="row">
                    <?php foreach ($rows as $row): ?>
                        <div class="col-md-2"><?php echo $row->course_name; ?></div>
                    <?php endforeach ?>
                </div>
             </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Print</button>
      </div>
    </div>
  </div>
</div>


<?php endif; ?>


<!-- Footer -->
<?php footer(); ?>