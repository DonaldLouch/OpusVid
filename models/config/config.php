<?php

 if (substr_count($_SERVER["REQUEST_URI"] , "/") == 3) {
      require '../../models/classes/MySQL.class.php';
      require '../../models/classes/Settings.class.php';
      $setting = new Settings;
      require '../../models/config/website.config.php';
      require '../../models/config/css.config.php';
   } else {
      require '../../../models/classLoader.php';
      $setting = new Settings;
      require '../../../models/config/website.config.php';
      require '../../../models/config/css.config.php';
   }
   
    $reCAPTCHAPublic = $captchaSite;

    session_start();
    date_default_timezone_set ($timeZone);
    
    if (isset($_SESSION['uID'])) {
        $userID = $_SESSION['uID'];
    }
    if (isset($_SESSION['uFirst'])) {
        $userFirst = $_SESSION['uFirst'];
    }
    if (isset($_SESSION['uLast'])) {
        $userLast = $_SESSION['uLast'];
    }
    if (isset($_SESSION['userName'])) {
        $userName = $_SESSION['userName'];
    }
    if (isset($_SESSION['uEmail'])) {
        $userEmail = $_SESSION['uEmail'];
    }
    if (isset($_SESSION['uLevel'])) {
        $userLevel = $_SESSION['uLevel'];
    }
    if (isset($_SESSION['uAvatar'])) {
        $avatar = $_SESSION['uAvatar'];
    }
    if (isset($_SESSION['uCountry'])) {
        $country = $_SESSION['uCountry'];
    }
    if (isset($_SESSION['uTimeZone'])) {
        $userTimeZone = $_SESSION['uTimeZone'];
    }