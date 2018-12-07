<?php
/* db_editA.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is to edit a users account and their information

  Blades Included:
    #db_connect: To connect to Database
    #emails/email_editAccount: Sends email once user updated

  File used in:
    #dashboard/settingsA
*/

if (isset($_POST['delete'])) { //Looks to see if the form has been submitted as "delete" #FormSubmittedDelete
  require 'db_connect.php'; //Connects to the database

  $id = $_POST['numberID']; //Gets the current session ID: User ID
  $username = $_SESSION['uName']; //Gets the current session ID: Username

  require 'emails/email_deleted_account.php'; //Sends an email to admin@opusvid.com to inform of an account deletion

  $delSQL = "DELETE FROM users WHERE id = '$id';";
  $query = mysqli_query($mySQL, $delSQL); //Deletes user from the database

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

  session_start(); //If user session not already started; start the user session
  session_unset(); //Unlinks user session
  session_destroy(); //Ends user session: Logs out user

  header("Location: ../login?delete=success"); //Redirect to login page: Account Delete Success Message
} //End: FormSubmittedDelete

if (isset($_POST['submit'])) { //Looks to see if the form has been submitted #FormSubmitted
  require 'db_connect.php';

  $accountName = mysqli_real_escape_string($mySQL, $_POST['accountID']); //From form: User ID
  $accountEmail = mysqli_real_escape_string($mySQL, $_POST['editEmail']); //From form: NEW email
  $accountPassword = mysqli_real_escape_string($mySQL, $_POST['editPassword']); //From form: NEW password raw
  $hashedPassword = password_hash($accountPassword, PASSWORD_DEFAULT); //Hashes password

  if (empty($accountPassword)) { //If no new password was entered it will update the database with the just the new email #EmailUpdate
    $updateSQL = "UPDATE users SET email = '$accountEmail' WHERE username= '$accountName';";
    $results = mysqli_query($mySQL, $updateSQL); //Updates users email

    include 'emails/email_editAccount.php'; //Sends email to user and admin: Account Updated

    header("Location: ../dashboard/settingsA?edit=success"); //Redirects to account settings page: Edit Success Message
  } //End: EmailUpdate
  else { //If there IS a new password entered then it will update the email and password #EmailPassUpdate
    $updatePASSSQL = "UPDATE users SET email = '$accountEmail', user_password = '$hashedPassword' WHERE username= '$accountName';";
    $results = mysqli_query($mySQL, $updatePASSSQL); //Updates users email and password

    include 'emails/email_editAccount';

    header("Location: ../dashboard/settingsA?edit=success");
  } //EndL EmailPassUpdate
} //End: FormSubmitted
