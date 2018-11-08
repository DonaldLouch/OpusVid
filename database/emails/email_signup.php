<?php
$subject = "Welcome to OpusVid!";

$headers[] = 'From: OpusVid <no-reply@opusvid.com>';
$headers[] = 'Reply-To: contact@opusvid.com';
$headers[] = 'Bcc: admin@opusvid.com';
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

$message = "
<html>
    <head>
      <title>Welcome to OpusVid!</title>
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
    <img src=\"https://opusvid.sfo2.cdn.digitaloceanspaces.com/ui/video-ui/opusLogo.png\" alt=\"Opus Vid Logo\">
     <article>
      <h1>Welcome to OpusVid!</h1>
      <p>Hello ".$firstname." " .$lastname." (".$username."), you have successfully registered for Opus Vid!</p>

      <dl>
        <dt>First Name</dt>
          <dd>". $firstname ."</dd>
        <dt>Last Name</dt>
          <dd>". $lastname ."</dd>
        <dt>Username</dt>
          <dd>". $username ."</dd>
        <dt>Email</dt>
          <dd>". $email ."</dd>
        <dt>Password</dt>
          <dd>The password that you entered when signing up!</dd>
          <dt>Country</dt>
            <dd>". $country ."</dd>
        </dl>

       <p>Please feel free to login to the website with the below button in which will direct you to the login page! <a href=\"https://opusvid.com/login\" class=\"button\">Login to Opus Vid</a></p>

      <p>Cheers,</p>
      <p>Opus Vid</p>
     </article>
    </body>
</html>";

mail($email, $subject, $message, implode("\r\n", $headers));

$sqlMail = "INSERT INTO mail (user_to, user_from, subject, message, status, importance, sent_time) VALUES ('$username', 'OpusVid', '$subject', '".mysqli_escape_string($mySQL, $message)."', 'unread', 'medium', time())";
$mailResults = mysqli_query($mySQL, $sqlMail);
