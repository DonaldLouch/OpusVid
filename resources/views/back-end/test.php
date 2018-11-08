<?php
  require '../../../database/db_watch_later.php';
  include '../../page-templates/head_l2.php';
?>

<body>
  <script>
    document.title = "New Opus Collection | Opus Vid";
  </script>
  <?php
    include '../../page-templates/header_l2.php';
    include '../../page-templates/admin_dash.php';
  ?>
  <h2 class="pageTitle">Add Videos to Watch Later List</h2>
  <section>
    <form id="newCollection" method="post" action="../../../database/db_watch_later_update.php">

      <input type="text" name="username" value="<?php echo $profileID; ?>" placeholder="Username" hidden>

      <input name="currentSelect" value="<?php echo $selectRow['videos']; ?>" hidden>

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
      <div id="pagination_controls">
        <?php echo $paginationControls; ?>
      </div>

      <button class="submitButton" type="submit" name="submit">Add Videos To Collection</button>
    </form>
