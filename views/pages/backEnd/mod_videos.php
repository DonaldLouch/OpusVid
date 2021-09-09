<?php  
  require '../../blades/portalHeaderMod.php'; 
  $videoClass = new Video;
?>

<body>
    <script>
    document.title = "Video Manager | <?php echo $websiteName; ?>"
    </script>
    <?php require '../../blades/portalHeader.php'; ?>
    <?php require '../../blades/errors.php'; ?>
    <section id="manageVideo" class="">
        <h3><span class="underline pageTitle">Moderation: Video Manager</span></h3>
        <div id="manageVideoWrap">
            <?php echo $videoFeed = $videoClass->manageVideoFeedMod(); ?>
        </div> <!-- #manageVideoWrap -->
    </section> <!-- #manageVideo -->
    <!-- End Tags From "blades/portalHeader.php" -->
    </main> <!-- #dashboardContent -->
    </div><!-- .dashboard-->
    </div> <!-- .dashboardWrapper -->
    <?php require '../../blades/footer.php'; ?>