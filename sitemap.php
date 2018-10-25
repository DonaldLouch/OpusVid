<?php

session_start();

  if (isset ($_SESSION['uID'])) {?>
    <!DOCTYPE html>
     <html lang="en">
       <head>
           <meta charset="UTF-8">
           <title>Sitemap | Opus Vid</title>
           <link rel="stylesheet" type="text/css" href="resources/css/stylesheet.css"/>
           <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

           <!-- Load In Icons -->

         <link rel="apple-touch-icon" sizes="180x180" href="storage/logos/apple-touch-icon.png">
         <link rel="icon" type="image/png" sizes="32x32" href="storage/logos/favicon-32x32.png">
         <link rel="icon" type="image/png" sizes="16x16" href="storage/logos/favicon-16x16.png">
         <link rel="manifest" href="storage/logos/site.webmanifest">
         <link rel="mask-icon" href="storage/logos/safari-pinned-tab.svg" color="#302e91">
         <link rel="shortcut icon" href="storage/logos/favicon.ico">
         <meta name="msapplication-TileColor" content="#603cba">
         <meta name="msapplication-config" content="storage/logos/browserconfig.xml">
         <meta name="theme-color" content="#ffffff">
       </head>
    <body>
      <h1>Opus Vid Sitemap</h1>
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
              <lI><a href="password_reset" class="button"><strong>*NEW (3)*</strong> Password Reset</a></li>
              <li><a href="dashboard/upload" class="button">Video Upload</a></li>
              <li><a href="dashboard/manage" class="button">Manage Videos</a></li>
              <li><a href="dashboard/settingsP" class="button"><strong>*(2)*</strong> Edit Profile</a></li>
              <li><a href="dashboard/settingsA" class="button"><strong>*(2)*</strong> Edit Account</a></li>
              <li><a href="dashboard/manage_collections" class="button"><strong>*(2)*</strong> Manage Opus Collections</a></li>
              <li><a href="dashboard/new_collection" class="button"><strong>*(2)*</strong> New Opus Collections</a></li>
            </ul>

            <h4>Front-End</h4>
            <ul>
              <li><a href="home" class="button">Home -> Will Be Index</a></li>
              <li><a href="player" class="button">Player Templete - > Go To Home and Selece Video</a></li>
              <li><a href="player?id=5ba85682d768f" class="button">Example: Player Page</a></li>
              <li><a href="profile" class="button">Profile Page</a></li>
              <li><a href="profile?id=DonaldLouch" class="button">Example: Profile Page</a></li>
              <li><a href="categories" class="button"><strong>*(2)*</strong> Categories</a></li>
              <li><a href="category" class="button"><strong>*(2)*</strong> Category Page</a></li>
              <li><a href="category?type=Animation" class="button"><strong>*(2)*</strong> Example: Category Page</a></li>
              <li><a href="collection?id=5bd0c13e75ecd" class="button"><strong>*NEW (3)*</strong> Example: View Opus Collections: <strong>BC</strong></a></li>
            </ul>

        </section>
      </div>
    </body>
  </html>

  <!-- IF logged out -->

  <?php } else { ?>
    <!DOCTYPE html>
     <html lang="en">
       <head>
           <meta charset="UTF-8">
           <title>Opus Vid Page</title>
           <link rel="stylesheet" type="text/css" href="resources/css/stylesheet.css"/>
           <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

           <!-- Load In Icons -->

         <link rel="apple-touch-icon" sizes="180x180" href="storage/logos/apple-touch-icon.png">
         <link rel="icon" type="image/png" sizes="32x32" href="storage/logos/favicon-32x32.png">
         <link rel="icon" type="image/png" sizes="16x16" href="storage/logos/favicon-16x16.png">
         <link rel="manifest" href="storage/logos/site.webmanifest">
         <link rel="mask-icon" href="storage/logos/safari-pinned-tab.svg" color="#302e91">
         <link rel="shortcut icon" href="storage/logos/favicon.ico">
         <meta name="msapplication-TileColor" content="#603cba">
         <meta name="msapplication-config" content="storage/logos/browserconfig.xml">
         <meta name="theme-color" content="#ffffff">
       </head>
      <body class="loginPageSitemap">
        <div class="wrapper card">
          <h3>Plaese login to view Sitemap!</h3>
          <h4 class="siteTitle">Opus Vid</h4>
          <form id="userLoginSitemap" method="post" action="database/db_login.php">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button class="submitButton" type="submit" name="submit">Login</button>
          </form>
          <a href="login">Need an Account?</a>
        </div>
      </body>
  </html>
 <?php } ?>
