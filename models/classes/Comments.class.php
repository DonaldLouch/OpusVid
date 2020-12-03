<?php
class Comments extends MySQL {		  
	public function newComment($videoID, $commenterID, $commenterName, $commentBody, $currentTime) {
		$this->playerID = $videoID;
		$this->commentID = $commenterID;
		$this->commentName = $commenterName;
		$this->comment = $commentBody;
		$this->time = $currentTime;

		$stmt = $this->connect()->prepare('INSERT INTO comments (videoID, commenterID, commenterName, commentBody, postedOn) VALUES (?,?,?,?,?)');
		$stmt->execute([$videoID, $commenterID, $commenterName, $commentBody, $currentTime]);
		
		$comment = $stmt->rowCount();
		
		$false = "false";
		$true = "true";
		
		if ($comment >= 1) {
			return $true;
		} elseif ($comment == 0) {
			return $false;
		}
	}

	public function updateCommentCount($videoID) {
		$this->playerID = $videoID;

		$stmt = $this->connect()->prepare("UPDATE videos SET comments = comments + 1 WHERE id=?");
		$stmt->execute([$videoID]);
	}

	public function theComments($playerID, $baseFileURL) {
		$this->id = $playerID;
		$this->fileURL = $baseFileURL;
		
		$statement = $this->connect()->prepare('SELECT * FROM comments WHERE videoID=? ORDER BY commentID DESC');
		
		$statement->execute([$playerID]);
		
		$result = $statement->fetchAll();
		$number_of_rows = $statement->rowCount();
		
		$output = '';

		if($number_of_rows > 0) {
			$count = 0;
			foreach($result as $row) {
				$count ++; 
				$output .= '
					<article class="theComment" id="'.$row['commentID'].'">
						<div class="commentViewCWrap">
				';
				$videoSTMT = $this->connect()->prepare('SELECT * FROM videos WHERE id=?');
				$videoSTMT->execute([$playerID]);
				$video = $videoSTMT->fetch();

				if (!isset($_SESSION['uLevel'])) {
					$_SESSION['userName'] = null;
				}

				if (isset($_SESSION['uLevel']) && $_SESSION['uLevel'] == 'admin' || $_SESSION['userName'] == $row['commenterName'] || $_SESSION['userName'] == $video['opusCreator']) {
					$output .= '
							<form method="post" action="../../../controllers/database/comments.database.php" class="commentDelete">
								<input type="text" name="videoID" value="'.$playerID.'" hidden>
								<input type="text" name="commentID" value="'.$row['commentID'].'" hidden>
								<input type="text" name="commenterID" value="'.$row['commenterID'].'" hidden>
								<label>
									<input type="submit" name="deleteComment" style="display:none;" />
									'.file_get_contents($baseFileURL."/ui/videoUI/trashVector.svg").'
								</label>
							</form>
				';
				} else {}
					$commenterSTMT = $this->connect()->prepare('SELECT * FROM users WHERE userID=?');
					$commenterID = $row['commenterID'];
					$commenterSTMT->execute([$commenterID]);
					$commenter = $commenterSTMT->fetch();
					
					
					$output .= '
							<img src="'.$commenter['userAvatar'].'" alt="'.$commenter['userName'].'">
							<h2><a href="profile?id='.$commenter['userName'].'">'.$commenter['userName'].'</a></h2>
							<h5>Commetned On: '.date('m/d/Y \a\t g:ia' , $row['postedOn']).'</h5>
						</div>
						<p>'.$row['commentBody'].'</p>
					</article>
				';
			}
		} else {
			$output .= '
			<h3>Be the first to comment!</h3>
			';
		}
		echo $output;
	}

	public function theComment($commentID) {
		$this->id = $commentID;
			  
		$stmt = $this->connect()->prepare('SELECT * FROM comments WHERE commentID=?');
		$stmt->execute([$commentID]);
		
		$comment = $stmt->fetch();
		
		return $comment;
	}

	public function deleteComment($commentID) {
		$this->id = $commentID;

		$stmt = $this->connect()->prepare('DELETE FROM comments WHERE commentID=?');
		$stmt->execute([$commentID]);
	}

	public function removeCommentCount($videoID) {
		$this->playerID = $videoID;

		$stmt = $this->connect()->prepare("UPDATE videos SET comments = comments - 1 WHERE id=?");
		$stmt->execute([$videoID]);
	}

	public function manageCommentsAdmin() {
		$baseSTMT = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 15');

		while ($baseRow = $baseSTMT->fetch()) {
			$baseFileURL = $baseRow['settingValue'];
		}

		$countStatement = $this->connect()->prepare('SELECT COUNT(commentID) FROM comments');
		$countStatement->execute();
		$row = $countStatement->fetch();
		$rows = $row[0];

		$per_page = 16;

		include '../../blades/paginationInit.php';

		$statement = $this->connect()->prepare('SELECT * FROM comments ORDER BY commentID DESC LIMIT ?,?');
		$statement->bindParam(1, $limit,PDO::PARAM_INT);
		$statement->bindParam(2, $per_page,PDO::PARAM_INT);
		$statement->execute();

		$result = $statement->fetchAll();
		$number_of_rows = $statement->rowCount();

		include '../../blades/paginationControl.php'; // Creates the pagination and the controls

		$output = '';

		if($number_of_rows > 0) {
			$count = 0;
			foreach($result as $row) {
				$count ++; 
				$output .= '
				<article class="videoWrapper comment">
					<h3>Comment By: ('.$row['commenterID'].')'.$row['commenterName'].'</h3>
					<p>'.$row['commentBody'].'</p>
					<h5>Posted on: '.date('D M j, Y', $row['postedOn']).'</h5>

					<a href="../player?id='.$row['videoID'].'" class="videoManageButton">View Comment</a>

					<form method="post" action="../../../controllers/database/comments.database.php" class="commentDelete">
						<input type="text" name="videoID" value="'.$row['videoID'].'" hidden>
						<input type="text" name="commentID" value="'.$row['commentID'].'" hidden>
						<input type="text" name="commenterID" value="'.$row['commenterID'].'" hidden>
						<label>
							<input type="submit" name="deleteComment" style="display:none;" />
							'.file_get_contents($baseFileURL."/ui/videoUI/trashVector.svg").'
						</label>
					</form>
				</article>';
			}
			$output .= '
				<div id="pagination_controls">
					'.$paginationControls.'
				</div> 
			';
		} else {
		$output .= '
			<h3>No Video\'s Found</h3>
		';
		}
		echo $output;
	}

	public function manageCommentsMod() {
		$baseSTMT = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 15');

		while ($baseRow = $baseSTMT->fetch()) {
			$baseFileURL = $baseRow['settingValue'];
		}

		$countStatement = $this->connect()->prepare('SELECT COUNT(commentID) FROM comments');
		$countStatement->execute();
		$row = $countStatement->fetch();
		$rows = $row[0];

		$per_page = 16;

		include '../../blades/paginationInit.php';

		$statement = $this->connect()->prepare('SELECT * FROM comments ORDER BY commentID DESC LIMIT ?,?');
		$statement->bindParam(1, $limit,PDO::PARAM_INT);
		$statement->bindParam(2, $per_page,PDO::PARAM_INT);
		$statement->execute();

		$result = $statement->fetchAll();
		$number_of_rows = $statement->rowCount();

		include '../../blades/paginationControl.php'; // Creates the pagination and the controls

		$output = '';

		if($number_of_rows > 0) {
			$count = 0;
			foreach($result as $row) {
				$count ++; 
				$output .= '
				<article class="videoWrapper comment">
					<h3>Comment By: '.$row['commenterName'].'</h3>
					<p>'.$row['commentBody'].'</p>
					<h5>Posted on: '.date('D M j, Y', $row['postedOn']).'</h5>

					<a href="../player?id='.$row['videoID'].'" class="videoManageButton">View Comment</a>

					<form method="post" action="../../../controllers/database/comments.database.php" class="commentDelete">
						<input type="text" name="videoID" value="'.$row['videoID'].'" hidden>
						<input type="text" name="commentID" value="'.$row['commentID'].'" hidden>
						<input type="text" name="commenterID" value="'.$row['commenterID'].'" hidden>
						<label>
							<input type="submit" name="deleteComment" style="display:none;" />
							'.file_get_contents($baseFileURL."/ui/videoUI/trashVector.svg").'
						</label>
					</form>
				</article>';
			}
			$output .= '
				<div id="pagination_controls">
					'.$paginationControls.'
				</div> 
			';
		} else {
		$output .= '
			<h3>No Video\'s Found</h3>
		';
		}
		echo $output;
	}
}