<?php

if (isset($_POST['submit'])) {
  include 'db_connect.php';

  $accountName = mysqli_real_escape_string($mySQL, $_POST['accountID']);
  $accountFirst = mysqli_real_escape_string($mySQL, $_POST['signupFirstName']);
  $accountLast = mysqli_real_escape_string($mySQL, $_POST['signupLastName']);
  $accountEmail = mysqli_real_escape_string($mySQL, $_POST['editEmail']);
  $accountPassword = mysqli_real_escape_string($mySQL, $_POST['editPassword']);
  $hashedPassword = password_hash($accountPassword, PASSWORD_DEFAULT);
  $accountCountry = mysqli_real_escape_string($mySQL, $_POST['country']);
  $accountDescription = nl2br($_POST['description']);
  $accountTags = mysqli_real_escape_string($mySQL, $_POST['tags']);
  $accountLevel = mysqli_real_escape_string($mySQL, $_POST['userlevel']);

  if (empty($accountPassword)) {
    $updateSQL = "UPDATE users SET username = '$accountName', first_name = '$accountFirst', last_name = '$accountLast', email = '$accountEmail', country = '$accountCountry', description = '$accountDescription', account_tags = '$accountTags', userlevel = '$accountLevel' WHERE username= '$accountName';";

    $results = mysqli_query($mySQL, $updateSQL);

    header("Location: ../admin/accounts?edit=successNP");

  } else {
    $updateSQL = "UPDATE users SET username = '$accountName', first_name = '$accountFirst', last_name = '$accountLast', email = '$accountEmail', user_password = '$hashedPassword', country = '$accountCountry', description = '$accountDescription', account_tags = '$accountTags', userlevel = '$accountLevel' WHERE username= '$accountName';";

    $results = mysqli_query($mySQL, $updateSQL);

    header("Location: ../admin/accounts?edit=successP");
  }
}
