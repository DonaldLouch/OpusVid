<?php 
  require '../../blades/portalHeaderAdmin.php'; 
?>

<body>
    <script>
    document.title = "PHP Information | <?php echo $websiteName; ?>"
    </script>
    <?php require '../../blades/portalHeader.php'; ?>
    <div class="phpInfo">
        <?php phpinfo(); ?>
    </div>
    <!-- End Tags From "blades/portalHeader.php" -->
    </main> <!-- #dashboardContent -->
    </div><!-- .dashboard-->
    </div> <!-- .dashboardWrapper -->
    <?php require '../../blades/footer.php'; ?>