<?php

session_start();

#Get Header Information
  $issue = $_GET['i'];
  $tasksYes = $_GET['ty'];
  $tasks = $_GET['t'];
  $experince = $_GET['e'];
  $process = $_GET['p'];
  $design = $_GET['d'];
  $user = $_GET['u'];
  $overall = $_GET['ov'];
  $other = $_GET['ot'];

include '../../page-templates/head.php';?>

    <body>
      <script> document.title = "Feedback | OpusVid"; </script>
      <?php include '../../page-templates/header.php';?>
      <div class="wrapper card">
      <h2 class="pageTitle">Feedback</h2>
      <p>Feel free to email Donald at either <a href="mailto:support@opusvid.com">support@opusvid.com</a> |  <a href="mailto:donald@opusvid.com">donald@opusvid.com</a> | <a href="mailto:admin@opusvid.com">admin@opusvid.com</a> | or <a href="mailto:contact@opusvid.com">contact@opusvid.com</a> for support or any help with OpusVid!</p>

      <div class="buttonWrap feedback">
        <a href="beta_tasks" class="button">View Beta Tasks</a> | <a href="issues" class="button">Known Issues</a>
      </div>

      <form method="post" action="../../database/db_feedback.php" enctype="multipart/form-data" autocomplete="off">
        <label for="issueRun">Did You Run Into Any Issues?</label>
          <textarea name="issueRun" id="issueRun" rows="8"><?php echo $issue; ?></textarea>

        <label for="betaJourny">Did You Complete a Beta Task or Tasks?</label>
          <ol id="betaJourny">
            <li>
              <input type="radio" name="betaJourny" id="yes" value="yes">
                <label for="yes">Yes</label>
                  <fieldset class="conditional">
                        <legend>What Task(s) Where Completed:  </legend>
                        <input type="checkbox" name ="taskSelect[]" id="t1" value="T1">Task 1: Create an Account<br>
                        <input type="checkbox" name ="taskSelect[]" id="t2" value="T2">Task 2: Uploading a Video<br>
                        <input type="checkbox" name ="taskSelect[]" id="t3" value="T3">Task 3: Watch a Video<br>
                        <input type="checkbox" name ="taskSelect[]" id="t4" value="T4">Task 4: Create an Opus Collection<br>
                        <input type="checkbox" name ="taskSelect[]" id="t5" value="T5">Task 5: View a Collection<br>
                        <input type="checkbox" name ="taskSelect[]" id="t6" value="T6">Task 6: View an Opus Creator's Profile<br>
                        <input type="checkbox" name ="taskSelect[]" id="t7" value="T7">Task 7: Follow an Opus Creator<br>
                        <input type="checkbox" name ="taskSelect[]" id="t8" value="T8">Task 8: General Navigation<br>
                        <input type="checkbox" name ="taskSelect[]" id="otherClick" value="TOther">Other!<br>
                          <div class="conditional">
                            <label for="betaTaskYES" >What Other Task(s) Did You Complete?</label>
                              <textarea name="betaTaskYES" id="betaTaskYES" rows="8"><?php echo $taskYes; ?></textarea>
                          </div>
                  </fieldset>
            </li>
            <li>
              <input type="radio" name="betaJourny" id="no" value="no">
                <label for="no">No</label>
                <div class="conditional">
                  <label for="betaTask">What Tasks Did You Complete?</label>
                    <textarea name="betaTask" id="betaTask" rows="8"><?php echo $tasks; ?></textarea>
                </div>
              </li>
          </ol>

        <label for="betaExperince">What Was Your Experience?</label>
          <textarea name="betaExperince" id="betaExperince" rows="8"><?php echo $experince; ?></textarea>

        <label for="betaProcess">What Was Your Process?</label>
          <textarea name="betaProcess" id="betaProcess"  rows="8"><?php echo $process; ?></textarea>

        <label for="betaDesign">Feedback: Design</label>
          <textarea name="betaDesign" id="betaDesign" rows="8"><?php echo $design; ?></textarea>

        <label for="betaUser">Feedback: Navagation and Placement of Content</label>
          <textarea name="betaUser" id="betaUser" rows="8"><?php echo $user; ?></textarea>

        <label for="betaOverall">Feedback: Overall</label>
          <textarea name="betaOverall" id="betaOverall" rows="8"><?php echo $overall;?></textarea>

        <label for="other">Additional Comments (such as new feature suggestions)</label>
          <textarea name="other" id="other" rows="8"><?php echo $other; ?></textarea>

        <button class="submitButton" type="submit" name="submit">Submit Feedback</button><span> | </span> <button class="submitButton" type="reset" name="reset">Rest Form</button>
      </form>

      </div>
      <?php include '../../page-templates/footer.php';?>
