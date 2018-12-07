<?php
/* db_editA.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is to edit a users account and their information

  Blades Inlcluded:
    #db_connect: To connect to Database
    #../do_spaces/spaces_config: Connects to DigitalOcean for upload prep
    #db_templates/avatarUpload: Gets post information
    #../do_spaces/spaces_avatarUpload.php: Uploades new avatar
    #emails_editProfile.php: Sends email once a profile is updated

  File used in:
    #dashboard/settingsP
*/

if (isset($_POST['submit'])) { //Looks to see if the form has been submitted #FormSubmitted
  include 'db_connect.php'; //Connects to the database

  $error = 0; //Sets initial error number to 0 meaning no errors

  //Gets information from the submitted form
  $accountName = mysqli_real_escape_string($mySQL, nl2br($_POST['accountID']));
  $accountFirst = mysqli_real_escape_string($mySQL, $_POST['signupFirstName']);
  $accountLast = mysqli_real_escape_string($mySQL, $_POST['signupLastName']);
  $accountCountry = mysqli_real_escape_string($mySQL, $_POST['country']);
  $accountDescription = mysqli_real_escape_string($mySQL, nl2br($_POST['description']));
  $accountTags = mysqli_real_escape_string($mySQL, $_POST['tags']);
  $accountEmail = mysqli_real_escape_string($mySQL, $_POST['accountEmail']);

  require '../do_spaces/spaces_config.php'; //DO Spaces Configutation
  require 'db_templates/avatarUpload.php'; //Upload Function

  if (!preg_match("/^[a-zA-Z]*$/", $accountFirst) || !preg_match("/^[a-zA-Z_\-]*$/", $accountLast)) {
    $error = 1; //Error reached
    header("Location: ../dashboard/settingsP?setting=name&error=1");
    exit(); // Ends php script
  } //First and Last name characters check

  elseif ($_FILES["avatarFile"]["error"] > 0) { //If there's no new avatar uploaded then update profile with the new info #NoAvatar
    $updateSQL = "UPDATE users SET first_name = '$accountFirst', last_name = '$accountLast', country = '$accountCountry', description = '$accountDescription', account_tags = '$accountTags' WHERE username= '$accountName';";
    $results = mysqli_query($mySQL, $updateSQL); //Updates database

    include 'emails/email_editProfile.php'; //Sends email

    header("Location: ../profile?id=$accountName"); //Redirects to users profile
  } //End: NoAvatar
  else { //#Update
    #Check: Avatar
    if ($avatarError != 0) { //Is the file uploaded and no initial errors?
      $error = 2;
      header("Location: ../dashboard/settingsP?setting=error&error=2");
    } //error check
    elseif (in_array($avatarExtention, $avatarExtAllow) != $avatarExtention) { //Does the uploaded file have the right extention?
      $error = 3;
      header("Location: ../dashboard/settingsP?setting=ext&error=3");
    } //extention check
    elseif ($avatarSize > 1e+8) { //Is the file smaller then the max size?
      $error = 4;
      header("Location: ../dashboard/settingsP?setting=big&error=4");
    } //size check

    if($error == 0) { //If no errors then upload avatar and update database #DatabaseUpdate
      require '../do_spaces/spaces_avatarUpload.php'; //DO Spaces Avatar Upload

      $updateSQL = "UPDATE users SET first_name = '$accountFirst', last_name = '$accountLast', country = '$accountCountry', description = '$accountDescription', account_tags = '$accountTags', avatar = '$avatarDestination' WHERE username= '$accountName';";
      $results = mysqli_query($mySQL, $updateSQL);

      include 'emails/email_editProfile.php';

      header("Location: ../profile?id=$accountName");
    } //End: DatabaseUpdate
  } //End: Update
} //End: FormSubmitted
