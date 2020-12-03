<?php require 'menu.php'; ?>
<div class="portalWrapper">
    <nav id="portalNav">
        <?php if(substr_count($_SERVER["REQUEST_URI"] , "/") == 1) { ?>
            <a href="../dashboard">Dashboard</a>
            
            <div class="toggleButton">
                <a class="toggle" onclick="toggle_visibility('videos')">Videos</a>
            </div>
            <section id="videos" class="panel portalNav">
                <nav class="portalNavSub">
                    <a href="../dashboard/upload">Upload New Video</a>
                    <a href="../dashboard/manage">Manage Videos</a>
                </nav>
            </section>
           
            <div class="toggleButton">
                <a class="toggle" onclick="toggle_visibility('settings')">Settings</a>
            </div>
            <section id="settings" class="panel portalNav">
                <nav class="portalNavSub">
                    <a href="../profile?id=<?php echo $_SESSION['userName']; ?>">View Profile</a>
                    <a href="../dashboard/settingsP">Edit Profile</a>
                    <a href="../dashboard/settingsA">Account Settings</a>
                </nav>
            </section>
            
            <?php if ($userLevel == "mod") {?> 
                <div class="toggleButton">
                    <a class="toggle" onclick="toggle_visibility('mod')">Moderation</a>
                    <span class="vectorToggle"><?php echo file_get_contents("https://devlexicon.sfo2.cdn.digitaloceanspaces.com/donaldlouch/ui/dLVector_down.svg"); ?></span>
                </div>
                <section id="mod" class="panel portalNav">
                    <nav class="portalNavSub">
                        <a href="../mod/videos">Video Management</a>
                        <a href="../mod/comment">Comment Management</a>
                    </nav>
                </section>
            <?php } ?>

            <?php if ($userLevel == "admin") {?> 
                <div class="toggleButton">
                    <a class="toggle" onclick="toggle_visibility('admin')">Administration</a>
                    <span class="vectorToggle"><?php echo file_get_contents("https://devlexicon.sfo2.cdn.digitaloceanspaces.com/donaldlouch/ui/dLVector_down.svg"); ?></span>
                </div>
                <section id="admin" class="panel portalNav">
                    <nav class="portalNavSub">
                        <a href="../admin/videos">Video Management</a>
                        <a href="../admin/comment">Comment Management</a>
                        <a href="../admin/accounts">Accounts Management</a>
                        <a href="../admin/tos">EDIT: Terms of Serivce</a>
                        <a href="../admin/web">Website Settings</a>
                        <a href="../admin/css">CSS Settings</a>
                        <a href="../php">PHP Information</a>
                    </nav>
                </section>
            <?php } ?>
            
            <a href="../sitemap">Sitemap</a>
            <form action="../../controllers/database/logout.database.php" method="post">
              <button class="dashNav" type="submit" name="logout" style="background: var(--secondaryColour);width: 102%;">Logout</button>
            </form>
        <?php } elseif(substr_count($_SERVER["REQUEST_URI"] , "/") == 2) { ?> <!-- End of Level One Nav -->
            <a href="../../dashboard">Dashboard</a>
            
            <div class="toggleButton">
                <a class="toggle" onclick="toggle_visibility('videos')">Videos</a>
            </div>
            <section id="videos" class="panel portalNav">
                <nav class="portalNavSub">
                    <a href="../../dashboard/upload">Upload New Video</a>
                    <a href="../../dashboard/manage">Manage Videos</a>
                </nav>
            </section>
            
            <div class="toggleButton">
                <a class="toggle" onclick="toggle_visibility('settings')">Settings</a>
            </div>
            <section id="settings" class="panel portalNav">
                <nav class="portalNavSub">
                    <a href="../../profile?id=<?php echo $_SESSION['userName']; ?>">View Profile</a>
                    <a href="../../dashboard/settingsP">Edit Profile</a>
                    <a href="../../dashboard/settingsA">Account Settings</a>
                </nav>
            </section>

            <?php if ($userLevel == "mod") {?> 
                <div class="toggleButton">
                    <a class="toggle" onclick="toggle_visibility('mod')">Moderation</a>
                    <span class="vectorToggle"><?php echo file_get_contents("https://devlexicon.sfo2.cdn.digitaloceanspaces.com/donaldlouch/ui/dLVector_down.svg"); ?></span>
                </div>
                <section id="mod" class="panel portalNav">
                    <nav class="portalNavSub">
                        <a href="../../mod/videos">Video Management</a>
                        <a href="../../mod/comment">Comment Management</a>
                    </nav>
                </section>
            <?php } ?>

            <?php if ($userLevel == "admin") {?> 
            <div class="toggleButton">
                <a class="toggle" onclick="toggle_visibility('admin')">Administration</a>
            </div>
            <section id="admin" class="panel portalNav">
                <nav class="portalNavSub">
                    <a href="../../admin/videos">Video Management</a>
                    <a href="../../admin/comment">Comment Management</a>
                    <a href="../../admin/accounts">Accounts Management</a>
                     <a href="../../admin/tos">EDIT: Terms of Serivce</a>
                    <a href="../../admin/web">Website Settings</a>
                    <a href="../../admin/css">CSS Settings</a>
                    <a href="../../php">PHP Information</a>
                </nav>
            </section>
            <?php } ?>
            
            <a href="../../sitemap">Sitemap</a>
            <form action="../../../controllers/database/logout.database.php" method="post">
              <button class="dashNav" type="submit" name="logout" style="background: var(--secondaryColour);width: 102%;">Logout</button>
            </form>
        <?php } ?> <!-- End of Level Two Nav -->
    </nav> <!-- #portalNav -->
    <main id="portalContent">
<!--End Of FIle -->