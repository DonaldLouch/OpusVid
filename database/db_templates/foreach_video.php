<?php
$videos = array();
if (mysqli_num_rows($resultPlayer) > 0) {
  while ($video = mysqli_fetch_assoc($resultPlayer)) {
    $videos[] = $video;
  }
}
