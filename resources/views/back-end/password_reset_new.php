<?php
session_start();

$token = $_GET['token'];

include '../../page-templates/head.php';
?>

  <body>
    <script>
      document.title = "Password Reset | Opus Vid";
    </script>
    <?php include '../../page-templates/header.php';?>
      <div class="wrapper card passwordReset">
        <h3>Forgot Your Password? Let us reset your password!</h3>
        <?php
          if(!isset($_GET['reset'])){
            //No errors!
          } else {
            $resetError = $_GET['reset'];

            if($resetError == "empty") { ?>
              <div class="errorMessage">
                <p>Please enter a password!</p>
              </div>
            <?php } elseif($resetError == "invaild") { ?>
              <div class="errorMessage">
                <p>You didn't enter the same passwords! Try again!</p>
              </div>
          <?php }
        }
        ?>
        <form id="passwordReset" method="post" action="database/db_pass_reset_new.php" autocomplete="off">
          <input type="text" name="token" value="<?php echo $token; ?>" hidden>
          <input type="password" name="new_password" placeholder="Enter New Password">
          <input type="password" name="confirm_password" placeholder="Confirm New Password">
          <button class="submitButton" type="submit" name="change-password">Change Password</button>
        </form>
      </div>
  <?php include('../../page-templates/footer.php'); ?>
