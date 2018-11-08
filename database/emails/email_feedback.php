<?php
$email = 'Donald Louch<donaldlouch@outlook.com>';
$subject = "New Feedback | Opus Vid";

$headers[] = 'From: OpusVid <no-reply@opusvid.com>';
$headers[] = 'Reply-To: contact@opusvid.com';
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

$message = "
<html>
    <head>
      <title>New Feedback | OpusVid</title>
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
      <h1>New Feedback Was Submit</h1>
      <p>It seems as someone has submitted feedback on OpusVid with the content of:</p>

      <dl>
        <dt>Issues Encountered</dt>
          <dd>". $issue ."</dd>
        <dt>Was a Journy Commited?</dt>
          <dd>". $journy ."</dd>
        <dt>If So The Tasks Completed</dt>
          <dd>". $taskSelected ."</dd>
        <dt>Or Other Tasks</dt>
          <dd>". $tasksYes ."</dd>
          <dd>". $tasks ."</dd>
        <dt>The Experience Of The User</dt>
          <dd>". $experince ."</dd>
        <dt>Process The User Took</dt>
          <dd>". $process ."</dd>
        <dt>Their Thoughts on the Design</dt>
          <dd>". $design ."</dd>
        <dt>Thoughts on UX Design</dt>
          <dd>". $user ."</dd>
        <dt>Overall Thoughts</dt>
          <dd>". $overall ."</dd>
        <dt>Additional Comments</dt>
          <dd>". $other ."</dd>
        </dl>

      <p><a href=\"https://opusvid.com/admin/feedback_results\" class=\"button\">View All Feedback: Admin Level Needed!</a></p>

      <p>Cheers,</p>
      <p>OpusVid</p>
     </article>
    </body>
</html>";

mail($email, $subject, $message, implode("\r\n", $headers));

$sqlMail = "INSERT INTO mail (user_to, user_from, subject, message, status, importance, sent_time) VALUES ('MasterAdmin', 'Beta Tester', '$subject', '".mysqli_escape_string($mySQL, $message)."', 'unread', 'medium', time())";
$mailResults = mysqli_query($mySQL, $sqlMail);
