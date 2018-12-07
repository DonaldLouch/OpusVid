<?php
/* db_collection_update.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is to update the information of an Opus Collection

  Blades Included:
    #db_connect: To connect to Database

  File used in:
    #dashboard/edit_collection?id=*
*/

if (isset($_POST['submit'])) { //* Action once form is submitted #FormSubmitted */
  require 'db_connect.php'; //* Gets database connection */

  $updateTime = mysqli_real_escape_string($mySQL, time()); // Gets the current time stamp
  $collectionID = mysqli_real_escape_string($mySQL, $_POST['collectionID']); // Adds the unique ID to a secure string

  $collectionTitle = mysqli_real_escape_string($mySQL, nl2br($_POST['collectionName'])); // Gets the collection name that was entered in the submitted form
  $collectionSDescription = mysqli_real_escape_string($mySQL, nl2br($_POST['sDescription'])); // Gets the short description that was entered in the submitted form
  $collectionDescription = mysqli_real_escape_string($mySQL, nl2br($_POST['description'])); // Gets the description that was entered in the submitted form
  $collectionCategory = mysqli_real_escape_string($mySQL, $_POST['category']); // Gets the category that was selected in the submitted form
  $collectionTags = mysqli_real_escape_string($mySQL, nl2br($_POST['tags'])); // Gets the tags that was entered in the submitted form


  $collectionOC = mysqli_real_escape_string($mySQL, $_SESSION['uName']); // Gets the username of the user currently logged in
  $collectionDate = mysqli_real_escape_string($mySQL, time()); // Prints the current time stamp


  $collectionVideoSelect     = ""; // Initiates the video select section
  $videoSelect = $_POST['videoSelect']; // Gets all the selected images from the submitted form
  foreach ($videoSelect  as $value) {
      $collectionVideoSelect .= $value." / "; // For each selected video add them together and add a "/" in between all videos
  }

  $collectionPrivacy = mysqli_real_escape_string($mySQL, $_POST['privacy']); // Gets the privacy that was selected in the submitted form

  $updateSQL = "UPDATE collections SET last_updated= '$updateTime', collection_title = '$collectionTitle', short_description = '$collectionSDescription', description = '$collectionDescription', category = '$collectionCategory', tags = '$collectionTags', videos = '$collectionVideoSelect', privacy = '$collectionPrivacy' WHERE id= '$collectionID';";
  $results = mysqli_query($mySQL, $updateSQL); // The function that updates the database: connects then updates

  header("Location: ../dashboard/manage_collections?edited=success"); // Once done the user will be redirected to the collection manager page: Success Message!
} // End: FormSubmitted
