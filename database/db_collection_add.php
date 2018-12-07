<?php
/* db_collection_add.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is to show
    1) all the videos that are in an Opus Collection then takes all the video IDs from the collection and then excludes them from step 2.
    2) Shows all video created by an Opus Creator (excluding ones already in a collection); then looks at the video ID's and places the videos in a format that can be selected and display information from the video.
    3) Then adds the new timestamp to SQL

  Blades Included:
    #db_connect: To connect to Database

  File used in:
    #dashboard/add_collection
*/

session_start();

require 'db_connect.php'; // Gets database connection

$profileID = $_SESSION['uName']; // Gets the username of the logged in user
$collectionID = $_GET['id']; // Gets's the ID of the collection

$sql = "SELECT * FROM collections WHERE id = '" . mysqli_escape_string($mySQL, $collectionID) . "';";
$result = mysqli_query($mySQL, $sql); // The function that gets the database: connects then stores

$selectSQL = "SELECT videos FROM collections WHERE id = '" . mysqli_escape_string($mySQL, $collectionID) . "';";
$selectResult = mysqli_query($mySQL, $selectSQL); // The function that gets the database: connects then stores
$selectRow = mysqli_fetch_assoc($selectResult); // Gets's the video array information of the selected collection
$selectCount = mysqli_num_rows($selectResult); // Get's the number of collections in the table
$videosAlreadyAdded = explode(' / ', $selectRow['videos'], -1); // Get's the videos array within the selected collection and then sperates each video id into seprate arrays
$videoImplode = implode("' AND id !='",$videosAlreadyAdded); // Adds "AND id != VIDEO ID" for each video id

$videoSQL = "SELECT * FROM videos WHERE opus_creator = '$profileID' AND id != '$videoImplode'";
$videoResults = mysqli_query($mySQL, $videoSQL); // The function that gets the database: connects then stores

$videos = array(); // Initiates the video array
if (mysqli_num_rows($videoResults) > 0) { // If the connection has MORE than 0 video
  while ($video = mysqli_fetch_assoc($videoResults)) { // Gets the arrays of the database connection
    $videos[] = $video; // Separates each player array
  } // End: while statement
} // End: if statement
