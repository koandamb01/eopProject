<?php 
/* -- Start of the header_navigation function -- */
function header_Nav($page){?>
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

<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"></button>
                <a class="navbar-brand" href="index.php">EOP Database</a>
            </div>

    <?php if($page == 'Dashboard'): ?>

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Dashboard</a></li>
                    <li><a href="students.php">Students</a></li>
                    <li><a href="sessions.php">Sessions</a></li>
                    <li><a href="mentors.php">Mentors</a></li>
                    <li><a href="reports.php">Reports</a></li>
                    <li><a href="users.php">Users</a></li>
                </ul>

    <?php elseif ($page == 'Students'):?>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Dashboard</a></li>
                    <li class="active"><a href="students.php">Students</a></li>
                    <li><a href="sessions.php">Sessions</a></li>
                    <li><a href="mentors.php">Mentors</a></li>
                    <li><a href="reports.php">Reports</a></li>
                    <li><a href="users.php">Users</a></li>
                </ul>

    <?php elseif($page == 'Sessions'): ?>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="students.php">Students</a></li>
                    <li class="active"><a href="sessions.php">Sessions</a></li>
                    <li><a href="mentors.php">Mentors</a></li>
                    <li><a href="reports.php">Reports</a></li>
                    <li><a href="users.php">Users</a></li>
                </ul>

    <?php elseif($page == 'Mentors'): ?>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="students.php">Students</a></li>
                    <li><a href="sessions.php">Sessions</a></li>
                    <li class="active"><a href="mentors.php">Mentors</a></li>
                    <li><a href="reports.php">Reports</a></li>
                    <li><a href="users.php">Users</a></li>
                </ul>

    <?php elseif($page == 'Reports'): ?>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="students.php">Students</a></li>
                    <li><a href="sessions.php">Sessions</a></li>
                    <li><a href="mentors.php">Mentors</a></li>
                    <li class="active"><a href="reports.php">Reports</a></li>
                    <li><a href="users.php">Users</a></li>
                </ul>

    <?php elseif($page == 'Users'): ?>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="students.php">Students</a></li>
                    <li><a href="sessions.php">Sessions</a></li>
                    <li><a href="mentors.php">Mentors</a></li>
                    <li><a href="reports.php">Reports</a></li>
                    <li class="active"><a href="users.php">Users</a></li>
                </ul>

    <?php else: ?>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="students.php">Students</a></li>
                    <li><a href="sessions.php">Sessions</a></li>
                    <li><a href="mentors.php">Mentors</a></li>
                    <li><a href="reports.php">Reports</a></li>
                    <li><a href="users.php">Users</a></li>
                </ul>

    <?php endif; ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Welcome, Med</a></li>
                    <li><a href="login.php">Logout</a></li>
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
                <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <?php echo $page; ?><small> Manage <?php echo $page; ?></small></h1>
            <?php endif ?>
                    
            </div>
        <?php if ($page == 'Edit Session' OR $page == 'New Session' OR $page == 'Users'): ?>
                <!-- Nothing -->
        <?php else: ?>
            <div class="col-md-2">
                <div class="dropdown">
        <?php if ($page == 'Reports'): ?>
                    <button class="btn btn-default" type="button" id="printReport">Print Report</button>
        <?php else: ?>
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Create Content
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a type="button" href="new_session.php">Add Session</a></li>
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
                <li><a href="index.php">Dashboard</a></li>
    <?php if($page == 'Dashboard'): ?>
        <!-- do nothing -->
    <?php else: ?>
                <li class="active"><?php echo $page; ?></li>
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
            <li><a href="index.php">Dashboard</a></li>
            <li class="active"><?php echo $menu; ?></li>
            <li><a href="student_reports.php">Each Student</a></li>
            <li><a href="end_reports.php">Year Breakdown</a></li>

        <?php elseif($menu  == 'Each Students'): ?>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="reports.php">All Students</a></li>
            <li class="active"><?php echo $menu; ?></li>
            <li><a href="end_reports.php">Year Breakdown</a></li>
        
        <?php elseif($menu == 'Year Breakdown'): ?>
            <li><a href="index.php">Dashboard</a></li>
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
</body>

</html>
<?php } ?>
<!-- End of footer function -->



<!-- Begin of Side Menu function -->
<?php function sideMenu(){?>
<div class="col-md-3">
    <div class="list-group">
        <a href="index.php" class="list-group-item active main-color-bg">Dashboard</a>
        <a href="students.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Students <span class="badge">208</span> </a>
        <a href="sessions.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Sessions <span class="badge">56</span> </a>
        <a href="mentors.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Mentors <span class="badge">26</span> </a>
        <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge">12</span> </a>
    </div><br>

    <div class="well">
        <h4>Freshman Attendance</h4>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                60%
            </div>
        </div>

        <h4>Shopomore Attendance</h4>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                30%
            </div>
        </div>

        <h4>Junior Attendance</h4>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 27%;">
                27%
            </div>
        </div>

        <h4>Senior Attendance</h4>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 17%;">
                17%
            </div>
        </div>
    </div>
</div>
<?php }; ?>
<!-- End of Side Menu function -->



<!-- Begin of sessionForm function -->
<?php function sessionsForm(){?>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date" placeholder="Page Title">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group"><br>
                    <h4 class="bg-danger">*Secretary name here!</h4>
                </div>
            </div>
        </div>


<!-- Student Info -->
        <div class="well">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First name</label>
                        <input type="text" class="form-control" name="fname" placeholder="First Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last name</label>
                        <input type="text" class="form-control" name="lname" placeholder="Last Name">
                    </div>
                </div>
            </div>
    <!-- Academic Year -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Academic Year</label>
                        <select class="form-control">
                            <option value="#">Freshman</option>
                            <option value="#">Shopomore</option>
                            <option value="#">Junior</option>
                            <option value="#">Senior</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="checkbox"><br>
                        <label><input type="checkbox" name="IsEOP" value="no"> Checked If Non-EOP</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Student Buffalo State Email</label>
                        <input type="text" class="form-control" name="email" placeholder="someone@mail.buffalostate.edu">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Counselor</label>
                        <select class="form-control">
                            <option value="#">Counselor</option>
                            <option value="Canestrari">Canestrari</option>
                            <option value="Jude">Jude</option>
                            <option value="Maria">Maria</option>
                            <option value="abdi">Abdi</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>



<!-- Tutor -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tutor Name</label>
                    <select class="form-control">
                        <option value="#">Tutor</option>
                        <option value="Canestrari">Sarah</option>
                        <option value="Jude">Mohamed</option>
                        <option value="Maria">Adam</option>
                        <option value="abdi">Kedi</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Session Type</label>
                    <select class="form-control">
                        <option value="#">Session Type</option>
                        <option value="#">Academic Mentoring</option>
                        <option value="#">AEGIS</option>
                        <option value="#">Independent Study</option>
                        <option value="#">Study group</option>
                    </select>
                </div>
            </div>
        </div>


<!-- Sesstion type -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Session Time</label>
                    <input type="time" name="time" class="form-control">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Total Time Spent</label>
                    <input type="text" class="form-control" name="timeSpent" placeholder="Session time (hours)">
                </div>
            </div>
        </div>


        <div class="form-group">
            <label>Academic Mentor Notes</label>
            <textarea class="form-control" rows="3" cols="50" name="notes" placeholder="Page Body"></textarea>
        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" name="saveChanges" class="btn btn-primary">Save changes</button>
    </div>
</form>
<?php }?>
<!-- End of sessionForm function -->



<!-- Begin mentor form function -->
<?php function mentorForm(){?>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date" placeholder="Page Title">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <br>
                    <h4 class="bg-danger">*Secretary name here!</h4>
                </div>
            </div>
        </div>
        <!-- Student Info -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>First name</label>
                    <input type="text" class="form-control" name="fname" placeholder="First Name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Last name</label>
                    <input type="text" class="form-control" name="lname" placeholder="Last Name">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label>Buffalo State Email</label>
                <input type="text" class="form-control" name="email" placeholder="someone@mail.buffalostate.edu...">
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Academic Year</label>
                    <select class="form-control">
                            <option value="#">Freshman</option>
                        <option value="#">Shopomore</option>
                        <option value="#">Junior</option>
                        <option value="#">Senior</option>
                    </select>
                </div>
            </div>
        </div><br>
        
        <label>Mentor Weekly Schedule</label>
        <div class="well">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Monday</label><br>
                        FROM<input type="time" class="form-control" name="MonFrom" >
                        TO<input type="time" class="form-control" name="MonTo">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Tuesday</label><br>
                        FROM<input type="time" class="form-control" name="TuesFrom" >
                        TO<input type="time" class="form-control" name="TueTo">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Wednesday</label><br>
                        FROM<input type="time" class="form-control" name="WedFrom" >
                        TO<input type="time" class="form-control" name="WedTo">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Thursday</label><br>
                        FROM<input type="time" class="form-control" name="ThuFrom" >
                        TO<input type="time" class="form-control" name="ThuTo">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Friday</label><br>
                        FROM<input type="time" class="form-control" name="FriFrom" >
                        TO<input type="time" class="form-control" name="FriTo">
                    </div>
                </div>
            </div>
        </div><br>

        
        <label>Mentor Courses Tutor</label>
        <div class="well">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Course 1</label>
                        <input type="text" class="form-control" name="crs1" placeholder="CRS 101...">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Course 2</label>
                        <input type="text" class="form-control" name="crs2" placeholder="CRS 101...">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Course 3</label>
                        <input type="text" class="form-control" name="crs3" placeholder="CRS 101...">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Course 4</label>
                        <input type="text" class="form-control" name="crs4" placeholder="CRS 101...">
                    </div>
                </div>
            </div>
        

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Course 5</label>
                        <input type="text" class="form-control" name="crs5" placeholder="CRS 101...">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Course 6</label>
                        <input type="text" class="form-control" name="crs6" placeholder="CRS 101...">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Course 7</label>
                        <input type="text" class="form-control" name="crs7" placeholder="CRS 101...">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Course 8</label>
                        <input type="text" class="form-control" name="crs8" placeholder="CRS 101...">
                    </div>
                </div>
            </div>

             <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Course 9</label>
                        <input type="text" class="form-control" name="crs9" placeholder="CRS 101...">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Course 10</label>
                        <input type="text" class="form-control" name="crs10" placeholder="CRS 101...">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Course 11</label>
                        <input type="text" class="form-control" name="crs11" placeholder="CRS 101...">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Course 12</label>
                        <input type="text" class="form-control" name="crs12" placeholder="CRS 101...">
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group">
            <label>Notes</label>
            <textarea class="form-control" rows="3" cols="50" name="notes" placeholder="Page Body"></textarea>
        </div>
    </div>

    <div class="modal-footer">
        <button type="sbmit" name="saveChanges" class="btn btn-primary">Save changes</button>
    </div>
</form>
<?php } ?>
<!-- End mentor form function -->
