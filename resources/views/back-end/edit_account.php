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
        <script>
          document.title = "Edit <?php echo $_SESSION['uName']; ?> | Opus Vid";
        </script>
        <body>
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
              <h2>Edit Account: <?php echo $row['username']; ?></h2>

              <form id="videoUpload" method="post" action="../../../database/db_editA.php"  enctype="multipart/form-data">
                <input type="text" hidden name="accountID" value="<?php echo $row['username']; ?>">

                <input type="text" name="editEmail" value="<?php echo $row['email']; ?>">

                <input type="password" name="editPassword" placeholder="New Password: LEAVE BLANK IF USING THE SAME PASSWORD">

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
