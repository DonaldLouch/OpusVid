<?php 
require '../../blades/head.php';

$category = $_GET['type'];

?>
<body>
  <script> document.title = "<?php echo $category; ?> | <?php echo $websiteName; ?>"</script>
	<div id="vidHeader">
    <?php  include '../../blades/menu.php'; ?>
  </div>

	<main>
		<section id="category" style="margin: 5em 1% 4em;">
        <?php 
          $video = new Video;
          $postSet = $video->allCategoryPost($category);
        ?>
		</section>
	</main>

	<?php require '../../blades/footer.php'; ?>
