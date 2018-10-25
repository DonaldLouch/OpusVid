<?php

$videoUpload = $spaces->putObject([
  'Bucket' => 'opusvid/videos',
  'Key'    => $videoNewName,
  'SourceFile' => $videoTemp,
  'ACL'    => 'public-read',
  'ContentType' => 'video/'.$videoExtention
]);
