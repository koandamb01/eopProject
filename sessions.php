<?php include 'functions/functions.php';
/* declare page variable */
$page = 'Sessions';

/*start html beginning tags and display page navigation bar */
header_Nav($page);

/* Display section breadcrumb */
breadcrumb($page);
?>
   
<section id="main">
    <div class="container">
        <form action="search.php" method="post">
            <!-- Websitte overview -->
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                    <div class="row">
                        <div class="col-md-2">
                            <h3 class="panel-title">Sessions</h3>
                        </div>

                        <div class="col-md-1 pull-right">
                            <button class="btn btn-primary" type="submit" name="reset">Reset</button>
                        </div>

                        <div class="col-md-1 pull-right">
                            <button class="btn btn-success" type="submit" name="filter">Filter</button>
                        </div>
                        
                        <div class="col-md-2 pull-right">
                            <select class="form-control">
                                <option value="#">Session Type</option>
                                <option value="#">Academic Mentoring</option>
                                <option value="#">AEGIS</option>
                                <option value="#">Independent Study</option>
                                <option value="#">Study group</option>
                          </select>
                        </div>
                        <!-- pull right/left align column items to the right/left -->
                        <div class="col-md-2 pull-right">

                            <select class="form-control">
                                <option value="#">Mentor</option>
                                <option value="#">Mohamed Koanda</option>
                                <option value="#">Kadi</option>
                                <option value="#">Alicia</option>
                                <option value="#">Jeff</option>
                          </select>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-11">
                            <input class="form-control" type="text" name="searchInput" placeholder="Search Sessions...">
                        </div>

                        <div class="col-md-1">
                            <button class="btn btn-success" type="submit" name="search">Search</button>
                        </div>
                    </div>
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
                            <tr>
                                <td>Tutorial</td>
                                <td>CIS 475</td>
                                <td>Salif Kabore</td>
                                <td>Mohamed Koanda</td>
                                <td>Dec 12, 2016</td>
                                <td><a class="btn btn-warning" href="edit.php">Edit</a></td>
                            </tr>

                            <tr>
                                <td>Tutorial</td>
                                <td>CIS 475</td>
                                <td>Salif Kabore</td>
                                <td>Mohamed Koanda</td>
                                <td>Dec 12, 2016</td>
                                <td><a class="btn btn-warning" href="edit.php">Edit</a></td>
                            </tr>

                            <tr>
                                <td>Tutorial</td>
                                <td>CIS 475</td>
                                <td>Salif Kabore</td>
                                <td>Mohamed Koanda</td>
                                <td>Dec 12, 2016</td>
                                <td><a class="btn btn-warning" href="edit.php">Edit</a></td>
                            </tr>

                            <tr>
                                <td>Tutorial</td>
                                <td>CIS 475</td>
                                <td>Salif Kabore</td>
                                <td>Mohamed Koanda</td>
                                <td>Dec 12, 2016</td>
                                <td><a class="btn btn-warning" href="edit.php">Edit</a></td>
                            </tr>
                            <tr>
                                <td>Tutorial</td>
                                <td>CIS 475</td>
                                <td>Salif Kabore</td>
                                <td>Mohamed Koanda</td>
                                <td>Dec 12, 2016</td>
                                <td><a class="btn btn-warning" href="edit.php">Edit</a></td>
                            </tr>

                            <tr>
                                <td>Tutorial</td>
                                <td>CIS 475</td>
                                <td>Salif Kabore</td>
                                <td>Mohamed Koanda</td>
                                <td>Dec 12, 2016</td>
                                <td><a class="btn btn-warning" href="edit.php">Edit</a></td>
                            </tr>

                            <tr>
                                <td>Tutorial</td>
                                <td>CIS 475</td>
                                <td>Salif Kabore</td>
                                <td>Mohamed Koanda</td>
                                <td>Dec 12, 2016</td>
                                <td><a class="btn btn-warning" href="edit.php">Edit</a></td>
                            </tr>

                            <tr>
                                <td>Tutorial</td>
                                <td>CIS 475</td>
                                <td>Salif Kabore</td>
                                <td>Mohamed Koanda</td>
                                <td>Dec 12, 2016</td>
                                <td><a class="btn btn-warning" href="edit.php">Edit</a></td>
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