<?php 
  require '../../blades/portalHeaderAdmin.php'; 
    $settingsClass = new Settings;
    $getTerms = $settingsClass->getTerms();
    $terms = $getTerms['settingValue'];
?>
<body>
  <script> document.title = "Settings: TOS | <?php echo $websiteName; ?>"</script>
  <?php require '../../blades/portalHeader.php'; ?> 
  <?php require '../../blades/errors.php'; ?>
  <main>
    <section id="loginPage" class="">
      <h3><span class="underline pageTitle">Settings: Terms of Service</span></h3>
      <br>

      <form id="videoUpload" method="post" action="../../controllers/database/updateTerms.database.php" >
      <a class="toggle" onclick="toggle_visibility('postFormat1')">Format Tips</a>
 <section id="postFormat1" class="panel">
                              <h3>New Section</h3>
                              <pre> 
&#60;a class="toggle" onclick="toggle_visibility('SECTIONID')"&#62;SECTIONTITLE&#60;/a&#62;
&#60;section id="SECTIONID" class="panel"&#62;
    &#60;h3&#62;SECTIONTITLE&#60;/h3&#62;
    &#60;p&#62;CONTENT&#60;/p&#62;
&#60;/section&#62;
                              </pre>
                              <h3>List Items</h3>
                              <pre> 
&#60;ul&#62;
   &#60;li&#62;LISTITEM&#60;/li&#62;
   &#60;li&#62;LISTITEM&#60;/li&#62;
&#60;/ul&#62;
                              </pre>
                                <h3>Links</h3>
                              <pre> 
&#60;a href="LINK"&#62;TEXT&#60;/a&#62;
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
      <a class="toggle" onclick="toggle_visibility('example')">Example Terms</a>
 <section id="example" class="panel">
    <pre>
<?php echo $getTerms['settingDefault']; ?>    
    </pre>
 </section>
<br>
         <div class="field">
            <textarea name="termUpdate"  id="termUpdate"  rows="40"><?php echo $terms; ?></textarea>
            <label for="termUpdate">Terms of Service</label>
        </div>

        <?php require '../../blades/recaptchaCodeHomepage.php'; ?>

        <button type="submit" name="termsUpdate" class="submitButton">Update Terms of Service</button>
      </form>
    </section>
  </div>
<?php require '../../blades/footer.php'; ?>
