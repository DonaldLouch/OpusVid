<?php
$subject = "Reset your password on".$siteURL."!";

$headers[] = "From: ".$websiteName." <no-reply@".$siteURL.">";
$headers[] = "Reply-To: ".$websiteName." <contact@".$siteURL.">";
$headers[] = "Bcc: ".$websiteName." <admin@".$siteURL.">";
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

$message = "<html>
	<head>
		<title>Reset your password on ".$siteURL."!</title>
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
			<h1>Reset your password on ".$websiteName."</h1>
			<p>Hello there, it seems that you have requested to reset your password on ".$websiteName.". If this was you click on the below button to rest your password! If this wasn't you kindly disregard this email OR contact the support team by replying to this email and we'll be happy to help!</p>
			
			<a href=\"https://".$siteURL."/passwordNew?verify=". $verify ."&token=". bin2hex($token) ."\" class=\"button\">Reset Your Password*</a>
			<p>* If the above button didn't work; copy and past the following link in your address bar: <a href=\"https://".$siteURL."/passwordNew?verify=". $verify ."&token=". bin2hex($token) ."\">https://".$siteURL."/passwordNew?verify=". $verify ."&token=". bin2hex($token) ."</a></p>
			
			<p>Cheers,</p>
			<p>".$websiteName."</p>
		</article>
	</body>
</html>";
