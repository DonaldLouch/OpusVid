<?php 
$email = $_GET['email'];
require '../../blades/head.php'; 
?>
<body>
	<script> document.title = "Password Reset | <?php echo $websiteName; ?>"; </script>
	<?php require '../../blades/menu.php'; ?>
	<div class="passwordReset">
		<div class="successMessage">
			<p>The password reset email has been sent to <?php echo $email; ?>! Make sure to check your inbox! If it's not there please check your spam/junk folder or contact our support team at <a href="mailto:Support at <?php echo $websiteName;?><support@<?php echo $siteURL; ?>>">support@<?php echo $siteURL; ?></a> and we'll be more than happy to help.</p>
		</div>
	</div>
	<?php require '../../blades/footer.php'; ?>