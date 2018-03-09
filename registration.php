<?php require 'functions/functions.php';?>
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
          <a class="navbar-brand" href="#">AdminStrap</a>
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
            <form id="myForm" class="well" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" onsubmit="return validateForms('r')">
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
                
                <div class="form-group">
                  <label>Title</label>
                  <span id="titleErr"></span>
                  <select class="form-control" name="title">
                    <option value=""></option>
                    <option value="counselor">I'm a Counselor</option>
                    <option value="secretary">I'm a Secretary</option>
                  </select>
                </div>
    

                <div class="form-group">
                  <span id="emailErr"></span>
                  <label>Email Address</label>
                  <input type="text" class="form-control" name="email" placeholder="Enter Email">
                </div>

                <div class="form-group">
                  <span id="passwordErr"></span>
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                
                <button type="submit" class="btn btn-default btn-block">Create Account</button>
              </form>
          </div>
        </div>
      </div>
    </section>

<?php footer(); ?>