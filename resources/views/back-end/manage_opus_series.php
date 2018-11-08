<?php
session_start();

include '../../../database/db_connect.php';
include '../../../database/db_opus_collections.php';

$video = new Video;
$videos = $video->fetch_all();

if (isset ($_SESSION['uID'])) {?>
<?php include '../../page-templates/head_l2.php'; ?>
<body>
  <script> document.title = "Manage Videos | OpusVid"; </script>
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
        <?php foreach ($seriesAll as $series){ ?>
          <div class="videoWrapper">
            <img class="thumbDash" src="<?php echo $series['thumbnail_path']; ?>" alt="Thumbnail <?php echo $series['id']; ?>">

            <div class="videoInfo">
              <h3><?php echo $series['video_title']; ?></h3>
              <p>Current Season: <?php echo $series['current_season']; ?> | Eposide: <?php echo $series['current_eposde']; ?></p>
            </div>

            <a href="../player?id=<?php echo $video['id']; ?>" class="button dashboard">New Season</a>

            <a href="edit?id=<?php echo $video['id']; ?>" class="button dashboard">New Eposide/Video</a>

            <form method="post" action="../../../database/db_delete-video.php"  enctype="multipart/form-data">
              <input hidden name="videoIDDel" value="<?php echo $video['id']; ?>">
              <button class="button dashboard" type="submit" name="submit">Delete Series</button>
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
