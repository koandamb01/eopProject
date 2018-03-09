<?php require 'functions/functions.php';
/* declare page variable */
$page = 'Mentors';

/*start html beginning tags and display page navigation bar */
header_Nav($page);

/* Display section breadcrumb */
breadcrumb($page);
?>

<section id="main">
    <div class="container">
       <form id="myForm" action="<?php echo(htmlspecialchars($_SERVER['PHP_SELF']));?>" method="post">
            <div class="row">
                <div class="col-md-10">
                    <input class="form-control" type="text" name="searchInput" placeholder="Please type the course schedule you are looking for: CRS101...">
                </div>
                
                 <div class="col-md-1 pull-right">
                    <button class="btn btn-warning" name="reset">Reset</button>
                </div>

                <div class="col-md-1">
                    <button class="btn btn-success" name="CRSsearch">Search</button>
                </div>
            </div><br>
        <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
                <div class="row">
                    <div class="col-md-2">
                        <h3 class="panel-title">Mentors</h3>    
                    </div>
                    <div class="col-md-2 pull-right">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#printReport">Print All Schedule</button>
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
                        <tr>
                            <td><a class="btn btn-sm btn-danger" href="edit_mentor.php">Edit</a></td>
                            <td>Jill </td>
                            <td>Smith</td>
                            <td>Freshman</td>
                            <td>jillsmith@gmail.com</td>
                            <td>Yes</td>
                            <td><a class="btn btn-sm btn-success" href="#">Schedule</a></td>
                        </tr>
                        <tr>
                            <td><a class="btn btn-sm btn-danger" href="edit_mentor.php">Edit</a></td>
                            <td>Eve</td>
                            <td>Jackson</td>
                            <td>Freshman</td>
                            <td>ejackson@yahoo.com</td>
                            <td>Yes</td>
                            <td><a class="btn btn-sm btn-success" href="#">Schedule</a></td>
                        </tr>
                        <tr>
                            <td><a class="btn btn-sm btn-danger" href="edit_mentor.php">Edit</a></td>
                            <td>John </td>
                            <td>Doe</td>
                            <td>Junior</td>
                            <td>jdoe@gmail.com</td>
                            <td>No</td>
                            <td><a class="btn btn-sm btn-success" href="#">Schedule</a></td>
                        </tr>
                        <tr>
                            <td><a class="btn btn-sm btn-danger" href="edit_mentor.php">Edit</a></td>
                            <td>Stephanie</td>
                            <td>Landon</td>
                            <td>Shopomore</td>
                            <td>landon@yahoo.com</td>
                            <td>Yes</td>
                            <td><a class="btn btn-sm btn-success" href="#">Schedule</a></td>
                        </tr>
                        <tr>
                            <td><a class="btn btn-sm btn-danger" href="edit_mentor.php">Edit</a></td>
                            <td>Jill </td>
                            <td>Smith</td>
                            <td>Freshman</td>
                            <td>jillsmith@gmail.com</td>
                            <td>Yes</td>
                            <td><a class="btn btn-sm btn-success" href="#">Schedule</a></td>
                        </tr>
                        <tr>
                            <td><a class="btn btn-sm btn-danger" href="edit_mentor.php">Edit</a></td>
                            <td>Eve</td>
                            <td>Jackson</td>
                            <td>Freshman</td>
                            <td>ejackson@yahoo.com</td>
                            <td>Yes</td>
                            <td><a class="btn btn-sm btn-success" href="#">Schedule</a></td>
                        </tr>
                        <tr>
                            <td><a class="btn btn-sm btn-danger" href="edit_mentor.php">Edit</a></td>
                            <td>John </td>
                            <td>Doe</td>
                            <td>Junior</td>
                            <td>jdoe@gmail.com</td>
                            <td>No</td>
                            <td><a class="btn btn-sm btn-success" href="#">Schedule</a></td>
                        </tr>
                        <tr>
                            <td><a class="btn btn-sm btn-danger" href="edit_mentor.php">Edit</a></td>
                            <td>Stephanie</td>
                            <td>Landon</td>
                            <td>Shopomore</td>
                            <td>landon@yahoo.com</td>
                            <td>Yes</td>
                            <td><a class="btn btn-sm btn-success" href="#">Schedule</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Modal for Printing -->
<div class="modal fade bs-example-modal-lg" id="printReport" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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