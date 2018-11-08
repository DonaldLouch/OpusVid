<?php
/* db_upload_s2.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  This is step two of two for uploading videos! This is where you finish your video upload!

  Blades Inlcluded:
    #db_connect: To connect to Database
    #db_templates/uploadFields: Get's the file information from the upload forms

  File used in:
    #dashboard/upload_s2?id=*
*/

session_start();

if (isset($_POST['submit'])) {
  require 'db_connect.php';
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

    header("Location: ../player?id=$vidID");
  }
}
