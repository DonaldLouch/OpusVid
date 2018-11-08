<?php
session_start();

include '../../../database/db_connect.php';
include '../../../database/db_a_accounts.php';

if ($_SESSION['uLevel'] == 'admin') {?>
<?php include '../../page-templates/head_l2.php'; ?>
<body>
  <script> document.title = "Admin Videos | OpusVid"; </script>
  <?php
    include '../../page-templates/header_l2.php';
    include '../../page-templates/admin_dash.php';}
    if(isset($_GET['edited']) || isset($_GET['delete'])){
      $editError = $_GET['edited'];
      $deleteError = $_GET['delete'];
      if($editError == "success"){ ?>
          <div class="successMessage">
            <p>The video was successfully edited!</p>
          </div>
        <?php } elseif($deleteError == "success") { ?>
          <div class="successMessage">
            <p>The video was successfully deleted!</p>
          </div>
        <?php } elseif($deleteError == "failed") { ?>
          <div class="errorMessage">
            <p>An error happened when trying to delete the video. Please try again or contact the support team at <a href="mailto:support@opusvid.com">support@opusvid.com</a> and we'll be happy to help!</p>
          </div>
        <?php }}?>
        <h2 class="pageTitle">Admin: Accounts Manager</h2>
    <a href="new_user" class="button">Add New User</a>
    <div>
      <?php foreach ($profiles as $profile) { ?>
        <article class="adminAccountProfileWrap">
          <img src="<?php echo $profile['avatar']; ?>" class="avatarSearch" alt="Thumbnail <?php echo $profile['username']; ?>">

          <a href="../profile?id=<?php echo $profile['username']; ?>">
            <h3><?php echo $profile['username']; ?></h3>
          </a>

          <a href="edit_account?id=<?php echo $profile['id']; ?>" class="button dashboard">Edit User</a>

          <form method="post" action="../../../database/db_delete-user.php"  enctype="multipart/form-data">
            <input hidden name="profileIDDel" value="<?php echo $profile['id']; ?>">
            <button class="button dashboard" type="submit" name="submit">Delete User</button>
          </form>
        </article>
    <?php } ?>
    <div id="pagination_controls">
      <?php echo $paginationControls; ?>
    </div>
  </div>
</section>
</div>
<?php include '../../page-templates/footer.php';
