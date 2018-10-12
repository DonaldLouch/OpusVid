<?php
  if (isset($_POST['submit'])) {

    $uniqeID = uniqid();

    //Video File
      $video = $_FILES['videoFile'];

      $videoName = $_FILES['videoFile']['name']; //Takes the file name
      $videoTemp = $_FILES['videoFile']['tmp_name']; //Takes the temp name of the file
      $videoSize = $_FILES['videoFile']['size']; //Takes the file size
      $videoError = $_FILES['videoFile']['error']; //Takes the file error status
      $videoType = $_FILES['videoFile']['type']; //Takes the file types

      $videoExplode = explode('.', $videoName); //Explodes the file name (name . extention)
      $videoExtention = strolower(end($videoExplode)); //Changes the file extention into a lowercase name

      $videoExtAllow = array('mp4', 'mov', 'avi', 'mkv'); //Allow the following extentions

      if (in_array($videoExtention, $videoExtAllow)) { //In Array
        if ($videoError === 0) { //Error Check
          if ($videoSize < 500000) { //File Size -> Upload
            $videoNewName = $uniqeID.".".$videoExtention;

            $videoDestination = '../storage/videos'.$videoNewName;

            move_uploaded_file($videoTemp, $videoDestination);
          } else {
            echo "Your file is too big!";
          } //End else "File Size/Upload"
        } else {
          echo "There was an error uploading your file. Please try again!";
        } //End else "Error Check"
      } else {
        echo "Please only upload video files with the extention mp4, mov, avi, or mkv!";
      } //End else "In Array"

    //Thumb File
      $thumb = $_FILES['thumbFile'];

      $thumbName = $_FILES['thumbFile']['name']; //Takes the file name
      $thumbTemp = $_FILES['thumbFile']['tmp_name']; //Takes the temp name of the file
      $thumbSize = $_FILES['thumbFile']['size']; //Takes the file size
      $thumbError = $_FILES['thumbFile']['error']; //Takes the file error status
      $thumbType = $_FILES['thumbFile']['type']; //Takes the file types

      $thumbExplode = explode('.', $thumbName); //Explodes the file name (name . extention)
      $thumbExtention = strolower(end($thumbExplode)); //Changes the file extention into a lowercase name

      $thumbExtAllow = array('jpg', 'jpeg', 'png', 'pdf'); //Allow the following extentions

      if (in_array($thumbExtention, $thumbExtAllow)) { //In Array
        if ($thumbError === 0) { //Error Check
          if ($thumbSize < 500000) { //File Size -> Upload
            $thumbNewName = $uniqeID.".".$thumbExtention;

            $thumbDestination = '../storage/videos'.$thumbNewName;

            move_uploaded_file($thumbTemp, $thumbDestination);
          } else {
            echo "Your file is too big!";
          } //End else "File Size/Upload"
        } else {
          echo "There was an error uploading your file. Please try again!";
        } //End else "Error Check"
      } else {
        echo "Please only upload video files with the extention jpg, jpeg, png, OR pdf!";
      } //End else "In Array"

  } //End if isset
