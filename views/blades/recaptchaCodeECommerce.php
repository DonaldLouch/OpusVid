<?php
    $reCAPTCHA = new ReCAPTCHA;
    $siteKey = $reCAPTCHA->captchaSiteKey();
?>
<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
<input type="hidden" name="capSitekey" id="capSitekey" value="<?php echo $siteKey; ?>">
<script>
    var siteKEY = document.querySelector('#capSitekey').value;
    grecaptcha.ready(function() {
        grecaptcha.execute(siteKEY, {action: 'e-commerce'}).then(function(token) {
            
            document.getElementById('g-recaptcha-response').value=token;
        });
    });
</script>