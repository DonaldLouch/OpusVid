<?php
/* db_pass_rest_new.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  This file is step 3 and 4 of 4 for the password rest process!

  Blades Included:
    #db_connect: To connect to Database

  File used in:
    #../password_new?token*
*/

if (isset($_POST['change-password'])) { //If form is submit #FormSubmitted
  require 'db_connect.php';

  $errors = 0; //Sets initial error number to 0 meaning no errors

  $newPassword = mysqli_real_escape_string($mySQL, $_POST['new_password']);
  $passwordConfirmed = mysqli_real_escape_string($mySQL, $_POST['confirm_password']);
  $token = mysqli_real_escape_string($mySQL, $_POST['token']);

  if (empty($newPassword) || empty($passwordConfirmed)){ //If rather the password or password confirmed fields are empty redirect to the new password page #Empty
    $errors = 1; //Error reached
    header("Location: ../password_new?token=$token&reset=empty");
  } //End: Empty
  elseif ($newPassword !== $passwordConfirmed){ //If the password is not the same as the confirmed password #NotSame
    $errors = 2;
    header("Location: ../password_new?token=$token&reset=invaild");
  } //End: NotSame

  if ($errors == 0) { //If no errors then get the users email #Email
    $selectSQL = "SELECT email FROM password_reset WHERE token='$token' LIMIT 1";
    $selectResults = mysqli_query($mySQL, $selectSQL);
    $email = mysqli_fetch_assoc($selectResults)['email'];

    if ($email) { //Hash new password; update the user password; remove token from password reset database #Password
      $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
      $updateSQL = "UPDATE users SET user_password = '$hashedPassword' WHERE email='$email';";
      $updateResults = mysqli_query($mySQL, $updateSQL);

      $removeSQL = "DELETE FROM password_reset WHERE token='$token';";
      $removeResults = mysqli_query($mySQL, $removeSQL);

      header("location: ../login"); //Redirect to login page
    } //End: Password
  } //End: Email
} //End: FormSubmitted
