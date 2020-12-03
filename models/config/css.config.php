<?php 
	$cssPrimaryColour = $setting->cssPrimaryColour();
	$cssSecondaryColour = $setting->cssSecondaryColour();
	$cssTertiaryColour = $setting->cssTertiaryColour();
	$cssBlackColour = $setting->cssBlackColour();
	$cssWhiteColour = $setting->cssWhiteColour();
	$cssGreyColour = $setting->cssGreyColour();
	
	$cssMainGradient = $setting->cssMainGradient();
	$cssBackgroundGradient = $setting->cssBackgroundGradient();
	$cssBlackGradient = $setting->cssBlackGradient();
	$cssWhiteGradient = $setting->cssWhiteGradient();
	
	$cssMainFont = $setting->cssMainFont();
	$cssSecondaryFont = $setting->cssSecondaryFont();
	
	$cssMainBoxShadow = $setting->cssMainBoxShadow();
	$cssSecondaryBoxShadow = $setting->cssSecondaryBoxShadow();
	$cssTertiaryBoxShadow = $setting->cssTertiaryBoxShadow();
?>

<script>
	document.documentElement.style.cssText = "--primaryColour: " + "<?php echo $cssPrimaryColour; ?>" + "; --secondaryColour: " + "<?php echo $cssSecondaryColour; ?>" + "; --tertiaryColour: " + "<?php echo $cssTertiaryColour; ?>" + "; --blackColour: " + "<?php echo $cssBlackColour; ?>" + "; --whiteColour: " + "<?php echo $cssWhiteColour; ?>" + "; --greyColour: " + "<?php echo $cssGreyColour; ?>" + "; --mainGradient: " + "<?php echo $cssMainGradient; ?>" + "; --backgroundGradient: " + "<?php echo $cssBackgroundGradient; ?>" + "; --blackGradient: " + "<?php echo $cssBlackGradient; ?>" + "; --whiteGradient: " + "<?php echo $cssWhiteGradient; ?>" + "; --mainFont: " + "<?php echo $cssMainFont; ?>" + "; --secondaryFont: " + "<?php echo $cssSecondaryFont; ?>" + ";  --mainBoxShadow: " + "<?php echo $cssMainBoxShadow; ?>" + "; --secondaryBoxShadow: " + "<?php echo $cssSecondaryBoxShadow; ?>" + "; --tertiaryBoxShadow: " + "<?php echo $cssTertiaryBoxShadow; ?>";
</script>