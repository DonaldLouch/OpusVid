<?php
session_start();

if (!isset($_SESSION{'uName'})) { ?>
  <!DOCTYPE html>
   <html lang="en">
     <head>
         <meta charset="UTF-8">
         <title>OpusVid | Coming Soon!</title>
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
  <body id="indexPage">
    <div class="wrapper card">
        <h3>Hi, Opus Vid is still being constructed! Please check back later!</h3>
    </div>
  </body>
  </html>
<?php } else {
    require 'resources/page-templates/head.php';
  ?>
    <body id="betaPage">
      <script> document.title = "OpusVid Beta"; </script>

      <div class="wrapper card">
          <h1>Introducing OpusVid: Beta</h1>
          <h2>I'm excited to anncounce the launch of the beta to OpusVid!</h2>
          <p>Note that this website is still in a beta and functions may not work as intended. If you happen to notice any issues, please report them on the <a href="feedback">Feedback</a> page. As this is a beta, once the website goes live some data maybe removed from the Database. By contnining you acknowledge that you may be visiting a partly broken website and not all data will remain on the website.</p>
          <div class="buttonWrap">
            <a href="home" class="button">Contune</a> | <a href="beta_tasks" class="button">View Beta Tasks</a> | <a href="issues" class="button">Known Issues</a> | <a href="feedback" class="button">Feedback</a>
          </div>
      </div>
    </boby>
  </html>
<?php } ?>
