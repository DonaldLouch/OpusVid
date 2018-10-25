<?php
  session_start();

  include '../../../database/db_connect.php';
  include '../../../database/db_player_collection.php';

  $opusCreator = $_SESSION["uName"];

  //if($resultCollection->num_rows > 0) {
     //while($player = $resultCollection->fetch_assoc()) {
     /*if (!isset ($_GET['vid'])) {
       $findVidID = $videosAlreadyAdded[0];
       header("Location: collection?id=$collectionID&vid=$findVidID");
     } else {*/
        include '../../page-templates/head.php';
      ?>
        <body>
          <script>
            document.title = "<?php echo $collection['collection_title'] ?> | Opus Vid";
          </script>
          <?php include '../../page-templates/header.php'; ?>
          <div class="playerWrap">
            <!-- <p id="allVideoIDs"><?php echo $allIDS; ?></p> -->
            <!-- <input name="videoPaths" id="videoPaths" value="<?php echo $allIDS; ?>"> -->
            <div class="errorMessage">
              <p>Please note that at this time, the automatic "next video" function is currently unavailiable. Please select the next video on the list function to the right of the video!</p>
            </div>
            <div class="outer-container collection">
              <div class="inner-container">
                <video id="player" controls="controls" src="<?php echo $video['video_path']; ?>" preload="auto" poster="<?php echo $video['thumbnail_path']; ?>"></video>
                <!-- <video id="player" controls="controls" src="" poster=""></video> -->

                <nav id="vidCon"></nav>
              </div> <!-- .inner-container -->
              <div class="collectionList">
                <div>
                  <h3><?php echo $collection['collection_title'] ?></h3>
                  <p><?php echo $collection['short_description'] ?></p>
                </div>
                <!--<ul id="playlist">-->
                <?php for ($x = 0; $x < $videoNumber; $x++){
                  $vidID = $videosAlreadyAdded[$x];

                  $videoSQL = "SELECT * FROM videos WHERE id = '$vidID'";
                  $videoResults = mysqli_query($mySQL, $videoSQL);
                  $collectionVid = mysqli_fetch_assoc($videoResults);
                  ?>
                  <article id="<?php echo $collectionVid['id']; ?>">
                    <a href="collection?id=<?php echo $collectionID; ?>&vid=<?php echo $collectionVid['id']; ?>" class="noLink">
                      <img src="<?php echo $collectionVid['thumbnail_path']; ?>" id="moviesposter" class="thumbnailHome" alt="Thumbnail <?php echo $collectionVid['id']; ?>">
                      <h3><?php echo $collectionVid['video_title']; ?></h3>
                      <h5>By: <?php echo $collectionVid['opus_creator']; ?> <span>on <?php echo date('D M j, Y' , $collectionVid['uploaded_on']); ?> </span></h5>
                    </a>
                  </article>
                    <!--<li
                      id="<?php echo $collectionVid['id']; ?>"
                      class="collectionArticle"
                      movieurl="<?php echo $collectionVid['video_path']; ?>"
                      moviesposter="<?php echo $collectionVid['thumbnail_path']; ?>">
                      <img src="<?php echo $collectionVid['thumbnail_path']; ?>" class="thumbnailHome" alt="Thumbnail <php echo $collectionVid['id']; ?>">
                      <h3> <?php echo $collectionVid['video_title']; ?></h3>
                      <h5>By: <?php echo $collectionVid['opus_creator']; ?> <span>on <?php echo date('D M j, Y' , $collectionVid['uploaded_on']); ?> </span></h5>
                    </li>-->
                <?php } ?>
              <!-- </ul> -->
              <!--<article id="<php echo $collectionVid['id']; ?>">
                <a href="collection?id=<php echo $collectionID; ?>&vid=<php echo $collectionVid['id']; ?>" class="noLink">
                  <img src="<php echo $collectionVid['thumbnail_path']; ?>" id="moviesposter" class="thumbnailHome" alt="Thumbnail <php echo $collectionVid['id']; ?>">
                  <h3><php echo $collectionVid['video_title']; ?></h3>
                  <h5>By: <php echo $collectionVid['opus_creator']; ?> <span>on <php echo date('D M j, Y' , $collectionVid['uploaded_on']); ?> </span></h5>
                </a>
              </article>-->

              </div> <!-- .collectionList -->
            </div> <!-- .outer-container -->
            <section id="description">
              <h1><?php echo $video["video_title"]; ?></h1>
              <h2>By: <a href="profile?id=<?php echo $video['opus_creator']; ?>"><?php echo $video['opus_creator']; ?></a> <span class="upDate"> on <?php echo date('D M j, Y' , $video['uploaded_on']); ?></span></h2>
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
          </div> <!-- .playerWrap -->

          <script src="resources/js/collection.js"></script>
          <script src="resources/js/accordion.js"></script>

          <?php include '../../page-templates/footer.php';
