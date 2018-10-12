<?php

session_start();

if (isset($_POST['follow'])) {
  include 'db_connect.php';

  $follower = $_SESSION['uID'];
  $following = $_POST['followID'];

  $followingSQL = "SELECT * FROM following WHERE follower_id='$follower' AND following_id='$following'";
  $followResult = mysqli_query($mySQL, $followingSQL);
  $followResultCheck = mysqli_num_rows($followResult);

  if (!$followResultCheck < 1) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
  } else {
    $followSQL = "INSERT INTO following (follower_id, following_id) VALUES ('$follower', '$following');";
    $followResult = mysqli_query($mySQL, $followSQL);

    header("Location: " . $_SERVER["HTTP_REFERER"]);
  }
}

if (isset($_POST['unfollow'])) {
  include 'db_connect.php';

  $follower = $_SESSION['uID'];
  $following = $_POST['followID'];

  $unfollowSQL = "DELETE FROM following WHERE follower_id='$follower'";
  $unfollowResult = mysqli_query($mySQL, $unfollowSQL);
  header("Location: " . $_SERVER["HTTP_REFERER"]."&unfollowed=true");
} else {
  header("Location: " . $_SERVER["HTTP_REFERER"]."&unfollowed=failed");
}
