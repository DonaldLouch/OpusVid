<?php
  session_start();
  include '../../../database/db_connect.php';
  include '../../../database/db_profile.php';

  if ($userResult->num_rows > 0) {
        include '../../page-templates/head.php';
?>
        <body id="<?php echo $userRow['username']; ?>Profile">
          <script>
            document.title = "<?php echo $userRow['username']; ?> | Opus Vid";
          </script>
          <?php include '../../page-templates/header.php'; ?>
          <div class="profileWrap card">
            <img src="<?php echo $userRow['avatar']; ?>" class="avatarProfile" alt="<?php echo $userRow['username']; ?> Avatar">

            <?php if ($followResult->num_rows > 0) { ?>
              <form class="follow profile" method="post" action="../../database/db_follow.php">
                <input name="followID" value="<php echo $userRow['id']; ?>" hidden>
                <button type="submit" name="unfollow">Unfollow Opus Creator</button>
              </form>
            <?php } else { ?>
              <form class="follow profile" method="post" action="../../database/db_follow.php">
                <input name="followID" value="<?php echo $userRow['id']; ?>" hidden>
                <button type="submit" name="follow">Follow Opus Creator</button>
              </form>
              <?php }?>

            <h1><?php echo $userRow['username']; ?></h1>
            <h3>(<?php echo $userRow['first_name']; ?> <?php echo $userRow['last_name']; ?>) <span class="fromSpan">From <?php echo $userRow['country']; ?></span></h3>
            <p><?php echo $userRow['description']; ?></p>
            <p class="tags">Tags: <em><?php echo $userRow['account_tags']; ?></em></p>
            <p>Profile Views: <?php echo $userRow['views']; ?></p>
          </div>

          <div class="videoWrap">
          <?php foreach ($players as $player) { ?>
            <article id="<?php echo $player['id']; ?>">
                <a href="player.php?id=<?php echo $player['id']; ?>" class="noLink">
                  <img src="<?php echo $player['thumbnail_path']; ?>" class="thumbnailHome" alt="Thumbnail <?php echo $player['id']; ?>">
                </a>
                  <h3><?php echo $player['video_title']; ?></h3>
                  <h5>on <?php echo date('D M j, Y' , $player['uploaded_on']); ?></h5>
                  <p><?php echo $player['short_description']; ?></p>
                  <a href="player?id=<?php echo $player['id']; ?>" class="button">Watch Video!</a>
              </article>
          <?php } ?>
          </div>

          <?php include '../../page-templates/footer.php'; ?>

      <?php } else {
            echo "<h3>Sorry, this profile faild to load. Please try again or contact our support team at support@opusvid.com with the profile id:" . $profileID . " and we'll be happy to help you!</h3>";
      }; ?>
