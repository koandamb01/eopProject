<?php include 'functions/functions.php';
/* declare page variable */
$page = 'Reports';

/*start html beginning tags and display page navigation bar */
header_Nav($page);

/* Display section breadcrumb */
/* reports Breadcrumb */
$menu  = 'Year Breakdown';
reportsBreadcrumb($menu);
?>

<!-- body -->
<section id="main">
    <div class="container">
        <br>
        <!-- End of Year reports by sessions -->
        <div class="row">
            <!-- EOP students section-->
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading main-color-bg">
                        <h3 class="panel-title">EOP Students</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-3">
                            <button class="btn btn-primary"><h1><span class="glyphicon glyphicon-stats" aria-hidden="true"></span></h1>**Tutorials**</button>
                        </div>

                        <div class="col-md-3">
                            <button class="btn btn-primary"><h1><span class="glyphicon glyphicon-stats" aria-hidden="true"></span></h1>***AEGIS***</button>
                        </div>

                        <div class="col-md-3">
                            <button class="btn btn-primary"><h1><span class="glyphicon glyphicon-stats" aria-hidden="true"></span></h1>Study Group</button>
                        </div>

                        <div class="col-md-3">
                            <button class="btn btn-primary"><h1><span class="glyphicon glyphicon-stats" aria-hidden="true"></span></h1>*****ALL*****</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Non-EOP students section -->
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading main-color-bg">
                        <h3 class="panel-title">Non-EOP Students</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-3">
                            <button class="btn btn-primary"><h1><span class="glyphicon glyphicon-stats" aria-hidden="true"></span></h1>**Tutorials**</button>
                        </div>

                        <div class="col-md-3">
                            <button class="btn btn-primary disabled"><h1><span class="glyphicon glyphicon-stats" aria-hidden="true"></span></h1>***AEGIS***</button>
                        </div>

                        <div class="col-md-3">
                            <button class="btn btn-primary"><h1><span class="glyphicon glyphicon-stats" aria-hidden="true"></span></h1>Study Group</button>
                        </div>

                        <div class="col-md-3">
                            <button class="btn btn-primary"><h1><span class="glyphicon glyphicon-stats" aria-hidden="true"></span></h1>*****ALL*****</button>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br>



        <!-- End of Year reports by sessions and Semester-->
        <div class="row">
            <!-- EOP students section-->
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading main-color-bg">
                        <h3 class="panel-title">EOP Students</h3>
                        <div class="row">
                            <form>
                                <div class="col-md-3 pull-right">
                                   <input type="radio" name="semester" value="summer"> Summer
                                </div>

                                <div class="col-md-3 pull-right">
                                   <input type="radio" name="semester" value="spring"> Spring
                                </div>

                                <div class="col-md-3 pull-right">
                                   <input type="radio" name="semester" value="fall"> Fall
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="col-md-3">
                            <button class="btn btn-primary"><h1><span class="glyphicon glyphicon-stats" aria-hidden="true"></span></h1>**Tutorials**</button>
                        </div>

                        <div class="col-md-3">
                            <button class="btn btn-primary"><h1><span class="glyphicon glyphicon-stats" aria-hidden="true"></span></h1>***AEGIS***</button>
                        </div>

                        <div class="col-md-3">
                            <button class="btn btn-primary"><h1><span class="glyphicon glyphicon-stats" aria-hidden="true"></span></h1>Study Group</button>
                        </div>

                        <div class="col-md-3">
                            <button class="btn btn-primary"><h1><span class="glyphicon glyphicon-stats" aria-hidden="true"></span></h1>*****ALL*****</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Non-EOP students section -->
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading main-color-bg">
                        <h3 class="panel-title">Non-EOP Students</h3>
                        <div class="row">
                            <form>
                                <div class="col-md-3 pull-right">
                                   <input type="radio" name="semester" value="summer"> Summer
                                </div>

                                <div class="col-md-3 pull-right">
                                   <input type="radio" name="semester" value="spring"> Spring
                                </div>

                                <div class="col-md-3 pull-right">
                                   <input type="radio" name="semester" value="fall"> Fall
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-3">
                            <button class="btn btn-primary"><h1><span class="glyphicon glyphicon-stats" aria-hidden="true"></span></h1>**Tutorials**</button>
                        </div>

                        <div class="col-md-3">
                            <button class="btn btn-primary disabled"><h1><span class="glyphicon glyphicon-stats" aria-hidden="true"></span></h1>***AEGIS***</button>
                        </div>

                        <div class="col-md-3">
                            <button class="btn btn-primary"><h1><span class="glyphicon glyphicon-stats" aria-hidden="true"></span></h1>Study Group</button>
                        </div>

                        <div class="col-md-3">
                            <button class="btn btn-primary"><h1><span class="glyphicon glyphicon-stats" aria-hidden="true"></span></h1>*****ALL*****</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>        

<?php footer(); ?>