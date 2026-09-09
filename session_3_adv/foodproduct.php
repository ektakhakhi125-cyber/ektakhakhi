<?php

require_once "Product.php";

class FoodProduct extends Product
{
    protected string $expiryDate;

    public function __construct(
        string $name,
        float $price,
        string $expiryDate
    ) {
        parent::__construct($name, $price);
        $this->expiryDate = $expiryDate;
    }

    public function isExpired(): bool
    {
        $today = new DateTime();
        $expiry = new DateTime($this->expiryDate);

        return $today > $expiry;
    }
}
