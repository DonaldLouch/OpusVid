<?php
/* videoDelete.database.php | Version 1.0
  By: DevLexicon
  User Level Required: anyone | admin | mod

  The file is used to delete videos upon clicking the delete button.

  File used in:
    #dashboard/manage
    #admin/videos
    #mod/videos
*/

// Turn on error reporting:
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
        require '../../models/config/config.php';
        $error = 0;
        
        $playerID = $_POST['id'];
        $videoPath = $_POST['videoPath'];
        $thumbnailPath = $_POST['thumbPath'];
        
        include_once '../../models/classes/Video.class.php';
        $videoClass = new Video;

        $player = $videoClass->playerPage($playerID);

        if ($player['id'] != $playerID) {
            $error = 1;
            header("Location: ../../../dashboard/manage?type=randomError&error=$error");
            exit(); 
        }

        elseif ($player['videoPath'] != $videoPath) {
            $error = 2;
            header("Location: ../../../dashboard/manage?type=randomError&error=$error");
            exit(); 
        }
        
        elseif ($player['thumbnailPath'] != $thumbnailPath) {
            $error = 3;
            header("Location: ../../../dashboard/manage?type=randomError&error=$error");
            exit(); 
        }

        if ($error == 0) {
            $videoClass->deleteVideo($playerID);

            unlink($videoPath);
            unlink($thumbnailPath);
            
            header("Location: ../../../dashboard/manage?type=successVidDeleted");
    }