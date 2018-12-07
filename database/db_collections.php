<?php
/* db_collection_collections.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is to list all Opus Collections that are created by a user

  File used in:
    #dashboard/collections
*/

$profileID = $_SESSION['uName']; // Gets the username of the current logged in user

$opusCollectionSQL = "SELECT * FROM collections WHERE opus_creator = '" . mysqli_escape_string($mySQL,$profileID) . "';";
$resultCollection = mysqli_query($mySQL, $opusCollectionSQL); // The function that gets the database: connects then stores

$opusCollections = array(); // Initiates the collection array
if (mysqli_num_rows($resultCollection) > 0) { // If the connection has MORE than 0 collection
  while ($opusCollection = mysqli_fetch_assoc($resultCollection)) { // Gets the arrays of the database connection
    $opusCollections[] = $opusCollection;  // Separates each collection array
  } // End: while statement
} // End: if statement
