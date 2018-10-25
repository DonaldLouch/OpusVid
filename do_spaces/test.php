<?php

// Include the SDK using the composer autoloader
require 'vendor/autoload.php';

// Upload a file to the Space
$insert = $client->putObject([
     'Bucket' => 'opusvid',
     'Key'    => 'new',
     'Body'   => fopen($filePath, "r+")
]);

###


$s3 = new Aws\S3\S3Client([
  'version' => 'latest',
  'region'  => 'sfo2',
  'endpoint' => 'https://sfo2.digitaloceanspaces.com',
	'credentials' => [
    'key'    => 'T2DGL2EEESPG4JSJT44C',
    'secret' => 'ZVX8SSWVfg2+NehDychaSiLTGLBYnSel0zEeRe0SlyM',
	]
]);

// Send a PutObject request and get the result object.
$key = '-- your filename --';

$result = $s3->putObject([
	'Bucket' => 'opusvid',
	'Key'    => $key,
	'Body'   => 'this is the body!',
	//'SourceFile' => 'c:\samplefile.png' -- use this if you want to upload a file from a local location
]);

// Print the body of the result by indexing into the result object.
var_dump($result);
