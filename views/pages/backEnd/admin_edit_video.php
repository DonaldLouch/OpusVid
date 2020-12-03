<?php  
  require '../../blades/portalHeaderMod.php'; 
  $videoClass = new Video;
  $userClass = new Users;

  $playerID = $_GET['id'];

  $player = $videoClass->playerPage($playerID);
?>
<body>
  <script> document.title = "Edit <?php echo $player['videoTitle']; ?> | <?php echo $websiteName; ?>"</script>
  <?php require '../../blades/portalHeader.php'; ?> 
    <section id="manageVideo" class="">
      <script src="resources/js/uploadProgress.js"></script>
          <h2 class="pageTitle">Edit Video: <?php echo $player['videoTitle']; ?></h2>
          <?php require '../../blades/errors.php'; ?>
          <a class="button" href="../../player?id=<?php echo $playerID; ?>" target="_blank">Preview Video</a>
          <br>
          <br>
            <form id="videoUpload" method="post" action="../../controllers/database/videoEdit.database.php"  enctype="multipart/form-data">
              <div class="columns 2">
              <div class="nm column">
                <div class="field">
                  <input type="text" name="vidID" id="vidID" value="<?php echo $player['id']; ?>" readonly>
                  <label for="vidID"><span class="required">*</span>Video ID</label>
                </div>
              </div>
              <div class="nm column">
                <label for="by"><span class="required">*</span>By</label>
                  <select name="by" id="by">
                    <option value="<?php echo $player['opusCreator']; ?>"><?php echo $player['opusCreator']; ?></option>
                    <option disabled>---</option>
                    <?php 
                        echo "---"; 
                        echo $userClass->usersVideoEdit();
                      ?>
                  </select>
                </div>
              </div>

                <div class="field">
                  <input type="text" name="vTitle" id="vTitle" value="<?php echo $player['videoTitle']; ?>" placeholder="Video Title" required>
                  <label for="vTitle"><span class="required">*</span>Title</label>
                </div>

                <div class="field">
                  <textarea name="sDescription" id="sDescription" maxlength="250" placeholder="Short Description" required><?php echo $player['shortDescription']; ?></textarea>
                  <label for="sDescription"><span class="required">*</span>Short Description: Max 250 Characters</label>
                </div>

                <div class="field">
                  <textarea name="description" id="descriptionVid" rows="20" placeholder="Description" required><?php echo $player['description']; ?></textarea>
                  <label for="descriptionVid"><span class="required">*</span>Description</label>
                </div>
<hr>
                <div class="columns 2">
                  <div class="nm column">
                    <label for="category"><span class="required">*</span>Category</label>
                      <select name="category" id="category">
                        <option value="<?php echo $player['category']; ?>"><?php echo $player['category']; ?></option>
                        <option>---</option>
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
                    </div>
                    <div class="nm column">
                      <div class="field">
                        <input type="text" name="tags" id="tags" value="<?php echo $player['tags']; ?>" placeholder="Tags" required>
                        <label for="tags"><span class="required">*</span>Tags</label>
                      </div>
                    </div>
                  </div>
<hr>
                <div class="field">
                <textarea name="chapters"  id="chapters" placeholder="Chapters" rows="7"  required><?php echo $player['chapters']; ?></textarea>
                <label for="chapters"><span class="required">*</span>Chapters*</label>
              </div>
              <p style="margin: -1em 0 3em;">*Chapters should be formated as "TIME;;TITLE || " in order for the chapter to properly be formated and MUST include 00:00 chapter. For example "00:00;;Introduction || 03:29;;Item 1".</p>
<hr>          
              <div class="columns 2">
                  <div class="nm column">
                    <div class="field">
                      <textarea name="musicCredit" id="musicCredit" rows="7" placeholder="Music Credit" required><?php echo $player['musicCredit']; ?></textarea>
                      <label for="musicCredit"><span class="required">*</span>Music Credit</label>
                    </div>
                  </div>
                  <div class="nm column">
                    <div class="field">
                      <textarea name="videoCredit"  id="videoCredit" placeholder="Video Credits" rows="7"><?php echo $player['videoCredits']; ?></textarea>
                      <label for="videoCredit">Video Credits*</label>
                    </div>
                  </div>
                </div>
                <p style="margin: -1em 0 3em;">*An example could be the equitment used for the video OR who did what for the production OR who starts in the video, to any credit you think would be releavent to the video. Also credits should be formated as "CREDITTITLE;;NAME || " in order for the credits to properly be formated.</p>

                <div class="field">
                  <textarea name="staring" id="staring" rows="7" placeholder="Staring"><?php echo $player['staring']; ?></textarea>
                  <label for="staring">Staring*</label>
                </div>
                <p style="margin: -1em 0 3em;">*Staring listing should be formated as "DISPLAYNAME;;USERNAME || " in order for the links to properly be formated. If the person that is staring does not have a username on this website please use the format "DISPLAYNAME;;NoUn || ".</p>
                <div class="columns 2">
                  <div class="nm column">
                    <br>
                    <br>
                    <br>
                    <label for="linkType">Link Style</label>
                      <select name="linkType" id="linkType">
                        <option value="leaveAsIS" selected>Leave As Is</option>
                        <option value="default">Links From Profile</option>
                        <option value="custom">Custom Links</option>
                        <option value="noLinks">No Links</option>
                      </select>
                  </div>
                  <div class="nm column">
                    <div class="field">
                      <textarea name="links"  id="links" placeholder="Links" rows="7"><?php echo $player['links']; ?></textarea>
                      <label for="links">Custom Links*</label>
                    </div>
                    <p style="margin: -1em 0 3em;">*ONLY IF: Custom Links is selected to the left. Also links should be formated as "LINKORUSERNAME;;TITLE || " in order for the links to properly be formated.</p>
                  </div>
                </div>
<hr>
                <div class="columns 2">
                  <div class="nm column">
                    <label for="privacy"><span class="required">*</span>Privacy</label>
                      <select name="privacy" id="privacy">
                        <option value="<?php echo $player['privacy']; ?>"><?php echo $player['privacy']; ?></option>
                        <option>---</option>
                        <option value="public">Public</option>
                        <option value="unlisted">Unlisted</option>
                        <option value="private">Private</option>
                      </select>
                  </div>
                  <div class="nm column">
                  <label for="comments">Comments</label>
                      <select name="comments" id="comments">
                        <option value="<?php echo $player['commentSetting']; ?>" selected><?php echo $player['commentSetting']; ?></option>
                        <option value="on">Turned On</option>
                        <option value="off">Turned Off</option>
                      </select>
                      </div>
                    </div>
               
                <label for="thumbnailFile">Change Thumbnail</label>
                  <input type="file" name="thumbnailFile" id="thumbnailFile">
              
              <?php require '../../blades/recaptchaCodeHomepage.php'; ?>

              <button type="submit" name="submit" class="submitButton">Update Video</button>
            </form>
          </section>
  </main>
  </div> <!-- .portalContent -->
<?php require '../../blades/footer.php'; ?>