<?php
/* db_a_account.php | Version 1.0
  By: OpusVid
  User Level Required: 0

  The file is to update user accounts and their information!

  Blades Included:
    #db_connect: To connect to Database
    #accountEditInfo: To pull in post data

  File used in:
    #admin/edit_account?id=*
*/

if (isset($_POST['submit'])) { // Action once form is submitted #FormSubmitted
  require 'db_connect.php'; // Gets database connection

  require 'db_templates/accountEditInfo.php'; // Gets the information from the fields from the submitted forms

  if (empty($accountPassword)) { // If the account password field is empty it will run the insert with NO password updates #NoPasswordUpdate
    $updateSQL = "UPDATE users SET username = '$accountName', first_name = '$accountFirst', last_name = '$accountLast', email = '$accountEmail', country = '$accountCountry', description = '$accountDescription', account_tags = '$accountTags', userlevel = '$accountLevel' WHERE username= '$accountName';";
    $results = mysqli_query($mySQL, $updateSQL); // The function that updates the database: connects then updates

    header("Location: ../admin/accounts?edit=successNP"); // Once done the admin will be redirected to the accounts page: Success Message!

  } // End: NoPasswordUpdate
  else { // If the account password field is NOT empty it will run the insert with new password updates #PasswordUpdate
    $updateSQL = "UPDATE users SET username = '$accountName', first_name = '$accountFirst', last_name = '$accountLast', email = '$accountEmail', user_password = '$hashedPassword', country = '$accountCountry', description = '$accountDescription', account_tags = '$accountTags', userlevel = '$accountLevel' WHERE username= '$accountName';";

    $results = mysqli_query($mySQL, $updateSQL);

    header("Location: ../admin/accounts?edit=successP");
  } // End: PasswordUpdate
} // End: FormSubmitted
