<?php
          try {
                    $result = $spaces->putObject([
                              'Bucket' => $spacesBucket,
                              'Key'    => $spacesRootFolder.'/avatar/'.$avatarNewName,
                              'Body'   => fopen($avatarTemp, 'r'),
                              'ContentType' => $avatarTypeExplode[0].'/'.$avatarExtention[1],
                              'ACL'    => 'public-read'
                    ]);
          } catch (S3Exception $e) {
                    echo $e->getMessage() . "\n";
          }