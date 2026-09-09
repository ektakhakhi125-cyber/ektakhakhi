<?php

class FoodOrder
{
    public $restaurantName;
    public $amount;

    public function __construct($restaurantName, $amount = 0)
    {
        $this->restaurantName = $restaurantName;
        $this->amount = $amount;
    }

    public function displayOrder()
    {
        echo "Restaurant: " . $this->restaurantName . "<br>";
        echo "Order Amount: ₹" . $this->amount . "<br><br>";
    }
}

// Only restaurant name
$order1 = new FoodOrder("Dominos");

// Restaurant name and amount
$order2 = new FoodOrder("McDonald's", 450);

$order1->displayOrder();
$order2->displayOrder();

?>
