<?php
  session_start();

  include '../../../database/db_connect.php';
  include '../../../database/db_player_page.php';

  $opusCreator = $_SESSION["uName"];

  if($resultPlayer->num_rows > 0) {
    while($player = $resultPlayer->fetch_assoc()) {
      if(!$player["privacy"] == 'private' || $opusCreator == $player["opus_creator"] || $_SESSION['uLevel'] == 'admin' ||  $_SESSION['uLevel'] == 'mod') {
        include '../../page-templates/head.php';
      ?>
        <body id="<?php echo $player["id"]; ?>">
          <script>  document.title = "<?php echo $player['video_title']; ?> | OpusVid"; </script>
          <div id="vidHeader">
            <?php include '../../page-templates/header.php'; ?>
          </div>
          <div class="playerWrap">
            <div class="outer-container" id="vidVidWrap">
              <div class="inner-container">
                <video id="player" controls="controls" src="<?php echo $player['video_path']; ?>" preload="auto" poster="<?php echo $player['thumbnail_path']; ?>"></video>
                <nav id="vidCon" class="vidConON"></nav>
              </div> <!-- .inner-container -->
            </div> <!-- .outer-container -->

            <div id="vidDescription">
              <section id="description">
                <div class="oCVidWrap">
                <?php if (in_array($user['id'], $followExpload) && isset($_SESSION['uID'])) {?>
                  <form class="follow collection" method="post" action="../../database/db_follow.php">
                    <input name="followID" value="<?php echo $user['username']; ?>" hidden>
                    <button type="submit" name="unfollow">Unfollow Opus Creator</button>
                  </form>
                <?php } elseif (!in_array($user['id'], $followExpload) && isset($_SESSION['uID'])) { ?>
                  <form class="follow collection" method="post" action="../../database/db_follow.php">
                    <input name="followID" value="<?php echo $user['username']; ?>" hidden>
                    <button type="submit" name="follow">Follow Opus Creator</button>
                  </form>
                <?php } ?>
                <img src="<?php echo $user['avatar']; ?>" alt="<?php echo $user['username']; ?>">
                <h1><?php echo $player["video_title"]; ?></h1>
                <h2>By: <a href="profile?id=<?php echo $player['opus_creator']; ?>"><?php echo $player['opus_creator']; ?></a> <span class="upDate"> on <?php echo date('D M j, Y' , $player['uploaded_on']); ?></span></h2>
              </div>
              <p><?php echo $player['short_description']; ?></p>
              <a class="toggleButton" onclick="toggle_visibility('fDescription')">Read Full Description</a>
                <section id="fDescription" class="panel">
                  <h3>Full Description</h3>
                  <p><?php echo $player['description']; ?></p>
                  <a class="toggleButton" onclick="toggle_visibility('metaData')">Meta Data</a>
                    <section id="metaData" class="panel">
                    <h3>Information</h3>
                    <article id="meta">
                      <dl>
                        <dt>Category<dt>
                          <dd><?php echo $player['category']; ?> <dd>
                        <dt>Tags</dt>
                          <dd><?php echo $player['tags']; ?></dd>
                        <dt>Music Credit</dt>
                          <dd><?php echo $player['music_credit']; ?></dd>
                        <?php if(!empty($player['filmed_on']) && !empty($player['filmed_by']) && !empty($player['filmed_at']) && !empty($player['filmed_date'])){ ?>
                        <dt>Filmed</dt>
                          <?php } if(!empty($player['filmed_on'])){ ?>
                          <dd>On:<?php echo $player['filmed_on']; ?></dd>
                          <?php } if(!empty($player['filmed_by'])){ ?>
                          <dd>By: <?php echo $player['filmed_by']; ?></dd>
                          <?php } if(!empty($player['filmed_at'])){ ?>
                          <dd>At: <?php echo $player['filmed_at']; ?></dd>
                        <?php } if(!empty($player['filmed_date'])){ ?>
                          <dd>On: <?php echo $player['filmed_date']; ?></dd>
                        <?php } if(!empty($player['audio_with']) && !empty($player['audio_by'])) { ?>
                        <dt>Audio Captured</dt>
                          <?php if(!empty($player['audio_with'])){ ?>
                          <dd>With:<?php echo $player['audio_with']; ?></dd>
                          <?php } if(!empty($player['audio_by'])){?>
                          <dd>By: <?php echo $player['audio_by']; ?></dd>
                        <?php }} if(!empty($player['edited_by']) && !empty($player['edited_on'])) { ?>
                        <dt>Edited</dt>
                          <?php if(!empty($player['edited_by'])){ ?>
                          <dd>By:<?php echo $player['edited_by']; ?></dd>
                          <?php } if(!empty($player['edited_on'])){?>
                          <dd>On: <?php echo $player['edited_on']; ?></dd>
                        <?php }} ?>
                        <?php if(!empty($player['staring'])){ ?>
                        <dt>Starting</dt>
                          <dd><?php echo $player['staring']; ?></dd>
                        <?php } ?>
                        <dt>Views<dt>
                          <dd>View Count: <?php echo $player['views']; ?><dd>
                      </dl>
                    </article> <!-- #meta -->
                    </section> <!-- #metaData -->
              </section> <!-- #fDescription -->
            </section> <!-- #description -->
          </div>
          </div> <!-- .playerWrap -->
          <footer id="vidFooter">
            <p>&copy; <?php echo date("Y");?> <a href="opusvid.com" title="Opus Vid">Opus Vid</a></p>
          </footer>
          <script src="resources/js/video.js"></script>
          <script src="resources/js/accordion.js"></script>
      </body>
    </html>
      <?php } elseif($player["privacy"] == 'public' or $player["privacy"] == 'unlisted') {
        include '../../page-templates/head.php';
      ?>
        <body>
          <script> document.title = "<?php echo $player['video_title']; ?> | OpusVid"; </script>

          <div id="vidHeader">
            <?php include '../../page-templates/header.php'; ?>
          </div>

          <div class="playerWrap">

            <div class="outer-container" id="vidVidWrap">
              <div class="inner-container">
                <video id="player" controls="controls" src="<?php echo $player['video_path']; ?>" preload="none" poster="<?php echo $player['thumbnail_path']; ?>"></video>
                <nav id="vidCon" class="vidConON"></nav>
<!--                 <nav id="vidCon"></nav> -->
              </div> <!-- .inner-container -->
            </div> <!-- .outer-container -->

            <div id="vidDescription">
	          <section id="description">
                <div class="oCVidWrap">
                  <?php if (in_array($userRow['id'], $followExpload) && isset($_SESSION['uID'])) {?>
                    <form class="follow player" method="post" action="../../database/db_follow.php">
                      <input name="followID" value="<?php echo $user['username']; ?>" hidden>
                      <button type="submit" name="unfollow">Unfollow Opus Creator</button>
                    </form>
                  <?php } elseif (!in_array($userRow['id'], $followExpload) && isset($_SESSION['uID'])) { ?>
                    <form class="follow player" method="post" action="../../database/db_follow.php">
                      <input name="followID" value="<?php echo $user['username']; ?>" hidden>
                      <button type="submit" name="follow">Follow Opus Creator</button>
                    </form>
                  <?php } ?>
                  <img src="<?php echo $user['avatar']; ?>" alt="<?php echo $user['username']; ?>">
                  <h1><?php echo $player["video_title"]; ?></h1>
                  <h2>By: <a href="profile?id=<?php echo $player['opus_creator']; ?>"><?php echo $player['opus_creator']; ?></a> <span class="upDate"> on <?php echo date('D M j, Y' , $player['uploaded_on']); ?></span></h2>
                </div>
                <!--<h1><?php echo $player["video_title"]; ?></h1>
                <h2>By: <a href="profile?id=<?php echo $player['opus_creator']; ?>"><?php echo $player['opus_creator']; ?></a> <span class="upDate"> on <?php echo date('D M j, Y' , $player['uploaded_on']); ?></span></h2>-->
                <p><?php echo $player['short_description']; ?></p>
                <a class="toggleButton" onclick="toggle_visibility('fDescription')">Read Full Description</a>
                  <section id="fDescription" class="panel">
                    <h3>Full Description</h3>
                    <p><?php echo $player['description']; ?></p>
                    <a class="toggleButton" onclick="toggle_visibility('metaData')">Meta Data</a>
                      <section id="metaData" class="panel">
                      <h3>Information</h3>
                      <article id="meta">
                        <dl>
                          <dt>Category<dt>
                            <dd><?php echo $player['category']; ?> <dd>
                          <dt>Tags</dt>
                            <dd><?php echo $player['tags']; ?></dd>
                          <dt>Music Credit</dt>
                            <dd><?php echo $player['music_credit']; ?></dd>
                          <?php if(!empty($player['filmed_on']) && !empty($player['filmed_by']) && !empty($player['filmed_at']) && !empty($player['filmed_date'])){ ?>
                          <dt>Filmed</dt>
                            <?php } if(!empty($player['filmed_on'])){ ?>
                            <dd>On:<?php echo $player['filmed_on']; ?></dd>
                            <?php } if(!empty($player['filmed_by'])){ ?>
                            <dd>By: <?php echo $player['filmed_by']; ?></dd>
                            <?php } if(!empty($player['filmed_at'])){ ?>
                            <dd>At: <?php echo $player['filmed_at']; ?></dd>
                          <?php } if(!empty($player['filmed_date'])){ ?>
                            <dd>On: <?php echo $player['filmed_date']; ?></dd>
                          <?php } if(!empty($player['audio_with']) && !empty($player['audio_by'])) { ?>
                          <dt>Audio Captured</dt>
                            <?php if(!empty($player['audio_with'])){ ?>
                            <dd>With:<?php echo $player['audio_with']; ?></dd>
                            <?php } if(!empty($player['audio_by'])){?>
                            <dd>By: <?php echo $player['audio_by']; ?></dd>
                          <?php }} if(!empty($player['edited_by']) && !empty($player['edited_on'])) { ?>
                          <dt>Edited</dt>
                            <?php if(!empty($player['edited_by'])){ ?>
                            <dd>By:<?php echo $player['edited_by']; ?></dd>
                            <?php } if(!empty($player['edited_on'])){?>
                            <dd>On: <?php echo $player['edited_on']; ?></dd>
                          <?php }} ?>
                          <?php if(!empty($player['staring'])){ ?>
                          <dt>Starting</dt>
                            <dd><?php echo $player['staring']; ?></dd>
                          <?php } ?>
                          <dt>Views<dt>
                            <dd>View Count: <?php echo $player['views']; ?><dd>
                        </dl>
                      </article> <!-- #meta -->
                      </section> <!-- #metaData -->
                </section> <!-- #fDescription -->
              </section> <!-- #description -->
            </div>
            </div> <!-- .playerWrap -->
            <footer id="vidFooter">
              <p>&copy; <?php echo date("Y");?> <a href="opusvid.com" title="Opus Vid">Opus Vid</a></p>
            </footer>
            <script src="resources/js/video.js"></script>
            <script src="resources/js/accordion.js"></script>
        </body>
      </html>

      <?php } else {
        include '../../page-templates/head.php';
      ?>
        <body id="<?php echo $player["id"]; ?>">
          <script>
            document.title = "PRIVATE VIDEO | OpusVid";
          </script>
          <?php include '../../page-templates/header.php'; ?>
          <div class="playerWrap">
            <div class="errorMessage">
              <h3>The video that you are trying to watch is currently listed as "Private" and can only be viewed by the Opus Creator or the Opus Team (level 0-2). If you think you should have access to this video try again or contact Opus Vid support at support@opusvid.com with the video id: "<?php echo $playerID; ?>" and we'll be happy to help you!</h3>
            </div>
            <h3><a href="home" class="button">Go Back Home</a></h3>
          </div>
          <div id="vidFooter" class="footer">
          <!-- <?php include '../../page-templates/footer.php'; ?> -->
            <footer>
              <p>&copy; <?php echo date("Y");?> <a href="opusvid.com" title="Opus Vid">Opus Vid</a></p>
            </footer>
          </div>
        </body>
      </html>

     <?php } //End of else
    } //End of while
  } else {
    include '../../page-templates/head.php';?>
    <body id="<?php echo $player["id"]; ?>">
      <script>
        document.title = "ERROR: VIDEO | OpusVid";
      </script>
      <?php include '../../page-templates/header.php'; ?>
      <div class="playerWrap">
        <div class="errorMessage">
          <h3>Sorry, this video page faild to load. Please try again or contact our support team at support@opusvid.com and we'll be happy to help you!</h3>
        </div>
        <h3><a href="home" class="button">Go Back Home</a></h3>
      </div>
      <?php include '../../page-templates/footer.php';
  } //End of else
