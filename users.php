<?php include 'functions/functions.php';
/* declare page variable */
$page = 'Users';

/*start html beginning tags and display page navigation bar */
header_Nav($page);

/* Display section breadcrumb */
breadcrumb($page);
?>


<!-- body -->
<section id="main">
    <div class="container">
        <div class="row">
        <?php dataOverview();?>
            <div class="col-md-9">
                <form action="users.php">
                    <!-- Counselors -->
                     <div class="panel panel-default">
                        <div class="panel-heading main-color-bg">
                            <h3 class="panel-title">Counselors</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-hover table-height">
                                <thead>
                                    <tr>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <td>Allison </td>
                                        <td>Smith</td>
                                        <td>jillsmith@gmail.com</td>
                                        <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                                        <td><a class="btn btn-danger" href="#">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>Eve</td>
                                        <td>Jackson</td>
                                        <td>ejackson@yahoo.com</td>
                                        <td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                                        <td><a class="btn btn-danger" href="#">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>John </td>
                                        <td>Doe</td>
                                        <td>jdoe@gmail.com</td>
                                        <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                                        <td><a class="btn btn-danger" href="#">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>Stephanie</td>
                                        <td>Landon</td>
                                        <td>landon@yahoo.com</td>
                                        <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                                        <td><a class="btn btn-danger" href="#">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>Allison </td>
                                        <td>Smith</td>
                                        <td>jillsmith@gmail.com</td>
                                        <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                                        <td><a class="btn btn-danger" href="#">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>Eve</td>
                                        <td>Jackson</td>
                                        <td>ejackson@yahoo.com</td>
                                        <td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                                        <td><a class="btn btn-danger" href="#">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>John </td>
                                        <td>Doe</td>
                                        <td>jdoe@gmail.com</td>
                                        <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                                        <td><a class="btn btn-danger" href="#">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>Stephanie</td>
                                        <td>Landon</td>
                                        <td>landon@yahoo.com</td>
                                        <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                                        <td><a class="btn btn-danger" href="#">Delete</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End body -->