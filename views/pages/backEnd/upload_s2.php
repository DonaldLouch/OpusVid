<?php  
  require '../../blades/portalHeaderClient.php'; 
    if (!isset($_COOKIE["currentUploadID"])) {
      header("Location: upload");
  }
?>

<body>
    <script>
    document.title = "Video Upload  Step 2 | <?php echo $websiteName; ?>"
    </script>
    <?php require '../../blades/portalHeader.php'; ?>
    <section id="manageVideo" class="">
        <h3><span class="underline pageTitle">Upload A Video: Step 2 Thumbnail Upload</span></h3>
        <div class="card videoUpload">
            <button id="pickfiles" class="uploadButton">Select Thumbnail File (.jpg only)</button>
            <div id="filelist">Your browser doesn't support HTML5 upload.</div>
        </div>
        <p>Please make sure that all videos and thumbnails follow our <a href="../../../tos">Terms of Service</a>.</p>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/plupload/3.1.2/plupload.full.min.js"></script>
    <script src="../../controllers/js/uploadS2.js"></script>
    <!-- End Tags From "blades/portalHeader.php" -->
    </main> <!-- #dashboardContent -->
    </div><!-- .dashboard-->
    </div> <!-- .dashboardWrapper -->
    <?php require '../../blades/footer.php'; ?>