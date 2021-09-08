<?php
  require '../../blades/head.php'; 
  $playerID = $_GET['id'];
  
  $videoClass = new Video;
  $userClass = new Users;
  $videoCheck = $videoClass->playerPageCheck($playerID);
  $privacyCheck = $videoClass->playerPagePrivacyCheck($playerID);
  $player= $videoClass->playerPage($playerID); 
  ?>

<body id="<?php echo $player["id"]; ?>" style="background: none;">
    <script>
    document.title = "<?php echo $player['videoTitle']; ?> | <?php echo $websiteName; ?>"
    </script>

    <?php if ($privacyCheck != "private" || $_SESSION['userName'] == $player['opusCreator'] || $userLevel == 'admin'  || $userLevel == 'mod') { ?>
    <div class="theVideoWrap outer-container embed" id="vidVidWrap">
        <div class="inner-container embed">
            <video id="player" controls="controls" src="https://opusvid.devlexicon.ca/storage/videos/<?php echo $_GET["id"]; ?>.mp4" preload="auto"
                poster="<?php echo $player['thumbnailPath']; ?>" playsinline></video>
            <h1 id="videoTitle" class="embed"><?php echo $player["videoTitle"]; ?></h1>
            <nav id="vidCon" class="vidConON embed"></nav>
        </div>
    </div> <!-- .outer-container -->

    <script>
    var vectorPath = "<?php echo $baseFileURL; ?>" + "/ui/";
    const siteURL = "https://" + "<?php echo $siteURL;?>" + "/player?id=" + "<?php echo $playerID; ?>";
    </script>
    <script src="../../controllers/js/embed.js"></script>

</body>

</html>
<?php } else { ?>
<div class="playerWrap">
    <div class="errorMessage">
        <h3>The video that you are trying to watch is currently listed as "Private" and can only be viewed by the Opus
            Creator or the Opus Team. If you think you should have access to this video try again or contact
            <?php echo $websiteName; ?> support at support@<?php echo $siteURL; ?> with the video id:
            "<?php echo $playerID; ?>" and we'll be happy to help you!</h3>
    </div>
    <h3><a href="home" class="button">Go Back Home</a></h3>
</div>
<?php
          include '../../blades/footer.php'; 
        } 
      ?>