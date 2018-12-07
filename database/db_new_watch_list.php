<?php
/* db_new_watch_list.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  This file is used to initialize the watch later list!

  Blades Included:
    #db_connect: To connect to Database

  File used in:
    #watch_later?id=*
*/

if (isset($_POST['new'])) { //If form is submitted #FormSubmitted
  require 'db_connect.php';
  session_start(); //Starts session
  $user = $_SESSION['uName']; //Gets the username from the session

  $sqlSearch = "SELECT * FROM watch_later WHERE user = '$user'";
  $querySearch = mysqli_query($mySQL, $sqlSearch); //Sees if the user already has a watch list already initiated

  if (mysqli_num_rows($querySearch) === 0) { //If the user isn't in the database #NewUser
    $sqlInsert = "INSERT INTO watch_later (user, privacy) VALUES ('$user', 'private')";
    if (mysqli_query($mySQL, $sqlInsert)) { //#AddUser
      header("Location: ../../watch_later?list=done");
    } //End: AddUser
    else { //If an error occurred then redirect to watch list #ErrorAdding
      header("Location: ../../watch_later?list=error");
    } //End: ErrorAdding
  } //End: NewUser
  else { //If user is already initiated #Already
    header("Location: ../../watch_later?list=set");
  } //End: Already
  header("Location: ../../watch_later?list=alreadydone");
} //End: FormSubmitted
