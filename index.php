<?php require 'functions/functions.php';
/* Main page with two forms: sign up and log in */
require 'functions/db.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Account Login</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // User Login
    if(isset($_POST['login'])){

      require 'login.php';

    }
 } 
 ?>

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
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center"> Admin Area <small>Account Login</small></h1>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form id="myForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" onsubmit="return validateForms('l')">
                  <div class="form-group">
                    <span id="emailErr"></span>
                    <label>Email Address</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                  <p class="text-right"><a href="forgot.php">Forgot Password?</a></p>
                  <button type="submit" name="login" class="btn btn-default btn-block">Login</button>
                  <br>
                  <p class="text-center"><a href="registration.php">Create Account</a></p>
              </form>
          </div>
        </div>
      </div>
    </section>

  <?php

  footer();

  ?>