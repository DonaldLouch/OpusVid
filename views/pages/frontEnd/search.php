<?php 
require '../../blades/head.php';

$search = $_POST['search'];
$videoClass = new Video;
$userClass = new Users;
?>
<body>
  <script> document.title = "Search | <?php echo $websiteName; ?>"</script>
	<div id="vidHeader">
    <?php  include '../../blades/menu.php'; ?>
  </div>

	<main>
		<section id="search" style="margin-top: 5em;" class="wrapper">
    <?php if (isset($_POST['submit'])) { ?>
      <div class="videoWrap">
        <?php $videoClass->searchVideos($search); ?>
      </div>
      <div>
        <?php $userClass->searchOpusCreator($search); ?>
      </div>

  <?php } else { ?>
        <div class="errorMessage">
          <h3>No results found. Please try another keyword!</h3>
        </div>
  <?php } ?>

  </section>
  <?php require '../../blades/footer.php'; ?>
