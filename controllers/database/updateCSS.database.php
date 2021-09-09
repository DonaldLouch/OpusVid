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
        $cssDarkGreyColour = $_POST['7'];
        $cssRedColour = $_POST['8'];
        $cssGreenColour = $_POST['9'];
        $cssMainGradient = $_POST['10'];
        $cssBackgroundGradient = $_POST['11'];
        $cssBlackGradient = $_POST['12'];
        $cssWhiteGradient = $_POST['13'];
        $cssModalGradient = $_POST['14'];
        $cssBlurredBackground = $_POST['15'];
        $cssMainFont = $_POST['16'];
        $cssSecondaryFont = $_POST['17'];
        $cssCodeFont = $_POST['18'];
        $cssMainBoxShadow = $_POST['19'];
        $cssSecondaryBoxShadow = $_POST['20'];
        $cssTertiaryBoxShadow = $_POST['21'];
        $cssNavBoxShadow = $_POST['22'];
        $cssDarkPrimaryColour = $_POST['23'];
        $cssDarkSecondaryColour = $_POST['24'];
        $cssDarkTertiaryColour = $_POST['25'];
        $cssDarkBlackColour = $_POST['26'];
        $cssDarkWhiteColour = $_POST['27'];
        $cssDark1GreyColour = $_POST['28'];
        $cssDarkDarkGreyColour = $_POST['29'];
        $cssDarkRedColour = $_POST['30'];
        $cssDarkGreenColour = $_POST['31'];
        $cssDarkMainGradient = $_POST['32'];
        $cssDarkBackgroundGradient = $_POST['33'];
        $cssDarkBlackGradient = $_POST['34'];
        $cssDarkWhiteGradient = $_POST['35'];
        $cssDarkModalGradient = $_POST['36'];
        $cssDarkBlurredBackground = $_POST['37'];
        $cssDarkMainBoxShadow = $_POST['38'];
        $cssDarkSecondaryBoxShadow = $_POST['39'];
        $cssDarkTertiaryBoxShadow = $_POST['40'];
        $cssDarkNavBoxShadow = $_POST['41'];
        
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

        if (empty($cssPrimaryColour) || empty($cssSecondaryColour) || empty($cssTertiaryColour) || empty($cssBlackColour) || empty($cssWhiteColour) || empty($cssGreyColour) || empty($cssMainGradient) || empty($cssBackgroundGradient) || empty($cssBlackGradient) || empty($cssWhiteGradient) || empty($cssMainFont) || empty($cssMainBoxShadow) || empty($cssSecondaryBoxShadow) || empty($cssTertiaryBoxShadow)) { // TODO Add other styles such as the new colour, background, box shadow and dark mode options
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
            $updateWebsite = $settings->updateCSS($cssPrimaryColour, $cssSecondaryColour, $cssTertiaryColour, $cssBlackColour, $cssWhiteColour, $cssGreyColour, $cssDarkGreyColour, $cssRedColour, $cssGreenColour, $cssMainGradient, $cssBackgroundGradient, $cssBlackGradient, $cssWhiteGradient, $cssModalGradient, $cssBlurredBackground, $cssMainFont, $cssSecondaryFont, $cssCodeFont, $cssMainBoxShadow, $cssSecondaryBoxShadow, $cssTertiaryBoxShadow, $cssNavBoxShadow, $cssDarkPrimaryColour, $cssDarkSecondaryColour, $cssDarkTertiaryColour, $cssDarkBlackColour, $cssDarkWhiteColour, $cssDark1GreyColour, $cssDarkDarkGreyColour, $cssDarkRedColour, $cssDarkGreenColour, $cssDarkMainGradient, $cssDarkBackgroundGradient, $cssDarkBlackGradient, $cssDarkModalGradient, $cssDarkBlurredBackground, $cssDarkWhiteGradient, $cssDarkMainBoxShadow, $cssDarkSecondaryBoxShadow, $cssDarkTertiaryBoxShadow, $cssDarkNavBoxShadow); 
            
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