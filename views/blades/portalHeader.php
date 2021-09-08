<?php require 'menu.php'; ?>
<div class="dashboardWrapper">
    <div class="dashboard">
        <nav id="dashboardNavigation">
            <?php if(substr_count($_SERVER["REQUEST_URI"] , "/") == 1) { ?>
            <a href="../dashboard">Dashboard</a>

            <div class="toggleButton">
                <a class="toggle" onclick="toggle_visibility('videos')">Videos</a>
            </div>
            <section id="videos" class="panel dashboardSubNavigation">
                <nav class="dashboardSub">
                    <a href="../dashboard/upload">Upload New Video</a>
                    <a href="../dashboard/manage">Manage Videos</a>
                </nav>
            </section>

            <div class="toggleButton">
                <a class="toggle" onclick="toggle_visibility('settings')">Settings</a>
            </div>
            <section id="settings" class="panel dashboardSubNavigation">
                <nav class="dashboardSub">
                    <a href="../profile?id=<?php echo $_SESSION['userName']; ?>">View Profile</a>
                    <a href="../dashboard/settingsP">Edit Profile</a>
                    <a href="../dashboard/settingsA">Account Settings</a>
                </nav>
            </section>

            <?php if ($userLevel == "mod") {?>
            <div class="toggleButton">
                <a class="toggle" onclick="toggle_visibility('mod')">Moderation</a>
            </div>
            <section id="mod" class="panel dashboardSubNavigation">
                <nav class="dashboardSub">
                    <a href="../mod/videos">Video Management</a>
                    <a href="../mod/comment">Comment Management</a>
                </nav>
            </section>
            <?php } ?>

            <?php if ($userLevel == "admin") {?>
            <div class="toggleButton">
                <a class="toggle" onclick="toggle_visibility('admin')">Administration</a>
            </div>
            <section id="admin" class="panel dashboardSubNavigation">
                <nav class="dashboardSub">
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
                <button class="dashNav" type="submit" name="logout"
                    style="background: var(--secondaryColour);width: 102%;">Logout</button>
            </form>
            <?php } elseif(substr_count($_SERVER["REQUEST_URI"] , "/") == 2) { ?>
            <!-- End of Level One Nav -->
            <a href="../../dashboard">Dashboard</a>

            <div class="toggleButton">
                <a class="toggle" onclick="toggle_visibility('videos')">Videos</a>
            </div>
            <section id="videos" class="panel dashboardSubNavigation">
                <nav class="dashboardSub">
                    <a href="../../dashboard/upload">Upload New Video</a>
                    <a href="../../dashboard/manage">Manage Videos</a>
                </nav>
            </section>

            <div class="toggleButton">
                <a class="toggle" onclick="toggle_visibility('settings')">Settings</a>
            </div>
            <section id="settings" class="panel dashboardSubNavigation">
                <nav class="dashboardSub">
                    <a href="../../profile?id=<?php echo $_SESSION['userName']; ?>">View Profile</a>
                    <a href="../../dashboard/settingsP">Edit Profile</a>
                    <a href="../../dashboard/settingsA">Account Settings</a>
                </nav>
            </section>

            <?php if ($userLevel == "mod") {?>
            <div class="toggleButton">
                <a class="toggle" onclick="toggle_visibility('mod')">Moderation</a>
            </div>
            <section id="mod" class="panel dashboardSubNavigation">
                <nav class="dashboardSub">
                    <a href="../../mod/videos">Video Management</a>
                    <a href="../../mod/comment">Comment Management</a>
                </nav>
            </section>
            <?php } ?>

            <?php if ($userLevel == "admin") {?>
            <div class="toggleButton">
                <a class="toggle" onclick="toggle_visibility('admin')">Administration</a>
            </div>
            <section id="admin" class="panel dashboardSubNavigation">
                <nav class="dashboardSub">
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
                <button class="dashNav" type="submit" name="logout"
                    style="background: var(--secondaryColour);width: 102%;">Logout</button>
            </form>
            <?php } ?>
            <!-- End of Level Two Nav -->
        </nav> <!-- #dashboardNavigation -->
        <main id="dashboardContent">
            <!--End Of FIle -->