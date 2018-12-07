<?php
/* db_logint.php | Version 1.0
  By: OpusVid
  User Level Required: 0+

  The file allows users to login and creates a new session!

  Blades Included:
    #db_connect: To connect to Database

  File used in:
    #../login
*/

if (isset($_POST['submit'])) { //If login form was submitted #LoginForm

  require 'db_connect.php';

  $username = mysqli_real_escape_string($mySQL, $_POST['username']);
  $password = mysqli_real_escape_string($mySQL, $_POST['password']);

  //Error

  if (empty($username) || empty($password)) { //If the username or password is empty then redirect to login page #Empty
    header("Location: ../login?login=empty&username=".$username."");
    echo "Error: Empty Fields";
    exit();
  } //End: Empty
  else { #User
    $sqlUsername = "SELECT * FROM users WHERE username=? OR email=?;";
    $stmtUsername = mysqli_stmt_init($mySQL); //Check to see of the user exsits

	  if (!mysqli_stmt_prepare($stmtUsername, $sqlUsername)){ //If database connection failed redirect to login page #SQLError
      echo "Error: Database Connection Error";
	        header("Location: ../login?login=sql&username=".$username."");
	        exit();
	  } //End: SQLError
    else { #Usercheck
       mysqli_stmt_bind_param($stmtUsername, "ss", $username, $username);
	     mysqli_stmt_execute($stmtUsername);
	     $resultCheck = mysqli_stmt_get_result($stmtUsername);

       if ($row = mysqli_fetch_assoc($resultCheck)) { //Checks if the password is corrected #PassCheck
			      $hashedPasswordCheck = password_verify($password, $row['user_password']); //Privately unhashes password from database then verifies it from the input from the submitted form

            if ($hashedPasswordCheck == false){ //If the wrong password was entered redirect to login page #WrongPass
				          header("Location: ../login?login=failed&username=".$username."");
				          exit();
      			} //End: WrongPass
            elseif ($hashedPasswordCheck == true) { //If correct password then log user in #Login
      				    session_start(); //Start Session

                    //Bind session information to information from the database
      				    $_SESSION['uID'] = $row['id'];
      		        $_SESSION['uIFirst'] = $row['first_name'];
      		        $_SESSION['uILast'] = $row['last_name'];
      		        $_SESSION['uName'] = $row['username'];
      		        $_SESSION['uEmail'] = $row['email'];
      		        $_SESSION['uAvatar'] = $row['avatar'];
      		        $_SESSION['uLevel'] = $row['userlevel'];
                  $_SESSION['uCountry'] = $row['country'];

      		        header("Location: ../dashboard?login=success"); //Redirect to dashboard
      				    exit(); //Send Script
			      } //End: Login
            else { //If anything for login failed then redirect to login page #Failed
      				header("Location: ../login?login=failed&username=".$username."");
      				exit();
      			} //End: Failed
		} //End: PassCheck
    else { //If there was any issues with the password check redirect to login page #PassFail
		    header("Location: ../login?login=failed");
			  exit();
	  } //End: PassFail
  } //End: UserCheck
} //End: User
} //End: LoginForm
else { //If form is not submitted redirect to login page #NoForm
  header("Location: ../login?login=failed");
  exit();
} //End: NoForm
