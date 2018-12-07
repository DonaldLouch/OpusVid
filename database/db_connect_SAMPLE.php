<?php
/* db_connect.php | Version 1.0
  By: OpusVid
  User Level Required: -
   The file is important as it connects to the database to gather information!
   File used in:
    #All Files That Require a Database Connections
*/

  #DatabaseInformation
  $db_Server = ""; //Where the database is hosted: Typically "localhost" or server IP address
  $db_Username = ""; // The username to database
  $db_Password = ""; // The password to the database user
  $db_Name = ""; // The database name

  /* Connects the database with the above login using mysqli */
  $mySQL = mysqli_connect($db_Server, $db_Username, $db_Password, $db_Name) or die("Connecting to MySQL failed: ".mysqli_connect_error());
