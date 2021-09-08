<?php 
require '../../blades/head.php';

$search = $_POST['search'];
$videoClass = new Video;
$userClass = new Users;
?>

<body>
    <script>
    document.title = "Search | <?php echo $websiteName; ?>"
    </script>
    <?php  include '../../blades/menu.php'; ?>

    <main class="pageWrapper">
        <section id="search">
            <?php if (isset($_POST['submit'])) { ?>
            <div class="videoFeed">
                <?php $videoClass->searchVideos($search); ?>
            </div>
            <div class="opusCreatorFeed">
                <?php $userClass->searchOpusCreator($search); ?>
            </div>

            <?php } else { ?>
            <div class="errorMessage">
                <h3>No results found. Please try another keyword!</h3>
            </div>
            <?php } ?>

        </section>
        <?php require '../../blades/footer.php'; ?>