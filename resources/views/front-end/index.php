<?php
session_start();
include('../../../database/db_connect.php');
include('../../../database/db_player.php');

$player = new Player;
$players = $player->fetch_all();

include '../../page-templates/head.php';
?>

	<body>
    <?php include '../../page-templates/header.php'; ?>
		<div class="wrapper">
      <div class="videoWrap">
      <?php foreach ($players as $player){ ?>
        <article id="" class="">
          <a href="player.php?id=<?php echo $player['id']; ?>" class="noLink">
            <img src="<?php echo $player['thumbnail_path']; ?>" class="thumbnailHome">
          </a>
            <h3><?php echo $player['video_title']; ?></h3>
            <h5>By: <?php echo $player['opus_creator']; ?> <span>on <?php echo date('D M j, Y' , $player['uploaded_on']); ?> </span></h5>
            <p><?php echo $player['short_description']; ?></p>
            <a href="player?id=<?php echo $player['id']; ?>" class="button">Watch Video!</a>
        </article>
      <?php } ?>
    </div>
	 </div>
    <?php include '../../page-templates/footer.php'; ?>
