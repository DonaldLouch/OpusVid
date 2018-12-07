<?php
/* db_collection_new.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is to create a new Opus Collection!

  Blades Included:
    #db_connect: To connect to Database

  File used in:
    #dashboard/new_collection
*/

session_start(); // Starts user session

if (isset($_POST['submit'])) { // Action once form is submitted #FormSubmitted
  require 'db_connect.php'; // Gets database connection

  $uniqeID = uniqid(); // Creates a uniqe ID
  $collectionID = mysqli_real_escape_string($mySQL, $uniqeID); // Adds the unique ID to a secure string

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

  if (empty($collectionTitle) || empty($collectionSDescription) || empty($collectionDescription) || empty($collectionCategory) || empty($collectionTags) || empty($collectionVideoSelect) || empty($collectionPrivacy)){ // Checks if the fields are empty #Empty
    echo 'All Fields are Required!'; // If the fields are empty it will echo that message
  } // End: Empty
  elseif(!$mySQL) { // Checks to see if there's a connection to the database #DatabaseError
    die("Connection failed: " . mysqli_connect_error()); // If the database connection failed it will echo that message
  } // End: DatabaseError
  else { // If all is good then it will create the collection #Insert
    $sqlInsert = "INSERT INTO collections (id, opus_creator, created_on, collection_title, short_description, description, category, tags, videos, privacy) VALUES ('$collectionID', '$collectionOC', '$collectionDate', '$collectionTitle', '$collectionSDescription', '$collectionDescription', '$collectionCategory', '$collectionTags',
    '$collectionVideoSelect', '$collectionPrivacy')";
    $results = mysqli_query($mySQL, $sqlInsert); // Creates the new collection

    header("Location: ../collection?id=$uniqeID"); // If created then it will redirect the user to the newly created collection
  } // End: Insert
} // End: FormSubmitted
