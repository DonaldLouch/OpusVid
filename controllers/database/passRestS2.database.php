<?php
/* passResetS2.database.php | Version 1.0
  By: DevLexicon
  User Level Required: anyone

  This file allows user to reset their passwords if they forgot them.

  File used in:
	 # passwordNew
*/

	// Turn on error reporting:
		error_reporting(E_ALL);
		ini_set('display_errors', 1);

  if (isset($_POST['changePassword'])) { //If form is submit #FormSubmitted
    require '../../models/config/config.php';
	include_once '../../models/classes/MySQL.class.php';
	include_once '../../models/classes/PasswordRest.class.php';
	include_once '../../models/classes/ReCAPTCHA.class.php';
		$error = 0; //Sets initial error number to 0 meaning no errors
		
		$passRestClass = new PasswordRest;
		
		$verify = $_POST['verify'];
		$token = $_POST['token'];
		
		$newPassword = $_POST['newPassword'];
		$passwordConfirmed = $_POST['confirmPassword'];
		
		if (empty($newPassword) || empty($passwordConfirmed)){
			$error = 1;
			header("Location: ../../../passwordNew?type=empty&error=$error&verify=$verify&token=$token");
			exit();
		} 
		
		if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%.?])[0-9A-Za-z!@#$%.?]{8,12}$/', $newPassword)){
			$error = 2;
			header("Location: ../../../passwordNew?type=passwordNotStrongEnough&error=$error&verify=$verify&token=$token");
			exit();
		} //first and last name characters check
		
		elseif ($newPassword !== $passwordConfirmed){ 
			$error = 2.5;
			header("Location: ../../../passwordNew?type=passwordNotSame&error=$error&verify=$verify&token=$token");
			exit();
		}
		
		if ($error == 0) {
			$currentDate = date("U");
			
			$currentDayCheck = $passRestClass->currentDayCheck($verify, $currentDate);
			
			if($currentDayCheck === "ture") {
				$error = 3;
				header("Location: ../../../passwordNew?type=verifyPassReset&error=$error&verify=$verify&token=$token");
				exit();
			}
		}
		
		
		if ($error == 0) {
			$passResetSet = $passRestClass->passResetSet($verify);
			
			$tokenBin = hex2bin($token);
			$tokenCheck = password_verify($tokenBin, $passResetSet["resetToken"]);
			
			/*if ($tokenCheck === false) {
				$error = 4;
				header("Location: ../../../passwordNew?type=verifyPassReset&error=$error&verify=$verify&token=$token");
				exit();
			}*/
		} 
		
		if ($error == 0 && $tokenCheck === true) {
			$email = $passResetSet['resetEmail'];
			
			$emailResults = $passRestClass->emailResults($email);
			
			if($emailResults === "false") {
				$error = 5;
				header("Location: ../../../passwordNew?type=verifyPassReset&error=$error&verify=$verify&token=$token");
				exit();
			}
		}
		
		if ($error == 0) {
			$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
			$email = $passResetSet['resetEmail'];
			
			$passUpdate = $passRestClass->passUpdate($hashedPassword, $email);
			
			if($passUpdate === "false") {
				$error = 6;
				header("Location: ../../../passwordNew?type=database&error=$error&verify=$verify&token=$token");
				exit();
			}
		}
		
		if ($error == 0) {
			$restDelete = $passRestClass->restDelete($email);
			
			if($restDelete === "false") {
				$error = 7;
				header("Location: ../../../passwordNew?type=database&error=$error&verify=$verify&token=$token");
				exit();
			} else	if($restDelete === "true") {
				header("Location: ../../../login?type=passResetSuccess");
				exit();
			}
		}
	} else {
		$error = 8;
		header("Location: ../../../passwordNew?type=submitted&error=$error&verify=$verify&token=$token");
		exit();
	}