<?php
session_start();

include '../../../database/db_connect.php';
include '../../../database/db_video.php';

if ($_SESSION['uName']) {?>
<?php include '../../page-templates/head_l2.php'; ?>
<body>
  <script> document.title = "New Opus Collection | OpusVid"; </script>
  <?php
    include '../../page-templates/header_l2.php';
    include '../../page-templates/admin_dash.php';
  ?>
  <h2 class="pageTitle">New Collection</h2>
  <section>
    <form id="newCollection" method="post" action="../../../database/db_collection_new.php">

      <div class="field">
        <input type="text" name="collectionName" id="collectionName" placeholder="Collection Name">
        <label for="collectionName">Collection Name</label>
      </div>

      <div class="field">
        <textarea name="sDescription" id="sDescription" placeholder="Short Description" maxlength="250" required></textarea>
        <label for="sDescription">Short Description: Max 250 Characters</label>
      </div>

      <div class="field">
        <textarea name="description" placeholder="Description" id="descriptionVid" rows="40" required></textarea>
        <label for="description">Description</label>
      </div>

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

      <div class="field">
        <input type="text" name="tags" id="tags" placeholder="Tags" required>
        <label for="tags">Tags</label>
      </div>

      <label for="videoSelect">Select Videos To Add To The Collection</label>
        <?php foreach ($videos as $video){ ?>
          <div class="videoWrapperCollection">
            <input type="checkbox" name ="videoSelect[]" id ="videoSelect" value="<?php echo $video['id']; ?>">
            <img class="thumbDash" src="<?php echo $video['thumbnail_path']; ?>" alt="Thumbnail <?php echo $video['id']; ?>">

            <div class="videoInfo">
              <h3><?php echo $video['video_title']; ?></h3>
              <p>Uploaded on: <?php echo date('D M j, Y', $video['uploaded_on']); ?></p>
            </div>
          </div>
        <?php } ?>

      <label for="privacy">Privacy of Collection</label>
        <select name="privacy" id="privacy">
          <option value="public" selected>Public</option>
          <option value="unlisted">Unlisted</option>
          <option value="private">Private</option>
        </select>

      <button class="submitButton" type="submit" name="submit">Create New Collection</button>
    </form>
  </section>
    </section> <!-- #dashContent -->
  </div>
<?php include '../../page-templates/footer.php'; ?>

<!-- IF logged out -->

<?php } else {
  header("Location: ../login");
} ?>
