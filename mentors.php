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

$stmt = $pdo->query('SELECT * FROM tblmentors ORDER BY firstname ASC');

//if(isset($_POST['search'])){


// Fecth all result after the search
$rows = $stmt->fetchAll();


$today = date("l");

$days = array(1 => "Monday", 2 => "Tuesday", 3 => "Wednesday", 4 => "Thursday", 5 => "Friday"); // array the work week days


foreach ($days as $key => $value) {
    
    if ($value == $today) {
        $today = $key;
    }
}

// Prints the day, date, month, year, time, AM or PM
echo date("l F jS\, Y h:i:s A") . "<br>";
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
                        <button class="btn btn-success" name="CRSsearch">Search</button>
                    </div>

                    <div class="col-md-3 pull-right">
                        <input class="form-control" type="text" name="searchInput" placeholder="CRS101...">
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
                                    echo '<td><a class="btn btn-sm btn-success" href="mentors.php?mentor_id=' .$row->mentor_id. '">Schedule</a></td>';
                                        
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
            <div class="row">
                <div class="col-md-2">
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
                <div class="row">
                    <hr>
                    <div class="col-md-2">1</div>
                <?php
                    foreach ($rows1 as $row) {
    
                        if($row->day == 1){
                            echo '<div class="col-md-2">' . $row->start_at . '<br> TO <br>'. $row->end_at . '</div>';
                        }


                        elseif ($row->day == 2){
                            echo '<div class="col-md-2">' . $row->start_at . '<br> TO <br>'. $row->end_at . '</div>';
                        }


                        elseif ($row->day == 3){
                            echo '<div class="col-md-2">' . $row->start_at . '<br> TO <br>'. $row->end_at . '</div>';
                        }


                        elseif ($row->day == 4){
                            echo '<div class="col-md-2">' . $row->start_at . '<br> TO <br>'. $row->end_at . '</div>';
                        }

                        elseif ($row->day == 5){
                            echo '<div class="col-md-2">' . $row->start_at . '<br> TO <br>'. $row->end_at . '</div>';
                        }

                    }
                        
                ?>
            </div><br>

            <?php
                $sql = 'SELECT course_name FROM tblcourses WHERE mentor_id = :mentor_id ORDER BY course_name ASC';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['mentor_id' => $mentor_id]);
                $rows = $stmt->fetchAll();
             ?>
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