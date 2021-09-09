<?php  
  require '../../blades/portalHeaderMod.php'; 
  $commentClass = new Comments;
?>

<body>
    <script>
    document.title = "Comment Manager | <?php echo $websiteName; ?>"
    </script>
    <?php require '../../blades/portalHeader.php'; ?>
    <?php require '../../blades/errors.php'; ?>
    <section id="manageVideo" class="">
        <h3><span class="underline pageTitle">Moderator: Comment Manager</span></h3>
        <div id="manageVideoWrap">
            <?php echo $videoFeed = $commentClass->manageCommentsMod(); ?>
        </div> <!-- #manageVideoWrap -->
    </section> <!-- #manageVideo -->
    <!-- End Tags From "blades/portalHeader.php" -->
    </main> <!-- #dashboardContent -->
    </div><!-- .dashboard-->
    </div> <!-- .dashboardWrapper -->
    <?php require '../../blades/footer.php'; ?>