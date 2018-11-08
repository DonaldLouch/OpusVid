<?php
session_start();

include '../../../database/db_connect.php';
include '../../../database/db_collections.php';

if (isset ($_SESSION['uID'])) {?>
<?php include '../../page-templates/head_l2.php'; ?>
<body>
  <script> document.title = "Manage Opus Collections | Opus Vid"; </script>
  <?php
    include '../../page-templates/header_l2.php';
    include '../../page-templates/dash_nav_l2.php';
    if(isset($_GET['edited']) || isset($_GET['delete'])){
      $editError = $_GET['edited'];
      $deleteError = $_GET['delete'];
      if($editError == "success"){ ?>
          <div class="successMessage">
            <p>The video was successfully edited!</p>
          </div>
        <?php } elseif($deleteError == "success") { ?>
          <div class="successMessage">
            <p>The video was successfully deleted!</p>
          </div>
        <?php } elseif($deleteError == "failed") { ?>
          <div class="errorMessage">
            <p>An error happened when trying to delete the video. Please try again or contact the support team at <a href="mailto:support@opusvid.com">support@opusvid.com</a> and we'll be happy to help!</p>
          </div>
        <?php }
      }
    ?>
    <h2 class="pageTitle">Collection Manager</h2>
    <a href="new_collection" class="button">Add New Collection</a>
        <?php foreach ($opusCollections as $opusCollection){ ?>
          <div class="videoWrapper collection">

            <div class="videoInfo">
              <h3><?php echo $opusCollection['collection_title']; ?></h3>
              <p>Created On: <?php echo date('D M j, Y', $opusCollection['created_on']); ?> | Last Updated: <?php echo date('D M j, Y', $opusCollection['last_updated']); ?></p>
            </div>

            <a href="../collection?id=<?php echo $opusCollection['id']; ?>" class="button dashboard">View Collection</a>

            <a href="add_collection?id=<?php echo $opusCollection['id']; ?>" class="button dashboard">Add Video(s)</a>

            <a href="edit_collection?id=<?php echo $opusCollection['id']; ?>" class="button dashboard">Edit Collection</a>

            <form method="post" action="../../../database/db_collection_delete.php"  enctype="multipart/form-data">
              <input hidden name="collectionIDDel" value="<?php echo $opusCollection['id']; ?>">
              <button class="button dashboard" type="submit" name="submit">Delete Collection</button>
            </form>
          </div>
        <?php } ?>
    </section> <!-- #dashContent -->
  </div>
<?php include '../../page-templates/footer.php'; ?>

<!-- IF logged out -->

<?php } else {
  header("Location: ../login");
} ?>
