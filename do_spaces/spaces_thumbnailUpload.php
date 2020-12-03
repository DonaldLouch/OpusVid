<?php
          try {
                    $result = $spaces->putObject([
                              'Bucket' => $spacesBucket,
                              'Key'    => $spacesRootFolder.'/thumbnails/'.$thumbNewName,
                              'Body'   => fopen($thumbTemp, 'r'),
                              'ContentType' => $thumbTypeExplode[0].'/'.$thumbExtention[1],
                              'ACL'    => 'public-read'
                    ]);
          } catch (S3Exception $e) {
                    echo $e->getMessage() . "\n";
          }