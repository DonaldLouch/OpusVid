<?php

$avatarUpload = $spaces->putObject([
  'Bucket' => 'opusvid/avatars',
  'Key'    => $avatarNewName,
  'SourceFile' => $avatarTemp,
  'ACL'    => 'public-read',
  'ContentType' => 'image/'.$avatarExtention
]);
