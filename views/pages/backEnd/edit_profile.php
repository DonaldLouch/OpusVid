<?php 
  require '../../blades/portalHeaderClient.php'; 
  $accountID = $_SESSION['userName'];
  
  $userClass = new Users;
  $profile = $userClass->getProfile($accountID);

?>

<body>
    <script>
    document.title = "Edit <?php echo $_SESSION['userName']; ?> | <?php echo $websiteName; ?>"
    </script>
    <?php require '../../blades/portalHeader.php'; ?>
    <?php require '../../blades/errors.php'; ?>
    <main>
        <section id="editProfile" class="">
            <h3><span class="underline pageTitle">Edit Profile: <?php echo $profile['userName']; ?></span></h3>
            <form id="editProfileForm" method="post" action="../../controllers/database/editProfile.database.php"
                enctype="multipart/form-data">
                <div class="columns 2">
                    <div class="nm column">
                        <input type="text" readonly name="accountID" value="<?php echo $profile['userName']; ?>">
                    </div>
                    <div class="nm column">
                        <input type="text" readonly name="accountEmail" value="<?php echo $profile['userEmail']; ?>">
                    </div>
                </div>

                <hr>

                <div class="field">
                    <textarea name="description" id="descriptionPro" profiles="20" placeholder="Description"
                        required><?php echo $profile['userDescription']; ?></textarea>
                    <label for="descriptionPro"><span class="required">*</span>Description</label>
                </div>

                <div class="field">
                    <input type="text" name="tags" id="tags" placeholder="Tags"
                        value="<?php echo $profile['accountTags']; ?>" required>
                    <label for="tags"><span class="required">*</span>Tags</label>
                </div>

                <section id="theLinksSection" class="listSection">
                    <h4>Links</h4>
                    <div class="formCheckbox">
                        <label class="checkbox">
                            <?php if ($profile['userLinks'] == "NONE") { ?>
                            <input type="checkbox" name="isThereLinks" value="No" id="isThereLinks" checked>
                            <?php } else { ?>
                            <input type="checkbox" name="isThereLinks" value="No" id="isThereLinks">
                            <?php } ?>
                            <span class="design"></span>
                            <span class="text" id="linkText"></span>
                        </label>
                    </div>

                    <div id="linksInputSection">
                        <hr>
                        <p>* For proper formatting of the credit, please include the "http(s)://" in the inputting of the link. </p>
                        <?php
                            $linksField = $profile['userLinks'];
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
            <hr>
            
                <label for="avatarFile">Change Avatar</label>
                <input type="file" name="avatarFile" id="avatarFile">

                <?php require '../../blades/recaptchaCodeHomepage.php'; ?>

                <button type="submit" name="submit" class="submitButton">Edit Profile</button>
            </form>
        </section>
        <!-- End Tags From "blades/portalHeader.php" -->
    </main> <!-- #dashboardContent -->
    </div><!-- .dashboard-->
    </div> <!-- .dashboardWrapper -->
      <script src="../../controllers/js/videoList.js"></script>
    <?php require '../../blades/footer.php'; ?>