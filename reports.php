<?php include 'functions/functions.php';
/* declare page variable */
$page = 'Reports';

/*start html beginning tags and display page navigation bar */
header_Nav($page);

/* reports Breadcrumb */
$menu  = 'All Students';
reportsBreadcrumb($menu);
?>

<section id="main">
    <div class="container">
        <form action="reports.php" method="post">
            <!-- Websitte overview -->
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                    <div class="row">
                        <div class="col-md-2">
                            <h3 class="panel-title">Reports</h3>
                        </div>
    					
    					<div class="col-md-1 pull-right">
    						<button class="btn btn-primary" type="submit" name="reset">Reset</button>
    					</div>

    					<div class="col-md-1 pull-right">
    						<button class="btn btn-success" type="submit" name="filter">Filter</button>
    					</div>

                        <div class="col-md-2 pull-right">
                            <select class="form-control">
                                <option value="#">All Sessions</option>
                                <option value="#">AEGIS Mentoring</option>
                                <option value="#">Academic Tutoring</option>
                                <option value="#">Study group</option>
                          </select>
                        </div>

                        <div class="col-md-2 pull-right">
                            <select class="form-control">
                            	<option value="#">All Counselor</option>
                                <option value="#">Counselor</option>
                                <option value="#">Canestrari</option>
                                <option value="#">Jude</option>
                                <option value="#">Maria</option>
                                <option value="#">Abdi</option>
                          </select>
                        </div>
    					

                        <!-- pull right/left align column items to the right/left -->
                        <div class="col-md-1">
                           <input type="checkbox" name="semester" value="fall"> Fall
                        </div>

                        <div class="col-md-1">
                           <input type="checkbox" name="semester" value="spring"> Spring
                        </div>

                        <div class="col-md-2">
                           <input type="checkbox" name="semester" value="summer"> Summer
                        </div>
                    </div>
                </div>
                
                <div class="panel-body">
                    <!--div class="row">
                        <div class="col-md-12">
                            <input class="form-control" type="text" placeholder="Filter Sessions...">
                        </div>
                    </div -->
                    <br>
                    <table class="table table-striped table-hover table-height">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Course</th>
                                <th>Hours</th>
                                <th>Student</th>
                                <th>Mentor</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <td>Tutorial</td>
                                <td>CIS 475</td>
                                <td>34</td>
                                <td>Salif Kabore</td>
                                <td>Mohamed Koanda</td>
                                <td>Dec 12, 2016</td>
                            </tr>

                            <tr>
                                <td>Tutorial</td>
                                <td>MAT 103</td>
                                <td>34</td>
                                <td>Mouni Tabsoba</td>
                                <td>Mohamed Koanda</td>
                                <td>Dec 12, 2016</td>
                            </tr>

                            <tr>
                                <td>Tutorial</td>
                                <td>HIS 116</td>
                                <td>34</td>
                                <td>Jenifer Lopez</td>
                                <td>Mohamed Koanda</td>
                                <td>Dec 12, 2016</td>
                            </tr>

                            <tr>
                                <td>Tutorial</td>
                                <td>CIS 400</td>
                                <td>34</td>
                                <td>Samsoudine Sawadogo</td>
                                <td>Mohamed Koanda</td>
                                <td>Dec 12, 2016</td>
                            </tr>
        
                            <tr>
                                <td>Tutorial</td>
                                <td>CIS 475</td>
                                <td>34</td>
                                <td>Salif Kabore</td>
                                <td>Mohamed Koanda</td>
                                <td>Dec 12, 2016</td>
                            </tr>

                            <tr>
                                <td>Tutorial</td>
                                <td>MAT 103</td>
                                <td>34</td>
                                <td>Mouni Tabsoba</td>
                                <td>Mohamed Koanda</td>
                                <td>Dec 12, 2016</td>
                            </tr>

                            <tr>
                                <td>Tutorial</td>
                                <td>HIS 116</td>
                                <td>34</td>
                                <td>Jenifer Lopez</td>
                                <td>Mohamed Koanda</td>
                                <td>Dec 12, 2016</td>
                            </tr>

                            <tr>
                                <td>Tutorial</td>
                                <td>CIS 400</td>
                                <td>34</td>
                                <td>Samsoudine Sawadogo</td>
                                <td>Mohamed Koanda</td>
                                <td>Dec 12, 2016</td>
                            </tr>

                            <tr>
                                <td>Tutorial</td>
                                <td>CIS 400</td>
                                <td>34</td>
                                <td>Samsoudine Sawadogo</td>
                                <td>Mohamed Koanda</td>
                                <td>Dec 12, 2016</td>
                            </tr>
        
                            <tr>
                                <td>Tutorial</td>
                                <td>CIS 475</td>
                                <td>34</td>
                                <td>Salif Kabore</td>
                                <td>Mohamed Koanda</td>
                                <td>Dec 12, 2016</td>
                            </tr>

                            <tr>
                                <td>Tutorial</td>
                                <td>MAT 103</td>
                                <td>34</td>
                                <td>Mouni Tabsoba</td>
                                <td>Mohamed Koanda</td>
                                <td>Dec 12, 2016</td>
                            </tr>

                            <tr>
                                <td>Tutorial</td>
                                <td>HIS 116</td>
                                <td>34</td>
                                <td>Jenifer Lopez</td>
                                <td>Mohamed Koanda</td>
                                <td>Dec 12, 2016</td>
                            </tr>

                            <tr>
                                <td>Tutorial</td>
                                <td>CIS 400</td>
                                <td>34</td>
                                <td>Samsoudine Sawadogo</td>
                                <td>Mohamed Koanda</td>
                                <td>Dec 12, 2016</td>
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
