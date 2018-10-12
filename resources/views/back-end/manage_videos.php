<?php
session_start();

include '../../../database/db_connect.php';
include '../../../database/db_video.php';

if (isset ($_SESSION['uID'])) {?>
<?php include '../../page-templates/head_l2.php'; ?>
<body>
  <script>
    document.title = "Manage Videos | Opus Vid";
  </script>
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
        <?php foreach ($videos as $video){ ?>
          <div class="videoWrapper">
            <img class="thumbDash" src="<?php echo $video['thumbnail_path']; ?>" alt="Thumbnail <?php echo $video['id']; ?>">

            <div class="videoInfo">
              <h3><?php echo $video['video_title']; ?></h3>
              <p>Uploaded on: <?php echo date('D M j, Y', $video['uploaded_on']); ?></p>
            </div>

            <a href="../player?id=<?php echo $video['id']; ?>" class="button dashboard">View Video</a>

            <a href="edit?id=<?php echo $video['id']; ?>" class="button dashboard">Edit Video</a>

            <form method="post" action="../../../database/db_delete-video.php"  enctype="multipart/form-data">
              <input hidden name="videoIDDel" value="<?php echo $video['id']; ?>">
              <input hidden name="videoPath" value="<?php echo $video['video_path']; ?>">
              <input hidden name="thumbPath" value="<?php echo $video['thumbnail_path']; ?>">
              <button class="button dashboard" type="submit" name="submit">Delete Video</button>
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
