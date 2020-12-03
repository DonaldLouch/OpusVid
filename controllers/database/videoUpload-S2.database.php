<?php
/* videoUpload-S2.php | Version 1.0
  By: DevLexicon
  User Level Required: anyone

  This is step two of two for uploading videos! This is where you finish your video upload!

  File used in:
    #dashboard/upload_s2?id=*
*/

error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../../models/config/config.php';
include_once '../../models/classes/MySQL.class.php';
include_once '../../models/classes/ReCAPTCHA.class.php';

if (isset($_POST['submit'])) {
  $error = 0;
  $vidID = $_POST['id'];
  
  $uploadID = $vidID;
  $uploadTitle = $_POST['vTitle'];
  $uploadOC = $_SESSION['userName'];
  $uploadDate = time();
  $uploadSDescription = $_POST['sDescription'];
  $uploadDescription = htmlspecialchars($_POST['description']);
  $uploadCategory = $_POST['category'];
  $uploadTags = $_POST['tags'];
  $uploadChapters= $_POST['chapters'];
  $uploadMusicCredit = htmlspecialchars($_POST['musicCredit']);
  $uploadVideoCredit = $_POST['videoCredit'];
  $uploadStaring = $_POST['staring'];
  
  if ($_POST['linkType'] === "default") {
    $links = "DEFAULT";
  } else if ($_POST['linkType'] === "custom") {
    $links = $_POST['links'];
  } else if ($_POST['linkType'] === "noLinks") {
    $links = "NONE";
  }
  
  $uploadPrivacy = $_POST['privacy'];
  $uploadComments = $_POST['comments'];
  
  $email = $_SESSION['uEmail'];
  
  $urlContent = "title=".$uploadTitle."&sd=".$uploadSDescription."&d=".$uploadDescription."&tags=".$uploadTags."&chapters=".$uploadChapters."&mCredit=".$uploadMusicCredit."&vCredits=".$uploadVideoCredit."&links=".$links;

  if (isset($_POST['g-recaptcha-response'])) {
    $reCAPTCHA = new ReCAPTCHA; #Creats a new ReCAPRCHA class
    
    $capSecretKey = $reCAPTCHA->captchaSecretKey();  #Gets the Captacha Secert Key
    $recaptchaResponse = $_POST['g-recaptcha-response']; #Gets the Captcha Respnse
    
    $recaptchaURL = 'https://www.google.com/recaptcha/api/siteverify'; #Base Captcha URI
    
    $recaptcha = file_get_contents($recaptchaURL . '?secret=' . $capSecretKey . '&response=' . $recaptchaResponse); #The URL that Google uses to check for human or robot
    $recaptcha = json_decode($recaptcha); #The Results
    
    if (!isset($recaptchaResponse)) { #If the Captcha response wasn't set
      $error = 1;
      header("Location: ../../../dashboard/upload_s2?id=$vidID&type=captcha&error=$error&$urlContent");
      //exit(); 
    }
    elseif ($recaptcha->score < 0.5) { #It looks like the request was made by a roboot
      $error = 2;
      header("Location: ../../../dashboard/upload_s2?id=$vidID&type=captcha&error=$error&$urlContent");
      //exit();
    }
  } #Captcha 
  
  if (empty($uploadTitle) || empty($uploadSDescription) || empty($uploadDescription) || empty($uploadCategory) || empty($uploadTags) || empty($uploadChapters) || empty($uploadMusicCredit) || empty($uploadPrivacy)){//Checks that all fields are entered: #EmptyFields
    $error = 3;
    header("Location: ../../../dashboard/upload_s2?id=$vidID&type=empty&error=$error&$urlContent");
    exit();
  }
  
  if ($_POST['linkType'] === "custom" && empty($links)) {//Checks to see if custom links are chosen that the custom link field is not empty.
    $error = 4;
    header("Location: ../../../dashboard/upload_s2?id=$vidID&type=empty&error=$error&$urlContent");
    exit();
  } #EmptyFields
  
  if ($error === 0) {
    include_once '../../models/classes/Video.class.php';
    $videoClass = new Video();
    $uploadStep2 = $videoClass->videoUploadS2($uploadID, $uploadTitle, $uploadOC, $uploadDate, $uploadSDescription, $uploadDescription, $uploadCategory, $uploadTags, $uploadChapters, $uploadMusicCredit, $uploadVideoCredit, $uploadStaring, $links, $uploadPrivacy, $uploadComments);
    
    if ($uploadStep2 === "false") {
      $error = 5;
      header("Location: ../../../dashboard/upload_s2?id=$vidID&type=database&error=$error&$urlContent");
      exit();
    } 
    else if ($uploadStep2 === "true") {
      #UploadEmail
      require '../email/videoUpload.email.php';
      if (!mail($email, $subject, $message, implode("\n", $headers))) {
        $error = 6;
        header("Location: ../../../dashboard/upload_s2?id=$vidID&type=sendEmail&error=$error&$urlContent");
        exit();
      } #UploadEmail
      header("Location: ../../../player?id=$vidID"); #Done! 
    }
  } #If submitted
}