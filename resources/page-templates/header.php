<header>
  <img src="storage/logos/Opus_LogoTitle.png" alt="Opus Vid Title Logo">
  <?php include 'search_form.php'; ?>
  <?php
    if (isset ($_SESSION['uID'])) {
      include 'main_login_menu.php';
    } else {
      include 'main_logged-out_menu.php';
    }
  ?>
</header>
