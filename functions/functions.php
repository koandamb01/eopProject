<?php
include 'vars.php';
/* -- Start of the header_navigation function -- */
function header_Nav($page, $firstname){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page; ?></title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<!-- onload="showshedule()" -->
<?php if ($page == 'Edit Mentor'): ?>
    <body onload="showshedule()">
<?php else: ?>
    <body>
<?php endif ?>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"></button>
                <a class="navbar-brand" href="home.php">EOP Database</a>
            </div>

    <?php if($page == 'Dashboard'): ?>

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home.php">Dashboard</a></li>
                    <li><a href="students.php">Students</a></li>
                    <li><a href="sessions.php">Sessions</a></li>
                    <li><a href="mentors.php">Mentors</a></li>
                    <li><a href="reports.php">Reports</a></li>
                    <li><a href="users.php">Users</a></li>
                    <li><a href="upload_students.php">Upload</a></li>
                </ul>

    <?php elseif ($page == 'Students'):?>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Dashboard</a></li>
                    <li class="active"><a href="students.php">Students</a></li>
                    <li><a href="sessions.php">Sessions</a></li>
                    <li><a href="mentors.php">Mentors</a></li>
                    <li><a href="reports.php">Reports</a></li>
                    <li><a href="users.php">Users</a></li>
                    <li><a href="upload_students.php">Upload</a></li>
                </ul>

    <?php elseif($page == 'Sessions'): ?>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Dashboard</a></li>
                    <li><a href="students.php">Students</a></li>
                    <li class="active"><a href="sessions.php">Sessions</a></li>
                    <li><a href="mentors.php">Mentors</a></li>
                    <li><a href="reports.php">Reports</a></li>
                    <li><a href="users.php">Users</a></li>
                    <li><a href="upload_students.php">Upload</a></li>
                </ul>

    <?php elseif($page == 'Mentors'): ?>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Dashboard</a></li>
                    <li><a href="students.php">Students</a></li>
                    <li><a href="sessions.php">Sessions</a></li>
                    <li class="active"><a href="mentors.php">Mentors</a></li>
                    <li><a href="reports.php">Reports</a></li>
                    <li><a href="users.php">Users</a></li>
                    <li><a href="upload_students.php">Upload</a></li>
                </ul>

    <?php elseif($page == 'Reports'): ?>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Dashboard</a></li>
                    <li><a href="students.php">Students</a></li>
                    <li><a href="sessions.php">Sessions</a></li>
                    <li><a href="mentors.php">Mentors</a></li>
                    <li class="active"><a href="reports.php">Reports</a></li>
                    <li><a href="users.php">Users</a></li>
                    <li><a href="upload_students.php">Upload</a></li>
                </ul>

    <?php elseif($page == 'Users'): ?>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Dashboard</a></li>
                    <li><a href="students.php">Students</a></li>
                    <li><a href="sessions.php">Sessions</a></li>
                    <li><a href="mentors.php">Mentors</a></li>
                    <li><a href="reports.php">Reports</a></li>
                    <li class="active"><a href="users.php">Users</a></li>
                    <li><a href="upload_students.php">Upload</a></li>
                </ul>

    <?php elseif($page == 'Upload'): ?>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Dashboard</a></li>
                    <li><a href="students.php">Students</a></li>
                    <li><a href="sessions.php">Sessions</a></li>
                    <li><a href="mentors.php">Mentors</a></li>
                    <li><a href="reports.php">Reports</a></li>
                    <li><a href="users.php">Users</a></li>
                    <li class="active"><a href="upload_students.php">Upload</a></li>
                </ul>

    <?php else: ?>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Dashboard</a></li>
                    <li><a href="students.php">Students</a></li>
                    <li><a href="sessions.php">Sessions</a></li>
                    <li><a href="mentors.php">Mentors</a></li>
                    <li><a href="reports.php">Reports</a></li>
                    <li><a href="users.php">Users</a></li>
                    <li><a href="upload_students.php">Upload</a></li>
                </ul>

    <?php endif; ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Welcome, <?php echo $firstname; ?></a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">

            <?php if ($page== 'Edit Session' OR $page == 'New Session' OR $page == 'New Mentor' OR $page == 'Edit Mentor'): ?>
                <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <?php echo $page; ?></h1>
            <?php else: ?>
                <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <?php echo $page; ?><small> Manage</small></h1>
            <?php endif ?>
                    
            </div>
        <?php if ($page == 'Edit Session' OR $page == 'New Session' OR $page == 'New Mentor' OR $page == 'Edit Mentor' OR $page == 'Users' OR $page == 'Upload'): ?>
                <!-- Nothing -->
        <?php else: ?>
            <div class="col-md-2">
                <div class="dropdown">
        <?php if ($page == 'Reports'): ?>
                    <button class="btn btn-default" type="button" data-toggle="modal" data-target="#printReport">Print Report</button>
        <?php else: ?>
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Create Content
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <!--li><a type="button" href="new_session.php">Add Session</a></li-->
                        <li><a type="button" href="new_mentor.php">Add Mentor</a></li>
                    </ul>
        <?php endif ?>
                    
                </div>
            </div>
        </div>
    <?php endif; ?>
    </div>
</header>
<?php }?>
<!--End of the header_navigation function -->


<!-- Begin Session Breadcrumb function -->
<?php function breadcrumb($page){?>
    <section id="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="home.php">Dashboard</a></li>
    <?php if($page == 'Dashboard'): ?>
        <!-- do nothing -->
    <?php else: ?>
                <li class="active"><?php echo $page; ?></li>
                <?php if($page == 'Upload'): ?>
                    <li class="text-danger"><?php echo "*** Before uploading any data make sure all excel columns are in the right place ***"; ?></li>
                 <?php endif; ?>   
    <?php endif; ?>
            </ol>
        </div>
    </section>
<?php }?>
<!-- End Session Breadcrumb function -->


<!-- Begin report Breadcrumb function-->
<?php function reportsBreadcrumb($menu){?>

    <section id="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">

        <?php if ($menu == 'All Students'): ?>
            <li><a href="home.php">Dashboard</a></li>
            <li class="active"><?php echo $menu; ?></li>
            <li><a href="student_reports.php">Each Student</a></li>
            <li><a href="end_reports.php">Year Breakdown</a></li>

        <?php elseif($menu  == 'Each Students'): ?>
            <li><a href="home.php">Dashboard</a></li>
            <li><a href="reports.php">All Students</a></li>
            <li class="active"><?php echo $menu; ?></li>
            <li><a href="end_reports.php">Year Breakdown</a></li>
        
        <?php elseif($menu == 'Year Breakdown'): ?>
            <li><a href="home.php">Dashboard</a></li>
            <li><a href="reports.php">All Students</a></li>
            <li><a href="student_reports">Each Student</a></li>
            <li class="active"><?php echo $menu; ?></li>
        <?php endif ?>
            </ol>
        </div>
    </section>
<?php } ?>

<!-- End report Breadcrumb function-->


<!-- Begin of footer function -->
<?php function footer(){?>
<!-- Footer -->
<footer id="footer">
    <p>Copyright EOP Database, &copy; 2018</p>
</footer>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/validation.js"></script>
</body>

</html>
<?php } ?>
<!-- End of footer function -->

<?php
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>


<!-- Begin of Side Menu function -->
<?php function sideMenu($x){
    require 'datasummary.php';
?>
<?php if($x == 1):?>
    <div class="col-md-2">
<?php else: ?>
    <div class="col-md-3">
<?php endif; ?>
    <div class="list-group">
        <a href="home.php" class="list-group-item active main-color-bg">Dashboard</a>
        <a href="students.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Students <span class="badge"><?php echo $studentCount; ?></span> </a>
        <a href="sessions.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Sessions <span class="badge"><?php echo $sessionCount;?></span> </a>
        <a href="mentors.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Mentors <span class="badge"><?php echo $mentorCount; ?></span> </a>
        <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge"><?php echo $userCount; ?></span> </a>
    </div><br>
    <?php
        $freshmanPercent = round(($freshmanCount / $studentCount) * 100);
        $sophomorePercent = round(($sophomoreCount / $studentCount) * 100);
        $juniorPercent = round(($juniorCount / $studentCount) * 100);
        $seniorPercent = round(($seniorCount / $studentCount) * 100);
    ?>
    <div class="well">
        <h4>Freshman Attendance</h4>
        <div class="progress">
            <?php echo '<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:'.$freshmanPercent.'%">'.$freshmanPercent.'%</div>' ?>
        </div>

        <h4>Sophomore Attendance</h4>
        <div class="progress">
            <?php echo '<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:'.$sophomorePercent.'%">'.$sophomorePercent.'%</div>' ?>
        </div>

        <h4>Junior Attendance</h4>
        <div class="progress">
            <?php echo '<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:'.$juniorPercent.'%">'.$juniorPercent.'%</div>' ?>
        </div>

        <h4>Senior Attendance</h4>
        <div class="progress">
            <?php echo '<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:'.$juniorPercent.'%">'.$juniorPercent.'%</div>' ?>
        </div>
    </div>
</div>
<?php }; ?>
<!-- End of Side Menu function -->



<!-- Begin of sessionForm function -->
<?php function sessionsForm($formVars){?>
<form id="myForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" onsubmit="return validateForms('s')">
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date" value="<?php echo $formVars['date'];?>" placeholder="Page Title">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group"><br>
                    <h4 class="bg-danger"><?php echo '*'.$formVars['user']; ?></h4>
                </div>
            </div>
        </div>

<!-- Student Info -->
        <div class="well">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First name</label>
                        <span id="fnameErr"></span>
                        <input type="text" class="form-control" name="firstname" value="<?php echo $formVars['firstname'];?>" placeholder="First Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last name</label>
                        <span id="lnameErr"></span>
                        <input type="text" class="form-control" name="lastname" value="<?php echo $formVars['lastname'];?>" placeholder="Last Name">
                    </div>
                </div>
            </div>
    <!-- Academic Year -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Academic Year</label>
                        <span id="academicErr"></span>
                        <select class="form-control" name="academic">
                        <?php
                            $acad_select_option = $formVars['academic'];
                            global $academicYear;
                            $academic = $academicYear;
                            
                            array_unshift($academic, '');

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
                
                <div class="col-md-6">
                    <div class="form-group">
                        <span id="emailErr"></span>
                        <label>Student Buffalo State Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $formVars['email'];?>" placeholder="someone@mail.buffalostate.edu...">
                    </div>
                </div>
            </div>
        </div>

<!-- Mentor -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Mentor Name</label>
                    <span id="mentorErr"></span>
                    <select class="form-control" name="mentor">
                       <?php
                            $mentor_select_option = $formVars['mentor'];
                            global $mentorsList;

                            foreach ($mentorsList as $value) {
                                if ($value == $mentor_select_option) {
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

            <div class="col-md-6">
                <div class="form-group">
                    <label>Session Type</label>
                    <span id="sessionTypeErr"></span>
                    <select class="form-control" name="sessionType">
                    <?php
                        $sessionType_select = $formVars['sessionType']; 
                        global $sessionsList;
                        foreach ($sessionsList as $value) {
                            if ($value == $sessionType_select) {
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

<!-- Sesstion type -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Session Start</label>
                    <span id="sessionStartErr"></span>
                    <input type="time" class="form-control" name="sessionStart" value="<?php echo $formVars['sessionStart'];?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Session End</label>
                    <span id="sessionEndErr"></span>
                    <input type="time" class="form-control" name="sessionEnd" value="<?php echo $formVars['sessionEnd'];?>">
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label>Course Name</label>
            <span id="sessionCourseErr"></span>
            <input type="text" class="form-control" name="course" value="<?php echo $formVars['course'];?>" placeholder="Example: CIS101">
        </div>
       

        <br>
        <span id="semesterErr"></span>
        <div class="well well-bg">
            <div class="row">
                <div class="col-md-4">
                    <input type="radio" name="semester" value="fall" <?php if ($formVars['sessionSemester'] == "fall") echo "checked";?>> Fall
                </div>

                <div class="col-md-4">
                    <input type="radio" name="semester" value="spring" <?php if ($formVars['sessionSemester'] == "spring") echo "checked";?>> Spring
                </div>

                <div class="col-md-4">
                    <input type="radio" name="semester" value="summer" <?php if ($formVars['sessionSemester'] == "summer") echo "checked";?>> Summer
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label>Academic Mentor Notes</label>
            <textarea class="form-control" rows="3" cols="50" name="sessionNotes" value="<?php echo $formVars['sessionNotes'];?>" placeholder="Any notes regarding this session"></textarea>
        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" name="saveChanges" class="btn btn-primary">Save changes</button>
    </div>
</form>

<!--script type="text/javascript">
    // event lister to the checkbox IsEOP
    // Disabled the Counselor dropdown menu if Iseop checkbox is check

    var checkbox = document.querySelector("input[name=iseop]");
    checkbox.addEventListener( 'change', function() {
        if(this.checked) {
            document.forms['myForm']['counselor'].style.border = "1px solid #ccc";
            document.getElementById("counselorErr").style.display = 'none';
            document.forms['myForm']['counselor'].disabled = true;
        } else {
            document.forms['myForm']['counselor'].disabled = false;
        }
    });
</script-->
<?php }?>
<!-- End of sessionForm function -->


<!-- Begin mentor form function -->
<?php function mentorForm($x, $formVars){?>
<form id="myForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" onsubmit="return validateForms('m')">
    <div class="modal-body">
        <!-- Student Info -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>First name</label>
                    <span id="fnameErr"></span>
                    <input type="text" class="form-control" name="firstname" value="<?php echo $formVars['firstname']; ?>" placeholder="First Name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Last name</label>
                    <span id="lnameErr"></span>
                    <input type="text" class="form-control" name="lastname" value="<?php echo $formVars['lastname']; ?>" placeholder="Last Name">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <span id="emailErr"></span>
                    <label>Student Buffalo State Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $formVars['email']; ?>" placeholder="someone@mail.buffalostate.edu...">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Academic Year</label>
                    <span id="academicErr"></span>
                    <select class="form-control" name="academic">
                    <?php
                        $acad_select_option = $formVars['academic'];
                        global $academicYear;
                        $academic = $academicYear;
                        
                        array_unshift($academic, '');

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
        </div><br>
        
        <label>Mentor Weekly Schedule</label>
        <span id="TimeErr"></span>
        <div class="well">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Monday</label><br>
                        FROM<input type="time" class="time1From form-control" name="MonFrom1">
                        TO<input type="time" class="time1To form-control" name="MonTo1">
                    </div>

                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Tuesday</label><br>
                        FROM<input type="time" class="time1From form-control" name="TueFrom1">
                        TO<input type="time" class="time1To form-control" name="TueTo1">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Wednesday</label><br>
                        FROM<input type="time" class="time1From form-control" name="WedFrom1">
                        TO<input type="time" class="time1To form-control" name="WedTo1">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Thursday</label><br>
                        FROM<input type="time" class="time1From form-control" name="ThuFrom1">
                        TO<input type="time" class="time1To form-control" name="ThuTo1">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Friday</label><br>
                        FROM<input type="time" class="time1From form-control" name="FriFrom1">
                        TO<input type="time" class="time1To form-control" name="FriTo1">
                    </div>
                </div>
            </div>
            <h4 class="text-danger text-center">Second hours sections</h4>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Monday</label><br>
                        FROM<input type="time" class="time2From form-control" name="MonFrom2">
                        TO<input type="time" class="time2To form-control" name="MonTo2">
                    </div>

                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Tuesday</label><br>
                        FROM<input type="time" class="time2From form-control" name="TueFrom2">
                        TO<input type="time" class="time2To form-control" name="TueTo2">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Wednesday</label><br>
                        FROM<input type="time" class="time2From form-control" name="WedFrom2">
                        TO<input type="time" class="time2To form-control" name="WedTo2">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Thursday</label><br>
                        FROM<input type="time" class="time2From form-control" name="ThuFrom2">
                        TO<input type="time" class="time2To form-control" name="ThuTo2">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Friday</label><br>
                        FROM<input type="time" class="time2From form-control" name="FriFrom2">
                        TO<input type="time" class="time2To form-control" name="FriTo2">
                    </div>
                </div>
            </div>


            <!--div class="row" id="secondHours"></div>
            <div class="row">
                <div class="col-md-6">
                    <a class="glyphicon glyphicon-minus" onclick="removeHours()"></a>
                </div>

                <div class="col-md-6">
                    <a class="glyphicon glyphicon-plus pull-right" onclick="addHours()"></a>
                </div>
            </div-->
        </div><br>

        <?php if ($x == 0): ?>
            <label>Mentor Courses Tutor</label>
            <span id="CourseErr"></span>
            <div class="well">
                <div class="row" id="fields">
                    <div class="col-md-3" id="field1">
                        <div class="form-group">
                            <label>Course 1</label>
                            <input type="text" class="courses form-control" name="course[]" placeholder="CRS 101...">
                        </div>
                    </div>

                    <div class="col-md-3" id="field2">
                        <div class="form-group">
                            <label>Course 2</label>
                            <input type="text" class="courses form-control" name="course[]" placeholder="CRS 101...">
                        </div>
                    </div>

                    <div class="col-md-3" id="field3">
                        <div class="form-group">
                            <label>Course 3</label>
                            <input type="text" class="courses form-control" name="course[]" placeholder="CRS 101...">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group" id="field4">
                            <label>Course 4</label>
                            <input type="text" class="courses form-control" name="course[]" placeholder="CRS 101...">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <a class="glyphicon glyphicon-minus" onclick="removefields()"></a>
                    </div>

                    <div class="col-md-6">
                        <a class="glyphicon glyphicon-plus pull-right" onclick="addfields()"></a>
                    </div>
                </div>
            </div>

        <?php else: ?>
            <span id="CourseErr"></span>
            <div class="well">
                <div class="row">
                    <div class="col-md-3">
                        <button type="button" class="btn btn-warning pull-left" onclick="showfields(1)">Remove a course</button>
                    </div>

                    <div class="col-md-2">
                        <input type="text" id="crs1" class="courses form-control hide" placeholder="CRS 101...">
                    </div>

                    <div class="col-md-2">
                        <button type="button" id="btn-crs" class="btn btn-danger hide pull-left" onclick="RemoveCourse()">Delete</button>
                    </div>

                    <div class="col-md-5" id="Removeresult"></div>
                </div>
            </div>
            
            <div class="well">
                <div class="row">
                    <div class="col-md-3">
                        <button type="button" class="btn btn-warning pull-left" onclick="showfields(0)">Add Course</button>
                    </div>

                    <div class="col-md-2">
                        <input type="text" id="crs2" class="courses form-control hide" placeholder="CRS 101...">
                    </div>

                    <div class="col-md-2">
                        <button type="button" id="addbtn" class="btn btn-danger hide pull-left" onclick="AddCourse()">Add</button>
                    </div>

                    <div class="col-md-5" id="Addresult"></div>
                </div>

            </div>
        <?php endif ?>

    </div>

    <div class="modal-footer">
        <button class="btn btn-success pull-left" type="button" data-toggle="modal" data-target="#MySchedule">Show Schedule</button>
        <button type="submit" name="saveChanges" class="btn btn-primary">Save changes</button>
    </div>
</form>
<?php } ?>
<!-- End mentor form function -->
