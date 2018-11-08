<?php
$delSQL = "SELECT * FROM users WHERE id = '$id'";
$results = mysqli_query($mySQL, $delSQL);
$data = mysqli_fetch_assoc($results);

$email = "admin@opusvid.com";

#Once account is updated the user will recieve this email
$subject = "Account Uploaded!";

$headers[] = 'From: Opus Vid Account<no-reply@opusvid.com>';
$headers[] = 'Reply-To: support@opusvid.com';
$headers[] = 'Bcc: admin@opusvid.com';
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

$message = "
<html>
    <head>
      <title>Account Deleted!</title>
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
      <h1>Account Deleted!</h1>
      <p>Hello, the user \"<strong>". $data['username']."\"</strong> was deleted.</p>

      <dl>
        <dt>id</dt>
          <dd>".$data['id']."</dd>
        <dt>first_name</dt>
          <dd>".$data['first_name']."</dd>
        <dt>last_name</dt>
          <dd>".$data['last_name']."</dd>
        <dt>username</dt>
          <dd>".$data['username']."</dd>
        <dt>email</dt>
          <dd>".$data['email']."</dd>
        <dt>user_password</dt>
          <dd>".$data['user_password']."</dd>
        <dt>country</dt>
          <dd>".$data['country']."</dd>
      <dt>description</dt>
          <dd>".$data['description']."</dd>
      <dt>account_tags</dt>
          <dd>".$data['account_tags']."</dd>
      <dt>avatar</dt>
          <dd>".$data['avatar']."</dd>
      </dl>

      <p>Cheers,</p>
      <p>OpusVid</p>
     </article>
    </body>
</html>";

if (!mail($email, $subject, $message, implode("\r\n", $headers))) {
  header("Location: ../admin/accounts?delete=failed");
  exit();
}
