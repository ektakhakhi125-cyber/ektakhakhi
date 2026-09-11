<?php

trait ActionLogger
{
    public function logAction($message)
    {
        echo "Log: " . $message . "<br>";
    }
}

class Cart
{
    use ActionLogger;

    public function addItem($item)
    {
        echo $item . " added to cart.<br>";
        $this->logAction("Item added to cart");
    }
}

class Wishlist
{
    use ActionLogger;

    public function addItem($item)
    {
        echo $item . " added to wishlist.<br>";
        $this->logAction("Item added to wishlist");
    }
}

$cart = new Cart();
$wishlist = new Wishlist();

$cart->addItem("Pizza");
$wishlist->addItem("Burger");

?>
