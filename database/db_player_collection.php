<?php
/* db_player_collection.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  This file is used to make the collecton view page funtion!

  Blades Inlcluded:
    #db_connect: To connect to Database

  File used in:
    #collection?id=*
*/

require 'db_connect.php';

//Gets the video ID
  $collectionID = $_GET['id'];
  $currentVidID = $_GET['vid'];
  $currentIndex = $_GET['index'];

//Gets view count > updates by 1
  $newView = "UPDATE collections SET views = views + 1 WHERE id = '" . mysqli_escape_string($mySQL, $collectionID) . "'";
  $addView = mysqli_query($mySQL, $newView);

//Gets the video infomation
  $collectionSQL = "SELECT * FROM collections WHERE id = '" . mysqli_escape_string($mySQL, $collectionID) . "';";
  $resultCollection = mysqli_query($mySQL, $collectionSQL);
  $collection = mysqli_fetch_assoc($resultCollection);

  $selectSQL = "SELECT videos FROM collections WHERE id = '" . mysqli_escape_string($mySQL, $collectionID) . "';";
  $selectResult = mysqli_query($mySQL, $selectSQL);
  $selectRow = mysqli_fetch_assoc($selectResult);
  $selectCount = mysqli_num_rows($selectResult);
  $videosAlreadyAdded = explode(' / ', $selectRow['videos'], -1);

  $videoNumber = sizeof($videosAlreadyAdded);

  $playerID = $videosAlreadyAdded[$currentIndex];

  $currentVidSQL = "SELECT * FROM videos WHERE id = '$playerID'";
  $currentVidResults = mysqli_query($mySQL, $currentVidSQL);
  $video = mysqli_fetch_assoc($currentVidResults);

  $pathID = implode("' OR id = '", $videosAlreadyAdded);
  $pathSQL = "SELECT video_path FROM videos WHERE id = '$pathID'";
  $pathResults = mysqli_query($mySQL, $pathSQL);
  $pathFetch = mysqli_fetch_all($pathResults);

  $userID = $video['opus_creator'];
  $userSelect = "SELECT * FROM users WHERE username = '" . mysqli_escape_string($mySQL, $userID) . "';";
  $userResults = mysqli_query($mySQL, $userSelect);
  $user = mysqli_fetch_assoc($userResults);

  $following = $userID;
  include 'db_templates/follow.php';
