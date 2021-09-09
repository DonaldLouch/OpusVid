<?php
class Video extends MySQL {		  
	public function videoFeed($userID, $userName) {
		$this->id = $userID;
		$this->name = $userName;

		$countStatement = $this->connect()->prepare('SELECT COUNT(orderNumber) FROM videos WHERE privacy=\'public\'');
		$countStatement->execute();
		$row = $countStatement->fetch();
		$rows = $row[0];

		$per_page = 16;

		include '../../blades/paginationInit.php';

		$statement = $this->connect()->prepare('SELECT * FROM videos WHERE privacy=\'public\' ORDER BY orderNumber DESC LIMIT ?,?');

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
					<article id="'.$row['id'].'" class="videoCard">
						<a href="player?id='.$row['id'].'" class="noLink">
							<img src="'.$row['thumbnailPath'].'" class="thumbnailHome" alt="Thumbnail '.$row['id'].'">
							<h3>'.$row['videoTitle'].'</h3>
							<h5>By: <a href="profile?id='.$row['opusCreator'].'">'.$row['opusCreator'].'</a> <span>on '.date('D M j, Y' , $row['uploadedOn']).' </span></h5>
						</a>
					</article>
				';
			}
			$output .= '
				</div> <!-- .videoFeed -->
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

	public function categoriesPage() {
		$statement = $this->connect()->prepare('SELECT * FROM category ORDER BY catSortID ASC');
		$statement->execute();

		$result = $statement->fetchAll();
		$number_of_rows = $statement->rowCount();

		$output = '';

		if($number_of_rows > 0) {
			$count = 0;
			foreach($result as $row) {
				$count ++; 
				$output .= '
					<a href="category?type='.$row['catSlug'].'">
						<div class="categoryCard" id="'.$row['catIDName'].'">
							<h3>'.$row['catName'].'</h3>
						</div>
					</a>
				';
			}
		} else {
		$output .= '
			<h3>Sorry, No Categories Found.</h3>
			<br>
		';
		}
		echo $output;
	}

	public function allCategoryPost($category) {
		$this->theCategory = $category;
		$categorySearch = "%".$category."%";

		$countStatement = $this->connect()->prepare('SELECT COUNT(orderNumber) FROM videos WHERE privacy = \'public\' AND category LIKE ?');
		$countStatement->execute([$categorySearch]);

		$row = $countStatement->fetch();
		$rows = $row[0];

		$per_page = 10;

		include '../../blades/paginationInit.php';

		$statement = $this->connect()->prepare('SELECT * FROM videos WHERE privacy = \'public\' AND category LIKE ? ORDER BY orderNumber DESC LIMIT ?,?');

		$statement->bindParam(1, $categorySearch,PDO::PARAM_STR);
		$statement->bindParam(2, $limit,PDO::PARAM_INT);
		$statement->bindParam(3, $per_page,PDO::PARAM_INT);
		$statement->execute();

		$result = $statement->fetchAll();
		$number_of_rows = $statement->rowCount();

		include '../../blades/paginationControlCat.php'; // Creates the pagination and the controls

		$output = '';
		if ($rows > 1) {
			$output .= '<h2 class="pageTitle">"<span class="pageTitleUp"><strong>'.$category.'</strong></span>" has <strong>'.$rows.'</strong> videos in it\'s category!</h2>';
		} elseif ($rows == 1) {
			$output .= '<h2 class="pageTitle">"<span class="pageTitleUp"><strong>'.$category.'</strong>" has <strong></span>'.$rows.'</strong> video in it\'s category!</h2>';
		} elseif ($rows == 0) {
			$output .= '
			<div class="errorMessage" style="margin-top: 3em;">
				<p>It seems that there\'s no videos under the category "<span class="pageTitleUp"><strong>'.$category.'</strong></span>"!</p>
			</div>';
		}

		if($number_of_rows > 0) {
			$count = 0;
			$output .= '
				<div class="videoFeed">
			';
			foreach($result as $row) {
				$count ++; 
				$output .= '
					<article id="'.$row['id'].'" class="videoCard">
						<a href="player?id='.$row['id'].'" class="noLink">
							<img src="'.$row['thumbnailPath'].'" class="thumbnailHome" alt="Thumbnail '.$row['id'].'">
							<h3>'.$row['videoTitle'].'</h3>
							<h5>By: <a href="profile?id='.$row['opusCreator'].'">'.$row['opusCreator'].'</a> <span>on '.date('D M j, Y' , $row['uploadedOn']).' </span></h5>
						</a>
					</article>
				';
			}
			$output .= '
				</div> <!-- .videoFeed -->
				<div id="pagination_controls">
					'.$paginationControls.'
				</div> 
			';
		} 
		echo $output;
	}

	public function profileVideoFeed($userID, $userName) {
		$this->id = $userID;
		$this->name = $userName;

		$countStatement = $this->connect()->prepare('SELECT COUNT(orderNumber) FROM videos WHERE privacy=\'public\' AND opusCreator=?');
		$countStatement->execute([$userName]);
		$row = $countStatement->fetch();
		$rows = $row[0];

		$per_page = 16;

		include '../../blades/paginationInit.php';

		$statement = $this->connect()->prepare('SELECT * FROM videos WHERE privacy=\'public\' AND opusCreator=? ORDER BY orderNumber DESC LIMIT ?,?');

		$statement->bindParam(1, $userName,PDO::PARAM_STR);
		$statement->bindParam(2, $limit,PDO::PARAM_INT);
		$statement->bindParam(3, $per_page,PDO::PARAM_INT);
		$statement->execute();

		$result = $statement->fetchAll();
		$number_of_rows = $statement->rowCount();

		include '../../blades/paginationControlProfile.php'; // Creates the pagination and the controls

		$output = '';

		if($number_of_rows > 0) {
			$count = 0;
			foreach($result as $row) {
				$count ++; 
				$output .= '
					<article id="'.$row['id'].'" class="videoCard">
						<a href="player?id='.$row['id'].'" class="noLink">
							<img src="'.$row['thumbnailPath'].'" class="thumbnailHome" alt="Thumbnail '.$row['id'].'">
							<h3>'.$row['videoTitle'].'</h3>
							<h5>By: <a href="profile?id='.$row['opusCreator'].'">'.$row['opusCreator'].'</a> <span>on '.date('D M j, Y' , $row['uploadedOn']).' </span></h5>
						</a>
					</article>
				';
			}
			$output .= '
				</div> <!-- .videoFeed -->
				<div id="pagination_controls" class="paginationProfile">
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

	public function playerPageCheck($playerID) {
		$this->id = $playerID;

		$stmt = $this->connect()->prepare('SELECT * FROM videos WHERE id=?');
		$stmt->execute([$playerID]);

		$videoCheck = $stmt->rowCount();

		$false = "false";
		$true = "true";

		if ($videoCheck >= 1) {
			return $true;
		} elseif ($videoCheck == 0) {
			return $false;
		}
	}

	public function playerPagePrivacyCheck($playerID) {
		$this->id = $playerID;

		$stmt = $this->connect()->prepare('SELECT * FROM videos WHERE id=?');
		$stmt->execute([$playerID]);

		$row = $stmt->fetch();

		$public = "public";
		$unlisted = "unlisted";
		$private = "private";

		$privacyCheck = $row['privacy'];

		if ($privacyCheck == "public") {
			return $public;
		} elseif ($privacyCheck == "unlisted") {
			return $unlisted;
		} elseif ($privacyCheck == "private") {
			return $private;
		}
	}

	public function playerPage($playerID) {
		$this->id = $playerID;
		$stmt = $this->connect()->prepare('SELECT * FROM videos WHERE id=?');
		$stmt->execute([$playerID]);

		$player = $stmt->fetch();

		return $player;
	}

	public function opusCreator($opusCreator) {
		$this->creator = $opusCreator;

		$stmt = $this->connect()->prepare('SELECT * FROM users WHERE userName=?');
		$stmt->execute([$opusCreator]);

		$creator = $stmt->fetch();

		return $creator;
	}

	public function manageVideoFeed($userName) {
		$this->name = $userName;

		$baseSTMT = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 9');

		while ($baseRow = $baseSTMT->fetch()) {
			$baseFileURL = $baseRow['settingValue'];
		}

		$countStatement = $this->connect()->prepare('SELECT COUNT(orderNumber) FROM videos WHERE opusCreator=?');
		$countStatement->execute(["$userName"]);
		$row = $countStatement->fetch();
		$rows = $row[0];

		$per_page = 16;

		include '../../blades/paginationInit.php';

		$statement = $this->connect()->prepare('SELECT * FROM videos WHERE opusCreator=? ORDER BY orderNumber DESC LIMIT ?,?');
		$statement->bindParam(1, $userName,PDO::PARAM_STR);
		$statement->bindParam(2, $limit,PDO::PARAM_INT);
		$statement->bindParam(3, $per_page,PDO::PARAM_INT);
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
				<article class="videoWrapper">
					<img class="thumbDash" src="'.$row['thumbnailPath'].'" alt="Thumbnail '.$row['id'].'">

					<div class="videoInfo">
					';
					if (isset($row['videoTitle'])) {
						$output .= '
							<h3>'.$row['videoTitle'].'</h3>
						';
					} else {
							$output .= '
							<h3 style="text-size: 1.5rem;">Please FInish The Upload Process By Editing Video (middle button to the right)</h3>
						';
					}
					$output .= '
						<p>Uploaded on: '.date('D M j, Y', $row['uploadedOn']).'</p>
					</div>

					<a href="../player?id='.$row['id'].'" class="videoManageButton">'.file_get_contents($baseFileURL."/ui/videoVector.svg").'</a>';

					if (isset($row['videoTitle'])) {
						$output .= '
							<a href="edit?id='.$row['id'].'" class="videoManageButton">'.file_get_contents($baseFileURL."/ui/videoEditVector.svg").'</a>
						';
					} else {
							$output .= '
							<a href="upload_s2?id='.$row['id'].'" class="videoManageButton">'.file_get_contents($baseFileURL."/ui/videoEditVector.svg").'</a>
						';
					}
				$output .= '
					<form method="post" action="../../controllers/database/videoDelete.database.php"  enctype="multipart/form-data">
						<input hidden name="id" value="'.$row['id'].'">
						<input hidden name="videoPath" value="'.$row['videoPath'].'">
						<input hidden name="thumbPath" value="'.$row['thumbnailPath'].'">
						<label name="delete" class="videoManagerButton">
							<input type="submit" style="display:none;" />
							'.file_get_contents($baseFileURL."/ui/videoDeleteVector.svg").'
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

	public function manageVideoFeedAdmin() {
		$baseSTMT = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 9');

		while ($baseRow = $baseSTMT->fetch()) {
			$baseFileURL = $baseRow['settingValue'];
		}

		$countStatement = $this->connect()->prepare('SELECT COUNT(orderNumber) FROM videos');
		$countStatement->execute();
		$row = $countStatement->fetch();
		$rows = $row[0];

		$per_page = 16;

		include '../../blades/paginationInit.php';

		$statement = $this->connect()->prepare('SELECT * FROM videos ORDER BY orderNumber DESC LIMIT ?,?');
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
				<article class="videoWrapper">
					<img class="thumbDash" src="'.$row['thumbnailPath'].'" alt="Thumbnail '.$row['id'].'">

					<div class="videoInfo">
						<h3>'.$row['videoTitle'].'</h3>
						<p>Uploaded on: '.date('D M j, Y', $row['uploadedOn']).'</p>
					</div>

					<a href="../player?id='.$row['id'].'" class="videoManageButton">'.file_get_contents($baseFileURL."/ui/videoVector.svg").'</a>

					<a href="edit_video?id='.$row['id'].'" class="videoManageButton">'.file_get_contents($baseFileURL."/ui/videoEditVector.svg").'</a>

					<form method="post" action="../../controllers/database/videoDelete.database.php"  enctype="multipart/form-data">
						<input hidden name="id" value="'.$row['id'].'">
						<input hidden name="videoPath" value="'.$row['videoPath'].'">
						<input hidden name="thumbPath" value="'.$row['thumbnailPath'].'">
						<label name="delete" class="videoManagerButton">
							<input type="submit" style="display:none;" />
							'.file_get_contents($baseFileURL."/ui/videoDeleteVector.svg").'
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

	public function manageVideoFeedMod() {
		$baseSTMT = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 9');

		while ($baseRow = $baseSTMT->fetch()) {
			$baseFileURL = $baseRow['settingValue'];
		}

		$countStatement = $this->connect()->prepare('SELECT COUNT(orderNumber) FROM videos');
		$countStatement->execute();
		$row = $countStatement->fetch();
		$rows = $row[0];

		$per_page = 16;

		include '../../blades/paginationInit.php';

		$statement = $this->connect()->prepare('SELECT * FROM videos ORDER BY orderNumber DESC LIMIT ?,?');
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
				<article class="videoWrapper">
					<img class="thumbDash" src="'.$row['thumbnailPath'].'" alt="Thumbnail '.$row['id'].'">

					<div class="videoInfo">
						<h3>'.$row['videoTitle'].'</h3>
						<p>Uploaded on: '.date('D M j, Y', $row['uploadedOn']).'</p>
					</div>

					<a href="../player?id='.$row['id'].'" class="videoManageButton">'.file_get_contents($baseFileURL."/ui/videoVector.svg").'</a>

					<a href="../admin/edit_video?id='.$row['id'].'" class="videoManageButton">'.file_get_contents($baseFileURL."/ui/videoEditVector.svg").'</a>

					<form method="post" action="../../controllers/database/videoDelete.database.php"  enctype="multipart/form-data">
						<input hidden name="id" value="'.$row['id'].'">
						<input hidden name="videoPath" value="'.$row['videoPath'].'">
						<input hidden name="thumbPath" value="'.$row['thumbnailPath'].'">
						<label name="delete" class="videoManagerButton">
							<input type="submit" style="display:none;" />
							'.file_get_contents($baseFileURL."/ui/videoDeleteVector.svg").'
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

	public function videoUpload($uploadID, $videoPath, $uploadOC, $uploadDate, $uploadPrivacy, $thumbPath, $views) {
		$this->id = $uploadID;
		$this->video = $videoPath;
		$this->opusCreator = $uploadOC;
		$this->date = $uploadDate;
		$this->privacy = $uploadPrivacy;
		$this->thumbnail = $thumbPath;
		$this->defaultViews = $views;

		$stmt = $this->connect()->prepare('INSERT INTO videos (id, videoPath, opusCreator, uploadedOn, privacy, thumbnailPath, views) VALUES (?,?,?,?,?,?,?)');
		$stmt->execute([$uploadID, $videoPath, $uploadOC, $uploadDate, $uploadPrivacy, $thumbPath, $views]);

		$video = $stmt->rowCount();

		$false = "false";
		$true = "true";

		if ($video >= 1) {
			return $true;
		} elseif ($video == 0) {
			return $false;
		}
	}

	public function videoUploadS3($uploadID, $uploadTitle, $uploadOC, $uploadDate, $uploadSDescription, $uploadDescription, $uploadCategory, $uploadTags, $uploadChapters, $uploadMusicCredit, $uploadVideoCredit, $uploadStaring, $links, $uploadPrivacy, $uploadComments) {
		$this->id = $uploadID;
		$this->title = $uploadTitle;
		$this->opusCreator = $uploadOC;
		$this->date = $uploadDate;
		$this->shortDescription = $uploadSDescription;
		$this->description = $uploadDescription;
		$this->category = $uploadCategory;
		$this->tags = $uploadTags;
		$this->chapters = $uploadChapters;
		$this->musicCredit = $uploadMusicCredit;
		$this->videoCredits = $uploadVideoCredit;
		$this->staring = $uploadStaring;
		$this->links = $links;
		$this->privacy = $uploadPrivacy;
		$this->comments = $uploadComments;

		$comments = 0;

		$stmt = $this->connect()->prepare('UPDATE videos SET videoTitle=?, opusCreator=?, uploadedOn=?, shortDescription=?, description=?, category=?, tags=?, chapters=?, musicCredit=?, videoCredits=?, staring=?, links=?, privacy=?, commentSetting=?, comments=? WHERE id=?');
		$stmt->execute([$uploadTitle, $uploadOC, $uploadDate, $uploadSDescription, $uploadDescription, $uploadCategory, $uploadTags, $uploadChapters, $uploadMusicCredit, $uploadVideoCredit, $uploadStaring, $links, $uploadPrivacy, $uploadComments, $comments, $uploadID]);

		$false = "false";
		$true = "true";			

		if ($stmt->rowCount()) {
			return $true;
		} else {
			return $false;
		}
	}

	public function searchVideos($search) {
		$this->searchWord = $search;

		$searchTheWord = "%".$search."%";

		$statement = $this->connect()->prepare('SELECT * FROM videos WHERE privacy = \'public\' AND videoTitle LIKE ? OR opusCreator LIKE ? OR shortDescription LIKE ? OR description LIKE ? OR category LIKE ? OR tags LIKE ? OR musicCredit LIKE ? OR videoCredits LIKE ? OR staring ORDER BY orderNumber DESC');
		$statement->execute([$searchTheWord, $searchTheWord, $searchTheWord, $searchTheWord, $searchTheWord, $searchTheWord, $searchTheWord, $searchTheWord]);

		$result = $statement->fetchAll();
		$number_of_rows = $statement->rowCount();

		$output = '';

		if($number_of_rows > 0) {
			$count = 0;
			foreach($result as $row) {
				$count ++; 
				$output .= '
					<article id="'.$row['id'].'" class="videoCard">
						<a href="player?id='.$row['id'].'" class="noLink">
							<img src="'.$row['thumbnailPath'].'" class="thumbnailHome" alt="Thumbnail '.$row['id'].'">
							<h3>'.$row['videoTitle'].'</h3>
							<h5>By: <a href="profile?id='.$row['opusCreator'].'">'.$row['opusCreator'].'</a> <span>on '.date('D M j, Y' , $row['uploadedOn']).' </span></h5>
						</a>
					</article>
				';
			}
		} else {
		$output .= '
			<h3>Sorry, No Video\'s Found</h3>
			<br>
		';
		}
		echo $output;
	}

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
					<div class="commentViewCWrap">';
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
										'.file_get_contents($baseFileURL."/ui/trashVector.svg").'
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
						<div class="commenterInfo">
							<h2><a href="profile?id='.$commenter['userName'].'">'.$commenter['userName'].'</a></h2>
							<h5>Commetned On: '.date('m/d/Y \a\t g:ia' , $row['postedOn']).'</h5>
						</div>
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

	public function updateVideo($uploadID, $uploadTitle, $uploadOC, $uploadSDescription, $uploadDescription, $uploadCategory, $uploadTags, $uploadChapters, $uploadMusicCredit, $uploadVideoCredit, $uploadStaring, $links, $uploadPrivacy, $uploadComments) {
		$this->id = $uploadID;
		$this->title = $uploadTitle;
		$this->opusCreator = $uploadOC;
		$this->shortDescription = $uploadSDescription;
		$this->description = $uploadDescription;
		$this->category = $uploadCategory;
		$this->tags = $uploadTags;
		$this->chapters = $uploadChapters;
		$this->musicCredit = $uploadMusicCredit;
		$this->videoCredits = $uploadVideoCredit;
		$this->staring = $uploadStaring;
		$this->links = $links;
		$this->privacy = $uploadPrivacy;
		$this->comments = $uploadComments;

		$stmt = $this->connect()->prepare('UPDATE videos SET videoTitle=?, opusCreator=?, shortDescription=?, description=?, category=?, tags=?, chapters=?, musicCredit=?, videoCredits=?, staring=?, links=?, privacy=?, commentSetting=? WHERE id=?');
		$stmt->execute([$uploadTitle, $uploadOC, $uploadSDescription, $uploadDescription, $uploadCategory, $uploadTags, $uploadChapters, $uploadMusicCredit, $uploadVideoCredit, $uploadStaring, $links, $uploadPrivacy, $uploadComments, $uploadID]);

		$false = "false";
		$true = "true";			

		if ($stmt->rowCount()) {
			return $true;
		} else {
			return $false;
		}
	}

	public function deleteVideo($playerID) {
		$this->id = $playerID;

		$stmt = $this->connect()->prepare('DELETE FROM videos WHERE id=?');
		$stmt->execute([$playerID]);
	}

	public function deleteAllUserVideos($profileName) {
		$this->name = $profileName;

		$statement = $this->connect()->prepare('SELECT * FROM videos WHERE opusCreator=?');
		$statement->execute([$profileName]);

		$result = $statement->fetchAll();
		$number_of_rows = $statement->rowCount();

		if($number_of_rows > 0) {
			foreach($result as $row) {
				$videoPath = $row['videoPath'];
				$thumbnailPath = $row['thumbnailPath'];
				$videoPathExplode = explode("/", $videoPath);
				$thumbPathExplode = explode("/", $thumbnailPath);
				
				$videoPath = $videoPathExplode[3]."/".$videoPathExplode[4]."/".$videoPathExplode[5];
				$thumbPath = $thumbPathExplode[3]."/".$thumbPathExplode[4]."/".$thumbPathExplode[5];
				
				include_once '../../do_spaces/spaces_config.php';
				
				$settingsSTMT = $this->connect()->prepare('SELECT * FROM settings WHERE settingOrder = 9');
				$settingsSTMT->execute();
				$setting = $settingsSTMT->fetch();
		
				$bucket = $setting['settingValue'];

				$spaces->deleteObject([
					'Bucket' => $bucket,
					'Key' => $videoPath
				]);
				
				$spaces->deleteObject([
					'Bucket' => $bucket,
					'Key' => $thumbPath
				]);

				$playerID = $row['id'];
				$stmt = $this->connect()->prepare('DELETE FROM videos WHERE id=?');
				$stmt->execute([$playerID]);
			}
		}
	}

	public function allTagVideos ($tag) {
		$this->videoTag = $tag;
		
		$videoSearch = "%".$tag."%";
		
		$countStatement = $this->connect()->prepare('SELECT COUNT(orderNumber) FROM videos WHERE privacy = \'public\' AND tags LIKE ?');
		$countStatement->execute([$videoSearch]);
		$row = $countStatement->fetch();
		$rows = $row[0];
		
		$per_page = 10;
		
		include '../../blades/paginationInit.php';
		
		$statement = $this->connect()->prepare('SELECT * FROM videos WHERE privacy = \'public\' AND tags LIKE ? ORDER BY orderNumber DESC LIMIT ?,?');
		
		$statement->bindParam(1, $videoSearch,PDO::PARAM_STR);
		$statement->bindParam(2, $limit,PDO::PARAM_INT);
		$statement->bindParam(3, $per_page,PDO::PARAM_INT);
		$statement->execute();
		
		$result = $statement->fetchAll();
		$number_of_rows = $statement->rowCount();
		
		include '../../blades/paginationControlCat.php'; // Creates the pagination and the controls
		
		$settingsSTMT = $this->connect()->prepare('SELECT * FROM settings WHERE settingOrder = 2');
		$settingsSTMT->execute();
		$setting = $settingsSTMT->fetch();

		$websiteName = $setting['settingValue'];
		$output = '';
		$output .= '<script> document.title = "'.$tag.' ('.$rows.') | '.$websiteName.'"</script>';
			
			if($number_of_rows > 0) {
				$count = 0;

				if ($number_of_rows >= 2) {
					$output .= '<h2 class="pageTitle">"<span class="pageTitleUp"><strong>'.$tag.'</strong></span>" has <strong>'.$rows.'</strong> videos in it\'s tag!</h2>';
				} elseif ($number_of_rows == 1) {
					$output .= '<h2 class="pageTitle">"<span class="pageTitleUp"><strong>'.$tag.'</strong></span>" has <strong>'.$rows.'</strong> video in it\'s tag!</h2>';
				} elseif ($number_of_rows == 0) {
					$output .= '
					<div class="errorMessage" style="margin-top: 3em;">
					<p>It seems that there\'s no videos under the tag "<span class="pageTitleUp"><strong>'.$tag.'</strong></span>"!</p>
					</div>';
				}

				$output .= '
				<div class="videoFeed">
			';
			foreach($result as $row) {
				$count ++; 
				$output .= '
					<article id="'.$row['id'].'" class="videoCard">
						<a href="player?id='.$row['id'].'" class="noLink">
							<img src="'.$row['thumbnailPath'].'" class="thumbnailHome" alt="Thumbnail '.$row['id'].'">
							<h3>'.$row['videoTitle'].'</h3>
							<h5>By: <a href="profile?id='.$row['opusCreator'].'">'.$row['opusCreator'].'</a> <span>on '.date('D M j, Y' , $row['uploadedOn']).' </span></h5>
						</a>
					</article>
				';
			}
			$output .= '
				</div> <!-- .videoFeed -->
				<div id="pagination_controls">
					'.$paginationControls.'
				</div> 
			';
			} 
			echo $output;   
    }
}