<header>
  <img src="../../../storage/logos/Opus_LogoTitle.png">
  <h1 hidden="">Opus Vid</h1>
  <nav id="menu-main">
    <a href="#">Home</a>
    <a href="#">Category</a>
    <a href="#">Upload</a>
    <a href="#">Account</a>
      <?php
        if (isset ($_SESSION['uID'])) {
          echo '<form class="logoutNav" action="../../../database/db_logout.php" method="post">
            <button type="submit" name="submit">Logout</button>
          </form>';
        } else {
          echo '<a href="login.php">Login/Signup</a>';
        }
      ?>
  </nav>
</header>
