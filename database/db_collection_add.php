<?php
/* db_collection_add.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is to show
    1) all the videos that are in an Opus Collection then takes all the video IDs from the collection and then excludes them from step 2.
    2) Shows all video created by an Opus Creator (excluding ones already in a collection); then looks at the video ID's and places the videos in a format that can be selected and display information from the video.
    3) Then adds the new timestamp to SQL

  Blades Inlcluded:
    #db_connect: To connect to Database

  File used in:
    #dashboard/add_collection
*/

session_start();

require 'db_connect.php';

$profileID = $_SESSION['uName'];
$collectionID = $_GET['id'];

$sql = "SELECT * FROM collections WHERE id = '" . mysqli_escape_string($mySQL, $collectionID) . "';";
$result = mysqli_query($mySQL, $sql);

$selectSQL = "SELECT videos FROM collections WHERE id = '" . mysqli_escape_string($mySQL, $collectionID) . "';";
$selectResult = mysqli_query($mySQL, $selectSQL);
$selectRow = mysqli_fetch_assoc($selectResult);
$selectCount = mysqli_num_rows($selectResult);
$videosAlreadyAdded = explode(' / ', $selectRow['videos'], -1);
$videoImplode = implode("' AND id !='",$videosAlreadyAdded);

$videoSQL = "SELECT * FROM videos WHERE opus_creator = '$profileID' AND id != '$videoImplode'";
$videoResults = mysqli_query($mySQL, $videoSQL);

$videos = array();
if (mysqli_num_rows($videoResults) > 0) {
  while ($video = mysqli_fetch_assoc($videoResults)) {
    $videos[] = $video;
  }
}
