<?php
session_start();

$email = $_GET['email'];

include '../../page-templates/head.php';
?>

  <body>
    <script> document.title = "Password Reset | OpusVid"; </script>
    <?php include '../../page-templates/header.php';?>
      <div class="wrapper card passwordReset">
        <div class="successMessage">
          <p>The password reset email has been sent to <?php echo $email; ?>! Make sure to check your inbox!</p>
        </div>
        <?php
          if(!isset($_GET['reset'])){
            //No errors!
          } else {
            $resetError = $_GET['reset'];

            if($resetError == "success") { ?>
              <div class="successMessage">
                <p>The  password reset email has been sent to your inbox!</p>
              </div>
          <?php }
        }
        ?>
      </div>
  <?php include('../../page-templates/footer.php'); ?>
