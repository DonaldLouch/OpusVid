<?php
include 'db_connect.php';

$playerID = $_GET['id'];

$newView = "UPDATE videos SET views = views + 1 WHERE id = '" . mysqli_escape_string($mySQL,$playerID) . "'";
$addView = mysqli_query($mySQL, $newView);
