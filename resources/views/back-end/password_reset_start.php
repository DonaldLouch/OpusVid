<?php
session_start();

include '../../page-templates/head.php';
?>

  <body>
    <script> document.title = "Password Reset | OpusVid"; </script>
    <?php include '../../page-templates/header.php';?>
      <div class="wrapper card passwordReset">
        <h2 class="pageTitle">Forgot Your Password? Let us reset your password!</h2>
        <?php
          if(!isset($_GET['reset'])){
            //No errors!
          } else {
            $resetError = $_GET['reset'];

            if($resetError == "empty") { ?>
              <div class="errorMessage">
                <p>Please enter your email!</p>
              </div>
            <?php } elseif($resetError == "invaild") { ?>
              <div class="errorMessage">
                <p>Sorry, there seems to be no users with the entered email. Try again or contact Opus Vid Support at support@opusvid.com!</p>
              </div>
          <?php }
        }
        ?>
        <form id="passwordReset" method="post" action="database/db_pass_reset.php" autocomplete="off">
          <input type="text" name="email" placeholder="Your email address">
          <button class="submitButton" type="submit" name="reset-password">Reset Password</button>
        </form>
      </div>
  <?php include('../../page-templates/footer.php'); ?>
