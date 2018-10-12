<?php
  session_start();

  include('../../../database/db_connect.php');

  $videoID = $_GET['id'];

  $sql = "SELECT * FROM videos WHERE id = '" . mysqli_escape_string($mySQL,$videoID) . "';";
  $result = mysqli_query($mySQL, $sql);

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
              <h3>By: <?php echo $row['opus_creator']; ?></h3>
              <form id="videoUpload" method="post" action="../../../database/db_editV.php"  enctype="multipart/form-data">
                <input type="text" hidden name="vidID" value="<?php echo $row['id']; ?>">
                <input type="text" hidden name="vidBY" value="<?php echo $row['opus_creator']; ?>">
                <input type="text" name="vTitle" required value="<?php echo $row['video_title']; ?>" placeholder="Video Title">
                <textarea name="sDescription" maxlength="250" placeholder="Short Description"><?php echo $row['short_description']; ?></textarea>
                <textarea name="description" rows="40" required placeholder="Description"><?php echo $row['description']; ?></textarea>
                <select name="category">
                  <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
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
                <input type="text" name="tags" required value="<?php echo $row['tags']; ?>" placeholder="Tags">
                <textarea name="musicCredit" rows="7" required placeholder="Music Credit"><?php echo $row['music_credit']; ?></textarea>

                <div class="columns 4">
                  <div class="nm column">
                    <input type="text" name="filmedBy" value="<?php echo $row['filmed_by']; ?>" placeholder="Filmed By">
                  </div>
                  <div class="nm column">
                    <input type="text" name="filmedWith" value="<?php echo $row['filmed_on']; ?>" placeholder="Filmed With">
                  </div>
                  <div class="nm column">
                    <input type="text" name="filmedAt" value="<?php echo $row['filmed_at']; ?>" placeholder="Filmed At">
                  </div>
                  <div class="nm column">
                    <input type="date" name="filmedOn" value="<?php echo $row['filmed_date']; ?>" placeholder="Filmed Date">
                  </div>
                </div>

                <div class="columns 2">
                  <div class="nm column">
                    <input type="text" name="audioBy" value="<?php echo $row['audio_by']; ?>" placeholder="Audio By">
                  </div>
                  <div class="nm column">
                    <input type="text" name="audioWith" value="<?php echo $row['audio_with']; ?>" placeholder="Audio Captured With">
                  </div>
                </div>

                <div class="columns 2">
                  <div class="nm column">
                    <input type="text" name="editedBy" value="<?php echo $row['edited_by']; ?>" placeholder="Edited By">
                  </div>
                  <div class="nm column">
                    <input type="text" name="editedOn" value="<?php echo $row['edited_on']; ?>" placeholder="Edited On">
                  </div>
                </div>

                <textarea name="staring" rows="7" placeholder="Staring"><?php echo $row['staring']; ?></textarea>
                <select name="privacy">
                  <option value="<?php echo $row['privacy']; ?>"><?php echo $row['privacy']; ?></option>
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
