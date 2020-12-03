<?php
  /* comments.database.php | Version 1.0
    By: DevLexicon
    User Level Required: anyone | admin | mod
    
    This file will submit users comments and delete comments.
    
    File used in:
    # player?id=*
    # admin/comment
    # mod/comment
  */
  
  // Turn on error reporting:
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if (isset($_POST['deleteComment'])) {
        require '../../models/config/config.php';
        $error = 0;
        
        $videoID = $_POST['videoID'];
        $commentID = $_POST['commentID'];
        $commenterID = $_POST['commenterID'];
        
        include_once '../../models/classes/Comments.class.php';
        $commentClass = new Comments;

        $comment = $commentClass->theComment($commentID);

        if ($comment['videoID'] != $videoID) {
            $error = 1;
            header("Location: ../../../player?id=$videoID&type=randomError&error=$error");
            exit(); 
        }

        else if ($comment['commentID'] != $commentID) {
            $error = 2;
            header("Location: ../../../player?id=$videoID&type=randomError&error=$error");
            exit(); 
        }
        
        else if ($comment['commenterID'] != $commenterID) {
            $error = 3;
            header("Location: ../../../player?id=$videoID&type=randomError&error=$error");
            exit(); 
        }

        if ($error == 0) {
            $commentClass->deleteComment($commentID);
            $commentClass->removeCommentCount($videoID);
            
            header("Location: ../../../player?id=$videoID&type=removedComment");
        }
    }

    if (isset($_POST['newComment'])) {
        require '../../models/config/config.php';

        $videoID = $_POST['videoID'];
        
        if (!isset($_SESSION['userName'])) {
            $error = 1;
            header("Location: ../../../player?id=$videoID&type=login&error=$error");
            exit(); 
        } else {
            $commenterName = $_POST['commenterName'];
            $commenterID = $_POST['commenterID'];
        }

        $commentBody = $_POST['comment'];

        $currentTime = time();

        $error = 0;
    
        include_once '../../models/classes/MySQL.class.php';
        include_once '../../models/classes/Video.class.php';
        include_once '../../models/classes/Users.class.php';
        include_once '../../models/classes/ReCAPTCHA.class.php';
   
        if (isset($_POST['g-recaptcha-response'])) {
            $reCAPTCHA = new ReCAPTCHA;
            
            $capSecretKey = $reCAPTCHA->captchaSecretKey();
            $recaptchaResponse = $_POST['g-recaptcha-response'];
            
            $recaptchaURL = 'https://www.google.com/recaptcha/api/siteverify';
            
            $recaptcha = file_get_contents($recaptchaURL . '?secret=' . $capSecretKey . '&response=' . $recaptchaResponse);
            $recaptcha = json_decode($recaptcha);
            
            if (!isset($recaptchaResponse)) {
                $error = 2;
                header("Location: ../../../player?id=$videoID&type=captcha&error=$error");
                exit(); 
            }
            elseif ($recaptcha->score < 0.5) {
                $error = 3;
                header("Location: ../../../player?id=$videoID&type=captcha&error=$error");
                exit();
            }
        } 

        if (empty($videoID) || empty($commentBody)) {
            $error = 4;
            header("Location: ../../../player?id=$videoID&type=captcha&error=$error");
            exit(); 
        }

        if ($error == 0) {
            $videoClass = new Video;

            $newComment = $videoClass->newComment($videoID, $commenterID, $commenterName, $commentBody, $currentTime);

            if ($newComment == "false") {
                $error = 5;
                header("Location: ../../../player?id=$videoID&type=database&error=$error");
                exit(); 
            } else {
                $commentUpdate = $videoClass->updateCommentCount($videoID);
                
                $playerID = $videoID;
                $player = $videoClass->playerPage($playerID);
                $videoTitle = $player['videoTitle'];
                $opusCreator = $player['opusCreator'];

                $creator = $videoClass->opusCreator($opusCreator);
                $opusCreatorEmail = $creator['userEmail'];

                require '../email/newComment.email.php';
                if (!mail($opusCreatorEmail, $subject, $message, implode("\n", $headers))) {
                    $error = 6;
                    header("Location: ../../../player?id=$videoID&type=sendEmail&error=$error");
                    exit();
                } #UploadEmail
                header("Location: ../../../player?id=$videoID"); #Done! 
            }
        }
    }