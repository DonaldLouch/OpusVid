<?php
  include 'db_connect.php';

  //Find out how many items are in the videos table
  $countSQL = "SELECT COUNT(order_number) FROM videos WHERE privacy='public'";
  $query = mysqli_query($mySQL, $countSQL);
  $row = mysqli_fetch_row($query);
  $rows = $row[0];

  //Number of items to display per page
  $per_page = 16;

  include '../../page-templates/pagination_init.php';

  $sql = "SELECT * FROM videos WHERE privacy='public' ORDER BY order_number DESC $limit";
  $query = mysqli_query($mySQL, $sql);

  include '../../page-templates/pagination_control.php';

  $players = array();
  if (mysqli_num_rows($query) > 0) {
    while ($player = mysqli_fetch_assoc($query)) {
      $players[] = $player;
    }
  }

  //Close your database connection
  mysqli_close($mySQL);
