<div class="dashWrapper">
  <nav id="dashNav">
    <a href="dashboard">Dashboard</a>
    <a href="dashboard/manage">Videos</a>
      <nav class="dashNavSub">
        <a href="dashboard/upload">Upload New Video</a>
        <a href="dashboard/manage">Manage Videos</a>
        <a href="dashboard/manage_collections">Manage Opus Collections</a>
      </nav>
    <a href="#">Settings</a>
      <nav class="dashNavSub">
        <a href="profile?id=<?php echo $_SESSION['uName']; ?>">View Profile</a>
        <a href="dashboard/settingsP">Edit Profile</a>
        <a href="dashboard/settingsA">Account Settings</a>
      </nav>
    <?php if ($_SESSION['uLevel'] == 'admin') {?>
      <a href="#">Admin</a>
      <nav class="dashNavSub">
        <a href="admin/videos">Videos</a>
        <a href="admin/accounts">Accounts</a>
      </nav>
    <?php } ?>
    <form action="database/db_logout.php" method="post">
      <button class="dashNav" type="submit" name="submit">Logout</button>
    </form>
  </nav>
  <section id="dashContent">
