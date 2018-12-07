<?php
$profiles = array(); // Initiates the profiles array
if (mysqli_num_rows($resultUser) > 0) { // If the connection has MORE than 0 user
  while ($profile = mysqli_fetch_assoc($resultUser)) { // Gets the arrays of the database connection
    $profiles[] = $profile; // Separates each profile array
  } // End: while statement
} // End: if statement
