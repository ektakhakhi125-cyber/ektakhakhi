<?php

require_once "Product.php";

class ElectronicProduct extends Product
{
    private int $warrantyPeriod;

    public function __construct(
        string $name,
        float $price,
        int $warrantyPeriod
    ) {
        parent::__construct($name, $price);
        $this->warrantyPeriod = $warrantyPeriod;
    }

    public function getWarrantyPeriod(): int
    {
        return $this->warrantyPeriod;
    }
}
