<?php
        try {
                    $result = $spaces->putObject([
                              'Bucket' => $spacesBucket,
                              'Key'    => $spacesRootFolder.'/videos/'.$videoNewName,
                              'Body'   => fopen($videoTemp, 'r'),
                              'ContentType' => $videoTypeExplode[0].'/'.$videoExtention,
                              'ACL'    => 'public-read'
                    ]);
          } catch (S3Exception $e) {
                    echo $e->getMessage() . "\n";
          }