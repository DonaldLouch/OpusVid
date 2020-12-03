<?php 
require '../../blades/head.php';

$tag = $_GET['type'];

?>
<body>
	<?php require '../../blades/menu.php';  ?>
	<main>
		<section id="category" style="margin: 5em 1% 4em;">
			<?php 
				$video = new Video;
				$postSet = $video->allTagVideos($tag);
			?>
		</section>
	</main>
	<?php require '../../blades/footer.php'; ?>
