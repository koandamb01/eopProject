<?php 
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log Out</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
      body{
        background-image: url("img/bg.jpg");
        background-size: 100%;
      }
    </style>
  </head>
  
  <body>

    <section class="well success-box">
      <h1>Thanks for stopping by</h1>
              
      <p><?= 'You have been logged out!'; ?></p>
      
      <a href="index.php"><button class="btn btn-default btn-block">Home</button></a>
    </section>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
