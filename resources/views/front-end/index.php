<?php ob_start();
session_start();

include '../../../database/db_watch_later.php';
require '../../page-templates/head.php';


if (!isset($_SESSION['uID']) || isset($_POST['allVid']) || isset($_GET['no_follow'])) {
	include '../../../database/db_vid_feed.php'; ?>
	<body>
		<script> document.title = "OpusVid"; </script>
    <?php include '../../page-templates/header.php';?>
		<div class="wrapper">
			<?php if(isset($_GET['add'])){
		    $addError = $_GET['add'];
		    if($addError == "success"){ ?>
		      <div class="successMessage">
		        <p>Video Add Successfully To Watch Later!</p>
		      </div>
		  <?php }
		  }
		  ?>
			<div class="videoWrap">
      <?php foreach ($players as $player){ ?>
        <article id="<?php echo $player['id']; ?>">
          <a href="player?id=<?php echo $player['id']; ?>" class="noLink">
            <img src="<?php echo $player['thumbnail_path']; ?>" class="thumbnailHome" alt="Thumbnail <?php echo $player['id']; ?>">
          </a>
            <h3><?php echo $player['video_title']; ?></h3>
            <h5>By: <a href="profile?id=<?php echo $player['opus_creator']; ?>"><?php echo $player['opus_creator']; ?></a> <span>on <?php echo date('D M j, Y' , $player['uploaded_on']); ?> </span></h5>
            <p><?php echo $player['short_description']; ?></p>
						<p><em><?php echo $player['views']; ?> Views</em></p>
            <a href="player?id=<?php echo $player['id']; ?>" class="button">Watch Video!</a> <?php if(isset($_SESSION['uName'])) { ?> |
						<form id="watchLaterAdd" method="post" action="../../../database/db_watch_later_update.php">
				      <input type="text" name="username" value="<?php echo $profileID; ?>" placeholder="Username" hidden>
				      <input name="currentSelect" value="<?php echo $selectRow['videos']; ?>" hidden>
							<input type="checkbox" checked name ="videoSelect[]" id ="videoSelect" value="<?php echo $player['id'];?>" hidden>
							<button type="submit" name="add" class="buttonStyle">Watch Later</button>
						</form> <?php } ?>
        </article>
      <?php } ?>
    </div>
		<div id="pagination_controls">
			 <?php echo $paginationControls;
			  if(isset($_SESSION['uID']) && !isset($_GET['no_follow'])) { ?>
 				<form action="home" method="post" class="follow feed">
 					<button type="submit" name="followVid">View All Videos From The Creators You Follow</button>
 	    	</form>
 			<?php } ?>
		</div>
		</div>
<?php } elseif (isset($_SESSION['uID']) || isset($_POST['followVid'])) {
	include '../../../database/db_vid_feed_follow.php';
	if (mysqli_num_rows($followResults) == 0) {
		 header("Location: home?no_follow");
	} else {?>

		<body>
			<script> document.title = "Follow Feed | OpusVid"; </script>
	    <?php include '../../page-templates/header.php';?>
			<div class="wrapper">
				<h2 class="pageTitle">Followers Feed</h2>
				<?php if(isset($_GET['add'])){
			    $addError = $_GET['add'];
			    if($addError == "success"){ ?>
			      <div class="successMessage">
			        <p>Video Add Successfully To Watch Later!</p>
			      </div>
			  <?php }
			  }
			  ?>
				<div class="followWrap">
					<div id="followProfile">
							<?php foreach ($following as $follow) { ?>
								<div class="profileWrap">
									<a href="profile?id=<?php echo $follow['username']; ?>">
										<img src="<?php echo $follow['avatar']; ?>">
										<h3><?php echo $follow['username']; ?></h3>
									</a>
									<form class="follow feed" method="post" action="../../database/db_follow.php">
		                <input name="followID" value="<?php echo $userRow['id']; ?>" hidden>
		                <button type="submit" name="unfollow">Unfollow Opus Creator</button>
		              </form>
								</div>
							<?php } ?>
					</div>
		      <div class="videoWrap" id="followVideos">
					<?php foreach ($players as $player){ ?>
		        <article id="<?php echo $player['id']; ?>">
		          <a href="player.php?id=<?php echo $player['id']; ?>" class="noLink">
		            <img src="<?php echo $player['thumbnail_path']; ?>" class="thumbnailHome" alt="Thumbnail <?php echo $player['id']; ?>">
		          </a>
		            <h3><?php echo $player['video_title']; ?></h3>
		            <h5>By: <a href="profile?id=<?php echo $player['opus_creator']; ?>"><?php echo $player['opus_creator']; ?></a> <span>on <?php echo date('D M j, Y' , $player['uploaded_on']); ?> </span></h5>
		            <p><?php echo $player['short_description']; ?></p>
								<p><em><?php echo $player['views']; ?> Views</em></p>
		            <a href="player?id=<?php echo $player['id']; ?>" class="button">Watch Video!</a> <?php if(isset($_SESSION['uName'])) { ?> |
								<form id="watchLaterAdd" method="post" action="../../../database/db_watch_later_update.php">
						      <input type="text" name="username" value="<?php echo $_SESSION['uName']; ?>" placeholder="Username" hidden>
						      <input name="currentSelect" value="<?php echo $selectRow['videos']; ?>"hidden>
									<input type="checkbox" checked name ="videoSelect[]" id ="videoSelect" value="<?php echo $player['id'];?>" hidden>
									<button type="submit" name="add" class="buttonStyle">Watch Later</button>
								</form> <?php } ?>
		        </article>
		      <?php }?>
		    </div> <!-- videoWrap -->
		 	</div><!-- followWrap -->
			<div id="pagination_controls">
				<?php echo $paginationControls; ?>
				<form action="home" method="post" class="follow feed">
					<button type="submit" name="allVid">View All Videos on Opus Vid</button>
	    	</form>
			</div> <!-- pagination_controls -->
		</div> <!-- wrapper -->
	<?php }} ?>
  <?php include '../../page-templates/footer.php';
	ob_end_flush();?>
