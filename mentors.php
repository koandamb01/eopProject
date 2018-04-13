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

    $sql = 'SELECT * FROM tblschedule WHERE mentor_id = :mentor_id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['mentor_id' => $mentor_id]);
    $row = $stmt->fetchAll();

    



?>


    



<?php endif; ?>



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
            <h4 class="modal-title" id="myModalLabel">Reports</h4>
        </div>

        <div class="modal-body">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Print</button>
      </div>
    </div>
  </div>
</div>
<!-- Footer -->
<?php footer(); ?>