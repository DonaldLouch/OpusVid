<?php
  require '../../blades/head.php'; 

  $videoClass = new Video;
?>

<body id="categories">
    <script>
    document.title = "Categories | <?php echo $websiteName; ?>"
    </script>
    <?php  include '../../blades/menu.php'; ?>
    <main class="pageWrapper">
        <h2 class="pageTitle">Categories</h2>
        <div class="categoriesWrapper">
            <?php echo $videoClass->categoriesPage(); ?>
        </div>
    </main>

    <?php include '../../blades/footer.php'; ?>