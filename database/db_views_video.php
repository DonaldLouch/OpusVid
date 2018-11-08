<?php
/* db_views_video.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file updates the view count on a video.

  Blades Inlcluded:
    #db_connect: To connect to Database

  File used in:
    #player?id=*
*/

require 'db_connect.php';

$playerID = $_GET['id'];

$newView = "UPDATE videos SET views = views + 1 WHERE id = '" . mysqli_escape_string($mySQL,$playerID) . "'";
$addView = mysqli_query($mySQL, $newView);
