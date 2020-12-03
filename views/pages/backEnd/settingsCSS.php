<?php 
  require '../../blades/portalHeaderAdmin.php'; 
?>
<body>
  <script> document.title = "Settings: CSS | <?php echo $websiteName; ?>"</script>
  <?php require '../../blades/portalHeader.php'; ?> 
  <?php require '../../blades/errors.php'; ?>
  <main>
    <section id="loginPage" class="">
      <h3><span class="underline pageTitle">Settings: CSS</span></h3>
      <br>

      <form id="videoUpload" method="post" action="../../controllers/database/updateCSS.database.php"  enctype="multipart/form-data" autocomplete="off">
        <?php 
          $settings = new Settings;
          echo $settingSet = $settings->getCSS();
          require '../../blades/recaptchaCodeHomepage.php'; 
        ?>
        <button type="submit" name="updateCSS" class="submitButton">Update Website Styles</button>
      </form>
    </section>
  </div>
<?php require '../../blades/footer.php'; ?>
