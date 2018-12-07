<?php
/* db_collection_addV.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is to
    1) get the video IDs from the videos that user selected; to be added to an Opus Collection.
    2) gets the string of previous videos that in a collection and then adds the newly selected IDs to the new collection
     Shows all video created by an Opus Creator (excluding ones already in a collection); then looks at the video ID's and places the videos in a format that can be selected and display information from the video.

  Blades Included:
    #db_connect: To connect to Database

  File used in:
    #dashboard/add_collection
*/

session_start(); // Starts user session

if (isset($_POST['submit'])) { // Action once form is submitted #FormSubmitted
  require 'db_connect.php'; // Gets database connection

  $collectionID = mysqli_real_escape_string($mySQL,$_POST['collectionID']); // Gets the collection ID from the submitted form
  $currentSelect = mysqli_real_escape_string($mySQL,$_POST['currentSelect']); // Gets the currently video in the collection
  $updateTime = mysqli_real_escape_string($mySQL, time()); // Prints the current time code

  $collectionVideoSelect     = ""; // Initiates the video select section
  $videoSelect = $_POST['videoSelect']; // Gets all the selected images from the submitted form
  foreach ($videoSelect  as $value) {
      $collectionVideoSelect .= $value." / "; // For each selected video add them together and add a "/" in between all videos
  }

  $videos = "". $currentSelect. "". $collectionVideoSelect; // Combines the current videos in the collection and the videos that are selected

  $sqlUpdate = "UPDATE collections SET videos = '$videos', last_updated= '$updateTime' WHERE id= '$collectionID';";
  $results = mysqli_query($mySQL, $sqlUpdate); // The function that updates the database: connects then updates

  header("Location: ../dashboard/add_collection?id=$collectionID"); // Once done the user will be redirected to the adding videos to collection page
} // End: FormSubmitted
