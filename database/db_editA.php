<?php

if (isset($_POST['submit'])) {
  include 'db_connect.php';

  $accountName = mysqli_real_escape_string($mySQL, $_POST['accountID']);
  $accountEmail = mysqli_real_escape_string($mySQL, $_POST['editEmail']);
  $accountPassword = mysqli_real_escape_string($mySQL, $_POST['editPassword']);
  $hashedPassword = password_hash($accountPassword, PASSWORD_DEFAULT);

  if (empty($accountPassword)) {
    $updateSQL = "UPDATE users SET email = '$accountEmail' WHERE username= '$accountName';";

    $results = mysqli_query($mySQL, $updateSQL);

    #Once the account is updated the user will recieve this email
    $subject = "Account Updated!";

    $headers[] = 'From: Opus Vid Account<no-reply@opusvid.com>';
    $headers[] = 'Reply-To: support@opusvid.com';
    $headers[] = 'Bcc: admin@opusvid.com';
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';

    $message = "
    <html>
        <head>
          <title>Account Updated!</title>
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
          <h1>Account Updated!</h1>
          <p>Hello ".$accountName.", you have successfully updated your account on Opus Vid! If this was not you please feel free to contact the Opus Support Team by replying to this email and we'll be happy to help!</p>

          <dl>
            <dt>Email Address</dt>
              <dd>". $accountEmail ."</dd>
            <dt>Password</dt>
              <dd>The password that you entered when signing up!</dd>
            </dl>

          <p>Cheers,</p>
          <p>Opus Vid</p>
         </article>
        </body>
    </html>";
    mail($accountEmail, $subject, $message, implode("\r\n", $headers));

    header("Location: ../dashboard/settingsA?edit=success");
  } else {
    $updatePASSSQL = "UPDATE users SET email = '$accountEmail', user_password = '$hashedPassword' WHERE username= '$accountName';";
    $results = mysqli_query($mySQL, $updatePASSSQL);

    #Once account is updated the user will recieve this email
    $subject = "Account Updated!";

    $headers[] = 'From: Opus Vid Account<no-reply@opusvid.com>';
    $headers[] = 'Reply-To: support@opusvid.com';
    $headers[] = 'Bcc: admin@opusvid.com';
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';

    $message = "
    <html>
        <head>
          <title>Account Updated!</title>
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
          <h1>Account Updated!</h1>
          <p>Hello ".$accountName.", you have successfully updated your account on Opus Vid! If this was not you please feel free to contact the Opus Support Team by repling to this email and we'll be happy to help!</p>

          <dl>
            <dt>Email Address</dt>
              <dd>". $accountEmail ."</dd>
            <dt>Password</dt>
              <dd>The password that you entered when signing up!</dd>
            </dl>

          <p>Cheers,</p>
          <p>Opus Vid</p>
         </article>
        </body>
    </html>";
    mail($accountEmail, $subject, $message, implode("\r\n", $headers));
    header("Location: ../dashboard/settingsA?edit=success");
  }
}
