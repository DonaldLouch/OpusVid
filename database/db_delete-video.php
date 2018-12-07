<?php
/* db_delete-video.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is used to delete videos upon clicking the delete button.

  Blades Included:
    #db_connect: To connect to Database
    #emails/email_deleted_video: Sends email to admin when video is deleted

  File used in:
    #dashboard/manage
    #admin/videos
*/

if (isset($_POST['submit'])) { //Action once form is submitted #FormSubmitted
  require 'db_connect.php'; // Gets database connection

  $id = $_POST['videoIDDel']; // Get's the video ID of the deleted video

  require 'emails/email_deleted_video.php'; // Sends email to admin@opusvid.com to alert a video was deleted

  $delSQL = "DELETE FROM videos WHERE id = '$id';";
  $results = mysqli_query($mySQL, $delSQL); // Deletes video

  header("Location: ../dashboard/manage?delete=success"); //* Once the video is deleted the user will be redirected to the manager page: Success Message!
  echo $message;
} // End: FormSubmitted
else { //Failed to delete or form not submitted #Failed
  header("Location: ../dashboard/manage?delete=failed"); // If failed the video is deleted the user will be redirected to the manager page: Error Message
} //End: Failed
