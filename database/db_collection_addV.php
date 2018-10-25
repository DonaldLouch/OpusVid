<?php
/* db_collection_addV.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is to
    1) get the video IDs from the videos that user selected; to be added to an Opus Collection.
    2) gets the string of previous vidoes that in a collection and then adds the newly selected IDs to the new collection
     Shows all video created by an Opus Creator (excluding ones already in a collection); then looks at the video ID's and placees the videos in a format that can be selected and display information from the video.

  Blades Inlcluded:
    #db_connect: To connect to Database

  File used in:
    #dashboard/add_collection
*/

session_start();

if (isset($_POST['submit'])) {
  require 'db_connect.php';

  $collectionID = mysqli_real_escape_string($mySQL,$_POST['collectionID']);
  $currentSelect = mysqli_real_escape_string($mySQL,$_POST['currentSelect']);
  $updateTime = mysqli_real_escape_string($mySQL, time());

  $collectionVideoSelect     = "";
  $videoSelect = $_POST['videoSelect'];
  foreach ($videoSelect  as $value) {
      $collectionVideoSelect .= $value." / ";
  }

  $videos = "". $currentSelect. "". $collectionVideoSelect;

  $sqlUpdate = "UPDATE collections SET videos = '$videos', last_updated= '$updateTime' WHERE id= '$collectionID';";
  $results = mysqli_query($mySQL, $sqlUpdate);

  header("Location: ../dashboard/add_collection?id=$collectionID");
   }
