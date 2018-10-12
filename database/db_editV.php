<?php

if (isset($_POST['submit'])) {
  include 'db_connect.php';

  $target_file_thumb = $_FILES["thumbnailFile"]["name"];
  $fileThumbExtension = strtolower(pathinfo($target_file_thumb,PATHINFO_EXTENSION));

  $uploadID = nl2br($_POST['vidID']);
  $uploadTitle = nl2br($_POST['vTitle']);
  $uploadSDescription = nl2br($_POST['sDescription']);
  $uploadDescription = nl2br($_POST['description']);
  $uploadCategory = nl2br($_POST['category']);
  $uploadTags = nl2br($_POST['tags']);
  $uploadMusicCredit = nl2br($_POST['musicCredit']);
  $uploadFilmedBy = nl2br($_POST['filmedBy']);
  $uploadFilmedWith = nl2br($_POST['filmedWith']);
  $uploadFilmedAt = nl2br($_POST['filmedAt']);
  $uploadFilmedOn = nl2br($_POST['filmedOn']);
  $uploadAudioBy = nl2br($_POST['audioBy']);
  $uploadAudioWith = nl2br($_POST['audioWith']);
  $uploadEditedBy = nl2br($_POST['editedBy']);
  $uploadEditedOn = nl2br($_POST['editedOn']);
  $uploadStaring = nl2br($_POST['staring']);
  $uploadPrivacy = nl2br($_POST['privacy']);

  $updateSQL = "UPDATE videos SET video_title = '$uploadTitle', short_description = '$uploadSDescription', description = '$uploadDescription', category = '$uploadCategory', tags = '$uploadTags', music_credit = '$uploadMusicCredit', filmed_date = '$uploadFilmedOn', filmed_at = '$uploadFilmedAt', filmed_on = '$uploadFilmedWith', filmed_by = '$uploadFilmedBy', audio_by = '$uploadAudioBy', audio_with = '$uploadAudioWith', edited_by = '$uploadEditedBy', edited_on = '$uploadEditedOn', staring = '$uploadStaring', privacy = '$uploadPrivacy' WHERE id= '$uploadID';";

  $results = mysqli_query($mySQL, $updateSQL);

  move_uploaded_file($_FILES["thumbnailFile"]["tmp_name"], "upload/thumbnails/" . $uploadID . "." . $fileThumbExtension);

  header("Location: ../dashboard/manage?edited=success");
}
