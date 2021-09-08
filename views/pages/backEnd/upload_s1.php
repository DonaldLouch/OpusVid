<?php  
  require '../../blades/portalHeaderClient.php'; 
?>

<body>
    <script>
    document.title = "Video Upload  Step 1 | <?php echo $websiteName; ?>"
    </script>
    <?php require '../../blades/portalHeader.php'; ?>
    <section id="manageVideo" class="">
        <h3><span class="underline pageTitle">Upload A Video: Step 1 Video Upload</span></h3>
        <div class="card videoUpload">
            <button id="pickfiles">Select Video File (.mp4 only | 2GB Max)</button>
            <div id="filelist">Your browser doesn't support HTML5 upload.</div>
        </div>
        <p>Please make sure that all videos and thumbnails follow our <a href="../../../tos">Terms of Service</a>.</p>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/plupload/3.1.2/plupload.full.min.js"></script>
    <script src="../../controllers/js/uploadS1.js"></script>
    <!-- End Tags From "blades/portalHeader.php" -->
    </main> <!-- #dashboardContent -->
    </div><!-- .dashboard-->
    </div> <!-- .dashboardWrapper -->
    <?php require '../../blades/footer.php'; ?>