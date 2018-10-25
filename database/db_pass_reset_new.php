<?php

if (isset($_POST['change-password'])) {
  include 'db_connect.php';

  $errors = 0;

  $newPassword = mysqli_real_escape_string($mySQL, $_POST['new_password']);
  $passwordConfirmed = mysqli_real_escape_string($mySQL, $_POST['confirm_password']);
  $token = mysqli_real_escape_string($mySQL, $_POST['token']);

  if (empty($newPassword) || empty($passwordConfirmed)){
    $errors = 1;
    header("Location: ../password_new?token=$token&reset=empty");
  } elseif ($newPassword !== $passwordConfirmed){
    $errors = 2;
    header("Location: ../password_new?token=$token&reset=invaild");
  }

  if ($errors == 0) {
    $selectSQL = "SELECT email FROM password_reset WHERE token='$token' LIMIT 1";
    $selectResults = mysqli_query($mySQL, $selectSQL);
    $email = mysqli_fetch_assoc($selectResults)['email'];

    if ($email) {
      $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
      $updateSQL = "UPDATE users SET user_password = '$hashedPassword' WHERE email='$email';";
      $updateResults = mysqli_query($mySQL, $updateSQL);

      $removeSQL = "DELETE FROM password_reset WHERE token='$token';";
      $removeResults = mysqli_query($mySQL, $removeSQL);

      header("location: ../login");
    }
  }
}
