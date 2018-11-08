<?php
/* db_connect.php | Version 1.0
  By: OpusVid
  User Level Required: -

  The file is important as it connects to the database to gather information!

  File used in:
    #All Files That Require a Database Connections
*/

  $db_Server = "localhost";
  $db_Username = "opusvid_cms";
  $db_Password = "n,rl!DVdGwTa}&8Usl";
  $db_Name = "opusvid_cms";

  $mySQL = mysqli_connect($db_Server, $db_Username, $db_Password, $db_Name) or die("Connecting to MySQL failed: ".mysqli_connect_error());
