<?php

session_start();

if (isset ($_SESSION['uID'])) {
   include '../../page-templates/head.php'; ?>
<body>
  <script>
    document.title = "Dashboard | Opus Vid";
  </script>
  <?php
    include '../../page-templates/header.php';
    include '../../page-templates/dash_nav.php';
    if(isset($_GET['login'])){
      $loginError = $_GET['login'];
      if($loginError == "success"){ ?>
        <div class="successMessage">
          <p>Successfully logged in!</p>
        </div>
    <?php }
    }
    ?>
      <h3>Hi, <?php echo $_SESSION['uName']; ?> you have been logged in!</h3>
      <p>Your user level is <?php echo $_SESSION['uLevel']; ?></p>
      <a class="button" href="sitemap.php">View Sitemap!</a>
    </section>
  </div>
<?php include '../../page-templates/footer.php'; ?>

<?php } else {
 header("Location: login");
 exit();
}
?>
