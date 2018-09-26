<?php
  class Player {
    public function fetch_all() {
      include 'db_connect.php';
      global $sqlSelectPlayer;

      $sqlSelectPlayer = "SELECT * FROM videos";
      $result = mysqli_query($mySQL, $sqlSelectPlayer);
      $row = mysqli_fetch_assoc($result);

      return $result;
  } //End of fetch_all
}
?>
