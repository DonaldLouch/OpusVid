<?php
/* db_editA.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is to edit a users account and their information

  Blades Inlcluded:
    #db_connect: To connect to Database
    #emails/email_editAccount: Sends email once user updated

  File used in:
    #dashboard/settingsA
*/

if (isset($_POST['submit'])) {
  require 'db_connect.php';

  $accountName = mysqli_real_escape_string($mySQL, $_POST['accountID']);
  $accountEmail = mysqli_real_escape_string($mySQL, $_POST['editEmail']);
  $accountPassword = mysqli_real_escape_string($mySQL, $_POST['editPassword']);
  $hashedPassword = password_hash($accountPassword, PASSWORD_DEFAULT);

  if (empty($accountPassword)) {
    $updateSQL = "UPDATE users SET email = '$accountEmail' WHERE username= '$accountName';";

    $results = mysqli_query($mySQL, $updateSQL);

    include 'emails/email_editAccount.php';

    header("Location: ../dashboard/settingsA?edit=success");
  } else {
    $updatePASSSQL = "UPDATE users SET email = '$accountEmail', user_password = '$hashedPassword' WHERE username= '$accountName';";
    $results = mysqli_query($mySQL, $updatePASSSQL);

    include 'emails/email_editAccount';
    
    header("Location: ../dashboard/settingsA?edit=success");
  }
}
