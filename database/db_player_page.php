<?php
//Gets the video ID
  $playerID = $_GET['id'];

//Gets view count > updates by 1
  $newView = "UPDATE videos SET views = views + 1 WHERE id = '" . mysqli_escape_string($mySQL,$playerID) . "'";
  $addView = mysqli_query($mySQL, $newView);

//Gets the video infomation
  $playerSQL = "SELECT * FROM videos WHERE id = '" . mysqli_escape_string($mySQL,$playerID) . "';";
  $resultPlayer = mysqli_query($mySQL, $playerSQL);
