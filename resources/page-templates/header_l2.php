<header>
  <a href="../../" id="siteLogo">
    <img src="https://opusvid.sfo2.cdn.digitaloceanspaces.com/logos/Opus_LogoTitle.png" alt="Opus Vid Title Logo" >
  </a>
  <?php include 'search_form.php'; ?>
  <?php
    if (isset ($_SESSION['uID'])) {
      include 'main_login_menu_l2.php';
    } else {
      include 'main_logged-out_menu_l2.php';
    }
  ?>
</header>
