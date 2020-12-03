<?php
class PasswordRest extends MySQL {		  
	public function emailResults($email) {
		$this->userEmail = $email;
		
		$stmt = $this->connect()->prepare('SELECT * FROM users WHERE userEmail=?');
		$stmt->execute([$email]);
		
		$user = $stmt->rowCount();
		
		$false = "false";
		$true = "true";
		
		if ($user >= 1) {
			return $true;
		} elseif ($user == 0) {
			return $false;
		}
	}
	public function restAlready($email) {
		$this->userEmail = $email;
		
		$stmt = $this->connect()->prepare('SELECT * FROM password_reset WHERE resetEmail=?');
		$stmt->execute([$email]);
		
		$user = $stmt->rowCount();
		
		$false = "false";
		$true = "true";
		
		if ($user >= 1) {
			return $true;
		} elseif ($user == 0) {
			return $false;
		}
	}
	
	public function restDelete($email) {
		$this->userEmail = $email;
		
		$stmt = $this->connect()->prepare('DELETE FROM password_reset WHERE resetEmail=?');
		$stmt->execute([$email]);
		
		$user = $stmt->rowCount();
		
		$false = "false";
		$true = "true";
		
		if ($user >= 1) {
			return $true;
		} elseif ($user == 0) {
			return $false;
		}
	}
	
	public function passwordRestS1($email, $verify, $token, $expires) {
		$this->userEmail = $email;
		$this->passVerify = $verify;
		$this->passToken = $token;
		$this->passExpires = $expires;
		
		$stmt = $this->connect()->prepare('INSERT INTO password_reset (resetEmail, resetVerify, resetToken, resetExpires) VALUES (?,?,?,?)');
		$stmt->execute([$email, $verify, $token, $expires]);
		
		$user = $stmt->rowCount();
		
		$false = "false";
		$true = "true";
		
		if ($user >= 1) {
			return $true;
		} elseif ($user == 0) {
			return $false;
		}
	}
	public function currentDayCheck($verify, $currentDate) {
		$this->userVerify = $verify;
		$this->date = $currentDate;
		
		$stmt = $this->connect()->prepare('SELECT * FROM password_reset WHERE resetVerify=? AND resetExpires >=?');
		$stmt->execute([$verify, $currentDate]);
		
		$user = $stmt->rowCount();
		
		$false = "false";
		$true = "true";
		
		if ($user >= 1) {
			return $true;
		} elseif ($user == 0) {
			return $false;
		}
	}
	
	public function passResetSet($verify) {
		$this->userVerify = $verify;
		
		$stmt = $this->connect()->prepare('SELECT * FROM password_reset WHERE resetVerify=? ');
		$stmt->execute([$verify]);
		
		$numberOfRows = $stmt->rowCount();
		
		if ($numberOfRows === 1) {
			while ($row = $stmt->fetch()) {
				return $row;
			}
		} elseif ($numberOfRows === 0) {
			echo "NO Post Found... Try again please!";
		} 
	}
	
	public function passUpdate($hashedPassword, $email) {
		$this->pass = $hashedPassword;
		$this->tokenEmail = $email;
		
		$stmt = $this->connect()->prepare('UPDATE users SET userPassword=? WHERE userEmail=?');
		$stmt->execute([$hashedPassword, $email]);
		
		$user = $stmt->rowCount();
		
		$false = "false";
		$true = "true";
		
		if ($user >= 1) {
			return $true;
		} elseif ($user == 0) {
			return $false;
		}
	}
}