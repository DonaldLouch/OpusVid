<nav id="menu-main" class="menuLogin">
  <ul>
    <li><a href="home">Home</a></li>
    <li><a href="categories">Category</a><li>
    <li><img src="<?php echo $_SESSION['uAvatar']; ?>" class="avatar" alt="<?php echo $_SESSION["uName"]; ?> Avatar">
      <ul class="dropDownMain">
        <li><a class="dropDownMainBtn" href="dashboard"><?php echo $_SESSION["uName"]; ?></a></li>
        <li><a href="dashboard">Opus Dashboard</a></li>
        <li><a href="dashboard/upload">Upload</a></li>
        <li><a href="profile?id=<?php echo $_SESSION["uName"]; ?>">View Profile</a></li>
        <li><a href="dashboard/settingsP">Edit Profile</a></li>
        <li><a href="dashboard/settingsA">Account Settings</a></li>
        <li><form class="logoutNav" action="database/db_logout.php" method="post">
          <button type="submit" name="submit">Logout</button>
        </form></li>
      </ul>
    </li>
  </ul>
</nav>
