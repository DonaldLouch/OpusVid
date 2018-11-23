<?php
session_start();

include '../../../database/db_connect.php';
include '../../../database/db_collection_edit.php';

if ($_SESSION['uName']) {?>
<?php include '../../page-templates/head_l2.php'; ?>
<body>
  <script> document.title = "New Opus Collection | OpusVid"; </script>
  <?php
    include '../../page-templates/header_l2.php';
    include '../../page-templates/admin_dash.php';
  ?>
  <h2 class="pageTitle">Edit Collection</h2>
  <section>
    <section>
      <?php if($result->num_rows > 0) {
        while($collection = $result->fetch_assoc()){?>
      <form id="newCollection" method="post" action="../../../database/db_collection_update.php">
        <input type="text" hidden name="collectionID" value="<?php echo $collection['id']; ?>">
        <div class="field">
          <input type="text" name="collectionName" id="collectionName" placeholder="Collection Name" value="<?php echo $collection['collection_title']; ?>">
          <label for="collectionName">Collection Name</label>
        </div>

        <div class="field">
          <textarea name="sDescription" id="sDescription" placeholder="Short Description" maxlength="250" required>
            <?php echo $collection['short_description']; ?>
          </textarea>
          <label for="sDescription">Short Description: Max 250 Characters</label>
        </div>

        <div class="field">
          <textarea name="description" placeholder="Description" id="descriptionVid" rows="40" required>
            <?php echo $collection['description']; ?>
          </textarea>
          <label for="description">Description</label>
        </div>

        <label for="category">Category</label>
          <select name="category" id="category">
            <option value="<?php echo $collection['category']; ?>"><?php echo $collection['category']; ?></option>
            <option>---</option>
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
          <input type="text" name="tags" id="tags" placeholder="Tags" required value="<?php echo $collection['tags']; ?>">
          <label for="tags">Tags</label>
        </div>

        <label for="videoSelect">Unselect Videos To Remove From Collection</label>
            <?php echo $videoNumber;
            for ($x = 0; $x <= $videoNumber; $x++){
              $vidID = $videosAlreadyAdded[$x];

              $videoSQL = "SELECT * FROM videos WHERE opus_creator = '$profileID' AND id = '$vidID'";
              $videoResults = mysqli_query($mySQL, $videoSQL);
              $video = mysqli_fetch_assoc($videoResults);?>

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
