<?php 
require 'functions/functions.php';

/* The password reset form, the link to this page is included
   from the forgot.php email message
*/
require 'functions/db.php';
session_start();

// Make sure email and hash variables aren't empty
if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) )
{
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 

    // Make sure user email with matching hash exist
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "You have entered invalid URL for password reset!";
        header("location: error.php");
    }
}
else {
    $_SESSION['message'] = "Sorry, verification failed, try again!";
    header("location: error.php");  
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Reset your password</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">EOP Database</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center"> Admin Area <small>Reset Your Password</small></h1>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form id="myForm" class="well" action="reset_password.php" method="post" onsubmit="return validateForms('f')">
                  
                  <div class="form-group">
                    <span id="passwordErr"></span>
                    <label>New Password</label>
                    <input type="password" class="form-control" name="newpassword" placeholder="Password">
                  </div>

                  <div class="form-group">
                    <span id="passwordErr"></span>
                    <label>Confirm New Password</label>
                    <input type="password" class="form-control" name="confirmpassword" placeholder="Password">
                  </div>
                  
                  <!--This input field is needed, to get the email of the user -->
                  <input type="hidden" name="email" value="<?= $email ?>">    
                  <input type="hidden" name="hash" value="<?= $hash ?>">  

                  <br>
                  <button type="submit" class="btn btn-default btn-block">Reset</button>
              </form>
          </div>
        </div>
      </div>
    </section>

<?php footer(); ?>