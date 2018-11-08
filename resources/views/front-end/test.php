<?php
session_start();

require '../../page-templates/head.php';

if (!isset($_SESSION['uID']) || isset($_POST['allVid']) || mysqli_num_rows($searchRow) == 0) {
	include '../../../database/db_player.php'; ?>
	<body>
		<script> document.title = "Opus Vid"; </script>
    <?php include '../../page-templates/header.php';?>
		<div class="wrapper">
			<h2 class="pageTitle">All Feed</h2>
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
            <a href="player?id=<?php echo $player['id']; ?>" class="button">Watch Video!</a>
        </article>
      <?php } ?>
    </div>
		<div id="pagination_controls">
			 <?php echo $paginationControls;
			  if(isset($_SESSION['uID'])) { ?>
 				<form action="test" method="post" class="follow feed">
 					<button type="submit" name="followVid">View All Videos From The Creators You Follow</button>
 	    	</form>
 			<?php } ?>
		</div>
		</div>
<?php } elseif (isset($_SESSION['uID']) || isset($_POST['followVid'])) {
	include '../../../database/follow_feed.php'; ?>
	<body>
		<script> document.title = "Follow Feed | Opus Vid"; </script>
    <?php include '../../page-templates/header.php';?>
		<div class="wrapper">
			<h2 class="pageTitle">Followers Feed</h2>
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
	            <a href="player?id=<?php echo $player['id']; ?>" class="button">Watch Video!</a>
	        </article>
	      <?php }?>
	    </div> <!-- videoWrap -->
	 	</div><!-- followWrap -->
		<div id="pagination_controls">
			<?php echo $paginationControls; ?>
			<form action="test" method="post" class="follow feed">
				<button type="submit" name="allVid">View All Videos on Opus Vid</button>
    	</form>
		</div> <!-- pagination_controls -->
	</div> <!-- wrapper -->
	<?php } ?>
  <?php include '../../page-templates/footer.php';?>
