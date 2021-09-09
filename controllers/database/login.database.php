<?php
  /* login.database.php | Version 1.0
    By: DevLexicon
    User Level Required: anyone
    
    The file allows users to login and creates a new session!
    
    File used in:
    # login
  */
  
  // Turn on error reporting:
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
  if (isset($_POST['submit'])) {
    require '../../models/config/config.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $error = 0;
    
    include_once '../../models/classes/MySQL.class.php';
    include_once '../../models/classes/Users.class.php';
    include_once '../../models/classes/ReCAPTCHA.class.php';
   
    if (isset($_POST['g-recaptcha-response'])) {
      $reCAPTCHA = new ReCAPTCHA;
      
      $capSecretKey = $reCAPTCHA->captchaSecretKey();
      $recaptchaResponse = $_POST['g-recaptcha-response'];
      
      $recaptchaURL = 'https://www.google.com/recaptcha/api/siteverify';
      
      $recaptcha = file_get_contents($recaptchaURL . '?secret=' . $capSecretKey . '&response=' . $recaptchaResponse);
      $recaptcha = json_decode($recaptcha);
      
      if (!isset($recaptchaResponse)) {
        $error = 1;
        header("Location: ../../../login?type=captcha&error=$error&username=$username");
        exit(); 
      }
      elseif ($recaptcha->score < 0.5) {
        $error = 2;
        header("Location: ../../../login?type=captcha&error=$error&username=$username");
        exit();
      }
    }
  
    if (empty($username) || empty($password)) { //If the username or password is empty then redirect to login page #Empty
      $error = 3;
      header("Location: ../../../login?type=empty&error=$error&username=$username");
      exit();
    } //End: Empty
  
    $userClass = new Users;
    $loginCheck = $userClass->userLoginCheck();
    
    if ($loginCheck === 'false') {
      $error = 4;
      header("Location: ../../../login?type=loginFail&error=$error&username=$username");
      exit();
    } elseif ($loginCheck === 'true') {
      $passCheck = $userClass->passCheck();
      $hashedPasswordCheck = password_verify($password, $passCheck); //Privately unhashes password from database then verifies it from the input from the submitted form
      
      if ($hashedPasswordCheck == false){ //If the wrong password was entered redirect to login page #WrongPass
        $error = 5;
        header("Location: ../../../login?type=loginFail&error=$error&username=$username");
        exit();
      } elseif ($hashedPasswordCheck == true) { //If correct password then log user in #Login
        session_start(); //Start Session
        $userClass->loginUser();
        $profileSetup = $userClass->statusCheck($username);

        if ($profileSetup === 0) { 
        header("Location: ../../dashboard?type=loginSuccess"); //Redirect to dashboard
        } else if ($profileSetup === 1) { 
          header("Location: ../../dashboard/settingsP?type=profileSetup"); //Redirect to dashboard
        }
        exit(); //Send Script
      } else { //If anything for login failed then redirect to login page #Failed
        $error = 6;
        header("Location: ../../../login?type=loginFailed&error=$error&username=$username");
        exit();
      } //End: Failed
      
    } else { //If there was any issues with the password check redirect to login page #PassFail
      $error = 7;
      header("Location: ../../../login?type=loginFail&error=$error&username=$username");
      exit();
    } //End: PassFail
    
  } else {
    $error = 8;
    header("Location: ../../../login?type=submitted&error=$error&username=$username");
    exit();
  }