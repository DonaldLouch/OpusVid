<?php
$following = array();
if (mysqli_num_rows($followResults) > 0) {
  while ($follow = mysqli_fetch_assoc($followResults)) {
    $following[] = $follow;
  }
}
