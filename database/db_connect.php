<?php
  $db_Server = "localhost";
  $db_Username = "opusvid_cms";
  $db_Password = "n,rl!DVdGwTa}&8Usl";
  $db_Name = "opusvid_cms";

  $mySQL = mysqli_connect($db_Server, $db_Username, $db_Password, $db_Name) or die("Connecting to MySQL failed: ".mysqli_connect_error());
