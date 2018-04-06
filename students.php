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
$page = 'Students';

/*start html beginning tags and display page navigation bar */
header_Nav($page, $firstname);

/* Display section breadcrumb horizontal small menu*/
breadcrumb($page);

$firstname = $lastname = $academic_year = $counselor = $c_code = "";
$stmt = $pdo->query('SELECT * FROM tblstudents ORDER BY firstname ASC');


if(isset($_POST['search'])){

    if(empty($_POST['firstname']) AND empty($_POST['lastname'])){

        $stmt = $pdo->query('SELECT * FROM tblstudents ORDER BY firstname ASC');
    }
    else{
         // check if input firstname is empty
        if(empty($_POST['firstname'])){

        }else{
            $firstname = '%'.$_POST['firstname'].'%';
        }

        // check if input lastname is empty
        if(empty($_POST['lastname'])){
            
        }else{
            $lastname = '%'.$_POST['lastname'].'%';
        }

        $sql = 'SELECT * FROM tblstudents WHERE firstname LIKE :firstname OR lastname LIKE :lastname ORDER BY firstname ASC';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['firstname' => $firstname, 'lastname' => $lastname]);
    }
   
    // reassign the
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

}
elseif(isset($_POST['filter'])){
    
    if(isset($_POST['academic_year'])){
        $acad_select_option = $_POST['academic_year'];
        
        if($_POST['academic_year'] == 'Academic Year'){
            $academic_year = '';
        }else{
            $academic_year = $_POST['academic_year'];
        }
    }

    if(isset($_POST['counselor'])){
        $counselor_select_option = $_POST['counselor'];
        
        if($_POST['counselor'] == 'Counselor'){
            $counselor = '';
        }else{
            $counselor = $_POST['counselor'];
        }
    }

    if (empty($counselor) AND empty($academic_year)) {
        # DO NOTHING
    }
    else{
        // convert counselor name to code
        if(!empty($counselor)){
            $sql = 'SELECT c_code FROM users WHERE firstname = :firstname';
            $c_stmt = $pdo->prepare($sql);
            $c_stmt->execute(['firstname' => $counselor]);
            $row = $c_stmt->fetch();
            $c_code = $row->c_code;
        }

        $sql = 'SELECT * FROM tblstudents WHERE academic_year = :academic_year OR c_code = :c_code ORDER BY firstname ASC';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['academic_year' => $academic_year, 'c_code' => $c_code]);
    }    
}

// Fecth all result after the search
$rows = $stmt->fetchAll();
?>
<section id="main">
    <div class="container">
        <form action="<?php echo(htmlspecialchars($_SERVER['PHP_SELF']));?>" method="post">
            <div class="row">
                <div class="col-md-3">
                    <input class="form-control" type="text" name="firstname" value="<?php echo $firstname; ?>" placeholder="First Name..">
                </div>

                <div class="col-md-3">
                    <input class="form-control" type="text" name="lastname" value="<?php echo $lastname; ?>" placeholder="Last Name..">
                </div>
                
                <div class="col-md-1">
                    <button class="btn btn-success" name="search">Search</button>
                </div>
            </div><br>
        <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
                <div class="row">
                    <div class="col-md-2">
                        <h3 class="panel-title">Students</h3>
                    </div>

                    <div class="col-md-1 pull-right">
                        <button class="btn btn-primary" name="reset">Reset</button>
                    </div>

                    <div class="col-md-1 pull-right">
                        <button class="btn btn-success" name="filter">Filter</button>
                    </div>

                    <div class="col-md-2 pull-right">
                        <select class="form-control" name="counselor" value="<?php echo $counselor; ?>">
                        <?php
                            global $counselor_lists;

                            $counselors = $counselor_lists;
                            array_unshift($counselors, 'Counselor');

                             foreach ($counselors as $value) {
                                if ($value == $counselor_select_option) {
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
                        
                        <select class="form-control" name="academic_year">
                            <?php
                                global $academicYear;
                                $academic = $academicYear;
                                
                                array_unshift($academic, 'Academic Year');

                                foreach ($academic as $value) {
                                    if ($value == $acad_select_option) {
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
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>AcadYear</th>
                            <th>Email</th>
                            <th>Conselor</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                        foreach ($rows as $row) {
                             echo '<tr>
                                    <td>'. $row->firstname . '</td>
                                    <td>'. $row->lastname . '</td>
                                    <td>'. $row->academic_year . '</td>
                                    <td>'. $row->email . '</td>';
                                    
                                    //find the counselor associate to that student by pin
                                    $sql = 'SELECT firstname FROM users WHERE c_code = :c_code';
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute(['c_code' => $row->c_code]);
                                    $counselor = $stmt->fetch();

                            echo '<td>'. $counselor->firstname . '</td>';

                            echo '<td><a class="btn btn-sm btn-success" href="new_session.php?student_id=' .$row->student_id. '">New Session</a></td>
                                  </tr>';
                         } 
                     ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php footer(); ?>