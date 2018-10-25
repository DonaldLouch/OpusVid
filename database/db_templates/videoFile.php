<?php
$video = $_FILES['videoFile'];

$videoName = $_FILES['videoFile']['name']; //Takes the file name
$videoTemp = $_FILES['videoFile']['tmp_name']; //Takes the temp name of the file
$videoSize = $_FILES['videoFile']['size']; //Takes the file size
$videoError = $_FILES['videoFile']['error']; //Takes the file error status
$videoType = $_FILES['videoFile']['type']; //Takes the file types

$videoExplode = explode('.', $videoName); //Explodes the file name (name . extention)
$videoExtention = strtolower(end($videoExplode)); //Changes the file extention into a lowercase name

//$videoExtAllow = array('mp4', 'mkv'); //Allow the following extentions m4v, webm, 

$videoNewName = $uniqeID.".".$videoExtention;

$videoDestination = 'https://opusvid.sfo2.cdn.digitaloceanspaces.com/videos/'.$videoNewName;
