<?php  
  require '../../blades/portalHeaderMod.php'; 
  $videoClass = new Video;
  $userClass = new Users;

  $playerID = $_GET['id'];

  $player = $videoClass->playerPage($playerID);
?>

<body>
    <script>
    document.title = "Edit <?php echo $player['videoTitle']; ?> | <?php echo $websiteName; ?>"
    </script>
    <?php require '../../blades/portalHeader.php'; ?>
    <section id="manageVideo" class="">
        <script src="resources/js/uploadProgress.js"></script>
        <h2 class="pageTitle">Edit Video: <?php echo $player['videoTitle']; ?></h2>
        <?php require '../../blades/errors.php'; ?>
        <a class="button" href="../../player?id=<?php echo $playerID; ?>" target="_blank">Preview Video</a>
        <form id="editVideo" method="post" action="../../controllers/database/videoEdit.database.php"
            enctype="multipart/form-data">
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
                        <option value="<?php echo $player['opusCreator']; ?>"><?php echo $player['opusCreator']; ?>
                        </option>
                        <option disabled>---</option>
                        <?php 
                        echo "---"; 
                        echo $userClass->usersVideoEdit();
                      ?>
                    </select>
                </div>
            </div>

            <div class="field">
                <input type="text" name="vTitle" id="vTitle" value="<?php echo $player['videoTitle']; ?>"
                    placeholder="Video Title" required>
                <label for="vTitle"><span class="required">*</span>Title</label>
            </div>

            <div class="field">
                <textarea name="sDescription" id="sDescription" maxlength="250" placeholder="Short Description"
                    required><?php echo $player['shortDescription']; ?></textarea>
                <label for="sDescription"><span class="required">*</span>Short Description: Max 250 Characters</label>
            </div>

            <div class="field">
                <textarea name="description" id="descriptionVid" rows="20" placeholder="Description"
                    required><?php echo $player['description']; ?></textarea>
                <label for="descriptionVid"><span class="required">*</span>Description</label>
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
                        <input type="text" name="tags" id="tags" value="<?php echo $player['tags']; ?>"
                            placeholder="Tags" required>
                        <label for="tags"><span class="required">*</span>Tags</label>
                    </div>
                </div>
            </div>
            
            <hr>
           <section id="theChaptersSection" class="listSection">
                <h4>Chapters</h4>

                <div class="formCheckbox">
                    <label class="checkbox">
                        <?php if ($player['chapters'] == "NONE") { ?>
                        <input type="checkbox" name="isThereChapters" value="No" id="isThereChapters" checked>
                        <?php } else { ?>
                        <input type="checkbox" name="isThereChapters" value="No" id="isThereChapters">
                        <?php } ?>
                        <span class="design"></span>
                        <span class="text" id="chapterCheckText"></span>
                    </label>
                </div>

                <div id="chapterInputSection">
                    <hr>
                    <p>In order for the chapter to properly be formated you MUST include a "0:00" / "00:00" chapter, for example "0:00 ;; Introduction". Note that all times should be formated automatically by first time code to last time code.</p>
                    <?php
                    $chaptersField = $player['chapters'];
                    $chapterExplode = explode("||", $chaptersField);
                    $chaptersNumber = count($chapterExplode);
                    
                    
                    foreach ($chapterExplode as $keyChapter => $chapterInfo) {
                        $chapterInfoExplode = explode(";;", $chapterInfo);
                    ?>
                    <div class="columns 3 list" id="chapter_<?php echo $keyChapter; ?>">
                        <div class="column">
                            <div class="field">
                                <input type="text" name="chapterTimeCode[]" id="chapterTimeCode_<?php echo $keyChapter; ?>" value="<?php if (!empty($chapterInfoExplode[0])) { echo $chapterInfoExplode[0]; }?>">
                                <label for="chapterTimeCode_<?php echo $keyChapter; ?>"><span class="required">*</span>Chapter Time Code</label>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <input type="text" name="chapterTitle[]" id="chapterTitle_<?php echo $keyChapter; ?>" value="<?php if (!empty($chapterInfoExplode[1])) { echo $chapterInfoExplode[1]; }?>">
                                <label for="chapterTitle_<?php echo $keyChapter; ?>"><span class="required">*</span>Chapter Title</label>
                            </div>
                        </div>
                        <div class="column">
                            <button type="button" name="removeChapter" id="chapter_<?php echo $keyChapter; ?>" class="removeButton removeChapterButton"><?php echo file_get_contents($baseFileURL."/ui/trashVector.svg"); ?></button>
                        </div>
                    </div>
                    <?php } ?>
                    <button type="button" name="addChapters" id="addChapters" class="button" value="<?php echo array_key_last ($chapterExplode);?>">Add More Chapters</button>
                </div>
            </section>

            <section id="theMusicSection" class="listSection">
                <h4>Music Credit</h4>

                <div class="formCheckbox">
                    <label class="checkbox">
                        <?php if ($player['musicCredit'] == "NONE") { ?>
                        <input type="checkbox" name="isThereMusicCredit" value="No" id="isThereMusicCredit" checked>
                        <?php } else { ?>
                        <input type="checkbox" name="isThereMusicCredit" value="No" id="isThereMusicCredit">
                        <?php } ?>
                        <span class="design"></span>
                        <span class="text" id="musicCreditCheckText"></span>
                    </label>
                </div>
                <div id="musicCreditInputSection">
                    <hr>
                    <p>* For proper formatting of the credit, if you have a song playing mutuple times and you would like to credit the song each time, please add a single pipe and space at the start and finish. As an example: "0:00 | 2:09 | 8:10".</p>
                    <?php
                    $musicField = $player['musicCredit'];
                    $musicExplode = explode("||", $musicField);
                    $musicNumber = count($musicExplode);
                    
                    
                    foreach ($musicExplode as $keyMusicCredit => $musicInfo) {
                        $musicInfoExplode = explode(";;", $musicInfo);
                    ?>
                    <div class="columns 3 list" id="musicCredit_<?php echo $keyMusicCredit; ?>">
                        <div class="column">
                            <div class="field">
                                <input type="text" name="musicTimePlayed[]" id="musicTimePlayed_<?php echo $keyMusicCredit; ?>" value="<?php if (!empty($musicInfoExplode[0])) { echo $musicInfoExplode[0]; }?>">
                                <label for="musicTimePlayed_<?php echo $keyMusicCredit; ?>">Time Code(s) *</label>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <input type="text" name="musicSongTitle[]" id="musicSongTitle_<?php echo $keyMusicCredit; ?>" value="<?php if (!empty($musicInfoExplode[1])) { echo $musicInfoExplode[1]; }?>">
                                <label for="musicSongTitle_<?php echo $keyMusicCredit; ?>"><span class="required">*</span>Song Title</label>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <input type="text" name="musicArtist[]" id="musicArtist_<?php echo $keyMusicCredit; ?>" value="<?php if (!empty($musicInfoExplode[2])) { echo $musicInfoExplode[2]; }?>">
                                <label for="musicArtist_<?php echo $keyMusicCredit; ?>"><span class="required">*</span>Artist</label>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <input type="text" name="musicLink[]" id="musicLink_<?php echo $keyMusicCredit; ?>" value="<?php if (!empty($musicInfoExplode[3])) { echo $musicInfoExplode[3]; }?>">
                                <label for="musicLink_<?php echo $keyMusicCredit; ?>">Link to Song</label>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <input type="text" name="musicMore[]" id="musicMore_<?php echo $keyMusicCredit; ?>" value="<?php if (!empty($musicInfoExplode[4])) { echo $musicInfoExplode[4]; }?>">
                                <label for="musicMore_<?php echo $keyMusicCredit; ?>">More Information</label>
                            </div>
                        </div>
                        <div class="column">
                            <button type="button" name="removeMusic" id="musicCredit_<?php echo $keyMusicCredit; ?>" class="removeButton removeMusicButton"><?php echo file_get_contents($baseFileURL."/ui/trashVector.svg"); ?></button>
                        </div>
                    </div>
                    <?php } ?>
                    <button type="button" name="addMusic" id="addMusic" class="button" value="<?php echo array_key_last ($musicInfoExplode);?>">Add More Music Credit</button>
                </div>
            </section>

            <section id="theVideoCreditSection" class="listSection">
                <h4>Video Credits</h4>
                <div class="formCheckbox">
                    <label class="checkbox">
                        <?php if ($player['videoCredits'] == "NONE") { ?>
                        <input type="checkbox" name="isThereVideoCredit" value="No" id="isThereVideoCredit" checked>
                        <?php } else { ?>
                        <input type="checkbox" name="isThereVideoCredit" value="No" id="isThereVideoCredit">
                        <?php } ?>
                        <span class="design"></span>
                        <span class="text" id="videoCreditCheckText"></span>
                    </label>
                </div>

                <div id="videoCreditInputSection">
                    <hr>
                    <p>An example could be the equitment used for the video OR who did what for the production OR who starts in the video, to any credit you think would be releavent to the video.</p>
                    <?php
                    $videoCreditsField = $player['videoCredits'];
                    $videoCreditExplode = explode("||", $videoCreditsField);
                    $videoCreditsNumber = count($videoCreditExplode);
                    
                    
                    foreach ($videoCreditExplode as $keyVideoCredit => $videoCredit) {
                        $videoCreditInfoExplode = explode(";;", $videoCredit);
                    ?>
                    <div class="columns 3 list" id="videoCredit_<?php echo $keyVideoCredit; ?>">
                        <div class="column">
                            <div class="field">
                                <input type="text" name="videoCreditTitle[]" id="videoCreditTitle_<?php echo $keyVideoCredit; ?>" value="<?php if (!empty($videoCreditInfoExplode[0])) { echo $videoCreditInfoExplode[0]; }?>">
                                <label for="videoCreditTitle_<?php echo $keyVideoCredit; ?>"><span class="required">*</span>Video Credit Title</label>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <input type="text" name="videoCreditName[]" id="videoCreditName_<?php echo $keyVideoCredit; ?>" value="<?php if (!empty($videoCreditInfoExplode[1])) { echo $videoCreditInfoExplode[1]; }?>">
                                <label for="videoCreditName_<?php echo $keyVideoCredit; ?>"><span class="required">*</span>Video Credit Name</label>
                            </div>
                        </div>
                        <div class="column">
                            <button type="button" name="removeVideoCredit" id="videoCredit_<?php echo $keyVideoCredit; ?>" class="removeButton removeVideoCreditButton"><?php echo file_get_contents($baseFileURL."/ui/trashVector.svg"); ?></button>
                        </div>
                    </div>
                    <?php } ?>
                    <button type="button" name="addVideoCredit" id="addVideoCredit" class="button" value="<?php echo array_key_last ($videoCreditInfoExplode);?>">Add More Video Credits</button>
                </div>
            </section>

            <section id="theStaringSection" class="listSection">
                <h4>Starting</h4>
                <div class="formCheckbox">
                    <label class="checkbox">
                        <?php if ($player['staring'] == "NONE") { ?>
                        <input type="checkbox" name="isThereStaringCredit" value="No" id="isThereStaringCredit" checked>
                        <?php } else { ?>
                        <input type="checkbox" name="isThereStaringCredit" value="No" id="isThereStaringCredit">
                        <?php } ?>
                        <span class="design"></span>
                        <span class="text" id="staringCreditCheckText"></span>
                    </label>
                </div>

                <div id="staringCreditInputSection">
                    <hr>
                    <p>* For proper formatting of the credit, if the person that is staring does not have a username on this website please use the format "NoUn" in the "Username" section.</p>
                    <?php
                    $staringField = $player['staring'];
                    $staringExplode = explode("||", $staringField);
                    $statringNumber = count($staringExplode);
                    
                    
                    foreach ($staringExplode as $keyStaring => $staringInfo) {
                        $staringInfoExplode = explode(";;", $staringInfo);
                    ?>
                    <div class="columns 4 list" id="staring_<?php echo $keyStaring; ?>">
                        <div class="column">
                            <div class="field">
                                <input type="text" name="staringTimeCode[]" id="staringTimeCode<?php echo $keyStaring; ?>" value="<?php if (!empty($staringInfoExplode[0])) { echo $staringInfoExplode[0]; }?>">
                                <label for="staringTimeCode<?php echo $keyStaring; ?>">Staring Time Code</label>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <input type="text" name="staringDisplayName[]" id="staringDisplayName_<?php echo $keyStaring; ?>" value="<?php if (!empty($staringInfoExplode[1])) { echo $staringInfoExplode[1]; }?>">
                                <label for="staringDisplayName_<?php echo $keyStaring; ?>"><span class="required">*</span>Display Name</label>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <input type="text" name="staringUsername[]" id="staringUsername_<?php echo $keyStaring; ?>" value="<?php if (!empty($staringInfoExplode[2])) { echo $staringInfoExplode[2]; }?>">
                                <label for="staringUsername_<?php echo $keyStaring; ?>"><span class="required">*</span>Username *</label>
                            </div>
                        </div>
                        <div class="column">
                            <button type="button" name="removeStaring" id="staring_<?php echo $keyStaring; ?>" class="removeButton removeStaringButton"><?php echo file_get_contents($baseFileURL."/ui/trashVector.svg"); ?></button>
                        </div>
                    </div>
                    <?php } ?>
                    <button type="button" name="addStaring" id="addStaring" class="button" value="<?php echo array_key_last ($staringInfoExplode);?>">Add More Staring Credit</button>
                </div>
            </section>
            <div class="listSection">
                <h4>Link Style</h4>
                <select name="linkType" id="linkType">
                    <option value="leaveAsIS" selected>Leave As Is</option>
                    <option value="default">Links From Profile</option>
                    <option value="custom">Custom Links</option>
                    <option value="noLinks">No Links</option>
                </select>
                <section id="theLinksSection" class="listSection">
                    <h4>Custom Links</h4>
                    <div id="linksInputSection">
                        <p>* For proper formatting of the credit, please include the "http(s)://" in the inputting of the link. </p>
                        <?php
                    $linksField = $player['links'];
                    $linksExplode = explode("||", $linksField);
                    $linksNumber = count($linksExplode);


                    foreach ($linksExplode as $keyLinks => $linkInfo) {
                        $linksInfoExplode = explode(";;", $linkInfo);
                ?>
                        <div class="columns 3 list" id="links_<?php echo $keyLinks; ?>">
                            <div class="column">
                                <div class="field">
                                    <input type="text" name="linkHref[]" id="linkHref_<?php echo $keyLinks; ?>" value="<?php if (!empty($linksInfoExplode[0])) { echo $linksInfoExplode[0]; }?>">
                                    <label for="linkHref_<?php echo $keyLinks; ?>"><span class="required">*</span>Link URL</label>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <input type="text" name="linkTitle[]" id="linkTitle_<?php echo $keyLinks; ?>" value="<?php if (!empty($linksInfoExplode[1])) { echo $linksInfoExplode[1]; }?>">
                                    <label for="linkTitle_<?php echo $keyLinks; ?>"><span class="required">*</span>Link Title</label>
                                </div>
                            </div>
                            <div class="column">
                                <button type="button" name="removeLinks" id="links_<?php echo $keyLinks; ?>" class="removeButton removeLinksButton"><?php echo file_get_contents($baseFileURL."/ui/trashVector.svg"); ?></button>
                            </div>
                        </div>
                        <?php } ?>
                        <button type="button" name="addLinks" id="addLinks" class="button" value="<?php echo array_key_last ($linksInfoExplode);?>">Add More Links</button>
                    </div>
                </section>
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
                    <label for="commentsOption">Comments</label>
                    <select name="commentsOption" id="commentsOption">
                        <option value="<?php echo $player['commentSetting']; ?>" selected>
                            <?php echo $player['commentSetting']; ?></option>
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
    <!-- End Tags From "blades/portalHeader.php" -->
    </main> <!-- #dashboardContent -->
    </div><!-- .dashboard-->
    </div> <!-- .dashboardWrapper -->
        <script src="../../controllers/js/videoList.js"></script>
    <?php require '../../blades/footer.php'; ?>