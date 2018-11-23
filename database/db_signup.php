<?php
/* db_signup.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file allows users to signup

  Blades Inlcluded:
    #db_connect: To connect to Database
    #db_templates/avatarUpload: Get's the file information for avatar
    #../do_spaces/spaces_config: Connects to DigitalOcean for upload prep
    #../do_spaces/spaces_avatarUpload: Uploads new avatar

  File used in:
    #login
*/

  if (isset($_POST['submit'])) {
    require 'db_connect.php';

    $errors = 0;

    require '../do_spaces/spaces_config.php'; //DO Spaces Configutation


    $firstname = mysqli_real_escape_string($mySQL, $_POST['signupFirstName']);
    $lastname = mysqli_real_escape_string($mySQL, nl2br($_POST['signupLastName']));
    $username = mysqli_real_escape_string($mySQL, $_POST['signupUsername']);
    $accountName = $username;

    require 'db_templates/avatarUpload.php'; //Upload Function

    $password = mysqli_real_escape_string($mySQL, $_POST['signupPassword']);
    $email = mysqli_real_escape_string($mySQL, $_POST['signupEmail']);
    $avatarPath = mysqli_real_escape_string($mySQL, $avatarDestination);
    $userlevel = mysqli_real_escape_string($mySQL, "user");
    $view = mysqli_real_escape_string($mySQL, "0");
    $country = mysqli_real_escape_string($mySQL, $_POST['country']);

/*Checks */

    #Check: Empty Files
    if (empty($firstname) || empty($lastname) || empty($username) || empty($password) || empty($email) || empty($country)) {
      $error = 1;
      header("Location: ../login?signup=empty&error=1&name-first=".$firstname."&name-last=".$lastname."&username=".$username."&email=".$email."");
      exit();
    } //empty files

    #Check: Characters Check
    elseif (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z_\-]*$/", $lastname)) {
      $error = 2;
      header("Location: ../login?signup=invaild&error=2&username=".$username."&email=".$email."");
      exit();
    } //first and last name characters check
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      $error = 3;
      header("Location: ../login?signup=invaild&error=3&name-first=".$firstname."&name-last=".$lastname."&email=".$email."");
      exit();
    } //username characters check

    #Check: Vaild Email
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = 4;
      header("Location: ../login?signup=email&error=4&name-first=".$firstname."&name-last=".$lastname."&username=".$username."");
      exit();
    } //email check

    #Check: Avatar
    elseif ($avatarError != 0) {
      $error = 5;
      header("Location: ../login?signup=error&error=5&name-first=".$firstname."&name-last=".$lastname."&username=".$username."&email=".$email."");
    } //error check
    elseif (in_array($avatarExtention, $avatarExtAllow) != $avatarExtention) {
      $error = 6;
      header("Location: ../login?signup=ext&error=6&name-first=".$firstname."&name-last=".$lastname."&username=".$username."&email=".$email."");
    } //extention check
    elseif ($avatarSize > 1e+8) {
      $error = 7;
      header("Location: ../login?signup=big&error=7&name-first=".$firstname."&name-last=".$lastname."&username=".$username."&email=".$email."");
    } //size check

    #Check: If user excites already
    elseif(!empty($username)) {
      $sqlCheck = "SELECT * FROM users WHERE username=?";
      $stmtCheck = mysqli_stmt_init($mySQL);
        } if (!mysqli_stmt_prepare($stmtCheck, $sqlCheck)){
          $error = 8;
          header("Location: ../login?signup=sql&error=8&name-first=".$firstname."&name-last=".$lastname."&username=".$username."&email=".$email."");
          exit();
        } else {
          mysqli_stmt_bind_param($stmtCheck, "s", $username);
          mysqli_stmt_execute($stmtCheck);
          mysqli_stmt_store_result($stmtCheck);
          $resultCheck = mysqli_stmt_num_rows($stmtCheck);

          if($resultCheck > 0) {
            $error = 9;
            header("Location: ../login?signup=userTaken&error=9&name-first=".$firstname."&name-last=".$lastname."&email=".$email."");
            exit();
          }
    }//User check done
/*End of Checks*/

/*Start upload*/
    if($error == 0) {
      include '../do_spaces/spaces_avatarUpload.php'; //Upload Avatar

      $sqlInsert = "INSERT INTO users (first_name, last_name, username, email, user_password, country, avatar, userlevel, views) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $insertStmt = mysqli_stmt_init($mySQL);
      if (!mysqli_stmt_prepare($insertStmt, $sqlInsert)){
        header("Location: ../login?signup=sql&name-first=".$firstname."&name-last=".$lastname."&username=".$username."&email=".$email."");
        exit();
      } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($insertStmt, "sssssssss", $firstname, $lastname, $username, $email, $hashedPassword, $country, $avatarPath, $userlevel, $view);
        mysqli_stmt_execute($insertStmt);

        $sqlWatchLater = "INSERT INTO watch_later (user, privacy) VALUES ('$username', 'private')";
        $sqlWatchQuery = mysqli_query($mySQL, $sqlWatchLater);

        include 'emails/email_signup.php';

        header("Location: ../login?signup=success");
        exit();
      }
      mysqli_stmt_close($stmtCheck);
      mysqli_stmt_close($insertStmt);
      mysqli_close($mySQL);
    }
} else {
  header("Location: ../login?signup=failed");
  exit();
}
