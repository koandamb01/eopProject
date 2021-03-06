<?php 
session_start();
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing registration page!";
  header("location: error.php");    
}

$active = $_SESSION['active'];
$firstname = $_SESSION['firstname'];

if(!$active){
    header("location: profile.php");
}

require 'functions/pdo.php';
require 'functions/functions.php';
/* declare page variable */
$page = 'Users';

/*start html beginning tags and display page navigation bar */
header_Nav($page, $firstname);

/* Display section breadcrumb */
breadcrumb($page);
?>

<!-- body -->
<section id="main">
    <div class="container">
        <div class="row">
            <?php sideMenu(0);?>
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
                                        <th>CC</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                        // fetch data from the database
                                        $active = 1;
                                        $sql_ative = 'SELECT * FROM users WHERE active = ?';
                                        $stmt_active = $pdo->prepare($sql_ative); // Prepare the statement
                                        $stmt_active->execute([$active]); // execute the statement
                                        $rows = $stmt_active->fetchAll();

                                        foreach ($rows as $row) {
                                        echo '<tr>
                                                <td>'.$row->c_code.'</td>
                                                <td>'.$row->firstname.'</td>
                                                <td>'.$row->lastname.'</td>
                                                <td>'.$row->title.'</td>
                                                <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                                                <td><a type="button" class="btn btn-sm btn-warning" onclick="acticeAndDeactive(0,'.$row->id.')">Deactived</a></td>
                                                <td><a type="button" class="btn btn-sm btn-danger" onclick="acticeAndDeactive(2,'.$row->id.')">Delete</a></td>';
                                        }

                                     ?>
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
                                        <th>CC</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php 
                                        // fetch data from the database
                                        $active = 0;
                                        $sql_No_ative = 'SELECT * FROM users WHERE active = ?';
                                        $stmt_No_active = $pdo->prepare($sql_ative); // Prepare the statement
                                        $stmt_No_active->execute([$active]); // execute the statement
                                        $rows = $stmt_No_active->fetchAll();

                                        foreach ($rows as $row) {
                                        echo '<tr>
                                                <td>'.$row->c_code.'</td>
                                                <td>'.$row->firstname.'</td>
                                                <td>'.$row->lastname.'</td>
                                                <td>'.$row->title.'</td>
                                                <td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                                                <td><a type="button" class="btn btn-sm btn-warning" onclick="acticeAndDeactive(1,'.$row->id.')">Actived</a></td>
                                                <td><a type="button" class="btn btn-sm btn-danger" onclick="acticeAndDeactive(2,'.$row->id.')">Delete</a></td>';
                                        }

                                     ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    function acticeAndDeactive(check, id){
        var elem = document.getElementById('main');

        if(window.XMLHttpRequest){
            // code IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }else{
            // Code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //elem.innerHMTL = "";
                elem.innerHMTL = this.responseText;
                window.location.reload(true);
            }
        };

        xmlhttp.open('GET', 'updatedusers.php?id='+id+'&check='+check, true);
        xmlhttp.send();
    }
</script>

<!-- Footer -->
<?php footer(); ?>