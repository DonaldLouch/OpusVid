<?php

if (isset($_POST['submit'])) {
  include 'db_connect.php';

  $target_file_thumb = $_FILES["thumbnailFile"]["name"];
  $fileThumbExtension = strtolower(pathinfo($target_file_thumb,PATHINFO_EXTENSION));

  $collectionID = nl2br($_POST['collectionID']);

  $collectionDate = nl2br(time());

  $collectionTitle = nl2br($_POST['collectionName']);

  $collectionSDescription = nl2br($_POST['sDescription']);
  $collectionDescription = nl2br($_POST['description']);
  $collectionCategory = nl2br($_POST['category']);
  $collectionTags = nl2br($_POST['tags']);

  $collectionVideoSelect     = "";
  $videoSelect = $_POST['videoSelect'];
  foreach ($videoSelect  as $value) {
      $collectionVideoSelect .= $value." / "; // concatenate your checked values
  }

  $collectionPrivacy = nl2br($_POST['privacy']);

  $updateSQL = "UPDATE collections SET created_on = '$collectionDate', collection_title = '$collectionTitle', short_description = '$collectionSDescription', description = '$collectionDescription', category = '$collectionCategory', tags = '$collectionTags', videos = '$collectionVideoSelect', privacy = '$collectionPrivacy' WHERE id= '$collectionID';";

  $results = mysqli_query($mySQL, $updateSQL);
  header("Location: ../dashboard/manage_collections?edited=success");
}
