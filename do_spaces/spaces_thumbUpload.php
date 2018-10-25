<?php
$thumbUpload = $spaces->putObject([
  'Bucket' => 'opusvid/thumbnails',
  'Key'    => $thumbNewName,
  'SourceFile' => $thumbTemp,
  'ACL'    => 'public-read',
  'ContentType' => 'image/'.$thumbExtention
]);
