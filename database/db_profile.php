<?php
/* db_profile.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is to display a users profile

  Blades Inlcluded:
    #db_connect: To connect to Database

  File used in:
    #profile?id=*
*/

require 'db_connect.php';

//Gets the username
  $profileID = $_GET['id'];

//Gets the username and the content from the user
  $userSQL = "SELECT * FROM users WHERE username = '" . mysqli_escape_string($mySQL,$profileID) . "';";
  $userResult = mysqli_query($mySQL, $userSQL);
  $userRow = $userResult->fetch_assoc();

  $follower = $_SESSION['uID'];

  $followingSQL = "SELECT * FROM following WHERE follower_id='$follower'";
  $followResult = mysqli_query($mySQL, $followingSQL);

//Gets the videos from the user
  $playerSQL = "SELECT * FROM videos WHERE privacy = 'public' AND opus_creator = '" . mysqli_escape_string($mySQL,$profileID) . "';";
  $resultPlayer = mysqli_query($mySQL, $playerSQL);

  include 'db_templates/foreach_player.php';
