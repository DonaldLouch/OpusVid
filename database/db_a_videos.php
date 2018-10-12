<?php
  include 'db_connect.php';

  //Find out how many items are in the videos table
  $countSQL = "SELECT COUNT(order_number) FROM videos";
  $query = mysqli_query($mySQL, $countSQL);
  $row = mysqli_fetch_row($query);
  $rows = $row[0];

  //Number of items to display per page
  $per_page = 10;

  include '../../page-templates/pagination_init.php';

  $videoSQL = "SELECT * FROM videos ORDER BY order_number DESC $limit";
  $resultPlayer = mysqli_query($mySQL, $videoSQL);

  include '../../page-templates/pagination_control.php';

  $videos = array();
  if (mysqli_num_rows($resultPlayer) > 0) {
    while ($video = mysqli_fetch_assoc($resultPlayer)) {
      $videos[] = $video;
    }

}
