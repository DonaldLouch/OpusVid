<?php
  session_start();

  include('../../../database/db_connect.php');

  $accountID = $_SESSION['uName'];

  $sql = "SELECT * FROM users WHERE username = '" . mysqli_escape_string($mySQL,$accountID) . "';";
  $result = mysqli_query($mySQL, $sql);

if (isset ($_SESSION['uID'])) {
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>
        <?php include '../../page-templates/head_l2.php'; ?>
        <body>
        <script> document.title = "Edit <?php echo $_SESSION['uName']; ?> | OpusVid"; </script>
          <?php
            include '../../page-templates/header_l2.php';
            include '../../page-templates/dash_nav_l2.php';
                if(isset($_GET['edit'])){
                  $editError = $_GET['edit'];
                  if($editError == "success"){ ?>
                    <div class="successMessage">
                      <p>Successfully edited account!</p>
                    </div>
                  <?php }
                }
              ?>
              <h2 class="pageTitle">Edit Account: <?php echo $row['username']; ?></h2>

              <form id="videoUpload" method="post" action="../../../database/db_editA.php"  enctype="multipart/form-data">
                <input type="text" hidden name="accountID" value="<?php echo $row['username']; ?>">
                <input type="text" hidden name="numberID" value="<?php echo $row['id']; ?>">

                <div class="field">
                  <input type="text" name="editEmail" id="editEmail" value="<?php echo $row['email']; ?>" required>
                  <label for="editEmail"><span class="required">*</span>Email</label>
                </div>

                <div class="field">
                  <input type="password" name="editPassword" id="editPassword" placeholder="New Password: LEAVE BLANK IF USING THE SAME PASSWORD">
                  <label for="editPassword">New Password: LEAVE BLANK IF USING THE SAME PASSWORD</label>
                </div>

                <button type="submit" name="delete" class="submitButton delete">!!! Delete Account !!!</button>


                <button type="submit" name="submit" class="submitButton">Edit Account</button>
              </form>
            </section>
          </div>
      <?php include '../../page-templates/footer.php'; ?>
    <?php }
    } else {
        echo "<h3>Sorry, this account faild to load. Please try again or contact our support team at support@opusvid.com with the username:" . $accountID . " and we'll be happy to help you!</h3>";
        //echo $videoID;
  }
} else {
  header("Location: ../login");
}
   ?>
