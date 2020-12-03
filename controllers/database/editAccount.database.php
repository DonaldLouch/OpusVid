<?php
/* editAccount.database.php | Version 1.0
  By: DevLexicon
  User Level Required: anyone | admin | mod

 This file allows users, admins, and mods to edit their and the users accounts.

  File used in:
    # dashboard/settingsA
    # admin/edit_account?id=*
*/
      error_reporting(E_ALL);
      ini_set('display_errors', 1);

      
      if (isset($_POST['deleteAccountUser']) || isset($_POST['deleteAccountAdmin'])) {
        require '../../models/config/config.php';
        
        $error = 0;
        $profileID = $_POST['profileIDDel'];
        $profileName = $_POST['profileUNameDel'];
        
        include_once '../../models/classes/Users.class.php';
        include_once '../../models/classes/Video.class.php';
        
        $userClass = new Users;
        $videoClass = new Video;
        
        $profile = $userClass->getUser($profileID);

        if ($profileID === $profile['userID']) {
          $error = 1; 
          if (isset($_POST['deleteAccountAdmin'])) {
            header("Location: ../../admin/accounts?type=randomError&error=$error");
          }
          elseif (isset($_POST['deleteAccountUser'])) {
            header("Location: ../../dashboard/settingsA?type=randomError&error=$error"); 
          }
          exit(); 
        }
        
        if ($profileName === $profile['userName']) {
          $error = 2; 
          if (isset($_POST['deleteAccountAdmin'])) {
            header("Location: ../../admin/accounts?type=randomError&error=$error");
          }
          elseif (isset($_POST['deleteAccountUser'])) {
            header("Location: ../../dashboard/settingsA?type=randomError&error=$error"); 
          }
          exit(); 
        }

        if ($error === 0) {
          $videoClass->deleteAllUserVideos($profileName);

          $avatarPathExplode = explode("/", $profile['userAvatar']);
          $avatarPath = $avatarPathExplode[3]."/".$avatarPathExplode[4]."/".$avatarPathExplode[5];
          include_once '../../do_spaces/spaces_config.php';
          $spaces->deleteObject([
              'Bucket' => 'devlexicon',
              'Key' => $avatarPath
          ]);

          $userClass->deleteUser($profileID);

          if (isset($_POST['deleteAccountAdmin'])) {
            header("Location: ../../admin/accounts?type=deleteSuccess");
            exit(); 
          }
          elseif (isset($_POST['deleteAccountUser'])) {
            session_start();
            session_unset();
            session_destroy();
            
            header('Location:  ../../login?type=deleteSuccess');
            exit();
          }
        }
      }
      
    if (isset($_POST['editAccountUser']) || isset($_POST['editUserAdmin'])) {
    require '../../models/config/config.php';

    $error = 0;

    $accountName = $_POST['accountID'];
    $accountID = $_POST['numberID'];
    $accountEmail = $_POST['editEmail'];
    $accountPassword = $_POST['editPassword'];
    $hashedPassword = password_hash($accountPassword, PASSWORD_DEFAULT);
    $accountCountry = $_POST['country'];
    $accountTimeZone = $_POST['timezone'];
    $accountFirst = $_POST['signupFirstName'];
    $accountLast = $_POST['signupLastName'];

    if (isset($_POST['editUserAdmin'])) {
      $accountDescription = htmlspecialchars($_POST['description']);
      $accountTags = $_POST['tags'];
      $accountLinks = $_POST['links'];
      $accountUserLevel = $_POST['userlevel'];
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
        if (isset($_POST['editUserAdmin'])) {
          header("Location: ../../admin/edit_account?id=$accountID&type=captcha&error=$error");
        }
        elseif (isset($_POST['editAccountUser'])) {
          header("Location: ../../dashboard/settingsA?type=captcha&error=$error"); 
        }
        exit();
      }
      elseif ($recaptcha->score < 0.5) { #It looks like the request was made by a roboot
        if (isset($_POST['editUserAdmin'])) {
          $error = 2;
          header("Location: ../../admin/edit_account?id=$accountID&type=captcha&error=$error");
          exit();
        }
        elseif (isset($_POST['editAccountUser'])) {
          $error = 2;
          header("Location: ../../dashboard/settingsA?type=captcha&error=$error"); 
          exit();
        }
      }
    } #Captcha

    if (!preg_match("/^[a-zA-Z]*$/", $accountFirst) || !preg_match("/^[a-zA-Z_\-]*$/", $accountLast)) {
      $error = 3;
      if (isset($_POST['editUserAdmin'])) {
          header("Location: ../../admin/edit_account?id=$accountID&type=invalidName&error=$error");
        }
        elseif (isset($_POST['editAccountUser'])) {
          header("Location: ../../dashboard/settingsA?type=invalidName&error=$error"); 
        }
        exit();
    } //First and Last name characters check

    if (!filter_var($accountEmail, FILTER_VALIDATE_EMAIL)) {
      $error = 4;
      if (isset($_POST['editUserAdmin'])) {
        header("Location: ../../admin/edit_account?id=$accountID&type=invalidEmail&error=$error");
      }
      elseif (isset($_POST['editAccountUser'])) {
        header("Location: ../../dashboard/settingsA?type=invalidEmail&error=$error"); 
      }
      exit();
    } //email check

  if ($error == 0) { 
    $updateUserNP = null;
    $updateAccountNP = null;
    $updateUserP = null;
    $updateAccountP = null;

    if (empty($accountPassword)) {
      if (isset($_POST['editUserAdmin'])) {
        $updateUserNP = $userClass->updateUserNP($accountName, $accountFirst, $accountLast, $accountEmail, $accountCountry, $accountTimeZone, $accountDescription, $accountTags, $accountLinks, $accountUserLevel);
      }
      elseif (isset($_POST['editAccountUser'])) {
        $updateAccountNP = $userClass->updateAccountNP($accountName, $accountFirst, $accountLast, $accountEmail, $accountCountry, $accountTimeZone);
      }
    } 
    
    elseif (!empty($accountPassword)) {
      if (isset($_POST['editUserAdmin'])) {
        $updateUserP = $userClass->updateUserP($accountName, $accountFirst, $accountLast, $accountEmail, $hashedPassword, $accountCountry, $accountTimeZone, $accountDescription, $accountTags, $accountLinks, $accountUserLevel);
      }
      elseif (isset($_POST['editAccountUser'])) {
        $updateAccountP = $userClass->updateAccountP($accountName, $accountFirst, $accountLast, $accountEmail, $hashedPassword, $accountCountry, $accountTimeZone);
      }
    }

    if ($updateUserNP === "false" || $updateAccountNP === "false" || $updateUserP === "false" || $updateAccountP === "false") {
      $error = 5; 
      if (isset($_POST['editUserAdmin'])) {
        header("Location: ../../admin/edit_account?id=$accountID&type=database&error=$error");
      }
      elseif (isset($_POST['editAccountUser'])) {
        header("Location: ../../dashboard/settingsA?type=database&error=$error"); 
      }
      exit(); 
    }


    require '../email/editAccount.email.php';
    
    if (!mail($accountEmail, $subject, $message, implode("\n", $headers))) {
      $error = 6;
      if (isset($_POST['editUserAdmin'])) {
        header("Location: ../../admin/edit_account?id=$accountID&type=sendEmail&error=$error");
      }
      elseif (isset($_POST['editAccountUser'])) {
        header("Location: ../../dashboard/settingsA?type=sendEmail&error=$error"); 
      }
      exit();
    } 
    
    if ($error === 0) {
      if (isset($_POST['editUserAdmin'])) {
        header("Location: ../../../admin/edit_account?id=$accountID&type=successfullyUpdatedUAdmin");
        exit();
      }
      elseif (isset($_POST['editAccountUser'])) {
        session_start(); //If user session not already started; start the user session
        session_unset(); //Unlinks user session
        session_destroy(); //Ends user session: Logs out user
        
        header('Location:  ../../login?type=successfullyUpdatedU'); //Redirect to login page: Account Logged Success Message
        exit();
      }
    }
  } //End: NoAvatar
}