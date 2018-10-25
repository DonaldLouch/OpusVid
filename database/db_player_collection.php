<?php
//Gets the video ID
  $collectionID = $_GET['id'];
  $currentVidID = $_GET['vid'];

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

  //print_r($videosAlreadyAdded);

  //$allIDS =  '["5bc6b1960cacd", "4ba5c8c9d044", "5ba5c8c", "5ba5c8c9d044", "5ba5"]';

  //"'".implode( "', '", $videosAlreadyAdded)."'";
  //'"' . . '"'
  //echo "</br>".$allIDS;

  $videoNumber = sizeof($videosAlreadyAdded);

  $currentVidSQL = "SELECT * FROM videos WHERE id = '$currentVidID'";
  $currentVidResults = mysqli_query($mySQL, $currentVidSQL);
  $video = mysqli_fetch_assoc($currentVidResults);

  $pathID = implode("' OR id = '", $videosAlreadyAdded);
  $pathSQL = "SELECT video_path FROM videos WHERE id = '$pathID'";
  $pathResults = mysqli_query($mySQL, $pathSQL);
  $pathFetch = mysqli_fetch_all($pathResults);



  $playerID = $_GET['id'];

  $playerSQL = "SELECT * FROM videos WHERE id = '" . mysqli_escape_string($mySQL, $playerID) . "';";
  $resultPlayer = mysqli_query($mySQL, $playerSQL);
