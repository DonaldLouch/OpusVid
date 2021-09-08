<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  require '../../models/config/config.php';
  include_once '../../models/classes/MySQL.class.php';
  include_once '../../models/classes/Video.class.php';

  $uploadID = uniqid();
  setcookie("currentUploadID", "", time() - 3600); //REST COOKIE
  setcookie('currentUploadID', $uploadID, time() + (86400 * 1), "/"); //Expires in 1 

  function verbose($ok=1,$info="") {
    if ($ok==0) { 
     http_response_code(400);
    }
    die(json_encode(["ok"=>$ok, "info"=>$info]));
  } // function verbose

  if (empty($_FILES) || $_FILES['file']['error']) {
    verbose(0, "Failed to move uploaded file.");
  }

  $videoName = $_FILES['file']['name'];

  $videoExplode = explode('.', $_FILES["file"]["name"]);
  $videoExtention = strtolower(end($videoExplode));
  $videoNewName = $uploadID.".mp4";
  $directory = "../../storage/videos";

  $fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : $_FILES["file"]["name"];
  $filePath = $directory . "/" . $fileName;
  $filePathNew = $directory . "/" . $videoNewName;

  $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
  $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
  $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");

  if ($out) {
    $in = @fopen($_FILES['file']['tmp_name'], "rb");
    if ($in) {
      while ($buff = fread($in, 4096)) { 
        fwrite($out, $buff); 
      }
    } else {
      verbose(0, "Failed to open input stream");
    }
    @fclose($in);
    @fclose($out);
    @unlink($_FILES['file']['tmp_name']);
  } else {
    verbose(0, "Failed to open output stream");
  }
  
  if (!$chunks || $chunk == $chunks - 1) {
    rename("{$filePath}.part", $filePathNew);
    $uploadOC = $_SESSION['userName'];
    $uploadDate = time();
    $uploadPrivacy = "private";
    $views = 0;
    $thumbPath = "../../storage/thumbnails/".$uploadID.".jpg";

    $videoClass = new Video();
    $uploadStep1 = $videoClass->videoUpload($uploadID, $filePathNew, $uploadOC, $uploadDate, $uploadPrivacy, $thumbPath, $views); 
    //rename($filePath, $filePathNew);
  }
  
  verbose(1, "Upload OK");