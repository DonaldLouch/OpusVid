<?php
$subject = "New Comment on Video";

$headers[] = "From: ".$websiteName." Comment Team <no-reply@".$siteURL.">";
$headers[] = "Reply-To: ".$websiteName." <support@".$siteURL.">";
$headers[] ="'MIME-Version: 1.0 ";
$headers[] = "Content-type: text/html; charset=UTF-8";

$message = "<html>
	<head>
		<title>New Comment on Video</title>
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
			<h1>New Comment on Video!</h1>
			<p>Hello ".$opusCreator.",</p>

			<p>We wanted to let you know that you have just recevied a new comment from ".$commenterName.". On the video title \"<a href=\"https://".$siteURL."/player?id=$videoID\">".$videoTitle."</a>\". The comment reads:</p>
			<p style=\"margin-left: 0.5rem; font-weight: 300;\">".$commentBody."</p>
		<p>Cheers,</p>
		<p>".$websiteName."</p>
		</article>
	</body>
</html>";