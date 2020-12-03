<?php
/* updateCSS.database.php | Version 1.0
  By: DevLexicon
  User Level Required: admin

  The file allows the admins to update the CSS.

  File used in:
    # admin/css
*/
	// Turn on error reporting:
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
    
    if (isset($_POST['updateCSS'])) {
        require '../../models/config/config.php';

        $cssPrimaryColour = $_POST['1'];
        $cssSecondaryColour = $_POST['2'];
        $cssTertiaryColour = $_POST['3'];
        $cssBlackColour = $_POST['4'];
        $cssWhiteColour = $_POST['5'];
        $cssGreyColour = $_POST['6'];
        $cssMainGradient = $_POST['7'];
        $cssBackgroundGradient = $_POST['8'];
        $cssBlackGradient = $_POST['9'];
        $cssWhiteGradient = $_POST['10'];
        $cssMainFont = $_POST['11'];
        $cssSecondaryFont = $_POST['12'];
        $cssMainBoxShadow = $_POST['13'];
        $cssSecondaryBoxShadow = $_POST['14'];
        $cssTertiaryBoxShadow = $_POST['15'];
        
        $error = 0;
        
        include_once '../../models/classes/MySQL.class.php';
        include_once '../../models/classes/ReCAPTCHA.class.php';
        include_once '../../models/classes/Settings.class.php';
        
        if (isset($_POST['g-recaptcha-response'])) {
            $reCAPTCHA = new ReCAPTCHA;
        
            $capSecretKey = $reCAPTCHA->captchaSecretKey();
            $recaptchaResponse = $_POST['g-recaptcha-response'];
            
            $recaptchaURL = 'https://www.google.com/recaptcha/api/siteverify';
            
            $recaptcha = file_get_contents($recaptchaURL . '?secret=' . $capSecretKey . '&response=' . $recaptchaResponse);
            $recaptcha = json_decode($recaptcha);
            
            if (!isset($recaptchaResponse)) {
                $error = 1;
                header("Location: ../../../admin/css?type=captcha&error=$error");
                exit();
            }
            if ($recaptcha->score < 0.5) {
                $error = 2;
                header("Location: ../../../admin/css?type=captcha&error=$error");
                exit();
            }
        }

        if (empty($cssPrimaryColour) || empty($cssSecondaryColour) || empty($cssTertiaryColour) || empty($cssBlackColour) || empty($cssWhiteColour) || empty($cssGreyColour) || empty($cssMainGradient) || empty($cssBackgroundGradient) || empty($cssBlackGradient) || empty($cssWhiteGradient) || empty($cssMainFont) || empty($cssMainBoxShadow) || empty($cssSecondaryBoxShadow) || empty($cssTertiaryBoxShadow)) {
            $error = 3;
            header("Location: ../../../admin/css?type=empty&error=$error");
            exit();
        }

        if ($userLevel != 'admin') {
            $error = 4;
            header("Location: ../../../admin/css?type=adminLevel&error=$error");
            exit();
        }
        
        if ($error === 0) {
            $settings = new Settings;
            $updateWebsite = $settings->updateCSS($cssPrimaryColour, $cssSecondaryColour, $cssTertiaryColour, $cssBlackColour, $cssWhiteColour, $cssGreyColour, $cssMainGradient, $cssBackgroundGradient, $cssBlackGradient, $cssWhiteGradient, $cssMainFont, $cssSecondaryFont, $cssMainBoxShadow, $cssSecondaryBoxShadow, $cssTertiaryBoxShadow); 
            
            if ($updateWebsite === "false") {
                $error = 5;
                header("Location: ../../../admin/css?type=database&error=$error");
                exit();
            } elseif ($updateWebsite === "true") {
                header("Location: ../../../admin/css?type=sucessfulCSS");
                exit();
            }
        }
    }