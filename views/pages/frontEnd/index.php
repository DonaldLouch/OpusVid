<?php
	// Turn on error reporting:
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		
	require '../../blades/head.php'; 
	$videoClass = new Video;
?>
	<body>
		<?php require '../../blades/menu.php';  ?>
			<script> document.title = "<?php echo $websiteName; ?>"</script>
			<div class="wrapper">
				<div class="videoWrap">
					<?php
						if (!isset($_SESSION['userName'])) {
							$userName = null;
						} 
						if (!isset($_SESSION['uID'])) {
							$userID = null;
						} 
						echo $videoFeed = $videoClass->videoFeed($userID, $userName);
					?>
			</div> <!-- .wrapper -->
	
<?php 
	require '../../blades/footer.php';
?>
