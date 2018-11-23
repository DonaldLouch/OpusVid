<?php require '../../page-templates/head.php'; ?>

<body>
		<script> document.title = "Beta Tasks | OpusVid"; </script>
    <?php include '../../page-templates/header.php';?>

		<div class="wrapper card">
			<h2 class="pageTitle">Beta Tasks</h2>
      <p>If any task failed please copy the url that was provided and paste it in the additional comments field in the <a href="feedback">Feedback</a> form.</p>

      <div id="tabs">
        <nav>
          <a href="#tk1">1</a>
          <a href="#tk2">2</a>
          <a href="#tk3">3</a>
          <a href="#tk4">4</a>
          <a href="#tk5">5</a>
          <a href="#tk6">6</a>
          <a href="#tk7">7</a>
          <a href="#tk8">8</a>
        </nav> <!-- #tab Nav -->
        <div class="tabContent">
          <section id="tk1">
            <h3>Task 1: Create an Account</h3>
            <h5>Login/Signup | Email Client</h5>
            <p>This task will have you create an account using a valid email address, avatar, and password.</p>
            <p>If you have different emails please feel free trying this multiple times :) try different length passwords and different character arrangements.</p>
          </section> <!-- #tk1 -->

          <section id="tk2">
            <h3>Task 2: Uploading a Video</h3>
            <h5>Dashboard | Upload</h5>
            <p>This task <strong style="color: red;">requires you to have an account</strong>. If you have an account please upload a video(s) trying different resolutions, characters, etc.</p>
            <p>Did you receive the "Video Uploaded" email?</p>
          </section> <!-- #tk2 -->

          <section id="tk3">
            <h3>Task 3: Watch a Video</h3>
            <h5>Home | Category | Search</h5>
            <p>For this task if you could watch a video and try out the controls such as play/pause; mute/unmute; and the fullscreen button.</p>
            <p>Make sure the video works, and the description looks right.</p>
            <p>Try finding a video in the category page or through the search function.</p>
          </section> <!-- #tk3 -->

          <section id="tk4">
            <h3>Task 4: Create an Opus Collection</h3>
            <h5>Dashboard | Opus Collection</h5>
            <p>For this task if you could create an Opus Collection. Note that this task <strong style="color: red;">requires you to have video(s) uploaded to your account.</strong></p>
            <p>Add new videos to the collection and even edit the collection.</p>
          </section> <!-- #tk4 -->

          <section id="tk5">
            <h3>Task 5: View a Collection</h3>
            <h5>Search</h5>
            <p>This task is to watch an Opus Collection and navigate through the controls. Watch all videos, allow the auto play to kick-in.</p>
          </section> <!-- #tk5 -->

          <section id="tk6">
            <h3>Task 6: View an Opus Creator's Profile</h3>
            <h5>Profile | Search</h5>
            <p>Click on a profile name or search for an Opus Creator and click on their name.</p>
          </section> <!-- #tk6 -->

          <section id="tk7">
            <h3>Task 7: Follow an Opus Creator</h3>
            <h5>Profile | Home | Video</h5>
            <p>For this task you are tasked with following an Opus Creator. Then see if you can see their video(s) in the follower feed on the home page.</p>
          </section> <!-- #tk7 -->

          <section id="tk8">
            <h3>Task 8: General Navigation</h3>
            <h5>All Pages | Sitemap</h5>
            <p>For this task if you could just simply click on buttons and links. Do you think they're appropriately titled? Do they link where they should? Are these buttons and links placed in logical places?</p>
          </section> <!-- #tk8 -->
        </div><!-- .tabContent --->

        <script src="resources/js/tabs.js"></script>
        <script> new tabsFunction(document.getElementById("tabs")); </script>
      </div> <!-- tabs -->
		</div> <!-- .wrapper -->

    <?php include '../../page-templates/footer.php'; ?>
