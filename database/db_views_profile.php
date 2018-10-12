<?php
include 'db_connect.php';

$profileID = $_GET['id'];

$newView = "UPDATE users SET views = views + 1 WHERE username = '" . mysqli_escape_string($mySQL,$profileID) . "'";
$addView = mysqli_query($mySQL, $newView);
