<?php

if (isset($_SESSION['uID'])) {
  include 'db_connect.php';

  //Find out how many items are in the videos table
  $countSQL = "SELECT COUNT(order_number) FROM videos WHERE privacy='public'";
  $query = mysqli_query($mySQL, $countSQL);
  $row = mysqli_fetch_row($query);
  $rows = $row[0];

  //Number of items to display per page
  $per_page = 16;

  include '../../page-templates/pagination_init.php';

  $userID = $_SESSION['uID'];
  $searchSQL = "SELECT * FROM following WHERE follower_id = '$userID'";
  $searchResult = mysqli_query($mySQL, $searchSQL);
  $searchRow = mysqli_fetch_assoc($searchResult);

  $explode = explode(" / ", $searchRow['following_id']);

  $usersIDFollowing = implode(" OR id =",$explode);

  $followSQL = "SELECT username FROM users WHERE id=$usersIDFollowing";
  $followResults = mysqli_query($mySQL, $followSQL);
  $users = mysqli_fetch_all($followResults);

  $usernameImplose = implode("' OR opus_creator = '", array_column($users, 0));

  $videoSelect = "SELECT * FROM videos WHERE opus_creator = '$usernameImplose' AND privacy='public' ORDER BY order_number DESC $limit";
  $videoResults = mysqli_query($mySQL, $videoSelect);

  include '../../page-templates/pagination_control.php';

  $players = array();
  if (mysqli_num_rows($videoResults) > 0) {
    while ($player = mysqli_fetch_assoc($videoResults)) {
      $players[] = $player;
    }
  }

} else {
  header("Location: home");
}
