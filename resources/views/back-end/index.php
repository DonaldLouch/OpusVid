<?php

session_start();

$username = $_SESSION['uName'];
include '../../../database/db_viewcount_dash.php';
include '../../../database/db_mail.php';

if (isset ($_SESSION['uID'])) {
   include '../../page-templates/head.php'; ?>
<body>
  <script> document.title = "Dashboard | OpusVid"; </script>
  <?php
    include '../../page-templates/header.php';
    include '../../page-templates/dash_nav.php';
    if(isset($_GET['login'])){
      $loginError = $_GET['login'];
      if($loginError == "success"){ ?>
        <div class="successMessage">
          <p>Successfully logged in!</p>
        </div>
    <?php }
    }
    ?>
  <h2 class="pageTitle">Hi, <?php echo $username; ?> you have been logged in! <span class="uLevel">(<?php echo $_SESSION['uLevel']; ?>)</span></h2>
      <section class="views">
        <div class="viewWrap card">
          <h3><?php echo $vidCount; ?></h3>
          <h4>Total Video Views</h4>
        </div>
        <div class="viewWrap card">
          <h3><?php echo $profileCount; ?></h3>
          <h4>Total Profile Views</h4>
        </div>
      </section>
      <div class="email card">
        <h3 class="pageTitle">Messages</h3>
        <?php if(isset($_GET['mes'])){
          $mesError = $_GET['mes'];
          if($mesError == "empty"){ ?>
            <div class="errorMessage">
              <p>Please Fill In All Fields!</p>
            </div>
          <?php } elseif($mesError == "sent"){ ?>
              <div class="successMessage">
                <p>Message Successfully Sent!</p>
              </div>
        <?php }
        }
        ?>
        <div>
          <section id="tabsMail" class="email wrapper">
            <nav class="dashNav">
              <?php foreach($messages as $message) { ?>
                <a href="#<?php echo$message['order_number'];?>"><?php echo$message['subject']; ?></a>
              <?php } ?>
              <a href="#send">Send Message</a>
            </nav>
            <div class="tabContent email body card">
              <?php foreach($messages as $message) { ?>
                <section id="<?php echo $message['order_number']; ?>" class="email body card">
                  <?php if ($_SESSION['uName'] === $message['user_to']) { ?>
                    <input disabled value="From: <?php echo $message['user_from']; ?>">
                    <input disabled value="Subject: <?php echo $message['subject']; ?>">
                    <input disabled value="Importance: <?php echo $message['importance']; ?>">
                    <?php echo $message['message']; ?>
                  <? } ?>
                </section>
              <? } ?>

              <section id="send" class="email body card">
                <h5>Send a message!</h5>
                <form action="../../../database/emails/email_dashSend.php" method="post">
                  <input name="from" value="<?php echo $username; ?>">

                  <label for="to">To</label>
                    <select name="to" id="to">
                      <option>Please Select</option>
                      <option>---</option>
                      <option value="MasterAdmin">Support</option>
                      <option value="MasterAdmin">Administorator</option>
                      <option value="DonaldLouch">Donald Louch (CEO)</option>
                    </select>

                  <div class="field">
                    <input type="text" name="subject" id="subject" placeholder="Subject" value="<? echo $_GET['subject']; ?>">
                    <label for="subject">Subject</label>
                  </div>

                  <label for="message">Message</label>
                    <textarea name="message" id="message"><? echo $_GET['message']; ?></textarea>

                  <button type="submit" name="send" class="submitButton">Send Message</button>
                </form>
              </section>
            </div>
          </section>

          <script src="resources/js/tabs.js"></script>
          <script> new tabsFunction(document.getElementById("tabsMail")); </script>
        </div>
      </div> <!-- .email card -->
</section> <!-- #dashContent -->
</div> <!-- .dashWrapper -->
<?php include '../../page-templates/footer.php'; ?>

<?php } else {
 header("Location: login");
 exit();
}
?>
