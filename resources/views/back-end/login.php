<?php session_start(); include('../../page-templates/head.php');?>
  <body>
    <?php include('../../page-templates/header.php');?>
      <div class="wrapper card">
            <?php
            if (isset($_SESSION['uID'])){
              echo '<form action="../../../database/db_logout.php" method="post">
                <button class="submitButton" type="submit" name="submit">Logout</button>
              </form>';} else{
              echo '
              <div id="tabs">
          			<nav>
          				<a href="#loginTab">Login</a>
          				<a href="#signupTab">Signup</a>
          			</nav> <!-- #tab Nav -->
          			<div class="tabContent">

                <section id="loginTab">

              <h3>Login</h3>
              <form id="userLogin" method="post" action="../../../database/db_login.php">
                <input type="text" name="username" placeholder="Username">
                <input type="text" name="password" placeholder="Password">
                <button class="submitButton" type="submit" name="submit">Login</button>
              </form>
            </section> <!-- #loginTab -->

            <section id="signupTab">
              <h3>Signup</h3>
              <form id="userSignup" method="post" action="../../../database/db_signup.php">
                <div class="columns 2">
                  <div class="nm column">
                    <input type="text" name="signupFirstName" placeholder="First Name">
                  </div>
                  <div class="nm column">
                    <input type="text" name="signupLastName" placeholder="Last Name">
                  </div>
                </div>
                <input type="text" name="signupUsername" placeholder="Username">
                <input type="text" name="signupPassword" placeholder="Password">
                <input type="text" name="signupEmail" placeholder="Email Address">
                <button class="submitButton" type="submit" name="submit">Sign up</button>
              </form>
            </section> <!-- #signupTab -->
          </div><!-- .tabContent -->

        <script src="../../js/tabs.js"></script>
    		<script>
    			new tabsFunction(document.getElementById("tabs"));
    		</script>'; }; ?>
      </div>
      <?php include('../../page-templates/footer.php'); ?>
  </body>
</html>
