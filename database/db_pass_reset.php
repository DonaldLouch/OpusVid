<?php

if (isset($_POST['reset-password'])) {
  include 'db_connect.php';
  $errors = 0;

  $email = mysqli_real_escape_string($mySQL, $_POST['email']);
  $emailSQL = "SELECT email FROM users WHERE email='$email'";
  $emailResults = mysqli_query($mySQL, $emailSQL);

  if (empty($email)) {
    $errors = 1;
    header("Location: ../password_reset?reset=empty");
  }elseif(mysqli_num_rows($emailResults) <= 0) {
    $errors = 2;
    header("Location: ../password_reset?reset=invaild");
  }
  $token = bin2hex(random_bytes(50));

  if ($errors == 0) {
    $resetInsert = "INSERT INTO password_reset (email, token) VALUES ('$email', '$token')";
    $results = mysqli_query($mySQL, $resetInsert);

    #Once account is updated the user will recieve this email
    $subject = "Reset your password on opusvid.com!";

    $headers[] = 'From: Opus Vid Account<no-reply@opusvid.com>';
    $headers[] = 'Reply-To: support@opusvid.com';
    $headers[] = 'Bcc: admin@opusvid.com';
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';

    $message = "
    <html>
        <head>
          <title>Reset your password on opusvid.com</title>
          <style>
            article {
             font-family: Montserrat, sans-serif;
             font-size: 16px;
             margin: 0.5em;
             padding: 1.5em;
             box-shadow: 1px 1px 5px 1px rgba(83, 109, 254, 0.4);
             border-radius: 0.3em;
            }
            h1 {
             color: #302E91;
             font-size: 2em;
             margin: 0.2em 0 0.6em;
             text-align: center;
             text-shadow: 1px 1px 8px rgba(148, 150, 150, 0.57);
           }
           a:link, a:visited {
             color: #302E91;
             text-decoration: none;
             font-weight: 500;
           }
           a:hover {
             color: #FF9D2F;
           }
           dt {
             font-weight: bold;
             font-size: 1.3em;
           }
           dd {
             margin-left: 1.5em;
             font-weight: 300;
           }
           a.button {
             background-color: #302E91;
             padding: 0.5em;
             color: #fff !important;
             text-shadow: none;
             font-size: 0.9em;
             box-shadow: 5px 3px 7px 1px rgba(83, 109, 254, 0.4);
             display: block;
             width: fit-content;
             margin: 1em auto;
           }
           a.button:hover {
             background: none;
             box-shadow: none;
             color: #302E91 !important;
           }
           img {
             width: 20vw;
             display: block;
             margin: 0.5em auto;
           }
          </style>
        </head>
        <body>
        <img src=\"https://opusvid.com/storage/ui/video-ui/opusLogo.png\" alt=\"Opus Vid Logo\">
         <article>
          <h1>Reset your password on opusvid.com</h1>
          <p>Hello there, it seems that you have requested to reset your password on Opus Vid. If this was you click on the below button to rest your password! If this wasn't you kindly disregard this email OR contact the support team by replying to this email and we'll be happy to help!</p>

          <dl>
            <dt>Email Address</dt>
              <dd>". $email ."</dd>
            <dt>Password</dt>
              <dd>The password that you entered when signing up!</dd>
            </dl>

            <a href=\"https://opusvid.com/password_new?token=$token\" class=\"button\">Reset Your Password*</a>
            <p>* If the above button didn't work; copy and past the following link in your address bar: <a href=\"https://opusvid.com/password_new?token=$token\"> https://opusvid.com/password_new?token=$token</a></p>

          <p>Cheers,</p>
          <p>Opus Vid</p>
         </article>
        </body>
    </html>";

    mail($email, $subject, $message, implode("\r\n", $headers));

    header('location: ../password_pending?email=' . $email);
  }
}
