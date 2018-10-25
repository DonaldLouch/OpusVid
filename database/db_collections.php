<?php
/* db_collection_collections.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is to list all Opus Collections that are created by a user

  File used in:
    #dashboard/collections
*/

$profileID = $_SESSION['uName'];

$opusCollectionSQL = "SELECT * FROM collections WHERE opus_creator = '" . mysqli_escape_string($mySQL,$profileID) . "';";
$resultCollection = mysqli_query($mySQL, $opusCollectionSQL);

$opusCollections = array();
if (mysqli_num_rows($resultCollection) > 0) {
  while ($opusCollection = mysqli_fetch_assoc($resultCollection)) {
    $opusCollections[] = $opusCollection;
  }
}
