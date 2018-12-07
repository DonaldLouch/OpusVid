<?php
/* db_vid_feed.php | Version 1.0
  By: OpusVid
  User Level Required: 0+
  
  The file is to get all public videos and display their information

  Blades Included:
    #db_connect: To connect to Database
    #pagination_init: Initiate the pagination
    #pagination_control: Controls the control of the pagination
    #db_templates/foreach_player.php: Adds the information for a "foreach" loop

  File used in:
    #home -> index
*/

  require 'db_connect.php';

  $logUser = $_SESSION['uID'];

  //Find out how many items are in the videos table
  $countSQL = "SELECT COUNT(order_number) FROM videos WHERE privacy='public'";
  $query = mysqli_query($mySQL, $countSQL);
  $row = mysqli_fetch_row($query);
  $rows = $row[0];

  //Number of items to display per page
  $per_page = 16;

  include '../../page-templates/pagination_init.php';

  $sql = "SELECT * FROM videos WHERE privacy='public' ORDER BY order_number DESC $limit";
  $resultPlayer = mysqli_query($mySQL, $sql);

  include '../../page-templates/pagination_control.php';

  include 'db_templates/foreach_player.php';

  //Close your database connection
  mysqli_close($mySQL);
