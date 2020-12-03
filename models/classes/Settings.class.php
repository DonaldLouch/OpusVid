<?php
    class Settings extends MySQL {
        public function siteURL() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 1');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }

        public function websiteName() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 2');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }

        public function siteDescription() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 3');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }

        public function siteKeywords() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 4');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }

        public function timeZone() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 5');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }
        
        public function supportEmail() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 6');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }
        
        public function spacesKey() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 7');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }
       
        public function spacesSecert() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 8');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }
       
        public function spacesBucket() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 9');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }
        
        public function spacesRegion() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 10');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }
       
        public function spacesEndpoint() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 11');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }

         public function spacesURIRegion() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 12');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }

         public function spacesURL() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 13');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }

         public function spacesRootFolder() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 14');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }

        public function baseFileURL() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 15');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }
       
        public function captchaSite() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 16');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }
       
        public function captchaSecret() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 17');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }
        
        public function cssPrimaryColour() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 1');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
        
        public function cssSecondaryColour() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 2');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
        
        public function cssTertiaryColour() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 3');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
      
        public function cssBlackColour() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 4');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
   
        public function cssWhiteColour() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 5');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
 
        public function cssGreyColour() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 6');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
 
        public function cssMainGradient() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 7');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
  
        public function cssBackgroundGradient() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 8');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssBlackGradient() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 9');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssWhiteGradient() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 10');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
  
        public function cssMainFont() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 11');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
  
        public function cssSecondaryFont() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 12');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
 
        public function cssMainBoxShadow() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 13');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssSecondaryBoxShadow() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 14');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssTertiaryBoxShadow() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 15');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
        
        public function getSettings() {
            $statement = $this->connect()->prepare('SELECT * FROM settings');
            
            $statement->execute();
            
            $result = $statement->fetchAll();
            $number_of_rows = $statement->rowCount();
            
            $output = '';
            
            if($number_of_rows > 0) {
                $count = 0;
                foreach($result as $row) {
                    $count ++; 
                    if ($row['settingOrder'] == 18) {
                        $output .= '';
                    } else {
                        $output .= '
                        <div class="field card">
                            <input type="text" name="'.$row['settingOrder'].'" id="'.$row['settingOrder'].'" placeholder="'.$row['settingName'].'" value="'.$row['settingValue'].'">
                            <label for="'.$row['settingOrder'].'"><span class="required">*</span>'.$row['settingName'].'</label>
                            ';
                        if (isset($row['settingDefault'])) {
                            $output .= '   
                                <p>Defult Setting: '.$row['settingDefault'].'</p>';
                        }
                        $output .= '
                        </div>
                        ';
                    }
                }
            } else {
                $output .= '
                <h3>No Data Found</h3>
                ';
            }
            echo $output;
        }

        public function getCSS() {
            $statement = $this->connect()->prepare('SELECT * FROM styles');
            
            $statement->execute();
            
            $result = $statement->fetchAll();
            $number_of_rows = $statement->rowCount();
            
            $output = '';
            
            if($number_of_rows > 0) {
                $count = 0;
                foreach($result as $row) {
                    $count ++; 
                    $output .= '
                        <div class="field card">
                            <input type="text" name="'.$row['styleOrder'].'" id="'.$row['styleOrder'].'" placeholder="'.$row['styleName'].'" value="'.$row['styleValue'].'">
                            <label for="'.$row['styleOrder'].'"><span class="required">*</span>'.$row['styleName'].'</label>
                            ';
                        if (isset($row['styleDefault'])) {
                            $output .= '   
                                <p>Defult Setting: '.$row['styleDefault'].'</p>';
                        }
                        $output .= '
                        </div>
                        ';
                }
            } else {
                $output .= '
                <h3>No Data Found</h3>
                ';
            }
            echo $output;
        }

        public function updateWebsite($siteURL, $websiteName, $siteDescription, $siteKeywords, $timeZone, $supportEmail, $spacesKey, $spacesSecert, $spacesBucket, $spacesRegion, $spacesEndpoint, $spacesURIRegion, $spacesURL, $spacesRootFolder, $baseFileURL, $captchaSite, $captchaSecret) {
            $this->url = $siteURL;
            $this->name = $websiteName;
            $this->description = $siteDescription;
            $this->keywords = $siteKeywords;
            $this->zone = $timeZone;
            $this->email = $supportEmail;
            $this->key = $spacesKey;
            $this->sSecert = $spacesSecert;
            $this->bucket = $spacesBucket;
            $this->region = $spacesRegion;
            $this->endpoint = $spacesEndpoint;
            $this->urlRegion = $spacesURIRegion;
            $this->sURL = $spacesURL;
            $this->root = $spacesRootFolder;
            $this->bfURL = $baseFileURL;
            $this->cSite = $captchaSite;
            $this->cSecert = $captchaSecret;
            
            $stmt = $this->connect()->prepare('UPDATE settings SET settingValue = (CASE WHEN settingName = "Site URL" THEN ? WHEN settingName = "Site Name" THEN ? WHEN settingName = "Site Description" THEN ? WHEN settingName = "Site Keywords" THEN ? WHEN settingName = "Time Location" THEN ? WHEN settingName = "Support Email" THEN ? WHEN settingName = "Spaces Key" THEN ? WHEN settingName = "Spaces Secret" THEN ? WHEN settingName = "Spaces Bucket" THEN ? WHEN settingName = "Spaces Region" THEN ? WHEN settingName = "Spaces Endpoint" THEN ? WHEN settingName = "Spaces URI Region" THEN ? WHEN settingName = "Spaces URL" THEN ? WHEN settingName = "Spaces Root Folder" THEN ? WHEN settingName = "Base File URL" THEN ? WHEN settingName = "Google Captcha Site Key" THEN ? WHEN settingName = "Google Captcha Secret Key" THEN ?  END)');
            $stmt->execute([$siteURL, $websiteName, $siteDescription, $siteKeywords, $timeZone, $supportEmail, $spacesKey, $spacesSecert, $spacesBucket, $spacesRegion, $spacesEndpoint, $spacesURIRegion, $spacesURL, $spacesRootFolder, $baseFileURL, $captchaSite, $captchaSecret]); 

            $false = "false";
            $true = "true";            
            
            if ($stmt->rowCount()) {
                return $true;
            } else {
                return $false;
            }
        }

        public function updateCSS($cssPrimaryColour, $cssSecondaryColour, $cssTertiaryColour, $cssBlackColour, $cssWhiteColour, $cssGreyColour, $cssMainGradient, $cssBackgroundGradient, $cssBlackGradient, $cssWhiteGradient, $cssMainFont, $cssSecondaryFont, $cssMainBoxShadow, $cssSecondaryBoxShadow, $cssTertiaryBoxShadow){   
            $this->primaryC = $cssPrimaryColour;
            $this->secondC = $cssSecondaryColour;
            $this->thirdC = $cssTertiaryColour;
            $this->blackC = $cssBlackColour;
            $this->whiteC = $cssWhiteColour;
            $this->greyC = $cssGreyColour;
            $this->mainG = $cssMainGradient;
            $this->backgroundG = $cssBackgroundGradient;
            $this->blackG = $cssBlackGradient;
            $this->whiteG = $cssWhiteGradient;
            $this->mainF = $cssMainFont;
            $this->secondF = $cssSecondaryFont;
            $this->mainBS = $cssMainBoxShadow;
            $this->secondBS = $cssSecondaryBoxShadow;
            $this->thirdBS = $cssTertiaryBoxShadow;

            $stmt = $this->connect()->prepare('UPDATE styles SET styleValue = (CASE WHEN styleName = "primaryColour" THEN ? WHEN styleName = "secondaryColour" THEN ? WHEN styleName = "tertiaryColour" THEN ? WHEN styleName = "blackColour" THEN ? WHEN styleName = "whiteColour" THEN ? WHEN styleName = "greyColour" THEN ? WHEN styleName = "mainGradient" THEN ? WHEN styleName = "backgroundGradient" THEN ? WHEN styleName = "blackGradient" THEN ? WHEN styleName = "whiteGradient" THEN ? WHEN styleName = "mainFont" THEN ? WHEN styleName = "secondaryFont" THEN ? WHEN styleName = "mainBoxShadow" THEN ? WHEN styleName = "secondaryBoxShadow" THEN ? WHEN styleName = "tertiaryBoxShadow" THEN ? END)');
            $stmt->execute([$cssPrimaryColour, $cssSecondaryColour, $cssTertiaryColour, $cssBlackColour, $cssWhiteColour, $cssGreyColour, $cssMainGradient, $cssBackgroundGradient, $cssBlackGradient, $cssWhiteGradient, $cssMainFont, $cssSecondaryFont, $cssMainBoxShadow, $cssSecondaryBoxShadow, $cssTertiaryBoxShadow]);

            $false = "false";
            $true = "true";            
            
            if ($stmt->rowCount()) {
                return $true;
            } else {
                return $false;
            }
        }

        public function getTerms() {
            $stmt = $this->connect()->prepare('SELECT * FROM settings WHERE settingOrder = 18');
            $stmt->execute();

            $terms = $stmt->fetch();

            return $terms;
        }

        public function updateTerms($termUpdate) {
            $this->terms = $termUpdate;

            $stmt = $this->connect()->prepare('UPDATE settings SET settingValue=?  WHERE settingName = "Terms of Service"');
            $stmt->execute([$termUpdate]);
        }
    }