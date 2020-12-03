<?php
session_start();

include '../../../database/db_connect.php';
include '../../../database/db_a_videos.php';

if ($_SESSION['uLevel'] == 'admin') {?>
<?php include '../../page-templates/head_l2.php'; ?>
<body>
  <script> document.title = "Admin Videos | OpusVid"; </script>
  <?php
    include '../../page-templates/header_l2.php';
    include '../../page-templates/admin_dash.php';
  ?>
  <h2 class="pageTitle">New User</h2>
  <section id="signupTab">
    <form id="userSignup" method="post" action="../../../database/db_signup.php">

      <div class="columns 2">
        <div class="nm column">
          <input type="text" name="signupFirstName" placeholder="First Name">
        </div>
        <div class="nm column">
          <input type="text" name="signupLastName" placeholder="Last Name">
        </div>
      </div>

      <input type="text" name="signupUsername" placeholder="Username">
      <input type="password" name="signupPassword" placeholder="Password">
      <input type="email" name="signupEmail" placeholder="Email Address">

      <button class="submitButton" type="submit" name="submit">Sign up</button>
    </form>
  </section>
    </section> <!-- #dashContent -->
  </div>
<?php include '../../page-templates/footer.php'; ?>

<!-- IF logged out -->

<?php } else {
  header("Location: ../login");
} ?>
