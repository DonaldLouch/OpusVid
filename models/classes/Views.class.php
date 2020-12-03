<?php
	class Views extends MySQL {
		public function updateVideoViews($videoID) {
			$this->id = $videoID;
			
			$stmt = $this->connect()->prepare("UPDATE videos SET views = views + 1 WHERE id=?");
			$stmt->execute([$videoID]);
		}
		
		public function updateProfileViews($profileID) {
			$this->id = $profileID;
			
			$stmt = $this->connect()->prepare("UPDATE users SET profileViews = profileViews + 1 WHERE userID=?");
			$stmt->execute([$profileID]);
		}
		
		public function videoViewCount($userName) {
			$this->name = $userName;
			
			$stmt = $this->connect()->prepare("SELECT SUM(views) FROM videos WHERE opusCreator=?");
			$stmt->execute([$userName]);
			$total = $stmt->fetch(PDO::FETCH_NUM);
			$numberOfViews = $total[0];
			
			if ($numberOfViews === 1) {
				return "1 View";
			} elseif ($numberOfViews > 1) {
				$commentText = $numberOfViews." Views";
				return $commentText;
			}elseif ($numberOfViews === 0) {
				return "No Views";
			}
		}
		
		public function profileViewCount($userName) {
			$this->name = $userName;
			
			$stmt = $this->connect()->prepare("SELECT SUM(profileViews) FROM users WHERE userName=?");
			$stmt->execute([$userName]);
			$total = $stmt->fetch(PDO::FETCH_NUM);
			$numberOfViews = $total[0];
			
			if ($numberOfViews === 1) {
				return "1 View";
			} elseif ($numberOfViews > 1) {
				$commentText = $numberOfViews." Views";
				return $commentText;
			}elseif ($numberOfViews === 0) {
				return "No Views";
			}
		}
	}