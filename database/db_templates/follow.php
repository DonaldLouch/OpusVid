<?php

$follower = $_SESSION['uID'];
$following = $_POST['followID'];

$followingSQL = "SELECT following_id FROM following WHERE follower_id = '" . mysqli_escape_string($mySQL, $follower) . "';";
$followResult = mysqli_query($mySQL, $followingSQL);
$followRow = mysqli_fetch_assoc($followResult);

$followExpload = explode(" / ", $followRow['following_id']);

$followIDFollowing = implode(" / ",$followExpload);
