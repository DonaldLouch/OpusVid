<?php

session_start();
include '../../../database/db_feedback_results.php';
include '../../page-templates/head_l2.php';
if ($_SESSION['uID'] && $_SESSION['uLevel'] == 'admin') {?>
    <body>
      <script> document.title = "Feedback Results | OpusVid"; </script>
      <?php
        include '../../page-templates/header_l2.php';
        include '../../page-templates/admin_dash.php';?>

      <?php foreach ($feedbacks as $feedback) { ?>
        <div class="wrapper">
          <div class="card feedback">
            <img src="https://opusvid.sfo2.cdn.digitaloceanspaces.com/ui/video-ui/opusLogo.png" alt="Opus Vid Logo">

            <h1>Feedback #<?php echo $feedback['order_number']; ?></h1>

            <dl>
              <?php if (!empty($feedback['issues'])) { ?>
                <dt>Did You Run Into Any Issues?</dt>
                  <dd><?php echo $feedback['issues']; ?></dd>
              <?php } ?>

              <?php if (!empty($feedback['bJourny'])) { ?>
                <dt>Did You Complete a Beta Journy?</dt>
                  <dd><?php echo $feedback['bJourny']; ?></dd>
              <?php } ?>

              <?php if (!empty($feedback['tasks'])) { ?>
                <dt>What Task(s) Where Completed:  </dt>
                  <dd><?php echo $feedback['tasks']; ?></dd>
              <?php } ?>

              <?php if (!empty($feedback['taskYes']) || !empty($feedback['tasksCompleted'])) { ?>
                <dt>What Other Task(s) Did You Complete?</dt>
                  <dd><?php echo $feedback['taskYes']; ?><?php echo $feedback['tasksCompleted']; ?></dd>
              <?php } ?>

              <?php if (!empty($feedback['experience'])) { ?>
                <dt>What Was Your Experience?</dt>
                  <dd><?php echo $feedback['experience']; ?></dd>
              <?php } ?>

              <?php if (!empty($feedback['process'])) { ?>
                <dt>What Was Your Process?</dt>
                  <dd><?php echo $feedback['process']; ?></dd>
              <?php } ?>

              <?php if (!empty($feedback['design'])) { ?>
                <dt>Feedback: Design</dt>
                  <dd><?php echo $feedback['design']; ?></dd>
              <?php } ?>

              <?php if (!empty($feedback['navigation'])) { ?>
                <dt>Feedback: Navagation and Placement of Content</dt>
                  <dd><?php echo $feedback['navigation']; ?></dd>
              <?php } ?>

              <?php if (!empty($feedback['overall'])) { ?>
                <dt>Feedback: Overall</dt>
                  <dd><?php echo $feedback['overall']; ?></dd>
              <?php } ?>

              <?php if (!empty($feedback['addComments'])) { ?>
                <dt>Additional Comments</dt>
                  <dd><?php echo $feedback['addComments']; ?></dd>
              <?php } ?>
            </dl>
        </div>
      <?php } ?>
        <div id="pagination_controls">
  				<?php echo $paginationControls; ?>
  			</div> <!-- pagination_controls -->
      </div>
    </section>
    </div>

    <?php include '../../page-templates/footer.php'; ?>

  <!-- IF logged out -->

  <?php } else { ?>
      <h1>You need to be logged in and an admin level user to view this page.</h1>
 <?php } ?>
