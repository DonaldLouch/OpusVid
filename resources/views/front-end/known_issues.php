<?php
    include '../../page-templates/head.php';?>
    <body>
      <script> document.title = "Known Issues | OpusVid"; </script>
      <?php include '../../page-templates/header.php';?>
        <div class="wrapper">
          <h2 class="pageTitle">Known Issues</h2>
        </div>
        <div id="tabs">
          <nav>
            <a href="#oIssues">Open Issues (5)</a>
            <a href="#rIssues">Resolved Issues (7)</a>
          </nav> <!-- #tab Nav -->
          <div class="tabContent issues">
          <section id="oIssues">
            <div class="issue card">
              <h2>Thumbnails: Not Loading Fast</h2>
              <p>Status: Investigating</p>
              <a href="https://github.com/OpusVid/OpusVid/issues/9" class="button">Issue Post: GitHub</a>
            </div>
            <div class="issue card">
              <h2>Player: Video Ratio (4:3 Ratio Style Needed)</h2>
              <p>Status: Investigating</p>
              <a href="https://github.com/OpusVid/OpusVid/issues/9" class="button">Issue Post: GitHub</a>
            </div>
            <div class="issue card">
              <h2>Player: Hover Control Broken</h2>
              <p>Status: Investigating</p>
              <a href="https://github.com/OpusVid/OpusVid/issues/8" class="button">Issue Post: GitHub</a>
            </div>
            <div class="issue card">
              <h2>Following: Shows Following when Not Following</h2>
              <p>Status: Investigating</p>
              <a href="https://github.com/OpusVid/OpusVid/issues/5" class="button">Issue Post: GitHub</a>
            </div>
            <div class="issue card">
              <h2>Responsive Deign</h2>
              <p>Status: Resolved?</p>
              <a href="https://github.com/OpusVid/OpusVid/issues/2" class="button">Issue Post: GitHub</a>
            </div>
          </section>
        <!--
        <div class="issue card">
          <h2>Issue Title</h2>
          <p>Status: Working On</p>
          <a href="#" class="button">Issue Post: GitHub</a>
        </div>
      -->

      <section id="rIssues">
        <div class="issue card fixed">
          <h2>Profile: Views Maybe Buggy</h2>
          <p>Status: Resolved!</p>
          <a href="https://github.com/OpusVid/OpusVid/issues/6" class="button">Issue Post: GitHub</a>
        </div>
        <div class="issue card fixed">
            <h2>CSS Error: Beta Intro (View Height)</h2>
            <p>Status: Resolved!</p>
          </div>
          <div class="issue card fixed">
            <h2>Profile: Broken Link To Video from Profiles</h2>
            <p>Status: Resolved!</p>
            <a href="https://github.com/OpusVid/OpusVid/issues/7" class="button">Issue Post: GitHub</a>
          </div>
          <div class="issue card fixed">
            <h2>Signup: No Hyphens in Names Allowed</h2>
            <p>Status: Resolved!</p>
            <a href="https://github.com/OpusVid/OpusVid/issues/4" class="button">Issue Post: GitHub</a>
          </div>
          <div class="issue card fixed">
            <h2>Spelling Error: Beta Intro</h2>
            <p>Status: Corrected!</p>
          </div>
          <div class="issue card fixed">
            <h2>Signup: Avatar Upload Error</h2>
            <p>Status: Resolved!</p>
            <a href="https://github.com/OpusVid/OpusVid/issues/3" class="button">Issue Post: GitHub</a>
          </div>
          <div class="issue card fixed">
            <h2>Opus Collection: Player View</h2>
            <p>Status: Resolved!</p>
            <a href="https://github.com/OpusVid/OpusVid/issues/1" class="button">Issue Post: GitHub</a>
          </div>
        </section> <!-- #signupTab -->
      </div><!-- .tabContent -->

    <script src="resources/js/tabs.js"></script>
    <script>
      new tabsFunction(document.getElementById("tabs"));
    </script>
  </div> <!-- tabs -->


        <div style="margin: -3em 37vw 2em; width: 100%;">
          <a href="feedback" class="button">Submit New Feedback</a>
          <a href="https://github.com/OpusVid/OpusVid/issues" class="button">Submit New/View All Issues</a>
        </div>

      <script src="resources/js/accordion.js"></script>

      <?php include '../../page-templates/footer.php';?>
