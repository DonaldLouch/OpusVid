<?php
  session_start();

  include('../../../database/db_connect.php');

  $videoID = $_GET['id'];

  $sql = "SELECT * FROM videos WHERE id = '" . mysqli_escape_string($mySQL,$videoID) . "';";
  $result = mysqli_query($mySQL, $sql);

  $sqlUsers = "SELECT * FROM users";
  $resultUsers = mysqli_query($mySQL, $sqlUsers);
  $users = array();

  if (mysqli_num_rows($resultUsers) > 0) {
    while ($user = mysqli_fetch_assoc($resultUsers)) {
      $users[] = $user;
    }
  }

if ($_SESSION['uLevel'] == 'admin') {
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>
        <?php include '../../page-templates/head_l2.php'; ?>
        <body>
          <script>
            document.title = "Edit <?php echo $row['video_title']; ?> | Opus Vid";
          </script>
          <?php
          include '../../page-templates/header_l2.php';
          include '../../page-templates/admin_dash.php';
          ?>
              <h2>Edit Video: <?php echo $row['video_title']; ?></h2>

              <form id="videoUpload" method="post" action="../../../database/db_editV.php"  enctype="multipart/form-data">
                <div class="columns 2">
                  <div class="nm column">
                    <div class="field">
                      <input type="text" name="vidID" id="vidID" value="<?php echo $row['id']; ?>" disabled>
                      <label for="vidID"><span class="required">*</span>Video ID</label>
                    </div>
                  </div>
                  <div class="nm column">
                    <label for="by"><span class="required">*</span>By</label>
                      <select name="by" id="by">
                        <option value="<?php echo $row['opus_creator']; ?>"><?php echo $row['opus_creator']; ?></option>
                        <option disabled>---</option>
                        <?php echo "---"; foreach ($users as $user) { ?>
                          <option value="<?php echo $user['username']; ?>"><?php echo $user['username']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                <div class="field">
                  <input type="text" name="vTitle" id="vTitle" value="<?php echo $row['video_title']; ?>" placeholder="Video Title" required>
                  <label for="vTitle"><span class="required">*</span>Title</label>
                </div>

                <label for="sDescription"><span class="required">*</span>Short Description: Max 250 Characters</label>
                  <textarea name="sDescription" id="sDescription" maxlength="250" placeholder="Short Description" required>
                    <?php echo $row['short_description']; ?>
                  </textarea>

                <label for="description"><span class="required">*</span>Description</label>
                  <textarea name="description" id="sDescription" rows="20" placeholder="Description" required>
                    <?php echo $row['description']; ?>
                  </textarea>

                <div class="columns 2">
                  <div class="nm column">
                    <label for="category"><span class="required">*</span>Category</label>
                      <select name="category" id="category" required>
                        <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
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
                        <input type="text" name="tags" id="tags" value="<?php echo $row['tags']; ?>" placeholder="Tags" required>
                        <label for="tags"><span class="required">*</span>Tags</label>
                      </div>
                    </div>
                  </div>

                <label for="musicCredit"><span class="required">*</span>Music Credit</label>
                  <textarea name="musicCredit" id="musicCredit" rows="7" placeholder="Music Credit" required>
                    <?php echo $row['music_credit']; ?>
                  </textarea>

                <div class="columns 4">
                  <div class="nm column">
                    <div class="field">
                      <input type="text" name="filmedBy" id="filmedBy" value="<?php echo $row['filmed_by']; ?>" placeholder="Filmed By">
                      <label for="filmedBy">Filmed By</label>
                    </div>
                  </div>
                  <div class="nm column">
                    <div class="field">
                      <input type="text" name="filmedWith" id="filmedWith" value="<?php echo $row['filmed_on']; ?>" placeholder="Filmed With">
                      <label for="filmedWith">Filmed With</label>
                    </div>
                  </div>
                  <div class="nm column">
                    <div class="field">
                      <input type="text" name="filmedAt" id="filmedAt" value="<?php echo $row['filmed_at']; ?>" placeholder="Filmed At">
                      <label for="filmedAt">Filmed At</label>
                    </div>
                  </div>
                  <div class="nm column">
                    <label for="filmedOn">Filmed On</label>
                      <input type="date" name="filmedOn" id="filmedOn" value="<?php echo $row['filmed_date']; ?>" placeholder="Filmed Date">
                  </div>
                </div>

                <div class="columns 2">
                  <div class="nm column">
                    <div class="field">
                      <input type="text" name="audioBy" id="audioBy" value="<?php echo $row['audio_by']; ?>" placeholder="Audio By">
                      <label for="audioBy">Audio By</label>
                    </div>
                  </div>
                  <div class="nm column">
                    <div class="field">
                      <input type="text" name="audioWith" id="audioWith" value="<?php echo $row['audio_with']; ?>" placeholder="Audio Captured With">
                      <label for="audioWith">Audio With</label>
                    </div>
                  </div>
                </div>

                <div class="columns 2">
                  <div class="nm column">
                    <div class="field">
                      <input type="text" name="editedBy" id="editedBy" value="<?php echo $row['edited_by']; ?>" placeholder="Edited By">
                      <label for="editedBy">Edited By</label>
                    </div>
                  </div>
                  <div class="nm column">
                    <div class="field">
                      <input type="text" name="editedOn" id="editedOn" value="<?php echo $row['edited_on']; ?>" placeholder="Edited On">
                      <label for="editedOn">Edited On</label>
                    </div>
                  </div>
                </div>

                <label for="staring"><span class="required">*</span>Staring</label>
                  <textarea name="staring" id="staring" rows="7" placeholder="Staring">
                    <?php echo $row['staring']; ?>
                  </textarea>

                <label for="privacy"><span class="required">*</span>Privacy</label>
                  <select name="privacy" id="privacy">
                    <option value="<?php echo $row['privacy']; ?>"><?php echo $row['privacy']; ?></option>
                    <option>---</option>
                    <option value="public">Public</option>
                    <option value="unlisted">Unlisted</option>
                    <option value="private">Private</option>
                  </select>

                <label for="thumbnailFile">Change Thumbnail</label>
                  <input type="file" name="thumbnailFile" id="thumbnailFile">

                <button type="submit" name="submit" class="submitButton">Edit Video</button>
              </form>
            </section>
          </div>
      <?php include '../../page-templates/footer.php'; ?>
    <?php }
    } else {
        echo "<h3>Sorry, this video page faild to load. Please try again or contact our support team at support@opusvid.com with the video id:" . $videoID . " and we'll be happy to help you!</h3>";
        //echo $videoID;
  }
} else {
  header("Location: ../login");
}
   ?>
