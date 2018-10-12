<?php

$profileID = $_SESSION['uName'];

$opusCollectionSQL = "SELECT * FROM collections WHERE opus_creator = '" . mysqli_escape_string($mySQL,$profileID) . "';";
$resultCollection = mysqli_query($mySQL, $opusCollectionSQL);

$opusCollections = array();
if (mysqli_num_rows($resultCollection) > 0) {
  while ($opusCollection = mysqli_fetch_assoc($resultCollection)) {
    $opusCollections[] = $opusCollection;
  }
}
