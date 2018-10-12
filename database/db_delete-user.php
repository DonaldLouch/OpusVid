<?php

// confirm that the 'id' variable has been set  && is_numeric($_GET['id']
if (isset($_POST['submit'])) {
  include 'db_connect.php';
  // get the 'id' variable from the URL
  $id = $_POST['profileIDDel'];

  $delSQL = "DELETE FROM users WHERE id = '$id';";
  $results = mysqli_query($mySQL, $delSQL);

  header("Location: ../admin/accounts?delete=success");
} else {
  header("Location: ../admin/accounts?delete=failed");
}
