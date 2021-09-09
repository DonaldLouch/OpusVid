<?php
    class Settings extends MySQL {
        //Website Settings

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
        
        public function customEmail() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 7');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }

        public function baseFileURL() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 9');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }
       
        public function uploadBaseURL() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 10');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }
       
        public function maxSizeVideo() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 11');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }

        public function maxSizeThumbnail() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 12');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }
        public function maxSizeAvatar() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 13');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }
        
        public function captchaSite() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 14');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }

        public function captchaSecret() {
            $stmt = $this->connect()->query('SELECT * FROM settings WHERE settingOrder = 15');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['settingValue'];
                return $settingValue;
            }
        }
        
        //CSS Style Settings

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

        public function cssDarkGreyColour() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 7');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssRedColour() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 8');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssGreenColour() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 9');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
 
        public function cssMainGradient() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 10');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
  
        public function cssBackgroundGradient() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 11');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssBlackGradient() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 12');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssWhiteGradient() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 13');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssModalGradient() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 14');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssBlurredBackground() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 15');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
  
        public function cssMainFont() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 16');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
  
        public function cssSecondaryFont() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 17');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssCodeFont() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 18');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
 
        public function cssMainBoxShadow() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 19');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssSecondaryBoxShadow() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 20');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssTertiaryBoxShadow() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 21');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssNavBoxShadow() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 22');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

            //Dark Mode CSS Style Settings

        public function cssDarkPrimaryColour() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 23');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
        
        public function cssDarkSecondaryColour() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 24');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
        
        public function cssDarkTertiaryColour() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 25');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
      
        public function cssDarkBlackColour() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 26');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
   
        public function cssDarkWhiteColour() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 27');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
 
        public function cssDark1GreyColour() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 28');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssDarkDarkGreyColour() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 29');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssDarkRedColour() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 30');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssDarkGreenColour() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 31');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
 
        public function cssDarkMainGradient() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 32');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
  
        public function cssDarkBackgroundGradient() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 33');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssDarkBlackGradient() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 34');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssDarkWhiteGradient() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 35');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssDarkModalGradient() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 36');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssDarkBlurredBackground() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 37');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }
  
        public function cssDarkMainBoxShadow() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 38');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssDarkSecondaryBoxShadow() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 39');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssDarkTertiaryBoxShadow() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 40');

            while ($row = $stmt->fetch()) {
                $settingValue = $row['styleValue'];
                return $settingValue;
            }
        }

        public function cssDarkNavBoxShadow() {
            $stmt = $this->connect()->query('SELECT * FROM styles WHERE styleOrder = 41');

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
                    if ($row['settingOrder'] == 8) {
                        //Don't Display Terms of Service
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

        public function updateWebsite($siteURL, $websiteName, $siteDescription, $siteKeywords, $timeZone, $supportEmail, $customEmail, $baseFileURL, $uploadBaseURL, $maxSizeVideo, $maxSizeThumbnail, $maxSizeAvatar, $captchaSite, $captchaSecret) {
            $this->url = $siteURL;
            $this->name = $websiteName;
            $this->description = $siteDescription;
            $this->keywords = $siteKeywords;
            $this->zone = $timeZone;
            $this->email = $supportEmail;
            $this->cEmail = $customEmail;
            $this->bfURL = $baseFileURL;
            $this->ubURL = $uploadBaseURL;
            $this->msVideo = $maxSizeVideo;
            $this->msThumbnail = $maxSizeThumbnail;
            $this->maxSizeAvatar = $maxSizeAvatar;
            $this->cSite = $captchaSite;
            $this->cSecert = $captchaSecret;

            $stmt = $this->connect()->prepare('UPDATE settings SET settingValue = (CASE WHEN settingName = "Site URL" THEN ? WHEN settingName = "Site Name" THEN ? WHEN settingName = "Site Description" THEN ? WHEN settingName = "Site Keywords" THEN ? WHEN settingName = "Time Location" THEN ? WHEN settingName = "Support Email" THEN ? WHEN settingName = "Custom Email" THEN ? WHEN settingName = "Base File URL" THEN ? WHEN settingName = "Upload Base URL" THEN ? WHEN settingName = "Max Video Upload Size" THEN ? WHEN settingName = "Max Thumbnail Upload Size" THEN ? WHEN settingName = "Max Avatar Upload Size" THEN ? WHEN settingName = "Google Captcha Site Key" THEN ? WHEN settingName = "Google Captcha Secret Key" THEN ?  END)');
            $stmt->execute([$siteURL, $websiteName, $siteDescription, $siteKeywords, $timeZone, $supportEmail, $customEmail, $baseFileURL, $uploadBaseURL, $maxSizeVideo, $maxSizeThumbnail, $maxSizeAvatar, $captchaSite, $captchaSecret]); 

            $false = "false";
            $true = "true";            
            
            if ($stmt->rowCount()) {
                return $true;
            } else {
                return $false;
            }
        }

        public function updateCSS($cssPrimaryColour, $cssSecondaryColour, $cssTertiaryColour, $cssBlackColour, $cssWhiteColour, $cssGreyColour, $cssDarkGreyColour, $cssRedColour, $cssGreenColour, $cssMainGradient, $cssBackgroundGradient, $cssBlackGradient, $cssWhiteGradient, $cssModalGradient, $cssBlurredBackground, $cssMainFont, $cssSecondaryFont, $cssCodeFont, $cssMainBoxShadow, $cssSecondaryBoxShadow, $cssTertiaryBoxShadow, $cssNavBoxShadow, $cssDarkPrimaryColour, $cssDarkSecondaryColour, $cssDarkTertiaryColour, $cssDarkBlackColour, $cssDarkWhiteColour, $cssDark1GreyColour, $cssDarkDarkGreyColour, $cssDarkRedColour, $cssDarkGreenColour, $cssDarkMainGradient, $cssDarkBackgroundGradient, $cssDarkBlackGradient, $cssDarkModalGradient, $cssDarkBlurredBackground, $cssDarkWhiteGradient, $cssDarkMainBoxShadow, $cssDarkSecondaryBoxShadow, $cssDarkTertiaryBoxShadow, $cssDarkNavBoxShadow){   
            $this->primaryC = $cssPrimaryColour;
            $this->secondC = $cssSecondaryColour;
            $this->thirdC = $cssTertiaryColour;
            $this->blackC = $cssBlackColour;
            $this->whiteC = $cssWhiteColour;
            $this->greyC = $cssGreyColour;
            $this->darkGreyC = $cssDarkGreyColour;
            $this->redC = $cssRedColour;
            $this->greenC = $cssGreenColour;
            $this->mainG = $cssMainGradient;
            $this->backgroundG = $cssBackgroundGradient;
            $this->blackG = $cssBlackGradient;
            $this->whiteG = $cssWhiteGradient;
            $this->modalG = $cssModalGradient; 
            $this->blurredBG = $cssBlurredBackground;
            $this->mainF = $cssMainFont;
            $this->secondF = $cssSecondaryFont;
            $this->codeF = $cssCodeFont;
            $this->mainBS = $cssMainBoxShadow;
            $this->secondBS = $cssSecondaryBoxShadow;
            $this->thirdBS = $cssTertiaryBoxShadow;
            $this->navBS = $cssNavBoxShadow;
            $this->primaryDC = $cssDarkPrimaryColour;
            $this->secondDC = $cssDarkSecondaryColour;
            $this->thirdDC = $cssDarkTertiaryColour;
            $this->blackDC = $cssDarkBlackColour;
            $this->whiteDC = $cssDarkWhiteColour;
            $this->greyDC = $cssDark1GreyColour;
            $this->darkGreyDC = $cssDarkDarkGreyColour;
            $this->redDC = $cssDarkRedColour;
            $this->greenDC = $cssDarkGreenColour;
            $this->mainDG = $cssDarkMainGradient;
            $this->backgroundDG = $cssDarkBackgroundGradient;
            $this->blackDG = $cssDarkBlackGradient;
            $this->whiteDG = $cssDarkWhiteGradient;
            $this->modalDG = $cssDarkModalGradient; 
            $this->blurredDBG = $cssDarkBlurredBackground;
            $this->mainDBS = $cssDarkMainBoxShadow;
            $this->secondDBS = $cssDarkSecondaryBoxShadow;
            $this->thirdDBS = $cssDarkTertiaryBoxShadow;
            $this->navDBS = $cssDarkNavBoxShadow;
            
            $stmt = $this->connect()->prepare('UPDATE styles SET styleValue = (
                CASE 
                    WHEN styleName = "primaryColour" THEN ?
                    WHEN styleName = "secondaryColour" THEN ? 
                    WHEN styleName = "tertiaryColour" THEN ? 
                    WHEN styleName = "blackColour" THEN ? 
                    WHEN styleName = "whiteColour" THEN ? 
                    WHEN styleName = "greyColour" THEN ? 
                    WHEN styleName = "darkGreyColour" THEN ? 
                    WHEN styleName = "redColour" THEN ? 
                    WHEN styleName = "greenColour" THEN ? 
                    WHEN styleName = "mainGradient" THEN ? 
                    WHEN styleName = "backgroundGradient" THEN ? 
                    WHEN styleName = "blackGradient" THEN ? 
                    WHEN styleName = "whiteGradient" THEN ? 
                    WHEN styleName = "modalGradient" THEN ? 
                    WHEN styleName = "blurredBackground" THEN ? 
                    WHEN styleName = "mainFont" THEN ? 
                    WHEN styleName = "secondaryFont" THEN ? 
                    WHEN styleName = "codeFont" THEN ? 
                    WHEN styleName = "mainBoxShadow" THEN ? 
                    WHEN styleName = "secondaryBoxShadow" THEN ? 
                    WHEN styleName = "tertiaryBoxShadow" THEN ? 
                    WHEN styleName = "navBoxShadow" THEN ? 
                    WHEN styleName = "darkPrimaryColour" THEN ? 
                    WHEN styleName = "darkSecondaryColour" THEN ? 
                    WHEN styleName = "darkTertiaryColour" THEN ? 
                    WHEN styleName = "darkBlackColour" THEN ?
                    WHEN styleName = "darkWhiteColour" THEN ? 
                    WHEN styleName = "darkGreyColour" THEN ? 
                    WHEN styleName = "darkDarkGreyColour" THEN ? 
                    WHEN styleName = "darkRedColour" THEN ? 
                    WHEN styleName = "darkGreenColour" THEN ? 
                    WHEN styleName = "darkMainGradient" THEN ? 
                    WHEN styleName = "darkBackgroundGradient" THEN ? 
                    WHEN styleName = "darkBlackGradient" THEN ? 
                    WHEN styleName = "darkWhiteGradient" THEN ? 
                    WHEN styleName = "darkModalGradient" THEN ? 
                    WHEN styleName = "darkBlurredBackground" THEN ? 
                    WHEN styleName = "darkMainBoxShadow" THEN ? 
                    WHEN styleName = "darkSecondaryBoxShadow" THEN ? 
                    WHEN styleName = "darkTertiaryBoxShadow" THEN ? 
                    WHEN styleName = "darkNavBoxShadow" THEN ? 
                END
            )');
            $stmt->execute([$cssPrimaryColour, $cssSecondaryColour, $cssTertiaryColour, $cssBlackColour, $cssWhiteColour, $cssGreyColour, $cssDarkGreyColour, $cssRedColour, $cssGreenColour, $cssMainGradient, $cssBackgroundGradient, $cssBlackGradient, $cssWhiteGradient, $cssModalGradient, $cssBlurredBackground, $cssMainFont, $cssSecondaryFont, $cssCodeFont, $cssMainBoxShadow, $cssSecondaryBoxShadow, $cssTertiaryBoxShadow, $cssNavBoxShadow, $cssDarkPrimaryColour, $cssDarkSecondaryColour, $cssDarkTertiaryColour, $cssDarkBlackColour, $cssDarkWhiteColour, $cssDark1GreyColour, $cssDarkDarkGreyColour, $cssDarkRedColour, $cssDarkGreenColour, $cssDarkMainGradient, $cssDarkBackgroundGradient, $cssDarkBlackGradient, $cssDarkWhiteGradient, $cssDarkModalGradient, $cssDarkBlurredBackground, $cssDarkMainBoxShadow, $cssDarkSecondaryBoxShadow, $cssDarkTertiaryBoxShadow, $cssDarkNavBoxShadow]);

            $false = "false";
            $true = "true";            
            
            if ($stmt->rowCount()) {
                return $true;
            } else {
                return $false;
            }
        }

        public function getTerms() {
            $stmt = $this->connect()->prepare('SELECT * FROM settings WHERE settingOrder = 8');
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