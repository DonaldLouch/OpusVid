<?php
require '../../vendor/autoload.php';
use Aws\S3\S3Client;

$credentials = new Aws\Credentials\Credentials($spacesKey, $spacesSecert);

$spaces = new Aws\S3\S3Client([
  'version' => 'latest',
  'region'  => $spacesRegion,
  'endpoint' => $spacesEndpoint,
  'credentials' => $credentials
]);