<?php
/* db_viewcount_dash.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is to display the view counts for all videos and profile views

  Blades Included:
    #db_connect: To connect to Database

  File used in:
    #dashboard
    #profile?id=*
*/

require 'db_connect.php';

//Add all views from videos
$sqlVidCount = "SELECT views FROM videos WHERE opus_creator = '$username'";
$queryVidCount = mysqli_query($mySQL, $sqlVidCount);
$resultsVidCount = mysqli_fetch_all($queryVidCount);
$arrayVidCount = array_column($resultsVidCount, 0);
$vidCount = array_sum($arrayVidCount);

//Add all profile views
$sqlProfileCount = "SELECT views FROM users WHERE username = '$username'";
$queryProfileCount = mysqli_query($mySQL, $sqlProfileCount);
$resultsProfileCount = mysqli_fetch_all($queryProfileCount);
$arrayProfileCount = array_column($resultsProfileCount, 0);
$profileCount = array_sum($arrayProfileCount);
