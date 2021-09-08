<?php
	// Turn on error reporting:
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		
	require '../../blades/head.php'; 
	$videoClass = new Video;
?>

<body>
    <?php require '../../blades/menu.php';  ?>
    <script>
    document.title = "<?php echo $websiteName; ?>"
    </script>
    <main class="pageWrapper">
        <div class="videoFeed">
            <!--TEST-->
            <?php
						if (!isset($_SESSION['userName'])) {
							$userName = null;
						} 
						if (!isset($_SESSION['uID'])) {
							$userID = null;
						} 
						echo $videoFeed = $videoClass->videoFeed($userID, $userName);
					?>
        </div> <!-- .videoFeed -->
    </main> <!-- .pageWrapper -->

    <?php 
	require '../../blades/footer.php';
?>