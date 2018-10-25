<?php
  if (isset($_POST['submit'])) {
    include 'db_connect.php';

    $errors = 0;
    include 'db_connect.php';
    require '../do_spaces/spaces_config.php'; //DO Spaces Configutation


    $firstname = mysqli_real_escape_string($mySQL, $_POST['signupFirstName']);
    $lastname = mysqli_real_escape_string($mySQL, $_POST['signupLastName']);
    $username = mysqli_real_escape_string($mySQL, $_POST['signupUsername']);
    $accountName = $username;

    require 'db_templates/avatarUpload.php'; //Upload Function

    $password = mysqli_real_escape_string($mySQL, $_POST['signupPassword']);
    $email = mysqli_real_escape_string($mySQL, $_POST['signupEmail']);
    $avatarPath = mysqli_real_escape_string($mySQL, $avatarDestination);
    $userlevel = mysqli_real_escape_string($mySQL, "user");
    $view = mysqli_real_escape_string($mySQL, "0");
    $country = mysqli_real_escape_string($mySQL, $_POST['country']);

/*Checks*/

    #Check: Empty Files
    if (empty($firstname) || empty($lastname) || empty($username) || empty($password) || empty($email) || empty($country)) {
      $error = 1;
      header("Location: ../login?signup=empty&error=1&name-first=".$firstname."&name-last=".$lastname."&username=".$username."&email=".$email."");
      exit();
    } //empty files

    #Check: Characters Check
    elseif (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname)) {
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
    elseif (in_array($avatarExtention, $avatarExtAllow) != $avatarExtention) {
      $error = 5;
      header("Location: ../login?signup=ext&error=5&name-first=".$firstname."&name-last=".$lastname."&username=".$username."&email=".$email."");
    } //extention check
    elseif ($avatarError != 0) {
      $error = 6;
      header("Location: ../login?signup=error&error=6&name-first=".$firstname."&name-last=".$lastname."&username=".$username."&email=".$email."");
    } //error check
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

        $subject = "Welcome to Opus Vid!";

        $headers[] = 'From: Opus Vid <no-reply@opusvid.com>';
        $headers[] = 'Reply-To: contact@opusvid.com';
        $headers[] = 'Bcc: admin@opusvid.com';
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        $message = "
        <html>
            <head>
              <title>Welcome to Opus Vid!</title>
              <style>
                article {
                 font-family: Montserrat, sans-serif;
                 font-size: 16px;
                 margin: 0.5em;
                 padding: 1.5em;
                 box-shadow: 1px 1px 5px 1px rgba(83, 109, 254, 0.4);
                 border-radius: 0.3em;
                }
                h1 {
                 color: #302E91;
                 font-size: 2em;
                 margin: 0.2em 0 0.6em;
                 text-align: center;
                 text-shadow: 1px 1px 8px rgba(148, 150, 150, 0.57);
               }
               a:link, a:visited {
                 color: #302E91;
                 text-decoration: none;
                 font-weight: 500;
               }
               a:hover {
                 color: #FF9D2F;
               }
               dt {
                 font-weight: bold;
                 font-size: 1.3em;
               }
               dd {
                 margin-left: 1.5em;
                 font-weight: 300;
               }
               a.button {
                 background-color: #302E91;
                 padding: 0.5em;
                 color: #fff !important;
                 text-shadow: none;
                 font-size: 0.9em;
                 box-shadow: 5px 3px 7px 1px rgba(83, 109, 254, 0.4);
                 display: block;
                 width: fit-content;
                 margin: 1em auto;
               }
               a.button:hover {
                 background: none;
                 box-shadow: none;
                 color: #302E91 !important;
               }
               img {
                 width: 20vw;
                 display: block;
                 margin: 0.5em auto;
               }
              </style>
            </head>
            <body>
            <img src=\"https://opusvid.com/storage/ui/video-ui/opusLogo.png\" alt=\"Opus Vid Logo\">
             <article>
              <h1>Welcome to Opus Vid!</h1>
              <p>Hello ".$firstname." " .$lastname." (".$username."), you have successfully registered for Opus Vid!</p>

              <dl>
                <dt>First Name</dt>
                  <dd>". $firstname ."</dd>
                <dt>Last Name</dt>
                  <dd>". $lastname ."</dd>
                <dt>Username</dt>
                  <dd>". $username ."</dd>
                <dt>Email</dt>
                  <dd>". $email ."</dd>
                <dt>Password</dt>
                  <dd>The password that you entered when signing up!</dd>
                  <dt>Country</dt>
                    <dd>". $country ."</dd>
                </dl>

               <p>Please feel free to login to the webite with the below button in which will direct you to the login page! <a href=\"https://opusvid.com/login\" class=\"button\">Login to Opus Vid</a></p>

              <p>Cheers,</p>
              <p>Opus Vid</p>
             </article>
            </body>
        </html>";

        mail($email, $subject, $message, implode("\r\n", $headers));

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
