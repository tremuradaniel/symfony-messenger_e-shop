<?php
    namespace App\MessageHandler\Command;

    use App\Message\Command\SignUpSMS;

    class SignUpSMSHandler {
        public function __invoke(SignUpSMS $signUpSMS)
        {
            // connect to api of external sms service provider
            sleep(2);
            var_dump($signUpSMS);
        }
    }
