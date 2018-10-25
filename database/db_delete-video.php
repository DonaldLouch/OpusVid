<?php

if (isset($_POST['submit'])) {
  include 'db_connect.php';
  $id = $_POST['videoIDDel'];

  $delSQL = "DELETE FROM videos WHERE id = '$id';";
  $results = mysqli_query($mySQL, $delSQL);

  header("Location: ../dashboard/manage?delete=success");
} else {
  header("Location: ../dashboard/manage?delete=failed");
}
