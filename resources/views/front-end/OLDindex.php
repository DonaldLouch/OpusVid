<?php
session_start();

include '../../../database/db_connect.php';
include '../../../database/db_player.php';

include '../../page-templates/head.php';
?>

	<body>
		<script>
			document.title = "Opus Vid";
		</script>
    <?php include '../../page-templates/header.php';?>
		<div class="wrapper">
      <div class="videoWrap">
      <?php
			/*if (isset($_SESSION['uID'])) {
				echo "Your logged in: Fetching videos from followers!";
			} else {*/
			foreach ($players as $player){ ?>
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
			<?php echo $paginationControls; ?>
		</div>
	 </div>
    <?php include '../../page-templates/footer.php';?>