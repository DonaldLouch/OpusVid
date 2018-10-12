<?php
include 'db_connect.php';

$search = mysqli_real_escape_string($mySQL, $_POST['search']);
$searchSQL = "SELECT * FROM videos WHERE video_title LIKE '%$search%' OR opus_creator LIKE '%$search%' OR short_description LIKE '%$search%' OR description LIKE '%$search%' OR category LIKE '%$search%' OR tags LIKE '%$search%' OR music_credit LIKE '%$search%' OR filmed_at LIKE '%$search%' OR filmed_on LIKE '%$search%' OR filmed_by LIKE '%$search%' OR audio_by LIKE '%$search%' OR audio_with LIKE '%$search%' OR edited_by LIKE '%$search%' OR edited_on LIKE '%$search%' OR staring LIKE '%$search%' ORDER BY order_number DESC";
$result = mysqli_query($mySQL, $searchSQL);
$queryResult = mysqli_num_rows($result);

$searchUserSQL = "SELECT * FROM users WHERE username LIKE '%$search%' OR account_tags LIKE '%$search%' OR country LIKE '%$search%' OR description LIKE '%$search%'";
$resultUser = mysqli_query($mySQL, $searchUserSQL);
$queryResultUser = mysqli_num_rows($resultUser);

$players = array();
if (mysqli_num_rows($result) > 0) {
  while ($player = mysqli_fetch_assoc($result)) {
    $players[] = $player;
  }
}

$profiles = array();
if (mysqli_num_rows($resultUser) > 0) {
  while ($profile = mysqli_fetch_assoc($resultUser)) {
    $profiles[] = $profile;
  }
}
