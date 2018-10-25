<?php

  session_start();

  $uniqeID = uniqid();

  if (isset ($_SESSION['uID'])) {
    include '../../page-templates/head_l2.php'; ?>
    <body>
      <script> document.title = "Video Upload | Opus Vid"; </script>
      <?php
        include '../../page-templates/header_l2.php';
        include '../../page-templates/dash_nav_l2.php';
      ?>
      <script src="../resources/js/uploadProgress.js"></script>
        <h2>Upload A Video: Step 1 Files</h2>

        <form id="upload_form" enctype="multipart/form-data" method="post" class="card">
          <!-- <input name="id" value="<?php echo $uniqeID; ?>"> -->

          <label for="videoFile">Upload Video File: 5GB | mp4, avi, or mkv</label>
            <input type="file" name="videoFile" id="videoFile">

          <label for="thumbnailFile">Upload Thumbnail File: 100MB | jpg, jpeg, png, OR pdf</label>
            <input type="file" name="thumbnailFile" id="thumbnailFile">

          <input type="button" value="Upload File" onclick="uploadFile()" class="submitButton">

          <progress id="progressBar" value="0" max="100"></progress>
          <h3 id="status"></h3>
          <!-- <p id="loaded_n_total"></p> -->
        </form>
      </section>
      </div>
      <?php include '../../page-templates/footer.php'; ?>

      <?php } else {
      header("Location: ../login");
      exit();
      }
      ?>
