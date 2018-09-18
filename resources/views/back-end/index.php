<?php

session_start();

  if (isset ($_SESSION['uID'])) {
    //Displays Page!
  } else {
   header("Location: login.php");
   exit();
 }
?>

<?php include('../../page-templates/head.php'); ?>
<body>
  <?php include('../../page-templates/header.php'); ?>
  <div class="dashWrapper">
    <nav id="dashNav">
      <a href="#" class="dashActive">Dashboard</a>
      <a href="#">Videos</a>
        <nav class="dashNavSub">
          <a href="#">Upload New Video</a>
          <a href="#">Manage Videos</a>
          <a href="#">Manage Opus Collections</a>
        </nav>
      <a href="#">Settings</a>
        <nav class="dashNavSub">
          <a href="#">Profile</a>
          <a href="#">Account</a>
        </nav>
      <form action="../../../database/db_logout.php" method="post">
        <button class="dashNav" type="submit" name="submit">Logout</button>
      </form>
    </nav>
    <section id="dashContent">
      <h3>Hi, <?php echo $_SESSION['uName']; ?> you have been logged in!</h3>
    </section>
  </div>
</body>
</html>
