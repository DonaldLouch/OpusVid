<?php

$email = "donaldlouch@outlook.com";


$uploadID = "1234456";
$uploadTitle = "Sample Video";
$uploadDate = date('D M j, Y', time());
$uploadSDescription = "Test Short";
$uploadDescription = "Test Long";
$uploadCategory = "Vlog";
$uploadTags = "Tag";
$uploadMusicCredit = "PERSON";
$uploadFilmedBy = "PERSON";
$uploadFilmedWith = "TECH";
$uploadFilmedAt = "LOCATION";
$uploadFilmedOn = "DATE";
$uploadAudioBy = "BY";
$uploadAudioWith = "WITH";
$uploadEditedBy = "BY";
$uploadEditedOn = "WITH";
$uploadStaring = "PERSONS";
$uploadPrivacy = "public";
$uploadOC = "Username";

#Once account is updated the user will recieve this email
$subject = "Video Uploaded!";

$headers[] = 'From: Opus Vid Account<no-reply@opusvid.com>';
$headers[] = 'Reply-To: support@opusvid.com';
$headers[] = 'Bcc: admin@opusvid.com';
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

$message = "
<html>
    <head>
      <title>Video Uploaded!</title>
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
       table {
         border-collapse: collapse;
         width: 100%;
         box-shadow: 5px 3px 7px 1px rgba(83, 109, 254, 0.4);
         margin: 1em 0;
       }
       td, th {
         text-align: left;
         padding: 0.8em;
       }
       th {
         text-align: center;
         font-weight: bold;
         font-size: 1.2em;
       }
       tr:nth-child(2n) {
         background-color: #302E91;
         color: #fff;
       }
       tr:nth-child(2n) a {
         color: #fff;
       }
       hr {
         margin: 1em 1.5em;
         border: 0.5px solid #302E91;
       }
       ul, ol {
         margin: 0 3em;
       }
       ul {
         list-style: disc;
       }
       ol {
         list-style: decimal;
       }
       li {
         font-size: 1.3em;
         margin: 0;
         font-weight: 500;
       }
       ul ul,
       ol ol,
       ul ol,
       ol ul {
         margin-bottom: 0;
         margin-left: 1.5em;
       }
       strong {
         font-weight: bold;
       }
       em {
         font-style: italic;
       }
       q {
         font-weight: bold;
         font-style: italic;
       }
       blockquote {
         border-left: 2px solid #302E91;
         margin: 1em 0 1em 2em;
         padding: 0.1em 0 0.1em 1em;
       }
       cite {
         display: block;
         font-style: italic;
         font-weight: bold;
         margin: 1em;
       }
       pre {
         background-color: #eee;
         padding: 1em;
         font-family: Source Code Pro;
         font-weight: 300;
         overflow: auto;
       }
       code,
       var {
         font-family: Source Code Pro;
         font-weight: 300;
         color: #0078ff;
       }
       abbr {
         border-bottom: 2px solid #302E91;
         font-weight: 500;
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
      <h1>Video Uploaded!</h1>
      <p>Hello ".$uploadOC.", you have successfully uploaded your video \"<strong>". $uploadTitle ."</strong>\" on Opus Vid! If this was not you please feel free to contact the Opus Support Team by repling to this email and we'll be happy to help!</p>

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
        <dt>Music Credit<dt>
          <dd>" .$uploadMusicCredit. "</dd>
        <dt>Filmed By<dt>
          <dd>" .$uploadFilmedBy. "</dd>
        <dt>Filmed With<dt>
          <dd>" .$uploadFilmedWith. "</dd>
        <dt>FIlmed At<dt>
          <dd>" .$uploadFilmedAt. "</dd>
        <dt>Filmed Date<dt>
          <dd>" .$uploadFilmedOn. "</dd>
        <dt>Audio By<dt>
          <dd>" .$uploadAudioBy. "</dd>
        <dt>Audio With<dt>
          <dd>" .$uploadAudioWith. "</dd>
        <dt>Edited By<dt>
          <dd>" .$uploadEditedBy. "</dd>
        <dt>Edited On<dt>
          <dd>" .$uploadEditedOn. "</dd>
        <dt>Staring<dt>
          <dd>" .$uploadStaring. "</dd>
        <dt>Privacy<dt>
          <dd>" .$uploadPrivacy. "</dd>
      </dl>

      <a href=\"https://opusvid.com/player?id=$uploadID\" class=\"button\">Watch Your New Video!</a></p>

      <p>Cheers,</p>
      <p>Opus Vid</p>
     </article>
    </body>
</html>";

echo $message;

//mail($email, $subject, $message, implode("\r\n", $headers));

if (mail($email, $subject, $message, implode("\r\n", $headers))) {
   echo "Email sent";
  }else{
  echo "Failed to send email. Please try again later";
}
