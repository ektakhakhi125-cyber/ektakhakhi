<?php
// notifier trait
trait Notifier
{
    public function sendNotification($message)
    {
        echo $message . "<br>";
    }
}

class Order
{
    use Notifier;
}

class Payment
{
    use Notifier;
}

$order = new Order();
$payment = new Payment();

$order->sendNotification("Your Zomato order has been placed successfully!");
$payment->sendNotification("Your payment has been confirmed successfully!");


echo "<br><br><br>";



//sharelable trait



trait Shareable
{
    public function shareOnInstagram()
    {
        echo "Shared on Instagram!<br>";
    }
}

class Photo
{
    use Shareable;
}

class Reel
{
    use Shareable;
}

$photo = new Photo();
$reel = new Reel();

$photo->shareOnInstagram();
$reel->shareOnInstagram();


?>
