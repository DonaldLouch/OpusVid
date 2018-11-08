<?php
session_start();

include '../../../database/db_connect.php';
include '../../../database/db_collection_add.php';

if (isset ($_SESSION['uID'])) {
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>
<?php include '../../page-templates/head_l2.php'; ?>
<body>
  <script> document.title = "New Opus Collection | OpusVid"; </script>
  <?php
    include '../../page-templates/header_l2.php';
    include '../../page-templates/admin_dash.php';
  ?>
  <h2 class="pageTitle">New Collection</h2>
  <section>
    <form id="newCollection" method="post" action="../../../database/db_collection_addV.php">

      <input type="text" name="collectionID" hidden value="<?php echo $collectionID; ?>" placeholder="collectionName">

      <label for="videoSelect">Select Videos To Add To The Collection</label>
      <input name="currentSelect" value="<?php echo $row['videos']; ?>" hidden>

      <?php foreach ($videos as $video){ ?>
        <div class="videoWrapperCollection">
          <input type="checkbox" name ="videoSelect[]" id ="videoSelect" value="<?php echo $video['id'];?>">
          <img class="thumbDash" src="<?php echo $video['thumbnail_path']; ?>" alt="Thumbnail <?php echo $video['id']; ?>">

          <div class="videoInfo">
            <h3><?php echo $video['video_title']; ?></h3>
            <p>Uploaded on: <?php echo date('D M j, Y', $video['uploaded_on']); ?></p>
          </div>
        </div>
    <?php } ?>

      <button class="submitButton" type="submit" name="submit">Add Videos To Collection</button>
    </form>
  </section>
    </section> <!-- #dashContent -->
  </div>
<?php include '../../page-templates/footer.php'; ?>

<!-- IF logged out -->

<?php }}} else {
  header("Location: ../login");
} ?>
