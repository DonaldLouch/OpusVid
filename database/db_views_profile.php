<?php
/* db_views_profile.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file updates the view count on a profile.

  Blades Inlcluded:
    #db_connect: To connect to Database

  File used in:
    #profile?id=*
*/

require 'db_connect.php';

$profileID = $_GET['id'];

$newView = "UPDATE users SET views = views + 1 WHERE username = '" . mysqli_escape_string($mySQL,$profileID) . "'";
$addView = mysqli_query($mySQL, $newView);
