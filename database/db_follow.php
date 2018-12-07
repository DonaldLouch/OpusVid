<?php
/* db_follow.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is the follow function!

  Blades Included:
    #db_connect: To connect to Database
    #db_templates/follow: Gets the follow function

  File used in:
    #../../profile?id=*
*/

session_start(); //Starts user session so that it can attach a user to teh following
require 'db_connect.php'; //Connects to the database
require 'db_templates/follow.php'; //Collects all the follower and following information

 if (isset($_POST['follow'])) { //If "Follow" form has been submitted #Follow
  include 'db_connect.php';
  include 'db_templates/follow.php';

  if (mysqli_num_rows($querryStart) === 0) { //If user doesn't have the following database setup #InitFollow
    $sqlFollowInsert = "INSERT INTO following (follower_id, following_id) VALUES ('$follower', '$following')";
    $queryInsertFollower = mysqli_query($mySQL, $sqlFollowInsert); //Adds user to database
    header("Location: " . $_SERVER["HTTP_REFERER"]);
  } //End: InitFollow
  else { //Database already created #DatabaseCreated
  if (in_array($following, $followExpload)){ //If already following redirect #AlreadyFollow
    header("Location: " . $_SERVER["HTTP_REFERER"]);
  } //End: AlreadyFollow
  else { //Adds following id to the followers database #Add
    $newFollowing = $followIDFollowing." / ".$following; //Gets the current list of user they follow then adds the new id to the list
    $updateFollow = "UPDATE following SET following_id = '$newFollowing' WHERE follower_id = '$follower'";
    if (mysqli_query($mySQL, $updateFollow)){ //If following was successful then redirect user #Followed
      header("Location: " . $_SERVER["HTTP_REFERER"]);
    } //End: Followed
    else { //Error #Error
      echo "<br>Error Occurred.";
    } //End: Error
  } //End: Add
} //End: DatabaseCreated
} //End: Follow

if (isset($_POST["unfollow"])){ //If "Unfollow" form has been submitted #Unfollow
  $followText = "/ ".$following;
  $unfollow = trim($followIDFollowing, $followText); //Removes the users id from the following list when a user unfollows a user
  $updateUnfollow = "UPDATE following SET following_id = '$unfollow' WHERE follower_id = '$follower'";
  if (mysqli_query($mySQL, $updateUnfollow)){ //If unfollowing was successful then redirect user #Unfollowed
    header("Location: " . $_SERVER["HTTP_REFERER"]);
  } //End: Unfollowed
  else { //Error #Error
    echo "<br>Error Occurred.";
  } //End: Error
} //End: Unfollow
