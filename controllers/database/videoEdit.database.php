<?php
/* videoEdit.database.php | Version 1.0
  By: DevLexicon
  User Level Required: anyone | admin | mod

  The file is to edit a video and its information.

  File used in:
    #dashboard/edit?id=*
    #admin/edit_video?id=*
*/

error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../../models/config/config.php';
include_once '../../models/classes/MySQL.class.php';
include_once '../../models/classes/ReCAPTCHA.class.php';

if (isset($_POST['submit'])) { //Looks to see if the form has been submitted #FormSubmitted
  $uniqeID = $_POST['vidID']; //Gets the video id from the post
  //Gets information from the submitted form
  $uploadID = $uniqeID;
  $uploadOC = $_POST['by'];
  $uploadTitle = $_POST['vTitle'];
  $uploadSDescription = htmlspecialchars($_POST['sDescription']);
  $uploadDescription = $_POST['description'];
  $uploadCategory = $_POST['category'];
  $uploadTags = $_POST['tags'];
  $uploadChapters = $_POST['chapters'];
  $uploadMusicCredit = htmlspecialchars($_POST['musicCredit']);
  $uploadVideoCredit = $_POST['videoCredit'];
  $uploadStaring = htmlspecialchars($_POST['staring']);
  
  if ($_POST['linkType'] === "default") {
    $links = "DEFAULT";
  } else if ($_POST['linkType'] === "custom" || $_POST['linkType'] === "leaveAsIS") {
    $links = $_POST['links'];
  } else if ($_POST['linkType'] === "noLinks") {
    $links = "NONE";
  }
  
  $uploadPrivacy = $_POST['privacy'];
  $uploadComments = $_POST['comments'];

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
  $maxThumbSize = "5368709120";

  $thumbNewName = $uniqeID.".".$thumbExtention;

  $thumbPath = "https://".$spacesBucket.".".$spacesURIRegion.".".$spacesURL."/".$spacesRootFolder."/thumbnails/".$thumbNewName;

  $error =0; // Sets initial error number to 0 meaning no errors

  if (isset($_POST['g-recaptcha-response'])) {
    $reCAPTCHA = new ReCAPTCHA; #Creats a new ReCAPRCHA class
    
    $capSecretKey = $reCAPTCHA->captchaSecretKey();  #Gets the Captacha Secert Key
    $recaptchaResponse = $_POST['g-recaptcha-response']; #Gets the Captcha Respnse
    
    $recaptchaURL = 'https://www.google.com/recaptcha/api/siteverify'; #Base Captcha URI
    
    $recaptcha = file_get_contents($recaptchaURL . '?secret=' . $capSecretKey . '&response=' . $recaptchaResponse); #The URL that Google uses to check for human or robot
    $recaptcha = json_decode($recaptcha); #The Results

    if (!isset($recaptchaResponse)) { #If the Captcha response wasn't set
      $error = 1;
      header("Location: ../../../dashboard/edit?id=$uniqeID&type=captcha&error=$error");
      exit(); 
    }
    elseif ($recaptcha->score < 0.5) { #It looks like the request was made by a roboot
      $error = 2;
      header("Location: ../../../dashboard/edit?id=$uniqeID&type=captcha&error=$error");
      exit();
    }
  } #Captcha 

  if (empty($uploadTitle) || empty($uploadSDescription) || empty($uploadDescription) || empty($uploadCategory) || empty($uploadTags) || empty($uploadChapters) || empty($uploadMusicCredit) || empty($uploadPrivacy)){//Checks that all fields are entered: #EmptyFields
    $error = 3;
    header("Location: ../../../dashboard/edit?id=$uniqeID&type=empty&error=$error");
    exit();
  }
  
  if ($_POST['linkType'] === "custom" && empty($links) || $_POST['linkType'] === "leaveAsIS" && empty($links)) {//Checks to see if custom links are chosen that the custom link field is not empty.
    $error = 4;
    header("Location: ../../../dashboard/edit?id=$uniqeID&type=empty&error=$error");
    exit();
  } #EmptyFields
//header("Location: ../../../dashboard/edit?id=$uniqeID&type=captcha&error=$error");
  if ($_FILES['thumbnailFile']['error'] == 0) {
    if (in_array($thumbExtention, $thumbExtAllow) != $thumbExtention) {
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
        <p>Sorry, the your thumbnail file is to large. Please try to upload a file under 100MB! Please try again!</p>
      </div>';
      exit();
    } //size check

    if ($error == 0) {
      include '../../do_spaces/spaces_config.php';
      include '../../do_spaces/spaces_thumbnailUpload.php';
    }
  }
  
  if ($error == 0) {
    include_once '../../models/classes/Video.class.php';
    
    $videoClass = new Video();
    $videoClass->updateVideo($uploadID, $uploadTitle, $uploadOC, $uploadSDescription, $uploadDescription, $uploadCategory, $uploadTags, $uploadChapters, $uploadMusicCredit, $uploadVideoCredit, $uploadStaring, $links, $uploadPrivacy, $uploadComments);
    
    header("Location: ../../../player?id=$uploadID"); #Done! 
  }
}