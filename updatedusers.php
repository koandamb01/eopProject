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
require 'functions/vars.php';


$id = intval($_GET['id']);
$check = intval($_GET['check']);

if($check == 0 OR $check == 1){
	// Updated user information active or deactivate
	$stmt = $pdo->prepare('UPDATE users SET active = ? WHERE id = ?');
	$stmt->execute([$check, $id]);
}
elseif ($check == 2) {
	// Delete this user account
	$stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
	$stmt->execute([$id]);
}
?>

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