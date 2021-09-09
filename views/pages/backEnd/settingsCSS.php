<?php 
  require '../../blades/portalHeaderAdmin.php'; 
?>

<body>
    <script>
    document.title = "Settings: CSS | <?php echo $websiteName; ?>"
    </script>
    <?php require '../../blades/portalHeader.php'; ?>
    <?php require '../../blades/errors.php'; ?>
    <section id="cssSettingsPage" class="">
        <h3><span class="underline pageTitle">Settings: CSS</span></h3>

        <form id="settingsCSS" class="settingsForm" method="post"
            action="../../controllers/database/updateCSS.database.php" enctype="multipart/form-data" autocomplete="off">
            <?php 
          $settings = new Settings;
          echo $settingSet = $settings->getCSS();
          require '../../blades/recaptchaCodeHomepage.php'; 
        ?>
            <button type="submit" name="updateCSS" class="submitButton">Update Website Styles</button>
        </form>
    </section>
    <!-- End Tags From "blades/portalHeader.php" -->
    </main> <!-- #dashboardContent -->
    </div><!-- .dashboard-->
    </div> <!-- .dashboardWrapper -->
    <?php require '../../blades/footer.php'; ?>