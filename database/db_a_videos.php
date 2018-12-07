<?php
/* db_a_videos.php | Version 1.0
  By: OpusVid
  User Level Required: 0

  The file is to show administrators a list of all the videos on OpusVid in which they can then view/edit/delete a video!

  Blades Included:
    #db_connect: To connect to Database
    #pagination_init: Initiate the pagination
    #pagination_control: Controls the control of the pagination
    #db_templates/foreach_profile: Loops the Foreach loop

  File used in:
    #admin/videos
*/

  require 'db_connect.php'; // Gets database connection

  //Find out how many items are in the videos table
  $countSQL = "SELECT COUNT(order_number) FROM videos";
  $query = mysqli_query($mySQL, $countSQL);
  $row = mysqli_fetch_row($query);
  $rows = $row[0];

  //Number of items to display per page
  $per_page = 10;

  include '../../page-templates/pagination_init.php'; // Initiates pagination

  $videoSQL = "SELECT * FROM videos ORDER BY order_number DESC $limit";
  $resultPlayer = mysqli_query($mySQL, $videoSQL); // The function that gets the database: connects then stores

  include '../../page-templates/pagination_control.php'; // Creates the pagination and the controls

  include 'db_templates/foreach_video.php'; //Prepares the Foreach Loop
