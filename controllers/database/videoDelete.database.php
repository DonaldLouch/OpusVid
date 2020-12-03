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
        //randomError  successVidDeleted

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

            $videoPathExplode = explode("/", $videoPath);
            $thumbPathExplode = explode("/", $thumbnailPath);
            
            $videoPath = $videoPathExplode[3]."/".$videoPathExplode[4]."/".$videoPathExplode[5];
            $thumbPath = $thumbPathExplode[3]."/".$thumbPathExplode[4]."/".$thumbPathExplode[5];
            
            include_once '../../do_spaces/spaces_config.php';
	
            $spaces->deleteObject([
                'Bucket' => $spacesBucket,
                'Key' => $videoPath
            ]);
            
            $spaces->deleteObject([
                'Bucket' => $spacesBucket,
                'Key' => $thumbPath
            ]);
            
            header("Location: ../../../dashboard/manage?type=successVidDeleted");
    }