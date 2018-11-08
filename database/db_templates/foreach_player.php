<?php
$players = array();
if (mysqli_num_rows($resultPlayer) > 0) {
  while ($player = mysqli_fetch_assoc($resultPlayer)) {
    $players[] = $player;
  }
}
