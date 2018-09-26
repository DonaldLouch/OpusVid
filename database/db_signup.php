<?php

  if (isset($_POST['submit'])) {

    include 'db_connect.php';

    /*$target_file = $_FILES["avatarFile"]["name"];
    $fileExtension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    */

    $firstname = mysqli_real_escape_string($mySQL, $_POST['signupFirstName']);
    $lastname = mysqli_real_escape_string($mySQL, $_POST['signupLastName']);
    $username = mysqli_real_escape_string($mySQL, $_POST['signupUsername']);
    $password = mysqli_real_escape_string($mySQL, $_POST['signupPassword']);
    $email = mysqli_real_escape_string($mySQL, $_POST['signupEmail']);
    //$avatarPath = "../../../database/upload/avatar/" . $username . '.' . $fileExtension;

    //Error

   if (empty($firstname) || empty($lastname) || empty($username) || empty($password) || empty($email)) { //Empty Fields
      header("Location: ../login?signup=empty");
      exit(); //End of Empty Fields
    } else { //Checkes Input
      //Username
      if (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname) || !preg_match("/^[a-zA-Z]*$/", $username)) {//Looks at the characters in the field to make sure there are vaild characters
        header("Location: ../login?signup=invaild");
        exit(); //End of Checkes Input: Username
      } else {
        //Email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          header("Location: ../login?signup=email");
          exit(); //End of Checkes Input: Email
        } else {// Checks for users that are already created
          $sql = "SELECT * FROM users WHERE username='$username'";
          $result = mysqli_query($mySQL, $sql);
          $resultCheck = mysqli_num_rows($result);

          if ($resultCheck > 0) {
            header("Location: ../login?signup=userTaken");
            exit(); // End Users Already Created
          } else {
            //Password Hash
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
           //Create User in database
            $sqlCreate = "INSERT INTO users (first_name, last_name, username, email, user_password) VALUES ('$firstname', '$lastname', '$username', '$email', '$hashedPassword');";
            $resultCreate = mysqli_query($mySQL, $sqlCreate);

            /*if ($_FILES["avatarFile"]["error"] > 0) {
              echo "Return Code: " . $_FILES["avatarFile"]["error"];
            } else {
              move_uploaded_file($_FILES["avatarFile"]["tmp_name"], "upload/avatar/" . $username . "." . $fileExtension);
            }*/

            header("Location: ../login?signup=success");
            exit(); //User Added to Database
          }
        }
      }
    } //End of Errors

  } else {
    header("Location: ../login?signup=failed");
    exit();
  }
