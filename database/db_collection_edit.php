<?php
/* db_collection_edit.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is to get the videos that are in a collection and display the information of the videos

  Blades Included:
    #db_connect: To connect to Database

  File used in:
    #dashboard/edit_collection?id=*

  Possible Duplicate:
      #db_collection_add.php
*/

session_start(); // Starts user session

require 'db_connect.php'; // Gets database connection

$profileID = $_SESSION['uName']; // Gets the username of the logged in user
$collectionID = $_GET['id']; // Gets's the ID of the collection

$sql = "SELECT * FROM collections WHERE id = '" . mysqli_escape_string($mySQL, $collectionID) . "';";
$result = mysqli_query($mySQL, $sql); // The function that gets the database: connects then stores

$selectSQL = "SELECT videos FROM collections WHERE id = '" . mysqli_escape_string($mySQL, $collectionID) . "';";
$selectResult = mysqli_query($mySQL, $selectSQL); // The function that gets the database: connects then stores
$selectRow = mysqli_fetch_assoc($selectResult); // Gets's the video array information of the selected collection
$selectCount = mysqli_num_rows($selectResult); // Get's the number of collections in the table
$videosAlreadyAdded = explode(' / ', $selectRow['videos'], -1); // Get's the videos array within the selected collection and then separates each video id into separates arrays

$videoNumber = sizeof($videosAlreadyAdded) - 2; // Get's the number of arrays

for ($x = 0; $x < $videoNumber; $x++){ // For every video in the collection this will be looped
  $vidID = $videosAlreadyAdded[$x]; // Get's the video ID of each individual video

  $videoSQL = "SELECT * FROM videos WHERE opus_creator = '$profileID' AND id = '$vidID'";
  $videoResults = mysqli_query($mySQL, $videoSQL); // The function that gets the database: connects then stores
  $video = mysqli_fetch_assoc($videoResults);  // Gets's the video array information of the selected video
} // End: for loop
