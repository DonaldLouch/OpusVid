<?php
session_start();

include '../../../database/db_connect.php';
include '../../../database/db_a_videos.php';

if ($_SESSION['uLevel'] == 'admin') {?>
<?php include '../../page-templates/head_l2.php'; ?>
<body>
  <script>
    document.title = "Admin Videos | Opus Vid";
  </script>
  <?php
    include '../../page-templates/header_l2.php';
    include '../../page-templates/admin_dash.php';
    foreach ($videos as $video){ ?>
          <div class="videoWrapper">
            <img class="thumbDash" src="<?php echo $video['thumbnail_path']; ?>" alt="Thumbnail <?php echo $video['id']; ?>">

            <div class="videoInfo">
              <h3><?php echo $video['video_title']; ?></h3>
              <p>Uploaded on: <?php echo date('D M j, Y', $video['uploaded_on']); ?></p>
            </div>

            <a href="../../player?id=<?php echo $video['id']; ?>" class="button dashboard">View Video</a>

            <a href="edit_video?id=<?php echo $video['id']; ?>" class="button dashboard">Edit Video</a>

            <form method="post" action="../../../database/db_delete-video.php"  enctype="multipart/form-data">
              <input hidden name="videoIDDel" value="<?php echo $video['id']; ?>">
              <input hidden name="videoPath" value="<?php echo $video['video_path']; ?>">
              <input hidden name="thumbPath" value="<?php echo $video['thumbnail_path']; ?>">
              <button class="button dashboard" type="submit" name="submit">Delete Video</button>
            </form>
          </div>
        <?php } ?>
        <div id="pagination_controls">
    			<?php echo $paginationControls; ?>
    		</div>
    </section> <!-- #dashContent -->
  </div>
<?php include '../../page-templates/footer.php'; ?>

<!-- IF logged out -->

<?php } else {
  header("Location: ../login");
} ?>
