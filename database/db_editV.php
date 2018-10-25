<?php

if (isset($_POST['submit'])) {
  include 'db_connect.php';

  $uniqeID = mysqli_real_escape_string($mySQL, $_POST['vidID']);

  include 'db_templates/thumbnailFile.php';
  include '../do_spaces/spaces_config.php';


  $uploadTitle = mysqli_real_escape_string($mySQL, $_POST['vTitle']);
  $opusCreator = mysqli_real_escape_string($mySQL, $_POST['by']);
  $uploadSDescription = mysqli_real_escape_string($mySQL, nl2br($_POST['sDescription']));
  $uploadDescription = mysqli_real_escape_string($mySQL, nl2br($_POST['description']));
  $uploadCategory = mysqli_real_escape_string($mySQL, $_POST['category']);
  $uploadTags = mysqli_real_escape_string($mySQL, nl2br($_POST['tags']));
  $uploadMusicCredit = mysqli_real_escape_string($mySQL, nl2br($_POST['musicCredit']));
  $uploadFilmedBy = mysqli_real_escape_string($mySQL, $_POST['filmedBy']);
  $uploadFilmedWith = mysqli_real_escape_string($mySQL, $_POST['filmedWith']);
  $uploadFilmedAt = mysqli_real_escape_string($mySQL, $_POST['filmedAt']);
  $uploadFilmedOn = mysqli_real_escape_string($mySQL, $_POST['filmedOn']);
  $uploadAudioBy = mysqli_real_escape_string($mySQL, $_POST['audioBy']);
  $uploadAudioWith = mysqli_real_escape_string($mySQL, $_POST['audioWith']);
  $uploadEditedBy = mysqli_real_escape_string($mySQL, $_POST['editedBy']);
  $uploadEditedOn = mysqli_real_escape_string($mySQL, $_POST['editedOn']);
  $uploadStaring = mysqli_real_escape_string($mySQL, nl2br($_POST['staring']));
  $uploadPrivacy = mysqli_real_escape_string($mySQL, $_POST['privacy']);

  $error =0;

  $updateSQL = "UPDATE videos SET video_title = '$uploadTitle', opus_creator = '$opusCreator', short_description = '$uploadSDescription', description = '$uploadDescription', category = '$uploadCategory', tags = '$uploadTags', music_credit = '$uploadMusicCredit', filmed_date = '$uploadFilmedOn', filmed_at = '$uploadFilmedAt', filmed_on = '$uploadFilmedWith', filmed_by = '$uploadFilmedBy', audio_by = '$uploadAudioBy', audio_with = '$uploadAudioWith', edited_by = '$uploadEditedBy', edited_on = '$uploadEditedOn', staring = '$uploadStaring', privacy = '$uploadPrivacy' WHERE id= '$uniqeID';";

  $results = mysqli_query($mySQL, $updateSQL);

  if (!$thumbTemp) {
    header("Location: ../dashboard/manage?edited=success");
    exit();
  } elseif (in_array($thumbExtention, $thumbExtAllow) != $thumbExtention) {
      $error = 1;
      echo '
      <div class="errorMessage">
        <p>Please only upload image files with the extention jpg, jpeg, png, OR pdf! Please try again!</p>
      </div>';
      exit();
    } //extention check
    elseif ($thumbError != 0) {
      $error = 2;
      echo '
      <div class="errorMessage">
        <p>There seems to have been an error. Please try again or contact the support team at <a href="mailto:support@opusvid.com">support@opusvid.com</a> and we will be happy to help!</p>
      </div>';
      exit();
    } //error check
    elseif ($thumbSize > 5368709120) {
      $error = 3;
      echo '
      <div class="errorMessage">
        <p>Sorry, the your thumbnail file is to large. Please try to upload a file under 100MB! Please try again!</p>
      </div>';
      exit();
    } //size check
  }
  if($error == 0) {
    include '../do_spaces/spaces_thumbUpload.php';
  }

  header("Location: ../dashboard/manage?edited=success");
