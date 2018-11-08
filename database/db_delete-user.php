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

  require 'emails/email_deleted_account.php';

  $delSQL = "DELETE FROM users WHERE id = '$id';";
  $results = mysqli_query($mySQL, $delSQL);

  header("Location: ../admin/accounts?delete=success");
} else {
  header("Location: ../admin/accounts?delete=failed");
}
