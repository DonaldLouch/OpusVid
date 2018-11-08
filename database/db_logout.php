<?php
/* db_logoyt.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file allows users to logout and ends the session!

  File used in:
    #../login
*/

if (isset($_POST['submit'])) {
  session_start();
  session_unset();
  session_destroy();
  header('Location: ../login?logged=success');
  exit();
}
