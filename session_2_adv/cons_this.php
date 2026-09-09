<?php

class ShoppingCart
{
    public $items;
    public $totalPrice;

    public function __construct()
    {
        $this->items = [];
        $this->totalPrice = 0;
    }
}

$cart = new ShoppingCart();

print_r($cart->items);
echo "<br>";
echo "Total Price: ₹" . $cart->totalPrice;

?>
