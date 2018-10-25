<?php

session_start();

/*
//include '../do_spaces/spaces_config.php';
// include 'db_templates/videoFile.php';
// include 'db_templates/thumbnailFile.php';

//If #ConnectionCheck = no errors then we will check to see if the files are up to standards #FileUploads
  #Video
    } elseif (in_array($videoExtention, $videoExtAllow)) { //In Array
          if ($videoError === 0) { //Error Check
            if ($videoSize < 5e+9) { //File Size -> Upload
              include '../do_spaces/spaces_vidUpload.php';
            } else {
              header("Location: ../dashboard/upload?error=fBigVid".$urlContent);
            } //End else "File Size/Upload"
          } else {
            header("Location: ../dashboard/upload?error=failedVid".$urlContent);
          } //End else "Error Check"
        } else {
          header("Location: ../dashboard/upload?error=extVid".$urlContent);
      } //End else "In Array"

  #Thubnail
    if (in_array($thumbExtention, $thumbExtAllow)) { //In Array
      if ($thumbError === 0) { //Error Check
        if ($thumbSize < 5e+6) { //File Size -> Upload
          include '../do_spaces/spaces_thumbUpload.php';
        } else {
          header("Location: ../dashboard/upload?error=fBigThumb".$urlContent);
        } //End else "File Size/Upload"
      } else {
        header("Location: ../dashboard/upload?error=failedThumb".$urlContent);
      } //End else "Error Check"
    } else {
      header("Location: ../dashboard/upload?error=extThumb".$urlContent);
    } //End else "In Array"
#FileUploads
*/

if (isset($_POST['submit'])) {
  include 'db_connect.php';
  $vidID = $_POST['id'];
  include 'db_templates/uploadFields.php';

  if (empty($uploadTitle) || empty($uploadSDescription) || empty($uploadDescription) || empty($uploadCategory) || empty($uploadTags) || empty($uploadMusicCredit) || empty($uploadPrivacy)){//Checks that all fields are entered: #EmptyFields
    header("Location: ../dashboard/upload_s2?id=".$vidID."&error=empty".$urlContent);
  #EmptyFields

  //If #EmptyFields = none then it will check the database connection #ConnectionCheck
  } elseif(!$mySQL) { //If #EmptyFields = none then it will check the database connection
    die(header("Location: ../dashboard/upload_s2?id=".$vidID."error=database".$urlContent));
  } else {
  #ConnectionCheck

  $updateSQL = "UPDATE videos SET video_title = '$uploadTitle', opus_creator = '$uploadOC', uploaded_on = '$uploadDate', short_description = '$uploadSDescription', description = '$uploadDescription', category = '$uploadCategory', tags = '$uploadTags', music_credit = '$uploadMusicCredit', filmed_date = '$uploadFilmedOn', filmed_at = '$uploadFilmedAt', filmed_on = '$uploadFilmedWith', filmed_by = '$uploadFilmedBy', audio_by = '$uploadAudioBy', audio_with = '$uploadAudioWith', edited_by = '$uploadEditedBy', edited_on = '$uploadEditedOn', staring = '$uploadStaring', privacy = '$uploadPrivacy' WHERE id= '$vidID';";
  $results = mysqli_query($mySQL, $updateSQL);

    #DatabaseInsert //Once a video is uploaded the user will recieve this email #UploadEmail
      require 'emails/email_videoUpload.php';
    #UploadEmail

    //header("Location: ../dashboard/upload?upID=".$uniqeID.$urlContent);
    header("Location: ../player?id=$vidID");
  }
}
