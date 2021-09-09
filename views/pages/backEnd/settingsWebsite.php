<?php 
  require '../../blades/portalHeaderAdmin.php'; 
?>

<body>
    <script>
    document.title = "Settings: Website | <?php echo $websiteName; ?>"
    </script>
    <?php require '../../blades/portalHeader.php'; ?>
    <?php require '../../blades/errors.php'; ?>
    <section id="loginPage" class="">
        <h3><span class="underline pageTitle">Settings: Website</span></h3>
        <form id="settingsWebsite" class="settingsForm" method="post"
            action="../../controllers/database/updateWebsite.database.php" enctype="multipart/form-data"
            autocomplete="off">
            <?php 
          $settings = new Settings;
          echo $settingSet = $settings->getSettings();
          require '../../blades/recaptchaCodeHomepage.php'; 
        ?>
            <button type="submit" name="updateWebsite" class="submitButton">Update Website Settings</button>
        </form>
    </section>
    <!-- End Tags From "blades/portalHeader.php" -->
    </main> <!-- #dashboardContent -->
    </div><!-- .dashboard-->
    </div> <!-- .dashboardWrapper -->
    <?php require '../../blades/footer.php'; ?>