<?php

if (isset($_POST['submit'])) {

  include 'db_connect.php';

  $username = mysqli_real_escape_string($mySQL, $_POST['username']);
  $password = mysqli_real_escape_string($mySQL, $_POST['password']);

  //Error

  if (empty($username) || empty($password)) {
    header("Location: ../login?login=empty&username=".$username."");
    echo "Error: Empty Fields";
    exit();
  } else {
    $sqlUsername = "SELECT * FROM users WHERE username=? OR email=?;";
    $stmtUsername = mysqli_stmt_init($mySQL);

	  if (!mysqli_stmt_prepare($stmtUsername, $sqlUsername)){
      echo "Error: Database Connection Error";
	        header("Location: ../login?login=sql&username=".$username."");
	        exit();
	  } else {
       mysqli_stmt_bind_param($stmtUsername, "ss", $username, $username);
	     mysqli_stmt_execute($stmtUsername);
	     $resultCheck = mysqli_stmt_get_result($stmtUsername);

       if ($row = mysqli_fetch_assoc($resultCheck)) {
			      $hashedPasswordCheck = password_verify($password, $row['user_password']);

            if ($hashedPasswordCheck == false){
				          header("Location: ../login?login=failed&username=".$username."");
				          exit();
      			} elseif ($hashedPasswordCheck == true) {
      				    session_start();

      				    $_SESSION['uID'] = $row['id'];
      		        $_SESSION['uIFirst'] = $row['first_name'];
      		        $_SESSION['uILast'] = $row['last_name'];
      		        $_SESSION['uName'] = $row['username'];
      		        $_SESSION['uEmail'] = $row['email'];
      		        $_SESSION['uAvatar'] = $row['avatar'];
      		        $_SESSION['uLevel'] = $row['userlevel'];
                  $_SESSION['uCountry'] = $row['country'];

      		        header("Location: ../dashboard?login=success");
      				    exit();
			      } else {
      				header("Location: ../login?login=failed&username=".$username."");
      				exit();
      			}
		} else {
		    header("Location: ../login?login=failed");
			  exit();
	  }
	  }
  }
} else {
  header("Location: ../login?login=failed");
  exit();
}
