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


$stmt = $pdo->query('SELECT * FROM tblstudents ORDER BY firstname ASC');
$rows = $stmt->fetchAll();


?>
<section id="main">
    <div class="container">
        <form action="<?php echo(htmlspecialchars($_SERVER['PHP_SELF']));?>" method="post">
            <div class="row">
                <div class="col-md-3">
                    <input class="form-control" type="text" name="firstname" placeholder="First Name..">
                </div>

                <div class="col-md-3">
                    <input class="form-control" type="text" name="lastname" placeholder="Last Name..">
                </div>
                
                <div class="col-md-1">
                    <button class="btn btn-success" type="submit" name="search">Search</button>
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
                        <select class="form-control" name="counselor">
                        <?php
                            $counselor_select_option = 'Counselor';
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
                        <select class="form-control">
                            <option value="">Academic Year</option>
                            <option value="freshman">Freshman</option>
                            <option value="sophomore">Sophomore</option>
                            <option value="junior">Junior</option>
                            <option value="senior">Senior</option>
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
                            <th>IsEOP</th>
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
                                    $sql = 'SELECT firstname FROM users WHERE id = :id';
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute(['id' => $row->counselor_pin]);
                                    $counselor = $stmt->fetch();

                            echo '<td>'. $counselor->firstname . '</td>';
                                    
                                    if($row->is_eop == 1){
                                        echo '<td>Yes</td>';
                                    }
                                    elseif($row->is_eop == 0){
                                        echo '<td>No</td>';
                                    }
                                    else{
                                        echo '<td>Unknow</td>';
                                    }

                            echo '<td><a class="btn btn-sm btn-success" href="new_session.php?id=' .$row->student_id. '">New Session</a></td>
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