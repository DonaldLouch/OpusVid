<?php

if (isset($_POST['submit'])) {
  include 'db_connect.php';

  $accountName = mysqli_real_escape_string($mySQL, $_POST['accountID']);
  $accountFirst = mysqli_real_escape_string($mySQL, $_POST['signupFirstName']);
  $accountLast = mysqli_real_escape_string($mySQL, $_POST['signupLastName']);
  $accountCountry = mysqli_real_escape_string($mySQL, $_POST['country']);
  $accountDescription = nl2br($_POST['description']);
  $accountTags = mysqli_real_escape_string($mySQL, $_POST['tags']);

  if ($_FILES["avatarFile"]["error"] > 0) {
    $updateSQL = "UPDATE users SET first_name = '$accountFirst', last_name = '$accountLast', country = '$accountCountry', description = '$accountDescription', account_tags = '$accountTags' WHERE username= '$accountName';";

    $results = mysqli_query($mySQL, $updateSQL);
    header("Location: ../profile?id=$accountName");
  } else {
      $avatar = $_FILES['avatarFile'];

      $avatarName = $_FILES['avatarFile']['name']; //Takes the file name
      $avatarTemp = $_FILES['avatarFile']['tmp_name']; //Takes the temp name of the file
      $avatarSize = $_FILES['avatarFile']['size']; //Takes the file size
      $avatarError = $_FILES['avatarFile']['error']; //Takes the file error status
      $avatarType = $_FILES['avatarFile']['type']; //Takes the file types

      $avatarExplode = explode('.', $avatarName); //Explodes the file name (name . extention)
      $avatarExtention = strtolower(end($avatarExplode)); //Changes the file extention into a lowercase name

      $avatarExtAllow = array('jpg', 'jpeg', 'png', 'pdf'); //Allow the following extentions

      if (in_array($avatarExtention, $avatarExtAllow)) { //In Array
        if ($avatarError === 0) { //Error Check
          if ($avatarSize < 5000000) { //File Size -> Upload
            $avatarNewName = $accountName.".".$avatarExtention;

            $avatarDestination = '../storage/avatars/'.$avatarNewName;

            move_uploaded_file($avatarTemp, $avatarDestination);
          } else {
            echo "Your thumbnail is too big!";
          } //End else "File Size/Upload"
        } else {
          echo "There was an error uploading your thumbnail. Please try again!";
        } //End else "Error Check"
      } else {
        echo "Please only upload image files with the extention jpg, jpeg, png, OR pdf!";
      } //End else "In Array"

    $updateSQL = "UPDATE users SET first_name = '$accountFirst', last_name = '$accountLast', country = '$accountCountry', description = '$accountDescription', account_tags = '$accountTags', avatar = '$avatarDestination' WHERE username= '$accountName';";
    $results = mysqli_query($mySQL, $updateSQL);

    header("Location: ../profile?id=$accountName");
  }
}
