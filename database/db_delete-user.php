<?php
/* db_delete-user.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is used to delete users upon clicking the delete button. Feature to be implemented in Account Settings!

  Blades Inlcluded:
    #db_connect: To connect to Database
    #emails/email_deleted_video: Sends email to admin when a user is deleted

  File used in:
    #admin/accounts
*/

if (isset($_POST['submit'])) {
  require 'db_connect.php';
  $id = $_POST['profileIDDel'];
  $username = $_POST['profileUNameDel'];

  require 'emails/email_deleted_account.php';

  $delSQL = "DELETE FROM users WHERE id = '$id';";
  $results = mysqli_query($mySQL, $delSQL);

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

  header("Location: ../admin/accounts?delete=success");
} else {
  header("Location: ../admin/accounts?delete=failed");
}
