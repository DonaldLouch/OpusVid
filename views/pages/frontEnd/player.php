<?php
  require '../../blades/head.php'; 
  $playerID = $_GET['id'];
  
  $videoClass = new Video;
  $userClass = new Users;
  $videoCheck = $videoClass->playerPageCheck($playerID);
  $privacyCheck = $videoClass->playerPagePrivacyCheck($playerID);
  $player= $videoClass->playerPage($playerID); 
  $opusCreator = $player['opusCreator'];
  $creator= $videoClass->opusCreator($opusCreator); 
  
?>

<body id="<?php echo $_GET["id"]; ?>">
    <div id="vidHeader">
        <?php  include '../../blades/menu.php'; ?>
    </div>

    <?php if ($videoCheck == "true" ) { ?>
    <?php if ($privacyCheck != "private" || $_SESSION['userName'] == $player['opusCreator'] || $userLevel == 'admin'  || $userLevel == 'mod') { ?>
    <script>
    document.title = "<?php echo $player['videoTitle']; ?> | <?php echo $websiteName; ?>"
    </script>
    <main class="playerWrap">
        <section id="videoPlayerWrap" class="videoPlayerWrap">
            <a href="../" id="videoHomeButton" class="videoHomeButton">
                <?php echo file_get_contents($baseFileURL."/ui/homeButton.svg"); ?>
            </a>


            <div class="theVideoWrap outer-container" id="vidVidWrap">
                <div class="inner-container">
                    <h1 id="videoTitle"><?php echo $player["videoTitle"]; ?></h1>
                   <video id="player" controls="controls" src="<?php echo $player['videoPath']; ?>" preload="auto" poster="<?php echo $player['thumbnailPath']; ?>"></video> 
                    <nav id="vidCon" class="vidConON"></nav>
                    <div class="videoInformation">
                        <!-- <a href="#openShareMenu" class="shareBTN">
                            <?php echo file_get_contents($baseFileURL."/ui/shareButton.svg"); ?>
                        </a> -->

                        <h5><a href="#openShareMenu" class="shareBTN">
                                <?php echo file_get_contents($baseFileURL."/ui/shareButton.svg"); ?>
                            </a> <?php echo file_get_contents($baseFileURL."/ui/informationVector.svg"); ?>
                            <?php echo date('F jS, Y' , $player['uploadedOn']); ?> | <?php echo $player['views'];?>
                            Views | <?php echo file_get_contents($baseFileURL."/ui/folderVector.svg"); ?>
                            <?php echo $player['category']; ?></p>
                            <div id="openShareMenu" class="modalDialog">
                                <div>
                                    <a href="#close" title="Close" class="close">X</a>
                                    <h3>Share Video Link</h3>
                                    <pre class="videoShareLink">
<a href="https://<?php echo $siteURL; ?>/player?id=<?php echo $_GET['id']; ?>">https://<?php echo $siteURL; ?>/player?id=<?php echo $_GET['id']; ?></a>
                            </pre>
                                    <h3>Embed Video</h3>
                            <pre class="videoEmbedLink">
&#60;iframe style="aspect-ratio: 16 / 9; width: 100%; overflow: hidden; z-index: 10000;" src="https://<?php echo $siteURL; ?>/embed?id=<?php echo $_GET['id']; ?>" allowfullscreen&#62;&#60;/iframe&#62;
                              </pre>
                                </div>
                            </div>
                    </div><!-- .vidInfoWrap -->
                </div> <!-- .inner-container -->
            </div> <!-- .videoWrap | .outer-container -->

            <aside id="chapters" class="chapters">
                <h3>Chapters</h3>
                <?php 
                if ($player['chapters'] != "NONE") {
                  $chapterCol = $player['chapters'];
                  $chaptersEach = explode('||', $chapterCol);
                  
                  foreach($chaptersEach as $chapterExplode) {
                    $chapter = explode(';;', $chapterExplode); 

                    $chapterTimeExplode = explode(':', $chapter[0]); 
                    if (isset($chapterTimeExplode[2])) {
                      $chapterHour = $chapterTimeExplode[0];
                      $chapterMinutes = $chapterTimeExplode[1];
                      $chapterSeconds = $chapterTimeExplode[2];
                      $chapterMinutesCalc = $chapterHour * 60 + $chapterMinutes;

                      $chapterTime = $chapterMinutesCalc*60 + $chapterSeconds;
                    } else {
                      $chapterMinutes = $chapterTimeExplode[0]*60;
                      $chapterSeconds = $chapterTimeExplode[1];
                      $chapterTime = $chapterMinutes + $chapterSeconds;
                    }
                  ?>
                <p onclick="changeChapter(<?php echo $chapterTime; ?>)" class="chapterChange">
                    <?php echo $chapter[0]; ?>: <strong><?php echo $chapter[1]; ?></strong></p>
                <?php } } else { ?> 
                    <p>The OpusCreator has opted to not display any chapters for this video.</p>
                    <?php } ?>
            </aside> <!-- #chapters -->

        </section> <!-- .videoPlayerWrap -->
        <section id="description">
            <div class="oCVidWrap">
                <img src="<?php echo $creator['userAvatar']; ?>" alt="<?php echo $creator['userName']; ?>">
                <h2><a href="profile?id=<?php echo $player['opusCreator']; ?>"><?php echo $player['opusCreator']; ?></a>
                    <?php if ($player['links'] != "NONE") { ?>
                    <span class="profileLinks"><a onclick="toggle_visibility('ocLinks')">Links of Mine</a></span>
                    <?php } ?>
                </h2>
            </div>
            <?php if ($player['links'] != "NONE" || $player['links'] != ": NONE") {  ?>
            <section id="ocLinks" class="panel">
                <h3>My Links</h3>
                <?php 
                        if (!empty($player['links'])) {
                          if ($player['links'] === "DEFAULT" || $player['links'] === ": DEFAULT") {
                            $linksCol = $creator['userLinks'];
                            $linksEach = explode('||', $linksCol);
                            
                            foreach($linksEach as $linksExplode) {
                              $links = explode(';;', $linksExplode); 
                              if (strpos($links[0], "http://") !== false || strpos($links[0], "https://") !== false) { ?>
                <p><a href="<?php echo $links[0]; ?>" target="_blank"><?php echo $links[1]; ?></a></p>
                <?php } else { ?>
                <p><?php echo $links[1]; ?>: <strong><?php echo $links[0]; ?></strong></p>
                <?php } }
                            //Profile Links
                          } else {
                          $linksCol = $player['links'];
                          $linksEach = explode('||', $linksCol);
                          
                          foreach($linksEach as $linksExplode) {
                            $links = explode(';;', $linksExplode); 
                            if (strpos($links[0], "http://") !== false || strpos($links[0], "https://") !== false) { ?>
                <p><a href="<?php echo $links[0]; ?>" target="_blank"><?php echo $links[1]; ?></a></p>
                <?php } else { ?>
                <p><?php echo $links[1]; ?>: <strong><?php echo $links[0]; ?></strong></p>
                <?php } } } } ?>
            </section>
            <?php } ?>
            <p><?php print_r(htmlspecialchars_decode($player['description'])); ?></p>
            <br>
            <a class="toggle" onclick="toggle_visibility('fullDescription')">Read Full Description</a>
            <section id="fullDescription" class="panel">
                <h3>More Information</h3>
                <article id="meta">
                    <dl>
                        <!--<dt>Category<dt>
                       <dd><?php echo $player['category']; ?> <dd>-->
                        <?php if ($player['staring'] != "NONE") { ?>
                        <dt>Starting</dt>
                        <?php 
                          if ($player['staring'] != "NONE") {
                            $staringCol = $player['staring'];
                            $staringEach = explode('||', $staringCol);
                            
                            foreach($staringEach as $starExplode) {
                              $star = explode(';;', $starExplode); 
                              if ($star[2] === "NONE") { ?>
                        <dd>
                            <p class="starButton"><?php echo $star[1]; ?></p>
                        </dd>
                        <?php } else { ?>
                        <dd><a href="profile?id=<?php echo $star[2]; ?>" class="button"><?php echo $star[1]; ?></a>
                        </dd>
                        <?php } 
                          } 
                      }  } ?>
                        <dt>Tags</dt>
                        <dd><?php 
                        $tags = explode(", ", $player['tags']); 
                        foreach ($tags as $tag) { ?>
                            <a href="../T/<?php echo $tag; ?>" class="tagButton"><?php echo $tag; ?></a>
                            <?php } ?>
                        </dd>
                        <?php if($player['musicCredit'] != "NONE"){ ?>
                        <dt>Music Credit</dt>
                        <dd>
                            <?php 
                            $musicCreditExplode = explode(' || ',$player['musicCredit']);

                            foreach($musicCreditExplode as $musicCreditKey => $musicCredit) { 
                                $musicInfo = explode(';;',$musicCredit);
                            ?>
                            <article class="musicCredit"id="musicCredit_<?php echo $musicCreditKey; ?>">
                                <?php if ($musicInfo[3] != "NONE") { ?>    
                                    <p class="musicCreditLink"><a href="<?php echo $musicInfo[3]; ?>" target="_blank">View or Download Links</a></p>
                                <?php } ?>
                                <h3><?php echo $musicInfo[1]; ?></h3>
                                <h4>By: <?php echo $musicInfo[2]; ?></h4>
                                <?php if ($musicInfo[4] != "NONE") { ?>    
                                    <hr>
                                    <p><?php echo $musicInfo[4]; ?></p>
                                <?php } ?>
                            </article>
                            <?php } ?>
                        </dd>
                        <?php } ?>
                        <?php 
                        if ($player['videoCredits'] != "NONE") {
                          $vCreditCol = $player['videoCredits'];
                          $vCreditsEach = explode('||', $vCreditCol);
                          
                          foreach($vCreditsEach as $vCredtsExplode) {
                            $vCredit = explode(';;', $vCredtsExplode); ?>
                        <dt><?php echo $vCredit[0]; ?></dt>
                        <dd><?php echo $vCredit[1]; ?></dd>
                        <?php } } ?>
                    </dl>
                </article> <!-- #meta -->
            </section> <!-- #fullDescription -->
            <?php if ($player['commentSetting'] == "on") { ?>
            <h3 class="commentSectionTitle">Comments (<?php echo $player['comments']; ?>)</h3>
            <section id="comments">
                <div id="commentView">
                    <?php
                      echo $videoClass->theComments($playerID, $baseFileURL);
                    ?>
                </div> <!-- #commentView -->
            </section> <!-- #comments -->
            <?php if (isset($_SESSION['uID'])) { ?>
            <div id="newComment">
                <form id="newCommentForm" method="post" action="../../../controllers/database/comments.database.php">
                    <input type="text" name="videoID" value="<?php echo $playerID; ?>" hidden>
                    <input type="text" name="commenterName" value="<?php echo $_SESSION['userName']; ?>" hidden>
                    <input type="text" name="commenterID" value="<?php echo $_SESSION['uID']; ?>" hidden>
                    <input type="text" name="comment" id="comment" placeholder="New Comment">

                    <?php require '../../blades/recaptchaCodeHomepage.php'; ?>

                    <label>
                        <input type="submit" name="newComment" style="display:none;" />
                        <?php echo file_get_contents($baseFileURL."/ui/sendButton.svg"); ?>
                    </label>
                </form>
            </div> <!-- #newComment -->
            <p>By commenting you accept the following terms <a href="../../../tos">Terms of Service</a>.</p>
            <?php } else { ?>
            <a href="../login" class="button" style="margin: 0.5rem auto;">Please Login Before
                Commenting</a>
            <?php } ?>

            <?php } else { ?>
            <h3 class="commentsOffText">Sorry, <?php echo $player['opusCreator']; ?> has decided to turn comments
                off on this video.</h3>
            <?php } ?>
        </section> <!-- #description -->
    </main> <!-- .playerWrap -->
    <script>
    var vectorPath = "<?php echo $baseFileURL; ?>" + "/ui/";
    </script>
    <script src="../../controllers/js/video.js"></script>

    <?php } elseif ($privacyCheck == "private")  { ?>
    <script>
    document.title = "PRIVATE VIDEO | <?php echo $websiteName; ?>";
    </script>
    <div class="playerWrap">
        <div class="errorMessage">
            <h3>The video that you are trying to watch is currently listed as "Private" and can only be viewed by the
                Opus Creator or the Opus Team (level 0-2). If you think you should have access to this video try again
                or contact <?php echo $websiteName; ?> support at support@<?php echo $siteURL; ?> with the video id:
                "<?php echo $playerID; ?>" and we'll be happy to help you!</h3>
        </div>
        <h3><a href="home" class="button">Go Back Home</a></h3>
    </div>
    <?php 
    }
  } elseif ($videoCheck == "false") {  ?>
    <script>
    document.title = "ERROR: VIDEO | <?php echo $websiteName; ?>";
    </script>
    <div class="playerWrap">
        <div class="errorMessage">
            <h3>Sorry, this video page failed to load. Please try again or contact <?php echo $websiteName; ?> support
                at support@<?php echo $siteURL; ?> and we'll be happy to help you!</h3>
        </div>
        <h3><a href="home" class="button">Go Back Home</a></h3>
    </div>
    <?php 
  }
  $views = new Views;
  $videoID = $playerID;
  $views->updateVideoViews($videoID);
  include '../../blades/footer.php'; 