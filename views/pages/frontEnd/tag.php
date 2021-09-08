<?php 
require '../../blades/head.php';

$tag = $_GET['type'];

?>

<body>
    <?php require '../../blades/menu.php';  ?>
    <main class="pageWrapper">
        <section id="category">
            <?php 
				$video = new Video;
				$postSet = $video->allTagVideos($tag);
			?>
        </section>
    </main>
    <?php require '../../blades/footer.php'; ?>