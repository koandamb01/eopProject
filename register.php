<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['firstname'] = $_POST['firstname'];
$_SESSION['lastname'] = $_POST['lastname'];
$_SESSION['title'] = $_POST['title'];

// Escape all $_POST variables to protect against SQL injections
$firstname = $mysqli->escape_string($_POST['firstname']);
$lastname = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$title = $mysqli->escape_string($_POST['title']);
$code = $mysqli->escape_string($_POST['counselorCode']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
      
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO users (firstname, lastname, email, title, password, hash, c_code) " 
            . "VALUES ('$firstname','$lastname','$email', '$title', '$password', '$hash', '$code')";
 
    // Add user to the database
    if ($mysqli->query($sql)){

        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification (Buffalo State EOP Database)';
        $message_body = '
        Hello '.$firstname.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/eopproject/verify.php?email='.$email.'&hash='.$hash;

        mail( $to, $subject, $message_body );

        header("location: profile.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}
?>