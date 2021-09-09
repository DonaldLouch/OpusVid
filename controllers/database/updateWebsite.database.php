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
        $customEmail = $_POST['7'];
        $baseFileURL = $_POST['9'];
        $uploadBaseURL = $_POST['10'];
        $maxSizeVideo = $_POST['11'];
        $maxSizeThumbnail = $_POST['12'];
        $maxSizeAvatar = $_POST['13'];
        $captchaSite = $_POST['14'];
        $captchaSecret = $_POST['15'];
        
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

        if (empty($siteURL) || empty($websiteName) || empty($siteDescription) || empty($siteKeywords) || empty($timeZone) || empty($supportEmail) || empty($customEmail) || empty($baseFileURL) || empty($uploadBaseURL) || empty($maxSizeVideo) || empty($maxSizeThumbnail) || empty($maxSizeAvatar) || empty($captchaSite) || empty($captchaSecret)) {
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
            $updateWebsite = $settings->updateWebsite($siteURL, $websiteName, $siteDescription, $siteKeywords, $timeZone, $supportEmail, $customEmail, $baseFileURL, $uploadBaseURL, $maxSizeVideo, $maxSizeThumbnail, $maxSizeAvatar, $captchaSite, $captchaSecret);
            
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