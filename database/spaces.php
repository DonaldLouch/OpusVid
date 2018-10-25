<?php
/**
* $Id$
*
* S3 form upload example
*/

if (!class_exists('S3')) require_once '../amazon-s3-php-class/S3.php';

// AWS access info
if (!defined('awsAccessKey')) define('awsAccessKey', 'T2DGL2EEESPG4JSJT44C');
if (!defined('awsSecretKey')) define('awsSecretKey', 'ZVX8SSWVfg2+NehDychaSiLTGLBYnSel0zEeRe0SlyM');



// Check for CURL
if (!extension_loaded('curl') && !@dl(PHP_SHLIB_SUFFIX == 'so' ? 'curl.so' : 'php_curl.dll'))
	exit("\nERROR: CURL extension not loaded\n\n");

// Pointless without your keys!
/*if (awsAccessKey == 'T2DGL2EEESPG4JSJT44C' || awsSecretKey == 'ZVX8SSWVfg2+NehDychaSiLTGLBYnSel0zEeRe0SlyM')
	exit("\nERROR: AWS access information required\n\nPlease edit the following lines in this file:\n\n".
	"define('awsAccessKey', 'change-me');\ndefine('awsSecretKey', 'change-me');\n\n");*/


S3::setAuth(awsAccessKey, awsSecretKey);

$bucket = 'opusvid';

//$path = 'myfiles/'; // Can be empty ''

/*$lifetime = 3600; // Period for which the parameters are valid
$maxFileSize = (1024 * 1024 * 50); // 50 MB

$metaHeaders = array('uid' => 123);
$requestHeaders = array(
    'Content-Type' => 'application/octet-stream',
    'Content-Disposition' => 'attachment; filename=${filename}'
);*/

/*$params = S3::getHttpUploadPostParams(
    $bucket,
    $path,
    S3::ACL_PUBLIC_READ,
    $lifetime,
    $maxFileSize,
    201, // Or a URL to redirect to on success
    $metaHeaders,
    $requestHeaders,
    false // False since we're not using flash
);*/

$uploadURL = 'https://' . $bucket . '.sfo2.digitaloceanspaces.com/';
