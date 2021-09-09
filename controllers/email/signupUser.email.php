<?php
$subject = "Welcome to ".$websiteName."!";

$headers[] = "From: ".$websiteName." <no-reply@".$siteURL.">";
$headers[] = "Reply-To: ".$websiteName." <contact@".$siteURL.">";
$headers[] = "Bcc: ".$websiteName." <admin@".$siteURL.">";
$headers[] ="'MIME-Version: 1.0 ";
$headers[] = "Content-type: text/html; charset=UTF-8";

$currentTime = time();

$message = "<html>
    <head>
      <title>Welcome to ".$websiteName."!</title>
      <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:100,100i,300,300i,400,400i,700,700i,900,900i');
        html {
          background: radial-gradient(ellipse at center, #EDEDED 0%,#FAFAFA 36%,#EBEBEB 100%);
        }
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
        strong {
          font-weight: bold;
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
      <article>
      <h1>Welcome to <a href=\"".$siteURL."\">".$websiteName."</a></h1>
      
      <p>Hello ".$firstname.", you have been succesfully signed up for <a href=\"".$siteURL."\">".$websiteName."</a>. If this was not you please feel free to contact the ".$websiteName." Support Team by replying to this email and we'll be happy to help! Here's some of the information that will be helpful for accessing our website:</p>

      <dl>
        <dt>First Name</dt>
          <dd>". $firstname ."</dd>
        <dt>Last Name</dt>
          <dd>". $lastname ."</dd>
        <dt>Username</dt>
          <dd>". $usermame ."</dd>
        <dt>Email</dt>
          <dd>". $email ."</dd>
        <dt>Password</dt>
          <dd>The password will be the password you used when signing up.<dd>
    </dl>

      <p><a href=\"https://".$siteURL."/login\" class=\"button\">Login to ".$websiteName."</a></p>
    
      <p>Cheers,</p>
      <p>".$websiteName."</p>
     </article>
    </body>
</html>";