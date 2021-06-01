<?php
    namespace App\Message\Command;

    class SignUpSMS {

        private $phoneNumber;
        public function __construct(string $phoneNumber)
        {
            $this->phoneNumber = $phoneNumber;
        }

        public function getPhoneNumber()
        {
            return $this->phoneNumber;
        }
    }