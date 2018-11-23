<?php
session_start();

$id = $_SESSION['uID'];
$first = $_SESSION['uIFirst'];
$last = $_SESSION['uILast'];
$username = $_SESSION['uName'];
$email = $_SESSION['uEmail'];
$avatarPath = $_SESSION['uAvatar'];
$userLevel = $_SESSION['uLevel'];
$country = $_SESSION['uCountry'];

/*
$id
$first
$last
$username
$email
$avatarPath
$userLevel
$country
*/

if (isset ($_SESSION['uID'])) {
   include '../../page-templates/head_l2.php'; ?>
<body>
  <script>
    document.title = "Session Information | OpusVid";
  </script>
  <?php
    include '../../page-templates/header_l2.php';
    include '../../page-templates/dash_nav_l2.php';
?>
<div class="card">
  <p>User ID = <strong><?php echo $id; ?></strong></p>
  <p>First Name = <strong><?php echo $first; ?></strong></p>
  <p>Last Name = <strong><?php echo $last; ?></strong></p>
  <p>Username = <strong><?php echo $username; ?></strong></p>
  <p>Email = <strong><?php echo $email; ?></strong></p>
  <p>Avatar Path = <strong><?php echo $avatarPath; ?></strong></p>
  <p>User Level = <strong><?php echo $userLevel; ?></strong></p>
  <p>Country = <strong><?php echo $country; ?></strong></p>
</div>
</div>
<?php include '../../page-templates/footer.php'; ?>
<?php } else {
  header("Location: ../login");
}
