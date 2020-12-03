<?php 
    // Turn on error reporting:
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        
    require '../../../models/config/config.php'; 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="description" content="<?php echo $siteDescription; ?>">
        <meta name="keywords" content="<?php echo $siteKeywords; ?>">
        <meta name="author" content="<?php echo $websiteName; ?>">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        
        <link rel="stylesheet" href="../views/css/reset.css">
        <link rel="stylesheet" href="../views/css/stylesheet.css">
        
        <title><?php echo $websiteName; ?></title>

        <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $reCAPTCHAPublic; ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>

        <link rel="apple-touch-icon" sizes="180x180" href="../storage/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../storage/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="194x194" href="../storage/favicon/favicon-194x194.png">
        <link rel="icon" type="image/png" sizes="192x192" href="../storage/favicon/android-chrome-192x192.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../storage/favicon/favicon-16x16.png">
        <link rel="manifest" href="../storage/favicon/site.webmanifest">
        <link rel="mask-icon" href="../storage/favicon/safari-pinned-tab.svg" color="#430c8c">
        <link rel="shortcut icon" href="../storage/favicon/favicon.ico">
        <meta name="apple-mobile-web-app-title" content="<?php echo $websiteName; ?>">
        <meta name="application-name" content="<?php echo $websiteName; ?>">
        <meta name="msapplication-TileColor" content="#603cba">
        <meta name="msapplication-TileImage" content="../storage/favicon/mstile-144x144.png">
        <meta name="msapplication-config" content="../storage/favicon/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">
    </head>