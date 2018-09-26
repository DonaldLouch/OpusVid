<?php
  class Video {
    public function fetch_all() {
      include 'db_connect.php';
      global $sqlSelectPlayer;

      $opusCreator = $_SESSION['uName'];


      $sqlSelectPlayer = "SELECT * FROM videos WHERE opus_creator = '$opusCreator'";

      $result = mysqli_query($mySQL, $sqlSelectPlayer);
      $row = mysqli_fetch_assoc($result);

      return $result;
  } //End of fetch_all
}
?>
