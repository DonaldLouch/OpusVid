<?php
/* db_a_videos.php | Version 1.0
  By: OpusVid
  User Level Required: 0

  The file is to show administors a list of all the videos on Opus Vid in which they can then view/edit/delete a video!

  Blades Inlcluded:
    #db_connect: To connect to Database
    #pagination_init: Initate the pagination
    #pagination_control: Controls the control of the pagination

  File used in:
    #admin/videos
*/

  require 'db_connect.php';

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
