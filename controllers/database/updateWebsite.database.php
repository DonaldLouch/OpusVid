<?php
/* updateWebsite.database.php | Version 1.0
  By: DevLexicon
  User Level Required: admin

  The file allows the admins to update the website settings.

  File used in:
    # admin/web
*/
	// Turn on error reporting:
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
    
    if (isset($_POST['updateWebsite'])) {
        require '../../models/config/config.php';

        $siteURL = $_POST['1'];
        $websiteName = $_POST['2'];
        $siteDescription = $_POST['3'];
        $siteKeywords = $_POST['4'];
        $timeZone = $_POST['5'];
        $supportEmail = $_POST['6'];
        $spacesKey = $_POST['7'];
        $spacesSecert = $_POST['8'];
        $spacesBucket = $_POST['9'];
        $spacesRegion = $_POST['10'];
        $spacesEndpoint = $_POST['11'];
        $spacesURIRegion = $_POST['12'];
        $spacesURL = $_POST['13'];
        $spacesRootFolder = $_POST['14'];
        $baseFileURL = $_POST['15'];
        $captchaSite = $_POST['16'];
        $captchaSecret = $_POST['17'];
        
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
                header("Location: ../../../admin/web?type=captcha&error=$error");
                exit();
            }
            if ($recaptcha->score < 0.5) {
                $error = 2;
                header("Location: ../../../admin/web?type=captcha&error=$error");
                exit();
            }
        }

        if (empty($siteURL) || empty($websiteName) || empty($siteDescription) || empty($siteKeywords) || empty($timeZone) || empty($supportEmail) || empty($spacesKey) || empty($spacesSecert) || empty($spacesBucket) || empty($spacesRegion) || empty($spacesEndpoint) || empty($spacesURIRegion) || empty($spacesURL) || empty($spacesRootFolder) || empty($baseFileURL) || empty($captchaSite) || empty($captchaSecret)) {
            $error = 3;
            header("Location: ../../../admin/web?type=empty&error=$error");
            exit();
        }

        if ($userLevel != 'admin') {
            $error = 4;
            header("Location: ../../../admin/web?type=adminLevel&error=$error");
            exit();
        }
        
        if ($error === 0) {
            $settings = new Settings;
            $updateWebsite = $settings->updateWebsite($siteURL, $websiteName, $siteDescription, $siteKeywords, $timeZone, $supportEmail, $spacesKey, $spacesSecert, $spacesBucket, $spacesRegion, $spacesEndpoint, $spacesURIRegion, $spacesURL, $spacesRootFolder, $baseFileURL, $captchaSite, $captchaSecret);
            
            if ($updateWebsite === "false") {
                $error = 5;
                header("Location: ../../../admin/web?type=database&error=$error");
                exit();
            } elseif ($updateWebsite === "true") {
                header("Location: ../../../admin/web?type=sucessfulWebsite");
                exit();
            }
        }
    }