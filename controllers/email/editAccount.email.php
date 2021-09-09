<?php
$subject = "Account Updated!";

$headers[] = "From: ".$websiteName." Accounts <no-reply@".$siteURL.">";
$headers[] = "Reply-To: ".$websiteName." <support@".$siteURL.">";
$headers[] = "Bcc: ".$websiteName." <admin@".$siteURL.">";
$headers[] ="'MIME-Version: 1.0 ";
$headers[] = "Content-type: text/html; charset=UTF-8";

$message = "<html>
	<head>
		<title>Account Updated!</title>
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
      <h1>Account Updated!</h1>
      <p>Hello ".$accountName.", you have successfully updated your account on ".$websiteName."! If this was not you please feel free to contact the ".$websiteName." Support Team by repling to this email and we'll be happy to help!</p>
		
		<dl>
			<dt>First Name</dt>
				<dd>". $accountFirst ."</dd>
			<dt>Last Name</dt>
				<dd>". $accountLast ."</dd>
			<dt>Username</dt>
				<dd>". $accountName ."</dd>
			<dt>Email Address</dt>
				<dd>". $accountEmail ."</dd>
			<dt>Password</dt>
				<dd>The password that you entered when signing up or that you just entered!</dd>
        </dl>

    <p>Cheers,</p>
		<p>".$websiteName."</p>
		</article>
	</body>
</html>";