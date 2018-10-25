<?php
$thumb = $_FILES['thumbnailFile'];

$thumbName = $_FILES['thumbnailFile']['name']; //Takes the file name
$thumbTemp = $_FILES['thumbnailFile']['tmp_name']; //Takes the temp name of the file
$thumbSize = $_FILES['thumbnailFile']['size']; //Takes the file size
$thumbError = $_FILES['thumbnailFile']['error']; //Takes the file error status
$thumbType = $_FILES['thumbnailFile']['type']; //Takes the file types

$thumbExplode = explode('.', $thumbName); //Explodes the file name (name . extention)
$thumbExtention = strtolower(end($thumbExplode)); //Changes the file extention into a lowercase name

$thumbExtAllow = array('jpg', 'jpeg', 'png', 'pdf'); //Allow the following extentions

$thumbNewName = $uniqeID.".".$thumbExtention;

$thumbDestination = 'https://opusvid.sfo2.cdn.digitaloceanspaces.com/thumbnails/'.$thumbNewName;
