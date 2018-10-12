<header>
  <img src="../storage/logos/Opus_LogoTitle.png" alt="Opus Vid Title Logo">
  <?php include 'search_form.php'; ?>
  <?php
    if (isset ($_SESSION['uID'])) {
      include 'main_login_menu_l2.php';
    } else {
      include 'main_logged-out_menu_l2.php';
    }
  ?>
</header>
