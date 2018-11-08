<div class="dashWrapper">
  <nav id="dashNav">
    <a href="../sitemap">Sitemap</a>
    <a href="../dashboard">Dashboard</a>
    <a href="manage">Videos</a>
      <nav class="dashNavSub">
        <a href="upload">Upload New Video</a>
        <a href="manage">Manage Videos</a>
        <a href="manage_collections">Manage Opus Collections</a>
        <a href="watch">Manage Watch Later List</a>
      </nav>
    <a href="#">Settings</a>
      <nav class="dashNavSub">
        <a href="../profile?id=<?php echo $_SESSION['uName']; ?>">View Profile</a>
        <a href="settingsP">Edit Profile</a>
        <a href="settingsA">Account Settings</a>
      </nav>
    <?php if ($_SESSION['uLevel'] == 'admin') {?>
      <a href="#">Admin</a>
      <nav class="dashNavSub">
        <a href="../../admin/videos">Videos</a>
        <a href="../../admin/accounts">Accounts</a>
        <a href="../../admin/feedback_results">Feedback Results</a>
      </nav>
    <?php } ?>
    <form action="database/db_logout.php" method="post">
      <button class="dashNav" type="submit" name="submit">Logout</button>
    </form>
  </nav>
  <section id="dashContent">
