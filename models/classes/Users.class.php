<?php
class Users extends MySQL {		  
	public function alreadyUsername($username) {
		$this->theUsername = $username;
		
		$stmt = $this->connect()->prepare('SELECT * FROM users WHERE userName=?');
		$stmt->execute([$username]);
		
		$user = $stmt->rowCount();
		
		$false = "false";
		$true = "true";
		
		if ($user >= 1) {
			return $true;
		} elseif ($user == 0) {
			return $false;
		}
	}
	
	public function alreadyEmail($email) {
		$this->theEmail = $email;
		
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
	
	public function signTheUserUp($firstname, $lastname, $username, $email, $hashedPassword, $country, $timezone, $avatarPath, $userlevel, $view, $profileStatus) {

		$this->signupFirst = $firstname;
		$this->signupLast = $lastname;
		$this->signupUserName = $username;
		$this->signupEmail = $email;
		$this->signupPassword = $hashedPassword;
		$this->signupCountry = $country;
		$this->signupTimeZone = $timezone;
		$this->signupAvatar = $avatarPath;
		$this->signupUserLevel = $userlevel;
		$this->signupViews = $view;
		$this->signupStatus = $profileStatus;
		
		$stmt = $this->connect()->prepare('INSERT INTO users (userFirstName, userLastName, userName, userEmail, userPassword, userCountry, userTimeZone, userAvatar, userLevel, profileViews, setupProfile) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
		$stmt->execute([$firstname, $lastname, $username, $email, $hashedPassword, $country, $timezone, $avatarPath, $userlevel, $view, $profileStatus]);
		
		$false = "false";
		$true = "true";				
		
		if ($stmt->rowCount()) {
			return $true;
		} else {
			return $false;
		}
	}
	
	public function userLoginCheck() {
		$username = $_POST['username'];
		
		$stmt = $this->connect()->prepare('SELECT * FROM users WHERE userName=? OR userEmail=?');
		$stmt->execute([$username, $username]);
		
		$user = $stmt->rowCount();
		
		$false = "false";
		$true = "true";
		
		if ($user >= 1) {
			return $true;
		} elseif ($user == 0) {
			return $false;
		}
	}
	
	public function passCheck() {
		$username = $_POST['username'];
		
		$stmt = $this->connect()->prepare('SELECT * FROM users WHERE userName=?  OR userEmail=?');
		$stmt->execute([$username, $username]);
		
		while ($row = $stmt->fetch()) {
			$password = $row['userPassword'];
			return $password;
		}
	}
	
	public function loginUser() {
		$username = $_POST['username'];
		
		try{ // Check connection before executing the SQL query 
			$stmt = $this->connect()->prepare('SELECT * FROM users WHERE userName=?  OR userEmail=?');
			$stmt->execute([$username, $username]);
			
			while ($row = $stmt->fetch()) {
				$sessionBind = $_SESSION['uID'] = $row['userID'];
				$sessionBind .= $_SESSION['uFirst'] = $row['userFirstName'];
				$sessionBind .= $_SESSION['uLast'] = $row['userLastName'];
				$sessionBind .= $_SESSION['userName'] = $row['userName'];
				$sessionBind .= $_SESSION['uEmail'] = $row['userEmail'];
				$sessionBind .= $_SESSION['uCountry'] = $row['userCountry'];
				$sessionBind .= $_SESSION['uTimeZone'] = $row['userTimeZone'];
				$sessionBind .= $_SESSION['uAvatar'] = $row['userAvatar'];
				$sessionBind .= $_SESSION['uLevel'] = $row['userLevel'];
				return $sessionBind;
			}
			
			//Close the connection to the database.
			$pdo = null;
		} catch(PDOException $e) {
			/**
			* You can log PDO exceptions to PHP's system logger, using the
			* log engine of the operating system
			*
			* For more logging options visit http://php.net/manual/en/function.error-log.php
			*/
			error_log('PDOException - ' . $e->getMessage(), 0);
			/**
			* Stop executing, return an Internal Server Error HTTP status code (500),
			* and display an error
			*/
			http_response_code(500);
			die('Error establishing connection with database');
		}
		/*
		$stmt = $this->connect()->prepare('SELECT * FROM users WHERE username=?  OR emailAddress=?');
		$stmt->execute([$username, $username]);
		
		while ($row = $stmt->fetch()) {
			$sessionBind = $_SESSION['uID'] = $row['userID'];
			$sessionBind .= $_SESSION['uFirst'] = $row['userFirstName'];
			$sessionBind .= $_SESSION['uLast'] = $row['userLastName'];
			$sessionBind .= $_SESSION['userName'] = $row['usernNme'];
			$sessionBind .= $_SESSION['uEmail'] = $row['userEmail'];
			$sessionBind .= $_SESSION['uCountry'] = $row['userCountry'];
			$sessionBind .= $_SESSION['uTimeZone'] = $row['userTimeZone'];
			$sessionBind .= $_SESSION['uAvatar'] = $row['userAvatar'];
			$sessionBind .= $_SESSION['uLevel'] = $row['userLevel'];
			return $sessionBind;
		}*/
	}
	
	public function getUser($userID) {
		$this->theID = $userID;
		
		$stmt = $this->connect()->prepare('SELECT * FROM users WHERE userID=?');
		$stmt->execute(["$userID"]);
		
		$profile = $stmt->fetch();
	  
	  	return $profile;
	}
	
	public function getUsers() {
		$statement = $this->connect()->prepare('SELECT * FROM users');
		
		$statement->execute();
		
		$result = $statement->fetchAll();
		$number_of_rows = $statement->rowCount();
		
		$output = '';
		
		if($number_of_rows > 0) {
		$count = 0;
		foreach($result as $row) {
		$count ++; 
		$output .= '
		<article class="adminAccountProfileWrap">
          <img src="'.$row['userAvatar'].'" class="avatarSearch" alt="Thumbnail '.$row['userName'].'">

          <a href="../profile?id='.$row['userName'].'">
            <h3>'.$row['userName'].'</h3>
          </a>

          <a href="edit_account?id='.$row['userID'].'" class="button dashboard">Edit User</a>

          <form method="post" action="../../controllers/database/editAccount.database.php">
            <input hidden name="profileIDDel" value="'.$row['userID'].'">
            <input hidden name="profileUNameDel" value="'.$row['userName'].'">
            <button class="submitButton delete" type="submit" name="deleteAccountAdmin">Delete User</button>
          </form>
		</article>
		';
		}
		} else {
		$output .= '
		<h3>No Data Found</h3>
		';
		}
		echo $output;
	}

	public function usersVideoEdit() {
		$statement = $this->connect()->prepare('SELECT * FROM users');
		
		$statement->execute();
		
		$result = $statement->fetchAll();
		$number_of_rows = $statement->rowCount();
		
		$output = '';
		
		if($number_of_rows > 0) {
		$count = 0;
		foreach($result as $row) {
			$count ++; 
			$output .= '
				<option value="'.$row['userName'].'">'.$row['userName'].'</option>
			';
		}
		} else {
		$output .= '
			<h3>No User\'s Found</h3>
		';
		}
		echo $output;
	}
	
	public function updateUserNP($accountName, $accountFirst, $accountLast, $accountEmail, $accountCountry, $accountTimeZone, $accountDescription, $accountTags, $accountLinks, $accountUserLevel) {
		$this->username = $accountName;
		$this->first = $accountFirst;
		$this->last = $accountLast;
		$this->email = $accountEmail;
		$this->country = $accountCountry;
		$this->timezone = $accountTimeZone;
		$this->description = $accountDescription;
		$this->tags = $accountTags;
		$this->links = $accountLinks;
		$this->userLevel = $accountUserLevel;
		
		$stmt = $this->connect()->prepare('UPDATE users SET userFirstName=?, userLastName=?, userEmail=?, userCountry=?, userTImezone=?, userDescription=?, accountTags=?, userLinks=?, userLevel=? WHERE userName=?');
		$stmt->execute([$accountFirst, $accountLast, $accountEmail, $accountCountry, $accountTimeZone, $accountDescription, $accountTags, $accountLinks, $accountUserLevel, $accountName]);
		
		$false = "false";
		$true = "true";				
		
		if ($stmt->rowCount()) {
		return $true;
		} else {
		return $false;
		}
	}

	public function updateUserP($accountName, $accountFirst, $accountLast, $accountEmail, $hashedPassword, $accountCountry, $accountTimeZone, $accountDescription, $accountTags, $accountLinks, $accountUserLevel) {
		$this->username = $accountName;
		$this->first = $accountFirst;
		$this->last = $accountLast;
		$this->email = $accountEmail;
		$this->password = $hashedPassword;
		$this->country = $accountCountry;
		$this->timezone = $accountTimeZone;
		$this->description = $accountDescription;
		$this->tags = $accountTags;
		$this->links = $accountLinks;
		$this->userLevel = $accountUserLevel;
		
		$stmt = $this->connect()->prepare('UPDATE users SET userFirstName=?, userLastName=?, userEmail=?, userPassword=?. userCountry=?, userTImezone=?, userDescription=?, accountTags=?, userLinks=?, userLevel=? WHERE userName=?');
		$stmt->execute([$accountFirst, $accountLast, $accountEmail, $hashedPassword, $accountCountry, $accountTimeZone, $accountDescription, $accountTags, $accountLinks, $accountUserLevel, $accountName]);
		
		$false = "false";
		$true = "true";				
		
		if ($stmt->rowCount()) {
		return $true;
		} else {
		return $false;
		}
	}

	public function updateAccountNP($accountName, $accountFirst, $accountLast, $accountEmail, $accountCountry, $accountTimeZone) {
		$this->username = $accountName;
		$this->first = $accountFirst;
		$this->last = $accountLast;
		$this->email = $accountEmail;
		$this->country = $accountCountry;
		$this->timezone = $accountTimeZone;
		
		$stmt = $this->connect()->prepare('UPDATE users SET userFirstName=?, userLastName=?, userEmail=?, userCountry=?, userTImezone=? WHERE userName=?');
		$stmt->execute([$accountFirst, $accountLast, $accountEmail, $accountCountry, $accountTimeZone, $accountName]);
		
		$false = "false";
		$true = "true";				
		
		if ($stmt->rowCount()) {
		return $true;
		} else {
		return $false;
		}
	}

	public function updateAccountP($accountName, $accountFirst, $accountLast, $accountEmail, $hashedPassword, $accountCountry, $accountTimeZone) {
		$this->username = $accountName;
		$this->first = $accountFirst;
		$this->last = $accountLast;
		$this->email = $accountEmail;
		$this->password = $hashedPassword;
		$this->country = $accountCountry;
		$this->timezone = $accountTimeZone;
		
		$stmt = $this->connect()->prepare('UPDATE users SET userFirstName=?, userLastName=?, userEmail=?, userPassword=?. userCountry=?, userTImezone=? WHERE userName=?');
		$stmt->execute([$accountFirst, $accountLast, $accountEmail, $hashedPassword, $accountCountry, $accountTimeZone, $accountName]);
		
		$false = "false";
		$true = "true";				
		
		if ($stmt->rowCount()) {
		return $true;
		} else {
		return $false;
		}
	}
	
	public function updateProfile($accountName, $accountDescription, $accountTags, $accountLinks, $profileStatus) {
	
		$this->username = $accountName;
		$this->description = $accountDescription;
		$this->tags = $accountTags;
		$this->links = $accountLinks;
		$this->status = $profileStatus;
	
		$stmt = $this->connect()->prepare('UPDATE users SET userDescription=?, accountTags=?, userLinks=?, setupProfile=? WHERE userName=?');
		$stmt->execute([$accountDescription, $accountTags, $accountLinks, $profileStatus, $accountName]);
	
		$false = "false";
		$true = "true";				
		
		if ($stmt->rowCount()) {
			return $true;
		} else {
			return $false;
		}
	}

	public function followingCheck ($userID) {
		$this->follower = $userID;
		
		$stmt = $this->connect()->prepare('SELECT * FROM following WHERE followerID=?');
		$stmt->execute([$userID]);
		
		$fetchFollower = $stmt->fetch();
		
		$followerList = $fetchFollower['followingID'];
		
		return $followExpload = explode(" / ", $followerList);
		
		/*$followIDFollowing = implode(" / ",$followExpload);
		
		$false = "false";
		$true = "true";				
		
		if ($stmt->rowCount()) {
			return $true;
		} else {
			return $false;
		}*/
		/*
		//$follower = $_SESSION['uID'];
		//$following = $_POST['followID'];
		
		$sqlFollowStart = "SELECT * FROM following WHERE follower_id = '$follower'";
		$querryStart = mysqli_query($mySQL, $sqlFollowStart);
		
		$followingSQL = "SELECT following_id FROM following WHERE follower_id = '" . mysqli_escape_string($mySQL, $follower) . "';";
		$followResult = mysqli_query($mySQL, $followingSQL);
		$followRow = mysqli_fetch_assoc($followResult);
		
		$followExpload = explode(" / ", $followRow['following_id']);
		
		$followIDFollowing = implode(" / ",$followExpload);*/
	}
	
	public function statusCheck($username) {
		$this->theUsername = $username;
		
		$stmt = $this->connect()->prepare('SELECT * FROM users WHERE userName=?');
		$stmt->execute([$username]);
		
		$fetchProfile = $stmt->fetch();
		
		$status = $fetchProfile['setupProfile'];
		
		$yes = 0;
		$no = 1;
		
		if ($status == 1) {
			return $no;
		} elseif ($status == 0) {
			return $yes;
		}
	}

	public function getProfile($accountID) {
		$this->userID = $accountID;
			  
	  $stmt = $this->connect()->prepare('SELECT * FROM users WHERE userName=?');
	  $stmt->execute([$accountID]);
	  
	  $profile = $stmt->fetch();
	  
	  return $profile;
	}

	public function searchOpusCreator($search) {
		$this->searchWord = $search;

		$searchTheWord = "%".$search."%";

        $statement = $this->connect()->prepare('SELECT * FROM users WHERE userName LIKE ? OR userCountry LIKE ? OR userDescription LIKE ? OR accountTags LIKE ?');
		$statement->execute([$searchTheWord, $searchTheWord, $searchTheWord, $searchTheWord]);
                   
		$result = $statement->fetchAll();
		$number_of_rows = $statement->rowCount();
		
		$output = '';
	
		if($number_of_rows > 0) {
			$count = 0;
			foreach($result as $row) {
				$count ++; 
				$output .= '
				<article class="searchProfileWrap">
					<img src="'.$row['userAvatar'].'" class="avatarSearch" alt="Thumbnail '.$row['userName'].'">
					<a href="profile?id='.$row['userName'].'">
					<h3>'.$row['userName'].'</h3>
					</a>
				</article>
				';
			}
		} else {
			$output .= '
			<br>
			<h3>Sorry, No User\'s Found</h3>
			';
		}
		echo $output;
	}
}