<?php

session_start();

  if (isset ($_SESSION['uID'])) {
    include '../../page-templates/head_l2.php'; ?>
<body>
  <script>
    document.title = "Video Upload | Opus Vid";
  </script>
  <?php
    include '../../page-templates/header_l2.php';
    include '../../page-templates/dash_nav_l2.php';
    ?>
      <h2>Upload A Video</h2>
      <form id="videoUpload" method="post" action="../../../database/db_upload.php"  enctype="multipart/form-data">
        <label for="videoFile">Upload Video File</label>
          <input type="file" name="videoFile" id="videoFile" required>

        <input type="text" name="vTitle" placeholder="Video TItle" required>
        <textarea name="sDescription" placeholder="Short Description" maxlength="250" required></textarea>
        <p>*Max 250 Characters</p>
        <textarea name="description" placeholder="Description" rows="40" required></textarea>

        <label for="category">Category</label>
        <select name="category" required id="category">
          <option value="" >Please Select a Category!</option>
          <option value="Vlog">Vlog</option>
          <option value="Life/Event">Life/Event </option>
          <option value="Pet/Animals">Pet/Animals</option>
          <option value="Tutorial">Tutorial</option>
          <option value="Technology">Technology</option>
          <option value="Music">Music</option>
          <option value="Interview">Interview</option>
          <option value="Gaming">Gaming</option>
          <option value="News">News</option>
          <option value="Educational">Educational</option>
          <option value="Non-profit">Non-profit</option>
          <option value="Advertisement">Advertisement </option>
          <option value="Automotive">Automotive</option>
          <option value="Animation">Animation</option>
          <option value="TV">TV</option>
          <option value="Film/Movie">Film/Movie</option>
        </select>

        <input type="text" name="tags" placeholder="Tags" required>
        <textarea name="musicCredit" placeholder="Music Credit" rows="7" required></textarea>

        <div class="columns 4">
          <div class="nm column">
            <input type="text" name="filmedBy" placeholder="Filmed By">
          </div>
          <div class="nm column">
            <input type="text" name="filmedWith" placeholder="Filmed With">
          </div>
          <div class="nm column">
            <input type="text" name="filmedAt" placeholder="Filmed At">
          </div>
          <div class="nm column">
            <input type="date" name="filmedOn">
          </div>
        </div>

        <div class="columns 2">
          <div class="nm column">
            <input type="text" name="audioBy" placeholder="Audio By">
          </div>
          <div class="nm column">
            <input type="text" name="audioWith" placeholder="Audio Captured With">
          </div>
        </div>

        <div class="columns 2">
          <div class="nm column">
            <input type="text" name="editedBy" placeholder="Edited By">
          </div>
          <div class="nm column">
            <input type="text" name="editedOn" placeholder=" Edited On">
          </div>
        </div>

        <textarea name="staring" placeholder="Staring" rows="7"></textarea>

        <label for="privacy">Privacy of Video</label>
        <select name="privacy" id="privacy">
          <option value="public" selected>Public</option>
          <option value="unlisted">Unlisted</option>
        </select>

        <label for="thumbnailFile">Upload Thumbnail File</label>
          <input type="file" name="thumbnailFile" required id="thumbnailFile">

        <button type="submit" name="submit" class="submitButton">Upload Video</button>
      </form>
    </section>
  </div>
<?php include '../../page-templates/footer.php'; ?>

<?php } else {
 header("Location: ../login");
 exit();
}
?>
