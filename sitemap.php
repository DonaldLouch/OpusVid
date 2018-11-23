<?php

session_start();

include 'resources/page-templates/head.php'; ?>

  <body>
    <script> document.title = "Sitemap | OpusVid"; </script>
    <h2 class="pageTitle">Opus Vid Sitemap</h2>
    <h3>Note that these are the current active pages with the current URL addresses and may change over time!</h3>
    <h4 style="margin: 1em 0; text-align:center;"><strong>BC</strong> = Being Consturcted (page may not be 100% functionable)</h4>
    <h4 style="margin: 1em 0; text-align:center;"><strong>*(#)*</strong> = New page from a Bi-weekly Update</h4>

    <div id="pageTree">
      <section id="root">
        <h3>Root</h3>
        <ul>
         <li><a href="index.php" class="button">Index(PlaceHolder)</a></li>
         <li><a href="sitemap.php" class="button">Sitemap</a></li>
        </ul>
      </section>

      <section id="views">
        <h3>resources/views</h3>
          <h4>Back-End</h4>
          <ul>
            <li><a href="dashboard" class="button">Dashboard (Index)</a></li>
            <li><a href="login" class="button">Login</a></li>
            <lI><a href="password_reset" class="button"><strong>*(3)*</strong> Password Reset</a></li>
            <li><a href="dashboard/upload" class="button">Video Upload</a></li>
            <li><a href="dashboard/manage" class="button">Manage Videos</a></li>
            <li><a href="dashboard/settingsP" class="button"><strong>*(2)*</strong> Edit Profile</a></li>
            <li><a href="dashboard/settingsA" class="button"><strong>*(2)*</strong> Edit Account</a></li>
            <li><a href="dashboard/manage_collections" class="button"><strong>*(2)*</strong> Manage Opus Collections</a></li>
            <li><a href="dashboard/new_collection" class="button"><strong>*(2)*</strong> New Opus Collections</a></li>
            <li><a href="admin/feedback_results" class="button"><strong>*(4)*</strong> Feedback Results</a></li>
            <li><a href="dashboard/watch" class="button"><strong>*(4)*</strong> Watch Later</a></li>
          </ul>

          <h4>Front-End</h4>
          <ul>
            <li><a href="home" class="button">Home -> Will Be Index</a></li>
            <li><a href="player?id=5ba85682d768f" class="button">Example: Player Page</a></li>
            <li><a href="profile" class="button">Profile Page</a></li>
            <li><a href="profile?id=DonaldLouch" class="button">Example: Profile Page</a></li>
            <li><a href="categories" class="button"><strong>*(2)*</strong> Categories</a></li>
            <li><a href="category" class="button"><strong>*(2)*</strong> Category Page</a></li>
            <li><a href="category?type=Animation" class="button"><strong>*(2)*</strong> Example: Category Page</a></li>
            <li><a href="collection?id=5bcbd78f96898" class="button"><strong>*(3)*</strong> Example: View Opus Collections</a></li>
            <li><a href="issues" class="button"><strong>*(4)*</strong> Known Issues</a></li>
            <li><a href="feedback" class="button"><strong>*(4)*</strong> Feedback</a></li>
            <li><a href="beta_tasks" class="button"><strong>*(4)*</strong> Beta Tasks</a></li>
          </ul>

      </section>
    </div>
  <?php include 'resources/page-templates/footer.php';?>
