<?php include 'functions/functions.php';
/* declare page variable */
$page = 'Mentors';

/*start html beginning tags and display page navigation bar */
header_Nav($page);

/* Display section breadcrumb */
breadcrumb($page);
?>

<section id="main">
    <div class="container">
       <form id="myForm" action="mentor.php" method="post">
            <!-- Websitte overview -->
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                    <div class="row">
                        <div class="col-md-2">
                            <h3 class="panel-title">Mentors</h3>
                        </div>
                        <div class="col-md-2 pull-right">
                            <button class="btn btn-primary" type="submit" name="filter">Print All Schedule</button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="searchInput" placeholder="Please type the course schedule you are looking for: CRS101...">
                        </div>
                        
                         <div class="col-md-1 pull-right">
                            <button class="btn btn-warning" name="reset">Reset</button>
                        </div>

                        <div class="col-md-1">
                            <button class="btn btn-success" type="submit" name="search">Search</button>
                        </div>
                    </div>
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
                            <tr>
                                <td><a class="btn btn-danger" href="edit_mentor.php">Edit</a></td>
                                <td>Jill </td>
                                <td>Smith</td>
                                <td>Freshman</td>
                                <td>jillsmith@gmail.com</td>
                                <td>Yes</td>
                                <td><a class="btn btn-success" href="edit_mentor.php">Schedule</a></td>
                            </tr>
                            <tr>
                                <td><a class="btn btn-danger" href="edit_mentor.php">Edit</a></td>
                                <td>Eve</td>
                                <td>Jackson</td>
                                <td>Freshman</td>
                                <td>ejackson@yahoo.com</td>
                                <td>Yes</td>
                                <td><a class="btn btn-success" href="edit_mentor.php">schedule</a></td>
                            </tr>
                            <tr>
                                <td><a class="btn btn-danger" href="edit_mentor.php">Edit</a></td>
                                <td>John </td>
                                <td>Doe</td>
                                <td>Junior</td>
                                <td>jdoe@gmail.com</td>
                                <td>No</td>
                                <td><a class="btn btn-success" href="edit_mentor.php">schedule</a></td>
                            </tr>
                            <tr>
                                <td><a class="btn btn-danger" href="edit_mentor.php">Edit</a></td>
                                <td>Stephanie</td>
                                <td>Landon</td>
                                <td>Shopomore</td>
                                <td>landon@yahoo.com</td>
                                <td>Yes</td>
                                <td><a class="btn btn-success" href="edit_mentor.php">schedule</a></td>
                            </tr>
                            <tr>
                                <td><a class="btn btn-danger" href="edit_mentor.php">Edit</a></td>
                                <td>Jill </td>
                                <td>Smith</td>
                                <td>Freshman</td>
                                <td>jillsmith@gmail.com</td>
                                <td>Yes</td>
                                <td><a class="btn btn-success" href="edit_mentor.php">Schedule</a></td>
                            </tr>
                            <tr>
                                <td><a class="btn btn-danger" href="edit_mentor.php">Edit</a></td>
                                <td>Eve</td>
                                <td>Jackson</td>
                                <td>Freshman</td>
                                <td>ejackson@yahoo.com</td>
                                <td>Yes</td>
                                <td><a class="btn btn-success" href="edit_mentor.php">schedule</a></td>
                            </tr>
                            <tr>
                                <td><a class="btn btn-danger" href="edit_mentor.php">Edit</a></td>
                                <td>John </td>
                                <td>Doe</td>
                                <td>Junior</td>
                                <td>jdoe@gmail.com</td>
                                <td>No</td>
                                <td><a class="btn btn-success" href="edit_mentor.php">schedule</a></td>
                            </tr>
                            <tr>
                                <td><a class="btn btn-danger" href="edit_mentor.php">Edit</a></td>
                                <td>Stephanie</td>
                                <td>Landon</td>
                                <td>Shopomore</td>
                                <td>landon@yahoo.com</td>
                                <td>Yes</td>
                                <td><a class="btn btn-success" href="edit_mentor.php">schedule</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Footer -->
<?php footer(); ?>