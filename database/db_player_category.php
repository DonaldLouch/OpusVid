<?php
/* db_player_category.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  This file is used to display all the videos that are in a category.

  Blades Inlcluded:
    #db_connect: To connect to Database
    #pagination_init: Initate the pagination
    #pagination_control: Controls the control of the pagination
    #db_templates/foreach_player.php: Adds the information for a "foreach" loop

  File used in:
    #category?type=*
*/

  require 'db_connect.php';

  //Gets the video ID
  $playerID = $_GET['type'];

  //Find out how many items are in the videos table
  $countSQL = "SELECT COUNT(order_number) FROM videos WHERE privacy='public' AND category = '$playerID'";
  $query = mysqli_query($mySQL, $countSQL);
  $row = mysqli_fetch_row($query);
  $rows = $row[0];

  //Number of items to display per page
  $per_page = 8;

  include '../../page-templates/pagination_init.php';

  $playerSQL = "SELECT * FROM videos WHERE privacy = 'public' AND category = '$playerID' ORDER BY order_number DESC $limit";
  $resultPlayer = mysqli_query($mySQL, $playerSQL);

  $queryResultPlayer = mysqli_num_rows($resultPlayer);

  include '../../page-templates/pagination_control.php';

  include 'db_templates/foreach_player.php';
