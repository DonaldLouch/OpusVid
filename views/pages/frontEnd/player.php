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
      <script> document.title = "<?php echo $player['videoTitle']; ?> | <?php echo $websiteName; ?>"</script>
       <div class="playerWrap">
        <section class="videoPlayerWrap">
          <a href="../" class="videoHomeButton">
            <?php echo file_get_contents($baseFileURL."/ui/videoUI/homeButton.svg"); ?>
          </a>
         <div class="theVideoWrap outer-container" id="vidVidWrap">
           <h1 id="videoTitle"><?php echo $player["videoTitle"]; ?></h1>
           <div class="inner-container">
             <video id="player" controls="controls" src="<?php echo $player['videoPath']; ?>" preload="auto" poster="<?php echo $player['thumbnailPath']; ?>" playsinline></video>
             <nav id="vidCon" class="vidConON"></nav>
           </div> <!-- .inner-container -->
          <div class="vidInfoWrap">
            <a href="#openShareMenu" class="shareBTN">
              <?php echo file_get_contents($baseFileURL."/ui/videoUI/shareButton.svg"); ?>
           </a>

            <div id="openShareMenu" class="modalDialog">
              <div>
                <a href="#close" title="Close" class="close">X</a>
                <h3>Share Video Link</h3>
<pre class="videoShareLink">
<a href="https://<?php echo $siteURL; ?>/player?id=<?php echo $_GET['id']; ?>">https://<?php echo $siteURL; ?>/player?id=<?php echo $_GET['id']; ?></a>
</pre>
                <h3>Embed Video</h3>
<pre class="videoEmbedLink">
&#60;iframe style="width:560px;height:315px;overflow:hidden;z-index:10000;" src="https://<?php echo $siteURL; ?>/embed?id=<?php echo $_GET['id']; ?>"&#62;&#60;/iframe&#62;
</pre>
              </div>
            </div>

            <div class="theInformation">
              <h5><?php echo file_get_contents($baseFileURL."/ui/videoUI/informationVector.svg"); ?> <?php echo date('F jS, Y' , $player['uploadedOn']); ?> | <?php echo $player['views'];?> Views | <?php echo file_get_contents($baseFileURL."/ui/videoUI/folderVector.svg"); ?> <?php echo $player['category']; ?></p>
            </div>
          </div>
         </div> <!-- .videoWrap | .outer-container -->
         <aside id="videoChapCom">
          <div id="tabs">
            <ul class="tabs">
              <li class="tab-link current" data-tab="chapters">Chapters</li>
              <li class="tab-link" data-tab="comments">Comments (<?php echo $player['comments']; ?>)</li>
            </ul>
            <div id="chapters" class="tab-content current">
              <h3>Chapters</h3>
              <?php 
              if (!empty($player['chapters'])) {
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
                  <p onclick="changeChapter(<?php echo $chapterTime; ?>)" class="chapterChange"><?php echo $chapter[0]; ?>: <strong><?php echo $chapter[1]; ?></strong></p>
              <?php } } ?>
            </div>
            <div id="comments" class="tab-content">
              <h3>Comments</h3>
              <section class="commentView">
                  <?php
                    echo $videoClass->theComments($playerID, $baseFileURL);
                  ?>
              </section>
              <div class="newComment">
              <form id="newComment" method="post" action="../../../controllers/database/comments.database.php">
                  <input type="text" name="videoID" value="<?php echo $playerID; ?>" hidden>
                  <input type="text" name="commenterName" value="<?php echo $_SESSION['userName']; ?>" hidden>
                  <input type="text" name="commenterID" value="<?php echo $_SESSION['uID']; ?>" hidden>
                  <input type="text" name="comment" id="comment" placeholder="New Comment">

                  <?php require '../../blades/recaptchaCodeHomepage.php'; ?>
              
                <label>
                  <input type="submit" name="newComment" style="display:none;" />
                    <?php echo file_get_contents($baseFileURL."/ui/videoUI/sendButton.svg"); ?>
                </label>
              </form>
            </div>
            <p>By commenting you accept the following terms <a href="../../../tos">Terms of Service</a>.</p>
            </div>
          </div>
         </aside>
        </section>

         <div id="vidDescription">
           <section id="description">
             <div class="oCVidWrap">
               <img src="<?php echo $creator['userAvatar']; ?>" alt="<?php echo $creator['userName']; ?>">
               <h2><a href="profile?id=<?php echo $player['opusCreator']; ?>"><?php echo $player['opusCreator']; ?></a>
                <?php if ($player['links'] != "NONE") { ?>
                  <span class="profileLinks"><a onclick="toggle_visibility('ocLinks')">Links of Mine</a></span>
                <?php } ?>
               </h2>
           </div>
            <?php if ($player['links'] != "NONE") {  ?>
              <section id="ocLinks" class="panel">
                    <h3>My Links</h3>
                    <?php 
                        if (!empty($player['links'])) {
                          if ($player['links'] === "DEFAULT") {
                            $linksCol = $creator['userLinks'];
                            $linksEach = explode('||', $linksCol);
                            
                            foreach($linksEach as $linksExplode) {
                              $links = explode(';;', $linksExplode); 
                              if (strpos($links[1], "http://") !== false || strpos($links[1], "https://") !== false) { ?>
                              <p><a href="<?php echo $links[1]; ?>" target="_blank"><?php echo $links[0]; ?></a></p>
                              <?php } else { ?>
                                <p><?php echo $links[0]; ?>: <strong><?php echo $links[1]; ?></strong></p>
                          <?php } }
                            //Profile Links
                          } else {
                          $linksCol = $player['links'];
                          $linksEach = explode('||', $linksCol);
                          
                          foreach($linksEach as $linksExplode) {
                            $links = explode(';;', $linksExplode); 
                            if (strpos($links[1], "http://") !== false || strpos($links[1], "https://") !== false) { ?>
                            <p><a href="<?php echo $links[1]; ?>" target="_blank"><?php echo $links[0]; ?></a></p>
                            <?php } else { ?>
                              <p><?php echo $links[0]; ?>: <strong><?php echo $links[1]; ?></strong></p>
                        <?php } } } } ?>
                </section>
              <?php } ?>
              <!--<p class="upDate">Uploaded on <strong><?php echo date('F jS, Y' , $player['uploadedOn']); ?></strong><p>
              <hr>-->
           <p><?php print_r(htmlspecialchars_decode($player['description'])); ?></p>
           <br>
           <a class="toggle" onclick="toggle_visibility('fDescription')">Read Full Description</a>
             <section id="fDescription" class="panel">
                 <h3>More Information</h3>
                 <article id="meta">
                   <dl>
                     <!--<dt>Category<dt>
                       <dd><?php echo $player['category']; ?> <dd>-->
                      <?php if(!empty($player['staring'])){ ?>
                      <dt>Starting</dt>
                        <?php 
                          if (!empty($player['staring'])) {
                            $staringCol = $player['staring'];
                            $staringEach = explode('||', $staringCol);
                            
                            foreach($staringEach as $starExplode) {
                              $star = explode(';;', $starExplode); 
                              if ($star[1] === "NoUn") { ?>
                                <dd><p class="starButton"><?php echo $star[0]; ?></p></dd>
                            <?php } else { ?>
                              <dd><a href="profile?id=<?php echo $star[1]; ?>" class="button"><?php echo $star[0]; ?></a></dd>
                          <?php } 
                          } 
                      }  } ?>
                       <dt>Tags</dt>
                       <dd><?php 
                        $tags = explode(", ", $player['tags']); 
                        foreach ($tags as $tag) { ?>
                                <a href="../T/<?php echo $tag; ?>" class="tagButton"><?php echo $tag; ?></a>
                        <?php } ?> </dd>
                     <dt>Music Credit</dt>
                       <dd><?php print_r(htmlspecialchars_decode($player['musicCredit'])); ?></dd>
                       <?php 
                        if (!empty($player['videoCredits'])) {
                          $vCreditCol = $player['videoCredits'];
                          $vCreditsEach = explode('||', $vCreditCol);
                          
                          foreach($vCreditsEach as $vCredtsExplode) {
                            $vCredit = explode(';;', $vCredtsExplode); ?>
                            <dt><?php echo $vCredit[0]; ?></dt>
                              <dd><?php echo $vCredit[1]; ?></dd>
                        <?php } } ?>
                     
                     <!--<dt>Views<dt>
                       <dd><?php echo $player['views'];?> Views<dd>
                     <dt>Comments<dt>
                       <dd><?php echo $player['comments']; ?> Comments<dd>-->
                   </dl>
                 </article> <!-- #meta -->
             </section> <!-- #fDescription -->
         </section> <!-- #description -->
       </div>
       </div> <!-- .playerWrap -->
       <script>
        const vectorPath = "https://" + "<?php echo $spacesBucket;?>" + "." + "<?php echo $spacesURIRegion; ?>" + "." + "<?php echo $spacesURL; ?>" + "/"+ "<?php echo $spacesRootFolder; ?>" + "/ui/videoUI/";
       </script>
       <script src="../../controllers/js/video.js"></script>
           
    <?php } elseif ($privacyCheck == "private")  { ?>
       <script> document.title = "PRIVATE VIDEO | <?php echo $websiteName; ?>"; </script>
       <div class="playerWrap">
          <div class="errorMessage">
            <h3>The video that you are trying to watch is currently listed as "Private" and can only be viewed by the Opus Creator or the Opus Team (level 0-2). If you think you should have access to this video try again or contact <?php echo $websiteName; ?> support at support@<?php echo $siteURL; ?> with the video id: "<?php echo $playerID; ?>" and we'll be happy to help you!</h3>
          </div>
          <h3><a href="home" class="button">Go Back Home</a></h3>
        </div>
  <?php 
    }
  } elseif ($videoCheck == "false") {  ?>
    <script> document.title = "ERROR: VIDEO | <?php echo $websiteName; ?>"; </script>
    <div class="playerWrap">
      <div class="errorMessage">
        <h3>Sorry, this video page failed to load. Please try again or contact <?php echo $websiteName; ?> support at support@<?php echo $siteURL; ?> and we'll be happy to help you!</h3>
      </div>
      <h3><a href="home" class="button">Go Back Home</a></h3>
    </div>
<?php 
  }
  $views = new Views;
  $videoID = $playerID;
  $views->updateVideoViews($videoID);
  include '../../blades/footer.php'; 