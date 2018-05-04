<?php
/* Main page with two forms: sign up and log in */
require 'functions/db.php';
session_start();

include 'functions/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Account Registration</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // User Login
    if(isset($_POST['register'])){ // user registration
      require 'register.php';
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
        <div id="navbar" class="collapse navbar-collapse">

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center"> Admin Area <small>Account Registration</small></h1>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <form id="myForm" class="well" action="registration.php" method="post" onsubmit="return validateForms('r')">
                <div class="form-group">
                  <label>Firstname</label>
                  <span id="fnameErr"></span>
                  <input type="text" class="form-control" name="firstname" placeholder="Enter Firstname">
                </div>

                <div class="form-group">
                  <label>Lastname</label>
                  <span id="lnameErr"></span>
                  <input type="text" class="form-control" name="lastname" placeholder="Enter Lastname">
                </div>
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Title</label>
                      <span id="titleErr"></span>
                      <select class="form-control" name="title">
                        <option value=""></option>
                        <option value="counselor">I'm a Counselor</option>
                        <option value="secretary">I'm a Secretary</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Code</label>
                      <span id="counselorCodeErr"></span>
                      <input type="number" class="form-control" disabled name="counselorCode" placeholder="Enter Counselor Code">
                    </div>
                  </div>
                </div>
                
    

                <div class="form-group">
                  <span id="emailErr"></span>
                  <label>Email Address</label>
                  <input type="text" class="form-control" name="email" placeholder="Enter Email...">
                </div>

                <div class="form-group">
                  <span id="passwordErr"></span>
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                
                <button type="submit" name="register" class="btn btn-default btn-block">Create Account</button>

                <br>
                <p class="text-center"><a href="index.php">Login</a></p>
              </form>
          </div>
        </div>
      </div>
    </section>

<script type="text/javascript">
    // event lister to the checkbox IsEOP
    // Disabled the Counselor dropdown menu if Iseop checkbox is check
    var dropdown = document.querySelector("select[name=title]");
    dropdown.addEventListener('change', function(){
      if(this.value == "counselor"){
        document.forms['myForm']['counselorCode'].disabled = false;
      }else{
        document.forms['myForm']['counselorCode'].disabled = true;
      }
    })
</script>
<?php footer(); ?>