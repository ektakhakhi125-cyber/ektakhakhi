<?php

class Product
{
    public string $name;
    public float $price;

    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function displayInfo(): void
    {
        echo "Product Name: {$this->name}<br>";
        echo "Price: ₹{$this->price}<br>";
    }
}
