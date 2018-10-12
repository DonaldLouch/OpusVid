<?php
session_start();

include '../../../database/db_connect.php';
include '../../../database/db_player_category.php';

include '../../page-templates/head.php';
?>
	<body>
		<script>
			document.title = "<?php echo $_GET['type']; ?> (<?php echo $queryResultPlayer; ?>) | Opus Vid";
		</script>
    <?php include '../../page-templates/header.php';?>
		<div class="wrapper">
      <h1>"<strong><?php echo $playerID ?></strong>" has <strong><?php echo $queryResultPlayer; ?></strong> video(s) in the category!</h1>
      <div class="videoWrap">
      <?php if ($queryResultPlayer > 0) {
       foreach ($players as $player){ ?>
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
      <?php } } else { ?>
        </div>
        <div class="errorMessage">
          <p>It seems that there's been no videos uploaded to the category "<strong><?php echo $_GET['type']; ?></strong>"!</p>
      </div>
      <?php } ?>
    </div>
		<div id="pagination_controls">
			<?php echo $paginationControls; ?>
		</div>
	 </div>
    <?php include '../../page-templates/footer.php'; ?>