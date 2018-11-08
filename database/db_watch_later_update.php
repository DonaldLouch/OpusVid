<?php
/* db_watch_later_update.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  This file is used to to get all the videos on OpusVid and allow users to add them or remove them from their watch later list

  Blades Inlcluded:
    #db_connect: To connect to Database

  File used in:
    #home -> index
    #dashbaord/watch
*/

session_start();

if (isset($_POST['submit'])) {
  require 'db_connect.php';

  $profileID = mysqli_real_escape_string($mySQL,$_POST['username']);
  $updateTime = mysqli_real_escape_string($mySQL, time());
  $privacy = mysqli_real_escape_string($mySQL,$_POST['privacy']);

  if (!empty($_POST['videoSelect'])) {
    $wLaterVideoSelect     = "";
    $videoSelect = $_POST['videoSelect'];
    foreach ($videoSelect  as $value) {
        $wLaterVideoSelect .= $value." / ";
    }

    $currentSelect     = "";
    $cVideoSelect = $_POST['currentSelect'];
    foreach ($cVideoSelect  as $currentValue) {
        $currentSelect .= $currentValue." / ";
    }

    $videos = "". $currentSelect. "". $wLaterVideoSelect;

    $sqlUpdate = "UPDATE watch_later SET videos = '$videos', privacy = '$privacy' WHERE user= '$profileID'";
    $results = mysqli_query($mySQL, $sqlUpdate);

    header("Location: ../dashboard/watch?edit=success");
  } else {
    $currentSelect     = "";
    $cVideoSelect = $_POST['currentSelect'];
    foreach ($cVideoSelect  as $currentValue) {
        $currentSelect .= $currentValue." / ";
    }

    $sqlUpdate = "UPDATE watch_later SET videos = '$currentSelect', privacy = '$privacy' WHERE user= '$profileID'";
    $results = mysqli_query($mySQL, $sqlUpdate);

    header("Location: ../dashboard/watch?edit=success");
  }
} elseif (isset($_POST['add'])) {
  require 'db_connect.php';

  $profileID = mysqli_real_escape_string($mySQL,$_POST['username']);

  $wLaterVideoSelect     = "";
  $videoSelect = $_POST['videoSelect'];
  foreach ($videoSelect  as $value) {
      $wLaterVideoSelect .= $value." / ";
  }

  $currentSelect = $_POST['currentSelect'];

  $videos = "". $currentSelect. "". $wLaterVideoSelect;

  $sqlUpdate = "UPDATE watch_later SET videos = '$videos' WHERE user= '$profileID'";
  $results = mysqli_query($mySQL, $sqlUpdate);

  header("Location: ../home?add=success");
}
