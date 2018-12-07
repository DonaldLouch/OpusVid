<?php
/* db_collection_delete.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file is to delete an Opus Collection

  Blades Included:
    #db_connect: To connect to Database

  File used in:
    #dashboard/manage_collections
*/

if (isset($_POST['submit'])) { // Action once form is submitted #FormSubmitted
  require 'db_connect.php'; // Gets database connection
  $id = $_POST['collectionIDDel']; // Gets the collection Id to be deleted from the submitted form

  $delSQL = "DELETE FROM collections WHERE id = '$id';";
  $results = mysqli_query($mySQL, $delSQL); // Deletes the collection

  header("Location: ../dashboard/manage_collections?delete=success"); // Once done the user will be redirected to the collection manager page: Success Message!
} // End: FormSubmitted
else { // No collection was selected #Failed
  header("Location: ../dashboard/manage_collections?delete=failed"); // The user will be redirected to the collection manager page: Error Message!
} //End: Failed
