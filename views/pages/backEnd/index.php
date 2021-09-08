<?php 
  require '../../blades/portalHeaderClient.php'; 
  $userName = $_SESSION['userName'];
?>

<body>
    <script>
    document.title = "Dashboard | <?php echo $websiteName; ?>"
    </script>
    <?php require '../../blades/portalHeader.php'; ?>
    <?php require '../../blades/errors.php'; ?>
    <section id="dashboardHome">
        <h3><span class="underline pageTitle">Dashboard</span></h3>
        <p>Hello, <?php echo $_SESSION['userName']; ?> </p>
        <section id="viewStats">
            <h3>Here's your stats</h3>
            <?php $viewClass = new Views;
          ?>
            <div class="columns 2">
                <div class="socialStatsWrap column">
                    <p class="socialStatTitle">Video Views</p>
                    <h5 class="socialStatInfo"><?php echo $viewClass->videoViewCount($userName); ?></h5>
                </div>
                <div class="socialStatsWrap column">
                    <p class="socialStatTitle">Profile Views</p>
                    <h5 class="socialStatInfo"><?php echo $viewClass->profileViewCount($userName); ?></h5>
                </div>
            </div>
        </section> <!-- #viewStats -->
    </section> <!-- #dashboardHome -->

    <!-- End Tags From "blades/portalHeader.php" -->
    </main> <!-- #dashboardContent -->
    </div><!-- .dashboard-->
    </div> <!-- .dashboardWrapper -->

    <?php require '../../blades/footer.php'; ?>