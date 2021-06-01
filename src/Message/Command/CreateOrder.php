<?php
    namespace App\Message\Command;

    class CreateOrder {
        private $productID;
        private $productAmount;

        public function __construct(int $productID, int $productAmount)
        {
            $this->productID = $productID;
            $this->productAmount = $productAmount;
        }

        public function getProductID(): int
        {
            return $this->getProductID();
        }

        public function getProductAmount(): int
        {
            return $this->getProductAmount();
        }
    }
