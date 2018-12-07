<?php
/* db_watch_later.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  This file is used to to get all the videos on OpusVid and allow users to see the information from them.

  Blades Included:
    #db_connect: To connect to Database
    #pagination_init: Initiate the pagination
    #pagination_control: Controls the control of the pagination

  File used in:
    #dashbaord/watch
*/

session_start();

require 'db_connect.php';

$profileID = $_SESSION['uName'];

$sql = "SELECT * FROM watch_later WHERE user = '" . mysqli_escape_string($mySQL, $profileID) . "';";
$result = mysqli_query($mySQL, $sql);

$selectSQL = "SELECT videos FROM watch_later WHERE user = '" . mysqli_escape_string($mySQL, $profileID) . "';";
$selectResult = mysqli_query($mySQL, $selectSQL);
$selectRow = mysqli_fetch_assoc($selectResult);
$selectCount = mysqli_num_rows($selectResult);
$videosAlreadyAdded = explode(' / ', $selectRow['videos'], -1);
$videoImplode = implode("' AND id !='",$videosAlreadyAdded);
$videoNumber = sizeof($videosAlreadyAdded) -1;

$sqlWL = "SELECT * FROM watch_later WHERE user = '" . mysqli_escape_string($mySQL, $profileID) . "';";
$resultsWL = mysqli_query($mySQL, $sqlWL);
$watchLater = mysqli_fetch_assoc($resultsWL);

//Find out how many items are in the videos table
$countSQL = "SELECT COUNT(order_number) FROM videos WHERE privacy='public'";
$query = mysqli_query($mySQL, $countSQL);
$row = mysqli_fetch_row($query);
$rows = $row[0];

//Number of items to display per page
$per_page = 6;

include '../../page-templates/pagination_init.php';

$videoSQL = "SELECT * FROM videos WHERE id != '$videoImplode' AND privacy = 'public' ORDER BY order_number DESC $limit";
$videoResults = mysqli_query($mySQL, $videoSQL);

include '../../page-templates/pagination_control.php';

//Loops all video information
$videos = array();
if (mysqli_num_rows($videoResults) > 0) {
  while ($video = mysqli_fetch_assoc($videoResults)) {
    $videos[] = $video;
  }
}
