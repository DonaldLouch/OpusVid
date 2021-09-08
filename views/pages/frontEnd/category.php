<?php 
require '../../blades/head.php';

$category = $_GET['type'];

?>

<body>
    <script>
    document.title = "<?php echo $category; ?> | <?php echo $websiteName; ?>"
    </script>
    <?php  include '../../blades/menu.php'; ?>

    <main class="pageWrapper">
        <section id="category">
            <?php 
          $video = new Video;
          $postSet = $video->allCategoryPost($category);
        ?>
        </section>
    </main>

    <?php require '../../blades/footer.php'; ?>