<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    require '../../blades/head.php';
    
    if (!isset($userID)) {
        echo '<script> location.replace("../login"); </script>';
        exit();
    } else {}