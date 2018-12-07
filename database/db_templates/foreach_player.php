<?php
$players = array(); // Initiates the player array
if (mysqli_num_rows($resultPlayer) > 0) { // If the connection has MORE than 0 video
  while ($player = mysqli_fetch_assoc($resultPlayer)) { // Gets the arrays of the database connection
    $players[] = $player; // Separates each player array
  } // End: while statement
} // End: if statement
