<?php

require_once "eleproduct.php";

$phone = new ElectronicProduct("Smartphone", 25000, 24);

// Accessing inherited public properties
echo "Name: " . $phone->name . "<br>";
echo "Price: ₹" . $phone->price . "<br>";

// Calling inherited method
$phone->displayInfo();

// Accessing child-specific property through getter
echo "Warranty: " . $phone->getWarrantyPeriod() . " months<br>";
