<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $firstname = $_SESSION['first_name'];
    $lastname = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
      body{
        background-image: url("img/bg.jpg");
        background-size: 100%;
      }
      
      .link{
        width: 80%;
        padding: 8px;
        margin: auto;
        background-color: #64141E;

      }

      h2{
        color: #28B088;
        font-weight: bold;
      }
    </style>
  </head>
  
  <body>

    <section class="well success-box">
      <h1>Welcome</h1>
      <br>
      <p>
        <?php
          // Display message about account verification link only once
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];
              
              // Don't annoy the user with more messages upon page refresh
              unset( $_SESSION['message'] );
          }
        ?>
      </p>

       <?php
          // Keep reminding the user this account is not active, until they activate
          if ( !$active ){
              echo
              '<div class="link">
                  Account is unverified, please confirm your email by clicking
                  on the email link!
              </div>';
          }
          ?>
          
          <h2><?php echo $firstname.' '.$lastname; ?></h2>
          <p><?= $email ?></p>
      <br>
      <a href="index.php"><button class="btn btn-default btn-block">Home</button></a>
    </section>
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
