<?php
/* signup.database.php | Version 1.0
  By: DevLexicon
  User Level Required: anyone

  The file allows users to signup.

  File used in:
    # login
*/

      error_reporting(E_ALL);
      ini_set('display_errors', 1);
  
  if (isset($_POST['submit'])) {
    require '../../models/config/config.php';

    $error = 0; //Sets initial error number to 0 meaning no errors

    $firstname = $_POST['signupFirstName'];
    $lastname = $_POST['signupLastName'];
    $username = $_POST['signupUsername'];
    $accountName = $username;

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

    $password = $_POST['signupPassword'];
    $confirmPassword = $_POST['signupPasswordConfirm'];
    $email = $_POST['signupEmail'];
    $avatarPath = $avatarDestination;
    $userlevel = "user";
    $view = 0;
    $country = $_POST['country'];
    $timezone = $_POST['timezone'];
    $profileStatus = 1;
    $tos = $_POST['tos'];

    include_once '../../models/classes/MySQL.class.php';
    include_once '../../models/classes/Users.class.php';
    include_once '../../models/classes/ReCAPTCHA.class.php';

/*Checks */

        $userClass = new Users;
        $emailCheck = $userClass->alreadyEmail($email);
        $userNameCheck = $userClass->alreadyUsername($username);
        
        if (isset($_POST['g-recaptcha-responseSignup'])) {
            $reCAPTCHA = new ReCAPTCHA;
            
            $capSecretKey = $reCAPTCHA->captchaSecretKey();
            $recaptchaResponse = $_POST['g-recaptcha-responseSignup'];
            
            $recaptchaURL = 'https://www.google.com/recaptcha/api/siteverify';
            
            $recaptcha = file_get_contents($recaptchaURL . '?secret=' . $capSecretKey . '&response=' . $recaptchaResponse);
            $recaptcha = json_decode($recaptcha);
            
            if (!isset($recaptchaResponse)) {
                $error = 1;
                header("Location: ../../../login?type=captcha&error=$error&first=$firstName&last=$lastName&userName=$username&email=$email");
                exit();
            }
            if ($recaptcha->score < 0.5) {
                $error = 2;
                header("Location: ../../../login?type=captcha&error=$error&first=$firstName&last=$lastName&userName=$username&email=$email");
                exit();
            }
        }

    #Check: Empty Files
    if (empty($firstname) || empty($lastname) || empty($username) || empty($password) || empty($email) || empty($country) || empty($timezone) || $tos != "Yes") {
      $error = 3;
      header("Location: ../../../login?type=empty&error=$error&first=$firstName&last=$lastName&userName=$username&email=$email");
      exit();
    } //End: Empty Files

    #Check: Characters Check
    elseif (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z_\-]*$/", $lastname)) {
      $error = 4;
       header("Location: ../../../login?type=invalidName&error=$error&first=$firstName&last=$lastName&userName=$username&email=$email");
      exit();
    } //first and last name characters check
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      $error = 5;
      header("Location: ../../../login?type=invalidUsername&error=$error&first=$firstName&last=$lastName&userName=$username&email=$email");
      exit();
    } //username characters check

    #Check: Valid Email
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = 6;
      header("Location: ../../../login?type=email&error=$error&first=$firstName&last=$lastName&userName=$username&email=$email");
      exit();
    } //email check

     if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%.?])[0-9A-Za-z!@#$%.?]{8,12}$/', $password)){
            $error = 7;
            header("Location: ../../../login?type=passwordNotStrongEnough&error=$error&first=$firstName&last=$lastName&userName=$username&email=$email");
            exit();
        } //first and last name characters check

    #Check: Avatar
    elseif ($avatarError != 0) {
      $error = 8;
      header("Location: ../../../login?type=fileError&file=ava&error=$error&first=$firstName&last=$lastName&userName=$username&email=$email");
    } //error check
    elseif (in_array($avatarExtention, $avatarExtAllow) != $avatarExtention) {
      $error = 9;
      header("Location: ../../../login?type=fileExt&file=ava&error=$error&first=$firstName&last=$lastName&userName=$username&email=$email");
    } //extention check
    elseif ($avatarSize > 1e+7) {
      $error = 10;
      header("Location: ../../../login?type=fileBig&file=ava&error=$error&first=$firstName&last=$lastName&userName=$username&email=$email");
    } //size check

    #Check: If user excites already
    elseif($userNameCheck === "true") {
      $error = 11;
      header("Location: ../../../login?type=usernameTaken&error=$error&first=$firstName&last=$lastName&userName=$username&email=$email");
      exit();
    }//User check done

    #Check: If user excites already
    elseif($emailCheck === "true") {
      $error = 12;
      header("Location: ../../../login?type=emailTaken&error=$error&first=$firstName&last=$lastName&userName=$username&email=$email");
      exit();
    }//User check done
/*End of Checks*/

  elseif ($password <> $confirmPassword){ 
      $error = 13;
      header("Location: ../../../login?type=passwordNotSame&error=$error&first=$firstName&last=$lastName&userName=$username&email=$email");
      exit();
  }

/*Start upload*/
    if($error == 0) {
      include '../../do_spaces/spaces_config.php';
      include '../../do_spaces/spaces_avatarUpload.php';

      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      
      $signMeUp = $userClass->signTheUserUp($firstname, $lastname, $username, $email, $hashedPassword, $country, $timezone, $avatarPath, $userlevel, $view, $profileStatus); 

      if ($signMeUp === "false") {
        $error = 14;
        header("Location: ../../../login?type=database&error=$error&first=$firstName&last=$lastName&userName=$username&email=$email");
        exit();
      }
      else if ($signMeUp === "true") {
        require '../email/signupUser.email.php';
        if (!mail($email, $subject, $message, implode("\n", $headers))) {
          $error = 15;
          header("Location: ../../../login?type=database&error=$error&first=$firstName&last=$lastName&userName=$username&email=$email");
          exit();
        }
        header("Location: ./../../login?type=signupSuccess");
        exit();
      }
    }
} //End: FormSubmitted
else {
  $error = 16;
  header("Location: ./../../login?type=submitted&error=$error");
  exit();
}
