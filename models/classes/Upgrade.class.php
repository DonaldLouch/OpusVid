<?php 
class Upgrade extends MySQL {		
    public function removeTables() {
        $removeTable = $this->connect()->prepare('DROP TABLE collections');
        $removeTable->execute();

        $removeTable = $this->connect()->prepare('DROP TABLE following');
        $removeTable->execute();

        $removeTable = $this->connect()->prepare('DROP TABLE mail');
        $removeTable->execute();

        $removeTable = $this->connect()->prepare('DROP TABLE watch_later');
        $removeTable->execute();
    }

    public function upgradeSettings() {
        $fetchSettings = $this->connect()->prepare('SELECT * FROM settings ORDER BY settingOrder ASC');
        $fetchSettings->execute();

        $settingResults = $fetchSettings->fetchAll();
        $number_of_rows = $fetchSettings->rowCount();

        foreach ($settingResults as $settingKey=>$setting) {
            if ($settingKey == 17) {
                $newTermsID = 8;
                $newTermName =$setting['settingName'];
                $newTermValue = $setting['settingValue'];
                $newTermDefault = $setting['settingDefault'];
                
                $updateTerms = $this->connect()->prepare('UPDATE settings SET settingName=?, settingValue=?, settingDefault=? WHERE settingOrder=?');
                $updateTerms->execute([$newTermName, $newTermValue, $newTermDefault, $newTermsID]);
            } 
            
            if ($settingKey == 14) {
                $newBaseFileID = 9;
                $newBaseFileName =$setting['settingName'];
                $newBaseFileValue = $setting['settingValue'];
                $newBaseFileDefault = $setting['settingDefault'];
                $updateTerms = $this->connect()->prepare('UPDATE settings SET settingName=?, settingValue=?, settingDefault=? WHERE settingOrder=?');
                $updateTerms->execute([$newBaseFileName, $newBaseFileValue, $newBaseFileDefault, $newBaseFileID]);
            }

            if ($settingKey == 15) {
                $newGoogleSiteID = 14;
                $newGoogleSiteName =$setting['settingName'];
                $newGoogleSiteValue = $setting['settingValue'];
                $newGoogleSiteDefault = $setting['settingDefault'];
                $updateTerms = $this->connect()->prepare('UPDATE settings SET settingName=?, settingValue=?, settingDefault=? WHERE settingOrder=?');
                $updateTerms->execute([$newGoogleSiteName, $newGoogleSiteValue, $newGoogleSiteDefault, $newGoogleSiteID]);
            }

            if ($settingKey == 16) {
                $newGoogleSecertID = 15;
                $newGoogleSecertName =$setting['settingName'];
                $newGoogleSecertValue = $setting['settingValue'];
                $newGoogleSecertDefault = $setting['settingDefault'];
                $updateTerms = $this->connect()->prepare('UPDATE settings SET settingName=?, settingValue=?, settingDefault=? WHERE settingOrder=?');
                $updateTerms->execute([$newGoogleSecertName, $newGoogleSecertValue, $newGoogleSecertDefault, $newGoogleSecertID]);
            } 
        } // $settings

        $newCustomEmail= "Custom Email";
        $orderNumberEmail= 7;
        $newCustomEmailText = "support@example.com";
        $addEmail = $this->connect()->prepare('UPDATE settings SET settingName=?, settingValue=?, settingDefault=? WHERE settingOrder=?');
        $addEmail->execute([$newCustomEmail, $newCustomEmailText, $newCustomEmailText, $orderNumberEmail]);

        $newUploadBase= "Upload Base URL";
        $orderNumberBase= 10;
        $newUploadBaseText = "../../../storage";
        $addUploadBase = $this->connect()->prepare('UPDATE settings SET settingName=?, settingValue=?, settingDefault=? WHERE settingOrder=?');
        $addUploadBase->execute([$newUploadBase, $newUploadBaseText, $newUploadBaseText, $orderNumberBase]);

        $newMaxVideo= "Max Video Upload Size";
        $orderNumberVideo= 11;
        $newMaxVideoText = "2gb";
        $addMaxVideo = $this->connect()->prepare('UPDATE settings SET settingName=?, settingValue=?, settingDefault=? WHERE settingOrder=?');
        $addMaxVideo->execute([$newMaxVideo, $newMaxVideoText, $newMaxVideoText, $orderNumberVideo]);

        $newMaxThumb= "Max Thumbnail Upload Size";
        $orderNumberThumb= 12;
        $newMaxThumbText = "50mb";
        $addMaxThumb = $this->connect()->prepare('UPDATE settings SET settingName=?, settingValue=?, settingDefault=? WHERE settingOrder=?');
        $addMaxThumb->execute([$newMaxThumb, $newMaxThumbText, $newMaxThumbText, $orderNumberThumb]);

        $newMaxAvatar= "Max Avatar Upload Size";
        $orderNumberAvatar= 13;
        $newMaxAvatarText = "50mb";
        $addMaxAvatar = $this->connect()->prepare('UPDATE settings SET settingName=?, settingValue=?, settingDefault=? WHERE settingOrder=?');
        $addMaxAvatar->execute([$newMaxAvatar, $newMaxAvatarText, $newMaxAvatarText, $orderNumberAvatar]); 

        $deleteRows = $this->connect()->prepare('DELETE FROM settings WHERE settingOrder=?');
		$deleteRows->execute([16]);

        $deleteRows = $this->connect()->prepare('DELETE FROM settings WHERE settingOrder=?');
		$deleteRows->execute([17]);

        $deleteRows = $this->connect()->prepare('DELETE FROM settings WHERE settingOrder=?');
		$deleteRows->execute([18]);
    } //upgradeSettings

    public function upgradeStyles() {
        $fetchStyles = $this->connect()->prepare('SELECT * FROM styles ORDER BY styleOrder ASC');
        $fetchStyles->execute();

        $styleResults = $fetchStyles->fetchAll();
        $number_of_rows = $fetchStyles->rowCount();

        foreach ($styleResults as $styleKey=>$style) {
            if ($styleKey == 6) {
                $newStyleID = 10;
                $styleName =$style['styleName'];
                $styleValue = $style['styleValue'];
                $styleDefault = $style['styleDefault'];
                
                $updateStyles = $this->connect()->prepare('UPDATE styles SET styleName=?, styleValue=?, styleDefault=? WHERE styleOrder=?');
                $updateStyles->execute([$styleName, $styleValue, $styleDefault, $newStyleID]);
            } 
            if ($styleKey == 7) {
                $newStyleID = 11;
                $styleName =$style['styleName'];
                $styleValue = $style['styleValue'];
                $styleDefault = $style['styleDefault'];
                
                $updateStyles = $this->connect()->prepare('UPDATE styles SET styleName=?, styleValue=?, styleDefault=? WHERE styleOrder=?');
                $updateStyles->execute([$styleName, $styleValue, $styleDefault, $newStyleID]);
            } 
            if ($styleKey == 8) {
                $newStyleID = 12;
                $styleName =$style['styleName'];
                $styleValue = $style['styleValue'];
                $styleDefault = $style['styleDefault'];
                
                $updateStyles = $this->connect()->prepare('UPDATE styles SET styleName=?, styleValue=?, styleDefault=? WHERE styleOrder=?');
                $updateStyles->execute([$styleName, $styleValue, $styleDefault, $newStyleID]);
            } 
            if ($styleKey == 9) {
                $newStyleID = 13;
                $styleName =$style['styleName'];
                $styleValue = $style['styleValue'];
                $styleDefault = $style['styleDefault'];
                
                $updateStyles = $this->connect()->prepare('UPDATE styles SET styleName=?, styleValue=?, styleDefault=? WHERE styleOrder=?');
                $updateStyles->execute([$styleName, $styleValue, $styleDefault, $newStyleID]);
            } 

             if ($styleKey == 10) {
                $newMainFontStyleID = 16;
                $styleMainFontName =$style['styleName'];
                $styleMainFontValue = "Poppins";
                $styleMainFontDefault = "Poppins";
                
                $updateMainFontStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
                $updateMainFontStyles->execute([$newMainFontStyleID, $styleMainFontName, $styleMainFontValue, $styleMainFontDefault]);
            } 

             if ($styleKey == 11) {
                $newSecondaryFontStyleID = 17;
                $styleSecondaryFontName =$style['styleName'];
                $styleSecondaryFontValue = "Playfair Display";
                $styleSecondaryFontDefault = "Playfair Display";
                
                $updateSecondaryFontStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
                $updateSecondaryFontStyles->execute([$newSecondaryFontStyleID, $styleSecondaryFontName, $styleSecondaryFontValue, $styleSecondaryFontDefault]);
            } 

            if ($styleKey == 12) {
                $newMainBoxShadowStyleID = 19;
                $styleMainBoxShadowName =$style['styleName'];
                $styleMainBoxShadowValue = $style['styleValue'];
                $styleMainBoxShadowDefault = $style['styleDefault'];

                $updateMainBoxShadowStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
                $updateMainBoxShadowStyles->execute([$newMainBoxShadowStyleID, $styleMainBoxShadowName, $styleMainBoxShadowValue, $styleMainBoxShadowDefault]);
            } 

            if ($styleKey == 13) {
                $newSecondaryBoxShadowStyleID = 20;
                $styleSecondaryBoxShadowName =$style['styleName'];
                $styleSecondaryBoxShadowValue = $style['styleValue'];
                $styleSecondaryBoxShadowDefault = $style['styleDefault'];

                $updateSecondaryBoxShadowStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
                $updateSecondaryBoxShadowStyles->execute([$newSecondaryBoxShadowStyleID, $styleSecondaryBoxShadowName, $styleSecondaryBoxShadowValue, $styleSecondaryBoxShadowDefault]);
            } 

            if ($styleKey == 14) {
                $newTertiaryBoxShadowStyleID = 21;
                $styleTertiaryBoxShadowName =$style['styleName'];
                $styleTertiaryBoxShadowValue = $style['styleValue'];
                $styleTertiaryBoxShadowDefault = $style['styleDefault'];

                $updateTertiaryBoxShadowStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
                $updateTertiaryBoxShadowStyles->execute([$newTertiaryBoxShadowStyleID, $styleTertiaryBoxShadowName, $styleTertiaryBoxShadowValue, $styleTertiaryBoxShadowDefault]);
            } 
        } // $styles

        $darkGreyColourID = 7;
        $darkGreyColourName = "darkGreyColour";
        $darkGreyColourText = "#d2d2d2";
        $darkGreyColourStyles = $this->connect()->prepare('UPDATE styles SET styleName=?, styleValue=?, styleDefault=? WHERE styleOrder=?');
        $darkGreyColourStyles->execute([$darkGreyColourName, $darkGreyColourText, $darkGreyColourText, $darkGreyColourID]);

        $redColourID = 8;
        $redColourName = "redColour";
        $redColourText = "#990000";
        $redColourStyles = $this->connect()->prepare('UPDATE styles SET styleName=?, styleValue=?, styleDefault=? WHERE styleOrder=?');
        $redColourStyles->execute([$redColourName, $redColourText, $redColourText, $redColourID]);

        $greenColourID = 9;
        $greenColourName = "greenColour";
        $greenColourText = "#69B131";
        $greenColourStyles = $this->connect()->prepare('UPDATE styles SET styleName=?, styleValue=?, styleDefault=? WHERE styleOrder=?');
        $greenColourStyles->execute([$greenColourName, $greenColourText, $greenColourText, $greenColourID]);

        $modalGradientID = 14;
        $modalGradientName = "modalGradient";
        $modalGradientText = "rgba(0,0,0,0.8)";
        $modalGradientStyles = $this->connect()->prepare('UPDATE styles SET styleName=?, styleValue=?, styleDefault=? WHERE styleOrder=?');
        $modalGradientStyles->execute([$modalGradientName, $modalGradientText, $modalGradientText, $modalGradientID]);

        $blurredBackgroundID = 15;
        $blurredBackgroundName = "blurredBackground";
        $blurredBackgroundText = "rgba(237 237 237 / 15%)";
        $blurredBackgroundStyles = $this->connect()->prepare('UPDATE styles SET styleName=?, styleValue=?, styleDefault=? WHERE styleOrder=?');
        $blurredBackgroundStyles->execute([$blurredBackgroundName, $blurredBackgroundText, $blurredBackgroundText, $blurredBackgroundID]);

        $codeFontID = 18;
        $codeFontName = "codeFont";
        $codeFontText = "Source Code Pro";
        $codeFontStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
        $codeFontStyles->execute([$codeFontID, $codeFontName, $codeFontText, $codeFontText]);

        $navBoxShadowID = 22;
        $navBoxShadowName= "navBoxShadow";
        $navBoxShadowText = "0px 10px 1px rgba(26, 9, 66, 0)";
        $navBoxShadowStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
        $navBoxShadowStyles->execute([$navBoxShadowID, $navBoxShadowName, $navBoxShadowText, $navBoxShadowText]);

        $darkPrimaryColourID = 23;
        $darkPrimaryColourName = "darkPrimaryColour";
        $darkPrimaryColourText = "#ededed";
        $darkPrimaryColourStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
        $darkPrimaryColourStyles->execute([$darkPrimaryColourID, $darkPrimaryColourName, $darkPrimaryColourText, $darkPrimaryColourText]);

        $darkSecondaryColourID = 24;
        $darkSecondaryColourName = "darkSecondaryColour";
        $darkSecondaryColourText = "#e57373";
        $darkSecondaryColourStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
        $darkSecondaryColourStyles->execute([$darkSecondaryColourID, $darkSecondaryColourName, $darkSecondaryColourText, $darkSecondaryColourText]);

        $darkTertiaryColourID = 25;
        $darkTertiaryColourName = "darkTertiaryColour";
        $darkTertiaryColourText = "#ededed";
        $darkTertiaryColourStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
        $darkTertiaryColourStyles->execute([$darkTertiaryColourID, $darkTertiaryColourName, $darkTertiaryColourText, $darkTertiaryColourText]);

        $darkBlackColourID = 26;
        $darkBlackColourName = "darkBlackColour";
        $darkBlackColourText = "#ededed";
        $darkBlackColourStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
        $darkBlackColourStyles->execute([$darkBlackColourID, $darkBlackColourName, $darkBlackColourText, $darkBlackColourText]);

        $darkWhiteColourID = 27;
        $darkWhiteColourName = "darkWhiteColour";
        $darkWhiteColourText = "#ededed";
        $darkWhiteColourStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
        $darkWhiteColourStyles->execute([$darkWhiteColourID, $darkWhiteColourName, $darkWhiteColourText, $darkWhiteColourText]);

        $darkDarkGreyColourID = 28;
        $darkDarkGreyColourName = "darkGreyColour";
        $darkDarkGreyColourText = "#d2d2d2";
        $darkDarkGreyColourStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
        $darkDarkGreyColourStyles->execute([$darkDarkGreyColourID, $darkDarkGreyColourName, $darkDarkGreyColourText, $darkDarkGreyColourText]);

        $darkDarkDarkGreyColourID = 29;
        $darkDarkDarkGreyColourName = "darkDarkGreyColour";
        $darkDarkDarkGreyColourText = "#d2d2d2";
        $darkDarkDarkGreyColourStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
        $darkDarkDarkGreyColourStyles->execute([$darkDarkDarkGreyColourID, $darkDarkDarkGreyColourName, $darkDarkDarkGreyColourText, $darkDarkDarkGreyColourText]);

        $darkRedColourID = 30;
        $darkRedColourName = "darkRedColour";
        $darkRedColourText = "#990000";
        $darkRedColourStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
        $darkRedColourStyles->execute([$darkRedColourID, $darkRedColourName, $darkRedColourText, $darkRedColourText]);

        $darkGreenColourID = 31;
        $darkGreenColourName = "darkGreenColour";
        $darkGreenColourText = "#69B131";
        $darkGreenColourStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
        $darkGreenColourStyles->execute([$darkGreenColourID, $darkGreenColourName, $darkGreenColourText, $darkGreenColourText]);

        $darkMainGradientID = 32;
        $darkMainGradientName = "darkMainGradient";
        $darkMainGradientText = "#0F111B";
        $darkMainGradientStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
        $darkMainGradientStyles->execute([$darkMainGradientID, $darkMainGradientName, $darkMainGradientText, $darkMainGradientText]);

        $darkBackgroundGradientID = 33;
        $darkBackgroundGradientName = "darkBackgroundGradient";
        $darkBackgroundGradientText = "#0F111B";
        $darkBackgroundGradientStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
        $darkBackgroundGradientStyles->execute([$darkBackgroundGradientID, $darkBackgroundGradientName, $darkBackgroundGradientText, $darkBackgroundGradientText]);

        $darkBlackGradientID = 34;
        $darkBlackGradientName = "darkBlackGradient";
        $darkBlackGradientText = "#0F111B";
        $darkBlackGradientStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
        $darkBlackGradientStyles->execute([$darkBlackGradientID, $darkBlackGradientName, $darkBlackGradientText, $darkBlackGradientText]);

        $darkWhiteGradientID = 35;
        $darkWhiteGradientName = "darkWhiteGradient";
        $darkWhiteGradientText = "#0F111B";
        $darkWhiteGradientStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
        $darkWhiteGradientStyles->execute([$darkWhiteGradientID, $darkWhiteGradientName, $darkWhiteGradientText, $darkWhiteGradientText]);

        $darkModalGradientID = 36;
        $darkModalGradientName = "darkModalGradient";
        $darkModalGradientText = "#0F111B";
        $darkModalGradientStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
        $darkModalGradientStyles->execute([$darkModalGradientID, $darkModalGradientName, $darkModalGradientText, $darkModalGradientText]);

        $darkBlurredBackgroundID = 37;
        $darkBlurredBackgroundName = "darkBlurredBackground";
        $darkBlurredBackgroundText = "rgba(237 237 237 / 15%)";
        $darkBlurredBackgroundStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
        $darkBlurredBackgroundStyles->execute([$darkBlurredBackgroundID, $darkBlurredBackgroundName, $darkBlurredBackgroundText, $darkBlurredBackgroundText]);

        $darkMainBoxShadowID = 38;
        $darkMainBoxShadowName = "darkMainBoxShadow";
        $darkMainBoxShadowText = "1px 1px 5px 1px rgba(237, 237, 237, 0.4)";
        $darkMainBoxShadowStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
        $darkMainBoxShadowStyles->execute([$darkMainBoxShadowID, $darkMainBoxShadowName, $darkMainBoxShadowText, $darkMainBoxShadowText]);

        $darkSecondaryBoxShadowID = 39;
        $darkSecondaryBoxShadowName = "darkSecondaryBoxShadow";
        $darkSecondaryBoxShadowText = "1.5px 1.5px 5px 1px rgba(255, 145, 107, 0.4)";
        $darkSecondaryBoxShadowStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
        $darkSecondaryBoxShadowStyles->execute([$darkSecondaryBoxShadowID, $darkSecondaryBoxShadowName, $darkSecondaryBoxShadowText, $darkSecondaryBoxShadowText]);

        $darkTertiaryBoxShadowID = 40;
        $darkTertiaryBoxShadowName = "darkTertiaryBoxShadow";
        $darkTertiaryBoxShadowText = "3px 5px 20px 6px rgba(237, 237, 237, 0.2)";
        $darkTertiaryBoxShadowStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
        $darkTertiaryBoxShadowStyles->execute([$darkTertiaryBoxShadowID, $darkTertiaryBoxShadowName, $darkTertiaryBoxShadowText, $darkTertiaryBoxShadowText]);

        $darkNavBoxShadowID = 41;
        $darkNavBoxShadowName = "darkNavBoxShadow";
        $darkNavBoxShadowText = "0px 10px 1px rgba(26, 9, 66, 0)";
        $darkNavBoxShadowStyles = $this->connect()->prepare('INSERT INTO styles (styleOrder, styleName, styleValue, styleDefault) VALUES (?,?,?,?)');
        $darkNavBoxShadowStyles->execute([$darkNavBoxShadowID, $darkNavBoxShadowName, $darkNavBoxShadowText, $darkNavBoxShadowText]);
    } // upgradeStyles 

    public function addCategory() {
        $createTable = $this->connect()->prepare('CREATE TABLE category (catSortID INT( 11 ) AUTO_INCREMENT PRIMARY KEY, catName TEXT NULL, catSlug TEXT NULL, catIDName TEXT NULL, numberOfVideos INT( 11 ) NULL)');
        $createTable->execute();

        $vlogCatName = "Vlog";
        $vlogCatIDName = "vlogCat";
        $vlogAddCategory = $this->connect()->prepare('INSERT INTO category (catName, catSlug, catIDName) VALUES (?,?,?)');
        $vlogAddCategory->execute([$vlogCatName, $vlogCatName, $vlogCatName]);
        
        $lifeEventCatName = "Life/Event";
        $lifeEventCatIDName = "lifeEventCat";
        $lifeEventAddCategory = $this->connect()->prepare('INSERT INTO category (catName, catSlug, catIDName) VALUES (?,?,?)');
        $lifeEventAddCategory->execute([$lifeEventCatName, $lifeEventCatName, $lifeEventCatIDName]);
        
        $petAnimalsCatName = "Pet/Animals";
        $petAnimalsCatIDName = "petAnimalsCat";
        $petAnimalsAddCategory = $this->connect()->prepare('INSERT INTO category (catName, catSlug, catIDName) VALUES (?,?,?)');
        $petAnimalsAddCategory->execute([$petAnimalsCatName, $petAnimalsCatName, $petAnimalsCatIDName]);
        
        $tutorialCatName = "Tutorial";
        $tutorialCatIDName = "techCat";
        $tutorialAddCategory = $this->connect()->prepare('INSERT INTO category (catName, catSlug, catIDName) VALUES (?,?,?)');
        $tutorialAddCategory->execute([$tutorialCatName, $tutorialCatName, $tutorialCatIDName]);
        
        $musicCatName = "Music";
        $musicCatIDName = "musicCat";
        $musicAddCategory = $this->connect()->prepare('INSERT INTO category (catName, catSlug, catIDName) VALUES (?,?,?)');
        $musicAddCategory->execute([$musicCatName, $musicCatName, $musicCatIDName]);
        
        $interviewCatName = "Interview";
        $interviewCatIDName = "interviewCat";
        $interviewAddCategory = $this->connect()->prepare('INSERT INTO category (catName, catSlug, catIDName) VALUES (?,?,?)');
        $interviewAddCategory->execute([$interviewCatName, $interviewCatName, $interviewCatIDName]);
        
        $gamingCatName = "Gaming";
        $gamingCatIDName = "gamingCat";
        $gamingAddCategory = $this->connect()->prepare('INSERT INTO category (catName, catSlug, catIDName) VALUES (?,?,?)');
        $gamingAddCategory->execute([$gamingCatName, $gamingCatName, $gamingCatIDName]);
        
        $newsCatName = "News";
        $newsCatIDName = "newsCat";
        $newsAddCategory = $this->connect()->prepare('INSERT INTO category (catName, catSlug, catIDName) VALUES (?,?,?)');
        $newsAddCategory->execute([$newsCatName, $newsCatName, $newsCatIDName]);
        
        $edicationalCatName = "Educational";
        $edicationalCatIDName = "educationalCat";
        $edicationalAddCategory = $this->connect()->prepare('INSERT INTO category (catName, catSlug, catIDName) VALUES (?,?,?)');
        $edicationalAddCategory->execute([$edicationalCatName, $edicationalCatName, $edicationalCatIDName]);
        
        $nonProfitCatName = "Non-Profit";
        $nonProfitCatIDName = "nonProfitCat";
        $nonProfitAddCategory = $this->connect()->prepare('INSERT INTO category (catName, catSlug, catIDName) VALUES (?,?,?)');
        $nonProfitAddCategory->execute([$nonProfitCatName, $nonProfitCatName, $nonProfitCatIDName]);
        
        $advertisementCatName = "Advertisement";
        $advertisementCatIDName = "advertisementCat";
        $advertisementAddCategory = $this->connect()->prepare('INSERT INTO category (catName, catSlug, catIDName) VALUES (?,?,?)');
        $advertisementAddCategory->execute([$advertisementCatName, $advertisementCatName, $advertisementCatIDName]);
        
        $automotiveCatName = "Automotive";
        $automotiveCatIDName = "automotiveCat";
        $automotiveAddCategory = $this->connect()->prepare('INSERT INTO category (catName, catSlug, catIDName) VALUES (?,?,?)');
        $automotiveAddCategory->execute([$automotiveCatName, $automotiveCatName, $automotiveCatIDName]);
        
        $animationCatName = "Animation";
        $animationCatIDName = "animationCat";
        $animationAddCategory = $this->connect()->prepare('INSERT INTO category (catName, catSlug, catIDName) VALUES (?,?,?)');
        $animationAddCategory->execute([$animationCatName, $animationCatName, $animationCatIDName]);
        
        $tvCatName = "TV";
        $tvCatIDName = "tvCat";
        $tvAddCategory = $this->connect()->prepare('INSERT INTO category (catName, catSlug, catIDName) VALUES (?,?,?)');
        $tvAddCategory->execute([$tvCatName, $tvCatName, $tvCatIDName]);
        
        $filmMovieCatName = "Film/Movie";
        $filmMovieCatIDName = "filmCat";
        $filmMovieAddCategory = $this->connect()->prepare('INSERT INTO category (catName, catSlug, catIDName) VALUES (?,?,?)');
        $filmMovieAddCategory->execute([$filmMovieCatName, $filmMovieCatName, $filmMovieCatIDName]);
    } // addCategory 

    public function upgradeVideos() {
        $fetchVideos = $this->connect()->prepare('SELECT * FROM videos ORDER BY orderNumber DESC');
        $fetchVideos->execute();

        $videoResults = $fetchVideos->fetchAll();
        $number_of_rows = $fetchVideos->rowCount();

        foreach ($videoResults as $row) {
            $videoID = $row['id'];
            /*
                ================================================================
                    Video: Upgraade for Chapters
                ================================================================
            */
            $upgradeChaptersExplode = explode(' || ', $row['chapters']);
            if (count($upgradeChaptersExplode) == 1) {
                $newChapterArray = "NONE";
            } else {
                $chapterArrayBase = array();
                foreach ($upgradeChaptersExplode as $upgradeChapterTimeCode) {
                    $upgradeTimeCodeExplode = explode(';;', $upgradeChapterTimeCode);
                    $chapterTimeCode = $upgradeTimeCodeExplode[0];

                    $chapterTimeExplode = explode(":",$chapterTimeCode);

                    if (count($chapterTimeExplode) == 3 && $chapterTimeExplode[0] != "0") {
                        $chapterHours = $chapterTimeExplode[0]*3600;
                        if ($chapterTimeExplode[1] == 0) {
                        $chapterMinutes = 0;
                        } else {
                        $chapterMinutes = $chapterTimeExplode[1]*60;
                        }
                        $chapterSeconds = $chapterTimeExplode[2];
                        $chapterTimeCodeCoded = $chapterHours+$chapterMinutes+$chapterSeconds;
                    } 
                    else if (count($chapterTimeExplode) == 2 && $chapterTimeExplode[0] != "0") {
                        $chapterMinutes = $chapterTimeExplode[0]*60;
                        $chapterSeconds = $chapterTimeExplode[1];
                        $chapterTimeCodeCoded = $chapterMinutes+$chapterSeconds;
                    } else if (count($chapterTimeExplode) == 1 || count($chapterTimeExplode) == 2 && $chapterTimeExplode[0] == 0 ) {
                        $chapterSeconds = $chapterTimeExplode[1];
                        $chapterTimeCodeCoded = $chapterSeconds;
                    }
                    $chapterTitle = $upgradeTimeCodeExplode[1];
                    $currentChapterImplode = $chapterTimeCodeCoded . ";;" . $chapterTitle;

                    array_push($chapterArrayBase, $currentChapterImplode);
                //}
                    $chapterArraySorted = array();
                    if (!empty($chapterArrayBase)) {
                        asort($chapterArrayBase, SORT_NATURAL);

                        foreach($chapterArrayBase as $newChapterKey=>$newChapter) {
                            $newChapterExplode = explode(";;", $newChapter);
                            $newTimeCodeExploded = $newChapterExplode[0];
                            $newChapterTitle = $newChapterExplode[1];

                            if ($newTimeCodeExploded >= 3600) {
                            $timeCodeHour = floor($newTimeCodeExploded/3600);
                            $timeCodeMinute = floor($newTimeCodeExploded/60-60);
                            $timeCodeMinute = floor($newTimeCodeExploded/60-60);
                            $timeCodeSecond = floor($newTimeCodeExploded-($timeCodeHour*3600)-($timeCodeMinute*60));

                            if ($timeCodeMinute == 0) {
                                $timeCodeMinute ="00";
                            }
                            if ($timeCodeSecond == 0) {
                                $timeCodeSecond = "00";
                            } 
                            $newChapterTimeCode = $timeCodeHour.":".$timeCodeMinute.":".$timeCodeSecond;
                            } 
                            else if ($newTimeCodeExploded < 3600 && $newTimeCodeExploded >=60) {
                            $timeCodeMinutes = floor($newTimeCodeExploded/60);
                            $timeCodeSecond = floor($newTimeCodeExploded - $timeCodeMinutes * 60);

                            if ($timeCodeSecond == 0) {
                                $timeCodeSecond = "00";
                            } 
                            $newChapterTimeCode = $timeCodeMinutes.":".$timeCodeSecond;
                            } 
                            else {
                            $timeCodeSecond = floor($newTimeCodeExploded);
                            if ($timeCodeSecond == 0) {
                                $timeCodeSecond = "00";
                            } 
                            $newChapterTimeCode = "0:".$timeCodeSecond;
                            }

                            $currentNewChapterImplode = $newChapterTimeCode . ";;" . $newChapterTitle;

                            array_push($chapterArraySorted, $currentNewChapterImplode);
                        }
                        $newChapterArray = implode(" || ", $chapterArraySorted);
                    }
                }
            }

            /*
                ================================================================
                    Video: Upgraade for Music Credit
                ================================================================
            */
            $currentMusicCredit = $row['musicCredit'];
            $musicCreditExplode = explode(";;", $currentMusicCredit);
            if (count($musicCreditExplode) > 1) {
                $newMusicCredit = $currentMusicCredit;
            } else {
                $newMusicCredit = "NONE;;NONE;;NONE;;NONE;;".$currentMusicCredit;
            }
            
            /*
                ================================================================
                    Video: Upgraade for Video Credit
                ================================================================
            */

            $currentVideoCredit = $row['videoCredits'];

            if (empty($currentVideoCredit)) {
                $newVideoCredits = "NONE";
            } else {
                $newVideoCredits = $currentVideoCredit;
            }

            /*
                ================================================================
                    Video: Upgraade for Staring Credit
                ================================================================
            */

            $currentStaringCredit = $row['staring'];

            if ($currentStaringCredit == "NONE" || empty($currentStaringCredit)) {
                $newStaring = "NONE";
            } else {
                $staringExplode1 = explode(' || ', $currentStaringCredit);

                $staringArrayBase = array();
                foreach($staringExplode1 as $staringInfo1) {
                    $staringExplode2 = explode(';;', $staringInfo1);
                    if (count($staringExplode2) === 3) {
                        $timeCodeStaring = $staringExplode2[0];
                        $staringName = $staringExplode2[1];
                        if ($staringExplode2[2] == "NoUn") {
                            $staringUsername = "NONE";
                        } else {
                            $staringUsername = $staringExplode2[2];
                        }
                        $newStaring = $currentStaringCredit;
                    } else {
                        $timeCodeStaring = "NONE";
                        $staringName = $staringExplode2[0];
                        if ($staringExplode2[1] == "NoUn") {
                            $staringUsername = "NONE";
                        } else {
                            $staringUsername = $staringExplode2[1];
                        }
                    }
                    $newStaringText = $timeCodeStaring.";;".$staringName.";;".$staringUsername;
                    array_push($staringArrayBase, $newStaringText);
                    $newStaring = implode(" || ", $staringArrayBase);
                }
            }

            //echo "<h3>".$videoID."</h3><h4>".$newChapterArray."</h4><h5>".$newMusicCredit."</h5><h6>".$newStaring."</h6><hr>";

            /*
                ================================================================
                    Submit the Upgrade
                ================================================================
            */
        
            $updateVideos = $this->connect()->prepare('UPDATE videos SET chapters=?, musicCredit=?, videoCredits=?, staring=? WHERE id=?');
            $updateVideos->execute([$newChapterArray, $newMusicCredit, $newVideoCredits, $newStaring, $row['id']]);
        } // $row
    } //upgradeVideos

    public function upgradeLinks() {
        $fetchUsers = $this->connect()->prepare('SELECT * FROM users ORDER BY userID DESC');
        $fetchUsers->execute();

        $userResults = $fetchUsers->fetchAll();
        $number_of_rows = $fetchUsers->rowCount();

        foreach ($userResults as $user) {
            $linkArray = array();
            $userID = $user['userID'];
            $userLinks = $user['userLinks'];

            $linkExpload = explode(' || ', $userLinks);
            foreach ($linkExpload as $link) {
                $linkExpload2 = explode(';;', $link);
                if (empty($linkExpload2[0]) && empty($linkExpload2[1])) {
                    $newLink = "NONE";
                } else if (empty($linkExpload2[0]) || empty($linkExpload2[1])) {
                    $newLinkText = $userLinks.";;".$userLinks;
                } else {
                    $newLinkText = $linkExpload2[1].";;".$linkExpload2[0];
                }
                array_push($linkArray, $newLinkText);
                $newLink = implode(" || ", $linkArray);
            }
            $updateLinks = $this->connect()->prepare('UPDATE users SET userLinks=? WHERE userID=?');
            $updateLinks->execute([$newLink, $userID]);
        } // $row
    } //upgradeLinks
} //Upgrade Class