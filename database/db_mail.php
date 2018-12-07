<?php
/* db_mail.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  This file gets emails to be displayed on the Dashboard

  Blades Included:
    #db_connect: To connect to Database

  File used in:
    #Dashboard
*/

require 'db_connect.php'; //Connects to database
$username = $_SESSION['uName'];


$selectSQL = "SELECT * FROM mail WHERE user_to = '$username'";
$selectQuery = mysqli_query($mySQL, $selectSQL); //Gets messages from database

//Loops messages
$messages = array();
if (mysqli_num_rows($selectQuery) > 0) {
  while ($message = mysqli_fetch_assoc($selectQuery)) {
    $messages[] = $message;
  }
}
