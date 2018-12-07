<?php
$following = array(); // Initiates the follow array
if (mysqli_num_rows($followResults) > 0) { // If the connection has MORE than 0 follower
  while ($follow = mysqli_fetch_assoc($followResults)) { // Gets the arrays of the database connection
    $following[] = $follow; // Separates each followe array
  } // End: while statement
} // End: if statement
