<?php

include 'db_connect.php';

$profileID = $_SESSION['uName'];

$videoSQL = "SELECT * FROM videos WHERE opus_creator = '$profileID' ORDER BY order_number DESC";
$resultPlayer = mysqli_query($mySQL, $videoSQL);

$videos = array();
if (mysqli_num_rows($resultPlayer) > 0) {
  while ($video = mysqli_fetch_assoc($resultPlayer)) {
    $videos[] = $video;
  }
}
