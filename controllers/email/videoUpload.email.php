<?php
$subject = "Video Uploaded!";

$headers[] = "From: ".$websiteName." Upload <no-reply@".$siteURL.">";
$headers[] = "Reply-To: ".$websiteName." <contact@".$siteURL.">";
$headers[] ="'MIME-Version: 1.0 ";
$headers[] = "Content-type: text/html; charset=UTF-8";

$message = "<html>
	<head>
		<title>Video Uploaded!</title>
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
		<img src=\"https://".$spacesBucket.".".$spacesURIRegion.".".$spacesURL."/".$spacesRootFolder."/ui/videoUI/titleLogo.png\" alt=\"".$websiteName."Logo\">

		<article>
			<h1>Video Uploaded!</h1>
			<p>Hello ".$uploadOC.", you have successfully uploaded your video \"<strong>". $uploadTitle ."</strong>\" on ".$websiteName."! If this was not you please feel free to contact the ".$websiteName." Support Team by replying to this email and we'll be happy to help!</p>

		<dl>
			<dt>Upload ID<dt>
			<dd>" .$uploadID. "</dd>
			<dt>Video Title<dt>
			<dd>" .$uploadTitle. "</dd>
			<dt>Uploaded On<dt>
			<dd>" .$uploadDate. "</dd>
			<dt>Short Description<dt>
			<dd>" .$uploadSDescription. "</dd>
			<dt>Description<dt>
			<dd>" .$uploadDescription. "</dd>
			<dt>Category<dt>
			<dd>" .$uploadCategory. "</dd>
			<dt>Tags<dt>
			<dd>" .$uploadTags. "</dd>
			<dt>Chapters<dt>
			<dd>" .$uploadChapters."</dd>
			<dt>Music Credit<dt>
			<dd>" .$uploadMusicCredit. "</dd>
			<dt>Video Credit<dt>
			<dd>" .$uploadVideoCredit. "</dd>
			<dt>Privacy<dt>
			<dd>" .$uploadPrivacy. "</dd>
		</dl>

		<p><a href=\"https://".$siteURL."/player?id=$uploadID\" class=\"button\">Watch Your New Video!</a></p>

		<p>Cheers,</p>
		<p>".$websiteName."</p>
		</article>
	</body>
</html>";