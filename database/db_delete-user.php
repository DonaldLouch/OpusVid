<?php
/* db_delete-user.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is used to delete users upon clicking the delete button. Feature to be implemented in Account Settings!

  Blades Included:
    #db_connect: To connect to Database
    #emails/email_deleted_video: Sends email to admin when a user is deleted

  File used in:
    #admin/accounts
*/

if (isset($_POST['submit'])) { // Action once form is submitted #FormSubmitted
  require 'db_connect.php'; // Gets database connection

  $id = $_POST['profileIDDel']; // Get's the user ID of the deleted user
  $username = $_POST['profileUNameDel']; // Get's the username of the deleted user

  require 'emails/email_deleted_account.php'; // Sends email to admin@opusvid.com to alert a user was deleted

  $delSQL = "DELETE FROM users WHERE id = '$id';";
  $results = mysqli_query($mySQL, $delSQL); // Deletes the user

  $delSQL2 = "DELETE FROM videos WHERE opus_creator = '$username';";
  $query2 = mysqli_query($mySQL, $delSQL2); //Deletes the users video(s) from the database

  $delSQL3 = "DELETE FROM collection WHERE opus_creator = '$username';";
  $query3 = mysqli_query($mySQL, $delSQL3); //Deletes the users collection(s) from the database

  $delSQL4 = "DELETE FROM following WHERE follower_id = '$id';";
  $query4 = mysqli_query($mySQL, $delSQL4); //Deletes the users following(s) from the database

  $delSQL5 = "DELETE FROM mail WHERE user_to = '$username';";
  $query5 = mysqli_query($mySQL, $delSQL5); //Deletes the users message(s) from the database

  $delSQL6 = "DELETE FROM watch_later WHERE user = '$username';";
  $query6 = mysqli_query($mySQL, $delSQL6); //Deletes the video(s) from the users watch later list on the database

  header("Location: ../admin/accounts?delete=success"); // Once the user is deleted the admin will be redirected to the accounts page: Success Message!
} // End: FormSubmitted
else { //Failed to delete or form not submitted #Failed
  header("Location: ../admin/accounts?delete=failed"); // If failed the user is deleted the admin will be redirected to the accounts page: Error Message
} //End: Failed
