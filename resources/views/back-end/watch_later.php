<?php
  require '../../../database/db_watch_later.php';
  include '../../page-templates/head_l2.php';
?>

<body>
  <script>
    document.title = "Watch Later List | OpusVid";
  </script>
  <?php
    include '../../page-templates/header_l2.php';
    include '../../page-templates/admin_dash.php';
  ?>
  <h2 class="pageTitle">Add Videos to Watch Later List</h2>

  <?php if(isset($_GET['edit'])){
    $editError = $_GET['edit'];
    if($editError == "success"){ ?>
      <div class="successMessage">
        <p>Your Watch Later List Successfully Updated!</p>
      </div>
  <?php }
  }
  ?>

  <section>
    <form id="newCollection" method="post" action="../../../database/db_watch_later_update.php">

      <input type="text" name="username" value="<?php echo $profileID; ?>" placeholder="Username" hidden>

      <a class="toggleButton watchLater" onclick="toggle_visibility('rVideo')">Remove Videos</a>
        <section id="rVideo" class="panel">
          <label for="videoSelect">Unselect Videos To Remove From Collection</label>
              <?php echo $videoNumber;
              for ($x = 0; $x <= $videoNumber; $x++){
                $vidID = $videosAlreadyAdded[$x];

                $videoSQL = "SELECT * FROM videos WHERE id = '$vidID'";
                $videoResults = mysqli_query($mySQL, $videoSQL);
                $video = mysqli_fetch_assoc($videoResults);?>

              <div class="videoWrapperCollection">
                <input type="checkbox" name ="currentSelect[]" id ="videoSelect" value="<?php echo $video['id'];?>" checked>
                <img class="thumbDash" src="<?php echo $video['thumbnail_path']; ?>" alt="Thumbnail <?php echo $video['id']; ?>">

                <div class="videoInfo">
                  <h3><?php echo $video['video_title']; ?></h3>
                  <p>Uploaded on: <?php echo date('D M j, Y', $video['uploaded_on']); ?></p>
                </div>
              </div>
          <?php } ?>
        </section>
        <a class="toggleButton watchLater" onclick="toggle_visibility('aVideo')">Add Videos</a>
          <section id="aVideo" class="panel">
            <label for="videoSelect">Select Videos To Add</label>
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
          </section>

          <label for="privacy">Privacy of Collection</label>
            <select name="privacy" id="privacy">
              <option value="<?php echo $watchLater['privacy']; ?>"><?php echo $watchLater['privacy']; ?></option>
              <option value="public">Public</option>
              <option value="private">Private</option>
            </select>

      <button class="submitButton" type="submit" name="submit">Update Watch List</button>
    </form>
  </div>
  <script src="../../resources/js/accordion.js"></script>
  <?php include '../../page-templates/footer.php'; ?>
