<?php

session_start();

include '../../../database/db_connect.php';
if (isset($_POST['submit'])) {
  include '../../../database/db_search.php';
  include '../../page-templates/head.php';
?>

  <body>
    <script> document.title = "<?php echo $search; ?> (<?php echo $queryResult + $queryResultUser; ?>) | OpusVid"; </script>
    <?php include '../../page-templates/header.php'; ?>
    <div class="wrapper">
      <h2 class="pageTitle">"<strong><?php echo $search ?></strong>" has <strong><?php echo $queryResult; ?></strong> video(s) and <strong><?php echo $queryResultUser; ?></strong> user(s)</h2>
      <div class="videoWrap">

        <!--<php
          if($queryResult > 0){
            while ($searchRow = mysqli_fetch_assoc($result)){ ?>-->
            <?php if($queryResult > 0){
              foreach ($players as $player) { ?>
              <article id="<?php echo $player['id']; ?>">
                <a href="player.php?id=<?php echo $player['id']; ?>" class="noLink">
                  <img src="<?php echo $player['thumbnail_path']; ?>" class="thumbnailHome" alt="Thumbnail <?php echo $player['id']; ?>">
                </a>
                  <h3><?php echo $player['video_title']; ?></h3>
                  <h5>By: <?php echo $player['opus_creator']; ?> <span>on <?php echo date('D M j, Y' , $player['uploaded_on']); ?> </span></h5>
                  <p><?php echo $player['short_description']; ?></p>
                  <a href="player?id=<?php echo $player['id']; ?>" class="button">Watch Video!</a>
              </article>
            <?php }
            } else { ?>
              </div>
              <div class="errorMessage">
                <h3>No results found. Please try another keyword!</h3>
              </div>
          <?php } ?>
      </div>

      <div>
        <?php foreach ($collections as $collection) { ?>
          <div class="searchCollectionWrap">

            <div class="videoInfo">
              <h3><?php echo $collection['collection_title']; ?></h3>
              <p>Created On: <?php echo date('D M j, Y', $collection['created_on']); ?> | Last Updated: <?php echo date('D M j, Y', $collection['last_updated']); ?></p>
            </div>

            <a href="../collection?id=<?php echo $collection['id']; ?>" class="button dashboard">View Collection</a>
          </div>
      <?php } ?>
      </div>

      <div>
        <?php foreach ($profiles as $profile) { ?>
          <article class="searchProfileWrap">
            <img src="<?php echo $profile['avatar']; ?>" class="avatarSearch" alt="Thumbnail <?php echo $profile['username']; ?>">
            <a href="profile?id=<?php echo $profile['username']; ?>">
              <h3><?php echo $profile['username']; ?></h3>
            </a>
          </article>
      <?php } ?>
    </div>
  </div>
    <?php include '../../page-templates/footer.php'; ?>
<?php } ?>
