<?php
session_start();

include '../../../database/db_connect.php';
include '../../../database/db_video.php';

$video = new Video;
$videos = $video->fetch_all();
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
        <?php foreach ($videos as $video){ ?>
          <div class="videoWrapper">
            <img class="thumbDash" src="<?php echo $video['thumbnail_path']; ?>">

            <div class="videoInfo">
              <h3><?php echo $video['video_title']; ?></h3>
              <p>Uploaded on: <?php echo date('D M j, Y', $video['uploaded_on']); ?></p>
            </div>

            <a href="../player?id=<?php echo $video['id']; ?>" class="button dashboard">View Video</a>

            <a href="edit?id=<?php echo $video['id']; ?>" class="button dashboard">Edit Video</a>

            <form method="post" action="../../../database/db_delete-video.php"  enctype="multipart/form-data">
              <input hidden name="videoIDDel" value="<?php echo $video['id']; ?>">
              <button class="button dashboard" type="submit" name="submit">Delete Video</button>
            </form>
          </div>
        <?php } ?>
      </table>
    </section> <!-- #dashContent -->
  </div>
<?php include '../../page-templates/footer.php'; ?>
