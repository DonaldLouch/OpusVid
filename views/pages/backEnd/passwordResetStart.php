<?php 
require '../../blades/head.php'; 
?>

<body>
    <script>
    document.title = "Password Reset | <?php echo $websiteName; ?>";
    </script>
    <?php require '../../blades/menu.php'; ?>
    <main class="pageWrapper dashboardPage">
        <section id="loginPage" class="card passwordReset">
            <h3><span class="underline pageTitle">Forgot Your Password?<br> Let's reset your password!</span></h3>
            <br>
            <br>
            <form id="passwordReset" method="post" action="../../../controllers/database/passRestS1.database.php">
                <?php include '../../blades/errors.php'; ?>
                <div class="field">
                    <input type="text" name="email" id="email" placeholder="Your email address">
                    <label for="email">Your email address</label>
                </div>
                <?php require '../../blades/recaptchaCodeHomepage.php'; ?>
                <button class="submitButton" type="submit" name="resetPassword">Reset Password</button>
            </form>
        </section>
    </main>
    <?php require '../../blades/footer.php'; ?>