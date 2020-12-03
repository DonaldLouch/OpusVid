<?php
/* videoUpload-S1.database.php | Version 1.0
  By: DevLexicon
  User Level Required: anyone

  This is step one of two for uploading videos! You upload the video and thumbnail while adding the new entry to the database!

  File used in:
    #dashboard/upload
*/

error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../../models/config/config.php';
include_once '../../models/classes/MySQL.class.php';
include_once '../../models/classes/Video.class.php';
include_once '../../models/classes/ReCAPTCHA.class.php';

$error = 0;

if (isset($_POST['g-recaptcha-response'])) {
  $reCAPTCHA = new ReCAPTCHA;
  
  $capSecretKey = $reCAPTCHA->captchaSecretKey();
  $recaptchaResponse = $_POST['g-recaptcha-response'];
  
  $recaptchaURL = 'https://www.google.com/recaptcha/api/siteverify';
  
  $recaptcha = file_get_contents($recaptchaURL . '?secret=' . $capSecretKey . '&response=' . $recaptchaResponse);
  $recaptcha = json_decode($recaptcha);
  
  if (!isset($recaptchaResponse)) {
    $error = 1;
    header("Location: ../../../dashboard/upload?type=captcha&error=$error&username=$username");
    exit(); 
  }
  elseif ($recaptcha->score < 0.5) {
    $error = 2;
    header("Location: ../../../dashboard/upload?type=captcha&error=$error&username=$username");
    exit();
  }
}

$uniqeID = uniqid();

$uploadID = $uniqeID;
$uploadOC = $_SESSION['userName'];
$uploadDate = time();
$uploadPrivacy = "private";
$views = 0;

  $video = $_FILES['videoFile'];

  $videoName = $_FILES['videoFile']['name']; //Takes the file name
  $videoTemp = $_FILES['videoFile']['tmp_name']; //Takes the temp name of the file
  $videoSize = $_FILES['videoFile']['size']; //Takes the file size
  $videoError = $_FILES['videoFile']['error']; //Takes the file error status
  $videoType = $_FILES['videoFile']['type']; //Takes the file types

  $videoExplode = explode('.', $videoName); //Explodes the file name (name . extention)
  $videoExtention = strtolower(end($videoExplode)); //Changes the file extention into a lowercase name

  $videoTypeExplode = explode ("/", $videoType); // [0] is media type | [1] is file type

  $videoExtAllow = array('mp4'); //Allow the following extentions m4v, webm, 
  $maxVideoSize = "1e+6"; //Number in KB

  $videoNewName = $uniqeID.".".$videoExtention;

  $videoPath = "https://".$spacesBucket.".".$spacesURIRegion.".".$spacesURL."/".$spacesRootFolder."/videos/".$videoNewName;

  $thumb = $_FILES['thumbnailFile'];

  $thumbName = $_FILES['thumbnailFile']['name']; //Takes the file name
  $thumbTemp = $_FILES['thumbnailFile']['tmp_name']; //Takes the temp name of the file
  $thumbSize = $_FILES['thumbnailFile']['size']; //Takes the file size
  $thumbError = $_FILES['thumbnailFile']['error']; //Takes the file error status
  $thumbType = $_FILES['thumbnailFile']['type']; //Takes the file types

  $thumbExplode = explode('.', $thumbName); //Explodes the file name (name . extention)
  $thumbExtention = strtolower(end($thumbExplode)); //Changes the file extention into a lowercase name
  $thumbTypeExplode = explode ("/", $thumbType); // [0] is media type | [1] is file type
  $thumbExtAllow = array('jpg', 'jpeg', 'png'); //Allow the following extentions
  $maxThumbSize = "500000"; //Number in KB

  $thumbNewName = $uniqeID.".".$thumbExtention;

  $thumbPath = "https://".$spacesBucket.".".$spacesURIRegion.".".$spacesURL."/".$spacesRootFolder."/thumbnails/".$thumbNewName;
  
if (!$videoTemp && $thumbTemp) { // if file not chosen
   echo "ERROR: Please browse for a file before clicking the upload button.";
   exit();
}
#Check: Video
elseif (in_array($videoExtention, $videoExtAllow) != $videoExtention) {
  $error = 3;
  echo '
  <div class="errorMessage">
    <p>Please only upload video files with the extention mp4. Please try again!</p>
  </div>';
  exit();
} //extention check
elseif ($videoError != 0) {
  $error = 4;
  echo '
  <div class="errorMessage">
    <p>There seems to have been an error. Please try again or contact the support team at <a href="mailto:support@';$siteURL;echo'">support@';$siteURL;echo'</a> and we will be happy to help!</p>
  </div>';
  exit();
} //error check
elseif ($videoSize > $maxVideoSize) {
  $error = 5;
  echo '
  <div class="errorMessage">
    <p>Sorry, your video file is to large. Please try to upload a file under 1GB! Please try again!</p>
  </div>';
  exit();
} //size check

#Check: thumbnail
elseif (in_array($thumbExtention, $thumbExtAllow) != $thumbExtention) {
  $error = 6;
  echo '
  <div class="errorMessage">
    <p>Please only upload image files with the extention jpg, jpeg, png, OR pdf! Please try again!</p>
  </div>';
  exit();
} //extention check
elseif ($thumbError != 0) {
  $error = 7;
  echo '
  <div class="errorMessage">
    <p>There seems to have been an error. Please try again or contact the support team at <a href="mailto:support@';$siteURL;echo'">support@';$siteURL;echo'</a> and we will be happy to help!</p>
  </div>';
  exit();
} //error check
elseif ($thumbSize > $maxThumbSize) {
  $error = 8;
  echo '
  <div class="errorMessage">
    <p>Sorry, the your thumbnail file is to large. Please try to upload a file under 500MB! Please try again!</p>
  </div>';
  exit();
} //size check

if ($error === 0) {
  include '../../do_spaces/spaces_config.php';
  include '../../do_spaces/spaces_videoUpload.php';
  include '../../do_spaces/spaces_thumbnailUpload.php';

  $videoClass = new Video();
  $uploadStep1 = $videoClass->videoUpload($uploadID, $videoPath, $uploadOC, $uploadDate, $uploadPrivacy, $thumbPath, $views); 

  echo '
  <div class="successMessage">
    <p>Video and thumbnail successfully uploaded!</p>
  </div>
  <p>
    <a href="../dashboard/upload_s2?id='.$uniqeID.'" class="button">Continue To Step 2: Video Information</a>
  </p>';
}