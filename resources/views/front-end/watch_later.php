<?php
  session_start();

  include '../../../database/db_connect.php';
  include '../../../database/db_player_watch_later.php';

  $opusCreator = $_SESSION["uName"];

if (!isset($_GET['index']) || $_GET['index'] < -1) {
    header("Location: watch_later?index=0");
  } elseif ($_GET['index'] > $videoNumber){
    $videoNumber = $videoNumber -1;
    header("Location: watch_later?index=$videoNumber");
  }

  include '../../page-templates/head.php';

  if($resultCollection->num_rows > 0) { ?>
    <body>

      <input hidden value="<?php echo $_GET['id']; ?>" id="idNumber">
      <input hidden value="<?php echo $_GET['index']; ?>" id="indexNumber">
      <input hidden value="<?php echo $videoNumber ?>" id="videoNumber">

      <script> document.title = "<?php echo $collection['collection_title'] ?> | OpusVid"; </script>

      <div id="vidHeader">
        <?php include '../../page-templates/header.php'; ?>
      </div>

      <div class="playerWrap">
        <div class="outer-container collection" id="vidVidWrap">
          <div class="inner-container">
            <video id="player" controls="controls" src="<?php echo $video['video_path']; ?>" poster="<?php echo $video['thumbnail_path']; ?>"></video>
            <nav id="vidCon" class="vidConON collection"></nav>
          </div> <!-- .inner-container -->

          <div class="collectionList">
            <div>
              <h3>Watch Later</h3>
              <p><?php echo $profile ?></p>
            </div>
            <?php for ($x = 0; $x < $videoNumber; $x++){
              $vidID = $videosAlreadyAdded[$x];

              $videoSQL = "SELECT * FROM videos WHERE id = '$vidID'";
              $videoResults = mysqli_query($mySQL, $videoSQL);
              $collectionVid = mysqli_fetch_assoc($videoResults);
              $id = "$x";
              ?>
              <article id="<?php echo $collectionVid['id']; ?>">
                <a href="watch_later?index=<?php echo $id; ?>" class="noLink">
                  <img src="<?php echo $collectionVid['thumbnail_path']; ?>" id="moviesposter" class="thumbnailHome" alt="Thumbnail <?php echo $collectionVid['id']; ?>">
                  <h3><?php echo $collectionVid['video_title']; ?></h3>
                  <h5>By: <?php echo $collectionVid['opus_creator']; ?> <span>on <?php echo date('D M j, Y' , $collectionVid['uploaded_on']); ?> </span></h5>
                </a>
              </article>
            <?php } ?>
          </div> <!-- .collectionList -->
        </div> <!-- .outer-container -->

      <div id="vidDescription">
        <section id="description">
          <div class="oCVidWrap">
            <?php if (in_array($user['id'], $followExpload) && isset($_SESSION['uID'])) {?>
              <form class="follow collection" method="post" action="../../database/db_follow.php">
                <input name="followID" value="<?php echo $user['id']; ?>" hidden>
                <button type="submit" name="unfollow">Unfollow Opus Creator</button>
              </form>
            <?php } elseif (!in_array($user['id'], $followExpload) && isset($_SESSION['uID'])) { ?>
              <form class="follow collection" method="post" action="../../database/db_follow.php">
                <input name="followID" value="<?php echo $user['id']; ?>" hidden>
                <button type="submit" name="follow">Follow Opus Creator</button>
              </form>
            <?php } ?>
            <img src="<?php echo $user['avatar']; ?>" alt="<?php echo $user['username']; ?>">
            <h1><?php echo $video["video_title"]; ?></h1>
            <h2>By: <a href="profile?id=<?php echo $video['opus_creator']; ?>"><?php echo $video['opus_creator']; ?></a> <span class="upDate"> on <?php echo date('D M j, Y' , $video['uploaded_on']); ?></span></h2>
          </div>
          <p><?php echo $video['short_description']; ?></p>
          <a class="toggleButton" onclick="toggle_visibility('fDescription')">Read Full Description</a>
            <section id="fDescription" class="panel">
              <h3>Full Description</h3>
              <p><?php echo $video['description']; ?></p>
              <a class="toggleButton" onclick="toggle_visibility('metaData')">Meta Data</a>
                <section id="metaData" class="panel">
                <h3>Information</h3>
                <article id="meta">
                  <dl>
                    <dt>Category<dt>
                      <dd><?php echo $video['category']; ?> <dd>
                    <dt>Tags</dt>
                      <dd><?php echo $video['tags']; ?></dd>
                    <dt>Music Credit</dt>
                      <dd><?php echo $video['music_credit']; ?></dd>
                    <?php if(!empty($video['filmed_on']) && !empty($video['filmed_by']) && !empty($video['filmed_at']) && !empty($video['filmed_date'])){ ?>
                    <dt>Filmed</dt>
                      <?php } if(!empty($video['filmed_on'])){ ?>
                      <dd>On:<?php echo $video['filmed_on']; ?></dd>
                      <?php } if(!empty($video['filmed_by'])){ ?>
                      <dd>By: <?php echo $video['filmed_by']; ?></dd>
                      <?php } if(!empty($video['filmed_at'])){ ?>
                      <dd>At: <?php echo $video['filmed_at']; ?></dd>
                    <?php } if(!empty($video['filmed_date'])){ ?>
                      <dd>On: <?php echo $video['filmed_date']; ?></dd>
                    <?php } if(!empty($video['audio_with']) && !empty($video['audio_by'])) { ?>
                    <dt>Audio Captured</dt>
                      <?php if(!empty($video['audio_with'])){ ?>
                      <dd>With:<?php echo $video['audio_with']; ?></dd>
                      <?php } if(!empty($video['audio_by'])){?>
                      <dd>By: <?php echo $video['audio_by']; ?></dd>
                    <?php }} if(!empty($video['edited_by']) && !empty($video['edited_on'])) { ?>
                    <dt>Edited</dt>
                      <?php if(!empty($video['edited_by'])){ ?>
                      <dd>By:<?php echo $video['edited_by']; ?></dd>
                      <?php } if(!empty($video['edited_on'])){?>
                      <dd>On: <?php echo $video['edited_on']; ?></dd>
                    <?php }} ?>
                    <?php if(!empty($video['staring'])){ ?>
                    <dt>Starting</dt>
                      <dd><?php echo $video['staring']; ?></dd>
                    <?php } ?>
                    <dt>Views<dt>
                      <dd>View Count: <?php echo $video['views']; ?><dd>
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
    <script src="resources/js/collection.js"></script>
    <script src="resources/js/accordion.js"></script>
    </body>
    </html>

  <? } else { ?>
    <body>
      <script> document.title = "WATCH LATER ERROR | OpusVid"; </script>
      <?php include '../../page-templates/header.php'; ?>
      <div class="playerWrap">
        <div class="errorMessage">
          <h3>Sorry, it seems that your watch list hasn't been setup yet. Please try again or contact our support team at support@opusvid.com and we'll be happy to help you! Or you can manually create one by clicking the below button!</h3>
        </div>
        <?php if (isset($_SESSION['uID'])) {?>
          <form class="follow collection" method="post" action="../../../database/db_new_watch_list.php">
            <button type="submit" name="new">Setup Watch Later List</button>
          </form>
        <?php } else { ?>
          <form class="follow collection">
            <button type="submit" name="new">NEED TO BE LOGGED IN!</button>
          </form>
        <?php }?>
        <h3><a href="home" class="button">Go Back Home</a></h3>
      </div>
    </body>
    </html>
  <?php } //End of else
