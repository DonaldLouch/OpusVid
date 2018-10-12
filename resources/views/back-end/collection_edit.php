<?php
session_start();

include '../../../database/db_connect.php';
include '../../../database/db_collection_edit.php';

if ($_SESSION['uName']) {?>
<?php include '../../page-templates/head_l2.php'; ?>
<body>
  <script>
    document.title = "New Opus Collection | Opus Vid";
  </script>
  <?php
    include '../../page-templates/header_l2.php';
    include '../../page-templates/admin_dash.php';
  ?>
  <h3>Edit Collection</h3>
  <section>
    <section>
      <?php if($resultCollection->num_rows > 0) {
        while($collection = $resultCollection->fetch_assoc()){?>
      <form id="newCollection" method="post" action="../../../database/db_collection_update.php">
        <input type="text" hidden name="collectionID" value="<?php echo $collection['id']; ?>">
        <input type="text" name="collectionName" placeholder="collectionName" value="<?php echo $collection['collection_title']; ?>">
        <textarea name="sDescription" placeholder="Short Description" maxlength="250" required><?php echo $collection['short_description']; ?></textarea>
        <p>*Max 250 Characters</p>
        <textarea name="description" placeholder="Description" rows="40" required><?php echo $collection['description']; ?></textarea>

        <label for="category">Category</label>
        <select name="category" required id="category">
          <option value="<?php echo $row['category']; ?>"><?php echo $collection['category']; ?></option>
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

        <input type="text" name="tags" placeholder="Tags" required value="<?php echo $collection['tags']; ?>">

        <label for="videoSelect">Unselect Videos To Remove From Collection</label>

      <?php
      if (sizeof($slectedVid) == 1) {
        $vidID = $slectedVid[0];

        $videoSQL = "SELECT * FROM videos WHERE id = '$vidID'";
        $videoResults = mysqli_query($mySQL, $videoSQL);
        $video = mysqli_fetch_assoc($videoResults); ?>

        <div class="videoWrapperCollection">
          <input type="checkbox" name ="videoSelect[]" id ="videoSelect" value="<?php echo $video['id'];?>" checked>
          <img class="thumbDash" src="<?php echo $video['thumbnail_path']; ?>" alt="Thumbnail <?php echo $video['id']; ?>">

          <div class="videoInfo">
            <h3><?php echo $video['video_title']; ?></h3>
            <p>Uploaded on: <?php echo date('D M j, Y', $video['uploaded_on']); ?></p>
          </div>
        </div>
      <?php } else {
        for ($x = 0; $x <= $selectCount; $x++){
          $vidID = $slectedVid[$x];

          $videoSQL = "SELECT * FROM videos WHERE id = '$vidID'";
          $videoResults = mysqli_query($mySQL, $videoSQL);
          $video = mysqli_fetch_assoc($videoResults); ?>

          <div class="videoWrapperCollection">
            <input type="checkbox" name ="videoSelect[]" id ="videoSelect" value="<?php echo $video['id'];?>" checked>
            <img class="thumbDash" src="<?php echo $video['thumbnail_path']; ?>" alt="Thumbnail <?php echo $video['id']; ?>">

            <div class="videoInfo">
              <h3><?php echo $video['video_title']; ?></h3>
              <p>Uploaded on: <?php echo date('D M j, Y', $video['uploaded_on']); ?></p>
            </div>
          </div>
      <?php } ?>

      <label for="privacy">Privacy of Collection</label>
      <select name="privacy" id="privacy">
        <option value="<?php echo $collection['privacy']; ?>"><?php echo $collection['privacy']; ?></option>
        <option value="public" selected>Public</option>
        <option value="unlisted">Unlisted</option>
        <option value="private">Private</option>
      </select>

      <button class="submitButton" type="submit" name="submit">Update "<?php echo $collection['collection_title']; ?>" Collection</button>

<?php }
    }
  }
}
