<?php require 'functions/functions.php';
/* declare page variable */
$page = 'Dashboard';

/*start html beginning tags and display page navigation bar */
header_Nav($page);

/* Display section breadcrumb Side Menu*/
breadcrumb($page);
?>

<!-- body -->
<section id="main">
    <div class="container">
        <div class="row">
        <?php sideMenu();?>
            <div class="col-md-9">
                <!-- Websitte overview -->
                <div class="panel panel-default">
                    <div class="panel-heading main-color-bg">
                        <h3 class="panel-title">Fall Semester Overview</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-3">
                            <div class="well dash-box">
                                <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 205</h2>
                                <h4>Students</h4>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="well dash-box">
                                <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 12</h2>
                                <h4>Tutorials</h4>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="well dash-box">
                                <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 43</h2>
                                <h4>AEGIS</h4>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="well dash-box">
                                <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 205</h2>
                                <h4>Total Hours</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Latest users -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Latest Students Attendance</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-hover">
                           <thead>
                                <tr>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>AcadYear</th>
                                    <th>Email</th>
                                    <th>Conselor</th>
                                    <th>Date</th>
                                </tr>
                            </thead>


                            <tbody>
                                <tr>
                                    <td>Jill </td>
                                    <td>Smith</td>
                                    <td>Freshman</td>
                                    <td>jillsmith@gmail.com</td>
                                    <td>Canestrari</td>
                                    <td>Dec 12, 2016</td>
                                </tr>
                                <tr>
                                    <td>Eve</td>
                                    <td>Jackson</td>
                                    <td>Freshman</td>
                                    <td>ejackson@yahoo.com</td>
                                    <td>Jude</td>
                                    <td>Dec 13, 2016</td>
                                </tr>
                                <tr>
                                    <td>John </td>
                                    <td>Doe</td>
                                    <td>Junior</td>
                                    <td>jdoe@gmail.com</td>
                                    <td>Maria</td>
                                    <td>Dec 13, 2016</td>
                                </tr>
                                <tr>
                                    <td>Stephanie</td>
                                    <td>Landon</td>
                                    <td>Shopomore</td>
                                    <td>landon@yahoo.com</td>
                                    <td>Canestrari</td>
                                    <td>Dec 14, 2016</td>
                                </tr>
                                <tr>
                                    <td>Mike</td>
                                    <td>Johnson</td>
                                    <td>Senior</td>
                                    <td>mjohnson@gmail.com</td>
                                    <td>Jude</td>
                                    <td>Dec 15, 2016</td>
                                </tr>

                                <tr>
                                    <td>Jill </td>
                                    <td>Smith</td>
                                    <td>Freshman</td>
                                    <td>jillsmith@gmail.com</td>
                                    <td>Canestrari</td>
                                    <td>Dec 12, 2016</td>
                                </tr>
                                <tr>
                                    <td>Eve</td>
                                    <td>Jackson</td>
                                    <td>Freshman</td>
                                    <td>ejackson@yahoo.com</td>
                                    <td>Jude</td>
                                    <td>Dec 13, 2016</td>
                                </tr>
                                <tr>
                                    <td>John </td>
                                    <td>Doe</td>
                                    <td>Junior</td>
                                    <td>jdoe@gmail.com</td>
                                    <td>Maria</td>
                                    <td>Dec 13, 2016</td>
                                </tr>
                                <tr>
                                    <td>Stephanie</td>
                                    <td>Landon</td>
                                    <td>Shopomore</td>
                                    <td>landon@yahoo.com</td>
                                    <td>Canestrari</td>
                                    <td>Dec 14, 2016</td>
                                </tr>
                                <tr>
                                    <td>Mike</td>
                                    <td>Johnson</td>
                                    <td>Senior</td>
                                    <td>mjohnson@gmail.com</td>
                                    <td>Jude</td>
                                    <td>Dec 15, 2016</td>
                                </tr>

                                <tr>
                                    <td>Jill </td>
                                    <td>Smith</td>
                                    <td>Freshman</td>
                                    <td>jillsmith@gmail.com</td>
                                    <td>Canestrari</td>
                                    <td>Dec 12, 2016</td>
                                </tr>
                                <tr>
                                    <td>Eve</td>
                                    <td>Jackson</td>
                                    <td>Freshman</td>
                                    <td>ejackson@yahoo.com</td>
                                    <td>Jude</td>
                                    <td>Dec 13, 2016</td>
                                </tr>
                                <tr>
                                    <td>John </td>
                                    <td>Doe</td>
                                    <td>Junior</td>
                                    <td>jdoe@gmail.com</td>
                                    <td>Maria</td>
                                    <td>Dec 13, 2016</td>
                                </tr>
                                <tr>
                                    <td>Stephanie</td>
                                    <td>Landon</td>
                                    <td>Shopomore</td>
                                    <td>landon@yahoo.com</td>
                                    <td>Canestrari</td>
                                    <td>Dec 14, 2016</td>
                                </tr>
                                <tr>
                                    <td>Mike</td>
                                    <td>Johnson</td>
                                    <td>Senior</td>
                                    <td>mjohnson@gmail.com</td>
                                    <td>Jude</td>
                                    <td>Dec 15, 2016</td>
                                </tr>
                            </tbody>
                        </table>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End body -->

<?php footer(); ?>