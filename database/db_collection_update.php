<?php
/* db_collection_update.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is to update the information of an Opus Collection

  Blades Inlcluded:
    #db_connect: To connect to Database

  File used in:
    #dashboard/edit_collection?id=*
*/

if (isset($_POST['submit'])) {
  require 'db_connect.php';

  $target_file_thumb = $_FILES["thumbnailFile"]["name"];
  $fileThumbExtension = strtolower(pathinfo($target_file_thumb,PATHINFO_EXTENSION));

  $updateTime = mysqli_real_escape_string($mySQL, time());
  $collectionID = mysqli_real_escape_string($mySQL, $_POST['collectionID']);
  $collectionTitle = mysqli_real_escape_string($mySQL, nl2br($_POST['collectionName']));
  $collectionSDescription = mysqli_real_escape_string($mySQL, nl2br($_POST['sDescription']));
  $collectionDescription = mysqli_real_escape_string($mySQL, nl2br($_POST['description']));
  $collectionCategory = mysqli_real_escape_string($mySQL, $_POST['category']);
  $collectionTags = mysqli_real_escape_string($mySQL, nl2br($_POST['tags']));

  $collectionVideoSelect     = "";
  $videoSelect = $_POST['videoSelect'];
  foreach ($videoSelect  as $value) {
      $collectionVideoSelect .= $value." / "; // concatenate your checked values
  }

  $collectionPrivacy = mysqli_real_escape_string($mySQL, $_POST['privacy']);

  $updateSQL = "UPDATE collections SET last_updated= '$updateTime', collection_title = '$collectionTitle', short_description = '$collectionSDescription', description = '$collectionDescription', category = '$collectionCategory', tags = '$collectionTags', videos = '$collectionVideoSelect', privacy = '$collectionPrivacy' WHERE id= '$collectionID';";
  $results = mysqli_query($mySQL, $updateSQL);

  header("Location: ../dashboard/manage_collections?edited=success");
}
