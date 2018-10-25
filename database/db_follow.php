<?php

session_start();
include 'db_connect.php';
include 'db_templates/follow.php';

 if (isset($_POST['follow'])) {
  include 'db_connect.php';
  include 'db_templates/follow.php';

  /*$follower = $_SESSION['uID'];
  $following = $_POST['followID'];

  $followingSQL = "SELECT following_id FROM following WHERE follower_id = '" . mysqli_escape_string($mySQL, $follower) . "';";
  $followResult = mysqli_query($mySQL, $followingSQL);
  $followRow = mysqli_fetch_assoc($followResult);

  $followExpload = explode(" / ", $followRow['following_id']);

  $followIDFollowing = implode(" / ",$followExpload);
*/

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

  /*if (!$followResultCheck < 1) {
    //header("Location: " . $_SERVER["HTTP_REFERER"]);
  } else {
    $followSQL = "INSERT INTO following (follower_id, following_id) VALUES ('$follower', '$following');";
    $followResult = mysqli_query($mySQL, $followSQL);

    //header("Location: " . $_SERVER["HTTP_REFERER"]);
  }
}

if (isset($_POST['unfollow'])) {
  include 'db_connect.php';

  $follower = $_SESSION['uID'];
  $following = $_POST['followID'];

  $unfollowSQL = "DELETE following_id FROM following WHERE follower_id='$follower';";
  $unfollowResult = mysqli_query($mySQL, $unfollowSQL);
  header("Location: " . $_SERVER["HTTP_REFERER"]."&unfollowed=true");
} else {
  header("Location: " . $_SERVER["HTTP_REFERER"]."&unfollowed=failed");
*/
//}
