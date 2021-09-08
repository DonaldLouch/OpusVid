<?php
  require '../../blades/head.php'; 
  $accountID = $_GET['id'];
  $userName = $_GET['id'];
  
  $userClass = new Users;
  $videoClass = new Video;

  $profile = $userClass->getProfile($accountID);
  $userID = $profile['userID'];
?>

<body id="Profile">
    <script>
    document.title = "<?php echo $profile['username']; ?> | <?php echo $websiteName; ?>"
    </script>
    <?php  include '../../blades/menu.php'; ?>
    <main class="pageWrapper">
        <div class="profileCard">
            <img src="<?php echo $profile['userAvatar']; ?>" class="avatarProfile"
                alt="<?php echo $profile['userName']; ?> Avatar">
            <h1><?php echo $profile['userName']; ?></h1>
            <h3>(<?php echo $profile['userFirstName']; ?> <?php echo $profile['userLastName']; ?>) <span
                    class="fromSpan">From <?php echo $profile['userCountry']; ?></span></h3>
            <p><?php echo $profile['userDescription']; ?></p>
            <p class="tags">Tags: <em><?php echo $profile['accountTags']; ?></em></p>
            <p>Profile Views: <?php echo $profile['profileViews']; ?></p>

            <?php if (!empty($profile['userLinks'])) {  ?>
            <a onclick="toggle_visibility('ocLinks')" class="toggle">Links of Mine</a>
            <section id="ocLinks" class="panel">
                <h3>My Links</h3>
                <?php 
                                $linksCol = $profile['userLinks'];
                                $linksEach = explode('||', $linksCol);

                                foreach($linksEach as $linksExplode) {
                                    $links = explode(';;', $linksExplode); 
                                    if (strpos($links[0], "http://") !== false || strpos($links[0], "https://") !== false) { ?>
                <p><a href="<?php echo $links[0]; ?>" target="_blank"><?php echo $links[1]; ?></a></p>
                <?php } else { ?>
                <p><?php echo $links[1]; ?>: <strong><?php echo $links[0]; ?></strong></p>
                <?php } 
                                } 
                    ?>
            </section>
            <?php } ?>

        </div>
        <div class="videoFeed">
            <?php echo $videoClass->profileVideoFeed($userID, $userName); ?>
    </main>
    <?php 
    $views = new Views;
    $profileID = $userID;
    $views->updateProfileViews($profileID);
    include '../../blades/footer.php';
  ?>