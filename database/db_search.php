<?php
/* db_search.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is to search for videos, collections, and profiles

  Blades Inlcluded:
    #db_connect: To connect to Database
    #db_templates/foreach_player.php: Adds the information for a "foreach" loop
    #db_templates/foreach_profile.php: Adds the information for a "foreach" loop

  File used in:
    #search
*/

require 'db_connect.php';

$search = mysqli_real_escape_string($mySQL, $_POST['search']);
$searchSQL = "SELECT * FROM videos WHERE video_title LIKE '%$search%' OR opus_creator LIKE '%$search%' OR short_description LIKE '%$search%' OR description LIKE '%$search%' OR category LIKE '%$search%' OR tags LIKE '%$search%' OR music_credit LIKE '%$search%' OR filmed_at LIKE '%$search%' OR filmed_on LIKE '%$search%' OR filmed_by LIKE '%$search%' OR audio_by LIKE '%$search%' OR audio_with LIKE '%$search%' OR edited_by LIKE '%$search%' OR edited_on LIKE '%$search%' OR staring LIKE '%$search%' ORDER BY order_number DESC";
$resultPlayer = mysqli_query($mySQL, $searchSQL);
$queryResult = mysqli_num_rows($resultPlayer);

$searchCollectionsSQL = "SELECT * FROM collections WHERE opus_creator LIKE '%$search%' OR collection_title LIKE '%$search%' OR short_description LIKE '%$search%' OR description LIKE '%$search%' OR category LIKE '%$search%' OR tags LIKE '%$search%' ORDER BY order_id DESC";
$resultCollections = mysqli_query($mySQL, $searchCollectionsSQL);
$queryCollections = mysqli_num_rows($resultCollections);

$collections = array();
if (mysqli_num_rows($resultCollections) > 0) {
  while ($collection = mysqli_fetch_assoc($resultCollections)) {
    $collections[] = $collection;
  }
}

$searchUserSQL = "SELECT * FROM users WHERE username LIKE '%$search%' OR account_tags LIKE '%$search%' OR country LIKE '%$search%' OR description LIKE '%$search%'";
$resultUser = mysqli_query($mySQL, $searchUserSQL);
$queryResultUser = mysqli_num_rows($resultUser);

include 'db_templates/foreach_player.php';

include 'db_templates/foreach_profile.php';
