<?php
/* db_collection_delete.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is to delete an Opus Collection

  Blades Inlcluded:
    #db_connect: To connect to Database

  File used in:
    #dashboard/manage_collections
*/

if (isset($_POST['submit'])) {
  require 'db_connect.php';
  $id = $_POST['collectionIDDel'];

  $delSQL = "DELETE FROM collections WHERE id = '$id';";
  $results = mysqli_query($mySQL, $delSQL);

  header("Location: ../dashboard/manage_collections?delete=success");
} else {
  header("Location: ../dashboard/manage_collections?delete=failed");
}
