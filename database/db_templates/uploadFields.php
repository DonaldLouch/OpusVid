<?php

$uniqeID = uniqid();

$uploadID = mysqli_real_escape_string($mySQL, $uniqeID);
$uploadTitle = mysqli_real_escape_string($mySQL, $_POST['vTitle']);
$uploadOC = mysqli_real_escape_string($mySQL, $_SESSION['uName']);
$uploadDate = mysqli_real_escape_string($mySQL, time());
$uploadSDescription = mysqli_real_escape_string($mySQL, nl2br($_POST['sDescription']));
$uploadDescription =   mysqli_real_escape_string($mySQL, nl2br($_POST['description']));
$uploadCategory = mysqli_real_escape_string($mySQL, $_POST['category']);
$uploadTags = mysqli_real_escape_string($mySQL, nl2br($_POST['tags']));
$uploadMusicCredit = mysqli_real_escape_string($mySQL, nl2br($_POST['musicCredit']));
$uploadFilmedBy = mysqli_real_escape_string($mySQL, $_POST['filmedBy']);
$uploadFilmedWith = mysqli_real_escape_string($mySQL, $_POST['filmedWith']);
$uploadFilmedAt = mysqli_real_escape_string($mySQL, $_POST['filmedAt']);
$uploadFilmedOn = mysqli_real_escape_string($mySQL, $_POST['filmedOn']);
$uploadAudioBy = mysqli_real_escape_string($mySQL, $_POST['audioBy']);
$uploadAudioWith = mysqli_real_escape_string($mySQL, $_POST['audioWith']);
$uploadEditedBy = mysqli_real_escape_string($mySQL, $_POST['editedBy']);
$uploadEditedOn = mysqli_real_escape_string($mySQL, $_POST['editedOn']);
$uploadStaring = mysqli_real_escape_string($mySQL, nl2br($_POST['staring']));
$uploadPrivacy = mysqli_real_escape_string($mySQL, $_POST['privacy']);

$email = mysqli_real_escape_string($mySQL, $_SESSION['uEmail']);

$urlContent = "&title=".$uploadTitle."&sd=".$uploadSDescription."&d=".$uploadDescription."&tags=".$uploadTags."&m-credit=".$uploadMusicCredit."&fby=".$uploadFilmedBy."&fwith=".$uploadFilmedWith."&fat=".$uploadFilmedAt."&fon=".$uploadFilmedOn."&aby=".$uploadAudioBy."&awith=".$uploadAudioWith."&eby=".$uploadEditedBy."&eon=".$uploadEditedOn."&staring=".$uploadStaring."";
