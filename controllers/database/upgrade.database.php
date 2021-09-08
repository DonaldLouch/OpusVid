<?php 

echo "<h3>This is meant only for upgrading your database for OpusVid CV1.0B1 to the latest version CV1.0B2. Note that it is highly recommended to backup a copy of current database before proceeding.</h3><p>This will update the following tables: styles, settings, videos, and users. Along with deleting collections, following, mail, and watch_later. Furthermore, adding a new table of category.</p><p>If there is no error's below then you should have updated your database successfully! If there is an error, please manually drop your database tables and reupload your backup and try refreshing this page and try again. If you remain to have issues please don't hesitate to contact us at <a href=\"mailto:support@devlexicon.ca\">support@devlexicon.ca</a> and we'll be happy to help (just make sure to copy and paste the below error for an easier time for help). Note that you may still want to go into each video or recomend that your Opus Creators go in, and properly format the Music Credit sections on the videos.</p><hr><p>If there are no error below than the extra tables should've deleted, the categories table should be added, and the settings, styles, videos, and users tables should be updated.</p>";

// Turn on error reporting:
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    require '../../models/config/config.php';
    
    include_once '../../models/classes/MySQL.class.php';
    include_once '../../models/classes/Upgrade.class.php';

    $upgradeClass = new Upgrade;
    $removeTable = $upgradeClass->removeTables();
    $upgradeSettings = $upgradeClass->upgradeSettings();
    $upgradeStyles = $upgradeClass->upgradeStyles();
    $addCategory = $upgradeClass->addCategory();
    $upgradeVideo = $upgradeClass->upgradeVideos();
    $upgradeLinks = $upgradeClass->upgradeLinks();