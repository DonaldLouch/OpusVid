<?php
/* updateTerms.database.php | Version 1.0
  By: DevLexicon
  User Level Required: admin

  The file allows the admins to update the Terms of Service.

  File used in:
    # admin/tos
*/

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    if (isset($_POST['termsUpdate'])) {

        $termUpdate = htmlspecialchars($_POST['termUpdate']);
        $error = 0;

        require '../../models/config/config.php';
        include_once '../../models/classes/MySQL.class.php';
        include_once '../../models/classes/ReCAPTCHA.class.php';

        if (isset($_POST['g-recaptcha-response'])) {
            $reCAPTCHA = new ReCAPTCHA; #Creats a new ReCAPRCHA class
            
            $capSecretKey = $reCAPTCHA->captchaSecretKey();  #Gets the Captacha Secert Key
            $recaptchaResponse = $_POST['g-recaptcha-response']; #Gets the Captcha Respnse
            
            $recaptchaURL = 'https://www.google.com/recaptcha/api/siteverify'; #Base Captcha URI
            
            $recaptcha = file_get_contents($recaptchaURL . '?secret=' . $capSecretKey . '&response=' . $recaptchaResponse); #The URL that Google uses to check for human or robot
            $recaptcha = json_decode($recaptcha); #The Results
            
            if (!isset($recaptchaResponse)) { #If the Captcha response wasn't set
            $error = 1;
            header("Location: ../../../admin/tos?type=captcha&error=$error");
            //exit(); 
            }
            elseif ($recaptcha->score < 0.5) { #It looks like the request was made by a roboot
            $error = 2;
            header("Location: ../../../admin/tos?type=captcha&error=$error");
            //exit();
            }
        } #Captcha 

        if (empty($termUpdate)) {
            $error = 3;
            header("Location: ../../../admin/tos?type=empty&error=$error");
            exit();
        }

        if($error === 0) {
            include_once '../../models/classes/Settings.class.php';
            $settingsClass = new Settings();
            $settingsClass->updateTerms($termUpdate);
            header("Location: ../../../tos?type=sucessfulTOS");
        }
    }