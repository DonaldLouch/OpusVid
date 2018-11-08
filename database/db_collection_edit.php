<?php
/* db_collection_edit.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is to get the videos that are in a collection and display the information of the videos

  Blades Inlcluded:
    #db_connect: To connect to Database

  File used in:
    #dashboard/edit_collection?id=*

  Possible Duplicate:
      #db_collection_add.php
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

$videoNumber = sizeof($videosAlreadyAdded) - 2;

for ($x = 0; $x < $videoNumber; $x++){
  $vidID = $videosAlreadyAdded[$x];

  $videoSQL = "SELECT * FROM videos WHERE opus_creator = '$profileID' AND id = '$vidID'";
  $videoResults = mysqli_query($mySQL, $videoSQL);
  $video = mysqli_fetch_assoc($videoResults);
}
