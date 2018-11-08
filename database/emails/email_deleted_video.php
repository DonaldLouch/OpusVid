<?php

$delSQLSel = "SELECT * FROM videos WHERE id = '$id';";
$resultsDelSel = mysqli_query($mySQL, $delSQLSel);
$data = mysqli_fetch_assoc($resultsDelSel);

$email = "admin@opusvid.com";

#Once account is updated the user will recieve this email
$subject = "Video Deleted!";

$headers[] = 'From: Opus Vid Account<no-reply@opusvid.com>';
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

$message = "
<html>
    <head>
      <title>Video Deleted!</title>
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
    <img src=\"https://opusvid.sfo2.cdn.digitaloceanspaces.com/ui/video-ui/opusLogo.png\" alt=\"Opus Vid Logo\">
     <article>
      <h1>Video Deleted!</h1>
      <p>Hello, the video \"<strong>". $data['video_title']."\"</strong> by \"<strong>". $data['opus_creator']."\"</strong> was deleted.</p>

      <dl>
        <dt>order_number</dt>
          <dd>". $data['order_number']."</dd>
        <dt>id</dt>
          <dd>". $data['id']."</dd>
        <dt>video_path</dt>
          <dd>". $data['video_path']."</dd>
        <dt>video_title</dt>
          <dd>". $data['video_title']."</dd>
        <dt>opus_creator</dt>
          <dd>". $data['opus_creator']."</dd>
        <dt>uploaded_on</dt>
          <dd>". $data['uploaded_on']."</dd>
        <dt>short_description</dt>
          <dd>". $data['short_description']."</dd>
        <dt>description</dt>
          <dd>". $data['description']."</dd>
        <dt>category</dt>
          <dd>". $data['category']."</dd>
        <dt>music_credit</dt>
          <dd>". $data['music_credit']."</dd>
        <dt>filmed_date</dt>
          <dd>". $data['filmed_date']."</dd>
        <dt>filmed_at</dt>
          <dd>". $data['filmed_at']."</dd>
        <dt>filmed_on</dt>
          <dd>". $data['filmed_on']."</dd>
        <dt>filmed_by</dt>
          <dd>". $data['filmed_by']."</dd>
        <dt>audio_by</dt>
          <dd>". $data['audio_by']."</dd>
        <dt>audio_with</dt>
          <dd>". $data['audio_with']."</dd>
        <dt>edited_by</dt>
          <dd>". $data['edited_by']."</dd>
        <dt>edited_on</dt>
          <dd>". $data['edited_on']."</dd>
        <dt>staring</dt>
          <dd>". $data['staring']."</dd>
        <dt>privacy</dt>
          <dd>". $data['privacy']."</dd>
        <dt>thumbnail_path</dt>
          <dd>". $data['thumbnail_path']."</dd>
        <dt>views</dt>
          <dd>". $data['views']."</dd>
      </dl>

      <p>Cheers,</p>
      <p>OpusVid</p>
     </article>
    </body>
</html>";

if (!mail($email, $subject, $message, implode("\r\n", $headers))) {
  header("Location: ../dashboard/manage?delete=failed");
  exit();
}
