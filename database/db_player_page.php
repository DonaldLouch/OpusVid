<?php
/* db_player_page.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is to get the information for the selected video.

  Blades Included:
    #db_connect: To connect to Database

  File used in:
    #player?id=*
*/

require 'db_connect.php';

//Gets the video ID
  $playerID = $_GET['id'];

//Gets view count > updates by 1
  $newView = "UPDATE videos SET views = views + 1 WHERE id = '" . mysqli_escape_string($mySQL,$playerID) . "'";
  $addView = mysqli_query($mySQL, $newView);

//Gets the video infomation
  $playerSQL = "SELECT * FROM videos WHERE id = '" . mysqli_escape_string($mySQL,$playerID) . "';";
  $resultPlayer = mysqli_query($mySQL, $playerSQL);

  $user1SQL = "SELECT * FROM videos WHERE id = '" . mysqli_escape_string($mySQL,$playerID) . "';";
  $resultUser1 = mysqli_query($mySQL, $user1SQL);
  $user1 = mysqli_fetch_assoc($resultUser1);

  $username = $user1['opus_creator'];

  $userSQL = "SELECT * FROM users WHERE username = '" . mysqli_escape_string($mySQL,$username) . "';";
  $resultUser = mysqli_query($mySQL, $userSQL);
  $user = mysqli_fetch_assoc($resultUser);


  $following = $user['opus_creator'];
  include 'db_templates/follow.php'; //Follow function by username
