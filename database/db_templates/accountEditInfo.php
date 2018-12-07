<?php

$accountName = mysqli_real_escape_string($mySQL, $_POST['accountID']);
$accountFirst = mysqli_real_escape_string($mySQL, $_POST['signupFirstName']);
$accountLast = mysqli_real_escape_string($mySQL, $_POST['signupLastName']);
$accountEmail = mysqli_real_escape_string($mySQL, $_POST['editEmail']);
$accountPassword = mysqli_real_escape_string($mySQL, $_POST['editPassword']);
$hashedPassword = password_hash($accountPassword, PASSWORD_DEFAULT);
$accountCountry = mysqli_real_escape_string($mySQL, $_POST['country']);
$accountDescription = nl2br($_POST['description']);
$accountTags = mysqli_real_escape_string($mySQL, $_POST['tags']);
$accountLevel = mysqli_real_escape_string($mySQL, $_POST['userlevel']);
