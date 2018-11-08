<?php
/* db_pass_rest.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  This file is step 1 and 2 of 4 for the password rest process!

  Blades Inlcluded:
    #db_connect: To connect to Database
    #emails/email_passwordRese: Sends password reset link to the users email!

  File used in:
    #../password_reset
*/

if (isset($_POST['reset-password'])) {
  require 'db_connect.php';
  $errors = 0;

  $email = mysqli_real_escape_string($mySQL, $_POST['email']);
  $emailSQL = "SELECT email FROM users WHERE email='$email'";
  $emailResults = mysqli_query($mySQL, $emailSQL);

  if (empty($email)) {
    $errors = 1;
    header("Location: ../password_reset?reset=empty");
  }elseif(mysqli_num_rows($emailResults) <= 0) {
    $errors = 2;
    header("Location: ../password_reset?reset=invaild");
  }
  $token = bin2hex(random_bytes(50));

  if ($errors == 0) {
    $resetInsert = "INSERT INTO password_reset (email, token) VALUES ('$email', '$token')";
    $results = mysqli_query($mySQL, $resetInsert);

    require "emails/email_passwordReset";

    header('location: ../password_pending?email=' . $email);
  }
}
