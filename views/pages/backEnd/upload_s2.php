<?php  
  require '../../blades/portalHeaderClient.php'; 
  $uniqeID = uniqid();

  $videoClass = new Video;

  $getID = $_GET['id'];

  if (isset($_GET['title'])) {
     $title = $_GET['title'];
  } else {
     $title = null;
  }
  if (isset($_GET['sd'])) {
     $sd = $_GET['sd'];
  } else {
     $sd = null;
  }
  if (isset($_GET['d'])) {
     $d = $_GET['d'];
  } else {
     $d = null;
  }
  if (isset($_GET['tags'])) {
    $tags = $_GET['tags'];
  } else {
    $tags = null;
  }
  if (isset($_GET['chapters'])) {
    $chapters = $_GET['chapters'];
  } else {
    $chapters = null;
  }
  if (isset($_GET['mCredit'])) {
     $mCredit = $_GET['mCredit'];
  } else {
     $mCredit = null;
  }
  if (isset($_GET['vCredits'])) {
     $vCredit = $_GET['vCredits'];
  } else {
     $vCredit = null;
  }
  if (isset($_GET['links'])) {
     $links = $_GET['links'];
  } else {
     $links = null;
  }
 
?>

<body>
  <script> document.title = "Video Upload  Step 2 | <?php echo $websiteName; ?>"</script>
  <?php require '../../blades/portalHeader.php'; ?> 
    <section id="manageVideo" class="">
      <script src="resources/js/uploadProgress.js"></script>
          <h2 class="pageTitle">Upload A Video: Step 2 information</h2>
          <?php require '../../blades/errors.php'; ?>
          <a class="button" href="../../player?id=<?php echo $getID; ?>" target="_blank">Preview Video</a>
          <br>
          <br>
            <form id="videoUpload" method="post" action="../../controllers/database/videoUpload-S2.database.php">
              <input name="id" value="<?php echo $getID; ?>" hidden>

              <div class="field">
                <input type="text" name="vTitle" id="vTitle" placeholder="Video TItle" value="<?php echo $title; ?>" required>
                <label for="vTitle"><span class="required">*</span>Video Title</label>
              </div>

              <div class="field">
                  <textarea name="sDescription" id="sDescription" placeholder="Short Description" maxlength="250" required><?php echo $sd; ?></textarea>
                  <label for="sDescription"><span class="required">*</span>Short Description: Max 250 Characters</label>
              </div>

              <div class="field">
                <textarea name="description" id="descriptionField" placeholder="Description" rows="20" required><?php echo $d; ?></textarea>
              <label for="descriptionField"><span class="required">*</span>Description</label>
            </div>
            <a class="toggle" onclick="toggle_visibility('postFormat')">Format Tips</a>
<section id="postFormat" class="panel">
                              <h3>General Link</h3>
                              <pre> 
  &#60;a href="LINK"&#62;LINKTITLE&#60;/a&#62;
                              </pre>
                              <h3>Header 1 (Big Text)</h3>
                              <pre> 
  &#60;h1&#62;TEXT&#60;/h1&#62;
                              </pre>
                                <h3>Header 2 (Bigish Text)</h3>
                              <pre> 
  &#60;h2&#62;TEXT&#60;/h2&#62;
                              </pre>
                              <h3>Header 3 (Medium Text)</h3>
                              <pre> 
  &#60;h3&#62;TEXT&#60;/h3&#62;
                              </pre>
                              <h3>Header 4 (Mediumish Text)</h3>
                              <pre> 
  &#60;h4&#62;TEXT&#60;/h4&#62;
                              </pre>
                              <h3>Header 5 (Small Text)</h3>
                              <pre> 
  &#60;h5&#62;TEXT&#60;/h5&#62;
                              </pre>
                              <h3>Bold Text</h3>
                              <pre>
  &#60;strong&#62;TEXT&#60;/strong&#62;
                              </pre>
                              <h3>Italics</h3>
                              <pre>
  &#60;em&#62;TEXT&#60;/em&#62;
                              </pre>
</section>
            <hr>


              <div class="columns 2">
                <div class="nm column">
                  <label for="category"><span class="required">*</span>Category</label>
                    <select name="category" id="category" required>
                      <option value="" >Please Select a Category!</option>
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
                    <input type="text" name="tags" id="tags" placeholder="Tags" value="<?php echo $tags; ?>" required>
                    <label for="tags"><span class="required">*</span>Tags</label>
                  </div>
                </div>
              </div>
<hr>
              <div class="field">
                <textarea name="chapters"  id="chapters" placeholder="Chapters" rows="7"  required><?php echo $chapters; ?></textarea>
                <label for="chapters"><span class="required">*</span>Chapters*</label>
              </div>
              <p style="margin: -1em 0 3em;">*Chapters should be formated as "TIME;;TITLE || " in order for the chapter to properly be formated and MUST include 00:00 chapter. For example "00:00;;Introduction || 03:29;;Item 1".</p>
<hr>          
              <div class="columns 2">
                  <div class="nm column">
                    <div class="field">
                      <textarea name="musicCredit"  id="musicCredit" placeholder="Music Credit" rows="7"  required><?php echo $mCredit; ?></textarea>
                      <label for="musicCredit"><span class="required">*</span>Music Credit</label>
                    </div>
                  </div>
                  <div class="nm column">
                    <div class="field">
                      <textarea name="videoCredit"  id="videoCredit" placeholder="Video Credits" rows="7"><?php echo $vCredit; ?></textarea>
                      <label for="videoCredit">Video Credits*</label>
                    </div>
                  </div>
                </div>
                <p style="margin: -1em 0 3em;">*An example could be the equitment used for the video OR who did what for the production OR who starts in the video, to any credit you think would be releavent to the video. Also credits should be formated as "CREDITTITLE;;NAME || " in order for the credits to properly be formated.</p>
                <a class="toggle" onclick="toggle_visibility('postFormat1')">Format Tips</a>
 <section id="postFormat1" class="panel">
                              <h3>General Link</h3>
                              <pre> 
  &#60;a href="LINK"&#62;LINKTITLE&#60;/a&#62;
                              </pre>
                              <h3>Header 1 (Big Text)</h3>
                              <pre> 
  &#60;h1&#62;TEXT&#60;/h1&#62;
                              </pre>
                                <h3>Header 2 (Bigish Text)</h3>
                              <pre> 
  &#60;h2&#62;TEXT&#60;/h2&#62;
                              </pre>
                              <h3>Header 3 (Medium Text)</h3>
                              <pre> 
  &#60;h3&#62;TEXT&#60;/h3&#62;
                              </pre>
                              <h3>Header 4 (Mediumish Text)</h3>
                              <pre> 
  &#60;h4&#62;TEXT&#60;/h4&#62;
                              </pre>
                              <h3>Header 5 (Small Text)</h3>
                              <pre> 
  &#60;h5&#62;TEXT&#60;/h5&#62;
                              </pre>
                              <h3>Bold Text</h3>
                              <pre>
  &#60;strong&#62;TEXT&#60;/strong&#62;
                              </pre>
                              <h3>Italics</h3>
                              <pre>
  &#60;em&#62;TEXT&#60;/em&#62;
                              </pre>
</section>

<hr>

            <div class="field">
              <textarea name="staring"  id="staring" placeholder="Staring" rows="7"></textarea>
              <label for="staring">Staring*</label>
            </div>
            <p style="margin: -1em 0 3em;">*Staring listing should be formated as "DISPLAYNAME;;USERNAME || " in order for the links to properly be formated. If the person that is staring does not have a username on this website please use the format "DISPLAYNAME;;NoUn || ".</p>
<hr>
              <div class="columns 2">
                  <div class="nm column">
                    <br>
                    <br>
                    <br>
                    <label for="linkType">Link Style</label>
                      <select name="linkType" id="linkType">
                        <option value="default" selected>Links From Profile</option>
                        <option value="custom">Custom Links</option>
                        <option value="noLinks">No Links</option>
                      </select>
                  </div>
                  <div class="nm column">
                    <div class="field">
                      <textarea name="links"  id="links" placeholder="Links" rows="7"><?php echo $links; ?></textarea>
                      <label for="links">Custom Links*</label>
                    </div>
                    <p style="margin: -1em 0 3em;">*ONLY IF: Custom Links is selected to the left. Also links should be formated as "LINKORUSERNAME;;TITLE || " in order for the links to properly be formated.</p>
                  </div>
                </div>
<hr>
                <label for="privacy"><span class="required">*</span>Privacy of Video</label>
                  <select name="privacy" id="privacy">
                    <option value="public" selected>Public</option>
                    <option value="unlisted">Unlisted</option>
                    <option value="private">Private</option>
                  </select>
                
                <label for="comments">Comments</label>
                  <select name="comments" id="comments">
                    <option value="on" selected>Turned On</option>
                    <option value="off">Turned Off</option>
                  </select>

              <?php require '../../blades/recaptchaCodeHomepage.php'; ?>

              <button type="submit" name="submit" class="submitButton">Upload Video</button>
              <button type="submit" name="delete" class="submitButton uploadDelete" style="background: var(--secondaryColour); ">Delete Video</button>
            </form>
          </section>
  </main>
  </div> <!-- .portalContent -->
<?php require '../../blades/footer.php'; ?>