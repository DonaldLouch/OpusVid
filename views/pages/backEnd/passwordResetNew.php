<?php 
	require '../../blades/head.php'; 
	
	$verify = $_GET['verify'];
	$token = $_GET['token'];
?>

<body>
    <script>
    document.title = "Password Reset | <?php echo $websiteName; ?>";
    </script>
    <?php require '../../blades/menu.php'; ?>
    <main class="pageWrapper dashboardPage">
        <section id="loginPage" class="card passwordResetNew">
            <h3><span class="underline pageTitle">Please Enter Your New Password!</span></h3>
            <br>
            <?php
		if (empty($verify) || empty($token)) {?>
            <div class="errorMessage">
                <p>Your request could not be completed. Please <a href="passwordReset" class="button">Try Again</a>!</p>
            </div>
            <?php } elseif (ctype_xdigit($verify) == false && ctype_xdigit($token) == false) { ?>
            <div class="errorMessage">
                <p>Your request could not be completed. Please <a href="passwordReset" class="button">Try Again</a>!</p>
            </div>
            <?php } elseif (ctype_xdigit($verify) !== false && ctype_xdigit($token) !== false) { ?>
            <form id="passwordReset" method="post" action="../../../controllers/database/passRestS2.database.php"
                autocomplete="off">
                <?php require '../../blades/errors.php'; ?>
                <input type="hidden" name="verify" value="<?php echo $verify; ?>">
                <input type="hidden" name="token" value="<?php echo $token; ?>">
                <div class="field">
                    <input type="password" name="newPassword" id="newPassword" placeholder="Enter New Password">
                    <label for="newPassword">Enter New Password</label>
                </div>
                <div class="field">
                    <input type="password" name="confirmPassword" id="confirmPassword"
                        placeholder="Confirm New Password">
                    <label for="confirmPassword">Confirm New Password</label>
                </div>
                <?php require '../../blades/recaptchaCodeHomepage.php'; ?>
                <button class="submitButton" type="submit" name="changePassword" class="button">Change Password</button>
            </form>
            <?php } ?>
        </section>
    </main>
    <?php require '../../blades/footer.php'; ?>