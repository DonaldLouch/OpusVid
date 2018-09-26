<?php

session_start();

  if (isset ($_SESSION['uID'])) {
    //Displays Page!
  } else {
   header("Location: ../login");
   exit();
 }
?>

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
      <h1>Upload A Video</h1>
      <form id="videoUpload" method="post" action="../../../database/db_upload.php"  enctype="multipart/form-data">
        <label for="videoFile">Upload Video File</lable>
        <input type="file" name="videoFile" required>
        <input type="text" name="vTitle" placeholder="Video TItle" required>
        <textarea name="sDescription" placeholder="Short Description" maxlength="250" required></textarea>
        <p>*Max 250 Characters</p>
        <textarea name="description" placeholder="Description" rows="40" required></textarea>
        <label for="category">Category</label>
        <select name="category" required>
          <option value="" >Please Select a Category!</option>
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
            <input type="date" name="filmedOn" placeholder="Filmed On">
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
        <select name="privacy" required>
          <option value="public" selected>Public</option>
          <option value="unlisted">Unlisted</option>
          <option value="private">Private</option>
        </select>
        <label for="thumbnailFile">Upload Thumbnail File</lable>
        <input type="file" name="thumbnailFile" required>
        <button type="submit" name="submit" class="submitButton">Upload Video</button>
      </form>
    </section>
  </div>
<?php include '../../page-templates/footer.php'; ?>
