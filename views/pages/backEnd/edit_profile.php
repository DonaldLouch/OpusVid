<?php 
  require '../../blades/portalHeaderClient.php'; 
  $accountID = $_SESSION['userName'];
  
  $userClass = new Users;
  $profile = $userClass->getProfile($accountID);

?>
<body>
  <script> document.title = "Edit <?php echo $_SESSION['userName']; ?> | <?php echo $websiteName; ?>"</script>
  <?php require '../../blades/portalHeader.php'; ?> 
  <?php require '../../blades/errors.php'; ?>
  <main>
    <section id="loginPage" class="">
      <h3><span class="underline pageTitle">Edit Profile: <?php echo $profile['userName']; ?></span></h3>
              <form id="videoUpload" method="post" action="../../controllers/database/editProfile.database.php" enctype="multipart/form-data">
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
                  <textarea name="description" id="descriptionPro" profiles="20" placeholder="Description" required><?php echo $profile['userDescription']; ?></textarea>
                  <label for="descriptionPro"><span class="required">*</span>Description</label>
                </div>

                <div class="field">
                  <input type="text" name="tags" id="tags" placeholder="Tags" value="<?php echo $profile['accountTags']; ?>" required>
                  <label for="tags"><span class="required">*</span>Tags</label>
                </div>

                <div class="field">
                  <textarea name="links" id="links" profiles="20" placeholder="Links" required><?php echo $profile['userLinks']; ?></textarea>
                  <label for="links"><span class="required">*</span>Links*</label>
                </div>
                <p style="margin: -1em 0 3em;">*Links should be formated as "LINKORUSERNAME;;TITLE || " in order for the links to properly be formated.</p>
<hr>
                <label for="avatarFile">Change Avatar</label>
                  <input type="file" name="avatarFile" id="avatarFile">

                  <?php require '../../blades/recaptchaCodeHomepage.php'; ?>

                <button type="submit" name="submit" class="submitButton">Edit Profile</button>
              </form>
            </section>
          </div>
      <?php require '../../blades/footer.php'; ?>