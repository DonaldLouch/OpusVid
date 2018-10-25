<?php

// Included aws/aws-sdk-php via Composer's autoloader
// Installed with: composer.phar require aws/aws-sdk-php
require '../vendor/autoload.php';
use Aws\S3\S3Client;

$spaces = new Aws\S3\S3Client([
  'version' => 'latest',
  'region'  => 'sfo2',
  'endpoint' => 'https://sfo2.digitaloceanspaces.com',
  'credentials' => [
          'key'    => 'T2DGL2EEESPG4JSJT44C',
          'secret' => 'ZVX8SSWVfg2+NehDychaSiLTGLBYnSel0zEeRe0SlyM',
      ],
]);
