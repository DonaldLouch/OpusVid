<?php

if (isset($_POST['submit'])) {
  include 'db_connect.php';

  $accountName = mysqli_real_escape_string($mySQL, $_POST['accountID']);
  $accountEmail = mysqli_real_escape_string($mySQL, $_POST['editEmail']);
  $accountPassword = mysqli_real_escape_string($mySQL, $_POST['editPassword']);
  $hashedPassword = password_hash($accountPassword, PASSWORD_DEFAULT);

  if (empty($accountPassword)) {
    $updateSQL = "UPDATE users SET email = '$accountEmail' WHERE username= '$accountName';";

    $results = mysqli_query($mySQL, $updateSQL);
    header("Location: ../dashboard/settingsA?edit=success");
  } else {
    $updatePASSSQL = "UPDATE users SET email = '$accountEmail', user_password = '$hashedPassword' WHERE username= '$accountName';";
    $results = mysqli_query($mySQL, $updatePASSSQL);

    header("Location: ../dashboard/settingsA?edit=success");
  }
}
