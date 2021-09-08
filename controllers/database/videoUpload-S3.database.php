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
  
  $chapterArrayBase = array();
    if (isset($_POST['isThereChapters'])) { 
      $uploadChapters = "NONE";
    } else {
    for ($i = 0; $i < count($_POST['chapterTimeCode']); $i++) { 
      $chapterTimeCode = $_POST['chapterTimeCode'][$i];

      $chapterTimeExplode = explode(":",$chapterTimeCode);

      if (count($chapterTimeExplode) == 3 && $chapterTimeExplode[0] != "0") {
        $chapterHours = $chapterTimeExplode[0]*3600;
        if ($chapterTimeExplode[1] == 0) {
          $chapterMinutes = 0;
        } else {
          $chapterMinutes = $chapterTimeExplode[1]*60;
        }
        $chapterSeconds = $chapterTimeExplode[2];
        $chapterTimeCodeCoded = $chapterHours+$chapterMinutes+$chapterSeconds;
      } 
      else if (count($chapterTimeExplode) == 2 && $chapterTimeExplode[0] != "0") {
        $chapterMinutes = $chapterTimeExplode[0]*60;
        $chapterSeconds = $chapterTimeExplode[1];
        $chapterTimeCodeCoded = $chapterMinutes+$chapterSeconds;
      } else if (count($chapterTimeExplode) == 1 || count($chapterTimeExplode) == 2 && $chapterTimeExplode[0] == 0 ) {
        $chapterSeconds = $chapterTimeExplode[1];
        $chapterTimeCodeCoded = $chapterSeconds;
      }
      $chapterTitle = $_POST['chapterTitle'][$i];
      $currentChapterImplode = $chapterTimeCodeCoded . ";;" . $chapterTitle;

      array_push($chapterArrayBase, $currentChapterImplode);
    }
    $chapterArraySorted = array();
    if (!empty($chapterArrayBase)) {
      asort($chapterArrayBase, SORT_NATURAL);

      foreach($chapterArrayBase as $newChapterKey=>$newChapter) {
        $newChapterExplode = explode(";;", $newChapter);
        $newTimeCodeExploded = $newChapterExplode[0];
        $newChapterTitle = $newChapterExplode[1];

        if ($newTimeCodeExploded >= 3600) {
          $timeCodeHour = floor($newTimeCodeExploded/3600);
          $timeCodeMinute = floor($newTimeCodeExploded/60-60);
          $timeCodeMinute = floor($newTimeCodeExploded/60-60);
          $timeCodeSecond = floor($newTimeCodeExploded-($timeCodeHour*3600)-($timeCodeMinute*60));

          if ($timeCodeMinute == 0) {
            $timeCodeMinute ="00";
          }
          if ($timeCodeSecond == 0) {
            $timeCodeSecond = "00";
          } 
          $newChapterTimeCode = $timeCodeHour.":".$timeCodeMinute.":".$timeCodeSecond;
        } 
        else if ($newTimeCodeExploded < 3600 && $newTimeCodeExploded >=60) {
          $timeCodeMinutes = floor($newTimeCodeExploded/60);
          $timeCodeSecond = floor($newTimeCodeExploded - $timeCodeMinutes * 60);

          if ($timeCodeSecond == 0) {
            $timeCodeSecond = "00";
          } 
          $newChapterTimeCode = $timeCodeMinutes.":".$timeCodeSecond;
        } 
        else {
          $timeCodeSecond = floor($newTimeCodeExploded);
          if ($timeCodeSecond == 0) {
            $timeCodeSecond = "00";
          } 
          $newChapterTimeCode = "0:".$timeCodeSecond;
        }

        $currentNewChapterImplode = $newChapterTimeCode . ";;" . $newChapterTitle;

        array_push($chapterArraySorted, $currentNewChapterImplode);
      }
      $uploadChapters = implode(" || ", $chapterArraySorted);
    }
  }
  
  $musicArrayBase = array();
    if (isset($_POST['isThereMusicCredit'])) { 
      $uploadMusicCredit = "NONE";
     } else {
      for ($i = 0; $i < count($_POST['musicTimePlayed']); $i++) { 
        if (empty($_POST['musicTimePlayed'][$i]) ) { 
            $musicTimePlayed = "NONE";
          } else {
            $musicTimePlayed = $_POST['musicTimePlayed'][$i];
          }
          $musicSongTitle = $_POST['musicSongTitle'][$i];
          $musicArtist = $_POST['musicArtist'][$i];
         
          if (empty($_POST['musicLink'][$i])) { 
            $musicLink = "NONE";
          } else {
            $musicLink = $_POST['musicLink'][$i];
          }

          if (empty($_POST['musicMore'][$i])) { 
            $musicMore = "NONE";
          } else {
            $musicMore = $_POST['musicMore'][$i];
          }

          $musicCreditImplode = $musicTimePlayed . ";;" . $musicSongTitle . ";;" . $musicArtist . ";;" . $musicLink . ";;" . $musicMore;

          array_push($musicArrayBase, $musicCreditImplode);
      }
      $uploadMusicCredit = implode(" || ", $musicArrayBase);
  }

  $videoCreditArrayBase = array();
    if (isset($_POST['isThereVideoCredit'])) { 
     $uploadVideoCredit = "NONE";
    } else {
    for ($i = 0; $i < count($_POST['videoCreditTitle']); $i++) { 
      $videoCreditTitle = $_POST['videoCreditTitle'][$i];
      $videoCreditName = $_POST['videoCreditName'][$i];

      $videoCreditImplode = $videoCreditTitle . ";;" . $videoCreditName;

      array_push($videoCreditArrayBase, $videoCreditImplode);
    }
    $uploadVideoCredit = implode(" || ", $videoCreditArrayBase);
  }

  $staringArrayBase = array();
  if (isset($_POST['isThereStaringCredit'])) { 
      $uploadStaring = "NONE";
     } else {
    for ($i = 0; $i < count($_POST['staringDisplayName']); $i++) { 
       if (empty($_POST['staringTimeCode'][$i]) ) { 
        $staringTimeCode = "NONE";
      } else {
        $staringTimeCode = $_POST['staringTimeCode'][$i];
      }

      $staringDisplayName = $_POST['staringDisplayName'][$i];

      if (empty($_POST['staringUsername'][$i]) || $_POST['staringUsername'][$i] == "NoUn" ) { 
        $staringUsername = "NONE";
      } else {
        $staringUsername = $_POST['staringUsername'][$i];
      }

      $staringImplode = $staringTimeCode . ";;" . $staringDisplayName . ";;" . $staringUsername;

      array_push($staringArrayBase, $staringImplode);
    }
    $uploadStaring = implode(" || ", $staringArrayBase);
  }

  if ($_POST['linkType'] === "default") {
    $links = "DEFAULT";
  } else if ($_POST['linkType'] === "noLinks") {
    $links = "NONE";
  } else if ($_POST['linkType'] === "custom" || $_POST['linkType'] === "leaveAsIS") {
    $linksArrayBase = array();
      for ($i = 0; $i < count($_POST['linkHref']); $i++) { 
        $linkHref = $_POST['linkHref'][$i];
        $linkHref = $_POST['linkHref'][$i];
        $linkTitle = $_POST['linkTitle'][$i];

        $linksImplode = $linkHref . ";;" . $linkTitle;

        array_push($linksArrayBase, $linksImplode);
      }
      $links = implode(" || ", $linksArrayBase);
  }
  
  $uploadPrivacy = $_POST['privacy'];
  $uploadComments = $_POST['commentsOption'];
  
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
      header("Location: ../../../dashboard/upload_s3?id=$vidID&type=captcha&error=$error&$urlContent");
      //exit(); 
    }
    elseif ($recaptcha->score < 0.5) { #It looks like the request was made by a roboot
      $error = 2;
      header("Location: ../../../dashboard/upload_s3?id=$vidID&type=captcha&error=$error&$urlContent");
      //exit();
    }
  } #Captcha 
  
  if (empty($uploadTitle) || empty($uploadSDescription) || empty($uploadDescription) || empty($uploadCategory) || empty($uploadTags) || empty($uploadChapters) || empty($uploadMusicCredit) || empty($uploadPrivacy)){//Checks that all fields are entered: #EmptyFields
    $error = 3;
    header("Location: ../../../dashboard/upload_s3?id=$vidID&type=empty&error=$error&$urlContent");
    exit();
  }
  
  if ($_POST['linkType'] === "custom" && empty($links)) {//Checks to see if custom links are chosen that the custom link field is not empty.
    $error = 4;
    header("Location: ../../../dashboard/upload_s3?id=$vidID&type=empty&error=$error&$urlContent");
    exit();
  } #EmptyFields
  
  if ($error === 0) {
    include_once '../../models/classes/Video.class.php';
    $videoClass = new Video();
    $uploadStep2 = $videoClass->videoUploadS3($uploadID, $uploadTitle, $uploadOC, $uploadDate, $uploadSDescription, $uploadDescription, $uploadCategory, $uploadTags, $uploadChapters, $uploadMusicCredit, $uploadVideoCredit, $uploadStaring, $links, $uploadPrivacy, $uploadComments);

    unset($_COOKIE['currentUploadID']);
    setcookie("currentUploadID", "", time() - 3600); //REST COOKIE
    
    if ($uploadStep2 === "false") {
      $error = 5;
      header("Location: ../../../dashboard/upload_3?id=$vidID&type=database&error=$error&$urlContent");
      exit();
    } 
    else if ($uploadStep2 === "true") {
      #UploadEmail
      require '../email/videoUpload.email.php';
      if (!mail($email, $subject, $message, implode("\n", $headers))) {
        $error = 6;
        header("Location: ../../../dashboard/upload_s3?id=$vidID&type=sendEmail&error=$error&$urlContent");
        exit();
      } #UploadEmail
      header("Location: ../../../player?id=$vidID"); #Done! 
    }
  } #If submitted
}