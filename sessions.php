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
<footer id="footer">
    <p>Copyright EOP Database, &copy; 2018</p>
</footer>

    <!-- Modals -->
    <!-- Add Session Modal -->
    <div class="modal fade" id="addSession" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Student Data</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control" placeholder="Page Title">
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
                                    <input type="text" class="form-control" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input type="text" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                        </div>

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
                                    <label><input type="checkbox"> Checked If Non-EOP</label>
                                </div>
                            </div>
                        </div>

                        <!-- Tutor and Counselor -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tutor name</label>
                                    <input type="text" class="form-control" placeholder="Tutor Name">
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

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Session Time</label>
                                    <input type="text" class="form-control" placeholder="Session time (hours)">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Academic Mentor Notes</label>
                            <textarea class="form-control" rows="3" cols="50" placeholder="Page Body"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Work Completed</label>
                            <textarea class="form-control" rows="3" cols="50" placeholder="Page Body"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Add Mentor Modal -->
    <div class="modal fade" id="addMentor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Mentor Data</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control" placeholder="Page Title">
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
                                    <input type="text" class="form-control" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input type="text" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                        </div>

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
                                    <label><input type="checkbox"> Checked If Non-EOP</label>
                                </div>
                            </div>
                        </div>

                        <!-- Tutor and Counselor -->


                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" placeholder="something@mail.com">
                        </div>


                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Course 1</label>
                                    <input type="text" class="form-control" placeholder="CRS 101...">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Course 2</label>
                                    <input type="text" class="form-control" placeholder="CRS 101...">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Course 3</label>
                                    <input type="text" class="form-control" placeholder="CRS 101...">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Course 4</label>
                                    <input type="text" class="form-control" placeholder="CRS 101...">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Course 5</label>
                                    <input type="text" class="form-control" placeholder="CRS 101...">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Course 6</label>
                                    <input type="text" class="form-control" placeholder="CRS 101...">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Course 7</label>
                                    <input type="text" class="form-control" placeholder="CRS 101...">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Course 8</label>
                                    <input type="text" class="form-control" placeholder="CRS 101...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Notes</label>
                            <textarea class="form-control" rows="3" cols="50" placeholder="Page Body"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- End of the model -->

    <script>
        CKEDITOR.replace('editor1');
    </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>