<?php
session_start();

$firstname = $_GET['name-first'];
$lastname = $_GET['name-last'];
$username = $_GET['username'];
$email = $_GET['email'];

include '../../page-templates/head.php';
?>

  <body>
    <script> document.title = "Login/Signup | OpusVid"; </script>
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

              <h2 class="pageTitle">Login</h2>
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
              <form id="userLogin" method="post" enctype="multipart/form-data"  action="database/db_login.php" autocomplete="off">
                <div class="field">
                  <input type="text" name="username" id="username" placeholder="Username OR Email" value="<?php echo $username; ?>">
                  <label for="username">Username</label>
                </div>
                <div class="field">
                  <input type="password" name="password" id="password" placeholder="Password">
                  <label for="password">Password</label>
                </div>
                <button class="submitButton" type="submit" name="submit">Login</button>
              </form>
              <a href="password_reset">Forgot Password</a>
            </section> <!-- #loginTab -->

            <section id="signupTab">
              <h2 class="pageTitle">Signup</h2>
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
                  <?php } elseif($signupError == "ext") { ?>
                    <div class="errorMessage">
                      <p>Please only upload image files with the extention jpg, jpeg, png, OR pdf!</p>
                    </div>
                  <?php } elseif($signupError == "error") { ?>
                    <div class="errorMessage">
                      <p>There was an error uploading your avatar. Please try again or contact the support team at <a href="mailto:support@opusvid.com">support@opusvid.com</a> and we'll be happy to help!</p>
                    </div>
                  <?php } elseif($signupError == "big") { ?>
                    <div class="errorMessage">
                      <p>Sorry, the your avatar file is to large. Please try to upload a file under 100MB! Please try again!</p>
                    </div>
                <?php }
              }
              ?>

              <form id="userSignup" action="database/db_signup.php" enctype="multipart/form-data" method="post" autocomplete="off">
                  <div class="columns 2">
                    <div class="nm column">
                      <div class="field">
                        <input type="text" name="signupFirstName" id="signupFirstName" placeholder="First Name" value="<?php echo $firstname; ?>">
                        <label for="signupFirstName"><span class="required">*</span>First Name</label>
                      </div>
                    </div>
                    <div class="nm column">
                      <div class="field">
                        <input type="text" name="signupLastName" id="signupLastName" placeholder="Last Name" value="<?php echo $lastname; ?>">
                        <label for="signupLastName"><span class="required">*</span>Last Name</label>
                      </div>
                    </div>
                  </div>

                <div class="field">
                  <input type="text" name="signupUsername" id="signupUsername" placeholder="Username" value="<?php echo $username; ?>" maxlength="15">
                  <label for="username"><span class="required">*</span>Username: Max 15 Characters</label>
                </div>
                <div class="field">
                  <input type="password" name="signupPassword" id="signupPassword" placeholder="Password">
                  <label for="signupPassword"><span class="required">*</span>Password</label>
                </div>
                <div class="field">
                  <input type="email" name="signupEmail" id="signupEmail" placeholder="Email Address" value="<?php echo $email; ?>">
                  <label for="signupEmail"><span class="required">*</span>Email</label>
                </div>

                <label for="country"><span class="required">*</span>Country</label>
                  <select name="country" id="country" required>
                    <option value="Canada">Canada</option>
                    <option value="United States of America">United States of America</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option>- All Other Countries -</option>
                    <option value="Afganistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Barbados">Barbados</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Belize">Belize</option>
                    <option value="Benin">Benin</option>
                    <option value="Bermuda">Bermuda</option>
                    <option value="Bhutan">Bhutan</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Bonaire">Bonaire</option>
                    <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Brazil">Brazil</option>
                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                    <option value="Brunei">Brunei</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Canary Islands">Canary Islands</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Channel Islands">Channel Islands</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Christmas Island">Christmas Island</option>
                    <option value="Cocos Island">Cocos Island</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo">Congo</option>
                    <option value="Cook Islands">Cook Islands</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Cote DIvoire">Cote D'Ivoire</option>
                    <option value="Croatia">Croatia</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Curaco">Curacao</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
                    <option value="East Timor">East Timor</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                    <option value="Eritrea">Eritrea</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Falkland Islands">Falkland Islands</option>
                    <option value="Faroe Islands">Faroe Islands</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="French Guiana">French Guiana</option>
                    <option value="French Polynesia">French Polynesia</option>
                    <option value="French Southern Ter">French Southern Ter</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambia">Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Gibraltar">Gibraltar</option>
                    <option value="Great Britain">Great Britain</option>
                    <option value="Greece">Greece</option>
                    <option value="Greenland">Greenland</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Guam">Guam</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Hawaii">Hawaii</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Iran">Iran</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Isle of Man">Isle of Man</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="Korea North">Korea North</option>
                    <option value="Korea Sout">Korea South</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                    <option value="Laos">Laos</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libya">Libya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macau">Macau</option>
                    <option value="Macedonia">Macedonia</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Marshall Islands">Marshall Islands</option>
                    <option value="Martinique">Martinique</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mayotte">Mayotte</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Midway Islands">Midway Islands</option>
                    <option value="Moldova">Moldova</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Nambia">Nambia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherland Antilles">Netherland Antilles</option>
                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                    <option value="Nevis">Nevis</option>
                    <option value="New Caledonia">New Caledonia</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Niue">Niue</option>
                    <option value="Norfolk Island">Norfolk Island</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau Island">Palau Island</option>
                    <option value="Palestine">Palestine</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Phillipines">Philippines</option>
                    <option value="Pitcairn Island">Pitcairn Island</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                    <option value="Republic of Serbia">Republic of Serbia</option>
                    <option value="Reunion">Reunion</option>
                    <option value="Romania">Romania</option>
                    <option value="Russia">Russia</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="St Barthelemy">St Barthelemy</option>
                    <option value="St Eustatius">St Eustatius</option>
                    <option value="St Helena">St Helena</option>
                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                    <option value="St Lucia">St Lucia</option>
                    <option value="St Maarten">St Maarten</option>
                    <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                    <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                    <option value="Saipan">Saipan</option>
                    <option value="Samoa">Samoa</option>
                    <option value="Samoa American">Samoa American</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Serbia">Serbia</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Swaziland">Swaziland</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syria">Syria</option>
                    <option value="Tahiti">Tahiti</option>
                    <option value="Taiwan">Taiwan</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania">Tanzania</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Togo">Togo</option>
                    <option value="Tokelau">Tokelau</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Uganda">Uganda</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Erimates">United Arab Emirates</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States of America">United States of America</option>
                    <option value="Uraguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Vatican City State">Vatican City State</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                    <option value="Wake Island">Wake Island</option>
                    <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zaire">Zaire</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                  </select>

                  <label for="avatarFile"><span class="required">*</span>Upload Avatar: 100MB | jpg, jpeg, png, OR pdf</label>
                    <input type="file" name="avatarFile" id="avatarFile">

                  <button class="submitButton" type="submit" name="submit">Sign up</button>
              </form>

            </section> <!-- #signupTab -->
          </div><!-- .tabContent --->

        <script src="resources/js/tabs.js"></script>
    		<script>
    			new tabsFunction(document.getElementById("tabs"));
    		</script>
      </div> <!-- tabs -->
    <?php } ?>
    </div> <!-- wrapper card -->
    <?php include('../../page-templates/footer.php'); ?>
