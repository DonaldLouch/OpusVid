<?php
$videos = array(); // Initiates the video array
if (mysqli_num_rows($resultPlayer) > 0) { // If the connection has MORE than 0 video
  while ($video = mysqli_fetch_assoc($resultPlayer)) { // Gets the arrays of the database connection
    $videos[] = $video; // Separates each player array
  } // End: while statement
} // End: if statement
