<?php  
  require '../../blades/portalHeaderAdmin.php'; 
  $userClass = new Users;
?>

<body>
    <script>
    document.title = "Accounts Manager | <?php echo $websiteName; ?>"
    </script>
    <?php require '../../blades/portalHeader.php'; ?>
    <?php require '../../blades/errors.php'; ?>
    <section id="manageUsers" class="">
        <h3><span class="underline pageTitle">Admin: Accounts Manager</span></h3>
        <div id="adminProfileWrapper">
            <?php echo $userClass->getUsers(); ?>
        </div> <!-- #adminProfileWrapper -->
    </section> <!-- #manageUsers -->

    <!-- End Tags From "blades/portalHeader.php" -->
    </main> <!-- #dashboardContent -->
    </div><!-- .dashboard-->
    </div> <!-- .dashboardWrapper -->
    <?php require '../../blades/footer.php'; ?>