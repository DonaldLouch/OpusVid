<?php
  session_start();

  include('../../../database/db_connect.php');

  $videoID = $_GET['id'];

  $sql = "SELECT * FROM videos WHERE id = '" . mysqli_escape_string($mySQL,$videoID) . "';";
  $result = mysqli_query($mySQL, $sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>
        <?php include '../../page-templates/head_l2.php'; ?>
        <body>
          <?php include '../../page-templates/header_l2.php'; ?>
          <div class="dashWrapper">
            <nav id="dashNav">
              <a href="../dashboard">Dashboard</a>
              <a href="manage">Videos</a>
                <nav class="dashNavSub">
                  <a href="upload">Upload New Video</a>
                  <a href="manage" class="dashActive">Manage Videos</a>
                  <a href="#">Manage Opus Collections</a>
                </nav>
              <a href="#">Settings</a>
                <nav class="dashNavSub">
                  <a href="#">Profile</a>
                  <a href="#">Account</a>
                </nav>
              <form action="../../../database/db_logout.php" method="post">
                <button class="dashNav" type="submit" name="submit">Logout</button>
              </form>
            </nav>
            <section id="dashContent">
              <h1>Edit Video: <?php echo $row['video_title']; ?></h1>
              <form id="videoUpload" method="post" action="../../../database/db_edit.php"  enctype="multipart/form-data">
                <input type="text" hidden name="vidID" value="<?php echo $row['id']; ?>">
                <input type="text" name="vTitle" required value="<?php echo $row['video_title']; ?>">
                <textarea name="sDescription" maxlength="250"><?php echo $row['short_description']; ?></textarea>
                <textarea name="description" rows="40" required><?php echo $row['description']; ?></textarea>
                <select name="category">
                  <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
                  <option value="vlog">Vlog</option>
                  <option value="life/event">Life/Event </option>
                  <option value="pet/animals">Pet/Animals</option>
                  <option value="tutorial">Tutorial</option>
                  <option value="technology">Technology</option>
                  <option value="music">Music</option>
                  <option value="interview">Interview</option>
                  <option value="gaming">Gaming</option>
                  <option value="news">News</option>
                  <option value="educational">Educational</option>
                  <option value="nonprofit">Non-profit</option>
                  <option value="advertisement">Advertisement </option>
                  <option value="automotive">Automotive</option>
                  <option value="animation">Animation</option>
                  <option value="tv">TV</option>
                  <option value="film/movie">Film/Movie</option>
                </select>
                <input type="text" name="tags" required value="<?php echo $row['tags']; ?>">
                <textarea name="musicCredit" rows="7" required><?php echo $row['music_credit']; ?></textarea>

                <div class="columns 4">
                  <div class="nm column">
                    <input type="text" name="filmedBy" value="<?php echo $row['filmed_by']; ?>">
                  </div>
                  <div class="nm column">
                    <input type="text" name="filmedWith" value="<?php echo $row['filmed_on']; ?>">
                  </div>
                  <div class="nm column">
                    <input type="text" name="filmedAt" value="<?php echo $row['filmed_at']; ?>">
                  </div>
                  <div class="nm column">
                    <input type="date" name="filmedOn" value="<?php echo $row['filmed_date']; ?>">
                  </div>
                </div>

                <div class="columns 2">
                  <div class="nm column">
                    <input type="text" name="audioBy" value="<?php echo $row['audio_by']; ?>">
                  </div>
                  <div class="nm column">
                    <input type="text" name="audioWith" value="<?php echo $row['audio_with']; ?>">
                  </div>
                </div>

                <div class="columns 2">
                  <div class="nm column">
                    <input type="text" name="editedBy" value="<?php echo $row['edited_by']; ?>">
                  </div>
                  <div class="nm column">
                    <input type="text" name="editedOn" value="<?php echo $row['edited_on']; ?>">
                  </div>
                </div>

                <textarea name="staring" rows="7"><?php echo $row['staring']; ?></textarea>
                <select name="privacy">
                  <option value="<?php echo $row['privacy']; ?>"><?php echo $row['privacy']; ?></option>
                  <option value="public">Public</option>
                  <option value="unlisted">Unlisted</option>
                  <option value="private">Private</option>
                </select>
                <label for="thumbnailFile">Change Thumbnail</lable>
                <input type="file" name="thumbnailFile">
                <button type="submit" name="submit" class="submitButton">Edit Video</button>
              </form>
            </section>
          </div>
      <?php include '../../page-templates/footer.php'; ?>
    <?php }
    } else {
        echo "<h3>Sorry, this video page faild to load. Please try again or contact our support team at support@opusvid.com with the video id:" . $videoID . " and we'll be happy to help you!</h3>";
        //echo $videoID;
  }; ?>
