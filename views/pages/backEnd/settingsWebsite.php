<?php 
  require '../../blades/portalHeaderAdmin.php'; 
?>
<body>
  <script> document.title = "Settings: Website | <?php echo $websiteName; ?>"</script>
  <?php require '../../blades/portalHeader.php'; ?> 
  <?php require '../../blades/errors.php'; ?>
  <main>
    <section id="loginPage" class="">
      <h3><span class="underline pageTitle">Settings: Website</span></h3>
      <br>

      <form id="videoUpload" method="post" action="../../controllers/database/updateWebsite.database.php"  enctype="multipart/form-data" autocomplete="off">
        <?php 
          $settings = new Settings;
          echo $settingSet = $settings->getSettings();
          require '../../blades/recaptchaCodeHomepage.php'; 
        ?>
        <button type="submit" name="updateWebsite" class="submitButton">Update Website Settings</button>
      </form>
    </section>
  </div>
<?php require '../../blades/footer.php'; ?>
