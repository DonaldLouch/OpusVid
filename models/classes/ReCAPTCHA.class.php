<?php
 class ReCAPTCHA extends Settings {
        public function captchaSiteKey() {
            $capSiteKey =$this->captchaSite();
            return $capSiteKey;
        }

        public function captchaSecretKey() {
           $capSecretKey =$this->captchaSecret();
            return $capSecretKey;
        }
    }