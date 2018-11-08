<?php
/* db_feedback_results.php | Version 1.0
  By: OpusVid
  User Level Required: 0

  This file shows the feedback that's been received.

  Blades Inlcluded:
    #db_connect: To connect to Database
    #../../page-templates/pagination_init.php: Preps pagination
    #../../page-templates/pagination_control.php: Preps pagination controls

  File used in:
    #admin/feedback_results
*/

require 'db_connect.php';

$countSQL = "SELECT COUNT(order_number) FROM feedback";
$query = mysqli_query($mySQL, $countSQL);
$row = mysqli_fetch_row($query);
$rows = $row[0];

//Number of items to display per page
$per_page = 1;

include '../../page-templates/pagination_init.php';

$selectSQL = "SELECT * FROM feedback ORDER BY order_number DESC $limit";
$selectResults = mysqli_query($mySQL, $selectSQL);

include '../../page-templates/pagination_control.php';

$feedbacks = array();
if (mysqli_num_rows($selectResults) > 0) {
  while ($feedback = mysqli_fetch_assoc($selectResults)) {
    $feedbacks[] = $feedback;
  }
}

mysqli_close($mySQL);
