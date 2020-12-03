<?php
  require '../../blades/head.php'; 
  $accountID = $_GET['id'];
  $userName = $_GET['id'];
  
  $userClass = new Users;
  $videoClass = new Video;

  $profile = $userClass->getProfile($accountID);
  $userID = $profile['userID'];
?>

<body id="<?php echo $profile['username']; ?>Profile">
<script> document.title = "<?php echo $profile['username']; ?> | <?php echo $websiteName; ?>"</script>

  <div id="vidHeader">
    <?php  include '../../blades/menu.php'; ?>
  </div>
          <div class="profileWrap card">
            <img src="<?php echo $profile['userAvatar']; ?>" class="avatarProfile" alt="<?php echo $profile['userName']; ?> Avatar">
            <h1><?php echo $profile['userName']; ?></h1>
            <h3>(<?php echo $profile['userFirstName']; ?> <?php echo $profile['userLastName']; ?>) <span class="fromSpan">From <?php echo $profile['userCountry']; ?></span></h3>
            <p><?php echo $profile['userDescription']; ?></p>
            <p class="tags">Tags: <em><?php echo $profile['accountTags']; ?></em></p>
            <p>Profile Views: <?php echo $profile['profileViews']; ?></p>
          </div>
          <div class="videoWrap">
            <?php echo $videoClass->profileVideoFeed($userID, $userName); ?>
            
  <?php 
    $views = new Views;
    $profileID = $accountID;
    $views->updateProfileViews($profileID);
    include '../../blades/footer.php'; 
  ?>
