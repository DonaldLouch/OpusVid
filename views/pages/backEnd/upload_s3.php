<?php  
  require '../../blades/portalHeaderClient.php'; 
  if (isset($_GET['id'])) {
    $uniqeID = $_GET['id'];
    setcookie("currentUploadID", "", time() - 3600); //REST COOKIE
    setcookie('currentUploadID', $uniqeID, time() + (86400 * 1), "/"); //Expires in 1 
  } else {
      $uniqeID = $_COOKIE["currentUploadID"];
  }

  $videoClass = new Video;

  $getID = $uniqeID;

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
    <script>
    document.title = "Video Upload  Step 3 | <?php echo $websiteName; ?>"
    </script>
    <?php require '../../blades/portalHeader.php'; ?>
    <section id="manageVideo" class="">
        <script src="resources/js/uploadProgress.js"></script>
        <h2 class="pageTitle">Upload A Video: Step 3 information</h2>
        <?php require '../../blades/errors.php'; ?>
        <a class="button" href="../../player?id=<?php echo $getID; ?>" target="_blank">Preview Video</a>
        <form id="videoUploadS3" method="post" action="../../controllers/database/videoUpload-S3.database.php">
            <input name="id" value="<?php echo $getID; ?>" hidden>

            <div class="field">
                <input type="text" name="vTitle" id="vTitle" placeholder="Video TItle" value="<?php echo $title; ?>"
                    required>
                <label for="vTitle"><span class="required">*</span>Video Title</label>
            </div>

            <div class="field">
                <textarea name="sDescription" id="sDescription" placeholder="Short Description" maxlength="250"
                    required><?php echo $sd; ?></textarea>
                <label for="sDescription"><span class="required">*</span>Short Description: Max 250 Characters</label>
            </div>

            <div class="field">
                <textarea name="description" id="descriptionField" placeholder="Description" rows="20"
                    required><?php echo $d; ?></textarea>
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
                        <option value="">Please Select a Category!</option>
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
                        <input type="text" name="tags" id="tags" placeholder="Tags" value="<?php echo $tags; ?>"
                            required>
                        <label for="tags"><span class="required">*</span>Tags</label>
                    </div>
                </div>
            </div>
            <hr>

            <section id="theChaptersSection" class="listSection">
                <h4>Chapters</h4>

                <div class="formCheckbox">
                    <label class="checkbox">
                        <input type="checkbox" name="isThereChapters" value="No" id="isThereChapters">
                        <span class="design"></span>
                        <span class="text" id="chapterCheckText"></span>
                    </label>
                </div>

                <div id="chapterInputSection">
                    <hr>
                    <p>In order for the chapter to properly be formated you MUST include a "0:00" / "00:00" chapter, for example "0:00 ;; Introduction". Note that all times should be formated automatically by first time code to last time code.</p>
                    
                    <div class="columns 3 list" id="chapter_0">
                        <div class="column">
                            <div class="field">
                                <input type="text" name="chapterTimeCode[]" id="chapterTimeCode_0" value="0:00">
                                <label for="chapterTimeCode_0"><span class="required">*</span>Chapter Time Code</label>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <input type="text" name="chapterTitle[]" id="chapterTitle_0" value="Introduction">
                                <label for="chapterTitle_0"><span class="required">*</span>Chapter Title</label>
                            </div>
                        </div>
                        <div class="column">
                            <button type="button" name="removeChapter" id="chapter_0" class="removeButton removeChapterButton"><?php echo file_get_contents($baseFileURL."/ui/trashVector.svg"); ?></button>
                        </div>
                    </div>
                    <button type="button" name="addChapters" id="addChapters" class="button" value="0">Add More Chapters</button>
                </div>
            </section>
            <section id="theMusicSection" class="listSection">
                <h4>Music Credit</h4>

                <div class="formCheckbox">
                    <label class="checkbox">
                        <input type="checkbox" name="isThereMusicCredit" value="No" id="isThereMusicCredit">
                        <span class="design"></span>
                        <span class="text" id="musicCreditCheckText"></span>
                    </label>
                </div>
                <div id="musicCreditInputSection">
                    <hr>
                    <p>* For proper formatting of the credit, if you have a song playing mutuple times and you would like to credit the song each time, please add a single pipe and space at the start and finish. As an example: "0:00 | 2:09 | 8:10".</p>
                    
                    <div class="columns 3 list" id="musicCredit_0">
                        <div class="column">
                            <div class="field">
                                <input type="text" name="musicTimePlayed[]" id="musicTimePlayed_0">
                                <label for="musicTimePlayed_0">Time Code(s) *</label>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <input type="text" name="musicSongTitle[]" id="musicSongTitle_0">
                                <label for="musicSongTitle_0"><span class="required">*</span>Song Title</label>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <input type="text" name="musicArtist[]" id="musicArtist_0">
                                <label for="musicArtist_0"><span class="required">*</span>Artist</label>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <input type="text" name="musicLink[]" id="musicLink_0">
                                <label for="musicLink_0">Link to Song</label>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <input type="text" name="musicMore[]" id="musicMore_0">
                                <label for="musicMore_0">More Information</label>
                            </div>
                        </div>
                        <div class="column">
                            <button type="button" name="removeMusic" id="musicCredit_0" class="removeButton removeMusicButton"><?php echo file_get_contents($baseFileURL."/ui/trashVector.svg"); ?></button>
                        </div>
                    </div>
                    <button type="button" name="addMusic" id="addMusic" class="button" value="0">Add More Music Credit</button>
                </div>
            </section>

            <section id="theVideoCreditSection" class="listSection">
                <h4>Video Credits</h4>
                <div class="formCheckbox">
                    <label class="checkbox">
                        <input type="checkbox" name="isThereVideoCredit" value="No" id="isThereVideoCredit">
                        <span class="design"></span>
                        <span class="text" id="videoCreditCheckText"></span>
                    </label>
                </div>

                <div id="videoCreditInputSection">
                    <hr>
                    <p>An example could be the equitment used for the video OR who did what for the production OR who starts in the video, to any credit you think would be releavent to the video.</p>

                    <div class="columns 3 list" id="videoCredit_0">
                        <div class="column">
                            <div class="field">
                                <input type="text" name="videoCreditTitle[]" id="videoCreditTitle_0">
                                <label for="videoCreditTitle_0"><span class="required">*</span>Video Credit Title</label>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <input type="text" name="videoCreditName[]" id="videoCreditName_0">
                                <label for="videoCreditName_0"><span class="required">*</span>Video Credit Name</label>
                            </div>
                        </div>
                        <div class="column">
                            <button type="button" name="removeVideoCredit" id="videoCredit_0" class="removeButton removeVideoCreditButton"><?php echo file_get_contents($baseFileURL."/ui/trashVector.svg"); ?></button>
                        </div>
                    </div>
                    <button type="button" name="addVideoCredit" id="addVideoCredit" class="button" value="0">Add More Video Credits</button>
                </div>
            </section>

            <section id="theStaringSection" class="listSection">
                <h4>Starting</h4>
                <div class="formCheckbox">
                    <label class="checkbox">
                        <input type="checkbox" name="isThereStaringCredit" value="No" id="isThereStaringCredit">
                        <span class="design"></span>
                        <span class="text" id="staringCreditCheckText"></span>
                    </label>
                </div>

                <div id="staringCreditInputSection">
                    <hr>
                    <p>* For proper formatting of the credit, if the person that is staring does not have a username on this website please use the format "NoUn" in the "Username" section.</p>
                    <div class="columns 4 list" id="staring_0">
                        <div class="column">
                            <div class="field">
                                <input type="text" name="staringTimeCode[]" id="staringTimeCode0">
                                <label for="staringTimeCode0">Staring Time Code</label>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <input type="text" name="staringDisplayName[]" id="staringDisplayName_0">
                                <label for="staringDisplayName_0"><span class="required">*</span>Display Name</label>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <input type="text" name="staringUsername[]" id="staringUsername_0">
                                <label for="staringUsername_0"><span class="required">*</span>Username *</label>
                            </div>
                        </div>
                        <div class="column">
                            <button type="button" name="removeStaring" id="staring_0" class="removeButton removeStaringButton"><?php echo file_get_contents($baseFileURL."/ui/trashVector.svg"); ?></button>
                        </div>
                    </div>
                    <button type="button" name="addStaring" id="addStaring" class="button" value="0">Add More Staring Credit</button>
                </div>
            </section>
            <div class="listSection">
                <h4>Link Style</h4>
                <select name="linkType" id="linkType">
                    <option value="default" selected>Links From Profile</option>
                        <option value="custom">Custom Links</option>
                        <option value="noLinks">No Links</option>
                </select>
                <section id="theLinksSection" class="listSection">
                    <h4>Custom Links</h4>
                    <div id="linksInputSection">
                        <p>* For proper formatting of the credit, please include the "http(s)://" in the inputting of the link. </p>
                        <div class="columns 3 list" id="links_0">
                            <div class="column">
                                <div class="field">
                                    <input type="text" name="linkHref[]" id="linkHref_0">
                                    <label for="linkHref_0"><span class="required">*</span>Link URL</label>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <input type="text" name="linkTitle[]" id="linkTitle_0">
                                    <label for="linkTitle_0"><span class="required">*</span>Link Title</label>
                                </div>
                            </div>
                            <div class="column">
                                <button type="button" name="removeLinks" id="links_0" class="removeButton removeLinksButton"><?php echo file_get_contents($baseFileURL."/ui/trashVector.svg"); ?></button>
                            </div>
                        </div>
                        <button type="button" name="addLinks" id="addLinks" class="button" value="0">Add More Links</button>
                    </div>
                </section>
            </div>

            <hr>

            <label for="privacy"><span class="required">*</span>Privacy of Video</label>
            <select name="privacy" id="privacy">
                <option value="public" selected>Public</option>
                <option value="unlisted">Unlisted</option>
                <option value="private">Private</option>
            </select>

            <label for="commentsOption">Comments</label>
            <select name="commentsOption" id="commentsOption">
                <option value="on" selected>Turned On</option>
                <option value="off">Turned Off</option>
            </select>

            <?php require '../../blades/recaptchaCodeHomepage.php'; ?>
            <div class="columns 2">
                <div class="nm column">
                    <button type="submit" name="submit" class="submitButton">Upload Video</button>
                </div>
                <div class="nm column">
                    <button type="submit" name="delete" class="submitButton uploadDelete"
                        style="background: var(--secondaryColour); ">Delete Video</button>
                </div>
            </div>
        </form>
    </section>
    <!-- End Tags From "blades/portalHeader.php" -->
    </main> <!-- #dashboardContent -->
    </div><!-- .dashboard-->
    </div> <!-- .dashboardWrapper -->
        <script src="../../controllers/js/videoList.js"></script>
    <?php require '../../blades/footer.php'; ?>