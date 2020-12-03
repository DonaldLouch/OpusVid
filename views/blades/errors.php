<?php

if(isset($_GET['type'])){
$type = $_GET['type'];

if($type == "empty") { 
echo '
<div class="errorMessage">
<p class="errorType"><em>Error = Empty Field(s) ('. is_numeric($_GET['error']) .')</em></p>
<p>Please fill in all fields with a red asterisk <span class="required">*</span>!</p>
</div>';
} elseif($type == "invalidEmail") {
echo '
<div class="errorMessage">
<p class="errorType"><em>Error = Invalid Name ('. is_numeric($_GET['error']) .')</em></p>
<p>First Name and Last Name; must contain letters only (hyphens "-" Are Allowed)!</p>
</div>';
} elseif($type == "invalidUsername") {
echo '
<div class="errorMessage">
<p class="errorType"><em>Error = Invalid Username ('. is_numeric($_GET['error']) .')</em></p>
<p>Username; must contain letters and/or number only!</p>
</div>';
} elseif($type == "profileSetup") {
echo '
<div class="errorMessage">
<p class="errorType"><em>Profile Not Setup</em></p>
<p>It seems that your profile hasn\'t been setup yet. Please make sure to fully setup the profile with the information below.</p>
</div>';
} elseif($type == "login") {
echo '
<div class="errorMessage">
<p class="errorType"><em>Not Logged In</em></p>
<p>It seems that you aren\'t logged in. Please login before proceeding.</p>
</div>';
} elseif($type == "profileSetup") {
echo '
<div class="errorMessage">
<p class="errorType"><em>Not Logged In</em></p>
<p>It seems that you haven\'t setup your profile yet. Please complete the fields below to setup.</p>
</div>';
} elseif($type == "fileError") {
echo '
<div class="errorMessage">
<p class="errorType"><em>Error = File Error ('. is_numeric($_GET['error']) .')</em></p>
<p>There was an error uploading your file OR No file was selected. Please try again or contact the support team at <a href="mailto:support@';$siteURL;echo'">support@';$siteURL;echo'</a> and we\'ll be happy to help!</p>
</div>';
} elseif($type == "fileExt") {
echo '
<div class="errorMessage">
<p class="errorType"><em>Error = File Extension ('. is_numeric($_GET['error']) .')</em></p>
<p>Please only upload files with the extension'; if($_GET['file'] == "ava" || $_GET['file'] == "thumb") { echo 'jpg, jpeg, png, OR pdf'; } else { echo '.mp4'; } echo '!</p>
</div>';
} elseif($type == "fileBig") {
echo '
<div class="errorMessage">
<p class="errorType"><em>Error = File To Large ('. is_numeric($_GET['error']) .')</em></p>
<p>Sorry, the file is to large. Please try to upload a file under'; if($_GET['file'] == "ava") { echo '10mb'; } elseif($_GET['file'] == "thumb") { echo '500mb'; } else { echo ' 1gb '; } echo '! Please try again!</p>
</div>';
} elseif($type == "email") {
echo '
<div class="errorMessage">
<p class="errorType"><em>Error = Email ('. is_numeric($_GET['error']) .')</em></p>
<p>It seems that the email you entered wasn\'t valid. Please try again or contact the support team at <a href="mailto:support@';$siteURL;echo'">support@';$siteURL;echo'</a> and we\'ll be more than happy to help.</p>
</div>';
} elseif($type == "sendEmail") {
echo '
<div class="errorMessage">
<p class="errorType"><em>Error = Email ('. is_numeric($_GET['error']) .')</em></p>
<p>It seems that we had an error when trying to send you an email.</p>
</div>';
} elseif($type == "usernameTaken") {
echo '
<div class="errorMessage">
<p class="errorType"><em>Error = Username Already Used ('. is_numeric($_GET['error']) .')</em></p>
<p>It seems as a user has already signed up with the entered username. Please try again or contact the support team at <a href="mailto:support@';$siteURL;echo'">support@';$siteURL;echo'</a> and we\'ll be more than happy to help.</p>
</div>';
} elseif($type == "emailTaken") {
echo '
<div class="errorMessage">
<p class="errorType"><em>Error = Email Already Used ('. is_numeric($_GET['error']) .')</em></p>
<p>It seems as a user has already signed up with the entered email. Please try again or contact the support team at <a href="mailto:support@';$siteURL;echo'">support@';$siteURL;echo'</a> and we\'ll be more than happy to help.</p>
</div>';
} elseif($type == "submitted") {
echo '
<div class="errorMessage">
<p class="errorType"><em>Error = Submitting Form ('. is_numeric($_GET['error']) .')</em></p>
<p>It seems there was an error when submitted the form. Please try again or contact the support team at <a href="mailto:support@';$siteURL;echo'">support@';$siteURL;echo'</a> and we\'ll be more than happy to help.</p>
</div>';
} elseif($type == "randomError") {
echo '
<div class="errorMessage">
<p class="errorType"><em>Error = Something Went Wrong ('. is_numeric($_GET['error']) .')</em></p>
<p>It seems there was an error. Please try again or contact the support team at <a href="mailto:support@';$siteURL;echo'">support@';$siteURL;echo'</a> and we\'ll be more than happy to help.</p>
</div>';
} elseif($type == "captcha") {
echo '
<div class="errorMessage">
<p class="errorType"><em>Error = 0000100101110 ('. is_numeric($_GET['error']) .')</em></p>
<p>It seems that you may be a robot?! You have failed the Google reCAPTCHA test. This is rather because you are a 00010010111 or are a human and there was an error on the 00010010111 part. Please try again or contact the support team at <a href="mailto:support@';$siteURL;echo'">support@';$siteURL;echo'</a> and we\'ll be more than happy to help.</p>
</div>';
} elseif($type == "database") {
echo '
<div class="errorMessage">
<p class="errorType"><em>Error = Database Issue ('. is_numeric($_GET['error']) .')</em></p>
<p>There was a problem connecting to the database. Please try again or contact the support team at <a href="mailto:support@';$siteURL;echo'">support@';$siteURL;echo'</a> and we\'ll be more than happy to help.</p>
</div>';
} elseif($type == "loginFailed") {
echo '
<div class="errorMessage">
<p class="errorType"><em>Error = Database Issue ('. is_numeric($_GET['error']) .')</em></p>
<p>Login failed due to an incorrect username/email or password. Please try again or contact the support team at <a href="mailto:support@';$siteURL;echo'">support@';$siteURL;echo'</a> and we\'ll be happy to help!</p>
</div>';
} elseif($type == "adminLevel") {
echo '
<div class="errorMessage">
<p class="errorType"><em>Error = Administrator Access ('. is_numeric($_GET['error']) .')</em></p>
<p>Please note that you need Administrator access level in order to continue.</p>
</div>';
} elseif($type == "passwordNotStrongEnough") {
echo '
<div class="errorMessage">
<p class="errorType"><em>Error = Password Not Strong Enough ('. is_numeric($_GET['error']) .')</em></p>
<p>It seems your password is not strong enough. Please use a password that is between 8 to 12 characters long includes one Uppercase and one lowercase letter. one number, and one special character "!@#$%.?". Please try again or contact the support team at <a href="mailto:support@';$siteURL;echo'">support@';$siteURL;echo'</a> and we\'ll be more than happy to help.</p>
</div>';
} elseif($type == "passwordNotSame") {
echo '
<div class="errorMessage">
<p class="errorType"><em>Error = Password Not The Same ('. is_numeric($_GET['error']) .')</em></p>
<p>You have entered a different password in the "Confirm Password" field than the "Password" field. Please try again or contact the support team at <a href="mailto:support@';$siteURL;echo'">support@';$siteURL;echo'</a> and we\'ll be more than happy to help.</p>
</div>';
} elseif($type == "verifyPassReset") {
echo '
<div class="errorMessage">
<p class="errorType"><em>Error = Verify Password Reset ('. is_numeric($_GET['error']) .')</em></p>
<p>It seems that we couldn\'t properly verify your password reset. Please try again or contact the support team at <a href="mailto:support@';$siteURL;echo'">support@';$siteURL;echo'</a> and we\'ll be more than happy to help.</p>
</div>';
} elseif($type == "signupSuccess") {
echo '
<div class="successMessage">
<p>You have successfully signed up! You may now login to '; $websiteName; echo'!</p>
</div>';
} elseif($type == "removedComment") {
echo '
<div class="successMessage">
<p>You have successfully removed your comment.</p>
</div>';
} elseif($type == "logoutSuccess") {
echo '
<div class="successMessage">
<p>You have successfully logged out!</p>
</div>';
} elseif($type == "deleteSuccess") {
echo '
<div class="successMessage">
<p>Your account has successfully been deleted! We\'re sorry to see you go; if there\'s anything that we could\'ve done to make you stay please send us an email to <a href="mailto:admin@';$siteURL;echo'">admin@';$siteURL;echo'</a>.</p>
</div>';
} elseif($type == "successVidDeleted") {
echo '
<div class="successMessage">
<p>You have successfully deleted your video!</p>
</div>';
} elseif($type == "passResetSuccess") {
echo '
<div class="successMessage">
<p>Your password has been successfully changed! You may login with your new password!</p>
</div>';
} elseif($type == "sucessfulWebsite") {
echo '
<div class="successMessage">
<p>You have successfully updated the websites settings!</p>
</div>';
} elseif($type == "sucessfulCSS") {
echo '
<div class="successMessage">
<p>You have successfully updated the CSS!</p>
</div>';
} elseif($type == "sucessfulTOS") {
echo '
<div class="successMessage">
<p>You have successfully updated the websites Terms of Service!</p>
</div>';
} elseif($type == "successfullyUpdatedUAdmin" || $type == "successfullyUpdatedU" ) {
echo '
<div class="successMessage">
<p>You have successfully updated your account!</p>
</div>';
}
elseif($type == "loginSuccess") {
echo '
<div class="successMessage">
<p>Successfully logged in!</p>
</div>';
}
} 