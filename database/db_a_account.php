<?php
/* db_a_account.php | Version 1.0
  By: OpusVid
  User Level Required: 0

  The file is to update user accounts and their information!

  Blades Inlcluded:
    #db_connect: To connect to Database
    #accountEditInfo: To pull in post data

  File used in:
    #admin/edit_account?id=*
*/

if (isset($_POST['submit'])) {
  require 'db_connect.php';

  require 'db_templates/info/accountEditInfo.php';

  if (empty($accountPassword)) {
    $updateSQL = "UPDATE users SET username = '$accountName', first_name = '$accountFirst', last_name = '$accountLast', email = '$accountEmail', country = '$accountCountry', description = '$accountDescription', account_tags = '$accountTags', userlevel = '$accountLevel' WHERE username= '$accountName';";

    $results = mysqli_query($mySQL, $updateSQL);

    header("Location: ../admin/accounts?edit=successNP");

  } else {
    $updateSQL = "UPDATE users SET username = '$accountName', first_name = '$accountFirst', last_name = '$accountLast', email = '$accountEmail', user_password = '$hashedPassword', country = '$accountCountry', description = '$accountDescription', account_tags = '$accountTags', userlevel = '$accountLevel' WHERE username= '$accountName';";

    $results = mysqli_query($mySQL, $updateSQL);

    header("Location: ../admin/accounts?edit=successP");
  }
}
