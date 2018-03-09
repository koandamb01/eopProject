<?php require 'functions/functions.php';
/* declare page variable */
$page = 'Students';

/*start html beginning tags and display page navigation bar */
header_Nav($page);

/* Display section breadcrumb horizontal small menu*/
breadcrumb($page);
?>
<section id="main">
    <div class="container">
        <form action="<?php echo(htmlspecialchars($_SERVER['PHP_SELF']));?>" method="post">
            <div class="row">
                <div class="col-md-3">
                    <input class="form-control" type="text" name="firstname" placeholder="First Name..">
                </div>

                <div class="col-md-3">
                    <input class="form-control" type="text" name="lastname" placeholder="Last Name..">
                </div>
                
                <div class="col-md-1">
                    <button class="btn btn-success" name="nameSearch">Search</button>
                </div>
            </div><br>
        <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
                <div class="row">
                    <div class="col-md-2">
                        <h3 class="panel-title">Students</h3>
                    </div>

                    <div class="col-md-1 pull-right">
                        <button class="btn btn-primary" name="reset">Reset</button>
                    </div>

                    <div class="col-md-1 pull-right">
                        <button class="btn btn-success" name="filter">Filter</button>
                    </div>

                    <div class="col-md-2 pull-right">
                        <select class="form-control">
                            <option value="#">Counselor</option>
                            <option value="Canestrari">Canestrari</option>
                            <option value="Jude">Jude</option>
                            <option value="Maria">Maria</option>
                            <option value="abdi">Abdi</option>
                        </select>
                    </div>
                    <!-- pull right/left align column items to the right/left -->
                    <div class="col-md-2 pull-right">
                        <select class="form-control">
                            <option value="#">Academic Year</option>
                            <option value="#">Freshman</option>
                            <option value="#">Sophomore</option>
                            <option value="#">Junior</option>
                            <option value="#">Senior</option>
                        </select>
                    </div>

                    <div class="col-md-2 pull-right">
                        <input type="checkbox" name="isEOP" value="no"> Non-EOP
                    </div>
                </div>
            </div>
        </form>
        
            <div class="panel-body">
                <br>
                <table class="table table-striped table-hover table-height">
                    <thead>
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>AcadYear</th>
                            <th>Email</th>
                            <th>Conselor</th>
                            <th>IsEOP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td>Jill </td>
                            <td>Smith</td>
                            <td>Freshman</td>
                            <td>jillsmith@gmail.com</td>
                            <td>Canestrari</td>
                            <td>Yes</td>
                            <td><a class="btn btn-sm btn-success" href="#">New Session</a></td>
                        </tr>
                        <tr>
                            <td>Eve</td>
                            <td>Jackson</td>
                            <td>Freshman</td>
                            <td>ejackson@yahoo.com</td>
                            <td>Jude</td>
                            <td>Yes</td>
                            <td><a class="btn btn-sm btn-success" href="#">New Session</a></td>
                        </tr>
                        <tr>
                            <td>John </td>
                            <td>Doe</td>
                            <td>Junior</td>
                            <td>jdoe@gmail.com</td>
                            <td>Maria</td>
                            <td>No</td>
                            <td><a class="btn btn-sm btn-success" href="#">New Session</a></td>
                        </tr>
                        <tr>
                            <td>Stephanie</td>
                            <td>Landon</td>
                            <td>Shopomore</td>
                            <td>landon@yahoo.com</td>
                            <td>Canestrari</td>
                            <td>Yes</td>
                            <td><a class="btn btn-sm btn-success" href="#">New Session</a></td>
                        </tr>
                         <tr>
                            <td>Jill </td>
                            <td>Smith</td>
                            <td>Freshman</td>
                            <td>jillsmith@gmail.com</td>
                            <td>Canestrari</td>
                            <td>Yes</td>
                            <td><a class="btn btn-sm btn-success" href="#">New Session</a></td>
                        </tr>
                        <tr>
                            <td>Eve</td>
                            <td>Jackson</td>
                            <td>Freshman</td>
                            <td>ejackson@yahoo.com</td>
                            <td>Jude</td>
                            <td>Yes</td>
                            <td><a class="btn btn-sm btn-success" href="#">New Session</a></td>
                        </tr>
                        <tr>
                            <td>John </td>
                            <td>Doe</td>
                            <td>Junior</td>
                            <td>jdoe@gmail.com</td>
                            <td>Maria</td>
                            <td>No</td>
                            <td><a class="btn btn-sm btn-success" href="#">New Session</a></td>
                        </tr>
                        <tr>
                            <td>Stephanie</td>
                            <td>Landon</td>
                            <td>Shopomore</td>
                            <td>landon@yahoo.com</td>
                            <td>Canestrari</td>
                            <td>Yes</td>
                            <td><a class="btn btn-sm btn-success" href="#">New Session</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php footer(); ?>