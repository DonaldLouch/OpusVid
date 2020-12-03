<?php  
  require '../../blades/portalHeaderClient.php'; 
  $videoClass = new Video;
?>

<body>
  <script> document.title = "Manage Videos | <?php echo $websiteName; ?>"</script>
  <?php require '../../blades/portalHeader.php'; ?> 
  <?php require '../../blades/errors.php'; ?>
    <section id="manageVideo" class="">
      <h3><span class="underline pageTitle">Manage Videos</span></h3>
        <a href="upload" class="button">Upload a New Video</a>
        <div id="manageVideoWrap">
          <?php echo $videoFeed = $videoClass->manageVideoFeed($userName); ?>
        </div> <!-- #manageVideoWrap -->
    </section> <!-- #manageVideo -->
  </main>
  </div> <!-- .portalContent -->
<?php require '../../blades/footer.php'; ?>