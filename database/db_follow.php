<?php
/* db_follow.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is the follow function!

  Blades Inlcluded:
    #db_connect: To connect to Database
    #db_templates/follow: Gets the follow function

  File used in:
    #../../profile?id=*
*/

session_start();
require 'db_connect.php';
require 'db_templates/follow.php';

 if (isset($_POST['follow'])) {
  include 'db_connect.php';
  include 'db_templates/follow.php';

  if (mysqli_num_rows($querryStart) === 0) {
    $sqlFollowInsert = "INSERT INTO following (follower_id, following_id) VALUES ('$follower', '$following')";
    $queryInsertFollower = mysqli_query($mySQL, $sqlFollowInsert);
    header("Location: " . $_SERVER["HTTP_REFERER"]);
  } else {
  if (in_array($following, $followExpload)){
    header("Location: " . $_SERVER["HTTP_REFERER"]);
  } else {
    $newFollowing = $followIDFollowing." / ".$following;
    $updateFollow = "UPDATE following SET following_id = '$newFollowing' WHERE follower_id = '$follower'";
    if (mysqli_query($mySQL, $updateFollow)){
      header("Location: " . $_SERVER["HTTP_REFERER"]);
    } else {
      echo "<br>Error Occured.";
    }
  }
}
}

if (isset($_POST["unfollow"])){
  $followText = "/ ".$following;
  $unfollow = trim($followIDFollowing, $followText);
  $updateUnfollow = "UPDATE following SET following_id = '$unfollow' WHERE follower_id = '$follower'";
  if (mysqli_query($mySQL, $updateUnfollow)){
    header("Location: " . $_SERVER["HTTP_REFERER"]);
  } else {
    echo "<br>Error Occured.";
  }
}
