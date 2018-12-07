<?php
/* db_pass_rest.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  This file is step 1 and 2 of 4 for the password rest process!

  Blades Included:
    #db_connect: To connect to Database
    #emails/email_passwordReset: Sends password reset link to the users email!

  File used in:
    #../password_reset
*/

if (isset($_POST['reset-password'])) { //If form is submit #FormSubmitted
  require 'db_connect.php';
  $errors = 0; //Sets initial error number to 0 meaning no errors

  $email = mysqli_real_escape_string($mySQL, $_POST['email']);
  $emailSQL = "SELECT email FROM users WHERE email='$email'";
  $emailResults = mysqli_query($mySQL, $emailSQL);

  if (empty($email)) { //If the email field is empty redirect to password reset page #Empty
    $errors = 1; //Error reached
    header("Location: ../password_reset?reset=empty");
  } //End: Empty
  elseif(mysqli_num_rows($emailResults) <= 0) { //Checks to makes sure the email entered is associated to an account #Email
    $errors = 2;
    header("Location: ../password_reset?reset=invaild");
  } //End: Email

  $token = bin2hex(random_bytes(50)); //Generates random token

  if ($errors == 0) { //If no errors then add password reset request to database #PassReset
    $resetInsert = "INSERT INTO password_reset (email, token) VALUES ('$email', '$token')";
    $results = mysqli_query($mySQL, $resetInsert);

    require "emails/email_passwordReset"; //Send email to user

    header('location: ../password_pending?email=' . $email);
  } //End: PassReset
} //End: FormSubmitted
