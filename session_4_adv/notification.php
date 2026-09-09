<?php

interface Notification
{
    public function send(): void;
}

class EmailNotification implements Notification
{
    public function send(): void
    {
        echo "Sending notification through Email.<br>";
    }
}

class SMSNotification implements Notification
{
    public function send(): void
    {
        echo "Sending notification through SMS.<br>";
    }
}

class PushNotification implements Notification
{
    public function send(): void
    {
        echo "Sending notification through Push Notification.<br>";
    }
}

// Array containing different types of Notification objects
$notifications = [
    new EmailNotification(),
    new SMSNotification(),
    new PushNotification()
];

// Polymorphism
foreach ($notifications as $notification) {
    $notification->send();
}
