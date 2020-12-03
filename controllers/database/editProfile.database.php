<?php
/* editProfile.database.php | Version 1.0
  By: DevLexicon
  User Level Required: anyone | admin | mod

  This file allows users, admins, and mods to edit their and the users profile.

  File used in:
    # dashboard/settingsP
    # admin/edit_account?id=*
*/
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
  
  if (isset($_POST['submit'])) {
    require '../../models/config/config.php';

    $error = 0; //Sets initial error number to 0 meaning no errors

    //Gets information from the submitted form
    $accountName = $_POST['accountID'];
    $accountDescription = htmlspecialchars($_POST['description']);
    $accountTags = $_POST['tags'];
    $accountLinks = $_POST['links'];
    $accountEmail = $_POST['accountEmail'];

    if ($_FILES['avatarFile']['error'] == 0) {
      $avatar = $_FILES['avatarFile'];

      $avatarName = $_FILES['avatarFile']['name']; //Takes the file name
      $avatarTemp = $_FILES['avatarFile']['tmp_name']; //Takes the temp name of the file
      $avatarSize = $_FILES['avatarFile']['size']; //Takes the file size
      $avatarError = $_FILES['avatarFile']['error']; //Takes the file error status
      $avatarType = $_FILES['avatarFile']['type']; //Takes the file types

      $avatarExplode = explode('.', $avatarName); //Explodes the file name (name . extention)
      $avatarExtention = strtolower(end($avatarExplode)); //Changes the file extention into a lowercase name
      $avatarTypeExplode = explode ("/", $avatarType); // [0] is media type | [1] is file type
      $avatarExtAllow = array('jpg', 'jpeg', 'png', 'pdf'); //Allow the following extentions
      $maxAvatarSize = "1e+7";

      $avatarNewName = $accountName.".".$avatarExtention;

      $avatarDestination = "https://".$spacesBucket.".".$spacesURIRegion.".".$spacesURL."/".$spacesRootFolder."/avatar/".$avatarNewName; 
    }

    include_once '../../models/classes/MySQL.class.php';
    include_once '../../models/classes/Users.class.php';
    include_once '../../models/classes/ReCAPTCHA.class.php';

/*Checks */

        $userClass = new Users;

        if (isset($_POST['g-recaptcha-response'])) {
          $reCAPTCHA = new ReCAPTCHA; #Creats a new ReCAPRCHA class
          
          $capSecretKey = $reCAPTCHA->captchaSecretKey();  #Gets the Captacha Secert Key
          $recaptchaResponse = $_POST['g-recaptcha-response']; #Gets the Captcha Respnse
          
          $recaptchaURL = 'https://www.google.com/recaptcha/api/siteverify'; #Base Captcha URI
          
          $recaptcha = file_get_contents($recaptchaURL . '?secret=' . $capSecretKey . '&response=' . $recaptchaResponse); #The URL that Google uses to check for human or robot
          $recaptcha = json_decode($recaptcha); #The Results
          
          if (!isset($recaptchaResponse)) { #If the Captcha response wasn't set
            $error = 1;
            header("Location: ../../dashboard/settingsP?type=captcha&error=$error"); 
            //exit(); 
          }
          elseif ($recaptcha->score < 0.5) { #It looks like the request was made by a roboot
            $error = 2;
            header("Location: ../../dashboard/settingsP?type=captcha&error=$error"); 
            //exit();
          }
        } #Captcha 

  if ($_FILES["avatarFile"]["error"] != 0 && $error == 0) { //If there's no new avatar uploaded then update profile with the new info #NoAvatar

    if (empty($accountDescription) || empty($accountTags)) {
        $profileStatus = 1;
    } else {
        $profileStatus = 0;
    }

    $updateProfile = $userClass->updateProfile($accountName, $accountDescription, $accountTags, $accountLinks, $profileStatus);

    if ($updateProfile === "false") {
      $error = 4; 
      header("Location: ../../dashboard/settingsP?type=database&error=$error"); 
      exit(); 
    }

    require '../email/editProfile.email.php';

    if (!mail($accountEmail, $subject, $message, implode("\n", $headers))) {
      $error = 5;
      header("Location: ../../dashboard/settingsP?type=email&error=$error"); 
      exit();
    }

    header("Location: ../../profile?id=$accountName"); //Redirects to users profile
  } //End: NoAvatar

  if ($_FILES['avatarFile']['error'] == 0) { //Is the file uploaded and no initial errors?
      $error = 6;
      header("Location: ../../dashboard/settingsP?type=fileError&file=ava&error=$error"); 
  } //error check
  elseif (in_array($avatarExtention, $avatarExtAllow) != $avatarExtention) { //Does the uploaded file have the right extention?
    $error = 7;
    header("Location: ../../dashboard/settingsP?type=fileExt&file=ava&error=$error"); 
  } //extention check
  elseif ($avatarSize > 1e+7) { //Is the file smaller then the max size?
    $error = 8;
    header("Location: ../../dashboard/settingsP?type=fileBig&file=ava&error=$error"); 
  } //size check

    if($_FILES['avatarFile']['error'] == 0 && $error == 0) { //If no errors then upload avatar and update database #DatabaseUpdate
      include '../../do_spaces/spaces_config.php';
      include '../../do_spaces/spaces_avatarUpload.php';

      if (empty($accountDescription) || empty($accountTags)) {
        $profileStatus = 1;
    } else {
        $profileStatus = 0;
    }

      $updateProfile = $userClass->updateProfile($accountName, $accountDescription, $accountTags, $accountLinks, $profileStatus);

      require '../email/editProfile.email.php';

      if (!mail($accountEmail, $subject, $message, implode("\n", $headers))) {
      $error = 9;
      header("Location: ../../dashboard/settingsP?type=email&error=$error"); 
      exit();
    }
      header("Location: ../profile?id=$accountName");
    } //End: DatabaseUpdate

} //End: FormSubmitted