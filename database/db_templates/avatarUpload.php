<?php
$avatar = $_FILES['avatarFile'];

$avatarName = $_FILES['avatarFile']['name']; //Takes the file name
$avatarTemp = $_FILES['avatarFile']['tmp_name']; //Takes the temp name of the file
$avatarSize = $_FILES['avatarFile']['size']; //Takes the file size
$avatarError = $_FILES['avatarFile']['error']; //Takes the file error status
$avatarType = $_FILES['avatarFile']['type']; //Takes the file types

$avatarExplode = explode('.', $avatarName); //Explodes the file name (name . extention)
$avatarExtention = strtolower(end($avatarExplode)); //Changes the file extention into a lowercase name

$avatarExtAllow = array('jpg', 'jpeg', 'png', 'pdf'); //Allow the following extentions

$avatarNewName = $accountName.".".$avatarExtention;

$avatarDestination = 'https://opusvid.sfo2.cdn.digitaloceanspaces.com/avatars/'.$avatarNewName;
