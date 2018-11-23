<?php

if (isset($_POST['new'])) {
  require 'db_connect.php';
  session_start();
  $user = $_SESSION['uName'];

  $sqlSearch = "SELECT * FROM watch_later WHERE user = '$user'";
  $querySearch = mysqli_query($mySQL, $sqlSearch);

  if (mysqli_num_rows($querySearch) === 0) {
    $sqlInsert = "INSERT INTO watch_later (user, privacy) VALUES ('$user', 'private')";
    if (mysqli_query($mySQL, $sqlInsert)) {
      header("Location: ../../watch_later?list=done");
    } else {
      header("Location: ../../watch_later?list=error");
    }
  } else {
    header("Location: ../../watch_later?list=set");
  }

  header("Location: ../../watch_later?list=alreadydone");

}
