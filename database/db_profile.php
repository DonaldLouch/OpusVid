<?php
//Gets the username
  $profileID = $_GET['id'];


//Gets view count > updates by 1
  $newView = "UPDATE users SET views = views + 1 WHERE username = '" . mysqli_escape_string($mySQL,$profileID) . "'";
  $addView = mysqli_query($mySQL, $newView);

//Gets the username and the content from the user
  $userSQL = "SELECT * FROM users WHERE username = '" . mysqli_escape_string($mySQL,$profileID) . "';";
  $userResult = mysqli_query($mySQL, $userSQL);
  $userRow = $userResult->fetch_assoc();

  $follower = $_SESSION['uID'];
  $profileID;

  $followingSQL = "SELECT * FROM following WHERE follower_id='$follower'";
  $followResult = mysqli_query($mySQL, $followingSQL);
  //$followResultCheck = $followResult->fetch_assoc();

//Gets the videos from the user
  $playerSQL = "SELECT * FROM videos WHERE privacy = 'public' AND opus_creator = '" . mysqli_escape_string($mySQL,$profileID) . "';";
  $resultPlayer = mysqli_query($mySQL, $playerSQL);

  //Creates the infomation for the "foreach" loop
  $players = array();
  if (mysqli_num_rows($resultPlayer) > 0) {
    while ($player = mysqli_fetch_assoc($resultPlayer)) {
      $players[] = $player;
    }
  }
