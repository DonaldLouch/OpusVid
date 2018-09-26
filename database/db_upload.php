<?php

session_start();

if (isset($_POST['submit'])) {
  $db_Server = "localhost";
  $db_Username = "opusvid_cms";
  $db_Password = "n,rl!DVdGwTa}&8Usl";
  $db_Name = "opusvid_cms";

  $mySQL = mysqli_connect($db_Server, $db_Username, $db_Password, $db_Name) or die("Connecting to MySQL failed");

  $target_file_video = $_FILES["videoFile"]["name"];
  $fileVideoExtension = strtolower(pathinfo($target_file_video,PATHINFO_EXTENSION));
  $target_file_thumb = $_FILES["thumbnailFile"]["name"];
  $fileThumbExtension = strtolower(pathinfo($target_file_thumb,PATHINFO_EXTENSION));
  $uniqeID = uniqid();
  $vidPath = "../../../database/upload/videos/" . $uniqeID . '.' . $fileVideoExtension;
  $thumbPath = "../../../database/upload/thumbnails/" . $uniqeID . '.' . $fileThumbExtension;

  //nl2br();
  //mysqli_real_escape_string($mySQL,

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

  if (empty($uploadPath) || empty($uploadTitle) || empty($uploadSDescription) || empty($uploadDescription) || empty($uploadCategory) || empty($uploadTags) || empty($uploadMusicCredit) || empty($uploadPrivacy) || empty($uploadThumbPath)){
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

    $sqlInsert = "INSERT INTO videos (id, video_path, video_title, opus_creator, uploaded_on, short_description, description, category, tags, music_credit, filmed_date, filmed_at, filmed_on, filmed_by, audio_by, audio_with, edited_by, edited_on, staring, privacy, thumbnail_path) VALUES ('$uploadID', '$uploadPath', '$uploadTitle', '$uploadOC', '$uploadDate', '$uploadSDescription', '$uploadDescription', '$uploadCategory', '$uploadTags', '$uploadMusicCredit', '$uploadFilmedOn', '$uploadFilmedAt', '$uploadFilmedWith', '$uploadFilmedBy', '$uploadAudioBy', '$uploadAudioWith', '$uploadEditedBy', '$uploadEditedOn', '$uploadStaring', '$uploadPrivacy', '$uploadThumbPath')";

    $results = mysqli_query($mySQL, $sqlInsert);


    //Upload Video to Server
    if ($_FILES["videoFile"]["error"] > 0) {
      echo "Return Code: " . $_FILES["videoFile"]["error"];
    } else {
      move_uploaded_file($_FILES["videoFile"]["tmp_name"], "upload/videos/" . $uniqeID . "." . $fileVideoExtension);
    }

      //Thumbnail Upload
      if ($_FILES["thumbnailFile"]["error"] > 0) {
        echo "Return Code: " . $_FILES["thumbnailFile"]["error"];
      } else {
        move_uploaded_file($_FILES["thumbnailFile"]["tmp_name"], "upload/thumbnails/" . $uniqeID . "." . $fileThumbExtension);
      }
      header("Location: ../player?id=$uniqeID");
   }
  }
?>
