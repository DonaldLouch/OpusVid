<?php
/* db_logoyt.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file allows users to logout and ends the session!

  File used in:
    #../login
*/

if (isset($_POST['submit'])) { //When logout form is submitted #LoggedOut
  session_start(); //If user session not already started; start the user session
  session_unset(); //Unlinks user session
  session_destroy(); //Ends user session: Logs out user

  header('Location: ../login?logged=success'); //Redirect to login page: Account Logged Success Message
  exit();
} //End: LoggedOut
