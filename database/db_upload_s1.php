<?php
/* db_upload_s1.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  This is step one of two for uploading videos! You upload the video and thumbnail while adding the new entry to the database!

  Blades Included:
    #db_connect: To connect to Database
    #db_templates/videoUpload: Get's the file information for video
    #db_templates/thumbnailUpload: Get's the file information for thumbnail
    #../do_spaces/spaces_config: Connects to DigitalOcean for upload prep
    #../do_spaces/spaces_vidUpload: Uploads new video
    #../do_spaces/spaces_thumbUpload: Uploads new thubnail

  File used in:
    #dashboard/upload
*/

$uniqeID = uniqid();

require 'db_connect.php';
include 'db_templates/videoFile.php';
include 'db_templates/thumbnailFile.php';
include '../do_spaces/spaces_config.php';
$error = 0;



if (!$videoTemp && $thumbTemp) { // if file not chosen
   echo "ERROR: Please browse for a file before clicking the upload button.";
   exit();
}
elseif(!$mySQL) { //If #EmptyFields = none then it will check the database connection
  die('<div class="errorMessage">
    <p>It seems that we had troubles connecting to the database. Please try again or contact the support team at <a href="mailto:support@opusvid.com">support@opusvid.com</a> and we will be more than happy to help!</p>
  </div>');
}

#Check: Video
elseif (in_array($videoExtention, $videoExtAllow) != $videoExtention) {
  $error = 1;
  echo '
  <div class="errorMessage">
    <p>Please only upload video files with the extention mp4 or m4v! Please try again!</p>
  </div>';
  exit();
} //extention check
elseif ($videoError != 0) {
  $error = 2;
  echo '
  <div class="errorMessage">
    <p>There seems to have been an error. Please try again or contact the support team at <a href="mailto:support@opusvid.com">support@opusvid.com</a> and we will be happy to help!</p>
  </div>';
  exit();
} //error check
elseif ($videoSize > 5e+9) {
  $error = 3;
  echo '
  <div class="errorMessage">
    <p>Sorry, your video file is to large. Please try to upload a file under 5GB! Please try again!</p>
  </div>';
  exit();
} //size check

#Check: thumbnail
elseif (in_array($thumbExtention, $thumbExtAllow) != $thumbExtention) {
  $error = 4;
  echo '
  <div class="errorMessage">
    <p>Please only upload image files with the extention jpg, jpeg, png, OR pdf! Please try again!</p>
  </div>';
  exit();
} //extention check
elseif ($thumbError != 0) {
  $error = 5;
  echo '
  <div class="errorMessage">
    <p>There seems to have been an error. Please try again or contact the support team at <a href="mailto:support@opusvid.com">support@opusvid.com</a> and we will be happy to help!</p>
  </div>';
  exit();
} //error check
elseif ($thumbSize > 5368709120) {
  $error = 6;
  echo '
  <div class="errorMessage">
    <p>Sorry, the your thumbnail file is to large. Please try to upload a file under 100MB! Please try again!</p>
  </div>';
  exit();
} //size check

#Upload
if($error == 0) {
  include '../do_spaces/spaces_vidUpload.php';
  include '../do_spaces/spaces_thumbUpload.php';

$sqlInsert = "INSERT INTO videos (id, video_path, privacy, thumbnail_path, views) VALUES ('$uniqeID', '$videoDestination', 'private', '$thumbDestination', 0)";
$results = mysqli_query($mySQL, $sqlInsert);

echo '
<div class="successMessage">
  <p>Video and thumbnail successfully uploaded!</p>
</div>
<p>
  <a href="../dashboard/upload_s2?id='.$uniqeID.'" class="button">Continue To Step 2: Video Information</a>
</p>';
} else {
  echo '
  <div class="errorMessage">
    <p>There seems to have been an error. Please try again or contact the support team at <a href="mailto:support@opusvid.com">support@opusvid.com</a> and we will be happy to help!</p>
  </div>';
  exit();
}
