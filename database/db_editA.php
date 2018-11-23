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

if (isset($_POST['delete'])) {
  require 'db_connect.php';
  $id = $_POST['numberID'];
  $username = $_SESSION['uName'];

  require 'emails/email_deleted_account.php';

  $delSQL = "DELETE FROM users WHERE id = '$id';";
  $query = mysqli_query($mySQL, $delSQL);

  $delSQL2 = "DELETE FROM videos WHERE opus_creator = '$username';";
  $query2 = mysqli_query($mySQL, $delSQL2);

  $delSQL3 = "DELETE FROM collection WHERE opus_creator = '$username';";
  $query3 = mysqli_query($mySQL, $delSQL3);

  $delSQL4 = "DELETE FROM following WHERE follower_id = '$id';";
  $query4 = mysqli_query($mySQL, $delSQL4);

  $delSQL5 = "DELETE FROM mail WHERE user_to = '$username';";
  $query5 = mysqli_query($mySQL, $delSQL5);

  $delSQL6 = "DELETE FROM watch_later WHERE user = '$username';";
  $query6 = mysqli_query($mySQL, $delSQL6);

  session_start();
  session_unset();
  session_destroy();

  header("Location: ../login?delete=success");
}

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
