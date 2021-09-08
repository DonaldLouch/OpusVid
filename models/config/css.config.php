<?php 
	$cssPrimaryColour = $setting->cssPrimaryColour();
	$cssSecondaryColour = $setting->cssSecondaryColour();
	$cssTertiaryColour = $setting->cssTertiaryColour();
	$cssBlackColour = $setting->cssBlackColour();
	$cssWhiteColour = $setting->cssWhiteColour();
	$cssGreyColour = $setting->cssGreyColour();
	$cssDarkGreyColour = $setting->cssDarkGreyColour();
	$cssRedColour = $setting->cssRedColour();
	$cssGreenColour = $setting->cssGreenColour();

	$cssMainGradient = $setting->cssMainGradient();
	$cssBackgroundGradient = $setting->cssBackgroundGradient();
	$cssBlackGradient = $setting->cssBlackGradient();
	$cssWhiteGradient = $setting->cssWhiteGradient();
	$cssModalGradient = $setting->cssModalGradient();
	$cssBlurredBackground = $setting->cssBlurredBackground();
	
	$cssMainFont = $setting->cssMainFont();
	$cssSecondaryFont = $setting->cssSecondaryFont();
	$cssCodeFont = $setting->cssCodeFont();

	$cssMainBoxShadow = $setting->cssMainBoxShadow();
	$cssSecondaryBoxShadow = $setting->cssSecondaryBoxShadow();
	$cssTertiaryBoxShadow = $setting->cssTertiaryBoxShadow();
	$cssNavBoxShadow = $setting->cssNavBoxShadow();

	$cssDarkPrimaryColour = $setting->cssDarkPrimaryColour();
	$cssDarkSecondaryColour = $setting->cssDarkSecondaryColour();
	$cssDarkTertiaryColour = $setting->cssDarkTertiaryColour();
	$cssDarkBlackColour = $setting->cssDarkBlackColour();
	$cssDarkWhiteColour = $setting->cssDarkWhiteColour();
	$cssDark1GreyColour = $setting->cssDark1GreyColour();
	$cssDarkDarkGreyColour = $setting->cssDarkDarkGreyColour();
	$cssDarkRedColour = $setting->cssDarkRedColour();
	$cssDarkGreenColour = $setting->cssDarkGreenColour();

	$cssDarkMainGradient = $setting->cssDarkMainGradient();
	$cssDarkBackgroundGradient = $setting->cssDarkBackgroundGradient();
	$cssDarkBlackGradient = $setting->cssDarkBlackGradient();
	$cssDarkWhiteGradient = $setting->cssDarkWhiteGradient();
	$cssDarkModalGradient = $setting->cssDarkModalGradient();
	$cssDarkBlurredBackground = $setting->cssDarkBlurredBackground();
	
	$cssDarkMainBoxShadow = $setting->cssDarkMainBoxShadow();
	$cssDarkSecondaryBoxShadow = $setting->cssDarkSecondaryBoxShadow();
	$cssDarkTertiaryBoxShadow = $setting->cssDarkTertiaryBoxShadow();
	$cssDarkNavBoxShadow = $setting->cssDarkNavBoxShadow();
?>

<script>
document.documentElement.style.cssText =
    "--primaryColour: " + "<?php echo $cssPrimaryColour; ?>" +
    "; --secondaryColour: " + "<?php echo $cssSecondaryColour; ?>" +
    "; --tertiaryColour: " + "<?php echo $cssTertiaryColour; ?>" +
    "; --blackColour: " + "<?php echo $cssBlackColour; ?>" +
    "; --whiteColour: " + "<?php echo $cssWhiteColour; ?>" +
    "; --greyColour: " + "<?php echo $cssGreyColour; ?>" +
    "; --darkGreyColour: " + "<?php echo $cssDarkGreyColour; ?>" +
    "; --redColour: " + "<?php echo $cssRedColour; ?>" +
    "; --greenColour: " + "<?php echo $cssGreenColour; ?>" +
    "; --mainGradient: " + "<?php echo $cssMainGradient; ?>" +
    "; --backgroundGradient: " + "<?php echo $cssBackgroundGradient; ?>" +
    "; --blackGradient: " + "<?php echo $cssBlackGradient; ?>" +
    "; --whiteGradient: " + "<?php echo $cssWhiteGradient; ?>" +
    "; --modalGradient: " + "<?php echo $cssModalGradient; ?>" +
    "; --blurredBackground: " + "<?php echo $cssBlurredBackground; ?>" +
    "; --mainFont: " + "<?php echo $cssMainFont; ?>" +
    "; --secondaryFont: " + "<?php echo $cssSecondaryFont; ?>" +
    "; --codeFont: " + "<?php echo $cssCodeFont; ?>" +
    ";  --mainBoxShadow: " + "<?php echo $cssMainBoxShadow; ?>" +
    "; --secondaryBoxShadow: " + "<?php echo $cssSecondaryBoxShadow; ?>" +
    "; --tertiaryBoxShadow: " + "<?php echo $cssTertiaryBoxShadow; ?>" +
    "; --navBoxShadow: " + "<?php echo $cssNavBoxShadow; ?>" +
    "; --darkPrimaryColour: " + "<?php echo $cssDarkPrimaryColour; ?>" +
    "; --darkSecondaryColour: " + "<?php echo $cssDarkSecondaryColour; ?>" +
    "; --darkTertiaryColour: " + "<?php echo $cssDarkTertiaryColour; ?>" +
    "; --darkBlackColour: " + "<?php echo $cssDarkBlackColour; ?>" +
    "; --darkWhiteColour: " + "<?php echo $cssDarkWhiteColour; ?>" +
    "; --dark1GreyColour: " + "<?php echo $cssDark1GreyColour; ?>" +
    "; --darkDarkGreyColour: " + "<?php echo $cssDarkDarkGreyColour; ?>" +
    "; --darkRedColour: " + "<?php echo $cssDarkRedColour; ?>" +
    "; --darkGreenColour: " + "<?php echo $cssDarkGreenColour; ?>" +
    "; --darkMainGradient: " + "<?php echo $cssDarkMainGradient; ?>" +
    "; --darkBackgroundGradient: " + "<?php echo $cssDarkBackgroundGradient; ?>" +
    "; --darkBlackGradient: " + "<?php echo $cssDarkBlackGradient; ?>" +
    "; --darkWhiteGradient: " + "<?php echo $cssDarkWhiteGradient; ?>" +
    "; --darkModalGradient: " + "<?php echo $cssDarkModalGradient; ?>" +
    "; --darkBlurredBackground: " + "<?php echo $cssDarkBlurredBackground; ?>" +
    "; --darkMainBoxShadow: " + "<?php echo $cssDarkMainBoxShadow; ?>" +
    "; --darkSecondaryBoxShadow: " + "<?php echo $cssDarkSecondaryBoxShadow; ?>" +
    "; --darkTertiaryBoxShadow: " + "<?php echo $cssDarkTertiaryBoxShadow; ?>" +
    "; --darkNavBoxShadow: " + "<?php echo $cssDarkNavBoxShadow; ?>";
</script>