<?php
session_start();

$firstname = $_GET['name-first'];
$lastname = $_GET['name-last'];
$username = $_GET['username'];
$email = $_GET['email'];

include '../../page-templates/head.php';
?>

  <body>
    <script>
      document.title = "Login/Signup | Opus Vid";
    </script>
    <?php include '../../page-templates/header.php';?>
      <div class="wrapper card">
            <?php
            if (isset($_SESSION['uID'])){ ?>
              <form action="database/db_logout.php" method="post">
                <button class="submitButton" type="submit" name="submit">Logout</button>
              </form>

            <?php } else{ ?>
              <div id="tabs">
          			<nav>
          				<a href="#loginTab">Login</a>
          				<a href="#signupTab">Signup</a>
          			</nav> <!-- #tab Nav -->
          			<div class="tabContent">

                <section id="loginTab">

              <h3>Login</h3>
              <?php
                if(isset($_GET['login']) || isset($_GET['signup']) || isset($_GET['logged'])){
                  $loginError = $_GET['login'];
                  $signupError = $_GET['signup'];
                  $loggedError = $_GET['logged'];

                  if($loginError == "empty") { ?>
                    <div class="errorMessage">
                      <p>Please fill in all fields!</p>
                    </div>
                  <?php } elseif($loginError == "failed") { ?>
                    <div class="errorMessage">
                      <p>Login failed due to an incorrect username/email or passoword. Please try again or contact the support team at <a href="mailto:support@opusvid.com">support@opusvid.com</a> and we'll be happy to help!</p>
                    </div>
                  <?php } elseif($signupError == "empty") { ?>
                    <div class="errorMessage">
                      <p>An error happened when signing up; please see the 'Signup' tab for more information!</p>
                    </div>
                  <?php } elseif($signupError == "invaild") { ?>
                    <div class="errorMessage">
                      <p>An error happened when signing up; please see the 'Signup' tab for more information!</p>
                    </div>
                  <?php } elseif($signupError == "email") { ?>
                    <div class="errorMessage">
                      <p>An error happened when signing up; please see the 'Signup' tab for more information!</p>
                    </div>
                  <?php } elseif($signupError == "userTaken") { ?>
                    <div class="errorMessage">
                      <p>An error happened when signing up; please see the 'Signup' tab for more information!</p>
                    </div>
                  <?php } elseif($signupError == "success") { ?>
                    <div class="successMessage">
                      <p>You have successfully signed up! You may now login to Opus Vid!</p>
                    </div>
                  <?php } elseif($signupError == "failed") { ?>
                    <div class="errorMessage">
                      <p>An error happened when signing up; please see the 'Signup' tab for more information!</p>
                    </div>
                  <?php } elseif($loggedError == "success") { ?>
                    <div class="successMessage">
                      <p>Successfully logged out!</p>
                    </div>
                  <?php }
                }
              ?>
              <form id="userLogin" method="post" action="database/db_login.php">
                <input type="text" name="username" placeholder="Username OR Email">
                <input type="password" name="password" placeholder="Password">
                <button class="submitButton" type="submit" name="submit">Login</button>
              </form>
            </section> <!-- #loginTab -->

            <section id="signupTab">
              <h3>Signup</h3>
              <?php
                if(!isset($_GET['signup'])){
                  //No errors!
                } else {
                  $signupError = $_GET['signup'];

                  if($signupError == "empty") { ?>
                    <div class="errorMessage">
                      <p>Please fill in all fields!</p>
                    </div>
                  <?php } elseif($signupError == "invaild") { ?>
                    <div class="errorMessage">
                      <p>First Name and Last Name; must contain letters only!</p>
                    </div>
                  <?php } elseif($signupError == "email") { ?>
                    <div class="errorMessage">
                      <p>It seems you have used an email that's already been used. Please try another ermail or contact the support team at <a href="mailto:support@opusid.com">support@opusvid.com</a> and we'll be happy to help!</p>
                    </div>
                  <?php } elseif($signupError == "userTaken") { ?>
                    <div class="errorMessage">
                      <p>It seems you have used a username that's already been used. Please try another username or contact the support team at <a href="mailto:support@opusvid.com">support@opusvid.com</a> and we'll be happy to help!</p>
                    </div>
                  <?php } elseif($signupError == "success") { ?>
                    <div class="successMessage">
                      <p>You have successfully signed up! You may now login to Opus Vid!</p>
                    </div>
                  <?php } elseif($signupError == "failed") { ?>
                    <div class="errorMessage">
                      <p>Signup failed due to an unkown reason. Please try again or contact the support team at <a href="mailto:support@opusvid.com">support@opusvid.com</a> and we'll be happy to help!</p>
                    </div>
                <?php }
              }
              ?>
              <form id="userSignup" method="post" action="database/db_signup.php">

                <div class="columns 2">
                  <div class="nm column">
                    <input type="text" name="signupFirstName" placeholder="First Name" value="<?php echo $firstname; ?>">
                  </div>
                  <div class="nm column">
                    <input type="text" name="signupLastName" placeholder="Last Name" value="<?php echo $lastname; ?>">
                  </div>
                </div>

                <input type="text" name="signupUsername" placeholder="Username" value="<?php echo $username; ?>">
                <input type="password" name="signupPassword" placeholder="Password">
                <input type="email" name="signupEmail" placeholder="Email Address" value="<?php echo $email; ?>">

                <button class="submitButton" type="submit" name="submit">Sign up</button>
              </form>

            </section> <!-- #signupTab -->
          </div><!-- .tabContent -->

        <script src="resources/js/tabs.js"></script>
    		<script>
    			new tabsFunction(document.getElementById("tabs"));
    		</script>
      </div> <!-- tabs -->
    <?php } ?>
    </div> <!-- wrapper card -->
    <?php include('../../page-templates/footer.php'); ?>
