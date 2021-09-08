<?php 
    require '../../blades/head.php'; 
    $settingsClass = new Settings;
    $terms = $settingsClass->getTerms();
?>

<body>
    <?php  include '../../blades/menu.php'; ?>

    <script>
    document.title = "Terms of Service | <?php echo $websiteName; ?>"
    </script>
    <main class="pageWrapper">
        <div class="pageCard">
            <?php require '../../blades/errors.php'; ?>
            <h3><span class="underline pageTitle">Terms of Service</span></h3>
            <div class="terms">
                <?php print_r(htmlspecialchars_decode($terms['settingValue'])); ?>
            </div>
        </div>
    </main>
    <?php require '../../blades/footer.php'; ?>