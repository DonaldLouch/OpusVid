<?php
/* db_delete-video.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is used to delete videos upon clicking the delete button.

  Blades Inlcluded:
    #db_connect: To connect to Database
    #emails/email_deleted_video: Sends email to admin when video is deleted

  File used in:
    #dashboard/manage
    #admin/videos
*/

if (isset($_POST['submit'])) {
  require 'db_connect.php';
  $id = $_POST['videoIDDel'];

  require 'emails/email_deleted_video.php';

  $delSQL = "DELETE FROM videos WHERE id = '$id';";
  $results = mysqli_query($mySQL, $delSQL);

  header("Location: ../dashboard/manage?delete=success");
  echo $message;
} else {
  header("Location: ../dashboard/manage?delete=failed");
}
