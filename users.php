<?php require 'functions/functions.php';
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
            <?php sideMenu();?>
            <form action="<?php echo(htmlspecialchars($_SERVER['PHP_SELF']));?>" method="post">
            <div class="col-md-9">
                    <!-- Deactive Accounts -->
                     <div class="panel panel-default">
                        <div class="panel-heading main-color-bg">
                            <h3 class="panel-title">Active Accounts</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <td>Allison </td>
                                        <td>Smith</td>
                                        <td>jillsmith@gmail.com</td>
                                        <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                                        <td><a class="btn btn-sm btn-warning" href="#">Deactived</a></td>
                                        <td><a class="btn btn-sm btn-danger" href="#">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>Eve</td>
                                        <td>Jackson</td>
                                        <td>ejackson@yahoo.com</td>
                                        <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                                        <td><a class="btn btn-sm btn-warning" href="#">Deactived</a></td>
                                        <td><a class="btn btn-sm btn-danger" href="#">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>John </td>
                                        <td>Doe</td>
                                        <td>jdoe@gmail.com</td>
                                        <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                                        <td><a class="btn btn-sm btn-warning" href="#">Deactived</a></td>
                                        <td><a class="btn btn-sm btn-danger" href="#">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>Stephanie</td>
                                        <td>Landon</td>
                                        <td>landon@yahoo.com</td>
                                        <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                                        <td><a class="btn btn-sm btn-warning" href="#">Deactived</a></td>
                                        <td><a class="btn btn-sm btn-danger" href="#">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>Allison </td>
                                        <td>Smith</td>
                                        <td>jillsmith@gmail.com</td>
                                        <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                                        <td><a class="btn btn-sm btn-warning" href="#">Deactived</a></td>
                                        <td><a class="btn btn-sm btn-danger" href="#">Delete</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Active Accounts -->
                     <div class="panel panel-default">
                        <div class="panel-heading main-color-bg">
                            <h3 class="panel-title">Deactived Accounts</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <td>Allison </td>
                                        <td>Smith</td>
                                        <td>jillsmith@gmail.com</td>
                                        <td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                                        <td><a class="btn btn-sm btn-success" href="#">Actived</a></td>
                                        <td><a class="btn btn-sm btn-danger" href="#">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>Eve</td>
                                        <td>Jackson</td>
                                        <td>ejackson@yahoo.com</td>
                                        <td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                                        <td><a class="btn btn-sm btn-success" href="#">Actived</a></td>
                                        <td><a class="btn btn-sm btn-danger" href="#">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>John </td>
                                        <td>Doe</td>
                                        <td>jdoe@gmail.com</td>
                                        <td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                                        <td><a class="btn btn-sm btn-success" href="#">Actived</a></td>
                                        <td><a class="btn btn-sm btn-danger" href="#">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>Stephanie</td>
                                        <td>Landon</td>
                                        <td>landon@yahoo.com</td>
                                        <td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                                        <td><a class="btn btn-sm btn-success" href="#">Actived</a></td>
                                        <td><a class="btn btn-sm btn-danger" href="#">Delete</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Footer -->
<?php footer(); ?>