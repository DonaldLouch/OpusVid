<?php

$userSQL = "SELECT * FROM users WHERE username = '" . mysqli_escape_string($mySQL,$profileID) . "';";
$userResult = mysqli_query($mySQL, $userSQL);
$userRow = $userResult->fetch_assoc();
