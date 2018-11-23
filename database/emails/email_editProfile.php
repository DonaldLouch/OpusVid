<?php
#Once a profile is updated the user will recieve this email
$subject = "Profile Updated!";

$headers[] = 'From: OpusVid Account<no-reply@opusvid.com>';
$headers[] = 'Reply-To: support@opusvid.com';
$headers[] = 'Bcc: admin@opusvid.com';
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

$currentTime = time();

$message = "<html>
    <head>
      <title>Profile Updated!</title>
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
      <h1>Profile Updated!</h1>
      <p>Hello ".$accountName.", you have successfully updated your profile on Opus Vid! If this was not you please feel free to contact the Opus Support Team by repling to this email and we'll be happy to help!</p>

      <dl>
        <dt>First Name</dt>
          <dd>". $accountFirst ."</dd>
        <dt>Last Name</dt>
          <dd>". $accountLast ."</dd>
        <dt>Username</dt>
          <dd>". $accountName ."</dd>
        <dt>Country</dt>
          <dd>". $accountCountry ."</dd>
        <dt>Profile Description</dt>
          <dd>". $accountDescription ."</dd>
        <dt>Profile Tags</dt>
          <dd>". $accountTags ."</dd>
        </dl>

      <p>Cheers,</p>
      <p>OpusVid</p>
     </article>
    </body>
</html>";

mail($accountEmail, $subject, $message, implode("\r\n", $headers));

$sqlMail = "INSERT INTO mail (user_to, user_from, subject, message, status, importance, sent_time) VALUES ('$accountName', 'OpusVid', '$subject', '".mysqli_escape_string($mySQL, $message)."', 'unread', 'medium', '$currentTime')";
$mailResults = mysqli_query($mySQL, $sqlMail);
