<?php
/* logout.database.php | Version 1.0
  By: DevLexicon
  User Level Required: anyone

  The file allows users to logout and ends the session!

  File used in:
    # login
    # Dashboard Navigation
    # Header
*/

if (isset($_POST['logout'])) { //When logout form is submitted #LoggedOut
  session_start(); //If user session not already started; start the user session
  session_unset(); //Unlinks user session
  session_destroy(); //Ends user session: Logs out user

  header('Location: ../../login?type=logoutSuccess'); //Redirect to login page: Account Logged Success Message
  exit();
} //End: LoggedOut
