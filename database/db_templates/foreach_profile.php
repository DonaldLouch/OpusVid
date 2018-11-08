<?php
$profiles = array();
if (mysqli_num_rows($resultUser) > 0) {
  while ($profile = mysqli_fetch_assoc($resultUser)) {
    $profiles[] = $profile;
  }
}
