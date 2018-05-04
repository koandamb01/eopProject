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
$page = 'Sessions';

/*start html beginning tags and display page navigation bar */
header_Nav($page, $firstname);

/* Display section breadcrumb */
breadcrumb($page);

$mentor_id = $session = $message = '';
// run query for session data
$stmt = $pdo->query('SELECT * FROM tblsessions ORDER BY session_date ASC');


if(isset($_POST['filter'])){
    
    if(isset($_POST['session'])){
        $sessionSelect = $_POST['session'];
        
        if($_POST['session'] == 'Session Type'){
            $session = '';
        }else{
            $session = $_POST['session'];
        }
    }

    if(isset($_POST['mentor'])){
        $mentorSelect = $_POST['mentor'];
        
        if($_POST['mentor'] == 'Mentor'){
            $mentor = '';
        }else{
            $mentor = $_POST['mentor'];
        }
    }

    if (empty($mentor) AND empty($session)) {
        # DO NOTHING
    }
    else{
        // convert counselor name to code
        if(!empty($mentor)){
            $sql = 'SELECT mentor_id FROM tblmentors WHERE firstname = :firstname';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['firstname' => $mentor]);
            $row = $stmt->fetch();
            $mentor_id = $row->mentor_id;
        }

        $sql = 'SELECT * FROM tblsessions WHERE mentor_id = :mentor_id OR session_type = :session_type ORDER BY session_date ASC';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['mentor_id' => $mentor_id, 'session_type' => $session]);
    }    
}
// Fecth all result after the search
$rows = $stmt->fetchAll();

if(isset($_GET['updation'])){
  $message = $_SESSION['message'];
}
?>
   
<section id="main">
    <div class="container">
        <h4 class="text-center text-primary"><?php echo $message; ?></h4>
        <form action="<?php echo(htmlspecialchars($_SERVER['PHP_SELF']));?>" method="post">
        <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
                <div class="row">
                    <div class="col-md-2">
                        <h3 class="panel-title">Sessions</h3>
                    </div>
                    
                    <div class="col-md-1 pull-right">
                        <button class="btn btn-primary" name="reset">Reset</button>
                    </div>

                    <div class="col-md-1 pull-right">
                        <button class="btn btn-success" name="filter">Filter</button>
                    </div>
                    
                    <div class="col-md-2 pull-right">
                        <select class="form-control" name="session" value="<?php echo $session; ?>"> 
                    <?php
                        global $sessionsList;

                        $sessions = $sessionsList;
                        $sessions[0] = 'Session Type';

                         foreach ($sessions as $value) {
                            if ($value == $sessionSelect) {
                                $selected = 'selected = "selected"';    
                            }else{
                                $selected = '';
                            }
                            echo "<option value='$value' $selected>$value</option>";
                        }
                    ?>
                        </select>
                    </div>
                    
                    <!-- pull right/left align column items to the right/left -->
                    <div class="col-md-2 pull-right">
                        <select class="form-control" name="mentor" value="<?php echo $mentor; ?>">
                      <?php
                            global $mentorsList;

                            $mentors = $mentorsList;
                            $mentors[0] = 'Mentor';

                             foreach ($mentors as $value) {
                                if ($value == $mentorSelect) {
                                    $selected = 'selected = "selected"';    
                                }else{
                                    $selected = '';
                                }
                                echo "<option value='$value' $selected>$value</option>";
                            }
                        ?>
                        </select>
                    </div>
                </div>
            </div>
        </form>

            <div class="panel-body">
                <br>
                <table class="table table-striped table-hover table-height">
                   <thead>
                       <tr>
                            <th>Title</th>
                            <th>Course</th>
                            <th>Student</th>
                            <th>Mentor</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                   </thead>
                    
                    <tbody>
                        <?php foreach($rows as $row):?>
                            <tr>
                                <td><?php echo $row->session_type;?></td>
                                <td><?php echo $row->course;?></td>
                                <?php
                                    $sql = 'SELECT firstname, lastname FROM tblstudents WHERE student_id = :student_id';
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute(['student_id' => $row->student_id]);
                                    $student = $stmt->fetch();

                                    //find the mentor associate to that session
                                    $sql = 'SELECT firstname, lastname FROM tblmentors WHERE mentor_id = :mentor_id';
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute(['mentor_id' => $row->mentor_id]);
                                    $mentor = $stmt->fetch();

                                    $date = strtotime($row->session_date);
                                    $date = date('M j, Y', $date);
                                ?>
                                <td><?php echo $student->lastname.', '.$student->firstname;?></td>
                                <td><?php echo $mentor->lastname.', '.$mentor->firstname;?></td>
                                <td><?php echo $date;?></td>
                               
                        <?php echo '<td><a class="btn btn-sm btn-warning" href="edit_session.php?session_id=' .$row->session_id. '">Edit Session</a></td></tr>'; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php footer(); ?>