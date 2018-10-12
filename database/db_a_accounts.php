<?php
include 'db_connect.php';

//Find out how many items are in the videos table
$countSQL = "SELECT COUNT(id) FROM users";
$query = mysqli_query($mySQL, $countSQL);
$row = mysqli_fetch_row($query);
$rows = $row[0];

//Number of items to display per page
$per_page = 10;

include '../../page-templates/pagination_init.php';

$searchUserSQL = "SELECT * FROM users ORDER BY id DESC $limit";
$resultUser = mysqli_query($mySQL, $searchUserSQL);
$queryResultUser = mysqli_num_rows($resultUser);

include '../../page-templates/pagination_control.php';

$profiles = array();
if (mysqli_num_rows($resultUser) > 0) {
  while ($profile = mysqli_fetch_assoc($resultUser)) {
    $profiles[] = $profile;
  }
}
