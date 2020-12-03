<?php  
  require '../../blades/portalHeaderClient.php'; 
  $uniqeID = uniqid();

  $videoClass = new Video;
?>

<body>
  <script> document.title = "Video Upload  Step 1 | <?php echo $websiteName; ?>"</script>
  <?php require '../../blades/portalHeader.php'; ?> 
    <section id="manageVideo" class="">
      <script src="../../controllers/js/uploadProgress.js"></script>
      <h3><span class="underline pageTitle">Upload A Video: Step 1 File</span></h3>
      <?php require '../../blades/errors.php'; ?>
      
      <form id="upload_form" enctype="multipart/form-data" method="post" class="card">

          <label for="videoFile">Upload Video File: 5GB |  mp4 or m4v</label>
            <input type="file" name="videoFile" id="videoFile">

          <label for="thumbnailFile">Upload Thumbnail File: 100MB | jpg, jpeg OR png</label>
            <input type="file" name="thumbnailFile" id="thumbnailFile">

          <input type="button" value="Upload File" onclick="uploadFile()" class="submitButton">

          <progress id="progressBar" value="0" max="100"></progress>
          <h3 id="status"></h3>
        </form>
        <p>Please make sure that all videos and thumbnails follow our <a href="../../../tos">Terms of Service</a>.</p>
      </section>
  </main>
  </div> <!-- .portalContent -->
<?php require '../../blades/footer.php'; ?>
