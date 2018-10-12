<?php
  if (isset($_POST['submit'])) {

    include 'db_connect.php';

    $firstname = mysqli_real_escape_string($mySQL, $_POST['signupFirstName']);
    $lastname = mysqli_real_escape_string($mySQL, $_POST['signupLastName']);
    $username = mysqli_real_escape_string($mySQL, $_POST['signupUsername']);
    $password = mysqli_real_escape_string($mySQL, $_POST['signupPassword']);
    $email = mysqli_real_escape_string($mySQL, $_POST['signupEmail']);
    $avatarPath = mysqli_real_escape_string($mySQL,"../storage/avatars/defaultAvatar.png");
    $userlevel = mysqli_real_escape_string($mySQL, "user");
    $view = mysqli_real_escape_string($mySQL, "0");

    if (empty($firstname) || empty($lastname) || empty($username) || empty($password) || empty($email)) { //Checks for empty fields
      header("Location: ../login?signup=empty&name-first=".$firstname."&name-last=".$lastname."&username=".$username."&email=".$email."");
      exit(); //End of Checks for Empty fields

    } elseif (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname)) {//Looks at the characters in the first and last name fields to make sure they are vaild characters
      header("Location: ../login?signup=invaild&username=".$username."&email=".$email."");
      exit(); //End of Checkes Input: First and Last name

    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {//Looks at the characters in the username field to make sure they are vaild characters
        header("Location: ../login?signup=invaild&name-first=".$firstname."&name-last=".$lastname."&email=".$email."");
        exit(); //End of Checkes Input: Username

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../login?signup=email&name-first=".$firstname."&name-last=".$lastname."&username=".$username."");
      exit(); //End of Checkes Input: Email
    } else {// Checks for users that are already created
      $sqlCheck = "SELECT * FROM users WHERE username=?";
      $stmtCheck = mysqli_stmt_init($mySQL);
    } if (!mysqli_stmt_prepare($stmtCheck, $sqlCheck)){
        header("Location: ../login?signup=sql&name-first=".$firstname."&name-last=".$lastname."&username=".$username."&email=".$email."");
        exit();
      } else {
        mysqli_stmt_bind_param($stmtCheck, "s", $username);
        mysqli_stmt_execute($stmtCheck);
        mysqli_stmt_store_result($stmtCheck);
        $resultCheck = mysqli_stmt_num_rows($stmtCheck);

        if ($resultCheck > 0) {
          header("Location: ../login?signup=userTaken&name-first=".$firstname."&name-last=".$lastname."&email=".$email."");
          exit(); // End Users Already Created
        } //End of Errors

        else {
        $sqlInsert = "INSERT INTO users (first_name, last_name, username, email, user_password, avatar, userlevel, views) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $insertStmt = mysqli_stmt_init($mySQL);

        if (!mysqli_stmt_prepare($insertStmt, $sqlInsert)){
            header("Location: ../login?signup=sql&name-first=".$firstname."&name-last=".$lastname."&username=".$username."&email=".$email."");
            exit();

        } else {
          $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($insertStmt, "ssssssss", $firstname, $lastname, $username, $email, $hashedPassword, $avatarPath, $userlevel, $view);
          mysqli_stmt_execute($insertStmt);
        }

        header("Location: ../login?signup=success");
        exit();
        }
    }
    mysqli_stmt_close($stmtCheck);
    mysqli_stmt_close($insertStmt);
    mysqli_close($mySQL);
    } else {
      header("Location: ../login?signup=failed");
      exit();
    }
