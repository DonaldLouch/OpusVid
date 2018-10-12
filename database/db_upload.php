<?php

session_start();

if (isset($_POST['submit'])) {
  include 'db_connect.php';

  $uniqeID = uniqid();

  $uploadID = nl2br($uniqeID);
  $uploadPath = nl2br($vidPath);
  $uploadTitle = nl2br($_POST['vTitle']);
  $uploadOC = nl2br($_SESSION['uName']);
  $uploadDate = nl2br(time());
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
  $uploadThumbPath = nl2br($thumbPath);

  //nl2br();
  //mysqli_real_escape_string($mySQL,

  if (empty($uploadTitle) || empty($uploadSDescription) || empty($uploadDescription) || empty($uploadCategory) || empty($uploadTags) || empty($uploadMusicCredit) || empty($uploadPrivacy)){
    echo 'All Fields are Required!';
  } elseif(!$mySQL) {
    die("Connection failed: " . mysqli_connect_error());
  } else {
    /*echo '<p>1 ID:' . $uploadID . '</p>';
    echo '<p>2 Video Path:' . $uploadPath . '</p>';
    echo '<p>3 Video Title:' . $uploadTitle . '</p>';
    echo '<p>4 Opus Creator:' . $uploadOC . '</p>';
    echo '<p>5 Uploaded On:' . $uploadDate . '</p>';
    echo '<p>6 Short Description:' . $uploadSDescription . '</p>';
    echo '<p>7 Description:' . $uploadDescription . '</p>';
    echo '<p>8 Category:' . $uploadCategory . '</p>';
    echo '<p>9 Tags:' . $uploadTags . '</p>';
    echo '<p>10 Music Credit:' . $uploadMusicCredit . '</p>';
    echo '<p>11 Filmed By:' . $uploadFilmedBy . '</p>';
    echo '<p>12 Filmed With:' . $uploadFilmedWith . '</p>';
    echo '<p>13 Filmed At:' . $uploadFilmedAt . '</p>';
    echo '<p>14 Filmed On:' . $uploadFilmedOn . '</p>';
    echo '<p>15 Audio By:' . $uploadAudioBy . '</p>';
    echo '<p>16 Audio Captured With:' . $uploadAudioWith . '</p>';
    echo '<p>17 Edited By:' . $uploadEditedBy . '</p>';
    echo '<p>18 Edited On:' . $uploadEditedOn . '</p>';
    echo '<p>19 Edited On:' . $uploadStaring . '</p>';
    echo '<p>20 Privacy:' . $uploadPrivacy . '</p>';
    echo '<p>21 Thumbnail Path:' . $uploadThumbPath . '</p>';*/

    //Video File
      $video = $_FILES['videoFile'];

      $videoName = $_FILES['videoFile']['name']; //Takes the file name
      $videoTemp = $_FILES['videoFile']['tmp_name']; //Takes the temp name of the file
      $videoSize = $_FILES['videoFile']['size']; //Takes the file size
      $videoError = $_FILES['videoFile']['error']; //Takes the file error status
      $videoType = $_FILES['videoFile']['type']; //Takes the file types

      $videoExplode = explode('.', $videoName); //Explodes the file name (name . extention)
      $videoExtention = strtolower(end($videoExplode)); //Changes the file extention into a lowercase name

      $videoExtAllow = array('mp4', 'mov', 'avi', 'mkv'); //Allow the following extentions

      if (in_array($videoExtention, $videoExtAllow)) { //In Array
        if ($videoError === 0) { //Error Check
          if ($videoSize < 5000000) { //File Size -> Upload
            $videoNewName = $uniqeID.".".$videoExtention;

            $videoDestination = '../storage/videos/'.$videoNewName;

            move_uploaded_file($videoTemp, $videoDestination);
          } else {
            echo "Your video is too big!";
          } //End else "File Size/Upload"
        } else {
          echo "There was an error uploading your video. Please try again!";
        } //End else "Error Check"
      } else {
        echo "Please only upload video files with the extention mp4, mov, avi, or mkv!";
      } //End else "In Array"

    //Thumb File
      $thumb = $_FILES['thumbnailFile'];

      $thumbName = $_FILES['thumbnailFile']['name']; //Takes the file name
      $thumbTemp = $_FILES['thumbnailFile']['tmp_name']; //Takes the temp name of the file
      $thumbSize = $_FILES['thumbnailFile']['size']; //Takes the file size
      $thumbError = $_FILES['thumbnailFile']['error']; //Takes the file error status
      $thumbType = $_FILES['thumbnailFile']['type']; //Takes the file types

      $thumbExplode = explode('.', $thumbName); //Explodes the file name (name . extention)
      $thumbExtention = strtolower(end($thumbExplode)); //Changes the file extention into a lowercase name

      $thumbExtAllow = array('jpg', 'jpeg', 'png', 'pdf'); //Allow the following extentions

      if (in_array($thumbExtention, $thumbExtAllow)) { //In Array
        if ($thumbError === 0) { //Error Check
          if ($thumbSize < 5000000) { //File Size -> Upload
            $thumbNewName = $uniqeID.".".$thumbExtention;

            $thumbDestination = '../storage/thumbnail/'.$thumbNewName;

            move_uploaded_file($thumbTemp, $thumbDestination);
          } else {
            echo "Your thumbnail is too big!";
          } //End else "File Size/Upload"
        } else {
          echo "There was an error uploading your thumbnail. Please try again!";
        } //End else "Error Check"
      } else {
        echo "Please only upload image files with the extention jpg, jpeg, png, OR pdf!";
      } //End else "In Array"

    $sqlInsert = "INSERT INTO videos (id, video_path, video_title, opus_creator, uploaded_on, short_description, description, category, tags, music_credit, filmed_date, filmed_at, filmed_on, filmed_by, audio_by, audio_with, edited_by, edited_on, staring, privacy, thumbnail_path, views) VALUES ('$uploadID', '$videoDestination', '$uploadTitle', '$uploadOC', '$uploadDate', '$uploadSDescription', '$uploadDescription', '$uploadCategory', '$uploadTags', '$uploadMusicCredit', '$uploadFilmedOn', '$uploadFilmedAt', '$uploadFilmedWith', '$uploadFilmedBy', '$uploadAudioBy', '$uploadAudioWith', '$uploadEditedBy', '$uploadEditedOn', '$uploadStaring', '$uploadPrivacy', '$thumbDestination', 0)";

    $results = mysqli_query($mySQL, $sqlInsert);
    header("Location: ../player?id=$uniqeID");
   }
  }
