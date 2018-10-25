<?php

  session_start();

    $getID = $_GET['id'];

    $title = $_GET['title'];
    $sd = $_GET['sd'];
    $d = $_GET['d'];
    $tags = $_GET['tags'];
    $mCredit = $_GET['m-credit'];
    $fBy = $_GET['fby'];
    $fWith = $_GET['fwith'];
    $fAt = $_GET['fat'];
    $fOn = $_GET['fon'];
    $aBy = $_GET['aby'];
    $aWith = $_GET['awith'];
    $eBy = $_GET['eby'];
    $eOn = $_GET['eon'];
    $staring = $_GET['staring'];

  if (isset ($_SESSION['uID']) && isset ($_GET['id'])) {
    include '../../page-templates/head_l2.php'; ?>
    <body>
      <script> document.title = "Video Upload | Opus Vid"; </script>
      <?php
        include '../../page-templates/header_l2.php';
        include '../../page-templates/dash_nav_l2.php';
      ?>
      <script src="resources/js/uploadProgress.js"></script>
          <h2>Upload A Video: Step 2 information</h2>

            <?php
              if(isset($_GET['error'])){
                $uploadError = $_GET['error'];

                if($uploadError == "empty") { ?>
                  <div class="errorMessage">
                    <p>Please fill in all "<span class="required">*</span>" fields!</p>
                  </div>
                <?php } elseif($uploadError == "database") { ?>
                  <div class="errorMessage">
                    <p>It seems that we had troubles connecting to the database. Please try again or contact the support team at <a href="mailto:support@opusvid.com">support@opusvid.com</a> and we'll be more than happy to help!</p>
                  </div>
                <?php } elseif($uploadError == "failedVid") { ?>
                  <div class="errorMessage">
                    <p>There seems to have been an error. Please try again or contact the support team at <a href="mailto:support@opusvid.com">support@opusvid.com</a> and we'll be happy to help!</p>
                  </div>
                <?php } elseif($uploadError == "failedThumb") { ?>
                  <div class="errorMessage">
                    <p>There seems to have been an error. Please try again or contact the support team at <a href="mailto:support@opusvid.com">support@opusvid.com</a> and we'll be happy to help!</p>
                  </div>
                <?php }
              } ?>

            <form id="videoUpload" method="post" action="../../../database/db_upload_s2.php" enctype="multipart/form-data">
              <input name="id" value="<?php echo $getID; ?>" hidden>

              <div class="field">
                <input type="text" name="vTitle" id="vTitle" placeholder="Video TItle" value="<?php echo $title; ?>" required>
                <label for="vTitle"><span class="required">*</span>Video Title</label>
              </div>

              <label for="sDescription"><span class="required">*</span>Short Description: Max 250 Characters</label>
                <textarea name="sDescription" id="sDescription" placeholder="Short Description" maxlength="250" required><?php echo $sd; ?></textarea>

              <label for="descriptionField"><span class="required">*</span>Description</label>
                <textarea name="description" id="descriptionField" placeholder="Description" rows="20" required><?php echo $d; ?></textarea>

              <div class="columns 2">
                <div class="nm column">
                  <label for="category"><span class="required">*</span>Category</label>
                    <select name="category" id="category" required>
                      <option value="" >Please Select a Category!</option>
                      <option>---</option>
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
                </div>
                <div class="nm column">
                  <div class="field">
                    <input type="text" name="tags" id="tags" placeholder="Tags" value="<?php echo $tags; ?>" required>
                    <label for="tags"><span class="required">*</span>Tags</label>
                  </div>
                </div>
              </div>

              <label for="musicCredit"><span class="required">*</span>Music Credit</label>
                <textarea name="musicCredit"  id="musicCredit" placeholder="Music Credit" rows="7"  required><?php echo $mCredit; ?></textarea>

                <div class="columns 4">
                  <div class="nm column">
                    <div class="field">
                      <input type="text" name="filmedBy" id="filmedBy" placeholder="Filmed By" value="<?php echo $fBy; ?>">
                      <label for="filmedBy">Filmed By</label>
                    </div>
                  </div>
                  <div class="nm column">
                    <div class="field">
                      <input type="text" name="filmedWith" id="filmedWith" placeholder="Filmed With" value="<?php echo $fWith; ?>">
                      <label for="filmedWith">Filmed With</label>
                    </div>
                  </div>
                  <div class="nm column">
                    <div class="field">
                      <input type="text" name="filmedAt" id="filmedAt" placeholder="Filmed At" value="<?php echo $fAt; ?>">
                      <label for="filmedAt">Filmed At</label>
                    </div>
                  </div>
                  <div class="nm column">
                    <label for="filmedOn">Filmed On</label>
                      <input type="date" name="filmedOn" id="filmedOn" value="<?php echo $fOn; ?>">
                    </div>
                  </div>

                <div class="columns 2">
                  <div class="nm column">
                    <div class="field">
                      <input type="text" name="audioBy" id="audioBy" placeholder="Audio By" value="<?php echo $aBy; ?>">
                      <label for="audioBy">Audio By</label>
                    </div>
                  </div>
                  <div class="nm column">
                    <div class="field">
                      <input type="text" name="audioWith" id="audioWith" placeholder="Audio Captured With" value="<?php echo $aWith; ?>">
                      <label for="audioWith">Audio With</label>
                    </div>
                  </div>
                </div>

                <div class="columns 2">
                  <div class="nm column">
                    <div class="field">
                      <input type="text" name="editedBy" id="editedBy" placeholder="Edited By" value="<?php echo $eBy; ?>">
                      <label for="editedBy">Edited By</label>
                    </div>
                  </div>
                  <div class="nm column">
                    <div class="field">
                      <input type="text" name="editedOn" id="editedOn" placeholder=" Edited On" value="<?php echo $eOn; ?>">
                      <label for="editedOn">Edited On</label>
                    </div>
                  </div>
                </div>

                <label for="staring">Staring</label>
                <textarea name="staring" id="staring" placeholder="Staring" rows="7"><?php echo $staring; ?></textarea>

                <label for="privacy"><span class="required">*</span>Privacy of Video</label>
                  <select name="privacy" id="privacy" required>
                    <option value="public" selected>Public</option>
                    <option value="unlisted">Unlisted</option>
                    <option value="private">Private</option>
                  </select>

              <button type="submit" name="submit" class="submitButton">Upload Video</button>
            </form>
          </section>
        </div>
      <?php include '../../page-templates/footer.php'; ?>

  <?php } else {
   echo "You need to be logged in and must upload a video and thumbnail to add in the infomation!";
   exit();
  }
?>
