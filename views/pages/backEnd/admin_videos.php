<?php  
  require '../../blades/portalHeaderAdmin.php'; 
  $videoClass = new Video;
?>

<body>
  <script> document.title = "Video Manager | <?php echo $websiteName; ?>"</script>
  <?php require '../../blades/portalHeader.php'; ?> 
  <?php require '../../blades/errors.php'; ?>
    <section id="manageVideo" class="">
      <h3><span class="underline pageTitle">Admin: Video Manager</span></h3>
        <div id="manageVideoWrap">
          <?php echo $videoFeed = $videoClass->manageVideoFeedAdmin(); ?>
        </div> <!-- #manageVideoWrap -->
    </section> <!-- #manageVideo -->
  </main>
  </div> <!-- .portalContent -->
<?php require '../../blades/footer.php'; ?>