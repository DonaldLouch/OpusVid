<?php
/* db_video.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is to get the videos that are in a collection and disply the information of the videos

  Blades Included:
    #db_connect: To connect to Database
    #db_templates/foreach_video: Loops the Foreach loop

  File used in:
    #dashboard/manage
    #dashboard/new_collection
*/
require 'db_connect.php';

$profileID = $_SESSION['uName'];

$videoSQL = "SELECT * FROM videos WHERE opus_creator = '$profileID' ORDER BY order_number DESC";
$resultPlayer = mysqli_query($mySQL, $videoSQL);

include 'db_templates/foreach_video.php';
