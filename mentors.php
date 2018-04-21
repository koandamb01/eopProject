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
    if(isset($_GET['mentor_id'])){
        
        $mentor_id = $_GET['mentor_id'];
        require 'show_schedule.php';
    }
?>

<script>
    // Functions to print modals contents
document.getElementById("Print").onclick = function () {
    printElement(document.getElementById("printThis"));
};

function printElement(elem) {
    var domClone = elem.cloneNode(true);

    var $printSection = document.getElementById("printSection");

    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }

    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}
</script>

<!-- Footer -->
<?php footer(); ?>