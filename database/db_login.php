<?php

session_start();

if (isset($_POST['submit'])) {

  include 'db_connect.php';

  $username = mysqli_real_escape_string($mySQL, $_POST['username']);
  $password = mysqli_real_escape_string($mySQL, $_POST['password']);

  //Error

  if (empty($username) || empty($password)) { //Empty Fields
    header("Location: ../resources/views/back-end/login.php?login=empty");
    exit(); //End of Empty Fields
  } else {
    $sql = "SELECT * FROM users WHERE username='$username' OR email='$username'";
    $result = mysqli_query($mySQL, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck < 1) {
      header("Location: ../resources/views/back-end/login.php?login=failed");
      exit();
    } else {
      if ($row = mysqli_fetch_assoc($result)) {
        //Dehash Password
        $hashedPasswordCheck = password_verify($password, $row['user_password']);
        if ($hashedPasswordCheck == false) {
          header("Location: ../resources/views/back-end/login.php?login=failed");
          exit();
        } elseif ($hashedPasswordCheck == true) {
          //Login User!
          $_SESSION['uID'] = $row['id'];
          $_SESSION['uIFirst'] = $row['first_name'];
          $_SESSION['uILast'] = $row['last_name'];
          $_SESSION['uName'] = $row['username'];
          $_SESSION['uEmail'] = $row['email'];
          header("Location: ../resources/views/back-end/index.php");
          exit();
        }
      }
    }
  }
} else {
  header("Location: ../resources/views/back-end/login.php?login=failed");
  exit();
}
