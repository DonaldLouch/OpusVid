<?php
/* passResetS1.database.php | Version 1.0
  By: DevLexicon
  User Level Required: anyone

  This file allows user to reset their passwords if they forgot them.

  File used in:
	 # passwordReset
*/

	// Turn on error reporting:
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
	
	if (isset($_POST['resetPassword'])) {
    	require '../../models/config/config.php';
		include_once '../../models/classes/MySQL.class.php';
		include_once '../../models/classes/PasswordRest.class.php';
		include_once '../../models/classes/ReCAPTCHA.class.php';
		$email = $_POST['email'];

		$passRestClass = new PasswordRest;
		
		$error = 0;
		
		if (isset($_POST['g-recaptcha-response'])) {
			$reCAPTCHA = new ReCAPTCHA;
			
			$capSecretKey = $reCAPTCHA->captchaSecretKey();
			$recaptchaResponse = $_POST['g-recaptcha-response'];
			
			$recaptchaURL = 'https://www.google.com/recaptcha/api/siteverify';
			
			$recaptcha = file_get_contents($recaptchaURL . '?secret=' . $capSecretKey . '&response=' . $recaptchaResponse);
			$recaptcha = json_decode($recaptcha);
			
			if (!isset($recaptchaResponse)) {
				$error = 1;
				header("Location: ../../../passwordReset?type=captcha&error=$error");
				exit();
			}
			if ($recaptcha->score < 0.5) {
				$error = 2;
				header("Location: ../../../passwordReset?type=captcha&error=$error");
				exit();
			}
		}
		
		if (empty($email)) {
			$error = 1;
			header("Location: ../../../passwordReset?type=empty&error=$error");
			exit();
		} else {
			$emailResults = $passRestClass->emailResults($email);
		
			if($emailResults === "false") {
				$error = 2;
				header("Location: ../../../passwordReset?type=email&error=$error");
				exit();
			} else {
				$restAlready = $passRestClass->restAlready($email);
				
				if($restAlready === "true") {
					$restDelete = $passRestClass->restDelete($email);
					
					if($restDelete === "false") {
						$error = 3;
						header("Location: ../../../passwordReset?type=database&error=$error");
						exit();
					}
				}
			}
		}
		
		if ($error == 0){
			$verify = bin2hex(random_bytes(8));
			$token = random_bytes(32);
			$expires = date("U") + 1800;
			
			$passwordRestS1 = $passRestClass->passwordRestS1($email, $verify, $token, $expires);
			
			if($passwordRestS1 === "false") {
				$error = 4;
				header("Location: ../../../passwordReset?type=database&error=$error");
				exit();
			}
			
			require "../email/passwordReset.email.php";
		
			if(!mail($email, $subject, $message, implode("\r\n", $headers))) {
				$error = 5;
				header("Location: ../../../passwordReset?type=sendEmail&error=$error");
				exit(); 
			} else {
				header("Location: ../../../passwordPending?email=$email");
				exit();
			}
		}
	}